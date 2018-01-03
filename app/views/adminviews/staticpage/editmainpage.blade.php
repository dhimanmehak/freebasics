@extends('layouts.adminlayout')
@section('content')
<div id="content">
    <div class="grid_container">
        <div class="grid_12 full_block">
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon list_image"></span>
                    <h6>Edit {{$category}} Page</h6>
                </div>
                <div class="widget_content">

                    <form action="{{URL::to('posteditmainpage')}}" id="form103" method="post" class="form_container left_label">
                        @foreach($pages as $page)
                        <input type="hidden" name="id" value="{{$page->id}}">
                        <input type="hidden" name="category" value="{{$page->category}}">
                        <ul>
                            @if($page->category=="sub")
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Select Main Page<span class="req">*</span></label>
                                    <div class="form_input">
                                        <select data-placeholder="Select Status" name="parent" style=" width:350px" class="chzn-select" tabindex="13">
                                            @foreach($mainpages as $mainpage)
                                            <option value="{{$mainpage->id}}" <?php if ($mainpage->id == $parent) { ?> selected="selected" <?php } ?>>{{$mainpage->pagename}}</option>     
                                            @endforeach
                                        </select>                                    
                                    </div>
                                </div>
                            </li>
                            @endif
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Page Name<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="pagename" type="text" value="{{$page->pagename}}" tabindex="1" class="required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Page Title<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="pagetitle" type="text" value="{{$page->pagetitle}}" tabindex="2" class="required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">SEO Url<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="seourl" type="text" value="{{$page->seourl}}" tabindex="3" class="required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Description<span class="req">*</span></label>
                                    <div class="form_input">
                                        <textarea cols="80" id="editor1" name="description" rows="10" class="required">{{$page->description}}</textarea>                                      
                                        <p>

                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Meta Name<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="metaname" type="text" tabindex="1" value="{{$page->metaname}}" class="required"/>
                                    </div>
                                </div>
                            </li>
                             <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Meta Keyword<span class="req">*</span></label>
                                    <div class="form_input">
                                        <textarea cols="80" name="metakeyword" rows="8" class="required limiter">{{$page->metakeyword}}</textarea>                                      
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Meta Description<span class="req">*</span></label>
                                    <div class="form_input">
                                        <textarea cols="80" name="metadescription" rows="8" class="required limiterbig">{{$page->metadescription}}</textarea>                                      
                                        <p>

                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title"> Hidden Page<span class="req">*</span></label>
                                    <div class="form_input on_off">
                                        @if($page->hidden == "off")
                                        <input type="checkbox"  name="hidden" id="on_off_on"/>
                                        @else
                                        <input type="checkbox" checked="checked" name="hidden" id="on_off_on"/>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title"> Header Link<span class="req">*</span></label>
                                    <div class="form_input on_off">
                                        @if($page->header == "off")
                                        <input type="checkbox"  name="header" id="on_off_on"/>
                                        @else
                                        <input type="checkbox" checked="checked" name="header" id="on_off_on"/>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title"> Footer Link<span class="req">*</span></label>
                                    <div class="form_input on_off">
                                        @if($page->footer == "off")
                                        <input type="checkbox"  name="footer" id="on_off_on" />
                                        @else
                                        <input type="checkbox" checked="checked" name="footer" id="on_off_on"/>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Status<span class="req">*</span></label>
                                    <div class="form_input">
                                        <select data-placeholder="Select Status" name="status" style=" width:350px" class="chzn-select" tabindex="13">
                                            <option value="active" @if($page->status=="active")selected="selected" @endif>active</option>     
                                            <option value="inactive" @if($page->status=="inactive")selected="selected" @endif>inactive</option>  
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
                                        <button type="submit" class="btn_small btn_blue"><span>Submit</span></button>
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
<script>

    CKEDITOR.replace('editor1', {
        fullPage: true,
        allowedContent: true,
        extraPlugins: 'wysiwygarea'
    });

</script>
@stop