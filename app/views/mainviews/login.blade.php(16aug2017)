@extends('layouts.mainlayout')
@section('content')

<div class="error" id='cookie-error' style='display:none;padding: 1%;margin-top: 4.6%;text-align: center;font-size:14px;'> 
    Kindly enable cookies in your browser to login.
</div>
<section>
    <div class="login">
        @if(Session::has('success'))
        <div class="alert-message success">
            {{Session::get('success');}}
        </div>
        @endif
        @if(Session::has('failed'))
        <div class="alert-message error">
            {{Session::get('failed');}}
        </div>
        @endif

        <div class="login-container col-md-4">
            <div class="holder">
                <h2 class="title-log">{{trans('messages.login')}}</h2>
                <form method="post" action="{{URL::to('dologin');}}" id="formzip">
                    <ol class="login-form">
                        <li class="li1">
                            <input id="user_session_email" class="input-text full-width js-auto_focus email @if($errors->has('email')) has-error @endif" type="text" placeholder="{{trans('messages.email')}} {{trans('messages.or')}} {{trans('messages.username')}}" name="email" autofocus="autofocus" value="{{ Input::old('email') }}">
                            @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                        </li>
                        <li class="li1 relative">
                            <div class="relative">
                                <input id="user_session_password" class="input-text full-width js-auto_focus password @if($errors->has('password')) has-error @endif" type="password" placeholder="{{trans('messages.password')}}" name="password">
                                @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
                                <a class="forgt-pss" href="{{URL::to('user/forgotpassword');}}"> {{trans('messages.forgot')}}? </a>
                            </div>
                        </li>
                        <li class="clearfix restlv">
                            <div class="right remember-me">
                                <div class="pt1">
                                    <input id="user_session_remember_me" class="checkbox" type="checkbox" name="remember">
                                    <label class="label-checkbox h5 grey-dark" for="user_session_remember_me">{{trans('messages2.rememberme')}}</label>
                                </div>
                            </div>
                            <div class="center">
                                <input class="button button_green submit"z style='float:left;' type="submit" value="{{trans('messages.logmein')}}!" name="commit">
                            </div>
                        </li>
                    </ol>
                </form>
                @if(Config::get(('adminconfig.facebooksecretkey')!='' && Config::get('adminconfig.facebookappid')!='')|| (Config::get('adminconfig.consumerkey')!='' && Config::get('adminconfig.consumersecret')!='' && Config::get('adminconfig.accesstoken')!='' && Config::get('adminconfig.accesstokensecret')!=''))
                <div class="lined">
                    <span class="divs"></span>
                    <span class="ortxt"> {{trans('messages2.or')}} </span>
                </div>
                @if(Config::get('adminconfig.facebooksecretkey')!='' && Config::get('adminconfig.facebookappid')!='')

                <a href="{{URL::to('fblogin');}}" class="face-book">
                    <i></i>
                    <span>{{trans('messages.facebooklogin')}}</span>
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
                <p class="disp-text grey-dark" style="width:64%;margin-left:18%;">
                    {{trans('messages.postonfacebook')}}
                </p>
				@endif
				@endif
            </div>

            <div class="footer-bootom">
                {{trans('messages.newtokickstarter')}}?
                <a class="bold" href="{{URL::to('signup')}}">{{trans('messages.signup')}}!</a>
            </div>
        </div>
    </div>
</section>

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
