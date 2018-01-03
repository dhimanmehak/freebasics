@extends('layouts.adminlayout')
@section('content')
<div id="content">
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
                            @if(Session::has('success'))
                            <div class="login_success">
                                <span class="icon"></span> {{Session::get('success');}}
                            </div>
                            @endif
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
                                                <span class="user_sl"><a @if($project->totalbacking!=0) href="{{URL::to('backingbyprojectid?id=')}}{{$project->id}}" @else href="javascript:void(0)" @endif >Backers</a></span>
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
                                        <h3>${{round($project->totalpledgeamount)}}</h3>
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
                                        <h3>${{round($project->fundinggoal)}}</h3>
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

                                @if($project->dayscount<0)
                                <div class="item_widget" style="padding-top:10px;">
                                    <center><div class="btn_30_orange ucase">
                                            <a href="#"><span class="icon calculator"></span>
                                                <span>Expired</span></a>
                                        </div></center>
                                </div>
                                @else
                                <div class="item_widget" style="padding-top:10px;">
                                    <center><div class="btn_40_blue ucase">
                                            <a href="{{URL::to('backthisproject?id=')}}{{$project->id}}"><span class="icon star_sl"></span>
                                                <span>Back this project</span></a>
                                        </div></center>
                                </div>
                                @endif
                            </div>   
                            <br>
                            <p>
                                {{{$project->shortblurb}}}
                            </p>

                            <ul class="clip_icn">
                                <li><a href="#">{{{$project->categoryname}}}</a></li>
                            </ul>
                            <hr>
                            <div class="grid_8 " style="margin-bottom:5%">
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
                        </div>
                    </div>
                </div>
            </div>
            <span class="clear"></span>
        </div>
        @stop