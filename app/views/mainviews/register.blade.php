@extends('layouts.mainlayout')
@section('content')

<section class="fb-signup-section">
    <div class="container">
      <div class="fb-signup-box">
        <div class="fb-signup-left"></div>
        <div class="fb-signup-right">
          <p class="fb-signup-top-text">Be the first of your friends to join the global revolution. <strong>Sign up now!</strong></p>
          <div class="fb-section-head-wrap fb-signup-head-wrap">
            <h3 class="fb-section-head" style="text-transform:uppercase;">{{trans('messages.signup')}}</h3>
          </div>
          <div class="fb-signup-form-wrapper">
            <form action="postsignup" method="post" id="formzip">
              <ul class="fb-signup-form-list signup-form">
                <li>
                  <input type="text" class="fb-input-text @if($errors->has('firstname')) has-error @endif" placeholder="First Name" required="required" id="fullName" name='firstname' value="{{ Input::old('firstname') }}"/>
                 @if ($errors->has('firstname')) <p class="help-block">{{ $errors->first('firstname') }}</p> @endif
                </li>
				
				<li>
				<input id="user_session_email" class="fb-input-text @if($errors->has('lastname')) has-error @endif" type="text" placeholder="{{trans('messages.lastname')}}" value="{{ Input::old('lastname') }}" name='lastname' required="required">
                            @if ($errors->has('lastname')) <p class="help-block">{{ $errors->first('lastname') }}</p> @endif
							
				</li>
				<li>
				<input id="txtNumeric" class="fb-input-text full-width @if($errors->has('username')) has-error @endif" type="text" placeholder="{{trans('messages.username')}}" value="{{ Input::old('username') }}" name='username' required="required">
                            @if ($errors->has('username')) <p class="help-block">{{ $errors->first('username') }}</p> @endif
				</li>
				
                <li>
                  <input type="text" class="fb-input-text @if($errors->has('email')) has-error @endif" placeholder="Email" required="required" id="Email" name='email'/>
                @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                </li>
				
                <li>
                  <input type="password" class="fb-input-text @if($errors->has('password')) has-error @endif" placeholder="Password" required="required" id="password" name='password'/>
                 @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
                </li>
				<li>
				 <input id="pass2" class="fb-input-text full-width js-auto_focus password @if($errors->has('confirm_password')) has-error @endif" type="password" placeholder="{{trans('messages.repassword')}}" name='confirm_password' required="required">
                                @if ($errors->has('confirm_password')) <p class="help-block">{{ $errors->first('confirm_password') }}</p> @endif
								</li>
				   <li class="fullwidth">
                            <div class="relative">
                                <select name="question" class="fb-input-text full-width js-auto_focus email @if($errors->has('question')) has-error @endif" required="required">
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
                        <li class="fullwidth">
                            <div class="relative">
                                <input id="copy-text" class="fb-input-text onlyText full-width js-auto_focus email @if($errors->has('answer')) has-error @endif" type="text" placeholder="{{trans('messages.answer')}}" value="{{ Input::old('answer') }}" name='answer' required="required">
                                @if ($errors->has('answer')) <p class="help-block">{{ $errors->first('answer') }}</p> @endif
                            </div>
                        </li>				
                <li class="fb-signup-btn-wrapper">
                  <button class="fb-signup-btn">
                    <p>I'm ready to start. Sign me up!</p>
                    <i class="icon-checked"></i>
                  </button>
                </li>
                <li class="fullwidth">
                  <span class="fb-signup-or-text"><i>or</i></span>
                </li>
                <li class="fb-facebook-signup-btn-wrapper">
                 <a href="{{URL::to('facebook/login')}}" class="fb-facebook-signup-btn">Sign up with Facebook</a>
                </li>
                <li class="fullwidth">
                  <span class="fb-alredy-member-text">Already a FreeBasics Citizen? <a href="{{URL::to('login')}}">Login</a></span>
                </li>
              </ul>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<script src="{{url::asset('main/js/customize-twitter-1.1.min.js');}}" type="text/javascript"></script>

<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="{{url::asset('main/js/bootstrap.min.js');}}"></script>
<script src="{{url::asset('main/js/jquery-ui.min.js');}}"></script>






<script>

  $('.FAB').on('click', function () {
  $(this).closest('.user-input').toggleClass('show-input');
  $(this).find(".icon-add").toggleClass("rotate");
});



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

