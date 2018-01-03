@extends('layouts.adminlayout')
@section('content')

<div class="waddprodcdel" id="content">
    <div class="grid_container">
        <div class="grid_12 full_block">
            @if(Session::has('success'))
            <div class="login_success">
                <span class="icon"></span> {{Session::get('success');}}
            </div>
            @endif
            @if(Session::has('error'))
            <div class="login_invalid">
                <span class="icon"></span> {{Session::get('error');}}
            </div>
            @endif            
            @if(Session::has('error2'))
            <div class="login_invalidsample" style="display:none;">
                {{Session::get('error2');}}
            </div>
            @endif
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon list"></span>
                    <h6> Edit Project</h6>
                    <div id="widget_tab">
                        <ul>
                            <li><a href="#tab1" id="tab-1">Basic</a></li>
                            <li><a href="#tab2" id="tab-2">Rewards</a></li>
                            <li><a href="#tab3" id="tab-3">Story</a></li>
                            <li><a href="#tab4" id="tab-4">Preview</a></li>
                            <li><a href="#tab5" id="tab-5">SEO</a></li>
                        </ul>
                    </div>
                </div>
                <div class="widget_content">
                    <div id="tab1">
                        <form method="post" action="{{URL::to('postprojectdetails')}}" class="form_container left_label" id="form103" enctype='multipart/form-data'>
                            <input type='hidden' name='id' value='{{$id}}' >
                            <input type='hidden' name='title' value='{{{$details['title']}}}' >
                            <ul>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title" >Project Name<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input  name="title" type="text" value="{{{$details['title']}}}" maxlength="100" class="large" disabled/>
                                        </div>
                                    </div>
                                </li>
                                <html lang="en">
                                    <li>
                                        <div class="form_grid_12">
                                            <label class="field_title">Category<span class="req">*</span></label>
                                            <div class="form_input">
                                                <select name="categoryid" data-placeholder="Select shipping details" class="chzn-select required" tabindex="13" style="width:350px;">
                                                    @foreach($categories as $category)
                                                    <option value="{{$category->id}}" <?php if ($category->id == $categoryid) { ?> selected="selected" <?php } ?> >{{{$category->categoryname}}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </li>
                                    <input type="hidden" name="userid" value="{{$users['id']}}">
                                    <li>
                                        <div class="form_grid_12">
                                            <label class="field_title">User<span class="req">*</span></label>
                                            <div class="form_input">
                                                <input  name="title" type="text" value="{{{$users['firstname']}}} {{{$users['lastname']}}}" maxlength="100" class="large" disabled/>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form_grid_12 newlidedk">
                                            <label class="field_title">Project Image<span class="req">*</span></label>
                                            <div class="form_input">
                                                @if($details['projectimage']!='')
                                                <img src="{{$details['projectimage']}}" width="56" height="56" alt="gal" style="margin-left:75px;"><br>
                                                @endif
                                                <input type="file" name="projectimage">
                                            </div>
                                            <div class="form_input">
                                                <div class="seprtblk">
                                                    <strong class="center">
                                                        Choose a video (Or) Image from your computer
                                                        <span>MOV, MPEG, AVI, MP4, 3GP, WMV, or FLV • 5MB File limit</span>
                                                        <span>JPEG, PNG, GIF, BMP • 5MB File limit</span>
                                                        <span>640x480 pixels • 4:3 aspect ratio</span>
                                                    </strong>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($errors->has('projectimage')) <p class="help-block">{{ $errors->first('projectimage') }}</p> @endif
                                    </li>
                                    <li>
                                        <div class="form_grid_12">
                                            <label class="field_title">Project Location<span class="req">*</span></label>
                                            <div class="form_input">
                                                <select data-placeholder="Select Country" name="country" style=" width:350px" class="chzn-select required" tabindex="13">
                                                    <option value=''>--Select Country--</option>
                                                    @foreach($countries as $country)
                                                    <option value="{{$country->id}}" @if($country->id==$details['location']) selected="selected" @endif>{{{$country->countryname}}}</option>  
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form_grid_12">
                                            <label class="field_title">Funding Goal<span class="req">*</span></label>
                                            <div class="form_input">
                                                <input name="fundinggoal" type="text" id="funding_goal" maxlength="50" value='{{$details['fundinggoal']}}' class="large required"/>
                                                <span id="fundinggoal_errmsg" style="color:red;"></span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>        
                                        <div class="form_grid_12">      
                                            <label class="field_title">Currency<span class="req">*</span></label>
                                            <div class="form_input">
                                                <select name="currencyid" style=" width:350px" class="chzn-select required" tabindex="13">
                                                    @foreach($currencies as $currency)
                                                    <option value="{{$currency->id}}" @if($currency->id==$details['currencyid']) selected="selected" @endif>{{$currency->currencytype}}</option>  
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form_grid_12">
                                            <label class="field_title">Funding Duration<span class="req">*</span></label>
                                            <div class="form_input">
                                                <input name="fundingduration"  id="fundingdur" type="text" @if($details['endingon']!="0000-00-00")value='{{$details['endingon']}}'@else placeholder="yyyy-mm-dd" @endif class="large required"/> 
                                            </div>
                                        </div>
                                    </li>                                  
                                    <li>
                                        <div class="form_grid_12">
                                            <label class="field_title">Short blurb<span class="req">*</span></label>
                                            <div class="form_input">
                                                <textarea name="shortblurb" cols="50" class="required limitershortblurb" >{{{$details['shortblurb']}}}</textarea>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form_grid_12">
                                            <div class="form_input">
                                                <button type="submit" class="btn_small btn_blue"><span>Update</span></button>
                                            </div>
                                        </div>
                                    </li>
                            </ul>
                        </form>
                    </div>

                    <div id="tab2">
                        <form action="{{URL::to('postreward')}}" method="post" class="form_container left_label" id="form104">
                            <div >                              
                                <div class="user_list">
                                    @foreach($rewards as $key=>$reward)

                                    <div class="user_block">
                                        <h4 style="color: #0068F4;">REWARD #{{$key+1}}</h4><br>

                                        <div class="info_block">
                                            <ul class="list_info">
                                                <li><span><b>Pledge Amount:</b> <i>{{$reward->currencysymbol}}{{$reward->pledgeamount}}</i></span> &nbsp; | &nbsp; <span><b>Estimated Delivery:</b> <i> <?php
                                                            $monthnumber = strstr($reward->estimateddelivery, '-', true);
                                                            $year = strstr($reward->estimateddelivery, '-', false);
                                                            ?>{{date("F",mktime(0,0,0,$monthnumber));}} {{str_replace('-','',$year);}}</i></span> &nbsp; | &nbsp; 
                                                    <div class="pldg-titl" style="width:100%;">
                                                        <span class="num-backers">
                                                            <b>Backers :</b> {{$reward->backerscount}} 
                                                        </span>                                       
                                                        @if($reward->islimited==1)
                                                        @if($reward->quantity==$reward->backerscount)
                                                        <span style='font-size: 13px; padding: 5px;  background: #000; color: #fff;'>
                                                            <span class="limited-number">All gone!</span>
                                                        </span>                                            
                                                        @else
                                                        <span class="bg-yellow " style='font-size: 13px; padding: 5px;'>
                                                            <span class="limited-number"> &nbsp; | &nbsp; <b>Limited :</b> ({{$reward->quantity-$reward->backerscount}} left of {{$reward->quantity}})</span>
                                                        </span>
                                                        @endif
                                                        @endif
                                                    </div>
                                                <li><span><b>Description:</b> <i>{{{$reward->description}}}</i></span></li>
                                            </ul>
                                        </div>
                                        <ul class="action_list">                                                
                                            <li class="right" style="border-bottom:0px;"><a  class="p_edit basic-modal" onclick="popup('{{$reward->id}}');"  href="#">Edit</a></li>
                                            <li class="right"><a class="p_del" onclick="confirmation('{{$reward->id}}')"  href="#">Delete</a></li>
                                        </ul>                               
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div uniqueid="addMoreFields0.26436613842351553" fieldcount="0" maxcountreached="false" totalfieldsadded="0" class="elem_extend" id="reward">
                                <input type='hidden' name='id' value='{{$id}}' >
                                <input type='hidden' name='title' value='{{$details['title']}}' >
                                <ul>
                                    <li>
                                        <fieldset>
                                            <legend>Reward</legend>
                                            <ul>
                                                <li>
                                                    <div class="form_grid_12">
                                                        <label class="field_title">Pledge Amount</label>
                                                        <div class="form_input">
                                                            <div class="form_grid_8 alpha">
                                                                <input name="pledgeamount" type="text" id="pledgeamount" value="" onkeypress="return numbersonly(event)" required style="width: 230px;">                                                               
                                                                <span id="pledgeamount_errmsg" style="color:red;"></span>
                                                            </div>
                                                            <span class="clear"></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form_grid_12">
                                                        <label class="field_title">Description</label>
                                                        <div class="form_input">
                                                            <div class="form_grid_8 alpha">
                                                                <textarea name="description" id="description" required></textarea>
                                                                <span id="description_errmsg" style="color:red;"></span>
                                                            </div>
                                                            <span class="clear"></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form_grid_12 multiline">
                                                        <label class="field_title">Estimated Delivery</label>
                                                        <div class="form_input">
                                                            <input type="text" name="estimateddelivery"  id="estimateddelivery" class="date-block datepicker" style="width:65%;" required placeholder="mm-yyyy">                                                            
                                                            <span class="clear"></span>
                                                        </div>
                                                    </div>
                                                </li>   
                                                <!--                                                <li>
                                                                                                    <div class="form_grid_12">
                                                                                                        <label class="field_title">Shipping Details</label>
                                                                                                        <div class="form_input">
                                                                                                            <div class="form_grid_4 alpha">
                                                                                                                <select name="shipping" data-placeholder="Select shipping details" tabindex="13" style="width:200px;border: #d8d8d8 1px solid;padding:3px;" id="shipping" onchange="shippinginvolved();">
                                                                                                                    <option value="0">No shipping involved</option>
                                                                                                                    <option value="1">Ships anywhere</option>
                                                                                                                </select>
                                                                                                            </div>                                                            
                                                                                                            <div class="form_grid_4" style="display:none" id="shiptodiv">
                                                                                                                <label class="field_title" style="width: 50%;">Select Country</label>
                                                                                                                <select multiple="multiple" name="country[]" id="shipto">
                                                                                                                    @foreach($countries as $country)
                                                                                                                    <option value="{{$country->countryname}}">{{$country->countryname}}</option>
                                                                                                                    @endforeach
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <span class="clear"></span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </li>-->
                                                <li>
                                                    <div class="form_grid_12 multiline">
                                                        <label class="field_title">Set Limit</label>
                                                        <div class="form_input">
                                                            <div class="form_grid_1 alpha">
                                                                <input name="limit" id="limit" type="checkbox" onclick="checkedcheckbox();">
                                                            </div>
                                                            <div class="form_grid_4">
                                                                <input name="limitcount" type="text" id="limitcount" style="display:none;" onkeypress="return numbersonly(event)">
                                                            </div>
                                                            <span class="clear"></span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </fieldset>
                                    </li>
                                </ul>

                                <a href="#" class="addMoreFields">Add More</a>
                            </div>
                            <input type="hidden" name="rewardCount" id="rewardCount" value="0" >
                            <ul>
                                <li>
                                    <div class="form_grid_12">
                                        <div class="form_input">
                                            <button type="submit" class="btn_small btn_blue" style="margin-left:2%;"><span>Submit</span></button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </form>
                    </div>

                    <div id="tab3">                            
                        <div class="page_content">
                            <div class="grid_12 post_preview">
                                <form id="regitstraion_form" autocomplete="off" method="post" action="{{URL::to('postprojectstory')}}" class="form_container left_label" enctype="multipart/form-data">
                                    <input type='hidden' name='id' value='{{$details['id']}}'>       
                                    <input type='hidden' name='title' value='{{{$details['title']}}}' >
                                    <ul>
                                        <li>
                                            <div class="form_grid_12">
                                                <label class="field_title">Project Video <span class="req">*</span></label>
                                                <div class="form_input">
                                                    <!--                                                    @if($details->projectvideo!='')
                                                                                                        <a href="javascript:void(0)"> <span  class="round-button" onclick="deletevideo({{$details->id}});">x</span></a>
                                                                                                        @endif-->
                                                    <div class="col-md-9">
                                                        @if($details->projectvideo!='')
                                                        <?php
                                                        $array = explode('/', $details->projectvideo);
                                                        $explodedata = explode('.', $array[4]);
                                                        ?>
                                                        @if(Str::contains("www.youtube.com",$array))
                                                        <iframe src="{{$details->projectvideo}}"  width="100%" height="500px" frameborder="0" style="margin-bottom:20px;" allowfullscreen></iframe>
                                                        @else 
                                                        <?php
                                                        if ($explodedata[1] == 'JPEG' || $explodedata[1] == 'PNG' || $explodedata[1] == 'GIF' || $explodedata[1] == 'BMP' ||
                                                                $explodedata[1] == 'jpeg' || $explodedata[1] == 'png' || $explodedata[1] == 'gif' || $explodedata[1] == 'bmp' || $explodedata[1] == 'jpg') {
                                                            ?>
                                                            <script>
                                                                                $('#textchage').html('Image');</script>	
                                                            <img class="preview" id="img" style="width:100%;height:100%;margin-bottom:20px;" src="{{URL::to('');}}/{{$details->projectvideo}}" onerror="this.src='{{URL::To('main/images/projectdefault.png');}}'">
                                                        <?php } else { ?>
                                                            <video width="100%" height="100%" controls style="margin-bottom:20px;">
                                                                <source src="{{URL::to('');}}/{{$details->projectvideo}}" >
                                                                {{trans('messages.novideosupport')}}.
                                                            </video>
                                                        <?php } ?>
                                                        @endif
                                                        @endif
                                                        <span>Choose image or video to upload</span><br>
                                                        <input type='file' class="large uploadvalue" name='projectvideo' style="margin-left:20%">
                                                        <span class="filename">No file selected</span>

                                                        <div class="">
                                                            <div class="seprtblk">
                                                                <strong class="center">
                                                                    Choose a video (Or) Image from your computer
                                                                    <span>MOV, MPEG, AVI, MP4, 3GP, WMV, or FLV • 5MB File limit</span>
                                                                    <span>JPEG, PNG, GIF, BMP • 5MB File limit</span>
                                                                    <span>640x480 pixels • 4:3 aspect ratio</span>
                                                                </strong>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <br>
                                                    <p style="float:left;margin:10px 10px 10px 5%;">Or</p>
                                                    <input type="text" class="" name="youtubelink" placeholder="Youtube link">
                                                    <p style="margin-left: 0%;">Eg: https://www.youtube.com/watch?v=UFrYGiSi0Uw</p>
                                                </div>
                                                @if ($errors->has('projectvideo')) <p class="help-block">{{ $errors->first('projectvideo') }}</p> @endif
                                        </li>   
                                        <li>
                                            <div class="form_grid_12">
                                                <label class="field_title">Project Description <span class="req">*</span></label>
                                                <div class="form_input">
                                                    <textarea cols="80" id="edit" name="description" rows="10" class="required">
                                                    {{$details['description']}}
                                                    </textarea> 
                                                </div>
                                            </div>
                                        </li>   
                                        <li>
                                            <div class="form_grid_12">
                                                <label class="field_title">Risks and Challenges <span class="req">*</span></label>
                                                <div class="form_input">
                                                    <textarea name='risks'>{{{$details['risks']}}}</textarea>
                                                </div>
                                            </div>
                                        </li>   
                                        <li>
                                            <div class="form_grid_12">
                                                <div class="form_input">
                                                    <button name="submit" type="submit" class="btn_small btn_blue"><span>Submit</span></button>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </form>
                            </div>                          
                        </div>
                    </div>                  
                    <div id="tab4" class="form_container left_label">
                        <input type='hidden' name='id'>
                        <div class="widget_content">
                            <div class="page_content">
                                <div class="grid_12 post_preview">
                                    <center><h2 class="post_title">{{{$details->title}}}<br>
                                            <h6 style="margin-top:0px;"> <i>By <a href="#">{{{$details->firstname}}}</a></i></h6></h2></center>

                                    <div class="grid_8">

                                        <?php
                                        if ($details->projectvideo != '') {
                                            $array = explode('/', $details->projectvideo);
                                            ?>
                                            @if(Str::contains("www.youtube.com",$array))
                                            <iframe src="{{$details->projectvideo}}" width="100%" height="480px" frameborder="0" allowfullscreen></iframe>
                                            @else 
                                            <?php
                                            $explodedata = explode('.', $array[4]);
                                            if ($explodedata[1] == 'JPEG' || $explodedata[1] == 'PNG' || $explodedata[1] == 'GIF' || $explodedata[1] == 'BMP' ||
                                                    $explodedata[1] == 'jpeg' || $explodedata[1] == 'png' || $explodedata[1] == 'gif' || $explodedata[1] == 'bmp' || $explodedata[1] == 'jpg') {
                                                ?>
                                                <img class="preview" id="img" style="width:100%;height:100%;" src="{{URL::to('');}}/{{$details->projectvideo}}" >
                                            <?php } else { ?>
                                                <video width="100%" height="100%" controls>
                                                    <source src="{{URL::to('');}}/{{$details->projectvideo}}" >
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
                                                        <span class="user_sl"><a @if($details->totalbacking!=0) href="{{URL::to('backingbyprojectid?id=')}}{{$details->id}}" @else href="javascript:void(0)" @endif>Backers</a></span>
                                                    </span>
                                                </div>
                                                <h3>{{$details->totalbacking}}</h3>
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
                                                <h3>${{$details->totalpledgeamount}}</h3>
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
                                                <h3>${{$details->fundinggoal}}</h3>
                                                <p>
                                                    Funding Goal
                                                </p>
                                            </div>
                                            @if($details->dayscount<0)
                                            <div class="item_block">
                                                <div class="icon_block tur_block" style="padding:0px;">
                                                    <span class="item_icon">
                                                        <span class="calendar_sl"><a href="#">Days ago</a></span>
                                                    </span>
                                                </div>
                                                <h3>{{$details->dayscount}}</h3>
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
                                                <h3>{{$details->dayscount}}</h3>
                                                <p>
                                                    Days to go
                                                </p>
                                            </div>
                                            @endif

                                        </div>
                                        <div style="margin-top:20px;">
                                            @if ($details->projectverified == 0)
                                            <form method="post" action="{{URL::to('publishproject');}}">
                                                <input type="hidden" name="projectid" value="{{$details->id}}">
                                                <input type="submit"  value="Submit for approval" class="btn_small btn_blue"  style="margin-top:20px;line-height: 30px !important;">
                                            </form>
                                            @elseif($details->projectverified == 1)
                                            <span style="background-color: firebrick;line-height: 30px !important;" class="btn_small btn_blue">Waiting for admin approval</span>

                                            @elseif($details->projectverified == 2)
                                            <span style="background-color:#2bde73;line-height: 30px !important;" class="btn_small btn_blue">Project approved</span>

                                            @else
                                            <form method="post" action="{{URL::to('publishproject');}}">
                                                <input type="hidden" name="projectid" value="{{$details->id}}">
                                                <input type="submit"  value="Resubmit for approval" class="btn_small btn_blue"  style="background:#00a0ff;border:1px solid #00a0ff;margin-top:20px;line-height: 30px !important;">
                                            </form>
                                            @endif
                                        </div>
                                    </div>   
                                    <br>
                                    <p>
                                        {{{$details->shortblurb}}}
                                    </p>

                                    <ul class="clip_icn">
                                        <li><a href="#">{{{$details->categoryname}}}</a></li>
                                    </ul>
                                    <hr>
                                    <div class="grid_8 " style="margin-bottom:5%">
                                        <h5>STORY</h5>
                                        {{$details->description}}
                                        <h5>RISKS AND CHALLENGES</h5>
                                        {{{$details->risks}}}
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
                    <div id="tab5" class="form_container left_label">
                        <form id="signupform" autocomplete="off" method="post" action="{{URL::to('postprojectseo')}}" class="form_container left_label" novalidate="novalidate">
                            <input type='hidden' name='id' value='{{$details['id']}}'>       
                            <input type='hidden' name='title' value='{{{$details['title']}}}' >
                            <ul>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Meta Title<span class="req">*</span></label>
                                        <div class="form_input">                                           
                                            <input type='text' class="large required" name='metatitle' value="{{{$details['metatitle']}}}">
                                        </div>
                                    </div>
                                </li>   
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Meta Keyword<span class="req">*</span></label>
                                        <div class="form_input">
                                            <textarea cols="80" id="editor1" name="metakeyword" rows="3" class="limiter required">{{{$details['metakeyword']}}}</textarea> 
                                        </div>
                                    </div>
                                </li>   
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Meta Description<span class="req">*</span></label>
                                        <div class="form_input">
                                            <textarea name='metadescription' rows="5" class="limiterbig required">{{{$details['metadescription']}}}</textarea>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <div class="form_input">
                                            <button name="submit" type="submit" class="btn_small btn_blue"><span>Submit</span></button>
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
    <script type="text/javascript" src="{{URL::to('main/tinymce/js/tinymce/tinymce.min.js');}}"></script>
    <script src="{{URL::to('admin/js/jquery.validate.min.js');}}"></script>


    <script>
                                                                   $(window).load(function() {
                                                                    var error_story = $('.login_invalidsample').text();
                                                                            var success = $('.login_success').text();
                                                                            var project = 'Project Updated Successfully';
                                                                            var reward = 'Reward successfully added';
                                                                            var story = 'Story Updated Successfully!';
                                                                            var seo = 'SEO successfully added!';
                                                                            var editreward = 'Reward successfully edited!';
                                                                            var deletereward = 'Reward successfully deleted!';
                                                                            var storyerror = 'File type Error!';
                                                                            if ((success.trim()) == project){
                                                                    $("#tab-1").addClass('active_tab');
                                                                    } else if ((success.trim()) == reward){
                                                                    $("#tab1").hide();
                                                                            $("#tab-1").removeClass('active_tab');
                                                                            $("#tab-2").addClass('active_tab');
                                                                            $("#tab2").show();
                                                                    } else if ((success.trim()) == story){
                                                                    $("#tab1").hide();
                                                                            $("#tab-1").removeClass('active_tab');
                                                                            $("#tab-3").addClass('active_tab');
                                                                            $("#tab3").show();
                                                                    } else if ((success.trim()) == seo){
                                                                    $("#tab1").hide();
                                                                            $("#tab-1").removeClass('active_tab');
                                                                            $("#tab-5").addClass('active_tab');
                                                                            $("#tab5").show();
                                                                    } else if ((success.trim()) == editreward){
                                                                    $("#tab1").hide();
                                                                            $("#tab-1").removeClass('active_tab');
                                                                            $("#tab-2").addClass('active_tab');
                                                                            $("#tab2").show();
                                                                    } else if ((success.trim()) == deletereward){
                                                                    $("#tab1").hide();
                                                                            $("#tab-2").addClass('active_tab');
                                                                            $("#tab-1").removeClass('active_tab');
                                                                            $("#tab2").show();
                                                                    } else if ((error_story.trim()) == storyerror){
                                                                    $("#tab1").hide();
                                                                            $("#tab-1").removeClass('active_tab');
                                                                            $("#tab-3").addClass('active_tab');
                                                                            $("#tab3").show();
                                                                    }
                                                                    });</script>  
    <script type="text/javascript">

                        tinymce.init({
                        selector: "#edit",
                                // ===========================================
                                // INCLUDE THE PLUGIN
                                // ===========================================

                                plugins: [
                                        "advlist autolink lists link image charmap print preview anchor",
                                        "searchreplace visualblocks code fullscreen",
                                        "insertdatetime media table contextmenu paste jbimages"
                                ],
                                // ===========================================
                                // PUT PLUGIN'S BUTTON on the toolbar
                                // ===========================================

                                toolbar: "insertfile undo redo | styleselect | bold italic | link image jbimages",
                                // ===========================================
                                // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
                                // ===========================================

                                relative_urls: false

                        });</script>
    <script>

                        CKEDITOR.replace('editor1', {
                        fullPage: true,
                                allowedContent: true,
                                extraPlugins: 'wysiwygarea'
                        });</script>
    <script>
                        function checkedcheckbox() {
                        var x = document.getElementById("reward").getAttribute("totalfieldsadded");
                                var temp = document.getElementById("limit").checked;
                                if (temp == true) {
                        var userslist = document.getElementById("limitcount");
                                userslist.style.display = "block";
                                $('#limitcount').addClass('required');
                        } else {
                        var userslist = document.getElementById("limitcount");
                                userslist.style.display = "none";
                                $('#limitcount').removeClass('required');
                        }
                        for (var i = 0; i < x; i++) {
                        var temp = document.getElementById("limit_" + i).checked;
                                if (temp == true) {
                        var userslist = document.getElementById("limitcount_" + i);
                                userslist.style.display = "block";
                                $("#limitcount_" + i).addClass('required');
                        } else {
                        var userslist = document.getElementById("limitcount_" + i);
                                userslist.style.display = "none";
                                $("#limitcount_" + i).removeClass('required');
                        }
                        }
                        }
                function shippinginvolved() {
                var x = document.getElementById("reward").getAttribute("totalfieldsadded");
                        var temp = document.getElementById("shipping").value;
                        if (temp == 1) {
                var userslist = document.getElementById("shiptodiv");
                        userslist.style.display = "block";
                        $('#shipto').addClass('required');
                } else {
                var userslist = document.getElementById("shiptodiv");
                        userslist.style.display = "none";
                        $('#shipto').removeClass('required');
                }
                for (var i = 0; i < x; i++) {
                var temp = document.getElementById("shipping_" + i).value;
                        if (temp == 1) {
                var userslist = document.getElementById("shiptodiv_" + i);
                        userslist.style.display = "block";
                        $("#shipto_" + i).addClass('required');
                } else {
                var userslist = document.getElementById("shiptodiv_" + i);
                        userslist.style.display = "none";
                        $("#shipto_" + i).removeClass('required');
                }
                }
                }

    </script>
    <script type="text/javascript">
                function confirmation(id) {
                var answer = confirm("Are you sure to delete this record?");
                        if (answer) {
                location.href = 'deletereward?id=' + id;
                }
                else {
                return false;
                }
                }
                //function popup() {
                //$('<div></div>').load('editreward.blade.php').modal();
                //}

                function popup(valID){
                $.colorbox({href:"editreward?id=" + valID});
                }

                $("#fundingdur").click(function(){
                $(".datepicker-days").css('display', 'block');
                });
                        $(".date-block").live('click', function(){
                $(".datepicker-months").css('display', 'block');
                });</script>

    <script>
                        function deletevideo(id) {
                        if (id != '') {
                        $.ajax({
                        url: "deletevideo",
                                type: "post",
                                data: {'videoid':id},
                                success: function(data) {
                                if (data != 0) {
                                window.location.href = "";
                                }
                                }
                        });
                        }
                        }
    </script>
    <script type="text/javascript">
                function numbersonly(e){
                var unicode = e.charCode? e.charCode : e.keyCode
                        if (unicode != 8){ //if the key isn't the backspace key (which we should allow)
                if (unicode < 48 || unicode > 57) //if not a number
                        return false //disable key press
                }
                }

//                $('#description').keyup(function() {
//                var $th = $(this);
//                        $th.val($th.val().replace(/[^a-zA-Z0-9 .]/g, function(str)
//                        {
//                        return '';
//                        }
//                        ));
//                });</script>       
    <script>
                $("#funding_goal").keypress(function (e) {
                //if the letter is not digit then display error and don't type anything
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                // $("#fundinggoal_errmsg").html("Funding goal should be Numeric value.").show().fadeOut(10000);
                return false;
                }
                });
                        $("#pledgeamount").keypress(function (e) {
                //if the letter is not digit then display error and don't type anything
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                //$("#pledgeamount_errmsg").html("Pledge amount should be Numeric value.").show().fadeOut(10000);
                return false;
                }
                });
//        $('#description').keyup(function() {
//            var $th = $(this);
//            $th.val( $th.val().replace(/[^a-zA-Z0-9]/g, function(str) 
//            { 
//                $("#description_errmsg").html("Should be Alphanumeric values.").show().fadeOut(10000);
//                return ''; 
//            } 
//            ));
//        });


    </script>

    <script>
                        $("#form104").validate({
                rules: {
                pledgeamount: {
                required: true,
                },
                        description: {
                        required: true,
                        },
                        estimateddelivery: {
                        required: true,
                        },
                },
                });

    </script>    

    @stop