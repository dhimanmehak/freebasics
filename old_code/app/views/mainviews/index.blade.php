@extends('layouts.mainlayout')
@section('content')
<link href="main/css/owl.carousel.css" rel="stylesheet">
<link rel="stylesheet" href="{{URL::to('main/css/screen.css');}}" type="text/css" >
<div class="svg-wrap">
    <svg width="64" height="64" viewBox="0 0 64 64">
    <path id="arrow-left" d="M46.077 55.738c0.858 0.867 0.858 2.266 0 3.133s-2.243 0.867-3.101 0l-25.056-25.302c-0.858-0.867-0.858-2.269 0-3.133l25.056-25.306c0.858-0.867 2.243-0.867 3.101 0s0.858 2.266 0 3.133l-22.848 23.738 22.848 23.738z" />
    </svg>
    <svg width="64" height="64" viewBox="0 0 64 64">
    <path id="arrow-right" d="M17.919 55.738c-0.858 0.867-0.858 2.266 0 3.133s2.243 0.867 3.101 0l25.056-25.302c0.858-0.867 0.858-2.269 0-3.133l-25.056-25.306c-0.858-0.867-2.243-0.867-3.101 0s-0.858 2.266 0 3.133l22.848 23.738-22.848 23.738z" />
    </svg>
</div>
<div id="owl-demo" class="owl-carousel owl-theme">
    @foreach($sliders as $slider)
    <div class="item">
        <a href="{{$slider->sliderurl}}">
            <img src="{{URL::to($slider->sliderimage)}}" alt="Fundstarter-banner-img">
        </a>
        <div class="caption">
            <h1>{{{$slider->slidertitle}}} </h1>
            <p> {{{$slider->sliderdescription}}}</p>
        </div>
    </div>
    @endforeach
</div>

<script type="text/javascript" src="{{URL::to('main/js/sleekslider.min.js');}}"></script>
<script type="text/javascript" src="{{URL::to('main/js/app.js');}}"></script>

