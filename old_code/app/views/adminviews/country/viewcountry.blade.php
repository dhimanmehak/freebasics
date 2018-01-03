@extends('layouts.adminlayout')
@section('content')
<div id="content">
    <div class="grid_container">
        <div class="grid_12">           
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon list"></span>
                    <h6>View Country</h6>
                </div>
                <div class="widget_content">
                    <form id="signupform" autocomplete="off" method="post" action="{{URL::to('posteditcountry')}}" class="form_container left_label">
                        @foreach($countries as $country)
                        <input type="hidden" name="id" value="{{$country->id}}" maxlength="100" class="large"/>
                        <ul>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Country Name<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input type="text" name="countryname" value="{{$country->countryname}}" maxlength="100" class="large" disabled=""/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Country ID<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input type="text" name="countryid" value="{{$country->countryid}}" maxlength="100" class="large" disabled=""/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Country Code<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input type="text" name="countrycode" value="{{$country->countrycode}}" maxlength="100" class="large" disabled=""/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Country Mobile Code<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input type="text" name="mobilecode" value="{{$country->countrymobilecode}}" maxlength="100" class="large" disabled=""/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Currency Type<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input type="text" name="currencytype" value="{{$country->currencytype}}" maxlength="100" class="large" disabled=""/>
                                    </div>
                                </div>
                            </li>
                             <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Currency Symbol<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input type="text" name="currencysymbol" value="{{$country->currencysymbol}}" maxlength="100" class="large" disabled=""/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Default Currency<span class="req">*</span></label>                                    
                                    <div class="form_input">
                                        <select data-placeholder="status" style=" width:350px" name="defaultcurrency" class="chzn-select" tabindex="13" disabled="">
                                            <option value="{{$country->defaultcurrency}}">{{$country->defaultcurrency}}</option>
                                                 
                                        </select> 
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Country Status<span class="req">*</span></label>
                                    <div class="form_input">
                                        <select data-placeholder="status" style=" width:350px" name="status" class="chzn-select" tabindex="13" disabled="">
                                            <option value="{{$country->status}}">{{$country->status}}</option>
                                            <option value="active">active</option>
                                            <option value="inactive">inactive</option>         
                                        </select> 
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Created On<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input type="text" name="currencysymbol" value="{{$country->createdon}}" maxlength="100" class="large" disabled=""/>
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