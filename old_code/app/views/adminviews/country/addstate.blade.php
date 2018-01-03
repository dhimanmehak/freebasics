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
                    <h6>Add State</h6>
                </div>
                <div class="widget_content">
                    <form id="form103" autocomplete="off" method="post" action="{{URL::to('postaddstate')}}" class="form_container left_label">
                        <ul>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Country Name</label>
                                    <div class="form_input">
                                        <select data-placeholder="Select Country" name="countryid" style=" width:350px" class="chzn-select required" tabindex="13">
                                            <option value=""></option>
                                            @foreach($countries as $country)                                            
                                            <option value="{{$country->id}}">{{$country->countryname}}</option>
                                            @endforeach 
                                        </select>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">State Name<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input  name="statename" type="text" value="" maxlength="100" class="large required">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title" >State Code<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="statecode" type="text" value="" maxlength="50" class="large required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title" id="lpassword" for="password">Status<span class="req">*</span></label>
                                    <div class="form_input">
                                        <select data-placeholder="Select Status" name="status" style=" width:350px" class="chzn-select required" tabindex="13">
                                            <option value=""></option>                                                                                   
                                            <option value="active">active</option>
                                            <option value="inactive">inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="form_grid_12">
                                    <div class="form_input">
                                        <button id="signupsubmit" name="signup" type="submit" class="btn_small btn_blue"><span>Add State</span></button>
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
            statename: {
                lettersonly: true,
            },
            statecode: {
                alphanumeric: true,
            }
        },
        messages: {
            statename: {
                lettersonly: 'State name field should accept only alphabets.'
            },
            statecode: {
                alphanumeric: 'State code field should accept only alphanumerics.'
            }
        },
    });
</script>    
@stop