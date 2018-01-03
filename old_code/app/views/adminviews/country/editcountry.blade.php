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
                    <h6>Edit Country</h6>
                </div>
                <div class="widget_content">
                    <form id="signupform" autocomplete="off" method="post" action="{{URL::to('posteditcountry')}}" id="form103" class="form_container left_label">
                        @foreach($countries as $country)
                        <input type="hidden" name="id" value="{{$country->id}}" maxlength="100" class="large"/>
                        <ul>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Country Name<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input type="text" name="countryname" value="{{$country->countryname}}" maxlength="100" class="large required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Country ID<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input type="text" name="countryid" value="{{$country->countryid}}" maxlength="100" class="large required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Country Code<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input type="text" name="countrycode" value="{{$country->countrycode}}" maxlength="100" class="large required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Country Mobile Code<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input type="text" name="mobilecode" value="{{$country->countrymobilecode}}" maxlength="100" class="large required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Currency Type<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input type="text" name="currencytype" value="{{$country->currencytype}}" maxlength="100" class="large required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Currency Symbol<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input type="text" name="currencysymbol" value="{{$country->currencysymbol}}" maxlength="100" class="large required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Default Currency<span class="req">*</span></label>                                    
                                    <div class="form_input">
                                        <select data-placeholder="status" style=" width:350px" name="defaultcurrency" class="chzn-select required" tabindex="13">
                                            @if($country->defaultcurrency=="yes")
                                            <option value="yes" selected="selected">yes</option>
                                            <option value="no">no</option>     
                                            @else
                                            <option value="yes">yes</option>
                                            <option value="no" selected="selected">no</option>    
                                            @endif
                                        </select> 
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Country Status<span class="req">*</span></label>
                                    <div class="form_input">
                                        <select data-placeholder="status" style=" width:350px" name="status" class="chzn-select required" tabindex="13">
                                            @if($country->status =="active")                                           
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