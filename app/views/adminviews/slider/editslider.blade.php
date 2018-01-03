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
                    <h6>Edit Slider</h6>
                </div>
                <div class="widget_content">
                    <form id="form103" autocomplete="off" method="post" action="{{URL::to('posteditslider')}}" class="form_container left_label" enctype="multipart/form-data">
                        @foreach($sliders as $slider)
                        <input type="hidden" value="{{$slider->id}}" name="id">
                        <ul>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Slider Name<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="slidername" type="text" value="{{$slider->slidername}}" maxlength="100" class="large required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title" >Slider Title<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="slidertitle" type="text" value="{{$slider->slidertitle}}" maxlength="100" class="large required">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Slider URL<span class="req">*</span></label>
                                    <div class="form_input">
                                     <input name="sliderurl" type="text" value="{{$slider->sliderurl}}" maxlength="100" class="large required">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Slider Image<span class="req">*</span></label>
                                    <div class="form_input">  
                                        <img src="{{$slider->sliderimage}}" width="56" height="56" alt="slider" style="margin-left:75px;"><br>
                                        <input name="sliderimage" type="file"  maxlength="50" class="large"/>
                                    </div>
                                </div>
                                @if ($errors->has('sliderimage')) <p class="help-block">{{ $errors->first('sliderimage') }}</p> @endif
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Slider Description<span class="req">*</span></label>
                                    <div class="form_input">
                                        <textarea name="sliderdescription">{{$slider->sliderdescription}}</textarea>
                                    </div>
                                </div>
                            </li>                            
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Status<span class="req">*</span></label>
                                    <div class="form_input">
                                        <select data-placeholder="Select Status" name="status" style=" width:350px" class="chzn-select" tabindex="13">
                                            <option value="active"  @if($slider->status=="active")selected="selected" @endif>active</option>     
                                            <option value="inactive" @if($slider->status=="inactive")selected="selected" @endif>inactive</option>  
                                        </select>                                    
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
                                        <button id="signupsubmit" name="signup" type="submit" class="btn_small btn_blue"><span>Update Slider</span></button>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        </ul>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
    <span class="clear"></span>
</div>
@stop