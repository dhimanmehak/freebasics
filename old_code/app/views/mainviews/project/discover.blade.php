@extends('layouts.mainlayout')
@section('content')
<section>
    <div class="discover-section">
        <div class="container">
            <h1 class="xplr-text">{{trans('messages.exploreprojects')}} </h1>
            <span class="sub-titls">{{count($categories);}} {{trans('messages.diversecategories')}}. {{trans('messages.thousandprojects')}}. </span>

            <ul class="catag">
                @foreach($categories as $category)
                <li>
                    <a href="{{URL::to('discover/category')}}/{{$category->id}}/magic">
                        <span class="liveproj">{{$category->total}} {{trans('messages.liveproject')}}</span>
                        <lablel class="sub-main">{{$category->categoryname}}</lablel>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

    </div>
</section>

<section>

    <div id="content-wrap" class="bg-white discover">

        <div class="container">

            <div class="has_potd js-projects-slider projects-slider">

                <div class="project-card-wrap project-card-wide-wrap bg-white rounded clip">

                    <div>  <!-- id="carousel-example-generic" class="carousel slide" data-ride="carousel" -->

                        <div class="carousel-inner">
                            <div class="item active"> 

                                <div class="project-card clearfix relative">
                                    @foreach($popularproject as $project)
                                    @if(Config::get('adminconfig.listingfee')==0)
                                    <div class="col-sm-5">
                                        <a href="{{URL::to('project/detail')}}/{{$project->id}}" height="240" width="320">
                                            <img alt="Project image" class="play_button mobile-hide" src="{{URL::to('')}}/{{$project->projectimage}}" style="width: 100%;" onerror="this.src='{{URL::to('main/images/projectdefault.png');}}'">
                                        </a></div>
                                    <div class="border-box clip pb1 pl1 project-card-interior pt1 relative col-sm-7" > 
                                        <div class="project-of-the-day-tag mb1 bg-green px1 h6 bold white inline-block" >
                                            {{trans('messages.projectoftheday')}}
                                        </div>
                                        <h4 class="project-title ellipsis mobile-center"><a class="green-dark" href="{{URL::to('project/detail')}}/{{$project->id}}">{{{$project->title}}}</a></h4> <p class="h6 grey-dark mobile-hide">by {{{$project->firstname}}} {{{$project->lastname}}}</p>

                                        <p class="blurb h5 grey-dark mb3 mobile-hide" style="margin-top:20px;">
                                            {{{$project->shortblurb}}}
                                        </p>
                                        <div class="project-card-footer absolute-bottom pl1 pr2 home-staff-picks-pr0">
                                            <ul class="project-meta list-inline h6 mb1 mobile-hide">
                                                <li class="mr2">
                                                    <a class="grey-dark" href="{{URL::to('discover/category')}}/{{$project->categoryid}}/magic"><span class="glyphicon glyphicon-tag"></span>
                                                        {{$project->categoryname}}
                                                    </a></li>
                                                <li>
                                                    <a class="grey-dark" href="{{URL::to('project/country')}}/{{$project->countryname}}"><span class="glyphicon glyphicon-map-marker"></span>
                                                        {{$project->countryname}}
                                                    </a></li>
                                                <li><span class="grey-dark"><span class="fa fa-thumbs-up"> {{$project->likes}}</span></span></li>

                                            </ul>
                                            <div class="project-stats-wrap">                                               
                                                <div class="NS_project__baseball_card_stats">
                                                    <div class="project-pledged-wrap bg-grey mb1 clip">
                                                        <div class="project-pledged bg-green full-height" style="width: {{round(($project->totalpledgeamount/$project->fundinggoal)*100)}}%"></div>
                                                    </div>
                                                    <ul class="project-stats list no-margin h6 no-wrap">
                                                        <li class="first funded inline-block mr2">
                                                            <strong class="block h4">{{round(($project->totalpledgeamount/$project->fundinggoal)*100)}}%</strong> <span class="grey-dark">{{trans('messages.smallfunded')}}</span>
                                                        </li>
                                                        <li class="pledged inline-block mr2">
                                                            <strong class="block h4"><span class="money usd no-code">{{$project->currencysymbol}} {{round((($project->totalpledgeamount*$project->rate)*100)/100)}}</span></strong> <span class="grey-dark">{{trans('messages.pledged')}}</span>
                                                        </li>
                                                        <li class="backers inline-block mr2 mobile-hide">
                                                            <strong class="block h4">{{$project->totalbacking}}</strong> <span class="grey-dark">{{trans('messages.backers')}}</span>
                                                        </li>                                                        
                                                        <li class="last ksr_page_timer inline-block" data-end_time="2015-03-09T22:43:55-04:00">
                                                            <strong class="block h6">
                                                                <div class="num h4">{{$project->dayscount}}</div>
                                                            </strong>
                                                            <div class="grey-dark" data-word="left">{{trans('messages.daystogo')}}</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    @else 
                                    @if($project->feerecieved==1)
                                    <div class="col-sm-5">
                                        <a href="{{URL::to('project/detail')}}/{{$project->id}}" height="240" width="320">
                                            <img alt="Project image" class="play_button mobile-hide" src="{{URL::to('')}}/{{$project->projectimage}}" style="width: 100%;height: 100%;" onerror="this.src='{{URL::to('main/images/projectdefault.png');}}'">
                                        </a></div>
                                    <div class="border-box clip pb1 pl1 project-card-interior pt1 relative col-sm-7" > 
                                        <div class="project-of-the-day-tag mb1 bg-green px1 h6 bold white inline-block" >
                                            {{trans('messages.projectoftheday')}}
                                        </div>
                                        <h4 class="project-title ellipsis mobile-center"><a class="green-dark" href="{{URL::to('project/detail')}}/{{$project->id}}">{{{$project->title}}}</a></h4> <p class="h6 grey-dark mobile-hide">by {{{$project->firstname}}} {{{$project->lastname}}}</p>

                                        <p class="blurb h5 grey-dark mb3 mobile-hide" style="margin-top:20px;">
                                            {{{$project->shortblurb}}}
                                        </p>
                                        <div class="project-card-footer absolute-bottom pl1 pr2 home-staff-picks-pr0">
                                            <ul class="project-meta list-inline h6 mb1 mobile-hide">
                                                <li class="mr2">
                                                    <a class="grey-dark" href="{{URL::to('discover/category')}}/{{$project->categoryid}}/magic"><span class="glyphicon glyphicon-tag"></span>
                                                        {{$project->categoryname}}
                                                    </a></li>
                                                <li>
                                                    <a class="grey-dark" href="{{URL::to('project/country')}}/{{$project->countryname}}"><span class="glyphicon glyphicon-map-marker"></span>
                                                        {{$project->countryname}}
                                                    </a></li>
                                                <li><span class="grey-dark"><span class="fa fa-thumbs-up"> {{$project->likes}}</span></span></li>

                                            </ul>
                                            <div class="project-stats-wrap">                                               
                                                <div class="NS_project__baseball_card_stats">
                                                    <div class="project-pledged-wrap bg-grey mb1 clip">
                                                        <div class="project-pledged bg-green full-height" style="width: {{round(($project->totalpledgeamount/$project->fundinggoal)*100)}}%"></div>
                                                    </div>
                                                    <ul class="project-stats list no-margin h6 no-wrap">
                                                        <li class="first funded inline-block mr2">
                                                            <strong class="block h4">{{round(($project->totalpledgeamount/$project->fundinggoal)*100)}}%</strong> <span class="grey-dark">{{trans('messages.smallfunded')}}</span>
                                                        </li>
                                                        <li class="pledged inline-block mr2">
                                                            <strong class="block h4"><span class="money usd no-code">{{$project->currencysymbol}} {{round((($project->totalpledgeamount*$project->rate)*100)/100)}}</span></strong> <span class="grey-dark">{{trans('messages.pledged')}}</span>
                                                        </li>
                                                        <li class="backers inline-block mr2 mobile-hide">
                                                            <strong class="block h4">{{$project->totalbacking}}</strong> <span class="grey-dark">{{trans('messages.backers')}}</span>
                                                        </li>                                                        
                                                        <li class="last ksr_page_timer inline-block" data-end_time="2015-03-09T22:43:55-04:00">
                                                            <strong class="block h6">
                                                                <div class="num h4">{{$project->dayscount}}</div>
                                                            </strong>
                                                            <div class="grey-dark" data-word="left">{{trans('messages.daystogo')}}</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    @endif
                                    @endif
                                    @endforeach
                                </div>
                            </div>

                        </div>

                        <!-- Controls --> 
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"> <span class="fa fa-angle-left">
                            </span> </a>

                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="fa fa-angle-right"></span> </a>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
