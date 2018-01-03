@extends('layouts.mainlayoutold')
@section('content')
<section>
    <div class="created">
        <div class="container">
            <ul class="tab-nav right small_type bold">
                <li>
                    <a class="link-grey-dark current" href="{{URL::to('activity')}}">{{trans('messages.activity')}}</a>
                </li>
                <li>
                    <a class="link-grey-dark" href="{{URL::to('backedprojects')}}">{{trans('messages.backedprojects')}}</a>
                </li>
                <li>
                    <a class="link-grey-dark " href="{{URL::to('createdprojects')}}">{{trans('messages.createdprojects')}}</a>
                </li>
                <li>
                    <a class="link-grey-dark" href="{{URL::to('myaccount')}}">{{trans('messages.settings')}}</a>
                </li>
                <li>
                    <a class="link-grey-dark" href="{{URL::to('profile')}}">{{trans('messages.profile')}} ({{trans('messages.public')}})</a>
                </li>
            </ul>

            <h2 class="creat-tile">{{trans('messages.activity')}}</h2>
            @if($recentbackings=='[]')
            <span class="cret-sub-til2">{{trans('messages.notbacked')}}! {{trans('messages.checkoutour')}} <a href="{{URL::to('discover')}}">{{trans('messages.projectoftheday')}}</a>. {{trans('messages.welikeit')}}.</span>
            @else
            <span class="cret-sub-til" style="color:#999;">{{trans('messages.backedprojects')}}</span>
            <div class="section-middle-popular">
                @foreach($recentbackings as $project)
                <div class="col-sm-6 col-md-3">
                    <div class="project-card project-card-tall-big" data-project="">
                        <div class="project-thumbnail">
                            <a href="{{URL::to('project/detail')}}/{{$project->id}}">
                                <img class="project-thumbnail-img" width="100%" src="{{$project->projectimage}}" alt="Project image">
                            </a>
                        </div>
                        <div class="project-card-content">
                            <h6 class="project-title">
                                <a href="{{URL::to('project/detail')}}/{{$project->id}}">{{{$project->title}}}</a>
                            </h6>
                            <p class="project-byline">{{{$project->firstname}}}</p>
                            <p class="project-blurb"> {{{$project->shortblurb}}} </p>
                        </div>
                        <div class="project-card-footer">
                            <div class="project-location">
                                <a target="" href="#" data-location="">
                                    <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                                    <span class="location-name">{{$project->countryname}}</span>
                                </a>
                            </div>
                            <div class="project-stats-container">
                                @if(round((($project->totalpledgeamount/$project->fundinggoal)*100)>=100)&&($project->dayscount<0))
                                <div class="project-pledged-successful">
                                    <strong>{{trans('messages.successfullyfunded')}}!</strong>
                                </div>
                                @elseif(round((($project->totalpledgeamount/$project->fundinggoal)*100)<100)&&($project->dayscount<0))
                                <div class="project-pledged-successful" style="background:#D8000C;">
                                    <strong>{{trans('messages.expired')}}!</strong>
                                </div>
                                @else
                                <div class="project-progress-bar">
                                    <div class="project-percent-pledged" style="width: {{round(($project->totalpledgeamount/$project->fundinggoal)*100)}}%"></div>
                                </div>
                                @endif
                                <ul class="project-stats">
                                    <li>
                                        <div class="project-stats-value">{{round(($project->totalpledgeamount/$project->fundinggoal)*100)}}%</div>
                                        <span class="project-stats-label">{{trans('messages.smallfunded')}}</span>
                                    </li>
                                    <li>
                                        <div class="project-stats-value">
                                            <span class="money usd no-code">{{$project->currencysymbol}}{{$project->totalpledgeamount}}</span>
                                        </div>
                                        <span class="project-stats-label">{{trans('messages.pledged')}}</span>
                                    </li>
                                    <li style="display: none;">
                                        <div class="project-stats-value">{{trans('messages.funded')}}</div>
                                        <span class="project-stats-label"> </span>
                                    </li>  
                                    @if(round((($project->totalpledgeamount/$project->fundinggoal)*100)>=100)&&($project->dayscount<0))
                                    <li class="ksr_page_timer">
                                        <div class="project-stats-value text" data-word="left">{{trans('messages.fundedon')}}</div>
                                        <div class="project-stats-label">
                                            <div class="num">{{$project->enddate}}</div>
                                        </div>                                        
                                    </li>
                                    @elseif(round((($project->totalpledgeamount/$project->fundinggoal)*100)<100)&&($project->dayscount<0))
                                    <li class="ksr_page_timer">
                                        <div class="project-stats-value text " data-word="left">{{trans('messages.expiredon')}}</div>
                                        <div class="project-stats-label">
                                            <div class="num">{{$project->enddate}}</div>
                                        </div>

                                    </li>
                                    @else
                                    <li class="ksr_page_timer">
                                        <div class="project-stats-value">
                                            <div class="num">{{$project->dayscount}}</div>
                                        </div>
                                        <div class="project-stats-label text" data-word="left">{{trans('messages.daystogo')}}</div>
                                    </li>
                                    @endif

                                </ul>
                                <hr>
                                <div class="project-stats-container" >
                                    <div style=" background: #2bde73;color: #fff; padding-left: 10px;">{{trans('messages.yourpledge')}} - {{$project->pledgeamount}}</div>
                                   
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif

            </div>
        </div>
</section>
@stop