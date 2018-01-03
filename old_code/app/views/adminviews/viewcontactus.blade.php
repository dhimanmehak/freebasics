@extends('layouts.adminlayout')
@section('content')
<div id="content">
    <div class="grid_container">
        <div class="grid_12">
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon list"></span>
                    <h6>View Contact</h6>
                </div>
                <div class="widget_content">
                    <form autocomplete="off" method="post" action="#" class="form_container left_label" enctype="multipart/form-data">
                      
                        <ul>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Name<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="slidername" type="text" value="{{$contact->firstname}} {{$contact->lastname}}" maxlength="100" class="large" disabled=""/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title" >Email<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="slidertitle" type="text" value="{{$contact->email}}" maxlength="100" class="large" disabled="">
                                    </div>
                                </div>
                            </li>     
                             <li>
                                <div class="form_grid_12">
                                    <label class="field_title" >Project<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="slidertitle" type="text" value="{{$contact->title}}" maxlength="100" class="large" disabled="">
                                    </div>
                                </div>
                            </li> 
                             <li>
                                <div class="form_grid_12">
                                    <label class="field_title" >Subject<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="slidertitle" type="text" value="{{$contact->subject}}" maxlength="100" class="large" disabled="">
                                    </div>
                                </div>
                            </li> 
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Message<span class="req">*</span></label>
                                    <div class="form_input">
                                        <textarea name="sliderdescription" maxlength="100" disabled="">{{$contact->message}}</textarea>
                                    </div>
                                </div>
                            </li>  
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title" >Created on<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="slidertitle" type="text" value="{{$contact->createdon}}" maxlength="100" class="large" disabled="">
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