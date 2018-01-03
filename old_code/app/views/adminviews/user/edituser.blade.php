@extends('layouts.adminlayout')
@section('content')
<div class="ediusers" id="content">
    <div class="grid_container">
        <div class="grid_12 full_block">
            @if(Session::has('failed'))
            <div class="login_invalid">
                <span class="icon"></span> {{Session::get('failed');}}
            </div>
            @endif
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon list"></span>
                    <h6> Edit User</h6>
                    <div id="widget_tab">
                        <ul>
                            <li><a href="#tab1" class="active_tab">Basic details</a></li>
                            <li><a href="#tab2">Social media details</a></li>
                            <li><a href="#tab3">Additional details</a></li>
                        </ul>
                    </div>
                </div>
                <div class="widget_content">
                    <div id="tab1">
                        <form method="post" action="{{URL::to('posteditbasic')}}" id="form103" class="form_container left_label" enctype='multipart/form-data'>
                            @foreach($users as $user)
                            <input type='hidden' name='id' value='{{$user->id}}' >
                            <ul>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title" >First Name<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input  name="firstname" type="text" value="{{$user->firstname}}" maxlength="100" class="large required" />
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title" id="llastname" for="lastname">Last Name<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="lastname" type="text" value="{{$user->lastname}}" maxlength="100" class="large required">
                                        </div>
                                    </div>
                                </li>
								<li>
                                    <div class="form_grid_12">
                                        <label class="field_title" >User Name<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input  name="username" type="text" value="{{$user->username}}" maxlength="100" class="large required" />
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Email Address<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="email" type="text" value="{{$user->email}}" maxlength="150" class="large required"/>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Mobile<span class="req">*</span></label>
                                        <div class="form_input">
                                            <?php $mobilecode = strstr($user->mobile, '-', true); ?>
                                            <select data-placeholder="Select country code" name="mobilecode" class="required" tabindex="13">
                                                <option value=""></option>
                                                @foreach($countries as $country)                                            
                                                <option style="float:left;" value="{{$country->countrymobilecode}}" <?php if ($country->countrymobilecode == $mobilecode) { ?> selected='selected'<?php } ?> >{{$country->countryname}} ({{$country->countrymobilecode}})</option>
                                                @endforeach 
                                            </select>
                                            <?php $mobilestr = strstr($user->mobile, '-', false); ?>
                                            <input name="mobile" type="text" maxlength="50" value='{{str_replace('-','',$mobilestr);}}' style="width:230px !important;"  class="required"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Country<span class="req">*</span></label>
                                        <div class="form_input">
                                            <select data-placeholder="Select Country" name="country" style=" width:350px" class="chzn-select required" tabindex="13">
                                                <option value=""></option>
                                                @foreach($countries as $country)                                            
                                                <option value="{{$country->countryname}}" <?php if ($country->countryname == $user->country) { ?> selected='selected' <?php } ?> >{{$country->countryname}}</option>
                                                @endforeach 
                                            </select>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Address<span class="req">*</span></label>
                                        <div class="form_input">
                                            <textarea name="address" cols="50" rows="5" class="required">{{$user->address}}</textarea>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Postal Code<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="postalcode" type="text" maxlength="50" value="{{$user->postalcode}}" class="large required"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Web Url<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="weburl" type="text" maxlength="50" value="{{$user->weburl}}" class="large required"/>
                                        </div>
                                    </div>
                                </li>                               
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Gender<span class="req">*</span></label>
                                        <div class="form_input">
                                            <select data-placeholder="Select Gender" name="gender" style=" width:350px" class="chzn-select required" tabindex="13">
                                                @if($user->gender=='male')
                                                <option value="male" selected='selected'>Male</option>
                                                <option value="female">Female</option>
                                                @elseif($user->gender=='female')
                                                <option value="male">Male</option>
                                                <option value="female" selected='selected'>Female</option>
                                                @else 
                                                <option value="male">Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </li>    
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Biography<span class="req">*</span></label>
                                        <div class="form_input">
                                            <textarea name="biography" cols="50" rows="10" class="required">{{$user->biography}}</textarea>
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
                                            <button type="submit" class="btn_small btn_blue"><span>Update</span></button>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            @endforeach
                        </form>
                    </div>
                    <div id="tab2">
                        <form autocomplete="off" method="post" action="{{URL::to('posteditsocial')}}" class="form_container left_label">

                            @foreach($users as $user)
                            <input type='hidden' name='id' value='{{$user->id}}'>
                            <ul>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title" >Facebook Link<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input  name="facebooklink" type="text" value="{{$user->facebook}}" maxlength="100" class="large"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Googleplus Link<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="googlepluslink" type="text" value="{{$user->google}}" maxlength="100" class="large">
                                        </div>
                                    </div>
                                </li>                               
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Twitter Link<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="twitterlink" type="text" maxlength="50" value="{{$user->twitter}}" class="large"/>
                                        </div>
                                    </div>
                                </li>                                                              
                                <li>
                                    <div class="form_grid_12">
                                        <div class="form_input">
                                            @if($name=="demo")
                                            <a class="inline cboxElement btn_small btn_blue" href="#inline_content" style="line-height: 28px !important;color: #fff;">Submit</a>
                                            @else
                                            <button type="submit" class="btn_small btn_blue"><span>Submit</span></button>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            @endforeach
                        </form>
                    </div>
                    <div id="tab3">                            
                        <div class="page_content">
                            <div class="grid_12 post_preview">
                                <form id="regitstraion_form" autocomplete="off" method="post" action="{{URL::to('posteditadditional')}}" class="form_container left_label" enctype="multipart/form-data">
                                    @foreach($users as $user)
                                    <input type='hidden' name='id' value='{{$user->id}}'>                                     
                                    <ul>
                                        <li>
                                            <div class="form_grid_12">
                                                <label class="field_title" >Logintype<span class="req">*</span></label>
                                                <div class="form_input">
                                                    <input  name="logintype" type="text" value="{{$user->logintype}}" maxlength="100" class="large" />
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form_grid_12">
                                                <label class="field_title" id="llastname" for="lastname">Mobile Status<span class="req">*</span></label>
                                                <div class="form_input">
                                                    <select data-placeholder="Select Gender" name="mobilestatus" style=" width:350px" class="chzn-select required" tabindex="13">
                                                        @if($user->mobilestatus==0)
                                                        <option value="0" selected='selected'>Not Verified</option>
                                                        <option value="1">Verified</option>
                                                        @else
                                                        <option value="0">Not Verified</option>
                                                        <option value="1"  selected='selected'>Verified</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form_grid_12">
                                                <label class="field_title">Email Status<span class="req">*</span></label>
                                                <div class="form_input">
                                                    <select data-placeholder="Select Gender" name="emailstatus" style=" width:350px" class="chzn-select required" tabindex="13">
                                                        @if($user->emailstatus==0)
                                                        <option value="0" selected='selected'>Not Verified</option>
                                                        <option value="1">Verified</option>
                                                        @else
                                                        <option value="0">Not Verified</option>
                                                        <option value="1"  selected='selected'>Verified</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="form_grid_12">
                                                <label class="field_title">Last Login Date</label>
                                                <div class="form_input">
                                                    <input name="lastlogindate" type="text" value="{{$user->lastlogindate}}" maxlength="150" class="large " disabled/>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form_grid_12">
                                                <label class="field_title">Login IP</label>
                                                <div class="form_input">
                                                    <input name="loginip" type="text" value="{{$user->lastloginip}}" maxlength="150" class="large " disabled/>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="form_grid_12">
                                                <label class="field_title">Image<span class="req">*</span></label>
                                                <div class="form_input">
                                                    <img src="{{$user->image}}" width="56" height="56" alt="profile" style='margin-left:75px;' onerror="this.src='{{URL::to('main/images/default.png');}}'" /><br>
                                                    <input type='file' name='image'>
                                                </div>
                                            </div>
                                            @if ($errors->has('image')) <p class="help-block">{{ $errors->first('image') }}</p> @endif
                                        </li> 
                                        <li>
                                            <div class="form_grid_12">
                                                <label class="field_title">State<span class="req">*</span></label>
                                                <div class="form_input">
                                                    <input type='text' class="large required" name='state' value='{{$user->state}}'>
                                                </div>
                                            </div>
                                        </li> 

                                        <li>
                                            <div class="form_grid_12">
                                                <label class="field_title">City<span class="req">*</span></label>
                                                <div class="form_input">
                                                    <input type='text' class="large required" name='city' value='{{$user->city}}'>
                                                </div>
                                            </div>
                                        </li> 
										<li class="li1" style='margin:20px 0 20px 0;'>
											<div class="form_grid_12">
                                                <label class="field_title">Secuirty Question<span class="req">*</span></label>
											<div class="form_input">
											<?php $selected	= $user->question; ?>
				                                <select name="question" class="large required" >
					                                    <option value=''>-- {{trans('messages.selectsecurityquestion')}} --</option>
					                                    <option value="What was your childhood nickname?" <?php if ($selected == 'What was your childhood nickname?') echo ' selected="selected"'?>>{{trans('messages.securityquestion1')}}</option>
					                                    <option value="What is the name of your favorite childhood friend?" <?php if ($selected == 'What is the name of your favorite childhood friend?') echo ' selected="selected"'?>>{{trans('messages.securityquestion2')}}</option>
					                                    <option value="What is your favorite team?" <?php if ($selected == 'What is your favorite team?') echo ' selected="selected"'?>>{{trans('messages.securityquestion3')}}</option>
														<option value="What is the name of person you first kissed?" <?php if ($selected == 'What is the name of person you first kissed?') echo ' selected="selected"'?>>{{trans('messages.securityquestion4')}}</option>
					                                    <option value="What was the name of your elementary / primary school?" <?php if ($selected == 'What was the name of your elementary / primary school?') echo ' selected="selected"'?>>{{trans('messages.securityquestion5')}}</option>
					                                    <option value="What is your pet's name?" <?php if ($selected == "What is your pet's name?") echo ' selected="selected"'?>>{{trans('messages.securityquestion6')}}</option>
														<option value="In what year was your father born?" <?php if ($selected == 'In what year was your father born?') echo ' selected="selected"'?>>{{trans('messages.securityquestion7')}}</option>
					                                    <option value="What was the name of the first company you worked?" <?php if ($selected == 'What was the name of the first company you worked?') echo ' selected="selected"'?>>{{trans('messages.securityquestion8')}}</option>
					                                    <option value="In which city did you get married?" <?php if ($selected == 'In which city did you get married?') echo ' selected="selected"'?>>{{trans('messages.securityquestion9')}}</option>
														<option value="What is your best friend's first name?" <?php if ($selected == "What is your best friend's first name?") echo ' selected="selected"'?>>{{trans('messages.securityquestion10')}}</option>
					                             </select>
				                                @if ($errors->has('question')) <p class="help-block">{{ $errors->first('question') }}</p> @endif
				                            </div>
											</div>
                       				  </li>
									  <li>
                                            <div class="form_grid_12">
                                                <label class="field_title">Answer<span class="req">*</span></label>
                                                <div class="form_input">
                                                    <input type='text' class="large required" name='answer' value='{{$user->answer}}'>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form_grid_12">
                                                <label class="field_title">Login Hit</label>
                                                <div class="form_input">
                                                    <input type='text' class="large" name='loginhit' value='{{$user->loginhit}}' disabled>
                                                </div>
                                            </div>
                                        </li>   

                                        <li>
                                            <div class="form_grid_12">
                                                <label class="field_title">Backed projects count</label>
                                                <div class="form_input">
                                                    <input type='text' class="large" value="{{$backingscount}}" name='backed' disabled>
                                                </div>
                                            </div>
                                        </li>   
                                        <li>
                                            <div class="form_grid_12">
                                                <label class="field_title">Created projects count</label>
                                                <div class="form_input">
                                                    <input type='text' value="{{$projectscount}}" class="large" name='created' disabled>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form_grid_12">
                                                <label class="field_title">Admin Remarks</label>
                                                <div class="form_input">
                                                    <textarea  class="large" rows="5" name='adminremarks'>{{$user->adminremarks}}</textarea>
                                                </div>
                                            </div>
                                        </li>   
                                        <li>
                                            <div class="form_grid_12">
                                                <div class="form_input">
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
            </div>
        </div>
    </div>

    <span class="clear"></span>
</div>
<script type="text/javascript">


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