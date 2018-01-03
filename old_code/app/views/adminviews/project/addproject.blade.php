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
                    <h6>Add Project</h6>
                </div>
                <div class="widget_content">
                    <form id="form103" autocomplete="off" method="post" action="{{URL::to('postaddproject')}}" class="form_container left_label">
                        <ul>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Project Title<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input type="text" name="title" value="" maxlength="100" class="large required"/>
                                    </div>                                   
                                </div>
                            </li>

                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Category<span class="req">*</span></label>
                                    <div class="form_input">
                                        <select data-placeholder="Select Category" name="categoryid" style=" width:350px" class="chzn-select required" tabindex="13">
                                            @foreach($categories as $category) 
                                            <option value="{{$category->id}}">{{{$category->categoryname}}}</option>                                            
                                            @endforeach 
                                        </select>                                    
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Country *</label>
                                    <div class="form_input">
                                        <select data-placeholder="Select Country" name="countryid" style=" width:350px" class="chzn-select required" tabindex="13">
                                            @foreach($countries as $country) 
                                            <option value="{{$country->id}}">{{{$country->countryname}}}</option>                                            
                                            @endforeach 
                                        </select>                                    
                                    </div>
                                </div>
                            </li>                           
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">User<span class="req">*</span></label>
                                    <div class="form_input">
                                        <select data-placeholder="Select Email" name="userid" style=" width:350px" class="chzn-select required" tabindex="13">
                                            @foreach($users as $user) 
                                            <option value="{{$user->id}}">{{{$user->firstname}}} - {{{$user->email}}}</option>                                            
                                            @endforeach 
                                        </select>                                    
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