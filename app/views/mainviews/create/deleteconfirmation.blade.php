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
            <div class="grey-frame grey-frame-narrow">
                <div class="grey-frame-inner">
                    <div id="cancel_project">
                        <h3>{{trans('messages.deleteproject')}}</h3>
                        <p>
                            {{trans('messages.areyousuredelete1')}} <strong>{{$project->title}}</strong> {{trans('messages.areyousuredelete2')}}
                        </p>
                        <form accept-charset="UTF-8" action="{{URL::to('project/postdelete')}}" method="post">
                            <fieldset>
                                <label for="password">{{trans('messages.passwordforverification')}}:</label>
                                <input type='hidden' value='{{$project->userid}}' name='userid'>
                                <input type='hidden' value='{{$project->id}}' name='projectid'>
                                <div class="left">
                                    <input class="password @if($errors->has('password')) has-error @endif" name="password" type="password" >
                                    @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
                                </div>
                            </fieldset>                            
                            <fieldset>
                                <div class="left"><input class="button button_outline_grey submit" type="submit" value="{{trans('messages.deleteproject')}}"></div>
                                <div class="left"><a class="cancel" href="{{URL::to('project/preview')}}/{{Crypt::encrypt($project->id)}}">{{trans('messages.nonevermind')}}</a></div>
                            </fieldset>
                        </form>
                    </div>
                    <div id="forgot_password">
                        <h5>{{trans('messages.forgotyourpassword')}}?</h5>
                        <a accept-charset="UTF-8" class="button button_green submit" href="{{URL::to('user/forgotpassword')}}" style='margin-top: 15px;'>{{trans('messages.sendresetemail')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop