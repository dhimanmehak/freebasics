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
                    <h6>Add Slider</h6>
                </div>
                <div class="widget_content">
                    <form id="form103" autocomplete="off" method="post" action="{{URL::to('postaddslider')}}" class="form_container left_label" enctype="multipart/form-data">
                        <ul>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Slider Name<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="slidername" type="text" value="" maxlength="100" class="large required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title" >Slider Title<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="slidertitle" type="text" value="" maxlength="100" class="large required">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Slider URL<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="sliderurl" type="text" value="" maxlength="100" class="large required">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12 splerror">
                                    <label class="field_title">Slider Image<span class="req">*</span></label>
                                    <div class="form_input">                                       
                                        <input name="sliderimage" type="file" value="" maxlength="50" class="large required"/>
                                    </div>
                                </div>
                                @if ($errors->has('sliderimage')) <p class="help-block">{{ $errors->first('sliderimage') }}</p> @endif
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Slider Description<span class="req">*</span></label>
                                    <div class="form_input">
                                        <textarea name="sliderdescription" class="required"></textarea>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Status<span class="req">*</span></label>
                                    <div class="form_input">
                                        <select data-placeholder="Select Status" name="status" style=" width:350px" class="chzn-select" tabindex="13">
                                            <option value="active">active</option>     
                                            <option value="inactive">inactive</option>  
                                        </select>                                    
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <div class="form_input">
                                        <button id="signupsubmit" name="signup" type="submit" class="btn_small btn_blue"><span>Add Slider</span></button>
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
<style>
    .splerror label.error {
        position: absolute;
        right: -140px;
    }

    .splerror div.uploader{overflow: visible;}

</style>
@stop

