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
                <form method="post" action="{{URL::to('posttwitterchecklogin');}}">

                    <h5 class="title-log" style="text-align: center;  margin-bottom: 30px;  padding: 10px;  background: #ffffc9;  border-radius: 10px;  opacity: 0.8;">{{trans('messages.checkfbpassword')}}</h5>    
                    <input type="hidden" value="{{$id}}" name="id">
                    <ol class="login-form">
                        <li class="li1 relative">
                            <div class="user mb2">
                                <div class="avatar inline-block align-middle mr1">
                                    <img alt="" class="avatar-circle-small" height="40" src="{{URL::to('')}}/{{$user->image}}" onerror="this.src='{{URL::to('main/images/default.png')}}'" width="40">
                                </div>
                                <p class="inline-block h5 bold align-middle mb1">{{$user->firstname}} {{$user->lastname}}</p>
                            </div>
                        </li>
                        <li class="li1 relative">
                            <div class="relative">
                                <input id="pass1" class="input-text full-width js-auto_focus password @if($errors->has('password')) has-error @endif" type="password" placeholder="{{trans('messages.password')}}" name='password'>
                                @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
                                <a class="forgt-pss" href="{{URL::to('user/forgotpassword');}}"> {{trans('messages.forgot')}}? </a>
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
