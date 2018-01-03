@extends('layouts.mainlayout')
@section('content')
<section>
    <div class="account">
        <div class="container">
            <div class="account-top">
                <h3 class="seting col-md-12">{{trans('messages.settings')}}</h3>
                <ul class="setig-li col-md-12">
                    <li><a href="{{URL::to('myaccount')}}">{{trans('messages.account')}}</a> </li>
                    <li><a href="{{URL::to('editprofile')}}"> {{trans('messages.editprofile')}} </a></li>
                    <li><a class="active" href="{{URL::to('privacysettings')}}"> {{trans('messages.privacysettings')}} </a></li>
                    <li><a href="{{URL::to('notifications')}}"> {{trans('messages.notifications')}}</a> </li>
                    <li><a href="{{URL::to('findfriends')}}"> {{trans('messages.findfriends')}} </a></li>

                </ul>

                @if(Session::has('success'))
                <div class="alert-message success" style='margin-top: 13%;'>
                    {{Session::get('success');}}
                </div>
                @endif
                <?php
                $previlege = Config::get('userprivilege.privilege');
                $unserilize = unserialize($userprivilege);
                //echo "<pre>";print_r($unserilize);"</pre>";exit;
                ?>
                <form action="{{URL::to('postprivacy')}}" method="post">
                    <div class="subs-area">
                        <h5 class="left-ara col-sm-4">{{trans('messages.general')}}</h5>
                        <div class="col-sm-8">
                            <h5>{{trans('messages.visibility')}}<span style="font-size:12px;color:#666;font-weight:normal">{{trans('messages.hiddenfromothers')}}</span></h5>
                        </div>
                    </div>                   
                    <div class="subs-area">
                        <label class="left-ara col-sm-4">{{trans('messages.email')}}</label>
                        <div class="col-sm-8">
                            <ul class="subs-area-li">
                                <li>
                                    <div class="left-int"><input type="checkbox" name="<?php echo $previlege[0] ?>"  <?php if (isset($unserilize['Email']) != "" && isset($unserilize['Email']) == "on") echo 'checked="checked"'; ?> ></div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="subs-area">
                        <label class="left-ara col-sm-4">{{trans('messages.mobile')}}</label>
                        <div class="col-sm-8">
                            <ul class="subs-area-li">
                                <li>
                                    <div class="left-int"><input type="checkbox" name="<?php echo $previlege[2] ?>" <?php if (isset($unserilize['Mobile']) != "" && isset($unserilize['Mobile']) == "on") echo 'checked="checked"'; ?>></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="subs-area">
                        <label class="left-ara col-sm-4">{{trans('messages.web')}}</label>
                        <div class="col-sm-8">
                            <ul class="subs-area-li">
                                <li>
                                    <div class="left-int"><input type="checkbox" name="<?php echo $previlege[3] ?>" <?php if (isset($unserilize['Website']) != "" && isset($unserilize['Website']) == "on") echo 'checked="checked"'; ?>></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="subs-area">
                        <label class="left-ara col-sm-4">{{trans('messages.biography')}}</label>
                        <div class="col-sm-8">
                            <ul class="subs-area-li">
                                <li>
                                    <div class="left-int"><input type="checkbox" name="<?php echo $previlege[4] ?>" <?php if (isset($unserilize['Bio-Graphy']) != "" && isset($unserilize['Bio-Graphy']) == "on") echo 'checked="checked"'; ?>></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <input class="blus-btnl" value="{{trans('messages.savesettings')}}" style="margin-left:1%;margin-top: 20px;" type="submit">
                </form>


            </div>

        </div>
    </div>
</section>

@stop


