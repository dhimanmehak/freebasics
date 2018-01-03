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
            @if(Session::has('success'))
            <div class="login_success">
                <span class="icon"></span> {{Session::get('success');}}
            </div>
            @endif
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon documents"></span>
                    <h6>{{$project->title}}</h6>
                </div>
                <div class="widget_content" style="margin-bottom:5%;">
                    <div class="page_content">
                        <div class="grid_12 post_preview">
                            <center><h2 class="post_title">{{$project->title}}<br>
                                    <h6 style="margin-top:0px;"> <i>By <a href="#">{{$project->firstname}}</a></i></h6></h2></center>
                            <br><br>
                            <div class="grid_12">
                                <form  autocomplete="off" method="post" action="{{URL::to('postbacking')}}" id="form103" class="form_container left_label">
                                    <input type="hidden" name="projectid" value="{{$project->id}}">
                                    <ul>
                                        <li>
                                            <div class="form_grid_12">
                                                <label class="field_title" >Enter Pledge Amount<span class="req">*</span></label>
                                                <div class="form_input">
                                                    <input name="pledgeamount" id="pledgeamount" value="" maxlength="100" class="large required" type="text">
                                                    <span id="pledgeamount_errmsg" style="color:red;"></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form_grid_12">
                                                <label class="field_title" >Select User<span class="req">*</span></label>
                                                <div class="form_input">
                                                    <select data-placeholder="Select User" name="userid" style=" width:315px" class="chzn-select required" tabindex="13">
                                                        @foreach($users as $user) 
                                                        <option value="{{$user->id}}">{{$user->firstname}} - {{$user->email}}</option>                                            
                                                        @endforeach 
                                                    </select>        
                                                </div>
                                            </div>
                                        </li>
                                    </ul>                                  
                                    <center><h5>Select Reward</h5></center>
                                    <div class="widget_content pin_icn">  
                                        <input type="radio" name="rewardid" mycustomtag="1" value="0" style="position: absolute; margin-top: 10px;"  class="rewardid required">
                                        <div class="user_list" style="margin-left:30px;">
                                            <div class="user_block">
                                                <h5 style="color: #0068F4;">No Reward</h5><br>
                                                <div class="info_block">
                                                    <ul class="list_info pin_icn">
                                                        <li><span><b>Description:</b> <i>No thanks, I just want to help the project.</i></span></li>
                                                    </ul>
                                                </div>                   
                                            </div>
                                        </div>
                                        @foreach($rewards as $key=>$reward)
                                        <input type="radio" name="rewardid" mycustomtag="{{round($reward->pledgeamount)}}" value="{{$reward->id}}" style="position: absolute; margin-top: 10px;" class="required rewardid">
                                        <div class="user_list" style="margin-left:30px;">
                                            <div class="user_block">
                                                <h5 style="color: #0068F4;">Pledge ${{round($reward->pledgeamount)}} or more</h5><br>
                                                <div class="info_block">
                                                    <ul class="list_info pin_icn">
                                                        <li><span><b>Estimated Delivery:</b> <i> <?php
                                                                    $monthnumber = strstr($reward->estimateddelivery, '-', true);
                                                                    $year = strstr($reward->estimateddelivery, '-', false);
                                                                    ?>{{date("F",mktime(0,0,0,$monthnumber));}} {{str_replace('-','',$year);}}</i></span> &nbsp; | &nbsp; <span><b>Limit:</b> <i>{{$reward->quantity}}</i></span></li>
                                                        <li><span><b>Shipping Details:</b></span>@if($reward->shippinginvolved==0)<span><i>No shipping involved</i></span>@else<span><i>{{$reward->countrylist}}</i></span>@endif</li>
                                                        <li><span><b>Description:</b> <i>{{$reward->description}}</i></span></li>
                                                    </ul>
                                                </div>                   
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="form_grid_12" style="margin-left:45%;">
                                        <div class="form_input">
                                            <button id="signupsubmit" name="signup" type="submit" class="btn_small btn_blue"><span>Continue to Payment</span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <span class="clear"></span>
        </div>
        <script>
            $("#pledgeamount").keypress(function (e) {
                //if the letter is not digit then display error and don't type anything
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    //display error message
                    $("#pledgeamount_errmsg").html("Pledge amount should be Numeric value.").show().fadeOut(10000);
                    return false;
                }
            });

            $(".rewardid").click(function (e) {
                var radioValue = $(this).attr("mycustomtag");
                var pledge_amount = $("#pledgeamount").val();
                if (pledge_amount < radioValue) {
                    $("#pledgeamount").val(radioValue);
                    // alert("Your are a - " + radioValue);
                }
            });

        </script>
        @stop