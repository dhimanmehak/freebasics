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
                    <h6>Add Subcategory</h6>
                </div>
                <div class="widget_content">
                    <form id="form103" autocomplete="off" method="post" action="{{URL::to('postaddsubcategory')}}" class="form_container left_label">
                        <ul>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Category Name<span class="req">*</span></label>
                                    <div class="form_input">
                                        <select data-placeholder="Select Category" name="categoryid" style=" width:350px" class="chzn-select required" tabindex="13">
                                           @foreach($categories as $category) 
                                            <option value="{{$category->id}}">{{$category->categoryname}}</option>                                            
                                           @endforeach 
                                           
                                        </select>                                    
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Subcategory Name<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input type="text" name="subcategoryname" value="" maxlength="100" class="large required"/>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="form_grid_12">
                                    <div class="form_input">
                                        <button name="submit" type="submit" class="btn_small btn_blue"><span>Submit</span></button>
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