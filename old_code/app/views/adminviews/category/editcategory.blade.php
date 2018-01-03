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
                    <h6>Edit Category</h6>
                </div>
                <div class="widget_content">
                    <form id="signupform" autocomplete="off" method="post" action="{{URL::to('posteditcategory')}}" class="form_container left_label">
                        @foreach($details as $detail)
                        <input type="hidden" name="id" value="{{$detail->id}}" maxlength="100" class="large"/>
                        <ul>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Category Name<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input type="text" name="categoryname" value="{{$detail->categoryname}}" maxlength="100" class="large"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Category Status<span class="req">*</span></label>
                                    <div class="form_input">
                                        <select data-placeholder="status" style=" width:350px" name="status" class="chzn-select" tabindex="13">
                                            @if($detail->status == "active")
                                            <option value="active" selected="selected">active</option>
                                            <option value="inactive">inactive</option>   
                                            @else
                                            <option value="active">active</option>
                                            <option value="inactive" selected="selected">inactive</option>   
                                            @endif
                                        </select> 
                                    </div>
                                </div>
                            </li>
							<li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Category Color Name</label>
                                        <div class="form_input">
                                            <textarea cols="80" id="editor1" name="categorycolorname" rows="3" class="limiter required">{{$detail['categorycolorname']}}</textarea> 
                                        </div>
                                    </div>
                            </li>
                            <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Category Color Code</label>
                                        <div class="form_input">                                           
                                            <input type='text' class="large required" name='categorycolorcode' value="{{$detail['categorycolorcode']}}">
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title" >Category Image<span class="req">*</span></label>
                                        <div class="form_input" >
                                            <img src="{{$detail['categoryimage']}}" width="25%" height="25%" alt="gal" style='margin-left:20px;'/> <br>
                                            <input name="categoryimage" type="file" maxlength="50" value="" class="large"/>
                                        </div>
                                    </div>
                                    @if ($errors->has('categoryimage')) <p class="help-block">{{ $errors->first('categoryimage') }}</p> @endif
                                </li> 
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Meta Title</label>
                                        <div class="form_input">
                                            <textarea cols="80" id="editor1" name="metatitle" rows="3" class="limiter required">{{$detail['metatitle']}}</textarea> 
                                        </div>
                                    </div>
                                </li>  
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Meta Keyword</label>
                                        <div class="form_input">
                                            <textarea cols="80" id="editor1" name="metakeyword" rows="3" class="limiter required">{{$detail['metakeyword']}}</textarea> 
                                        </div>
                                    </div>
                                </li>   
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Meta Description</label>
                                        <div class="form_input">
                                            <textarea name='metadescription' rows="5" class="limiterbig required">{{$detail['metadescription']}}</textarea>
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
                                        <button name="submit" type="submit" class="btn_small btn_blue"><span>Update</span></button>
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