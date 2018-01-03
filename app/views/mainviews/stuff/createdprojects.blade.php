@extends('layouts.mainlayoutold')
@section('content')
<section>
    <div class="created">
        <div class="container">
            <ul class="tab-nav right small_type bold">
                <li>
                    <a class="link-grey-dark" href="{{URL::to('activity')}}">{{trans('messages.activity')}}</a>
                </li>
                <li>
                    <a class="link-grey-dark " href="{{URL::to('backedprojects')}}">{{trans('messages.backedprojects')}}</a>
                </li>
                <li>
                    <a class="link-grey-dark current" href="{{URL::to('createdprojects')}}">{{trans('messages.createdprojects')}}</a>
                </li>
                <li>
                    <a class="link-grey-dark" href="{{URL::to('myaccount')}}">{{trans('messages.settings')}}</a>
                </li>
                <li>
                    <a class="link-grey-dark" href="{{URL::to('profile')}}">{{trans('messages.profile')}} ({{trans('messages.public')}})</a>
                </li>
            </ul>           
            @if(Session::has('success'))
            <div class="alert-message success" style="margin-top: 7%;"> 
                {{Session::get('success');}}
            </div>
            @endif
            <h2 class="creat-tile">{{trans('messages.createdprojects')}}</h2>
            <span class="cret-sub-til">{{trans('messages.keeptrackofcreated')}}</span>
            @if($createdprojects=='[]')
            <span class="cret-sub-til2">{{trans('messages.notcreated')}}! {{trans('messages.kickstart')}} <a href="{{URL::to('project/start')}}">{{trans('messages.ownproject')}}</a>.</span>
            @else
            <span class="cret-sub-til" style="font-size: 24px;font-weight: bold;padding: 20px 0px 5px 0px;color:#98B50B">{{trans('messages.liveprojects')}}</span>
            @if($projecttype['livecount']==0)      
            <span class="cret-sub-til" style='margin-bottom: 50px;'>{{trans('messages.noprojectsfound')}}.</span>          
            @else
            <ul class="project-staus">
                @foreach($createdprojects as $project)
                <?php if ($project->dayscount >0 && $project->projectverified == 2) { ?>
                    <li>
                        <div class="projsttus-left"><a href="#"><img src="{{URL::to('')}}/{{$project->projectimage}}" onerror="this.src='{{URL::to('main/images/projectdefault.png')}}'"></a></div>
                        <div class="projsttus-center">

                            <div class="right-afr">
                                <span>{{{$project->title}}}</span>                          
                                <p style=" font-size: 14px;margin-top:5px;">{{{$project->shortblurb}}}</p>
                                <a class="hmobile-left" href="{{URL::to('project/basic')}}/{{Crypt::encrypt($project->id)}}"> {{trans('messages.continueediting')}} </a>
                            </div>
                        </div>
                    </li>
                <?php } ?>
                @endforeach
            </ul>
            @endif
            <span class="cret-sub-til" style="font-size: 24px;font-weight: bold; padding: 20px 0px 5px 0px;color:orange">{{trans('messages.draftprojects')}}</span>
            @if($projecttype['draftcount']==0)
            <span class="cret-sub-til" style='margin-bottom: 50px;'>{{trans('messages.noprojectsfound')}}.</span>               
            @else
            <ul class="project-staus">
                @foreach($createdprojects as $project)
                <?php if ($project->projectverified == 0) { ?>
                    <li>
                        <div class="projsttus-left"><a href="#"><img src="{{URL::to('')}}/{{$project->projectimage}}" onerror="this.src='{{URL::to('main/images/projectdefault.png')}}'"></a></div>
                        <div class="projsttus-center">

                            <div class="right-afr">
                                <span>{{{$project->title}}}</span>                          
                                <p style=" font-size: 14px;margin-top:5px;">{{{$project->shortblurb}}}</p>
                                <a class="hmobile-left" href="{{URL::to('project/basic')}}/{{Crypt::encrypt($project->id)}}"> {{trans('messages.continueediting')}} </a>
                            </div>
                        </div>
                    </li>
                <?php } ?>
                @endforeach
            </ul>
            @endif    
            <span class="cret-sub-til" style="font-size: 24px;font-weight: bold; padding: 20px 0px 5px 0px;color:orange">{{trans('messages.pendingprojects')}}</span>
            @if($projecttype['pendingcount']==0)
            <span class="cret-sub-til" style='margin-bottom: 50px;'>{{trans('messages.noprojectsfound')}}.</span>               
            @else
            <ul class="project-staus">
                @foreach($createdprojects as $project)
                <?php if ($project->projectverified == 1) { ?>
                    <li>
                        <div class="projsttus-left"><a href="#"><img src="{{URL::to('')}}/{{$project->projectimage}}" onerror="this.src='{{URL::to('main/images/projectdefault.png')}}'"></a></div>
                        <div class="projsttus-center">

                            <div class="right-afr">
                                <span>{{{$project->title}}}</span>                          
                                <p style=" font-size: 14px;margin-top:5px;">{{{$project->shortblurb}}}</p>
                                <a class="hmobile-left" href="{{URL::to('project/basic')}}/{{Crypt::encrypt($project->id)}}"> {{trans('messages.continueediting')}} </a>
                            </div>
                        </div>
                    </li>
                <?php } ?>
                @endforeach
            </ul>
            @endif	

            <span class="cret-sub-til" style="font-size: 24px;font-weight: bold; padding: 20px 0px 5px 0px;color:red">{{trans('messages.suspendedprojects')}}</span>
            @if($projecttype['suspendedcount']==0)
            <span class="cret-sub-til" style='margin-bottom: 50px;'>{{trans('messages.noprojectsfound')}}.</span>               
            @else
            <ul class="project-staus">
                @foreach($createdprojects as $project)
                <?php if ($project->projectverified == 3) { ?>
                    <li>
                        <div class="projsttus-left"><a href="#"><img src="{{URL::to('')}}/{{$project->projectimage}}" onerror="this.src='{{URL::to('main/images/projectdefault.png')}}'"></a></div>
                        <div class="projsttus-center">

                            <div class="right-afr">
                                <span>{{{$project->title}}}</span>                          
                                <p style=" font-size: 14px;margin-top:5px;">{{{$project->shortblurb}}}</p>
                                <a class="hmobile-left" href="{{URL::to('project/basic')}}/{{Crypt::encrypt($project->id)}}"> {{trans('messages.continueediting')}} </a>
                            </div>
                        </div>
                    </li>
                <?php } ?>
                @endforeach
            </ul>
            @endif
            <span class="cret-sub-til" style="font-size: 24px;font-weight: bold; padding: 20px 0px 5px 0px;color:red">{{trans('messages.expiredprojects')}}</span>

            <?php $count = 0; ?>
            <ul class="project-staus">
                @foreach($createdprojects as $project)
                @if($project->dayscount <0 && $project->projectverified==2)
                <li>
                    <div class="projsttus-left"><a href="#"><img src="{{URL::to('')}}/{{$project->projectimage}}" onerror="this.src='{{URL::to('main/images/projectdefault.png')}}'"></a></div>
                    <div class="projsttus-center">

                        <div class="right-afr">
                            <span>{{{$project->title}}}</span>                          
                            <p style=" font-size: 14px;margin-top:5px;">{{{$project->shortblurb}}}</p>
                            <a class="hmobile-left" href="{{URL::to('project/basic')}}/{{Crypt::encrypt($project->id)}}"> {{trans('messages.continueediting')}} </a>
                        </div>
                    </div>
                </li>
                <?php $count++; ?>
                @endif
                @endforeach
            </ul>
            @if($count==0)
            <span class="cret-sub-til" style='margin-bottom: 50px;'>{{trans('messages.noprojectsfound')}}.</span>    
            @endif
            @endif
        </div>
    </div>
</section>
@stop