@extends('layouts.mainlayout')
@section('content')

<style type="text/css">
.fb-fp-grid-image
{
height:313px;
}
</style>

<section class="fb-projects-section">



    <div class="container">
      <div class="fb-section-head-wrap">
        <h1 class="fb-section-head">Projects</h1>
      </div>
      <div class="fb-two-column-project-wrapper">
        <div class="row">
<?php $i=1;?>
        @foreach($allproject as $project)
           <?php //echo $i;?>            
        @if(Config::get('adminconfig.listingfee')==0)
          <div class="col-xs-12 <?php echo $classname=($i==1)?'col-md-4':'col-md-8 min-col';?>">
            <a href="{{URL::to('project/detail')}}/{{$project->id}}" class="fb-fp-grid">
              <img src="{{URL::to('')}}/{{$project->projectimage}}" alt="save shivam" class="fb-fp-grid-image"  onerror="this.src='{{URL::to('main/images/projectdefault.png');}}' "/>
              <div class="fb-fp-grid-top-bar">
                <h2 class="fb-fp-top-bar-text">{{$project->title}}</h2>
                <div class="fb-fp-grid-goal-image">

                   <?php
                        $cat_name=strtolower($project->categoryname);
                        //echo $cat_name;
                        if($cat_name=="no poverty")
                        {
                        ?>  
                        
                        <img src="{{url::asset('main/images/un-goal-images/un-goal-no-poverty.png');}}" alt="{{$project->categoryname}}"/>
                     <?php
                        }
                        if($cat_name=="zero hunger")
                        {
                        ?>
                         <img src="{{url::asset('main/images/un-goal-images/un-goal-zero-hunger.png');}}" alt="{{$project->categoryname}}"/>
                     <?php
                        }
                        if($cat_name=="quality education")
                        {
                        ?>
              <img src="{{url::asset('main/images/un-goal-images/un-goal-quality-education.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="good health and well-being")
                        {
                        
                        ?>
                         <img src="{{url::asset('main/images/un-goal-images/un-goal-good-health-well-being.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="gender equality")
                        {
                        
                        ?>
                         <img src="{{url::asset('main/images/un-goal-images/un-goal-gender-equality.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        
                        }
                        if($cat_name=="clean water and sanitation")
                        {
                        ?>
                         <img src="{{url::asset('main/images/un-goal-images/un-goal-clean-water-sanitation.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        
                        }
                        if($cat_name=="affordable and clean energy")
                        {
                        ?>
                        <img src="{{url::asset('main/images/un-goal-images/un-goal-affordable-clean-energy.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        
                        }
                        if($cat_name=="decent work and economic growth")
                        {
                        ?>
                        <img src="{{url::asset('main/images/un-goal-images/un-goal-decent-work-economic-growth.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="industry innovation and infrastructure")
                        {
                        ?>
                        <img src="{{url::asset('main/images/un-goal-images/un-goal-industry-innovation-infrastructure.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="reduced inequalities")
                        {
                        ?>
                        <img src="{{url::asset('main/images/un-goal-images/un-goal-reduced-inequalities.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="sustainable cities and communities")
                        {
                         ?>
                         <img src="{{url::asset('main/images/un-goal-images/un-goal-sustainable-cities-communities.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="responsible consumption and production")
                        {

                        ?>
                        <img src="{{url::asset('main/images/un-goal-images/un-goal-responsible-consumption-production.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="climate action")
                        {
                        ?>
                        <img src="{{url::asset('main/images/un-goal-images/un-goal-climate-action.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="life below water")
                        {
                        ?>
                         <img src="{{url::asset('main/images/un-goal-images/un-goal-life-below-water.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="life on land")
                        {

                        ?>
                         <img src="{{url::asset('main/images/un-goal-images/un-goal-life-on-land.png');}}" alt="{{$project->categoryname}}"/>
                         <?php
                        }

                         if($cat_name=="peace, justice and strong institutions")
                        {

                        ?>
                         <img src="{{url::asset('main/images/un-goal-images/un-goal-peace-justice-strong-institutions.png');}}" alt="{{$project->categoryname}}"/>
                         <?php
                        }
                        
                        if($cat_name=="partnership for the goals")
                        {

                        ?>
                        <img src="{{url::asset('main/images/un-goal-images/un-goal-partnerships-for-goals.png');}}" alt="{{$project->categoryname}}"/>
                         <?php
                        }
                        ?>

                </div>
              </div>
              <div class="fb-fp-grid-supported-people">
                <h3 class="fb-fp-grid-supported-people-number">
				
				<?php
				//$a=round($project->fundinggoal,2);
				
				//echo $a;
				
				//echo(round(7.055,2));
				?>
                 {{$project->currencysymbol}}{{round((($project->totalpledgeamount*$project->rate)*100)/100,2)}}
                        <span>of {{$project->currencysymbol}} {{round($project->fundinggoal,2)}} raised</span>
                </h3>
              </div>
            </a>
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
    <?php $i++;?>
 @endforeach


        
        </div><!-- row div end here -->

        <div class="fb-explore-projects-btn-wrapper">
          <a href="{{URL::to('discover/category/all/new')}}" class="fb-explore-projects-btn">Explore more projects</a>
        </div>
      </div>
    </div>
  </section>
  <section class="fb-pd-tab-section fb-projects-tab-section" id="projects-section">
    <div class="container">
      <div class="fb-pd-tab-triggers-wrap">
        <?php
$count_live=0;
        
         foreach($createdprojects as $project)
         {
       
           if ( $project->projectverified == 2) { 
             
             $count_live += count($project->title);

           }
         }
   
         ?>
       
        <ul class="fb-pd-tab-trigger-list" role="tablist">
          <li role="presentation" class="active"><a href="#my-projects" aria-controls="my-projects" role="tab" data-toggle="tab">My Projects<span class="fb-tab-trigger-count">(<?php echo $count_live;?>) projects</span></a></li>
          <li role="presentation"><a href="#supported-projects" aria-controls="supported-projects" role="tab" data-toggle="tab">Supported Projects<span class="fb-tab-trigger-count">({{count($backedprojects)}}) projects</span></a></li>
          <li role="presentation" style="display:none;"><a href="#interested-projects" aria-controls="interested-projects" role="tab" data-toggle="tab">Interested Projects<span class="fb-tab-trigger-count">0 projects</span></a></li>
        </ul>
        <div class="fb-pd-tab-panes-wrapper">
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="my-projects">
              <div class="fb-pd-tab-contents">
                <div class="fb-mp-projects-wrapper">
                 
                  @if($createdprojects=='[]')
            <div class="col-xs-12 col-md-12"><h2>{{trans('messages.notcreated')}}! {{trans('messages.kickstart')}} <a href="{{URL::to('project/start')}}">{{trans('messages.ownproject')}}</a>.</h2></div>
            @else

            @if($projecttype['livecount']==0)      
            <span class="cret-sub-til" style='margin-bottom: 50px;'>{{trans('messages.noprojectsfound')}}.</span>          
            @else
             <div class="row">
                @foreach($createdprojects as $project)
                <?php if ( $project->projectverified == 2) { ?>
                  
                <div class="col-xs-12 col-md-6">
                      <div class="fb-fp-grid odd">
                        <div><img src="{{URL::to('')}}/{{$project->projectimage}}" onerror="this.src='{{URL::to('main/images/projectdefault.png')}}'" alt="education wealth" class="fb-fp-grid-image"/></div>
                        <div class="fb-fp-grid-top-bar">
                          <h2 class="fb-fp-top-bar-text">{{{$project->title}}}</h2>
                          <div class="fb-fp-grid-goal-image">
                           
                         <?php
                        $cat_name=strtolower($project->categoryname);
                        //echo $cat_name;
                        if($cat_name=="no poverty")
                        {
                        ?>  
                        
                        <img src="{{url::asset('main/images/un-goal-images/un-goal-no-poverty.png');}}" alt="{{$project->categoryname}}"/>
                     <?php
                        }
                        if($cat_name=="zero hunger")
                        {
                        ?>
                         <img src="{{url::asset('main/images/un-goal-images/un-goal-zero-hunger.png');}}" alt="{{$project->categoryname}}"/>
                     <?php
                        }
                        if($cat_name=="quality education")
                        {
                        ?>
              <img src="{{url::asset('main/images/un-goal-images/un-goal-quality-education.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="good health and well-being")
                        {
                        
                        ?>
                         <img src="{{url::asset('main/images/un-goal-images/un-goal-good-health-well-being.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="gender equality")
                        {
                        
                        ?>
                         <img src="{{url::asset('main/images/un-goal-images/un-goal-gender-equality.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        
                        }
                        if($cat_name=="clean water and sanitation")
                        {
                        ?>
                         <img src="{{url::asset('main/images/un-goal-images/un-goal-clean-water-sanitation.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        
                        }
                        if($cat_name=="affordable and clean energy")
                        {
                        ?>
                        <img src="{{url::asset('main/images/un-goal-images/un-goal-affordable-clean-energy.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        
                        }
                        if($cat_name=="decent work and economic growth")
                        {
                        ?>
                        <img src="{{url::asset('main/images/un-goal-images/un-goal-decent-work-economic-growth.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="industry innovation and infrastructure")
                        {
                        ?>
                        <img src="{{url::asset('main/images/un-goal-images/un-goal-industry-innovation-infrastructure.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="reduced inequalities")
                        {
                        ?>
                        <img src="{{url::asset('main/images/un-goal-images/un-goal-reduced-inequalities.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="sustainable cities and communities")
                        {
                         ?>
                         <img src="{{url::asset('main/images/un-goal-images/un-goal-sustainable-cities-communities.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="responsible consumption and production")
                        {

                        ?>
                        <img src="{{url::asset('main/images/un-goal-images/un-goal-responsible-consumption-production.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="climate action")
                        {
                        ?>
                        <img src="{{url::asset('main/images/un-goal-images/un-goal-climate-action.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="life below water")
                        {
                        ?>
                         <img src="{{url::asset('main/images/un-goal-images/un-goal-life-below-water.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="life on land")
                        {

                        ?>
                         <img src="{{url::asset('main/images/un-goal-images/un-goal-life-on-land.png');}}" alt="{{$project->categoryname}}"/>
                         <?php
                        }

                         if($cat_name=="peace, justice and strong institutions")
                        {

                        ?>
                         <img src="{{url::asset('main/images/un-goal-images/un-goal-peace-justice-strong-institutions.png');}}" alt="{{$project->categoryname}}"/>
                         <?php
                        }
                        
                        if($cat_name=="partnership for the goals")
                        {

                        ?>
                        <img src="{{url::asset('main/images/un-goal-images/un-goal-partnerships-for-goals.png');}}" alt="{{$project->categoryname}}"/>
                         <?php
                        }
                        ?>



                          </div>
                        </div>
                        <div class="fb-fp-grid-supported-people">
                        
                          <h3 class="fb-fp-grid-supported-people-number">
                      {{$project->currencysymbol}}{{round((($project->totalpledgeamount*$project->rate)*100)/100)}}
                        <span>0f {{$project->currencysymbol}} {{round($project->fundinggoal,2)}} raised</span>
                    </h3>
                        </div>
                        <div class="fb-project-grid-secondary-hover-card">
                          <div class="fb-pg-secondary-hover-card-content-wrapper">
                            <a href="{{URL::to('project/detail')}}/{{$project->id}}" class="fb-pg-shc-action-btn fb-pg-shc-view-project-btn">View Project</a>
                            <span class="fb-pg-shc-edit-share-btns-wrapper">
                              <a href="{{URL::to('project/basic')}}/{{Crypt::encrypt($project->id)}}" class="fb-pg-shc-action-btn fb-pg-shc-edit-btn">Edit Project</a>
                              <a class="fb-pg-shc-share-btn"><i class="icon-share"></i></a>
                              <span class="fb-pg-shc-share-wrapper">
                                <label class="fb-pg-shc-share-label">Share:</label>
                                 <?php
                $replace_str = array('"', "'", ",");
                                $shortblurb = str_replace($replace_str, "", $project->shortblurb);
                                ?>
                                <ul class="fb-share-btn-list">
                                  <li class="active">
                                    @if(Session::has('userid'))
                                <a href="javascript:fbShare('{{URL::to("project/detail")}}/{{$project->id}}?referral={{Session::get("userid")}}','{{{$project->title}}}', '{{{$shortblurb}}}', '{{URL::to('')}}/{{$project->projectimage}}', 520, 350)" class="fb-share-btn-facebook"><i class="icon-facebook"></i></a>
                                @else
                                <a href="javascript:fbShare('{{URL::to('project/detail')}}/{{$project->id}}','{{{$project->title}}}', '{{{$shortblurb}}}', '{{URL::to('')}}/{{$project->projectimage}}', 520, 350)" class="fb-share-btn-facebook"><i class="icon-facebook"></i></a>
                                @endif
                                  </li>
                                  <li class="active">
                                     @if(Session::has('userid'))
                                <a class="fb-share-btn-twitter" href="javascript:twtShare('{{URL::to("project/detail")}}/{{$project->id}}?referral={{Session::get("userid")}}','{{{$project->title}}}', '{{{$shortblurb}}}', '{{URL::to('')}}/{{$project->projectimage}}', 520, 350)"><i class="icon-twitter"></i></a>
                                @else
                                <a class="fb-share-btn-twitter" href="javascript:twtShare('{{URL::to('project/detail')}}/{{$project->id}}','{{{$project->title}}}', '{{{$shortblurb}}}', '{{URL::to('')}}/{{$project->projectimage}}', 520, 350)"><i class="icon-twitter"></i></a>
                                @endif

                                  </li>
                                  <li class="active">
                                    <a href="#" class="fb-share-btn-google-plus"><i class="icon-google-plus"></i></a>
                                  </li>
                                  <li class="active">
                                    <a href="#" class="fb-share-btn-linked-in"><i class="icon-linkedin"></i></a>
                                  </li>
                                </ul>
                              </span>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    

                    
                <?php } ?>
                @endforeach
          
            </div>
            @endif
           
     	


            @endif

 
                   
                 
                </div>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="supported-projects">
              <div class="fb-pd-tab-contents">
                <div class="fb-mp-projects-wrapper">

                @if($backedprojects=='[]')
            <div class="col-xs-12 col-md-12"><h2>{{trans('messages.notbacked')}}! {{trans('messages.checkoutour')}} <a href="{{URL::to('discover')}}">{{trans('messages.discoverprojects')}}</a></h2></div>
            @else

           
             <div class="row">
                @foreach($backedprojects as $project)
               

                <div class="col-xs-12 col-md-6">
                      <div class="fb-fp-grid odd">
                        <div><img src="{{URL::to('')}}/{{$project->projectimage}}" onerror="this.src='{{URL::to('main/images/projectdefault.png')}}'" alt="education wealth" class="fb-fp-grid-image"/></div>
                        <div class="fb-fp-grid-top-bar">
                          <h2 class="fb-fp-top-bar-text">{{{$project->title}}}</h2>
                          <div class="fb-fp-grid-goal-image">
                           
                         <?php
                        $cat_name=strtolower($project->categoryname);
                        //echo $cat_name;
                        if($cat_name=="no poverty")
                        {
                        ?>  
                        
                        <img src="{{url::asset('main/images/un-goal-images/un-goal-no-poverty.png');}}" alt="{{$project->categoryname}}"/>
                     <?php
                        }
                        if($cat_name=="zero hunger")
                        {
                        ?>
                         <img src="{{url::asset('main/images/un-goal-images/un-goal-zero-hunger.png');}}" alt="{{$project->categoryname}}"/>
                     <?php
                        }
                        if($cat_name=="quality education")
                        {
                        ?>
              <img src="{{url::asset('main/images/un-goal-images/un-goal-quality-education.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="good health and well-being")
                        {
                        
                        ?>
                         <img src="{{url::asset('main/images/un-goal-images/un-goal-good-health-well-being.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="gender equality")
                        {
                        
                        ?>
                         <img src="{{url::asset('main/images/un-goal-images/un-goal-gender-equality.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        
                        }
                        if($cat_name=="clean water and sanitation")
                        {
                        ?>
                         <img src="{{url::asset('main/images/un-goal-images/un-goal-clean-water-sanitation.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        
                        }
                        if($cat_name=="affordable and clean energy")
                        {
                        ?>
                        <img src="{{url::asset('main/images/un-goal-images/un-goal-affordable-clean-energy.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        
                        }
                        if($cat_name=="decent work and economic growth")
                        {
                        ?>
                        <img src="{{url::asset('main/images/un-goal-images/un-goal-decent-work-economic-growth.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="industry innovation and infrastructure")
                        {
                        ?>
                        <img src="{{url::asset('main/images/un-goal-images/un-goal-industry-innovation-infrastructure.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="reduced inequalities")
                        {
                        ?>
                        <img src="{{url::asset('main/images/un-goal-images/un-goal-reduced-inequalities.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="sustainable cities and communities")
                        {
                         ?>
                         <img src="{{url::asset('main/images/un-goal-images/un-goal-sustainable-cities-communities.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="responsible consumption and production")
                        {

                        ?>
                        <img src="{{url::asset('main/images/un-goal-images/un-goal-responsible-consumption-production.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="climate action")
                        {
                        ?>
                        <img src="{{url::asset('main/images/un-goal-images/un-goal-climate-action.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="life below water")
                        {
                        ?>
                         <img src="{{url::asset('main/images/un-goal-images/un-goal-life-below-water.png');}}" alt="{{$project->categoryname}}"/>
                        <?php
                        }
                        if($cat_name=="life on land")
                        {

                        ?>
                         <img src="{{url::asset('main/images/un-goal-images/un-goal-life-on-land.png');}}" alt="{{$project->categoryname}}"/>
                         <?php
                        }

                         if($cat_name=="peace, justice and strong institutions")
                        {

                        ?>
                         <img src="{{url::asset('main/images/un-goal-images/un-goal-peace-justice-strong-institutions.png');}}" alt="{{$project->categoryname}}"/>
                         <?php
                        }
                        
                        if($cat_name=="partnership for the goals")
                        {

                        ?>
                        <img src="{{url::asset('main/images/un-goal-images/un-goal-partnerships-for-goals.png');}}" alt="{{$project->categoryname}}"/>
                         <?php
                        }
                        ?>



                          </div>
                        </div>
                        <div class="fb-fp-grid-supported-people">
                    <h3 class="fb-fp-grid-supported-people-number">
                      {{$project->currencysymbol}}{{round((($project->totalpledgeamount*$project->rate)*100)/100)}}
                        <span>0f {{$project->currencysymbol}} {{round($project->fundinggoal,2)}} raised</span>
                    </h3>
                        </div>
                        <div class="fb-project-grid-secondary-hover-card">
                          <div class="fb-pg-secondary-hover-card-content-wrapper">
                            <a href="{{URL::to('project/detail')}}/{{$project->id}}" class="fb-pg-shc-action-btn fb-pg-shc-view-project-btn">View Project</a>
                            <span class="fb-pg-shc-edit-share-btns-wrapper">
                              <a href="#" class="fb-pg-shc-action-btn fb-pg-shc-edit-btn">View Updates</a>
                              <a class="fb-pg-shc-share-btn"><i class="icon-share"></i></a>
                              <span class="fb-pg-shc-share-wrapper">
                                <label class="fb-pg-shc-share-label">Share:</label>
                                <ul class="fb-share-btn-list">
                                    <?php
                $replace_str = array('"', "'", ",");
                                $shortblurb = str_replace($replace_str, "", $project->shortblurb);
                                ?>
                                  <li class="active">
                    @if(Session::has('userid'))
                                <a href="javascript:fbShare('{{URL::to("project/detail")}}/{{$project->id}}?referral={{Session::get("userid")}}','{{{$project->title}}}', '{{{$shortblurb}}}', '{{URL::to('')}}/{{$project->projectimage}}', 520, 350)" class="fb-share-btn-facebook"><i class="icon-facebook"></i></a>
                                @else
                                <a href="javascript:fbShare('{{URL::to('project/detail')}}/{{$project->id}}','{{{$project->title}}}', '{{{$shortblurb}}}', '{{URL::to('')}}/{{$project->projectimage}}', 520, 350)" class="fb-share-btn-facebook"><i class="icon-facebook"></i></a>
                                @endif

                  </li>
                  <li class="active">

                    @if(Session::has('userid'))
                                <a class="fb-share-btn-twitter" href="javascript:twtShare('{{URL::to("project/detail")}}/{{$project->id}}?referral={{Session::get("userid")}}','{{{$project->title}}}', '{{{$shortblurb}}}', '{{URL::to('')}}/{{$project->projectimage}}', 520, 350)"><i class="icon-twitter"></i></a>
                                @else
                                <a class="fb-share-btn-twitter" href="javascript:twtShare('{{URL::to('project/detail')}}/{{$project->id}}','{{{$project->title}}}', '{{{$shortblurb}}}', '{{URL::to('')}}/{{$project->projectimage}}', 520, 350)"><i class="icon-twitter"></i></a>
                                @endif

                                
                    
                   
                  </li>
                                  <li class="active">
                                    <a href="#" class="fb-share-btn-google-plus"><i class="icon-google-plus"></i></a>
                                  </li>
                                  <li class="active">
                                    <a href="#" class="fb-share-btn-linked-in"><i class="icon-linkedin"></i></a>
                                  </li>
                                </ul>
                              </span>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    

                    
               
                @endforeach
          
            </div>
           
           
     	


            @endif
                
                  
                </div>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="interested-projects" style="display:none;">
              <div class="fb-pd-tab-contents">
                <div class="fb-mp-projects-wrapper">
                  <div class="row">
                   
                   </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="{{URL::asset('main/js/bootstrap.min.js');}}"></script>
<script src="{{URL::asset('main/js/custom.js');}}"></script>


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