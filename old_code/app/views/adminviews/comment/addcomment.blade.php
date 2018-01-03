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
                    <h6>Add Comment</h6>
                </div>
                <div class="widget_content">
                    <form id="form103" autocomplete="off" method="post" action="{{URL::to('adminpostcomment')}}" class="form_container left_label">
                        <input type="hidden" value="{{$projectid}}" name="projectid">
                        <ul>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Project Name<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input type="text" name="title"  maxlength="100" class="large required" value="{{$projecttitle}}"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Username<span class="req">*</span></label>
                                    <div class="form_input">
                                        <select name="userid">
                                            @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->email}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </li> 
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Comment<span class="req">*</span></label>
                                    <div class="form_input">                                           
                                        <textarea class="large required" name='comment' ></textarea>
                                    </div>
                                </div>
                            </li>                          

                            <li>
                                <div class="form_grid_12">
                                    <div class="form_input">
                                        <input type="submit" value="submit" class="btn_small btn_blue" >
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