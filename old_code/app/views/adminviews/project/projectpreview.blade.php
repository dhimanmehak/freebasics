@extends('layouts.adminlayout')
@section('content')

<div  class="feet" id="content">
    <div class="grid_container">
        <div class="grid_12">
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon documents"></span>
                    <h6>{{{$project->title}}}</h6>
                </div>
                <div class="widget_content">
                    <div class="page_content">
                        <div class="grid_12 post_preview">
                            <center><h2 class="post_title">{{{$project->title}}}<br>
                                    <h6 style="margin-top:0px;"> <i>By <a href="#">{{{$project->firstname}}}</a></i></h6></h2></center>

                            <div class="grid_8">
                                <?php
                                if ($project->projectvideo != '') {
                                    $array = explode('/', $project->projectvideo);
                                    ?>
                                    @if(Str::contains("www.youtube.com",$array))
                                    <iframe src="{{$project->projectvideo}}" width="100%" height="480px" frameborder="0" allowfullscreen></iframe>
                                    @else 
                                    <?php
                                    $explodedata = explode('.', $array[4]);
                                    if ($explodedata[1] == 'JPEG' || $explodedata[1] == 'PNG' || $explodedata[1] == 'GIF' || $explodedata[1] == 'BMP' ||
                                            $explodedata[1] == 'jpeg' || $explodedata[1] == 'png' || $explodedata[1] == 'gif' || $explodedata[1] == 'bmp' || $explodedata[1] == 'jpg') {
                                        ?>
                                        <img class="preview" id="img" style="width:100%;height:100%;" src="{{URL::to('');}}/{{$project->projectvideo}}" >
                                    <?php } else { ?>
                                        <video width="100%" height="100%" controls>
                                            <source src="{{URL::to('');}}/{{$project->projectvideo}}" >
                                            {{trans('messages.novideosupport')}}.
                                        </video>
                                    <?php } ?>
                                    @endif
                                <?php } else { ?>
                                    <img class="preview" id="img" style="width:100%;height:100%;" src="{{URL::to('main/images/projectdefault.png');}}" >
                                <?php } ?>
                            </div>   
                            <div class="grid_4" style="height: 410px;">

                                <div class="item_widget">
                                    <div class="item_block">
                                        <div class="icon_block green_block" style="padding:0px;">
                                            <span class="item_icon">
                                                <span class="user_sl"><a @if($project->totalbacking!=0) href="{{URL::to('backingbyprojectid?id=')}}{{$project->id}}" @else href="javascript:void(0)" @endif>Backers</a></span>
                                            </span>
                                        </div>
                                        <h3>{{$project->totalbacking}}</h3>
                                        <p>
                                            Backers
                                        </p>
                                    </div>
                                    <div class="item_block">
                                        <div class="icon_block blue_block" style="padding:0px;">
                                            <span class="item_icon">
                                                <span class="cost_sl"><a href="#">Pledged Amount</a></span>
                                            </span>
                                        </div>
                                        <h3>${{$project->totalpledgeamount}}</h3>
                                        <p>
                                            Pledged Amount
                                        </p>
                                    </div>

                                </div>
                                <div class="item_widget">
                                    <div class="item_block">
                                        <div class="icon_block orange_block" style="padding:0px;">
                                            <span class="item_icon">
                                                <span class="bank_sl"><a href="#">Funding Goal</a></span>
                                            </span>
                                        </div>
                                        <h3>${{$project->fundinggoal}}</h3>
                                        <p>
                                            Funding Goal
                                        </p>
                                    </div>
                                    @if($project->dayscount<0)
                                    <div class="item_block">
                                        <div class="icon_block tur_block" style="padding:0px;">
                                            <span class="item_icon">
                                                <span class="calendar_sl"><a href="#">Days ago</a></span>
                                            </span>
                                        </div>
                                        <h3>{{$project->dayscount}}</h3>
                                        <p>
                                            Days ago
                                        </p>
                                    </div>
                                    @else
                                    <div class="item_block">
                                        <div class="icon_block tur_block" style="padding:0px;">
                                            <span class="item_icon">
                                                <span class="calendar_sl"><a href="#">Days to go</a></span>
                                            </span>
                                        </div>
                                        <h3>{{$project->dayscount}}</h3>
                                        <p>
                                            Days to go
                                        </p>
                                    </div>
                                    @endif

                                </div>                               
                            </div>   
                            <br>
                            <p>
                                {{{$project->shortblurb}}}
                            </p>

                            <ul class="clip_icn">
                                <li><a href="#">{{{$project->categoryname}}}</a></li>
                            </ul>
                            <hr>
                            <div class="grid_8 story-editor" style="margin-bottom:5%">
                                <h5>STORY</h5>
                                {{$project->description}}
                                <h5>RISKS AND CHALLENGES</h5>
                                {{{$project->risks}}}
                            </div>
                            <div class="grid_4">
                                <ul class="pin_icn">
                                    <center><h5>Rewards</h5></center>
                                    <div class="widget_content">       
                                        @foreach($rewards as $key=>$reward)
                                        <div class="user_list">

                                            <div class="user_block">
                                                <h5 style="color: #0068F4;">Pledge ${{$reward->pledgeamount}} or more</h5><br>
                                                <div class="info_block">
                                                    <ul class="list_info">
                                                        <li><span><b>Estimated Delivery:</b> <i> <?php
                                                                    $monthnumber = strstr($reward->estimateddelivery, '-', true);
                                                                    $year = strstr($reward->estimateddelivery, '-', false);
                                                                    ?>{{date("F",mktime(0,0,0,$monthnumber));}} {{str_replace('-','',$year);}}</i></span> &nbsp; | &nbsp; <span><b>Limit:</b> <i>{{$reward->quantity}}</i></span></li>
                                                        <li><span><b>Description:</b> <i>{{{$reward->description}}}</i></span></li>
                                                    </ul>
                                                </div>                   
                                            </div>

                                        </div>
                                        @endforeach
                                    </div>
                            </div>
                            <div style="margin-bottom:5%;">
                                <form class="form_container left_label" id="form103" method='post' style='display: inline;' action='{{URL::to('approveproject')}}'>
                                    <div class="form_grid_12">
                                        <input type='hidden' name='id' value='{{$project->id}}'/>
                                        <input type='hidden' name='status' id="verifyval" value=''/>
                                        <label class="field_title">Admin Remarks</label>
                                        <div class="form_input">
                                            <textarea name="remarks" class="required">{{{$project->remarks}}}</textarea>
                                        </div>
                                    </div>
                                    <!-- <div class="form_grid_12"> -->
                                    <?php $name = Session::get('adminname'); ?>
                                    @if($name=="demo")
                                    <a class="inline cboxElement btn_small btn_blue" href="#inline_content" style="line-height: 28px !important;color: #fff;">Approve</a>
                                    @else
                                    <button type="submit"  class="btn_small btn_blue"  onclick="return verify();"><span>Approve</span></button>
                                    @endif
                                    <?php $name = Session::get('adminname'); ?>
                                    @if($name=="demo")
                                    <a class="inline cboxElement btn_small btn_orange" href="#inline_content" style="line-height: 28px !important;color: #fff;">Suspend</a>
                                    @else
                                    <button type="submit" class="btn_small btn_orange" onclick="return noverify();"><span>Suspend</span></button>
                                </form>
                                @endif
                                <a href='{{URL::to('projectlist')}}' class="btn_small btn_gray" style='line-height: 2.7 !important;'>Back</a>
                                <!-- </div> -->
                                <!--  </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <span class="clear"></span>
        </div>
        @stop

        <script>
            function verify() {
                var verifyval = $('#verifyval').val('2');
            }
            function noverify() {
                var verifyval = $('#verifyval').val('3');
            }
        </script>