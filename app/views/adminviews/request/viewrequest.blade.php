@extends('layouts.adminlayout')
@section('content')
<div id="content">
    <div class="grid_container">
        <div class="grid_12">
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon list"></span>
                    <h6>View Request</h6>
                </div>
                <div class="widget_content">
                    <form autocomplete="off" method="post" action="#" class="form_container left_label" enctype="multipart/form-data">
                        <ul>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Project Title<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="slidername" type="text" value="{{$request->projecttitle}}" maxlength="100" class="large" disabled=""/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title" >Funding Goal<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="slidertitle" type="text" value="{{$request->fundinggoal}}" maxlength="100" class="large" disabled="">
                                    </div>
                                </div>
                            </li>     
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title" >Funding Duration<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="slidertitle" type="text" value="{{$request->fundingduration}}" maxlength="100" class="large" disabled="">
                                    </div>
                                </div>
                            </li> 
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title" >Status<span class="req">*</span></label>
                                    <div class="form_input">
                                        @if($request->status == 1)
                                        <span class="badge_style b_success">Accepted</span> 
                                        @elseif($request->status == 2)
                                        <span class="badge_style b_pending">Denied</span> 
                                        @else
                                        <span class="badge_style b_notDone">Waiting</span> 
                                        @endif
                                    </div>
                                </div>
                            </li> 
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Message<span class="req">*</span></label>
                                    <div class="form_input">
                                        <textarea name="sliderdescription" maxlength="100" disabled="">{{$request->message}}</textarea>
                                    </div>
                                </div>
                            </li>  
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title" >Created on<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="slidertitle" type="text" value="{{$request->createdon}}" maxlength="100" class="large" disabled="">
                                    </div>
                                </div>
                            </li> 
<!--                            <li>
                                <div class="form_grid_12">
                                    <div class="form_input">
                                        <?php $name = Session::get('adminname'); ?>
                                        @if($name=="demo")
                                        <a class="inline cboxElement btn_small btn_blue" href="#inline_content" style="line-height: 28px !important;color: #fff;">Accept</a>
                                        @else
                                        <a href="{{URL::to('changerequeststatus?id=')}}{{$request->id}}&&status=1" type="submit" class="btn_small btn_blue" style="line-height: 28px !important;color: #fff;">Accept</a>      
                                        @endif
                                        @if($name=="demo")
                                        <a class="inline cboxElement btn_small btn_orange" href="#inline_content" style="line-height: 28px !important;color: #fff;">Deny</a>
                                        @else                                
                                        <a href="{{URL::to('changerequeststatus?id=')}}{{$request->id}}&&status=2" type="submit" class="btn_small btn_orange" style="line-height: 28px !important;color: #fff;">Deny</a>
                                        @endif
                                        <a href='{{URL::to('requestlist')}}' class="btn_small btn_gray" style='line-height: 2.7 !important;'>Back</a>
                                    </div>
                                </div>
                            </li>-->
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <span class="clear"></span>
</div>
@stop