</section>

<section>
    <div class="popular-section">
        <div class="container">
            <div class="top-popular-are col-md-12">
                <span class="popular-head">{{trans('messages.whatspopular')}}</span>

                <a class="seeall" href="{{URL::to('discover/category/all/popular')}}">{{trans('messages.seemore')}}</a>
            </div>

            <div class="section-middle-popular">
                @foreach($projects as $project)
                @if(Config::get('adminconfig.listingfee')==0)
                <div class="col-lg-4">
                    <div class="project-card project-card-tall-big" data-project="">
                        <div class="project-thumbnail">
                            <a href="{{URL::to('project/detail')}}/{{$project->id}}">
                                <img class="project-thumbnail-img" width="100%" src="{{URL::to('')}}/{{$project->projectimage}}" alt="Project image" onerror="this.src='{{URL::to('main/images/projectdefault.png');}}'">
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
                                <a target="" href="{{URL::to('project/country')}}/{{$project->countryname}}" data-location="">
                                    <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                                    <span class="location-name">{{$project->countryname}}</span>
                                </a>
                                <span class="grey-dark" style='display: inline;margin-left: 20px;'><span class="fa fa-thumbs-up"> {{$project->likes}}</span></span>
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
                                            <span class="money usd no-code">{{$project->currencysymbol}}{{round((($project->totalpledgeamount*$project->rate)*100)/100)}}</span>
                                        </div>
                                        <span class="project-stats-label">{{trans('messages.pledged')}}</span>
                                    </li>
                                    <li style="display: none;">
                                        <div class="project-stats-value">{{trans('messages.funded')}}</div>
                                        <span class="project-stats-label"> </span>
                                    </li>  
                                    @if(round((($project->totalpledgeamount/$project->fundinggoal)*100)>=100)&&($project->dayscount<0))
                                    <li class="ksr_page_timer">
                                        <div class="project-stats-value text" data-word="left">{{trans('messages.bigfundedon')}}</div>
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
                            </div>
                        </div>
                    </div>
                </div>
                @else
                @if($project->feerecieved==1)
                <div class="col-lg-4">
                    <div class="project-card project-card-tall-big" data-project="">
                        <div class="project-thumbnail">
                            <a href="{{URL::to('project/detail')}}/{{$project->id}}">
                                <img class="project-thumbnail-img" width="100%" src="{{URL::to('')}}/{{$project->projectimage}}" alt="Project image" onerror="this.src='{{URL::to('main/images/projectdefault.png');}}'">
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
                                <a target="" href="{{URL::to('project/country')}}/{{$project->countryname}}" data-location="">
                                    <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                                    <span class="location-name">{{$project->countryname}}</span>
                                </a>
                                <span class="grey-dark" style='display: inline;margin-left: 20px;'><span class="fa fa-thumbs-up"> {{$project->likes}}</span></span>
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
                                            <span class="money usd no-code">{{$project->currencysymbol}}{{round((($project->totalpledgeamount*$project->rate)*100)/100)}}</span>
                                        </div>
                                        <span class="project-stats-label">{{trans('messages.pledged')}}</span>
                                    </li>
                                    <li style="display: none;">
                                        <div class="project-stats-value">{{trans('messages.funded')}}</div>
                                        <span class="project-stats-label"> </span>
                                    </li>  
                                    @if(round((($project->totalpledgeamount/$project->fundinggoal)*100)>=100)&&($project->dayscount<0))
                                    <li class="ksr_page_timer">
                                        <div class="project-stats-value text" data-word="left">{{trans('messages.bigfundedon')}}</div>
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
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endif
                @endforeach

            </div>

        </div>
    </div>

    <div class="popular-section">
        <div class="container">
            <div class="top-popular-are col-md-12">
                <span class="popular-head">{{trans('messages2.newnoteworthy')}}</span>
                <a class="seeall" href="{{URL::to('discover/category/all/new')}}">{{trans('messages.seemore')}}</a>
            </div>

            <div class="section-middle-popular">
                @foreach($newprojects as $project)
                @if(Config::get('adminconfig.listingfee')==0)
                <div class="col-lg-4">
                    <div class="project-card project-card-tall-big" data-project="">
                        <div class="project-thumbnail">
                            <a href="{{URL::to('project/detail')}}/{{$project->id}}">
                                <img class="project-thumbnail-img" width="100%" src="{{$project->projectimage}}" alt="Project image" onerror="this.src='{{URL::to('main/images/projectdefault.png');}}'">
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
                                <a target="" href="{{URL::to('project/country')}}/{{$project->countryname}}" data-location="">
                                    <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                                    <span class="location-name">{{$project->countryname}}</span>
                                </a>
                                <span class="grey-dark" style='display: inline;margin-left: 20px;'><span class="fa fa-thumbs-up"> {{$project->likes}}</span></span>
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
                                            <span class="money usd no-code">{{$project->currencysymbol}}{{round((($project->totalpledgeamount*$project->rate)*100)/100)}}</span>
                                        </div>
                                        <span class="project-stats-label">{{trans('messages.pledged')}}</span>
                                    </li>
                                    <li style="display: none;">
                                        <div class="project-stats-value">{{trans('messages.funded')}}</div>
                                        <span class="project-stats-label"> </span>
                                    </li>  
                                    @if(round((($project->totalpledgeamount/$project->fundinggoal)*100)>=100)&&($project->dayscount<0))
                                    <li class="ksr_page_timer">
                                        <div class="project-stats-value text" data-word="left">{{trans('messages.bigfundedon')}}</div>
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
                            </div>
                        </div>
                    </div>
                </div>
                @else
                @if($project->feerecieved==1)
                <div class="col-lg-4">
                    <div class="project-card project-card-tall-big" data-project="">
                        <div class="project-thumbnail">
                            <a href="{{URL::to('project/detail')}}/{{$project->id}}">
                                <img class="project-thumbnail-img" width="100%" src="{{$project->projectimage}}" alt="Project image" onerror="this.src='{{URL::to('main/images/projectdefault.png');}}'">
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
                                <a target="" href="{{URL::to('project/country')}}/{{$project->countryname}}" data-location="">
                                    <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                                    <span class="location-name">{{$project->countryname}}</span>
                                </a>
                                <span class="grey-dark" style='display: inline;margin-left: 20px;'><span class="fa fa-thumbs-up"> {{$project->likes}}</span></span>
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
                                            <span class="money usd no-code">{{$project->currencysymbol}}{{round((($project->totalpledgeamount*$project->rate)*100)/100)}}</span>
                                        </div>
                                        <span class="project-stats-label">{{trans('messages.pledged')}}</span>
                                    </li>
                                    <li style="display: none;">
                                        <div class="project-stats-value">{{trans('messages.funded')}}</div>
                                        <span class="project-stats-label"> </span>
                                    </li>  
                                    @if(round((($project->totalpledgeamount/$project->fundinggoal)*100)>=100)&&($project->dayscount<0))
                                    <li class="ksr_page_timer">
                                        <div class="project-stats-value text" data-word="left">{{trans('messages.bigfundedon')}}</div>
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
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endif
                @endforeach

            </div>

        </div>
    </div>
</section>

@stop