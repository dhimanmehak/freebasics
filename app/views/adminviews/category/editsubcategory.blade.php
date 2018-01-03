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
                    <h6>Edit Subcategory</h6>
                </div>
                <div class="widget_content">
                    <form id="form103" autocomplete="off" method="post" action="{{URL::to('posteditsubcategory')}}" class="form_container left_label">
                        @foreach($details as $detail)
                        <input type="hidden" name="id" value="{{$detail->id}}" maxlength="100" class="large"/>
                        @endforeach
                        <ul>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Category Name<span class="req">*</span></label>
                                    <div class="form_input">
                                        <select data-placeholder="Select Category" name="categoryid" style=" width:350px" class="chzn-select" tabindex="13">
                                            @foreach($allcategories as $allcategory) 
                                            <option value="{{$allcategory->id}}" <?php if ($allcategory->id == $details[0]['categoryid']) { ?> selected="selected" <?php } ?> >{{$allcategory->categoryname}}</option> 
                                            @endforeach 
                                        </select>      
                                    </div>
                                </div>
                            </li>
                            @foreach($details as $detail)
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Subcategory Name<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input type="text" name="subcategoryname" value="{{$detail->subcategoryname}}" maxlength="100" class="large required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Category Status<span class="req">*</span></label>
                                    <div class="form_input">
                                        <select data-placeholder="status" style=" width:350px" name="status" class="chzn-select" tabindex="13">
                                            @if($detail->status=="active")
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
                                    <div class="form_input">
                                        <button name="submit" type="submit" class="btn_small btn_blue"><span>Update</span></button>
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