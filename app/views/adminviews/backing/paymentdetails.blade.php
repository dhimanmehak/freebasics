@extends('layouts.adminlayout')
@section('content')
<div id="content">
    <div class="grid_container">
        <div class="grid_12">
            @if(Session::has('failed'))
            <div class="login_invalid">
                <span class="icon"></span> {{(Session::get('failed');}}
            </div>
            @endif
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon documents"></span>
                    <h6>Payment Details</h6>
                </div>
                <div class="widget_content" style="margin-bottom:5%;">
                    <div class="page_content">
                        <div class="grid_12 post_preview">
                            <center><h2 class="post_title">{{$projectdetail->title}}<br>
                                    <h6 style="margin-top:0px;"> <i>By <a href="#">{{$projectdetail->firstname}}</a></i></h6></h2></center>
                            <br><br>
                            <hr><br>
                            <p style="text-indent: 20px;">
                                Your card will not be charged at this time. If the project is successfully funded, your card will be charged <i><b>${{$pledgeamount}}</b></i> when the project ends.
                            </p><br>
                            <h4 style="text-indent: 10px;">Card Information</h4><br>
                            <div class="grid_12">
                                <form  autocomplete="off" method="post" action="{{URL::to('poststripepayment')}}" id="form103" class="form_container left_label">
                                    <input type="hidden" name="projectid" value="{{$projectdetail->id}}">
                                    <input type="hidden" name="rewardid" value="{{$rewardid}}">
                                    <input type="hidden" name="userid" value="{{$userid}}">
                                    <input type="hidden" name="pledgeamount" value="{{$pledgeamount}}">
                                    <input type="hidden" name="admin" value="1">
                                    <ul>
                                        <li>
                                            <div class="form_grid_12">
                                                <label class="field_title" >Cardholder Name<span class="req">*</span></label>
                                                <div class="form_input">
                                                    <input name="name" value="" maxlength="100" class="large required" type="text">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form_grid_12">
                                                <label class="field_title" >Card Number<span class="req">*</span></label>
                                                <div class="form_input">
                                                    <input name="cardnumber" value="" maxlength="100" class="large required" type="text">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form_grid_12">
                                                <label class="field_title" >Expiration<span class="req">*</span></label>
                                                <div class="form_input">                                                    
                                                    <div class="form_grid_2">
                                                        <select data-placeholder="Select Month" name="month" style="width:100px;border: #d8d8d8 1px solid;padding:3px;">
                                                            <?php for ($m = 01; $m <= 12; $m++) { ?>
                                                                <option value="{{$m}}" >{{$m}}</option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form_grid_2">
                                                        <select data-placeholder="Select Year" name="year" id="year" tabindex="13" style="width:100px;border: #d8d8d8 1px solid;padding:3px;">
                                                            <?php
                                                            $currentdate = date('Y');
                                                            for ($i = $currentdate; $i < $currentdate + 10; $i++) {
                                                                ?>
                                                                <option value='{{$i}}'>{{$i}}</option>
                                                            <?php } ?>    
                                                        </select>
                                                    </div>
                                                    <div class="form_grid_2">
                                                        <input name="cvv" type="password" class="required">
                                                        <span class="label_intro">CVV</span>
                                                    </div>
                                                    <span class="clear"></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form_grid_12">
                                                <div class="form_input">
                                                    <input name="remember" type="checkbox" value="0">  Remember this card for future pledges
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <br>
                                    <h4 style="text-indent:10px;">Billing Address</h4>  <br>
                                    <ul>
                                        <li>
                                            <div class="form_grid_12">
                                                <label class="field_title" >Select Country<span class="req">*</span></label>
                                                <div class="form_input">
                                                    <select data-placeholder="Select User" name="country" style=" width:350px" class="chzn-select required" tabindex="13">
                                                        @foreach($countries as $country) 
                                                        <option value="{{$country->countryname}}">{{$country->countryname}}</option>                                            
                                                        @endforeach 
                                                    </select>        
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form_grid_12">
                                                <label class="field_title" >Address 1<span class="req">*</span></label>
                                                <div class="form_input">
                                                    <input name="address1" value="" maxlength="100" class="large required" type="text">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form_grid_12">
                                                <label class="field_title" >Address 2</label>
                                                <div class="form_input">
                                                    <input name="address2" value="" maxlength="100" class="large" type="text">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form_grid_12">
                                                <label class="field_title" >City<span class="req">*</span></label>
                                                <div class="form_input">
                                                    <input name="city" value="" maxlength="100" class="large required" type="text">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form_grid_12">
                                                <label class="field_title" >Postal Code<span class="req">*</span></label>
                                                <div class="form_input">
                                                    <input name="postalcode" value="" maxlength="100" class="large required" type="text">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form_grid_12" >
                                                <div class="form_input">
                                                    <button name="signup" type="submit" class="btn_small btn_blue"><span>Pledge</span></button>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>  
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <span class="clear"></span>
        </div>
    </div>
</div>
@stop