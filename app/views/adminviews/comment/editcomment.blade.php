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
                    <h6>Edit Comment</h6>
                </div>
                <div class="widget_content">
                    <form id="form103" autocomplete="off" method="post" action="{{URL::to('posteditcomment')}}" class="form_container left_label">
                        <input type="hidden" value="{{$comment->id}}" name="id">
                        <ul>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Project Name<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input type="text" name="title" value="{{$comment->title}}" maxlength="100" class="large required" disabled/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Comment<span class="req">*</span></label>
                                    <div class="form_input">                                           
                                         <textarea class="large required" name='comment'>{{$comment->comment}}</textarea>
                                    </div>
                                </div>
                            </li>   
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Username<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input type='text' class="large required" name='username'  value="{{$comment->username}}" disabled>
                                    </div>
                                </div>
                            </li>   
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Posted on<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input type='text' class="large required" name='postedon' value="{{$comment->postedon}}" disabled>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
    <span class="clear"></span>
</div>
@stop