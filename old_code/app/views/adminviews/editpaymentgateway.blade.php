@extends('layouts.adminlayout')
@section('content')
<div id="content">
    <div class="grid_container">
        <div class="grid_12">
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon list"></span>
                    <h6>Edit {{$paymentgateways->gatewayname}}</h6>
                </div>
                <div class="widget_content">
                    <form autocomplete="off" method="post" action="{{URL::to('posteditpaymentgateway')}}" class="form_container left_label" id="form103" enctype="multipart/form-data">
                        <?php
                        $gatewaySettings = unserialize($paymentgateways->settings);
                        if (!is_array($gatewaySettings)) {
                            $gatewaySettings = array();
                        }
                        if (isset($gatewaySettings['mode'])) {
                            ?>
                            <ul>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Payment Mode </label>
                                        @if($gatewaySettings['mode']=="sandbox")
                                        <select class="form_input" name="mode">
                                            <option value="live">Live</option>
                                            <option value="sandbox"  selected="">Sandbox</option>
                                        </select>
                                        @else
                                        <select class="form_input" name="mode">
                                            <option value="live" selected="">Live</option>
                                            <option value="sandbox">Sandbox</option>
                                        </select>
                                        @endif
                                    </div>
                                </li>
                            <?php } ?>

                            <input type='hidden' value='{{$paymentgateways->id}}' name='id'/>
                            <input type='hidden' value='{{$paymentgateways->gatewayname}}' name='gatewayname'/>
                            <?php
                            foreach ($gatewaySettings as $key => $val) {
                                if ($key != 'mode') {
                                    if ($key == 'paypal_ipn_url') {
                                        ?>
                                        <li>
                                            <div class="form_grid_12">
                                                <label  class="field_title"><?php echo ucwords(str_replace('_', ' ', $key)); ?> </label>
                                                <label>{{URL::to('site/order/ipnpaymet')}}</label>
                                            </div>
                                        </li>
                                    <?php } else { ?>    
                                        <li>
                                            <div class="form_grid_12">
                                                <label class="field_title">{{ucwords(str_replace('_', ' ', $key))}}</label>
                                                <div class="form_input"> 
                                                    <input type="text" name="{{$key}}"  value='{{$val}}'></div>
                                            </div>
                                        </li>
                                        <?php
                                    }
                                }
                            }
                            ?>                             
                            <li>
                                <div class="form_grid_12">
                                    <div class="form_input">
                                        <?php $name = Session::get('adminname'); ?>
                                        @if($name=="demo")
                                        <a class="inline cboxElement btn_small btn_blue" href="#inline_content" style="line-height: 28px !important;color: #fff;">Update</a>
                                        @else
                                        <button type="submit" class="btn_small btn_blue"><span>Update</span></button>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <span class="clear"></span>
</div>
@stop
