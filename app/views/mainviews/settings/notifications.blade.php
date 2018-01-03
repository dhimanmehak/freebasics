@extends('layouts.mainlayout')
@section('content') 
<section>
    <div class="account">
        <div class="container">
            <div class="">
                @if(Session::has('success'))
                <div class="alert-message success" style='margin-top: 2%;'>
                    {{Session::get('success');}}
                </div>
                @endif
                <h3 class="seting col-md-12">{{trans('messages.settings')}}</h3>
                <ul class="setig-li col-md-12">
                    <li><a href="{{URL::to('myaccount')}}">{{trans('messages.account')}}</a> </li>
                    <li><a href="{{URL::to('editprofile')}}"> {{trans('messages.editprofile')}} </a></li>
                    <li><a href="{{URL::to('privacysettings')}}"> {{trans('messages.privacysettings')}} </a></li>
                    <li><a  class="active" href="{{URL::to('notifications')}}"> {{trans('messages.notifications')}}</a> </li>
                    <li><a href="{{URL::to('findfriends')}}"> {{trans('messages.findfriends')}} </a></li>
                </ul>

                <form action="{{URL::to('postnotifications')}}" method="post">
                    <div class="subs-area">
                        <label class="left-ara col-sm-4">{{trans('messages.subscriptions')}}:</label>
                        <div class="col-sm-8">
                            <ul class="left-lop">
                                <li class="pdgs">
                                    <div class="left-int"><input type="checkbox" name="staffpick" @if($notification->staffpick==1) checked @endif></div>
                                    <div class="rigt-int">
                                        <h3>{{trans('messages.projectswelove')}}</h3>
                                        <span>{{trans('messages.projectswethinkcreative')}},{{trans('messages.inspiring')}}</span>
                                </li>

                                <li class="pdgs">
                                    <div class="left-int"><input type="checkbox" name="happening" @if($notification->happening==1) checked @endif></div>
                                    <div class="rigt-int">
                                        <h3> {{trans('messages.happening')}}</h3>
                                        <span>{{trans('messages.artsandculture')}}</span>               
                                </li>
                                <li class="pdgs">
                                    <div class="left-int"><input type="checkbox" name="newsandevents" @if($notification->newsandevents==1) checked @endif></div>
                                    <div class="rigt-int">
                                        <h3>{{trans('messages.newsandevents')}}</h3>
                                        <span>{{trans('messages.bigannouncements')}},{{trans('messages.relevantstuff')}}
                                        </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="subs-area">
                        <label class="left-ara col-sm-4">{{trans('messages.projectsyouback')}}:</label>
                        <div class="col-sm-8">
                            <div class="left-int"><input type="checkbox" name="backerupdates" @if($notification->backerupdates==1) checked @endif></div>
                            <span>{{trans('messages.newprojectupdates')}}</span>
                        </div>
                    </div>

                    <div class="subs-area">
                        <label class="left-ara col-sm-4">{{trans('messages.creatornotifications')}}:</label>
                        <div class="col-sm-8">
                            <ul class="subs-area-li">
                                <li>
                                    <div class="left-int"><input type="checkbox" name="creatorpledges" @if($notification->creatorpledges==1) checked @endif></div>
                                    <span>{{trans('messages.newpledges')}}</span>
                                </li>

                                <li>
                                    <div class="left-int"><input type="checkbox" name="creatorcomments" @if($notification->creatorcomments==1) checked @endif></div>

                                    <span>{{trans('messages.newcomments')}}</span>
                                </li>
                                <li>
                                    <div class="left-int"><input type="checkbox" name="newlikes"  @if($notification->newlikes==1) checked @endif></div>
                                    <span>{{trans('messages.newlikes')}}</span>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <div class="subs-area">
                        <label class="left-ara col-sm-4">{{trans('messages.socailnotifications')}}:</label>
                        <div class="col-sm-8">
                            <ul class="subs-area-li">
                                <li>
                                    <div class="left-int"><input type="checkbox" name="friendactivity"  @if($notification->friendactivity==1) checked @endif></div>
                                    <span>{{trans('messages.friendsback')}}</span>
                                </li>
                                <li>
                                    <div class="left-int"><input type="checkbox" name="newfollowers"  @if($notification->newfollowers==1) checked @endif></div>
                                    <span>{{trans('messages.newfollowers')}}</span>
                                </li>
                                
                            </ul>
                        </div>

                    </div>
                    <div class="subs-area">
                        <label class="left-ara col-sm-4"></label>
                        <div class="col-sm-8">
                            <input class="blus-btnl" type="submit" value="{{trans('messages.savesettings')}}">
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@stop