<section>
    <style type="text/css">

        .section-white {
            border-radius: 0;
            padding: 0;
        }

        .section-white div {
            border-radius: 0;
        }

        .section-white img {
            border-radius: 0;
        }
        /* Makes images fully responsive */

        .img-responsive,
        .thumbnail > img,
        .thumbnail a > img,
        .carousel-inner > .item > img,
        .carousel-inner > .item > a > img {
            display: block;
            /*width: 100%;
            height: auto;*/
        }

        /* ------------------- Carousel Styling ------------------- */

        .carousel-caption {
            background-color: inherit;
            bottom: auto;
            color: #fff;
            left: 0;
            padding: 0 0 10px 25px;
            position: absolute;
            right: 0;
            top: 200px;
            z-index: 10;
        }

        .carousel-indicators {
            bottom: 0;
            display: inline-block;
            left: 0;
            margin: 0;
            padding: 0 25px 25px 0;
            position: absolute;
            right: 0;
            text-align: center;
            width: 100%;
            z-index: 15;
        }

        .carousel-control.left,
        .carousel-control.right {
            background-image: none;
        }
        .carousel-control
        {
            font-size:35px !important;
        }


        /* ------------------- Section Styling - Not needed for carousel styling ------------------- */
        .carousel-indicators{top: auto;}


        .section-white {
            background-color: #fff;
            color: #555;
        }





        .center-data{display: inline-block;text-align: center;width: 100%}

        .new-headerlin{
            font-size: 3.5em;
            font-weight: normal;
            text-align: center;
        }

        .new-subheads{
            font-size: 22px;
            margin-bottom: 40px;
            margin-top: 10px;   
            float: left; width: 100%; text-align: center;
        }

        .whtes-green {
            background: none repeat scroll 0 0 #2bde73;
            border-radius: 3px;
            color: #fff;
            display: inline-block;
            margin: 0 auto;
            padding: 12px 29px;
            text-shadow: 0 0 0 #fff;
        }
        .carousel-indicators li{float: none; display: inline-block;}

        .carousel-control.left{z-index: 10; left: 30px;}
        .carousel-control.right{z-index: 10; right: 30px;}



        /* ------------------- Section Styling - Not needed for carousel styling ------------------- */
        .carousel-indicators{top: auto;}


        .section-white {
            background-color: #fff;
            color: #555;
        }





        .center-data{display: inline-block;text-align: center;width: 100%}

        .new-headerlin{
            font-size: 3.5em;
            font-weight: normal;
            text-align: center;
        }

        .new-subheads{
            font-size: 22px;
            margin-bottom: 40px;
            margin-top: 10px;   
            float: left; width: 100%; text-align: center;
        }

        .whtes-green {
            background: none repeat scroll 0 0 #2bde73;
            border-radius: 3px;
            color: #fff;
            display: inline-block;
            margin: 0 auto;
            padding: 12px 29px;
            text-shadow: 0 0 0 #fff;
        }
        .carousel-indicators li{float: none; display: inline-block;}

        .carousel-control.left{z-index: 10; left: 30px;}
        .carousel-control.right{z-index: 10; right: 30px;}

    </style>

    <section>
        <div id="content-wrap" class="bg-white">
            <div class="NS_site__homepage_staff_picks py2 bg-grey-light border-bottom">
                <div class="container">
                    <div class="">
                        <div class="col-xs-9">
                            <div class="has_potd js-projects-slider projects-slider" id="project-slide">
                                <div class="">
                                    <?php $i = 0; ?>
                                    @foreach($categoryprojects as $temp=>$value)
                                    @foreach($value as $temp)
                                    @if($i == 0)
                                    <?php $firstproj = $temp->categoryid; ?>
                                    @endif
                                    <?php $i++; ?>
                                    <div id="poj_{{$temp->categoryid}}" class="col col-12 no-margin project project0 relative @if($temp->categoryid==$firstproj)actived @endif">
                                        <div class="title pb3">
                                            <div class="row">
                                                <div class="col">
                                                    <h3 class="art no-margin normal">
                                                        {{trans('messages.staffpics')}}: {{$temp->categoryname}}
                                                    </h3>
                                                </div>
                                                <div class="col-right see-all-link">
                                                    <a class="h6 bold grey-dark" href="{{URL::to('discover/category')}}/{{$temp->categoryid}}/magic">
                                                        {{trans('messages.seeall')}} {{$temp->categoryname}} {{trans('messages.projects')}}
                                                    </a></div>
                                            </div>
                                        </div>
                                        <div class="project-card-wrap project-card-wide-wrap bg-white rounded clip">
                                            <div class="project-card clearfix relative">
                                                <div class="col-sm-5">
                                                    <a href="{{URL::to('project/detail')}}/{{$temp->id}}" height="240" width="320">
                                                        <img alt="Project image." class="play_button " src="{{URL::to('')}}/{{$temp->projectimage}}" onerror="this.src='{{URL::to('main/images/projectdefault.png');}}'">
                                                    </a></div>
                                                <div class="border-box clip pb1 pl1 project-card-interior pt1 relative col-sm-7">
                                                    <h4 class="project-title ellipsis mobile-center"><a class="green-dark" href="{{URL::to('project/detail')}}/{{$temp->id}}">{{{$temp->title}}}</a></h4> <p class="h6 grey-dark ">by {{{$temp->firstname}}} {{{$temp->lastname}}}</p><br>
                                                    <p class="blurb h5 grey-dark mb3 ">
                                                        {{{$temp->shortblurb}}}
                                                    </p>
                                                    <div class="project-card-footer absolute-bottom pl1 pr2 home-staff-picks-pr0">
                                                        <ul class="project-meta list-inline h6 mb1 ">
                                                            <li class="mr2">
                                                                <a class="grey-dark" href="{{URL::to('discover/category')}}/{{$temp->categoryid}}/magic"><span class="glyphicon glyphicon-tag"></span>
                                                                    {{$temp->categoryname}}
                                                                </a></li>
                                                            <li>
                                                                <a class="grey-dark" href="{{URL::to('project/country')}}/{{$temp->countryname}}"><span class="glyphicon glyphicon-map-marker"></span>
                                                                    {{$temp->countryname}}
                                                                </a></li>

                                                            <li><span class="grey-dark"><span class="fa fa-thumbs-up"> {{$temp->likes}}</span></span></li>
                                                        </ul>
                                                        <div class="project-stats-wrap">                                                       
                                                            <div class="NS_project__baseball_card_stats">
                                                                @if(round((($temp->totalpledgeamount/$temp->fundinggoal)*100)>=100)&&($temp->dayscount<0))
                                                                <div class="project-pledged-successful">
                                                                    <strong>{{trans('messages.successfullyfunded')}}!</strong>
                                                                </div>
                                                                @elseif(round((($temp->totalpledgeamount/$temp->fundinggoal)*100)<100)&&($temp->dayscount<0))
                                                                <div class="project-pledged-successful expired">
                                                                    <strong>{{trans('messages.expired')}}!</strong>
                                                                </div>
                                                                @else

                                                                <div class="project-pledged-wrap bg-grey mb1 clip">
                                                                    <div class="project-pledged bg-green full-height" style="width: {{round(($temp->totalpledgeamount/$temp->fundinggoal)*100)}}%"></div>
                                                                </div>
                                                                @endif
                                                                <ul class="project-stats list no-margin h6 no-wrap">
                                                                    <li class="first funded inline-block mr2">
                                                                        <strong class="block h4">{{round(($temp->totalpledgeamount/$temp->fundinggoal)*100)}}%</strong> <span class="grey-dark">{{trans('messages.smallfunded')}}</span>
                                                                    </li>
                                                                    <li class="pledged inline-block mr2">
                                                                        <strong class="block h4"><span class="money usd no-code pledged-sym">{{$temp->currencysymbol}}{{round(($temp->totalpledgeamount*$temp->rate)*100)/100}}</span></strong> <span class="grey-dark">{{trans('messages.pledged')}}</span>
                                                                    </li>
                                                                    <li class="backers inline-block mr2 mobile-hide">
                                                                        <strong class="block h4">{{$temp->totalbacking}}</strong> <span class="grey-dark">{{trans('messages.backers')}}</span>
                                                                    </li>     
                                                                    @if(round((($temp->totalpledgeamount/$temp->fundinggoal)*100)>=100)&&($temp->dayscount<0))
                                                                    <li class="ksr_page_timer">
                                                                        <div class="project-stats-value text" data-word="left">{{trans('messages.fundedon')}}</div>
                                                                        <div class="project-stats-label">
                                                                            <div class="num"> {{substr($temp->enddate, 0, -9);}}</div>
                                                                        </div>                                        
                                                                    </li>
                                                                    @elseif(round((($temp->totalpledgeamount/$temp->fundinggoal)*100)<100)&&($temp->dayscount<0))
                                                                    <li class="ksr_page_timer">
                                                                        <div class="project-stats-label">
                                                                            <div class="num">{{substr($temp->enddate, 0, -9);}}</div>
                                                                        </div>

                                                                        <div class="project-stats-value text " data-word="left">{{trans('messages.expiredon')}}</div>
                                                                        <q></q>
                                                                    </li>
                                                                    @else
                                                                    <li class="last ksr_page_timer inline-block">
                                                                        <strong class="block h6">
                                                                            <div class="num h4">{{$temp->dayscount}}</div> 
                                                                        </strong>
                                                                        <div class="grey-dark" data-word="left">{{trans('messages.daystogo')}}</div>
                                                                    </li>
                                                                    @endif
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                    @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 col-xs-3 padisg0">
                            <div class="js-category-nav category-nav border-left mt2 mb2 ml1 mr1">
                                <ul class="nav h5 list">
                                    <?php $i = 0; ?>
                                    @foreach($categoryprojects as $temp=>$value)                                   
                                    @foreach($value as $temp)
                                    @if($i == 0)
                                    <?php $first = $temp->categoryid; ?>
                                    @endif
                                    <?php $i++; ?>
                                    <li id="{{$temp->categoryid}}" class="listsd @if($temp->categoryid==$first)selected @endif">
                                        <a class="green-dark link" href="javascript:void(0)">
                                            {{$temp->categoryname}}
                                        </a>
                                    </li>

                                    @endforeach
                                    @endforeach
                                </ul>
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
                    @if($project->dayscount>=0)
                    <div class="col-sm-4">
                        <div class="project-card project-card-tall-big" data-project="">
                            <div class="project-thumbnail">
                                <a href="{{URL::to('project/detail')}}/{{$project->id}}">
                                    <img class="project-thumbnail-img" onerror="this.src='{{URL::to('main/images/projectdefault.png');}}'" width="100%" src="{{URL::to('')}}/{{$project->projectimage}}" alt="Project image">
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
                                    <div class="project-pledged-successful expired">
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
                                                <span class="money usd no-code pledged-sym">{{$project->currencysymbol}}{{round((($project->totalpledgeamount*$project->rate)*100)/100)}}</span>
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
                                                <div class="num">{{substr($project->enddate, 0, -9);}}</div>
                                            </div>                                        
                                        </li>
                                        @elseif(round((($project->totalpledgeamount/$project->fundinggoal)*100)<100)&&($project->dayscount<0))
                                        <li class="ksr_page_timer">
                                            <div class="project-stats-label">
                                                <div class="num">{{substr($project->enddate, 0, -9);}}</div>
                                            </div>  <div class="project-stats-value text " data-word="left">{{trans('messages.expiredon')}}</div>

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
                    @else 
                    @if($project->feerecieved==1)
                    @if($project->dayscount>=0)
                    <div class="col-md-4">
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
                                    <div class="project-pledged-successful expired">
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
                                                <span class="money usd no-code pledged-sym"><?php echo $project->currencysymbol; ?> {{round((($project->totalpledgeamount*$project->rate)*100)/100)}}</span>
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
                                                <div class="num">{{substr($project->enddate, 0, -9);}}</div>
                                            </div>                                        
                                        </li>
                                        @elseif(round((($project->totalpledgeamount/$project->fundinggoal)*100)<100)&&($project->dayscount<0))
                                        <li class="ksr_page_timer">
                                            <div class="project-stats-label">
                                                <div class="num">{{substr($project->enddate, 0, -9);}}</div>
                                            </div>

                                            <div class="project-stats-value text " data-word="left">{{trans('messages.expiredon')}}</div>

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
                    @endif
                    @endforeach

                </div>

            </div>
        </div>
    </section>

    <!--- backer section starts-->

    <section>
        <div class="backr-imag">
            <div class="backer-section">
                <div class="container">

                    <div class="client-container">

                        <div class="fund-text-contr"> <span class="top-fund-text">{{trans('messages.topfunds')}}</span>
                        </div>
                        <div class="">

                            <ul class="Backers-loop" id="stats-section">
                                <li class="col-sm-4">
                                    <span>{{trans('messages.totalfunded')}}</span>
                                    <i class="fa fa-thumbs-o-up"></i>
                                    <label>@if($project=='[]') $ 0 @else<?php echo$project->currencysymbol; ?>{{round((($totalfund*$project->rate)*100)/100)}}@endif </label>
                                </li>


                                <li class="col-sm-4">
                                    <span>{{trans('messages.highpjtfund')}}</span>
                                    <i class="fa fa-paper-plane-o"></i>
                                    <label>@if($project=='[]') $ 0 @else{{$project->currencysymbol}}{{round((($highestprojectfund*$project->rate)*100)/100)}}@endif</label>
                                </li>


                                <li class="col-sm-4">
                                    <span>{{trans('messages.highpledgeamt')}}</span>
                                    <i class="fa fa-line-chart"></i>
                                    <label>@if($project=='[]') $ 0 @else{{$project->currencysymbol}}{{round((($highestpledge*$project->rate)*100)/100)}}@endif</label>
                                </li>
                            </ul>

                        </div>

                    </div></div>
            </div></div>
    </section>

    <!--- backer section end-->





    <!--- client section starts-->

    <section>
        <div class="client-section">



            <div class="partnr-descr">
                <div class="container">
                    <span class="our-partenrtxt">{{trans('messages.ourpartners')}}</span>
                </div>
            </div>



            <ul class="client-loopsd">
                @foreach($prefooters as $prefooter)
                <li><a href="{{$prefooter->footerlink}}" target="_blank"><img class="image " src="{{URL::to($prefooter->image)}}" ></a></li>
                @endforeach
            </ul>


        </div>
    </section>

    <section>
        <div class="subsription-container">
            <div classs="container">
                <div class="center-form-contner">
                    <span class="registr-title">{{trans('messages.footermsg')}}.</span>

                    <form method='post' action='{{URL::to('postsubscription')}}' id='subscribe'>
                        @if(Session::has('subsuccess'))
                        <script>
