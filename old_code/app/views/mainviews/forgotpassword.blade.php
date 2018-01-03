@extends('layouts.mainlayout')
@section('content')
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
                <form method="post" action="{{URL::to('postforgotpwd');}}">
                    <p class="center h5 grey-dark">{{trans('messages.forgotpasswordinfo')}}</p><br>
                    <ol class="login-form">
                        <li class="li1">
                            <input id="user_session_email" class="input-text full-width js-auto_focus email @if($errors->has('email')) has-error @endif" type="text" placeholder="{{trans('messages.email')}}" name="email" autofocus="autofocus" value="{{ Input::old('email') }}">
                             @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                        </li> 
            
              
                        <li class="clearfix restlv">
                            
                            <div class="center">
                                <input class="button button_green submit" type="submit" value="{{trans('messages.continue')}}" name="commit">
                            </div>
                        </li>
                    </ol>
                </form>
               
            </div>

            <div class="footer-bootom">
               {{trans('messages.haveaccount')}}?
                <a class="bold" href="{{URL::to('login')}}">{{trans('messages.login')}}!</a>
            </div>
        </div>
    </div>
</section>
@stop
