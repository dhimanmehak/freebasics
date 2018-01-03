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
                    <h6>Add Category</h6>
                </div>
                <div class="widget_content">
                    <form id="form103" autocomplete="off" method="post" action="{{URL::to('postaddcategory')}}" class="form_container left_label">
                        <ul>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Category Name<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input type="text" name="categoryname" value="" maxlength="100" class="large required"/>
                                    </div>
                                </div>
                            </li>
							<li>
                                <div class="form_grid_12">
                                    <label class="field_title">Category Color Name<span class="req">*</span></label>
                                    <div class="form_input">                                           
                                        <input type='text' class="large required" name='categorycolorname'>
                                    </div>
                                </div>
                            </li>
							<li>
                                <div class="form_grid_12">
                                    <label class="field_title">Category Color Code<span class="req">*</span></label>
                                    <div class="form_input">                                           
                                        <input type='text' class="large required" name='categorycolorcode'>
                                    </div>
                                </div>
                            </li>
                            <li>
                                    <div class="form_grid_12">
                                        <label class="field_title" >Category Image<span class="req">*</span></label>
                                        <div class="form_input" >
                                            
                                            <input name="categoryimage" type="file" maxlength="50" value="" class="large"/>
                                        </div>
                                    </div>                                   
                                </li>

                                 <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Category Text<span class="req">*</span></label>
                                    <div class="form_input">
                                        <textarea cols="80" id="cat_text" name="categorytext" rows="3" class="required"></textarea> 
                                    </div>
                                </div>
                            </li>							
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Meta Title<span class="req">*</span></label>
                                    <div class="form_input">                                           
                                        <input type='text' class="large required" name='metatitle'>
                                    </div>
                                </div>
                            </li>   
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Meta Keyword<span class="req">*</span></label>
                                    <div class="form_input">
                                        <textarea cols="80" id="editor1" name="metakeyword" rows="3" class="limiter required"></textarea> 
                                    </div>
                                </div>
                            </li>   
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Meta Description<span class="req">*</span></label>
                                    <div class="form_input">
                                        <textarea name='metadescription' rows="5" class="limiterbig required"></textarea>
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
                                        <button name="submit" type="submit" class="btn_small btn_blue"><span>Submit</span></button>
                                        @endif
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