$('html, body').animate({
    scrollTop: $("#subscribe").offset().top
}, 2000);
                        </script> 
                        <p class="help-block" style='color:#1fa304 !important;margin-top: 4%;'>{{Session::get('subsuccess')}}</p>@endif
                        <input placeholder="{{trans('messages.emailaddress')}}" type="text" name='email' class='@if($errors->has('email')) has-error @endif'>
                               @if ($errors->has('email')) 
                        <script>
                            $('html, body').animate({
                                scrollTop: $("#subscribe").offset().top
                            }, 2000);
                        </script> 
                        <p class="help-block">{{ $errors->first('email') }}</p> @endif
                        <input type="submit" value="{{trans('messages.subscribe')}}">
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="js/jssor.slider.mini.js"></script>
    <script type="text/javascript" src="js/slide-js.js"></script>
    <script src="main/js/owl.carousel.js" type="text/javascript" ></script>
    <script>
                            $(document).ready(function () {
                                $("#owl-demo").owlCarousel({
                                    navigation: true, // Show next and prev buttons
                                    slideSpeed: 300,
                                    paginationSpeed: 400,
                                    singleItem: true,
                                    autoPlay: true,
                                    navigationText: ['<span class="glyphicon glyphicon-chevron-left"></span>', '<span class="glyphicon glyphicon-chevron-right"></span>'],
                                    // "singleItem:true" is a shortcut for:
                                    // items : 1, 
                                    // itemsDesktop : false,
                                    // itemsDesktopSmall : false,
                                    // itemsTablet: false,
                                    // itemsMobile : false

                                });

                            });
    </script>
    @stop