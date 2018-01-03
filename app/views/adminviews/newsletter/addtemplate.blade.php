@extends('layouts.adminlayout')
@section('content')
<div id="content">
    <div class="grid_container">
        <div class="grid_12 full_block">
            @if(Session::has('failed'))
            <div class="login_invalid">
                <span class="icon"></span> {{Session::get('failed');}}
            </div>
            @endif
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon list_image"></span>
                    <h6>Add Email Template</h6>
                </div>
                <div class="widget_content">

                    <form action="{{URL::to('postaddtemplate')}}" method="post" id="form103" class="form_container left_label">
                        <ul>

                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Template Name<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="templatename" type="text" tabindex="1" class="required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Email Subject<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="subject" type="text" tabindex="2" class="required"/>
                                    </div>
                                </div>
                            </li>
                             <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Subscription</label>
                                    <div class="form_input">
                                        <input name="subscription" type="checkbox" tabindex="3" style="width: 20px;height: 20px;"/>
                                        <span><i>Check if it is a subscription mail.</i></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Sender Name<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="sendername" type="text" tabindex="4" class="required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Sender Email Address<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="senderemail" type="text" tabindex="5" class="required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Email Content</label>
                                    <div class="form_input">
                                        <textarea cols="80" id="editor1" name="emailcontent" rows="10" class="required">
			
                                        </textarea>                                      
                                        <p>

                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="form_grid_12">
                                    <div class="form_input">                                       
                                        <button type="submit" class="btn_small btn_blue"><span>Submit</span></button>
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
<script>

    CKEDITOR.replace('editor1', {
        fullPage: true,
        allowedContent: true,
        extraPlugins: 'wysiwygarea'
    });

</script>
@stop