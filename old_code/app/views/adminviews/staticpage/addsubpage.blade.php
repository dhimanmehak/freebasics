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
                    <h6>Add Sub Page</h6>
                </div>
                <div class="widget_content">

                    <form action="{{URL::to('postaddsubpage')}}" id="form103" method="post" class="form_container left_label">
                        <input type="hidden" name="category" value="sub"/>
                        <ul>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Select Main Page<span class="req">*</span></label>
                                    <div class="form_input">
                                        <select data-placeholder="Select Status" name="parent" style=" width:350px" class="chzn-select" tabindex="13">
                                            @foreach($mainpages as $mainpage)
                                            <option value="{{$mainpage->id}}">{{$mainpage->pagename}}</option>     
                                            @endforeach
                                        </select>                                    
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Page Name<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="pagename" type="text" tabindex="1" class="required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Page Title<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="pagetitle" type="text" tabindex="2" class="required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">SEO Url<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="seourl" type="text" tabindex="3" class="required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Description<span class="req">*</span></label>
                                    <div class="form_input">
                                        <textarea cols="80" id="editor1" name="description" rows="10" class="required"></textarea>                                      
                                        <p>

                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Meta Title<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="metaname" type="text" tabindex="1" class="required"/>
                                    </div>
                                </div>
                            </li>
                             <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Meta Keyword<span class="req">*</span></label>
                                    <div class="form_input">
                                        <textarea cols="80" name="metakeyword" rows="8" class="required limiter"></textarea>                                      
                                        <p>

                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Meta Description<span class="req">*</span></label>
                                    <div class="form_input">
                                        <textarea cols="80" name="metadescription" rows="8" class="required limiterbig"></textarea>                                      
                                        <p>

                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title"> Hidden Page<span class="req">*</span></label>
                                    <div class="form_input on_off">
                                        <input type="checkbox" name="hidden" id="on_off_on" checked/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title"> Header Link<span class="req">*</span></label>
                                    <div class="form_input on_off">
                                        <input type="checkbox"  name="header" id="on_off_on" checked=""/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title"> Footer Link<span class="req">*</span></label>
                                    <div class="form_input on_off">
                                        <input type="checkbox"  name="footer" id="on_off_on" checked=""/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Status<span class="req">*</span></label>
                                    <div class="form_input">
                                        <select data-placeholder="Select Status" name="status" style=" width:350px" class="chzn-select" tabindex="13">
                                            <option value="active" >active</option>     
                                            <option value="inactive">inactive</option>  
                                        </select>                                    
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