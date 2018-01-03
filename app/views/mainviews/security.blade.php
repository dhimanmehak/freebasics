@extends('layouts.mainlayoutold')
@section('content')
<section>
    <div class="login security-page">
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
                <form method="post" action="{{URL::to('postsecurity');}}">
					<ol>
                    
						<li class="clearfix" style='margin:20px 0 20px 0;'>
                            <div class="relative">
                                
                                <!--
                                <input id="copy-text" class="input-text full-width js-auto_focus email @if($errors->has('question')) has-error @endif" type="text" placeholder="{{trans('messages.question')}}" value="{{Session::get('question');}}" name='question' readonly>
                                -->
                                <?php $selected = Session::get('question'); ?>
                                    <select name="question1" class="input-text full-width js-auto_focus" style="background-image:none;" disabled="true">
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
                                    <input type="hidden" name="question" value="{{Session::get('question');}}">
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
