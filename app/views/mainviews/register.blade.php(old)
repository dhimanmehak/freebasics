@extends('layouts.mainlayout')
@section('content')

<div class="error" id='cookie-error' style='display:none;padding: 1%;margin-top: 4.6%;text-align: center;font-size:14px;'> 
    Kindly enable cookies in your browser to login.
</div>
<section>
    <div class="login">
        <div class="login-container col-md-4">
            <div class="holder">
                <h2 class="title-log"> {{trans('messages.signup')}} </h2>
                <form action="postsignup" method='post' id="formzip">
                    <ol class="login-form">
                        <li class="li1">
                            <input id="" class="onlyText input-text full-width @if($errors->has('firstname')) has-error @endif" type="text" placeholder="{{trans('messages.firstname')}}" value="{{ Input::old('firstname') }}" name='firstname'>
                            @if ($errors->has('firstname')) <p class="help-block">{{ $errors->first('firstname') }}</p> @endif
                        </li>

                        <li class="li1">
                            <input id="user_session_email" class="onlyText input-text full-width @if($errors->has('lastname')) has-error @endif" type="text" placeholder="{{trans('messages.lastname')}}" value="{{ Input::old('lastname') }}" name='lastname'>
                            @if ($errors->has('lastname')) <p class="help-block">{{ $errors->first('lastname') }}</p> @endif
                        </li>

                        <li class="li1">
                            <input id="txtNumeric" class="input-text full-width @if($errors->has('username')) has-error @endif" type="text" placeholder="{{trans('messages.username')}}" value="{{ Input::old('username') }}" name='username'>
                            @if ($errors->has('username')) <p class="help-block">{{ $errors->first('username') }}</p> @endif
                        </li>
                        <li class="li1">
                            <input id="copy-text" class="input-text full-width js-auto_focus email @if($errors->has('email')) has-error @endif" type="email" placeholder="{{trans('messages.email')}}" value="{{ Input::old('email') }}" name='email'>
                            @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                        </li>

                        <li class="li1">
                            <input id="paste-text" class="input-text full-width js-auto_focus email @if($errors->has('confirm_email')) has-error @endif" type="email" placeholder="{{trans('messages.reemail')}}" value="{{ Input::old('confirm_email') }}" name='confirm_email'>
                            @if ($errors->has('confirm_email')) <p class="help-block">{{ $errors->first('confirm_email') }}</p> @endif
                        </li>
                        <li class="li1 relative">
                            <div class="relative">
                                <input id="pass1" class="input-text full-width js-auto_focus password @if($errors->has('password')) has-error @endif" type="password" placeholder="{{trans('messages.password')}}" name='password'>
                                @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
                            </div>
                        </li>
                        <li class="li1 relative">
                            <div class="relative">
                                <input id="pass2" class="input-text full-width js-auto_focus password @if($errors->has('confirm_password')) has-error @endif" type="password" placeholder="{{trans('messages.repassword')}}" name='confirm_password'>
                                @if ($errors->has('confirm_password')) <p class="help-block">{{ $errors->first('confirm_password') }}</p> @endif
                            </div>
                        </li>
                        <li class="li1" style='margin:20px 0 20px 0;'>
                            <div class="relative">
                                <select name="question" class="input-text full-width js-auto_focus email @if($errors->has('question')) has-error @endif">
                                    <option value=''>-- {{trans('messages.selectsecurityquestion')}} --</option>
                                    <option value="What was your childhood nickname?" {{ (Input::old("question") == "What was your childhood nickname?" ? "selected":"") }}>{{trans('messages.securityquestion1')}}</option>
                                    <option value="What is the name of your favorite childhood friend?"  {{ (Input::old("question") == "What is the name of your favorite childhood friend?" ? "selected":"") }}>{{trans('messages.securityquestion2')}}</option>
                                    <option value="What is your favorite team?" {{ (Input::old("question") == "What is your favorite team?" ? "selected":"") }}>{{trans('messages.securityquestion3')}}</option>
                                    <option value="What is the name of person you first kissed?" {{ (Input::old("question") == "What is the name of person you first kissed?" ? "selected":"") }}>{{trans('messages.securityquestion4')}}</option>
                                    <option value="What was the name of your elementary / primary school?" {{ (Input::old("question") == "What was the name of your elementary / primary school?" ? "selected":"") }}>{{trans('messages.securityquestion5')}}</option>
                                    <option value="What is your pet's name?" {{ (Input::old("question") == "What is your pet's name?" ? "selected":"") }}>{{trans('messages.securityquestion6')}}</option>
                                    <option value="In what year was your father born?" {{ (Input::old("question") == "In what year was your father born?" ? "selected":"") }}>{{trans('messages.securityquestion7')}}</option>
                                    <option value="What was the name of the first company you worked?" {{ (Input::old("question") == "What was the name of the first company you worked?" ? "selected":"") }}>{{trans('messages.securityquestion8')}}</option>
                                    <option value="In which city did you get married?" {{ (Input::old("question") == "In which city did you get married?" ? "selected":"") }}>{{trans('messages.securityquestion9')}}</option>
                                    <option value="What is your best friend's first name?" {{ (Input::old("question") == "What is your best friend's first name?" ? "selected":"") }}>{{trans('messages.securityquestion10')}}</option>
                                </select>
                                @if ($errors->has('question')) <p class="help-block">{{ $errors->first('question') }}</p> @endif

                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="relative">
                                <input id="copy-text" class="input-text onlyText full-width js-auto_focus email @if($errors->has('answer')) has-error @endif" type="text" placeholder="{{trans('messages.answer')}}" value="{{ Input::old('answer') }}" name='answer'>
                                @if ($errors->has('answer')) <p class="help-block">{{ $errors->first('answer') }}</p> @endif
                            </div>
                        </li>

                        <li class="clearfix">
                            <div class="ful-right remember-me">
                                <div class="pt1">
                                    <input class="checkbox" type="checkbox" value="1" name="subscription" checked="checked">
                                    <label class="label-checkbox h5 grey-dark" for="user_session_remember_me">
                                        {{trans('messages.weeklynewsletter')}}</label>
                                </div>
                            </div>
                            <div class="sign-meleft">
                                <input class="button button_green submit" type="submit" value="{{trans('messages.signmeup')}}!" name="commit">
                            </div>
                        </li>
                    </ol>
                </form>
                <p class="disp-text grey-dark">
                    {{trans('messages.agree')}}
                    <a class="popup" target="_blank" href="{{URL::to('pages/terms-of-use');}}">{{trans('messages.terms')}}</a>
                    ,
                    <a class="popup" target="_blank" href="{{URL::to('pages/privacy-policy');}}">{{trans('messages.privacy')}}</a>
                    , {{trans('messages.and')}}
                    <a class="popup" target="_blank" href="{{URL::to('pages/cookie-policy');}}">{{trans('messages.cookie')}}</a>
                    . 
                </p>
                @if(Config::get(('adminconfig.facebooksecretkey')!='' && Config::get('adminconfig.facebookappid')!='')|| (Config::get('adminconfig.consumerkey')!='' && Config::get('adminconfig.consumersecret')!='' && Config::get('adminconfig.accesstoken')!='' && Config::get('adminconfig.accesstokensecret')!=''))
                <div class="lined">
                    <span class="divs"></span>
                    <span class="ortxt"> {{trans('messages.or')}} </span>
                </div>
                @if(Config::get('adminconfig.facebooksecretkey')!='' && Config::get('adminconfig.facebookappid')!='')
                <a href="{{URL::to('fblogin');}}" class="face-book">
                    <i></i>
                    <span> {{trans('messages.facebooklogin')}}</span>
                </a>
                @endif
                @if(Config::get('adminconfig.consumerkey')!='' && Config::get('adminconfig.consumersecret')!='' && Config::get('adminconfig.accesstoken')!='' && Config::get('adminconfig.accesstokensecret')!='')
                <span style="margin:20px;"></span>

                <a href="{{URL::to('twitter/login');}}" class="face-book" style="background:#5EA9DD;background-image:none">
                    <i class="fa fa-twitter-square" style="background-image:none;font-size: 15px;"></i>
                    <span>{{trans('messages.twitterlogin')}}</span>
                </a>
                @endif  
                @if(Config::get('adminconfig.facebooksecretkey')!='' && Config::get('adminconfig.facebookappid')!='')				
                <p class="disp-text grey-dark"  style="width:64%;margin-left:18%;">
                    {{trans('messages.postonfacebook')}}
                </p>
                @endif
				@endif
            </div>

            <div class="footer-bootom">
                {{trans('messages.haveaccount')}}?
                <a class="bold" href="{{URL::to('login')}}">{{trans('messages.login')}}!</a>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function () {
        $('#paste-text').bind('cut copy paste', function (e) {
            e.preventDefault(); //this line will help us to disable cut,copy,paste		
        });
    });

