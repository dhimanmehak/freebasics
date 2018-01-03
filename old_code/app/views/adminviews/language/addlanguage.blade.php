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
                    <h6>Add Language</h6>
                </div>
                <div class="widget_content">
                    <form id="form103" autocomplete="off" method="post" action="{{URL::to('postaddlanguage')}}" class="form_container left_label">
                        <ul>                            
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Language Name<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input  name="langname" type="text" value="" maxlength="100" class="large required">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title" >Language Code<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="langcode" type="text" value="" maxlength="50" class="large required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title" id="lpassword" for="password">Status<span class="req">*</span></label>
                                    <div class="form_input">
                                        <select data-placeholder="Select Status" name="status" style=" width:350px" class="chzn-select required" tabindex="13">
                                            <option value=""></option>                                                                                   
                                            <option value="1">active</option>
                                            <option value="0">inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="form_grid_12">
                                    <div class="form_input">
                                        <button id="signupsubmit" name="signup" type="submit" class="btn_small btn_blue"><span>Add Language</span></button>
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