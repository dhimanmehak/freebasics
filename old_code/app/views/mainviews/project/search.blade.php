@extends('layouts.mainlayout')
@section('content')
<section>
    <div class="search-page-section">
        <div class="container">
            <h3 class="h3-tags">   
                <form action="{{URL::to('search')}}" method="get">
                    <span style='margin-right:15px;'>{{trans('messages.showme')}}</span>
                    <span><input type='text' name='search'  value='{{$input}}'></span>
                    <span style='margin-left:15px;'>{{trans('messages.projects')}} {{trans('messages.in')}}</span>
                    <span  class="cats ar-flow"><p>{{trans('messages.allcategories')}}</p><i class="fa fa-angle-down"></i>

                        <ul class="drp-arns catagrgi">
                            <i class="hvr"></i>
                            <a href="{{URL::to('search/category')}}/all/{{$sort}}/{{{$input}}}/all" style="color: #32a633;"> {{trans('messages.allcategories')}}</a>
                            @foreach($categories as $category)
                            <li>
                                <a href="{{URL::to('search/category')}}/{{$category->id}}/{{$sort}}/{{{$input}}}/all"> {{$category->categoryname}} </a>
                            </li>
                            @endforeach
                        </ul>
                    </span>  

                    <span >{{trans('messages2.sortedby')}}</span>
                    @if($sort=="magic")
                    <span class="magis ar-flow" style="width: 180px;"><p>{{trans('messages.magic')}}</p><i class="fa fa-angle-down"></i>
                        @elseif($sort=="popular")
                        <span class="magis ar-flow" style="width: 180px;"><p>{{trans('messages.popularity')}}</p><i class="fa fa-angle-down"></i>
                            @elseif($sort=="new")
                            <span class="magis ar-flow" style="width: 180px;"><p>{{trans('messages.newest')}}</p><i class="fa fa-angle-down"></i>
                                @elseif($sort=="enddate")
                                <span class="magis ar-flow" style="width: 180px;"><p>{{trans('messages.enddate')}}</p><i class="fa fa-angle-down"></i>
                                    @else
                                    <span class="magis ar-flow" style="width: 180px;"><p>{{trans('messages.mostfunded')}}</p><i class="fa fa-angle-down"></i>
                                        @endif
                                        <ul class="drp-arns magds" style="left:-4px;">
                                            <i class="hvr"></i>
                                            <li>
                                                <a href="{{URL::to('search/category')}}/<?php if ($selected == "all") { ?>all<?php } else { ?>{{$selected->id}}<?php } ?>/magic/{{{$input}}}/all"> {{trans('messages.magic')}} </a>
                                            </li>
                                            <li>
                                                <a href="{{URL::to('search/category')}}/<?php if ($selected == "all") { ?>all<?php } else { ?>{{$selected->id}}<?php } ?>/popular/{{{$input}}}/all"> {{trans('messages.popularity')}} </a>
                                            </li>
                                            <li>
                                                <a class="" href="{{URL::to('search/category')}}/<?php if ($selected == "all") { ?>all<?php } else { ?>{{$selected->id}}<?php } ?>/new/{{{$input}}}/all"> {{trans('messages.newest')}} </a>
                                            </li>
                                            <li>
                                                <a class="" href="{{URL::to('search/category')}}/<?php if ($selected == "all") { ?>all<?php } else { ?>{{$selected->id}}<?php } ?>/enddate/{{{$input}}}/all"> {{trans('messages.enddate')}} </a>
                                            </li>
                                            <li>
                                                <a class="" href="{{URL::to('search/category')}}/<?php if ($selected == "all") { ?>all<?php } else { ?>{{$selected->id}}<?php } ?>/funded/{{{$input}}}/all"> {{trans('messages.mostfunded')}} </a>
                                            </li>
                                        </ul>

                                    </span>
                                     <span >{{trans('messages.in')}}</span>

                                    <span class="magis2 ar-flow" style="width: 180px;"><p>{{trans('messages.allcountries')}}</p><i class="fa fa-angle-down"></i>

                                        <ul class="drp-arns magds2 fihed-height" style="left:-4px;">
                                            <i class="hvr"></i>
                                            <a href="{{URL::to('search/category')}}/<?php if ($selected == "all") { ?>all<?php } else { ?>{{$selected->id}}<?php } ?>/{{$sort}}/{{{$input}}}/all" style="color: #32a633;"> {{trans('messages.allcountries')}}</a>
                                            @foreach($countries as $country)
                                            <li>
                                                <a href="{{URL::to('search/category')}}/<?php if ($selected == "all") { ?>all<?php } else { ?>{{$selected->id}}<?php } ?>/{{$sort}}/{{{$input}}}/{{$country->id}}"> {{$country->countryname}} </a>
                                            </li>
                                            @endforeach
                                        </ul>

                                    </span>


                                    </h3>
                                    </form>
                        <!--<span class="advance-search">Advance Search</span>-->

                                    </div>
                                    </div>

                                    </section>


                                    <section>
                                        <div class="popular-section search-page">
                                            <div class="container">
                                                <div class="top-popular-are col-md-12">
                                                    <h3>
                                                        {{trans('messages.explore')}}
                                                        <b class="color-gern">{{count($projects)}} {{trans('messages.projects')}}</b>
                                                    </h3>
                                                </div>

                                                <div class="section-middle-popular">

                                                    @foreach($projects as $project)
                                                    @if(Config::get('adminconfig.listingfee')==0)
                                                    <div class="col-sm-6 col-md-3">
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
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @else
                                                    @if($project->feerecieved==1)
                                                    <div class="col-sm-6 col-md-3">
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
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @endif
                                                    @endforeach

                                                </div>

                                                <!--                                                <div class="load-div">
                                                                                                    <a class="load" href="#">{{trans('messages.loadmore')}}</a>
                                                                                                </div>-->

                                            </div>
                                        </div>
                                    </section>
                                    <script>


                                        $(document).ready(function () {
                                            $('.cats').click(function (event) {
                                                event.stopPropagation();
                                                $(".catagrgi").slideToggle("fast");
                                            });
                                            $(".catagrgi").on("click", function (event) {
                                                event.stopPropagation();
                                            });
                                        });

                                        $(document).on("click", function () {
                                            $(".catagrgi").hide();
                                        });


                                        $(document).ready(function () {
                                            $('.magis').click(function (event) {
                                                event.stopPropagation();
                                                $(".magds").slideToggle("fast");
                                            });
                                            $(".magds").on("click", function (event) {
                                                event.stopPropagation();
                                            });
                                        });

                                        $(document).on("click", function () {
                                            $(".magds").hide();
                                        });

                                        $(document).ready(function () {
                                            $('.magis2').click(function (event) {
                                                event.stopPropagation();
                                                $(".magds2").slideToggle("fast");
                                            });
                                            $(".magds2").on("click", function (event) {
                                                event.stopPropagation();
                                            });
                                        });



                                    </script>  
                                    @stop

