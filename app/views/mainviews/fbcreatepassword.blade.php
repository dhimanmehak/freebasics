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
                <form method="post" action="{{URL::to('postcreatefbpassword');}}">
                    
                    <h2 class="title-log">{{trans('messages.createpassword')}}</h2>    
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
                                <input id="pass1" class="input-text full-width js-auto_focus password @if($errors->has('username')) has-error @endif" type="text" placeholder="{{trans('messages.username')}}" name='username'>
                                @if ($errors->has('username')) <p class="help-block">{{ $errors->first('username') }}</p> @endif
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
                        <li class="li1" style='margin:20px 0 20px 0;'>
                            <div class="relative">
                                <select name="question" class="input-text full-width js-auto_focus email @if($errors->has('question')) has-error @endif">
                                    <option value=''>-- {{trans('messages.selectsecurityquestion')}} --</option>
                                    <option value="What was your childhood nickname?">{{trans('messages.securityquestion1')}}</option>
                                    <option value="What is the name of your favorite childhood friend?">{{trans('messages.securityquestion2')}}</option>
                                    <option value="What is your favorite team?">{{trans('messages.securityquestion3')}}</option>
                                    <option value="What is the name of person you first kissed?">{{trans('messages.securityquestion4')}}</option>
                                    <option value="What was the name of your elementary / primary school??">{{trans('messages.securityquestion5')}}</option>
                                    <option value="What is your pet's name?">{{trans('messages.securityquestion6')}}</option>
                                    <option value="In what year was your father born?">{{trans('messages.securityquestion7')}}</option>
                                    <option value="What was the name of the first company you worked?">{{trans('messages.securityquestion8')}}</option>
                                    <option value="In which city did you get married?">{{trans('messages.securityquestion9')}}</option>
                                    <option value="What is your best friend's first name?">{{trans('messages.securityquestion10')}}</option>
                                </select>
                                @if ($errors->has('question')) <p class="help-block">{{ $errors->first('question') }}</p> @endif

                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="relative">
                                <input id="copy-text" class="input-text full-width js-auto_focus email @if($errors->has('answer')) has-error @endif" type="text" placeholder="{{trans('messages.answer')}}" value="{{ Input::old('answer') }}" name='answer'>
                                @if ($errors->has('answer')) <p class="help-block">{{ $errors->first('answer') }}</p> @endif
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
