@extends('layouts.adminlayout')
@section('content')
<div id="content">
    <div class="grid_container">
        <div class="grid_12">
            <div class="login_invalid" id="password_error" style="display:none">
                <span class="icon"></span> Passwords do not match!
            </div>
            @if(Session::has('error'))
            <div class="login_invalid">
                <span class="icon"></span> {{Session::get('error');}}
            </div>
            @endif
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon list"></span>
                    <h6>Add User</h6>
                </div>
                <div class="widget_content">
                    <form id="form103" autocomplete="off" method="post" action="{{URL::to('postuser')}}" class="form_container left_label" onsubmit="return myFunction();">
                        <ul>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">First Name<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="firstname" type="text" maxlength="100" class="large required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title" id="llastname" for="lastname">Last Name<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="lastname" type="text" maxlength="100" class="large required">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">User Name<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="username" type="text" value="" maxlength="100" class="large required">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Email Address<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="email" type="text" value="" maxlength="150" class="large required email"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Password<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="password" type="password" value="" maxlength="50" id="pass1" class="large required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Confirm Password<span class="req">*</span></label>
                                    <div class="form_input">

                                        <input name="password_confirm" type="password" id="pass2" maxlength="50" class="large required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Mobile<span class="req">*</span></label>
                                    <div class="form_input">
                                        <select data-placeholder="Select country code" name="mobilecode" style=" width:200px" class="required" tabindex="13">
                                            <option value="">Select Country Code</option>
                                            @foreach($countries as $country)                                            
                                            <option value="{{$country->countrymobilecode}}">{{$country->countryname}} ({{$country->countrymobilecode}})</option>
                                            @endforeach 
                                        </select>

                                        <input name="mobile" type="text" maxlength="50" style="width: 230px !important; margin-left: 20px; margin-top: 1px;"  class="required"/>
                                    </div>
                                </div>
                            </li>
                            <!--
<li>
    <div class="form_grid_12">
        <label class="field_title">Country<span class="req">*</span></label>
        <div class="form_input">
            <select data-placeholder="Select Country" name="country" style="width:350px" class="chzn-select required" tabindex="13">
                <option value=""></option>
                @foreach($countries as $country)                                            
                <option value="{{$country->countryname}}">{{$country->countryname}}</option>
                @endforeach 
            </select>
                                            </div>
    </div>
</li>
                            -->
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Country<span class="req">*</span></label>
                                    <div class="form_input">
                                        <select name="country" style="width:359px" class="country required" tabindex="13">
                                            <option value="">Select Country</option>
                                            @foreach($countries as $country)                                            
                                            <option value="{{$country->countryname}}">{{$country->countryname}}</option>
                                            @endforeach 
                                        </select>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">State<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="state" type="text" maxlength="100" class="large required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">City<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="city" type="text" maxlength="100" class="large required onlyText"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Address<span class="req">*</span></label>
                                    <div class="form_input">
                                        <textarea name="address" cols="50" class="required"></textarea>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Postal Code<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="postalcode" type="text" maxlength="50" class="large required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Web Url<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="weburl" type="text" maxlength="50" class="large required"/>
                                        <span><i><b>Example</b>: http://www.example.com</i></span>
                                    </div>
                                </div>
                            </li>
                            <!--
<li>
    <div class="form_grid_12">
        <label class="field_title">Gender<span class="req">*</span></label>
        <div class="form_input">
            <select data-placeholder="Select Gender" name="gender" style=" width:350px"  id="gender" class="chzn-select required" tabindex="13">
                <option value=" "></option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
    </div>
</li> 
                            -->	
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Gender<span class="req">*</span></label>
                                    <div class="form_input">
                                        <select name="gender" style=" width:359px" class="gender required">  
                                            <option value="">Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </li>			
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Biography<span class="req ">*</span></label>
                                    <div class="form_input">
                                        <textarea name="biography" cols="50" class="required limiterlarge"></textarea>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <div class="form_input">
                                        <button type="submit" class="btn_small btn_blue"><span>Add user</span></button>
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

<script type="text/javascript">
    function myFunction() {
        var pass1 = document.getElementById("pass1").value;
        var pass2 = document.getElementById("pass2").value;

        if (pass1 != pass2) {
            document.getElementById('password_error').style.display = "block";
            return false;
        }
        else {
            return true;
        }
    }



    $.validator.addMethod("alphanumeric", function (value, element) {
        return this.optional(element) || /^[a-z0-9\\-]+$/i.test(value);
    });

//    $.validator.addMethod('password', function(value, element) {
//        return this.optional(element) || (value.match(/[a-zA-Z]/) && value.match(/[0-9]/));
//    });

    jQuery.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
    });
    
    jQuery.validator.addMethod("letterspaceonly", function (value, element) {
        return this.optional(element) || /^[a-z\s]+$/i.test(value);
    });

    $("#form103").validate({
        rules: {
            mobile: {
                number: true,
                maxlength: 10,
            },
            password: {
                minlength: 6,
                maxlength: 12,
            },
            firstname: {
                lettersonly: true,
            },
            lastname: {
                lettersonly: true,
            },
            state: {
                letterspaceonly: true,
            },
            city: {
                letterspaceonly: true,
            },
            postalcode: {
                alphanumeric: true,
            },
            weburl: {
                url: true,
            },
            password_confirm: {
                minlength: 6,
                maxlength: 12,
                equalTo: "#pass1"
            },
            gender: {
                required: true,
            },
            country: {
                required: true,
            },
            mobilecode: {
                required: true,
            },
        },
        messages: {
            firstname: {
                lettersonly: 'Firstname field should accept only alphabets.'
            },
            lastname: {
                lettersonly: 'Lastname field should accept only alphabets.'
            },
            state: {
                letterspaceonly: 'State field should accept only alphabets.'
            },
            city: {
                letterspaceonly: 'City field should accept only alphabets.'
            },
            postalcode: {
                alphanumeric: 'Postalcode field should accept only alphanumerics.'
            },
            password: {
                password: 'Password field is required.'
            },
            password_confirm: {
                equalTo: 'The confirm password and password must match.'
            }
        },
    });
</script>
@stop