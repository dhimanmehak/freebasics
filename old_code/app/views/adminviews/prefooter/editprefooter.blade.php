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
                    <h6>Edit Prefooter</h6>
                </div>
                <div class="widget_content">
                    <form autocomplete="off" method="post" action="{{URL::to('posteditprefooter')}}" id="form103" class="form_container left_label" enctype="multipart/form-data">
                        @foreach($prefooters as $prefooter)
                        <input type='hidden' value='{{$prefooter->id}}' name='id'/>
                        
                        <ul>                           
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title" >Prefooter Title<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="prefootertitle" type="text" value="{{$prefooter->title}}" maxlength="100" class="large required">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title" >Prefooter Link<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="prefooterlink" type="text" value="{{$prefooter->footerlink}}" maxlength="100" class="large required">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Prefooter Image<span class="req">*</span></label>
                                    <img src="{{$prefooter->image}}" width="56" height="56" alt="prefooter" style='margin-left:15px; float:left;'>
                                    <div class="form_input">                                       
                                        <input name="prefooterimage" type="file" maxlength="50" class="large"/>
                                    </div>
                                </div>
                                @if ($errors->has('prefooterimage')) <p class="help-block">{{ $errors->first('prefooterimage') }}</p> @endif
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Prefooter Description<span class="req">*</span></label>
                                    <div class="form_input">
                                        <textarea name="description" class="required">{{$prefooter->description}}</textarea>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Status<span class="req">*</span></label>
                                    <div class="form_input">
                                        <select data-placeholder="Select Status" name="status" style=" width:350px" class="chzn-select required" tabindex="13">
                                            <option value='{{$prefooter->status}}'>{{$prefooter->status}}</option>
                                            <option value="active">active</option>     
                                            <option value="inactive">inactive</option>  
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
                                        <button id="signupsubmit" name="signup" type="submit" class="btn_small btn_blue"><span>Edit Prefooter</span></button>
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