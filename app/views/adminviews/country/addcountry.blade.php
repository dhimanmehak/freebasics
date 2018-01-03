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
                    <h6>Add Country</h6>
                </div>
                <div class="widget_content">
                    <form id="form103" autocomplete="off" method="post" action="{{URL::to('postaddcountry')}}" class="form_container left_label">
                        <ul>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Country Name</label>
                                    <div class="form_input">
                                        <input  name="countryname" type="text" value="" maxlength="100" class="large required">
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Country Id<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input  name="countryid" type="text" value="" maxlength="100" class="large required">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title" >Country Code<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="countrycode" type="text" value="" maxlength="50" class="large required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title" >Country Mobile Code<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="countrymobilecode" type="text" value="" maxlength="50" class="large required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title" >Currency Type<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="currencytype" type="text" value="" maxlength="50" class="large required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title" >Currency Symbol<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="currencysymbol" type="text" value="" maxlength="50" class="large required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Default Currency<span class="req">*</span></label>                                    
                                    <div class="form_input">
                                        <select data-placeholder="select" style=" width:350px" name="defaultcurrency" class="chzn-select required" tabindex="13">
                                            <option value="no">no</option>
                                            <option value="yes">yes</option>    
                                        </select> 
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title" id="lpassword" for="password">Status<span class="req">*</span></label>
                                    <div class="form_input">
                                        <select data-placeholder="Select Status" name="status" style=" width:350px" class="chzn-select required" tabindex="13">
                                            <option value="active">active</option>
                                            <option value="inactive">inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="form_grid_12">
                                    <div class="form_input">
                                        <button id="signupsubmit" name="signup" type="submit" class="btn_small btn_blue"><span>Add Country</span></button>
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
    $.validator.addMethod("alphanumeric", function (value, element) {
        return this.optional(element) || /^[a-z0-9\\-]+$/i.test(value);
    });
    jQuery.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
    });

    $("#form103").validate({
        rules: {
            countryname: {
                lettersonly: true,
            },
            countrycode: {
                alphanumeric: true,
            }
        },
        messages: {
            countryname: {
                lettersonly: 'Country name field should accept only alphabets.'
            },
            countrycode: {
                alphanumeric: 'Country code field should accept only alphanumerics.'
            }
        },
    });
</script>    
@stop