@extends('layouts.mainlayout')
@section('content')

<section>
    <div class="account">
        <div class="container">
            @if(Session::has('error'))
            <div class="alert-message error" >
                {{Session::get('error');}}
            </div>
            @endif
            <div class="account-top">
                <h3 class="seting col-md-12">{{trans('messages.settings')}}</h3>
                <ul class="setig-li col-md-12">
                    <li><a href="{{URL::to('myaccount')}}">{{trans('messages.account')}}</a> </li>
                    <li><a class="active" href="{{URL::to('editprofile')}}"> {{trans('messages.editprofile')}} </a></li>
                    <li><a href="{{URL::to('privacysettings')}}"> {{trans('messages.privacysettings')}} </a></li>
                    <li><a href="{{URL::to('notifications')}}"> {{trans('messages.notifications')}}</a> </li>
                    <li><a href="{{URL::to('findfriends')}}"> {{trans('messages.findfriends')}} </a></li>
                </ul>

                <form method='post' action='{{URL::to('posteditprofile')}}' enctype="multipart/form-data" id="commentForm" name="form"> 
                    <?php //echo "<pre>";print_r($details);"</pre>";exit;?>
                    @if(Session::has('success'))
                    <div class="alert-message success" style='margin-top: 13%;'>
                        {{Session::get('success');}}
                    </div>
                    @endif
                    <div class="col-sm-6">

                        <ul class="email-pre">
                            <input type='hidden' value='{{$details->id}}' name='id'>
                            <li>
                                <label>{{trans('messages.name')}}</label>
                                <input type="text" value='{{{$details->firstname}}} {{{$details->lastname}}}' name='name' readonly>
                                <p>{{trans('messages.nameinfo')}}.</p>
                            </li>
                            <li>
                                <label>{{trans('messages.username')}}</label>
                                <input type="text" value='{{{$details->username}}}' name='username' readonly>
                            </li>
                            <li>
                                <label>{{trans('messages.picture')}}</label>
                                <div class="upload" >
                                    <input type="hidden" name="imageval" id="imageval" value="{{$details->image}}">
                                    <div class="upload-left" style="height: 90px;">
                                        <img src="{{URL::to('')}}/{{$details->image}}" id="myImg" onerror="this.src='main/images/default.png'" style="width:100%;height:100%;">
                                    </div>
                                    <div class="upload-right">
                                        <input id="profile_photo" class="photo file" type="file" name='image' >
                                        <strong class="center">
                                            {{trans('messages.pictureinfo')}}
                                            <span>JPEG, PNG, BMP or GIF • 50MB {{trans('messages.picturelimit')}}</span>

                                        </strong>
                                    </div>
                                </div>
                                @if ($errors->has('image')) <p class="help-block">{{ $errors->first('image') }}</p> @endif
                            </li>
                            <li class="rel-class">
                                <label>{{trans('messages.biography')}}</label>
                                <textarea rows="5" name='biography' id="biography" maxlength="300" >{{{$details->biography}}}</textarea>
                                <span class="character_counter_container abs-clas" >
                                    <span class="character_counter" rel="#project_name"  id="textarea_feedback">300</span>
                                    /300
                                </span>
                                <p>{{trans('messages.biographyinfo')}}.</p>

                            </li>
                             <li>                              
                                <div class="alert-message success" id="email-verify-alert" style='margin-left: 0%;width:80%;display:none;'>
                                    Email successfully sent.Click the link to verify your email.
                                </div>
                                <label>{{trans('messages.email')}}</label> 
                                <input  placeholder="{{trans('messages.email')}}" id="email" type="text" name="email" value="{{{$details->email}}}" disabled @if($details->emailstatus==1)style="background:#DEF089;" @endif>  <i class="fa fa-refresh fa-spin" style="margin-left: -30px;margin-right: 10px;display:none;" id="email-spin"></i> @if($details->emailstatus==0)<button type="button" class="verify-email" id="verify-email">Verify</button> @endif
                            </li>

                            <?php
                            $explodecontact = explode(',', $details->mobile);
                            $contactcount = count($explodecontact);
                            ?>
                            @if ($contactcount > 0)
                            <li class="clearfix">
                                <label>{{trans('messages2.contactnumber')}}</label> 
                                <div id="addlineitems">
                                    <?php $j = 0; ?>
                                    @foreach($explodecontact as $val)
                                    <div class="relative">
                                        <div id="linedescription{{$j}}" value="{{$j}}" >
                                            <input id="contact[]" class="contactno input-text full-width js-auto_focus only-number" style="margin-top: 10px;" value="{{$val}}" name='contact[]' >
                                            @if ($errors->has('mobile')) <p class="help-block">{{ $errors->first('mobile') }}</p> @endif

                                            @if ($j > 0)
                                            <div ><button type="button" id="{{$j}}" style="float: right;margin-top: -34px;" class="btn btn-red" onclick="removemore(this.id);">Remove</button></div>
                                            @endif
                                        </div>
                                        <?php $j++; ?>
                                        @endforeach
                                    </div>

                            </li>
                            @endif

                            <input type="hidden" id="lineitemvalue" name="lineitemvalue" value="{{$j}}" />

                            <li>
                                <div class="form-group custom clearfix">
                                    <div class="row">
                                        <div style="margin-left:4%;">
                                            <button type="button" class="btn btn-blue" onclick="addmore();">+ {{trans('messages2.addmorecontact')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <span class="contact_error" style="color:red;"></span>
                            <li class="rel-class">
                                <label>{{trans('messages.address')}}</label>
                                <textarea rows="3" name='address' id="address" >{{{$details->address}}}</textarea>  
                            </li>

                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <ul class="email-pre">
                            <li>
                                <label>{{trans('messages.country')}}</label>                            
                                <select name='country' >
                                    <option value="">--{{trans('messages.selectcountry')}}--</option>
                                    @foreach($countries as $country)
                                    <option @if($country->countryname==$details->country) selected @endif value='{{$country->countryname}}'>{{$country->countryname}}</option>
                                    @endforeach
                                </select>
                            </li>

                            <li>
                                <label>{{trans('messages.state')}}</label>
                                <input  placeholder="{{trans('messages.stateexample')}}" type="text" name="state" value="{{{$details->state}}}" class="state" >
                                <span class="state_error" style="color:red;float: left;"></span>
                            </li>
                            <li>
                                <label>{{trans('messages.city')}}</label>
                                <input  placeholder="{{trans('messages.cityexample')}}" type="text" name="city" value="{{{$details->city}}}" class="city" >
                                <span class="city_error" style="color:red;float: left;"></span>
                            </li>
                            <li>
                                <label>{{trans('messages.gender')}}</label>
                                @if($details->gender=="male")
                                <select name='gender'>
                                    <option value="">--{{trans('messages2.selectgender')}}--</option>
                                    <option value="male" selected="">{{trans('messages.male')}}</option>
                                    <option value="female">{{trans('messages.female')}}</option>
                                </select>
                                @elseif($details->gender=="female")
                                <select name='gender'>
                                    <option value="">--{{trans('messages2.selectgender')}}--</option>
                                    <option value="male">{{trans('messages.male')}}</option>
                                    <option value="female" selected="">{{trans('messages.female')}}</option>
                                </select>
                                @else
                                <select name='gender' >
                                    <option value="">--{{trans('messages2.selectgender')}}--</option>
                                    <option value="male">{{trans('messages.male')}}</option>
                                    <option value="female">{{trans('messages.female')}}</option>
                                </select>
                                @endif
                            </li>                            
                            <li>
                                <label>{{trans('messages.web')}}</label>  
                                <input  type="text" name="weburl" value="{{{$details->weburl}}}" >
                            </li>
                            <li class="li1" >
                                <label>{{trans('messages.selectsecurity')}}</label> 
                                <div class="relative">
                                    <?php $selected = $details->question; ?>
                                    <select name="question" class="input-text full-width js-auto_focus" style="background-image:none;>
                                        <option value="What was your childhood nickname?" <?php if ($selected == 'What was your childhood nickname?') echo ' selected="selected"' ?>>{{trans('messages.securityquestion1')}}</option>
                                        <option value="What is the name of your favorite childhood friend?" <?php if ($selected == 'What is the name of your favorite childhood friend?') echo ' selected="selected"' ?>>{{trans('messages.securityquestion2')}}</option>
                                        <option value="What is your favorite team?" <?php if ($selected == 'What is your favorite team?') echo ' selected="selected"' ?>>{{trans('messages.securityquestion3')}}</option>
                                        <option value="What is the name of person you first kissed?" <?php if ($selected == 'What is the name of person you first kissed?') echo ' selected="selected"' ?>>{{trans('messages.securityquestion4')}}</option>
                                        <option value="What was the name of your elementary / primary school?" <?php if ($selected == 'What was the name of your elementary / primary school?') echo ' selected="selected"' ?>>{{trans('messages.securityquestion5')}}</option>
                                        <option value="What is your pet's name?" <?php if ($selected == "What is your pet's name?") echo ' selected="selected"' ?>>{{trans('messages.securityquestion6')}}</option>
                                        <option value="In what year was your father born?" <?php if ($selected == 'In what year was your father born?') echo ' selected="selected"' ?>>{{trans('messages.securityquestion7')}}</option>
                                        <option value="What was the name of the first company you worked?" <?php if ($selected == 'What was the name of the first company you worked?') echo ' selected="selected"' ?>>{{trans('messages.securityquestion8')}}</option>
                                        <option value="In which city did you get married?" <?php if ($selected == 'In which city did you get married?') echo ' selected="selected"' ?>>{{trans('messages.securityquestion9')}}</option>
                                        <option value="What is your best friend's first name?" <?php if ($selected == "What is your best friend's first name?") echo ' selected="selected"' ?>>{{trans('messages.securityquestion10')}}</option>
                                    </select>
                                    @if ($errors->has('question')) <p class="help-block">{{ $errors->first('question') }}</p>@endif
                                </div>
                            </li>
                            <li class="clearfix">
                                <label>{{trans('messages.answer')}}</label> 
                                <div class="relative">
                                    <input id="copy-text" class="input-text full-width js-auto_focus"  value="{{{$details->answer}}}" name='answer' >
                                    @if ($errors->has('answer')) <p class="help-block">{{ $errors->first('answer') }}</p> @endif
                                </div>
                            </li>
                            <!--                            <li class="clearfix">
                                                            <label>{{trans('messages.paypalemail')}}</label> 
                                                            <div class="relative">
                                                                <input id="paypalemail" class="input-text full-width js-auto_focus email"  value="{{$details->paypalemail}}" name='paypalemail'>
                                                                @if ($errors->has('paypalemail')) <p class="help-block">{{ $errors->first('paypalemail') }}</p> @endif
                                                            </div>
                                                        </li>-->
                            <li>
                                <label>{{trans('messages.prooftype')}}</label>
                                <div class="relative" style="text-transform: none !important;">
                                    <select name="prooftype" id="prooftype" >
                                        <option value="">{{trans('messages.selectprooftype')}}</option>
                                        <option value="driving license" @if($details->prooftype=="driving license") selected="selected" @endif>Driving license</option>
                                        <option value="identity card" @if($details->prooftype=="identity card") selected="selected" @endif>Identity Card</option>
                                        <option value="passport" @if($details->prooftype=="passport") selected="selected" @endif>Passport</option>
                                    </select>
                                    @if ($errors->has('prooftype')) <p class="help-block">{{ $errors->first('prooftype') }}</p> @endif
                                </div>
                            </li>
                            <input type="hidden" value="{{$details->idproof}}" name="proof" id="proof">
                            <li>
                                <label>{{trans('messages.uploadidproof')}}</label>
                                <div class="upload idproof" @if($errors->has('identityproof')) style="border: 1px dashed #f00;" @endif>
                                     <div class="upload-left" style="height: 90px;">
                                        <img src="{{URL::to('')}}/{{$details->idproof}}" id="myProof" onerror="this.src='main/images/projectdefault.png'" style="width:100%;height:100%;">
                                        <input id="idproofval" class="idproofval" type="hidden" value='{{$details->idproof}}' >
                                    </div>
                                    <div class="upload-right">
                                        <input id="idproof" class="photo file" type="file" name='identityproof' >
                                        <strong class="center">
                                            {{trans('messages.pictureinfo')}}
                                            <span>JPEG, PNG, BMP or GIF • 50MB {{trans('messages.picturelimit')}}</span>
                                        </strong>
                                    </div>
                                </div>
                                @if ($errors->has('identityproof')) <p class="help-block">{{ $errors->first('identityproof') }}</p> @endif
                            </li>
                            <li class="clearfix">
                                <label>{{trans('messages2.profileverificationcheckbox')}}</label> 
                                <div class="relative">
                                    <input id="verify" style="width:7%;height: 20px;margin-top: 0;"  value="{{$details->accountverified}}"  name='verify'  @if(($details->accountverified=="1")||($details->accountverified=="2"))type="hidden" @else type="checkbox"  @endif>
                                    @if($details->accountverified=="1")
                                    <input type="hidden"  value="1"  name="checkval"  id="checkval">
                                    <i style="font-size: 14px;color: orange;line-height: 3;">{{trans('messages2.profileverificationsubmitted')}}.</i>
                                    @elseif($details->accountverified=="2")
                                    <input type="hidden"  value="1"  name="checkval"  id="checkval">
                                    <i style="font-size: 14px;color: green;line-height: 3;" class="fa fa-check">{{trans('messages2.profileverificationsuccess')}}.</i>
                                    @elseif($details->accountverified=="0")
                                    <i style="font-size: 14px;color: red;line-height: 3;">{{trans('messages2.youcantpostproject')}}.</i>
                                    @else 
                                    <i style="font-size: 14px;color: orangered;line-height: 3;">{{trans('messages2.profileverificationfailed')}}.</i>
                                    @endif     
                                </div>
                            </li>
                            <li class="rel-class">
                                <label>{{trans('messages.adminremarks')}}</label>
                                <textarea rows="2" name='adminremarks' id="adminremarks" readonly>{{{$details->adminremarks}}}</textarea>  
                            </li>
                        </ul>
                    </div>
                    <li>
                        <input class="blus-btnl" value="{{trans('messages.savesettings')}}" style="margin-left:1.8%;margin-top: 20px;" type="submit" onclick="return validateform();">
                        <a href="{{URL::to('profile')}}" style="margin-left:1.8%;">{{trans('messages.viewprofile')}}</a>
                        <input type="hidden"  value=""  name="checkval"  id="checkval">
                    </li>
                </form>
            </div>

        </div>
    </div>
</section>

<script>
    $("#verify-email").click(function () {
        var email = $("#email").val();
        $("#email-spin").show();
        $.ajax({
            type: "POST",
            datatype: "json",
            url: "./project/sendverification",
            data: {"email": email},
            success: function (data) {
                $("#email-verify-alert").show();
                $("#email-spin").hide();
                setTimeout(function () {
                    $('.alert-message').fadeOut('slow');
                }, 10000);
            }
        });
    });
</script>

<script>
    $(function () {
        $("#profile_photo").change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = imageIsLoaded1;
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
    function imageIsLoaded1(e) {
        $('#myImg').attr('src', e.target.result);
    }
    ;</script>

<script>
    $(function () {
        $("#idproof").change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = imageIsLoaded2;
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
    function imageIsLoaded2(e) {
        $('#myProof').attr('src', e.target.result);
    }
    ;</script>
<script>
    $(document).ready(function () {
        var text_max = 300;
        var text_length = $('#biography').val().length;
        if (text_length === 0) {
            $('#textarea_feedback').html(text_max);
        } else {
            $('#textarea_feedback').html(text_max - text_length);
        }

        $('#biography').keyup(function () {
            var text_length = $('#biography').val().length;
            var text_remaining = text_max - text_length;
            $('#textarea_feedback').html(text_remaining);
        });
    });</script>
<script type="text/javascript">
    function addmore() {
        var next = parseInt($('#lineitemvalue').val());
        next = ++next;
        var method = '<div class="relative" id="linedescription' + next + '">'
                + '<li>'
                + '<input id="copy-text" class="input-text full-width js-auto_focus email" onkeypress="return numbersonly(event)"  name="contact[]" >'
                + '</li>'
                + '<div ><button type="button" id="' + next + '" style="float: right;margin-top: -34px;" class="btn btn-red" onclick="removemore(this.id);">Remove</button></div>'
                + '</div>'
        $('#addlineitems').append(method);
        $('#lineitemvalue').val(next);
    }
    function removemore(id) {
        var i = parseInt($('#lineitemvalue').val());
        i--;
        $('#lineitemvalue').val(i);
        $("#linedescription" + id).remove();
    }
</script>
<script type="text/javascript">
    function numbersonly(e) {
        var unicode = e.charCode ? e.charCode : e.keyCode
        if (unicode != 8) { //if the key isn't the backspace key (which we should allow)
            if (unicode < 48 || unicode > 57) //if not a number
                return false //disable key press
        }
    }
</script>
<script type="text/javascript">
//    $(document).ready(function () {
    $('.only-number').on('keypress', function (key) {
        if (key.charCode < 48 || key.charCode > 57)
            return false;
    });
//    });
</script>
<script>
    function validateform() {
        var checkboxval = $('#checkval').val();
		if (checkboxval == 1) {
            var image = $('#profile_photo').val();
            var idproof = $('#idproof').val();
            var idproofval = $('#idproofval').val();
            var imageval = $('#imageval').val();
            if (image == "" && imageval == "") {
                $('.upload').css("border", "1px dashed red");
            } else {
                $('.upload').css("border", "");
            }

            if (idproof == "" && idproofval == "") {
                $('.idproof').css("border", "1px dashed red");
            } else {
                $('.idproof').css("border", "");
            }

            var phoneformat = /^[\s()+-]*([0-9][\s()+-]*){6,20}$/
            var contactno = $('input[name="contact[]"]').val();
            if (!phoneformat.test(contactno)) {
                $(".contactno").css("border", "1px solid red");
            } else {
                $(".contactno").css("border", "");
            }

            var alphabets = /^[a-zA-Z ]*$/;
            var state = $('.state').val();
            if (!alphabets.test(state)) {
                $(".state").css("border", "1px solid red");
            } else {
                $(".state").css("border", "");
            }

            var city = $('.city').val();
            if (!alphabets.test(city)) {
                $(".city").css("border", "1px solid red");
            } else {
                $(".city").css("border", "");
            }

            $("#commentForm").validate({
                rules: {
                    name: {
                        required: true,
                    },
                    country: {
                        required: true,
                    },
                    city: {
                        required: true,
                    },
                    state: {
                        required: true,
                    },
                    gender: {
                        required: true,
                    },
                    prooftype: {
                        required: true,
                    },
					weburl: {
                        required: true,
                        url: true
                    },
                    answer: {
                        required: true,
                    },
                    biography: {
                        required: true,
                    },
                    address: {
                        required: true,
                    },
                },
                submitHandler: function (form) {
                    form.submit();
                }
            });
        } else {
            form.submit();
        }
    }
    ;</script>

<script type="text/javascript">
    $('#verify').click(function () {
        $('#checkval').val($(this).is(':checked') ? 1 : 0);
    })
</script>
<style>
    input.error {
        border: 1px solid red;
    }
    .ast {
        color: red !important;
    }
    label.error  { 
        display:none !important; 
    }
</style>

@stop
