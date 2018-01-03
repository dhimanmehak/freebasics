@extends('layouts.adminlayout')
@section('content')
<div id="content">
    <div class="grid_container">
        <div class="grid_12 full_block">
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon list_image"></span>
                    <h6>View {{$category}} Page</h6>
                </div>
                <div class="widget_content">

                    <form action="#" method="post" class="form_container left_label">
                        @foreach($pages as $page)
                        <ul>
                            @if($page->category=="sub")
                            <li>
                                 <div class="form_grid_12">
                                    <label class="field_title">Main Page</label>
                                    <div class="form_input">
                                        <input name="pagename" type="text" value="{{$parentname}}" tabindex="1" disabled=""/>
                                    </div>
                                </div>
                            </li>
                            @endif
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Page Name</label>
                                    <div class="form_input">
                                        <input name="pagename" type="text" value="{{$page->pagename}}" tabindex="1" disabled=""/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Page Title</label>
                                    <div class="form_input">
                                        <input name="pagetitle" type="text" value="{{$page->pagetitle}}" tabindex="2" disabled=""/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">SEO Url</label>
                                    <div class="form_input">
                                        <input name="seourl" type="text" value="{{$page->seourl}}" tabindex="3" disabled=""/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Description</label>
                                    <div class="form_input">
                                        <textarea cols="80" name="description" id="editor1" rows="10" disabled="">{{$page->description}}</textarea>                                      
                                        <p>

                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Meta Name</label>
                                    <div class="form_input">
                                        <input name="metaname" type="text" tabindex="1" value="{{$page->metaname}}" disabled=""/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Meta Description</label>
                                    <div class="form_input">
                                        <textarea cols="80" name="metadescription" rows="8" disabled="">{{$page->metadescription}}</textarea>                                      
                                        <p>

                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title"> Hidden Page</label>
                                    <div class="form_input on_off">
                                        @if($page->hidden == "off")
                                        <input type="checkbox"  name="hidden" id="on_off_on" disabled=""/>
                                        @else
                                        <input type="checkbox" checked="checked" name="hidden" id="on_off_on" disabled=""/>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title"> Header Link<span class="req">*</span></label>
                                    <div class="form_input on_off">
                                        @if($page->header == "off")
                                        <input type="checkbox"  name="header" id="on_off_on" disabled=""/>
                                        @else
                                        <input type="checkbox" checked="checked" name="header" id="on_off_on" disabled=""/>
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
                                        <input type="checkbox" checked="checked" name="footer" id="on_off_on" disabled=""/>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Status<span class="req">*</span></label>
                                    <div class="form_input">
                                        <select data-placeholder="Select Status" name="status" style=" width:350px" class="chzn-select" tabindex="13" disabled="">
                                            <option value="{{$page->status}}">{{$page->status}}</option>   
                                            <option value="active">active</option>     
                                            <option value="inactive">inactive</option>  
                                        </select>                                    
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