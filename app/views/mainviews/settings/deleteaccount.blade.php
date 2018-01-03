@extends('layouts.mainlayout')
@section('content')
<div class="border-top" id="content-wrap">
    <div class="container" id="content">
        <div class="NS_projects__cancel">
            @if(Session::has('failed'))
            <div class="alert-message error">
                {{Session::get('failed');}}
            </div>
            @endif
            @if(Session::has('success'))
            <div class="alert-message success">
                {{Session::get('success');}}
            </div>
            @endif
            <div class="grey-frame grey-frame-narrow">
                <div class="grey-frame-inner">
                    <div id="intro">
                        <h2>{{trans('messages.hateseeyougo')}}!</h2>
                        <h3>
                            {{trans('messages.insteaddelete')}}
                        </h3><br>
                        <a class="button button_outline_grey submit button_small" type='submit' href="{{URL::to('unsubscribeemails')}}" >{{trans('messages.unsubscribeemails')}}</a>
                    </div>
                    <div id="will_and_not">
                        <h3>
                            {{trans('messages.deleteentirely')}}
                        </h3>
                        <div class="will_not">
                            <h4>
                                {{trans('messages.deletingaccount')}} <em>{{trans('messages.willnot')}}</em>
                            </h4>
                            <ul>
                                <li>
                                    {{trans('messages.removenamefromcomments')}}
                                </li>
                            </ul>
                        </div>
                        <div class="will">
                            <h4>
                                {{trans('messages.deletingaccount')}} <em>{{trans('messages.will')}}</em>
                            </h4>
                            <ul>
                                <li>
                                    {{trans('messages.deletelogin')}}
                                </li>
                                <li>
                                    {{trans('messages.deleteprofile')}}
                                </li>
                                <li>
                                    {{trans('messages.stopallnotifications')}} {{Session::get('email');}}
                                </li>
                                <li>
                                    {{trans('messages.cancelprojects')}}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <p>
                        {{trans('messages.please')}} <a href="/contact" class="Contact-me-popup" data-dismiss="modal" data-toggle="modal" data-target="#ReportModal">{{trans('messages.contactus')}}</a> {{trans('messages.haveanyquestions')}}.
                    </p>
                    <form accept-charset="UTF-8" action="{{URL::to('account/postdelete')}}" method="post">
                        <fieldset>
                            <label for="password">{{trans('messages.passwordforverification')}}</label>
                            <input class="password @if($errors->has('password')) has-error @endif" id="password" name="password" type="password">
                            @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
                            <br>
                            <div class="left"><input class="button button_outline_grey submit" name="commit" type="submit" value="{{trans('messages2.deleteaccountpermanently')}}" style=' background: #FC7; margin-top: 18px;'></div>
                            <div class="left" style="margin: 20px 0 0 20px"><a class="cancel" href="{{URL::To('myaccount')}}">{{trans('messages.cancel')}}</a></div>
                        </fieldset>
                    </form>
                    <p>
                        {{trans('messages.forgotyourpassword')}}?
                        <a href="{{URL::to('user/forgotpassword')}}">{{trans('messages.sendemailtoreset')}}</a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
@if(Session::has('email'))
<div class="modal modal-forg fade" id="ReportModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">{{trans('messages.sendmessage')}} {{trans('messages.smallto')}} Fundstarter</h4>
            </div> <!-- /.modal-header -->

            <div class="modal-body">
                <span><b>{{trans('messages.to')}}:</b></span> Fundstarter<br>
                <form class="pop-forms" style="margin-top: 20px;" method='post' action='{{URL::to('postfundstarter')}}' >
                    <input type="hidden" value="{{Session::get('name')}}" name="name"> 
                    <input type="hidden" value="{{Session::get('email')}}" name="email" > 
                    <input type="text" placeholder="Subject" name="subject" style="width:100%;margin-bottom:20px;" required=""> 
                    <textarea name="message" rows="5" placeholder="Message" required=""></textarea>
                    <input class="popup-btn" value="{{trans('messages.sendmessage')}}" type="submit">
                </form>


            </div> <!-- /.modal-body -->

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@else
<div class="modal modal-forg fade" id="ReportModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">{{trans('messages.loginrequired')}}!</h4>
            </div> <!-- /.modal-header -->

            <div class="modal-body">
                <p>{{trans('messages.loginrequiredmessage')}}!</p>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endif
@stop