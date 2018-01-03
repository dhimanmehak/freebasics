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
                <form method="post" action="{{URL::to('postresetforgotpwd');}}">

                    <h2 class="title-log">{{trans('messages.resetpassword')}}</h2>    
                    <input type="hidden" value="{{$id}}" name="id">
                    <ol class="login-form">
                        <li class="li1 relative">
                            <div class="relative">
                                <input class="input-text full-width js-auto_focus" type="text" name='username' value="{{$email}}" readonly>
                            </div>
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
                        <li class="clearfix restlv">

                            <div class="center">
                                <input class="button button_green submit" type="submit" value="{{trans('messages.submit')}}" name="commit">
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
