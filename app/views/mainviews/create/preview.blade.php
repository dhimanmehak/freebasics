@extends('layouts.mainlayoutold')
@section('content')
<style type="text/css">
.gru-btns
{
	
	cursor:default;
}
.fb-project-goal-wrapper img {
    max-width: 90px;
}
</style>
<section>
<div class="col-md-12 text-center">
 @if ($projectdetails->projectverified == 2)

		<div class="stepwizard">
 <div class="stepwizard-row setup-panel">
   
      <div class="stepwizard-step">
        <a href="{{URL::to('project/basic')}}/{{Crypt::encrypt($projectdetails->id)}}" type="button" class="btn btn-default btn-circle">1</a>
        <p>Project Details</p>
      </div>
      <div class="stepwizard-step">
        <a href="{{URL::to('project/reward')}}/{{Crypt::encrypt($projectdetails->id)}}" type="button" class="btn btn-default btn-circle">2</a>
        <p>Incentives to supporters</p>
      </div>
      <div class="stepwizard-step">
        <a href="{{URL::to('project/story')}}/{{Crypt::encrypt($projectdetails->id)}}" type="button" class="btn btn-default btn-circle">3</a>
        <p>Social Impact</p>
      </div>
	  <div class="stepwizard-step">
        <a href="{{URL::to('project/preview')}}/{{Crypt::encrypt($projectdetails->id)}}" type="button" class="btn btn-primary btn-circle active">4</a>
        <p>Submit</p>
      </div>
	  <div class="stepwizard-step">
        <a href="{{URL::to('project/updates')}}/{{Crypt::encrypt($projectdetails->id)}}" type="button" class="btn btn-default btn-circle">5</a>
        <p>Updates</p>
      </div>
	   <div class="stepwizard-step">
        <a href="{{URL::to('project/backers')}}/{{Crypt::encrypt($projectdetails->id)}}" type="button" class="btn btn-default btn-circle">6</a>
        <p>Donors</p>
      </div>
	  
	   <div class="stepwizard-step">
        <a href="{{URL::to('project/faq')}}/{{Crypt::encrypt($projectdetails->id)}}" type="button" class="btn btn-default btn-circle">7</a>
        <p>FAQ's</p>
      </div>
    </div>
	
	</div>
				
				
@else
	<div class="stepwizard">
 <div class="stepwizard-row setup-panel">
 
 
      <div class="stepwizard-step">
        <a href="#" type="button" class="btn btn-default btn-circle">1</a>
        <p>Project Type</p>
      </div>
      <div class="stepwizard-step">
        <a href="{{URL::to('project/basic')}}/{{Crypt::encrypt($projectdetails->id)}}" type="button" class="btn btn-default btn-circle">2</a>
        <p>Project Details</p>
      </div>
      <div class="stepwizard-step">
        <a href="{{URL::to('project/reward')}}/{{Crypt::encrypt($projectdetails->id)}}" type="button" class="btn btn-default btn-circle">3</a>
        <p>Incentives to supporters</p>
      </div>
	  <div class="stepwizard-step">
        <a href="{{URL::to('project/story')}}/{{Crypt::encrypt($projectdetails->id)}}" type="button" class="btn btn-default btn-circle">4</a>
        <p>Social Impact</p>
      </div>
	  <div class="stepwizard-step">
        <a href="{{URL::to('project/preview')}}/{{Crypt::encrypt($projectdetails->id)}}" type="button" class="btn btn-primary btn-circle active">5</a>
        <p>Submit</p>
      </div>
    </div>
	
	</div>
	
<ul class="project_circle" style="display:none;">
<li>1<span>Project Type</span></li>
  <li><a href="{{URL::to('project/basic')}}/{{Crypt::encrypt($projectdetails->id)}}">2</a><span>Project Details</span></li>
  <li><a href="{{URL::to('project/reward')}}/{{Crypt::encrypt($projectdetails->id)}}">3</a><span>Incentives to supporters</span></li>
  <li><a href="{{URL::to('project/story')}}/{{Crypt::encrypt($projectdetails->id)}}">4</a><span>Social Impact</span></li>
  <li class="active"><a href="{{URL::to('project/preview')}}/{{Crypt::encrypt($projectdetails->id)}}">5</a><span>Submit</span></li>	
               
  
</ul> 
 @endif     
