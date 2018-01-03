@extends('layouts.adminlayout')
@section('content')
<div id="content">
    <div class="grid_container">
        <div class="grid_12">
            @if(Session::has('failed'))
            <div class="login_invalid">                
                <span class="icon"></span> {{Session::get('failed');}}
            </div>
            @endif
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon list"></span>
                    <h6>Edit Subscription</h6>
                </div>
                <div class="widget_content">
                    <form autocomplete="off" method="post" action="{{URL::to('posteditsubscription')}}" id="form103" class="form_container left_label">
                        @foreach($details as $detail)
                        <input type="hidden" name="id" value="{{$detail->id}}" maxlength="100" class="large"/>
                        <ul>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Email Address<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input type="text" name="email" value="{{$detail->email}}" maxlength="100" class="large required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Status<span class="req">*</span></label>
                                    <div class="form_input">
                                        <select data-placeholder="status" style=" width:350px" name="status" class="chzn-select" tabindex="13">
                                            <option value="active"  @if($detail->status=="active")selected="selected" @endif>active</option>
                                            <option value="inactive" @if($detail->status=="inactive")selected="selected" @endif>inactive</option>         
                                        </select> 
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <div class="form_input">
                                        <?php $name = Session::get('adminname'); ?>
                                        @if($name=="demo")
                                        <a class="inline cboxElement btn_small btn_blue" href="#inline_content" style="line-height: 28px !important;color: #fff;">Update</a>
                                        @else
                                        <button name="submit" type="submit" class="btn_small btn_blue"><span>Update</span></button>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        </ul>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
    <span class="clear"></span>
</div>
@stop