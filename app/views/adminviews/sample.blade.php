@extends('layouts.adminlayout')
@section('content')
<div id="content">
    <div class="grid_container">
        <div class="grid_12">
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon list"></span>
                    <h6>Sample</h6>
                </div>
                <div class="widget_content">
                    <form autocomplete="off" method="post" action="{{URL::to('postsample')}}" class="form_container left_label" enctype="multipart/form-data">

                        <ul>                         
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Upload file<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="file" type="file"  maxlength="100" class="large" />
                                    </div>
                                </div>
                            </li>  

                            <li>
                                <div class="form_grid_12">
                                    <div class="form_input">
                                        <input name="submit" type="submit"  maxlength="100" class="large" value='Submit'/>
                                    </div>
                                </div>
                            </li>  
                        </ul>
                    </form>
                </div>

                <div class="widget_content">
                    <form autocomplete="off" method="post" action="{{URL::to('deletesample')}}" class="form_container left_label" enctype="multipart/form-data">
                        <input name="id" type="hidden" value='{{$contact->id}}' maxlength="100" class="large" />
                        <ul>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Delete file<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="file" type="text" value='{{URL::to($contact->message)}}' maxlength="100" class="large" />
                                    </div>
                                </div>
                            </li>  
                            <li>
                                <div class="form_grid_12">
                                    <div class="form_input">
                                        <input name="submit" type="submit"  maxlength="100" class="large" value='Submit'/>
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