</div>
    <section class="fb-project-banner">
  
  
  <div class="opacitydiv" style="background:url('{{URL::to('')}}/{{$project->projectimage}}');background-repeat:no-repeat;background-size:cover;"> </div>
    <div class="container">
	

        
      <div class="fb-project-banner-content">
        <div class="fb-project-goal-wrapper">

          <?php
                        $cat_name=strtolower($project->categoryname);
                      
                        if($cat_name=="sdg 1: no poverty")
                        {
                        ?>  
                        
                        <img src="{{url::asset('main/images/un-goal-images/un-goal-no-poverty.png');}}" alt="{{$project->categoryname}}"/>
                     <?php
                        }
                        if($cat_name=="sdg 2: zero hunger")
                        {
                        
                        ?>
                         <img src="{{url::asset('main/images/un-goal-images/un-goal-zero-hunger.png');}}" alt="{{$project->categoryname}}"/>
                     <?php
                        }
                        if($cat_name=="sdg 4: quality education")
                        {
                        ?>
              <img src="{{url::asset('main/images/un-goal-images/un-goal-quality-education.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="sdg 3: good health and well-being")
                        {
                        
                        ?>
                         <img src="{{url::asset('main/images/un-goal-images/un-goal-good-health-well-being.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="sdg 5: gender equality")
                        {
                        
                        ?>
                         <img src="{{url::asset('main/images/un-goal-images/un-goal-gender-equality.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        
                        }
                        if($cat_name=="sdg 6: clean water and sanitation")
                        {
                        ?>
                         <img src="{{url::asset('main/images/un-goal-images/un-goal-clean-water-sanitation.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        
                        }
                        if($cat_name=="sdg 7: affordable and clean energy")
                        {
                        ?>
                        <img src="{{url::asset('main/images/un-goal-images/un-goal-affordable-clean-energy.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        
                        }
                        if($cat_name=="sdg 8: decent work and economic growth")
                        {
                        ?>
                        <img src="{{url::asset('main/images/un-goal-images/un-goal-decent-work-economic-growth.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="sdg 9: industry innovation and infrastructure")
                        {
                        ?>
                        <img src="{{url::asset('main/images/un-goal-images/un-goal-industry-innovation-infrastructure.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="sdg 10: reduced inequalities")
                        {
                        ?>
                        <img src="{{url::asset('main/images/un-goal-images/un-goal-reduced-inequalities.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="sdg 11: sustainable cities and communities")
                        {
                         ?>
                         <img src="{{url::asset('main/images/un-goal-images/un-goal-sustainable-cities-communities.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="sdg 12: responsible consumption and production")
                        {

                        ?>
                        <img src="{{url::asset('main/images/un-goal-images/un-goal-responsible-consumption-production.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="sdg 13: climate action")
                        {
                        ?>
                        <img src="{{url::asset('main/images/un-goal-images/un-goal-climate-action.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="sdg 14: life below water")
                        {
                        ?>
                         <img src="{{url::asset('main/images/un-goal-images/un-goal-life-below-water.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="sdg 15: life on land")
                        {

                        ?>
                         <img src="{{url::asset('main/images/un-goal-images/un-goal-life-on-land.png');}}" alt="{{$project->categoryname}}"/>
                         <?php
                        }

                         if($cat_name=="sdg 16: peace, justice and strong institutions")
                        {

                        ?>
                         <img src="{{url::asset('main/images/un-goal-images/un-goal-peace-justice-strong-institutions.png');}}" alt="{{$project->categoryname}}"/>
                         <?php
                        }
                        
                        if($cat_name=="sdg 17: partnership for the goals")
                        {

                        ?>
                        <img src="{{url::asset('main/images/un-goal-images/un-goal-partnerships-for-goals.png');}}" alt="{{$project->categoryname}}"/>
                         <?php
                        }
                        ?>

        </div>
        <div class="fb-project-name-wrapper">
          <h1 class="fb-project-name">{{{$project->title}}}</h1>
        </div>
      
      </div>
    </div>
  </section>
    <div class="detail-page">
        <div class="detail-top">
            <div class="container">
                @if(Session::has('success'))
                <div class="alert-message success" >
                    {{Session::get('success');}}
                </div>
                @endif
                @if(Session::has('error'))
                <div class="alert-message error" >
                    {{Session::get('error');}}
                </div>
                @endif

                <div class="title-lined" style="display:none;">
                    <span>{{{$project->title}}}</span>
                    <p>by<a class="See-full-bio-popup" href="#" data-toggle="modal" data-target="#profileModal"> {{{$project->firstname}}} {{{$project->lastname}}}</a></p>
                </div>
				
				  <div class="fb-project-details-main-section">
        <div class="fb-project-details-left">
             <?php
             
                        if ($project->projectvideo != '') {
                            $array = explode('/', $project->projectvideo);
                            $newvideolink=array_reverse($array);
                           $newyoutube= "https://www.youtube.com/watch?v=".$newvideolink[0];
                            ?>
                            
                            @if(Str::contains("www.youtube.com",$array))
                              <a href="<?php echo $newyoutube;?>" class="fb-project-details-video popup-youtube">
            <img src="{{URL::to('')}}/{{$project->projectimage}}" alt="project detailed view"/>
            <span class="fb-project-details-video-content" style="display:none;">
              <i class="icon-video"></i>
            </span>
            <span class="project-details-video-supported-people" style="display:none;">
              {{$project->totalbacking}}
              <span>people supported</span>
            </span>
          </a>
                            @else 
                            <?php
                            $explodedata = explode('.', $array[4]);
                            if ($explodedata[1] == 'JPEG' || $explodedata[1] == 'PNG' || $explodedata[1] == 'GIF' || $explodedata[1] == 'BMP' ||
                                    $explodedata[1] == 'jpeg' || $explodedata[1] == 'png' || $explodedata[1] == 'gif' || $explodedata[1] == 'bmp' || $explodedata[1] == 'jpg') {
                                ?>
                                

                                  <span class="fb-project-details-video popup-youtube">
            <img class="preview" id="img" src="{{URL::to('');}}/{{$project->projectvideo}}" >
           
            <span class="project-details-video-supported-people">
              {{$project->totalbacking}}
              <span>people supported</span>
            </span>
          </span>
                            <?php } else { ?>
                                <video width="100%" height="100%" controls>
                                    <source src="{{URL::to('');}}/{{$project->projectvideo}}" >
                                    {{trans('messages.novideosupport')}}.
                                </video>
                            <?php } ?>
                            @endif
                        <?php } else { ?>
                            <img class="preview" id="img" src="{{URL::to('')}}/{{$project->projectimage}}" >
                        <?php } ?>

           
        
          <ul class="fb-pdl-list" style="display:none;">
            <li>
              <i class="icon-country"></i>
              <span>{{$project->countryname}}</span>
            </li>
            <li>
              <i class="icon-religion"></i>
              <span>Christian</span>
            </li>
            <li>
              <i class="icon-gender"></i>
              <span>Male</span>
            </li>
            <li>
              <i class="icon-age"></i>
              <span>Below 5 years</span>
            </li>
          </ul>
        </div>
        <div class="fb-project-details-right">
		       
		
          <ul class="gb-pdr-numbers-list">
            			 <li>
           
              <span class="fb-fp-grid-hover-card-bottom-head">Started on <?php echo  date('d F Y', strtotime($project->createdon));?></span>
              <span class="fb-fp-hcb-list-content-wrap">
                <span class="fb-fp-hcb-list-image">
                   
                  <img src="{{URL::to('');}}/{{$project->image}}" alt="{{$project->title}}" onerror="this.src='{{URL::to('main/images/default.png')}}'" />
                </span>
                <p class="fb-fp-hcb-list-para">
                  <strong class="clickable" data-toggle="modal" data-target="#aboutCreatorModal">{{$project->firstname}} {{$project->lastname}}</strong>
                  <span class="fb-fp-btns-wrapper">
                    <button class="fb-fp-btn" type="text" data-toggle="modal" data-target="#profileModal">See Full Profile</button>
                    <button class="fb-fp-btn" type="text" data-toggle="modal" data-target="#contactMeModal">Contact Me</button>
                  </span>
                </p>
              </span>
            </li>
			
				  <div class="fb-interest-btn-share-btn-wrap" style="display:none;">
		  
              <button type="button" class="fb-mark-interest-btn" style="display:none;"><i class="icon-interested"></i> <span>Mark as Interested</span></button>
              <div class="fb-share-btn-wrapper">
                <button class="fb-share-btn"><i class="icon-share"></i> <span>Share</span></button>
                <?php
                $replace_str = array('"', "'", ",");
                                $shortblurb = str_replace($replace_str, "", $project->shortblurb);
                                ?>

                <ul class="fb-share-btn-list">
                  <li>
                    @if(Session::has('userid'))
                                <a href="javascript:fbShare('{{URL::to("project/detail")}}/{{$project->id}}?referral={{Session::get("userid")}}','{{{$project->title}}}', '{{{$shortblurb}}}', '{{URL::to('')}}/{{$project->projectimage}}', 520, 350)" class="fb-share-btn-facebook"><i class="icon-facebook"></i></a>
                                @else
                                <a href="javascript:fbShare('{{URL::to('project/detail')}}/{{$project->id}}','{{{$project->title}}}', '{{{$shortblurb}}}', '{{URL::to('')}}/{{$project->projectimage}}', 520, 350)" class="fb-share-btn-facebook"><i class="icon-facebook"></i></a>
                                @endif

                  </li>
                  <li>

                    @if(Session::has('userid'))
                                <a class="fb-share-btn-twitter" href="javascript:twtShare('{{URL::to("project/detail")}}/{{$project->id}}?referral={{Session::get("userid")}}','{{{$project->title}}}', '{{{$shortblurb}}}', '{{URL::to('')}}/{{$project->projectimage}}', 520, 350)"><i class="icon-twitter"></i></a>
                                @else
                                <a class="fb-share-btn-twitter" href="javascript:twtShare('{{URL::to('project/detail')}}/{{$project->id}}','{{{$project->title}}}', '{{{$shortblurb}}}', '{{URL::to('')}}/{{$project->projectimage}}', 520, 350)"><i class="icon-twitter"></i></a>
                                @endif

                                
                    
                   
                  </li>
                  <li>
                    <a href="#" class="fb-share-btn-google-plus"><i class="icon-google-plus"></i></a>
                  </li>
                  <li>
                    <a href="#" class="fb-share-btn-linked-in"><i class="icon-linkedin"></i></a>
                  </li>
                </ul>
              </div>
            </div>
			
			
          </ul>
		  
	
			
        </div>
		<div class="fb-pdv-started-sponsor-wrapper">
          <ul class="fb-fp-grid-hover-card-bottom" style="display:none;">
            <li>
           
              <span class="fb-fp-grid-hover-card-bottom-head">Started on <?php echo  date('d F Y', strtotime($project->createdon));?></span>
              <span class="fb-fp-hcb-list-content-wrap">
                <span class="fb-fp-hcb-list-image">
                   
                  <img src="{{URL::to('');}}/{{$project->image}}" alt="{{$project->title}}" onerror="this.src='{{URL::to('main/images/default.png')}}'" />
                </span>
                <p class="fb-fp-hcb-list-para">
                  <strong style="color:#000;" class="clickable" data-toggle="modal" data-target="#aboutCreatorModal">{{$project->firstname}} {{$project->lastname}}</strong>
                  <span class="fb-fp-btns-wrapper">
                    <button class="fb-fp-btn" type="text" data-toggle="modal" data-target="#aboutCreatorModal">See Full Profile</button>
                    <button class="fb-fp-btn" type="text" data-toggle="modal" data-target="#contactMeModal">Contact Me</button>
                  </span>
                </p>
              </span>
            </li>
            <li style="display:none;">
              <span class="fb-fp-grid-hover-card-bottom-head">Sponsored by</span>
              <span class="fb-fp-hcb-list-content-wrap">
                <span class="fb-fp-hcb-list-image">
                  <img src="{{URL::to('main/images/testimonial-image-2.jpeg');}}" alt="testimonial image 2" />
                </span>
                <p class="fb-fp-hcb-list-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </span>
            </li>
          </ul>
        </div>
       
      
      <!-- <div class="fb-p" -->
    </div>
	
				<div class="col-md-8" style="display:none;">
                    <div class="banner-cont">
					
                        <span>
                            <img src="{{URL::to('');}}/{{$project->projectimage}}" width="100%" height="100%" onerror="this.src='{{URL::to('main/images/projectdefault.png')}}'">
                        </span>
						
						 
                        <div class="content-btm">
                            <p class="h3 mb3"> {{{$project->shortblurb}}} </p>



                            <div class="h5">
                                <a class="grey-dark mr3 nowrap" href="#">
                                    <span class="glyphicon glyphicon-map-marker"></span>
                                    <b>{{$project->countryname}}</b>
                                </a>
                                <a class="grey-dark mr3 nowrap" href="#">
                                    <span class="glyphicon glyphicon-tag"></span>
                                    <b>{{$project->categoryname}}</b>
                                </a>
                                <!--                                <a id="project_share" class="button button_small button_outline button_outline_grey" href="http://www.facebook.com/sharer.php?u=localhost:8080/kickstarter/public/project/detail/11">Share this project</a>-->
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-4" style="display:none;">
                    <ul class="top-beting">
                        <li>
                            <h1 class="top-tiles">{{$project->totalbacking}}</h1>
                            <span class="bold h5">{{trans('messages.backers')}}</span>
                        </li>

                        <li>
                            <h1 class="top-tiles">{{$project->currencysymbol}} {{round($project->totalpledgeamount)}}</h1>
                            <span class="bold h5">{{trans('messages.pledgedof')}} {{$project->currencysymbol}} {{round($project->fundinggoal)}} {{trans('messages.goal')}}</span>
                        </li>

                        <li>
                            @if($project->dayscount>0)
                            <h1 class="top-tiles">{{$project->dayscount}}</h1>
                            <span class="bold h5">{{trans('messages.daystogo')}}</span>
                            @else
                            <?php
                            $count = $project->dayscount;
                            $result = str_replace('-', '', $count);
                            ?>
                            <h1 class="top-tiles">{{$result}}</h1>
                            <span class="bold h5">{{trans('messages.daysago')}}</span>
                            @endif
                        </li>
                        @if($project->fundinggoal==0)

                        @else
                        @if(round((($project->totalpledgeamount/$project->fundinggoal)*100)>=100)&&($project->dayscount<0))
                        <li>
                            <div class="border-left-thick border-green pl2 py2">
                                <h3 class="normal mb1">{{trans('messages.funded')}}!</h3>
                                <p class="mb0 h5">
                                    {{trans('messages.successfullyfunded')}}.
                                </p>
                            </div>
                        </li>
                        <li><span class="sm-text">{{trans('messages.projectfundedon')}} {{$project->enddate}} </span></li>

                        @elseif(round((($project->totalpledgeamount/$project->fundinggoal)*100)<100)&&($project->dayscount<0))

                        <li>
                            <div class="border-left-thick border-red pl2 py2">
                                <h3 class="normal mb1">{{trans('messages.expired')}}!</h3>
                                <p class="mb0 h5">
                                    {{trans('messages.projectexpired')}}.
                                </p>
                            </div>
                        </li>
                        <li><span class="sm-text">{{trans('messages.projectexpiredon')}} {{$project->enddate}} </span></li>

                        @elseif(round((($project->totalpledgeamount/$project->fundinggoal)*100)>=100)&&($project->dayscount>=0))

                        <!--                        <li>
                                                    <a class="pro-btn" href="#">Back this project</a>
                        
                                                    <a class="flo-ri" href="#">
                                                        <span class="fa fa-star"></span>
                                                        <span class="text"> Remind me </span>
                                                    </a>
                                                </li>
                                                <li><span class="sm-text">This project will be funded on {{$project->enddate}} </span></li>-->
                        @else
                        <!--                        <li>
                                                    <a class="pro-btn" href="#">Back this project</a>
                        
                                                    <a class="flo-ri" href="#">
                                                        <span class="fa fa-star"></span>
                                                        <span class="text"> Remind me </span>
                                                    </a>
                                                </li>
                                                <li><span class="sm-text">This project will only be funded if {{$project->currencysymbol}} {{$project->fundinggoal}} is pledged by {{$project->enddate}} </span></li>-->
                        @endif
                        @endif
                    </ul>

                    <div class="botm-cntnt">
                        <div class="botm-cntnt-left">
                            <ul>
                                <li><h4><a class="See-full-bio-popup" href="#" data-toggle="modal" data-target="#profileModal">{{$project->firstname}} {{$project->lastname}}</a></h4></li>
                                <li><p class="h5 mb0">
                                        <span class="inline-block">
                                            @if(count($creatorcreated)==0) {{count($creatorcreated)}} {{trans('messages.created')}} @else <a class="grey-dark bold remote_modal_dialog" style='cursor:pointer' data-toggle="modal" data-target="#CreatedeModal">{{count($creatorcreated)}} {{trans('messages.created')}}</a> @endif
                                            <span class="grey-dark"> | </span>
                                        </span>
                                        <span class="inline-block">
                                            @if(count($creatorbacked)==0){{count($creatorbacked)}} {{trans('messages.backed')}} @else<a class="grey-dark bold remote_modal_dialog" data-dismiss="modal"  href="#" data-toggle="modal" data-target="#BackedModal">{{count($creatorbacked)}} {{trans('messages.backed')}}</a> @endif
                                        </span>
                                    </p></li>

                                <li class="globle-1"><i class="fa fa-globe"></i><a href="{{$project->website}}" target="_blank">{{$project->weburl}}</a></li>

                            </ul>
                        </div>

                        <div class="botm-cntnt-right">
                            <a class="See-full-bio-popup" href="#" data-toggle="modal" data-target="#profileModal"><img src="{{URL::to('')}}/{{$project->image}}" onerror="this.src='{{URL::to('main/images/default.png')}}'"></a>
                        </div>

                        <a class="See-full-bio-popup" href="#" data-toggle="modal" data-target="#profileModal">{{trans('messages.seefullprofile')}}</a>
                        <a class="Contact-me-popup" href="#" data-toggle="modal" data-target="#ContactModal">{{trans('messages.contactme')}}</a>


                    </div>
                </div>


                @if($project->projectverified==2)
                <div class="review-setion psitive">
                    <span class="remarkst-tl">{{trans('messages.adminremarks')}}</span>
                    <p>{{$project->remarks}}</p>
                </div>
                @endif
                @if($project->projectverified==3)
                <div class="review-setion negtiv">
                    <span class="remarkst-tl">{{trans('messages.adminremarks')}}</span>
                    <p>{{$project->remarks}}</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<section>
    <input type="hidden" value="{{$projectdetails->id}}" name="projectid" id="projectid">
    <div class="tab-content-full">

        <div class="tabbable-panel">
            <div class="tabbable-line">
                <div class="tabbable-line-ful">
                    <div class="container">

                        <ul class="nav nav-tabs fb-pd-tab-trigger-list"> 
                            <li class="active">
                                <a data-toggle="tab" href="#tab_default_1"> {{trans('messages.story')}} </a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#tab_default_2"> {{trans('messages.updates')}}({{count($updates)}})</a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#tab_default_3"> {{trans('messages.comments')}}({{count($comments)}})</a>
                            </li>
                            @if ($projectdetails->projectverified == 2)
                            <li class="">
                                <a data-toggle="tab" href="#tab_default_4"> {{trans('messages.projectviews')}}</a>
                            </li>
                            @endif

                            @if ($projectdetails->projectverified == 0)
                            <li style="float:right">
                                <form method="post" action="{{URL::to('publishproject');}}">
                                    <input type="hidden" name="projectid" value="{{$projectdetails->id}}">
									 <a href="{{URL::to('project/story')}}/{{Crypt::encrypt($projectdetails->id)}}" class="gru-btns" style="margin-top: 20px;float: left;margin-right: 6px;">Back</a>
									 
                                    <input type="submit" class="gru-btns" value="{{trans('messages2.submitforapproval')}}"  style="margin-top:20px;">
                                </form>
                            </li>
                            @elseif($projectdetails->projectverified == 1)
                            <li style="float:right">
                                <span class="gru-btns" style="margin-top:20px;background-color: firebrick;">{{trans('messages2.waitingforadminapproval')}}</span>
                            </li>
                            @elseif($projectdetails->projectverified == 2)
                            <li style="float:right">
                                <span class="gru-btns" style="margin-top:20px;background-color:#2bde73">{{trans('messages2.projectapproved')}}</span>
                            </li>
                            @else
                            <!--   <li style="float:right">
                                                            <span class="gru-btns" style="margin-top:20px;background-color: firebrick;">Project Suspended</span>
                                                        </li>-->
                            <li style="float:right">
                                <form method="post" action="{{URL::to('publishproject');}}">
                                    <input type="hidden" name="projectid" value="{{$projectdetails->id}}">
                                    <input type="submit" class="gru-btns" value="{{trans('messages2.resubmitforapproval')}}"  style="margin-top:20px;">
                                </form>
                            </li>
                            @endif
                        </ul>

                    </div>

                </div>
                <div class="container">
                    <div class="tab-content">
                        <div id="tab_default_1" class="tab-pane  active">
                            <div class="col-sm-7">
                                <h3 class="detail-head">{{trans('messages.aboutproject')}}</h3><br><br>

                                <div class="full-description js-full-description responsive-media formatted-lists">
                                    {{$project->description}}
                                </div>

                                <h3 class="detail-head">{{trans('messages.risksandchallenges')}}</h3><br><br>
                                <p>{{{$project->risks}}}</p>


                                <ul class="faq-ask-box">
                                    <li>
                                        <h3 class="detail-head">{{trans('messages.faq')}}</h3> </li>
                                    <li><p>
                                    <li>
                                        <strong>{{trans('messages.haveaquestion')}}?</strong>

                                        {{trans('messages.doesnothelp')}},{{trans('messages.creatordirectly')}}.
                                        </p>
                                    </li>  
                                    <li>
                                        <a class="gru-btns" href="#">{{trans('messages.askaquestion')}}</a>
                                    </li>
                                    <li>
                                        <a id="reportk" class="reportk" href="#">{{trans('messages.reportthisproject')}} </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-sm-4">

                                <h3 class="detail-head">{{trans('messages.rewards')}} </h3>
                                @foreach($rewards as $reward)
                                <div class="reward-set">                                    
                                    <div class="reward-set-holder">


                                        <h5 class="mb1"> {{trans('messages.pledge')}} {{$project->currencysymbol}} {{$reward->pledgeamount}} {{trans('messages.ormore')}}  </h5>
                                        <p class="backers-limits">

                                            <span class="backers-wrap h6 bold">
                                                <span class="num-backers mr1"> {{$reward->backerscount}} {{trans('messages.backers')}}  </span>
                                            </span>
                                        </p><br>
                                        <div class="desc h5 mb2 break-word">
                                            <p>{{{$reward->description}}}</p>
                                        </div>
                                        <div class="shipping-wrap">
                                            <div class="delivery-date h6">
                                                <b>{{trans('messages.estimateddelivery')}}:</b>
                                                <time class="js-adjust-time" >{{$reward->estimateddelivery}}</time>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                        <div id="tab_default_2" class="tab-pane">
                            <div class="col-md-7">
                                <ul class="coment-1">

                                    @foreach($updates as $key=>$update)
                                    <li>
                                        <div class="clearfix">

                                            <div class="left">
                                                <p class="update-number h5 bold">
                                                    <a class="green no-wrap" href="#">{{trans('messages.update')}} #{{$key+1}} </a>
                                                </p>
                                            </div>

                                            <div class="right">
                                                <p class="published h6 grey-dark">
                                                    <time class="js-adjust-time" datetime="" data-format="">{{ date("jS F, Y", strtotime($update->postedon)); }}</time>
                                                </p>
                                            </div>

                                        </div>

                                        <h2 class="normal title">
                                            <a class="green-dark" href="#">{{{$update->title}}}</a>
                                        </h2>


                                        <div class="full-description js-full-description responsive-media formatted-lists">

                                            <p>{{$update->description}} </p>
                                        </div>
                                    </li>   
                                    @endforeach
                                </ul>
                            </div></div>

                        <div id="tab_default_3" class="tab-pane">
                            <div class="col-md-7" style="margin-bottom:5%">
                                <ul class="coment-area">
                                    @foreach($comments as $comment)
                                    <li style="  background: #eee; padding-left: 20px;">
                                        <div class="ing-left">
                                            <img src="{{URL::to('')}}/{{$comment->image}}">
                                        </div>
                                        <div class="ing-rit">
                                            <h3>
                                                <a class="author green-dark" href="/#">{{{$comment->firstname}}} {{{$comment->lastname}}}</a>
                                                <span class="date normal h6">
                                                    <span>posted on <?php echo date("jS F, Y", strtotime($comment->postedon)); ?></span>
                                                    <?php $email = Session::get('email'); ?>
                                                    @if($comment->email==$email)
                                                    <a class="grey-dark" href="{{URL::to('project/deletecomment')}}/{{$comment->id}}" style="position: absolute; margin-top: -4%;margin-left: 41%;font-size:20px;">
                                                        <i class="fa fa-close" ></i>
                                                    </a>
                                                    @endif
                                                </span>
                                            </h3>
                                            <p>{{{$comment->comment}}}</p>
                                        </div>
                                    </li>
                                    @endforeach                                    
                                </ul>

                            </div>
                        </div>
                        @if ($projectdetails->projectverified == 2)
                        <div id="tab_default_4" class="tab-pane">
                            <div class="col-md-7" style="margin-bottom:5%">
                                <h3 class="detail-head">{{trans('messages.projectviews')}}</h3><br><br>
                                <script type="text/javascript" src="{{URL::to('main/js/jscharts.js');}}"></script>

                                <div id="graph">Loading graph...</div>

                                <?php
                                $prodate = array();
                                $explodedata = array();
                                $procoumnt = array();
                                //error_reporting(0);
                                //echo "<pre>";print_r($views);"</pre>";exit;
                                //$prodate	= "";
                                foreach ($views as $chartvalue) {
                                    //print_r($chartvalue['prodate']);
                                    $prodate[] = $chartvalue['prodate'];
                                    $procoumnt[] = $chartvalue['count'];
                                }
                                //print_r($prodate);exit;
                                $implodedata = implode(', ', $prodate);
                                // echo $implodedata;exit;
                                $explodedata = explode(',', $implodedata);
                                //  print_r($explodedata);exit;
                                //echo substr($explodedata[0], 6);
                                // echo $procoumnt[0]; exit;
                                ?> 
                                <script type="text/javascript">
var myData = new Array(
        ['<?php echo substr($explodedata[0], 6) ?>', <?php echo $procoumnt[0]; ?>],
        ['<?php echo substr($explodedata[1], 6) ?>', <?php echo $procoumnt[1]; ?>],
        ['<?php echo substr($explodedata[2], 6) ?>', <?php echo $procoumnt[2]; ?>],
        ['<?php echo substr($explodedata[3], 6) ?>',<?php echo $procoumnt[3]; ?>],
        ['<?php echo substr($explodedata[4], 6) ?>',<?php echo $procoumnt[4]; ?>],
        ['<?php echo substr($explodedata[5], 6) ?>', <?php echo $procoumnt[5]; ?>],
        ['<?php echo substr($explodedata[6], 6) ?>',<?php echo $procoumnt[6]; ?>],
        ['<?php echo substr($explodedata[7], 6) ?>', <?php echo $procoumnt[7]; ?>],
        ['<?php echo substr($explodedata[8], 6) ?>', <?php echo $procoumnt[8]; ?>],
        ['<?php echo substr($explodedata[9], 6) ?>', <?php echo $procoumnt[9]; ?>],
        ['<?php echo substr($explodedata[10], 6) ?>', <?php echo $procoumnt[10]; ?>],
        ['<?php echo substr($explodedata[11], 6) ?>', <?php echo $procoumnt[11]; ?>],
        ['<?php echo substr($explodedata[12], 6) ?>', <?php echo $procoumnt[12]; ?>],
        ['<?php echo substr($explodedata[13], 6) ?>', <?php echo $procoumnt[13]; ?>],
        ['<?php echo substr($explodedata[14], 6) ?>', <?php echo $procoumnt[14]; ?>],
        ['<?php echo substr($explodedata[15], 6) ?>', <?php echo $procoumnt[15]; ?>],
        ['<?php echo substr($explodedata[16], 6) ?>', <?php echo $procoumnt[16]; ?>],
        ['<?php echo substr($explodedata[17], 6) ?>', <?php echo $procoumnt[17]; ?>],
        ['<?php echo substr($explodedata[18], 6) ?>', <?php echo $procoumnt[18]; ?>],
        ['<?php echo substr($explodedata[19], 6) ?>', <?php echo $procoumnt[19]; ?>],
        ['<?php echo substr($explodedata[20], 6) ?>', <?php echo $procoumnt[20]; ?>],
        ['<?php echo substr($explodedata[21], 6) ?>', <?php echo $procoumnt[21]; ?>],
        ['<?php echo substr($explodedata[22], 6) ?>', <?php echo $procoumnt[22]; ?>],
        ['<?php echo substr($explodedata[23], 6) ?>', <?php echo $procoumnt[23]; ?>],
        ['<?php echo substr($explodedata[24], 6) ?>', <?php echo $procoumnt[24]; ?>],
        ['<?php echo substr($explodedata[25], 6) ?>', <?php echo $procoumnt[25]; ?>],
        ['<?php echo substr($explodedata[26], 6) ?>',<?php echo $procoumnt[26]; ?>],
        ['<?php echo substr($explodedata[27], 6) ?>',<?php echo $procoumnt[27]; ?>],
        ['<?php echo substr($explodedata[28], 6) ?>', <?php echo $procoumnt[28]; ?>],
        ['<?php echo substr($explodedata[29], 6) ?>',<?php echo $procoumnt[29]; ?>]);
var colors = ['#CE0000', '#CE0000', '#CE0000', '#CE0000', '#CE0000', '#CE0000', '#CE0000',
    '#CE0000', '#CE0000', '#CE0000', '#CE0000', '#CE0000', '#CE0000', '#CE0000',
    '#CE0000', '#CE0000', '#CE0000', '#CE0000', '#CE0000', '#CE0000', '#CE0000',
    '#CE0000', '#CE0000', '#CE0000', '#CE0000', '#CE0000', '#CE0000', '#CE0000', '#CE0000', '#CE0000'];
var myChart = new JSChart('graph', 'bar');
myChart.setDataArray(myData);
myChart.colorizeBars(colors);
myChart.setDataArray(myData);
myChart.setAxisColor('#9D9F9D');
myChart.setAxisWidth(1);
myChart.setAxisNameX('Date');
myChart.setAxisNameY('Project views');
myChart.setAxisNameColor('#655D5D');
myChart.setAxisNameFontSize(9);
myChart.setAxisPaddingLeft(50);
myChart.setAxisValuesDecimals(1);
myChart.setAxisValuesColor('#9C1919');
myChart.setTextPaddingLeft(0);
myChart.setBarValuesColor('#9C1919');
myChart.setBarBorderWidth(0);
myChart.setTitleColor('#8C8382');
myChart.setGridColor('#5D5F5D');
myChart.draw();
                                </script>

                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>       
    </div>
</section>
<!--<script>
    $(".publish").click(function () {
        var projectid = $('#projectid').val();
        $.ajax({
            url: "publishproject",
            type: "post",
            data: {'projectid': projectid},
            success: function (data) {
                if (data != 0) {
                    window.location.href = "";
                }
            }
        });
    });
</script>-->
<div class="modal modal-forg fade" id="BackedModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">{{trans('messages.bigprojects')}} {{trans('messages.smallbacked')}} {{trans('messages.by')}} {{{$project->firstname}}} {{{$project->lastname}}}</h4>
            </div> <!-- /.modal-header -->

            <div class="modal-body" style="  max-height: 400px;">
                @foreach($creatorbacked as $backed)
                <div class="col-lg-6">
                    <div class="project-card project-card-tall-big" data-project="">
                        <div class="project-thumbnail">
                            <a href="{{URL::to('project/detail')}}/{{$backed->id}}">
                                <img class="project-thumbnail-img" width="100%" src="{{URL::to('')}}/{{$backed->projectimage}}" alt="Project image">
                            </a>
                        </div>
                        <div class="project-card-content">
                            <h6 class="project-title">
                                <a href="{{URL::to('project/detail')}}/{{$backed->id}}">{{{$backed->title}}}</a>
                            </h6>
                            <p class="project-byline">{{{$backed->firstname}}}</p>
                            <p class="project-blurb"> {{{$backed->shortblurb}}} </p>
                        </div>
                        <div class="project-card-footer">
                            <div class="project-location">
                                <a target="" href="{{URL::to('project/country')}}/{{$backed->countryname}}" data-location="">
                                    <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                                    <span class="location-name">{{$backed->countryname}}</span>
                                </a>
                                <span class="grey-dark" style='display: inline;margin-left: 20px;'><span class="fa fa-thumbs-up"> {{$backed->likes}}</span></span>
                            </div>
                            <div class="project-stats-container">
                                @if(round((($backed->totalpledgeamount/$backed->fundinggoal)*100)>=100)&&($backed->dayscount<0))
                                <div class="project-pledged-successful">
                                    <strong>{{trans('messages.successfullyfunded')}}!</strong>
                                </div>
                                @elseif(round((($backed->totalpledgeamount/$backed->fundinggoal)*100)<100)&&($backed->dayscount<0))
                                <div class="project-pledged-successful" style="background:#D8000C;">
                                    <strong>{{trans('messages.expired')}}!</strong>
                                </div>
                                @else
                                <div class="project-progress-bar">
                                    <div class="project-percent-pledged" style="width: {{round(($backed->totalpledgeamount/$backed->fundinggoal)*100)}}%"></div>
                                </div>
                                @endif
                                <ul class="project-stats">
                                    <li>
                                        <div class="project-stats-value">{{round(($backed->totalpledgeamount/$backed->fundinggoal)*100)}}%</div>
                                        <span class="project-stats-label">{{trans('messages.smallfunded')}}</span>
                                    </li>
                                    <li>
                                        <div class="project-stats-value">
                                            <span class="money usd no-code">{{$backed->currencysymbol}}{{round(($backed->totalpledgeamount*$backed->rate)*100)/100}}</span>
                                        </div>
                                        <span class="project-stats-label">{{trans('messages.pledged')}}</span>
                                    </li>
                                    <li style="display: none;">
                                        <div class="project-stats-value">{{trans('messages.funded')}}</div>
                                        <span class="project-stats-label"> </span>
                                    </li>  
                                    @if(round((($backed->totalpledgeamount/$backed->fundinggoal)*100)>=100)&&($backed->dayscount<0))
                                    <li class="ksr_page_timer">
                                        <div class="project-stats-value text" data-word="left">{{trans('messages.bigfundedon')}}</div>
                                        <div class="project-stats-label">
                                            <div class="num">{{$backed->enddate}}</div>
                                        </div>                                        
                                    </li>
                                    @elseif(round((($backed->totalpledgeamount/$backed->fundinggoal)*100)<100)&&($backed->dayscount<0))
                                    <li class="ksr_page_timer">
                                        <div class="project-stats-value text " data-word="left">{{trans('messages.expiredon')}}</div>
                                        <div class="project-stats-label">
                                            <div class="num">{{$backed->enddate}}</div>
                                        </div>

                                    </li>
                                    @else
                                    <li class="ksr_page_timer">
                                        <div class="project-stats-value">
                                            <div class="num">{{$backed->dayscount}}</div>
                                        </div>
                                        <div class="project-stats-label text" data-word="left">{{trans('messages.daystogo')}}</div>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div> <!-- /.modal-body -->

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal modal-profile fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">{{trans('messages.aboutcreator')}}</h4>
            </div> <!-- /.modal-header -->

            <div class="modal-body">

                <div class="profile-sections">
                    <img src="{{URL::to('')}}/{{$project->image}}" onerror="this.src='{{URL::to('main/images/default.png')}}'" style="width: 150px;height: 150px;float: left;"></a>
                    <div class="left-conten">
                       <a href="{{URL::to('')}}/profile"><h2>{{{$project->firstname}}} {{{$project->lastname}}}</h2></a>
                        <h6>{{$project->state}},{{$project->country}}</h6>
                    </div>
                </div>
                <div class="col-md-8">
                    <?php if (isset($unserilize['Bio-Graphy']) == "" && isset($unserilize['Bio-Graphy']) != "on") { ?>
                        <div class="profile-ciontent">
                            <p>
                                {{$project->biography}}
                            </p>
                        </div>
                    <?php } ?>
                    <?php if (isset($unserilize['Email']) == "" && isset($unserilize['Email']) != "on") { ?>
                        <div class="websit-link mobile-hide">
                            <h4 class="text-links-title">{{trans('messages.email')}}</h4>
                            <ul class="links list h5 bold">
                                <li>
                                    <p>{{$project->email}}</p>
                                </li>  
                            </ul>
                        </div>
                    <?php } ?>
                    <?php if (isset($unserilize['Website']) == "" && isset($unserilize['Website']) != "on" && $project->weburl != "") { ?>
                        <div class="websit-link mobile-hide">
                            <h4 class="text-links-title">{{trans('messages.websites')}}</h4>
                            <ul class="links list h5 bold">
                                <li>
                                    <a  href="{{$project->website}}" target='_blank'>{{$project->weburl}}</a>
                                </li>  

                            </ul>
                        </div>
                    <?php } ?>
                    @if(Session::has('email') && (Session::get('email')!=$project->email))
                    <div class=" mobile-hide websit-link" style='margin-top:20px;'>
                        <h4 class="text-links-title">{{trans('messages.followcreator')}}</h4>
                        <ul class="links list h5 bold">
                            <li>  
                                @if($follow=='')
                                <a href="{{URL::to('followcreator')}}/{{Session::get('email')}}/{{$project->userid}}" class='follow-btn'>
                                    <i class='fa fa-plus-square'></i> {{trans('messages.follow')}}</a>
                                @else
                                <a href="{{URL::to('followcreator')}}/{{Session::get('email')}}/{{$project->userid}}" class="btn_gray" href="#"><i class='fa fa-check'></i>
                                    {{trans('messages.following')}}</a>
                                @endif
                            </li>  

                        </ul>
                    </div>
                    @endif
                </div>
                <div class="col-md-4">
                    <ul class="popup-right">
                        <li><i class="fa fa-check"></i><span>{{{$project->firstname}}} {{{$project->lastname}}}</span></li>
                        <li><i class="fa fa-lock"></i><span>Last login {{date("jS F, Y", strtotime($project->lastlogindate));}}</span></li>
                        <?php if (isset($unserilize['Mobile']) == "" && isset($unserilize['Mobile']) != "on" && $project->mobile != '') { ?>
                            <li><i class="fa fa-phone"></i><span>Mobile {{$project->mobile}}</span></li>
                        <?php } ?>
                        <li><i class="fa fa-star"></i><a data-dismiss="modal"  href="#" data-toggle="modal" data-target="#CreatedeModal"><span>{{count($creatorcreated)}} {{trans('messages.created')}} </span></a>, <a data-dismiss="modal"  href="#" data-toggle="modal" data-target="#BackedModal"><span>{{count($creatorbacked)}} {{trans('messages.backed')}}</span></a></li>
                        <li><i class="fa fa-bell "></i><span>{{$project->followerscount}} {{trans('messages.followers')}} , {{$project->followingcount}} {{trans('messages.following')}}  </span></li>

                    </ul>

                </div>



            </div> <!-- /.modal-body -->

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal modal-forg fade" id="CreatedeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">{{trans('messages.bigprojects')}} {{trans('messages.created')}} {{trans('messages.by')}} {{$project->firstname}} {{$project->lastname}}</h4>
            </div> <!-- /.modal-header -->

            <div class="modal-body" style="  max-height: 400px;">
                @foreach($creatorcreated as $backed)
                <div class="col-lg-6">
                    <div class="project-card project-card-tall-big" data-project="">
                        <div class="project-thumbnail">
                            <a href="{{URL::to('project/detail')}}/{{$backed->id}}">
                                <img class="project-thumbnail-img" width="100%" src="{{URL::to('')}}/{{$backed->projectimage}}" alt="Project image">
                            </a>
                        </div>
                        <div class="project-card-content">
                            <h6 class="project-title">
                                <a href="{{URL::to('project/detail')}}/{{$backed->id}}">{{{$backed->title}}}</a>
                            </h6>
                            <p class="project-byline">{{{$backed->firstname}}}</p>
                            <p class="project-blurb"> {{{$backed->shortblurb}}} </p>
                        </div>
                        <div class="project-card-footer">
                            <div class="project-location">
                                <a target="" href="{{URL::to('project/country')}}/{{$backed->countryname}}" data-location="">
                                    <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                                    <span class="location-name">{{$backed->countryname}}</span>
                                </a>
                                <span class="grey-dark" style='display: inline;margin-left: 20px;'><span class="fa fa-thumbs-up"> {{$backed->likes}}</span></span>
                            </div>
                            <div class="project-stats-container">
                                @if(round((($backed->totalpledgeamount/$backed->fundinggoal)*100)>=100)&&($backed->dayscount<0))
                                <div class="project-pledged-successful">
                                    <strong>{{trans('messages.successfullyfunded')}}!</strong>
                                </div>
                                @elseif(round((($backed->totalpledgeamount/$backed->fundinggoal)*100)<100)&&($backed->dayscount<0))
                                <div class="project-pledged-successful" style="background:#D8000C;">
                                    <strong>{{trans('messages.expired')}}!</strong>
                                </div>
                                @else
                                <div class="project-progress-bar">
                                    <div class="project-percent-pledged" style="width: {{round(($backed->totalpledgeamount/$backed->fundinggoal)*100)}}%"></div>
                                </div>
                                @endif
                                <ul class="project-stats">
                                    <li>
                                        <div class="project-stats-value">{{round(($backed->totalpledgeamount/$backed->fundinggoal)*100)}}%</div>
                                        <span class="project-stats-label">{{trans('messages.smallfunded')}}</span>
                                    </li>
                                    <li>
                                        <div class="project-stats-value">
                                            <span class="money usd no-code">{{$backed->currencysymbol}}{{round(($backed->totalpledgeamount*$backed->rate)*100)/100}}</span>
                                        </div>
                                        <span class="project-stats-label">{{trans('messages.pledged')}}</span>
                                    </li>
                                    <li style="display: none;">
                                        <div class="project-stats-value">{{trans('messages.funded')}}</div>
                                        <span class="project-stats-label"> </span>
                                    </li>  
                                    @if(round((($backed->totalpledgeamount/$backed->fundinggoal)*100)>=100)&&($backed->dayscount<0))
                                    <li class="ksr_page_timer">
                                        <div class="project-stats-value text" data-word="left">{{trans('messages.bigfundedon')}}</div>
                                        <div class="project-stats-label">
                                            <div class="num">{{$backed->enddate}}</div>
                                        </div>                                        
                                    </li>
                                    @elseif(round((($backed->totalpledgeamount/$backed->fundinggoal)*100)<100)&&($backed->dayscount<0))
                                    <li class="ksr_page_timer">
                                        <div class="project-stats-value text " data-word="left">{{trans('messages.expiredon')}}</div>
                                        <div class="project-stats-label">
                                            <div class="num">{{$backed->enddate}}</div>
                                        </div>

                                    </li>
                                    @else
                                    <li class="ksr_page_timer">
                                        <div class="project-stats-value">
                                            <div class="num">{{$backed->dayscount}}</div>
                                        </div>
                                        <div class="project-stats-label text" data-word="left">{{trans('messages.daystogo')}}</div>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div> <!-- /.modal-body -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade fb-modal fb-ac-modal" id="contactMeModal" tabindex="-1" role="dialog" aria-labelledby="contactMeModalLabel" data-backdrop="static" data-keyboard="false">
  <div class="vertical-alignment-helper">
    <div class="modal-dialog vertical-align-center" role="document">
      <div class="modal-content">
        <div class="modal-header fb-customized-modal-header">
          <h4 class="modal-title">{{trans('messages.sendmessage')}} {{trans('messages.smallto')}} {{$project->firstname}} {{$project->lastname}}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="icon-close"></i></button>
        </div>
        <div class="modal-body">
          <div class="fb-ac-modal-top-section">
            <span class="fb-cm-modal-label"><strong>{{trans('messages.to')}}:</strong> {{{$project->firstname}}} {{{$project->lastname}}}</span>
            <form class="pop-forms" style="margin-top: 20px;" method="post" action="{{URL::to('postmessage')}}" >
                    <input type="hidden" value="{{$project->userid}}" name="recieverid"> 
            <span class="fb-cm-modal-input">
              <textarea class="fb-input-textarea" required="" name="message"></textarea>
            </span>
            <div class="fb-dp-btns-wrapper">
              <button type="submit" class="fb-dp-btn">Send Message</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="{{url::asset('main/js/project-view.js');}}"></script>

<script>
            function fbShare(url, title, descr, image, winWidth, winHeight) {
            var winTop = (screen.height / 2) - (winHeight / 2);
                    var winLeft = (screen.width / 2) - (winWidth / 2);
                    window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
            }
</script>
<script>
            function twtShare(url, title, descr, image, winWidth, winHeight) {
            var winTop = (screen.height / 2) - (winHeight / 2);
                    var winLeft = (screen.width / 2) - (winWidth / 2);
                    window.open('http://twitter.com/share?url=' + url + '&text=' + title + '&', 'twitterwindow', 'height=450, width=550, top=' + winTop + ', left=' + winLeft + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
            }
</script>
@stop


<style>
.banner-cont img {
    height: 100%;
}
.banner-cont > span {
    float: left;
    height: 430px;
    overflow: hidden;
    width: 100%;
}
</style>
