@extends('layouts.adminlayout')
@section('content')
<div id="content">
    <div class="grid_container">
        <div class="grid_12 full_block">
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon list_image"></span>
                    <h6>View Email Template</h6>
                </div>
                <div class="widget_content">

                    <form action="{{URL::to('postedittemplate')}}" method="post" class="form_container left_label">
                        @foreach($details as $detail)
                        <input name="id" type="hidden" value="{{$detail->id}}">
                        <ul>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Template Name</label>
                                    <div class="form_input">
                                        <input name="templatename" type="text" value="{{$detail->templatename}}" tabindex="1" disabled/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Email Subject</label>
                                    <div class="form_input">
                                        <input name="subject" type="text" value="{{$detail->subject}}" tabindex="2" disabled/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Subscription</label>
                                    <div class="form_input">
                                        <input name="subscription" type="checkbox" tabindex="3" style="width: 20px;height: 20px;" @if($detail->subscription==1)checked @endif/>
                                        <span><i>Check if it is a subscription mail.</i></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Sender Name</label>
                                    <div class="form_input">
                                        <input name="sendername" type="text" value="{{$detail->sendername}}" tabindex="2" disabled/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Sender Email Address</label>
                                    <div class="form_input">
                                        <input name="senderemail" type="text" value="{{$detail->senderemail}}" tabindex="2" disabled/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Email Content</label>
                                    <div class="form_input">
                                        <textarea name="emailcontent" id="editor1" disabled="" rows="20">{{$detail->emailcontent}}
                                        </textarea>                                      
                                        <p>

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
<script>

    CKEDITOR.replace('editor1', {
        fullPage: true,
        allowedContent: true,
        extraPlugins: 'wysiwygarea'
    });

</script>
@stop