</script>
<script>
    $(".input-text").each(function () {
        $(this).keypress(function () {
            $(this).next().fadeOut();
            $(this).removeClass('has-error');
        });
        $(this).change(function () {
            $(this).next().fadeOut();
            $(this).removeClass('has-error');
        });
    }); // <-- time in milliseconds
</script>
<script type="text/javascript">
    $(function () {
        $('.onlyText').keydown(function (e) {
            if (e.ctrlKey || e.altKey) {
                e.preventDefault();
            } else {
                var key = e.keyCode;
                if (!((key == 8) || (key == 46) || (key == 32) || (key == 9) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                    e.preventDefault();
                }
            }
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        $('#txtNumeric').keydown(function (e) {
            if (e.ctrlKey || e.altKey || e.shiftKey) {
                e.preventDefault();
            } else {
                var key = e.keyCode;
                if (!((key == 8) || (key == 46) || (key == 9) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 65 && key <= 90))) {
                    e.preventDefault();
                }
            }
        });
    });
</script>
<script>
    $('#formzip').on('submit', function () {
//    function are_cookies_enabled()
//    {
        var x = "Cookies enabled: " + navigator.cookieEnabled;
        if (navigator.cookieEnabled == false) {
            $("#cookie-error").css('display', 'block');
             return false;
        }
//    }
    });
</script>

@stop

