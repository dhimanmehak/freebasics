@extends('layouts.mainlayout')
@section('content')
 <link rel="stylesheet" type="text/css" href="{{URL::asset('main/css/widget.css');}}">
<style type="text/css">
#widget-dxc_goal_thermometer-2 {padding:20px;float:left;}#widget-dxc_goal_thermometer-2 a.therm-button {}#widget-dxc_goal_thermometer-2 a.therm-button:hover {}#widget-dxc_goal_thermometer-2 .therm-tooltip {}
    button.FAB
    {

        display:none;
    }
    .fb-about-project-cover-image > img
    {
      width:100%;
      height:306px;
    }
	
	.fb-interest-btn-share-btn-wrap {
     float: left;
    position: relative;
    text-align: center;
    
    width: 100%;
}
    </style>
	<?php $baseurl = url();


	?>
	<script type='text/javascript'>
/* <![CDATA[ */
var DXC = {"url":"<?php echo $baseurl.'/main/';?>"};

/* ]]> */
</script>

    <div class="container text-center">
	
	
        @if(Session::has('failed'))
                <div class="alert-message error">
                    {{Session::get('failed');}}
                </div>
                @endif

                @if(Session::has('success'))
                <div class="alert-message success">
                    {{Session::get('success');}}
                </div>
                @endif
                </div>

				
				
<section class="fb-project-banner" style="background:url('{{URL::to('')}}/{{$project->projectimage}}');background-repeat:no-repeat;background-size:cover; ">
  
  
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
        <p class="fb-project-short-description">{{{$project->shortblurb}}}</p>
      </div>
    </div>
  </section>
  <section class="fb-project-details-section">
    <div class="container">
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
            <span class="fb-project-details-video-content">
              <i class="icon-video"></i>
            </span>
            <span class="project-details-video-supported-people">
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
		<span class="fb-featured-icon-wrapper">
              <i class="icon-featured"></i>
            </span>
		<section id="dxc_goal_thermometer-2" class="widget dxc_goal_thermometer-class">
		
		<?php 
		$curr_time=date('Y-m-d');
		$curr_timestamp=strtotime($curr_time);
		$time_left = strtotime($project->endingon)-$curr_timestamp;
		//echo $time_left;
			
			?>
		 <style type="text/css">#widget-dxc_goal_thermometer-2 {padding:20px;}#widget-dxc_goal_thermometer-2 a.therm-button {}#widget-dxc_goal_thermometer-2 a.therm-button:hover {}#widget-dxc_goal_thermometer-2 .therm-tooltip {}</style><div class="dxc-goal-thermometer autosetup " id="widget-dxc_goal_thermometer-2" data-goal-amount="{{round((($project->fundinggoal*$project->rate)*100)/100)}}" data-current-amount="{{round((($project->totalpledgeamount*$project->rate)*100)/100)}}" data-tickmark-segments="3" data-tickmark-width="50" data-animation-time="2000" data-number-prefix="{{$project->currencysymbol}}" data-number-suffix="" data-time-left="<?php echo $time_left;?>" data-days-left-text=" days left," data-hours-left-text=" hours left," data-minutes-left-text=" minutes left," data-timesup-text="Time's up!" data-funded-text="funded"><a href="{{URL::to('back/reward/')}}/{{$project->id}}" class="fb-primary-action-btn fb-support-project-btn" style="font-size:10px;margin-top:0px;padding:11px 1px;"><i class="icon-right-arrow"></i> <span>SUPPORT THIS PROJECT</span></a></div></section>
        
		
          <div class="fb-pdr-white-box" style="display:none;"	>
            <span class="fb-featured-icon-wrapper">
              <i class="icon-featured"></i>
            </span>
            <p class="fb-ai-message" style="display:none;">5 of your friends have already supported this project. <a href="#">Join them and help spread the smile!</a></p>
            <a href="{{URL::to('back/reward/')}}/{{$project->id}}" class="fb-primary-action-btn fb-support-project-btn"><i class="icon-right-arrow"></i> <span>SUPPORT THIS PROJECT</span></a>
			
			
            <div class="fb-interest-btn-share-btn-wrap">
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
          </div>
          <ul class="gb-pdr-numbers-list">
            <li style="display:none;">
			<?php
			//echo $project->fundinggoal;
			//echo $project->rate;
			?>
              {{$project->currencysymbol}} {{round((($project->totalpledgeamount*$project->rate)*100)/100)}}
              <span>of {{$project->currencysymbol}} {{round((($project->fundinggoal*$project->rate)*100)/100)}} raised</span>
            </li>
            <li style="display:none;">
              @if($project->dayscount>0)
              {{$project->dayscount}} days
              <span>until it ends</span>
              @else
                    <?php
                            $count = $project->dayscount;
                            $result = str_replace('-', '', $count);
                            ?>
                 {{$result}} 
                 <span>days ago</span>          
               @endif
            </li>
			 <li>
           
              <span class="fb-fp-grid-hover-card-bottom-head">Started on <?php echo  date('d F Y', strtotime($project->createdon));?></span>
              <span class="fb-fp-hcb-list-content-wrap">
                <span class="fb-fp-hcb-list-image">
                   
                  <img src="{{URL::to('');}}/{{$project->image}}" alt="{{$project->title}}" onerror="this.src='{{URL::to('main/images/default.png')}}'" />
                </span>
                <p class="fb-fp-hcb-list-para">
                  <strong class="clickable" data-toggle="modal" data-target="#aboutCreatorModal">{{$project->firstname}} {{$project->lastname}}</strong>
                  <span class="fb-fp-btns-wrapper">
                    <button class="fb-fp-btn" type="text" data-toggle="modal" data-target="#aboutCreatorModal">See Full Profile</button>
                    <button class="fb-fp-btn" type="text" data-toggle="modal" data-target="#contactMeModal">Contact Me</button>
                  </span>
                </p>
              </span>
            </li>
			
				  <div class="fb-interest-btn-share-btn-wrap">
		  
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
        <div class="fb-rewards-section">
		<?php $i=1;?>
		
		
		 @foreach($rewards as $reward)
		 <?php
		 $class_name=($i%2==0)?'right':'left';
		 ?>
		 <div class="fb-rewards-section-<?php echo $class_name;?>">
		 <ul class="fb-rewars-grid-list">
                                <li>
                                    @if((($reward->islimited==1)&&($reward->quantity>$reward->backerscount))||($reward->islimited==0))
                                    @if($project->dayscount>=0)   
                                    @if(Session::get('email')=='')
                                    <a  href=".success-login" data-toggle="modal">
                                        <div class="reward-hover-outer">
                                            <div class="reward-hover-middle">
                                                <div class="reward-hover-inner">
                                                    <div class="reward-set-hover">{{trans('messages.selectreward')}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    @else
                                    <a href="{{URL::to('back/reward/')}}/{{$project->id}}/{{$reward->id}}/{{round(($reward->pledgeamount*$project->rate)*100)/100}}">
                                        <div class="reward-hover-outer">
                                            <div class="reward-hover-middle">
                                                <div class="reward-hover-inner">
                                                    <div class="reward-set-hover">{{trans('messages.selectreward')}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    @endif
                                    @endif
                                    @endif
                                    <div class="reward-set-holder">

                                        <h5 class="mb1"> {{trans('messages.pledge')}} {{$project->currencysymbol}} {{round(($reward->pledgeamount*$project->rate)*100)/100}} {{trans('messages.ormore')}} </h5>
                                        <p class="backers-limits">
                                            <span class="backers-wrap h6 bold">
                                                <span class="num-backers mr1"> {{$reward->backerscount}} {{trans('messages.backers')}} </span>
                                            </span>
                                            @if($reward->islimited==1)
                                            @if($reward->quantity==$reward->backerscount)
                                            <span style='font-size: 13px; padding: 5px;  background: #000; color: #fff;'>
                                                <span class="limited-number" style='color:#FFF !important;'>{{trans('messages.allgone')}}!</span>
                                            </span>                                            
                                            @else
                                            <span class="bg-yellow " style='font-size: 13px; padding: 5px;'>
                                                <span class="limited-number">{{trans('messages.limited')}} ({{$reward->quantity-$reward->backerscount}} {{trans('messages.leftof')}} {{$reward->quantity}})</span>
                                            </span>
                                            @endif
                                            @endif
                                        </p><br>
                                        <div class="desc h5 mb2 break-word">
                                            <p>{{{$reward->description}}}</p>
                                        </div>
                                        <div class="shipping-wrap">
                                            <div class="delivery-date h6">
                                                <b>{{trans('messages.estimateddelivery')}}:</b>
                                                <time class="js-adjust-time" ><?php
                                                    //$date = explode('-', $reward->estimateddelivery);
                                                    //echo $delivery = date("M", mktime(0, 0, 0, $date[0])) . ' ' . $date[1];
                                                    ?> {{$reward->estimateddelivery}} </time>
                                            </div>
                                        </div>
                                    </div>
                                        
									 </li>
									 </ul>
									 
									 <a href="{{URL::to('back/reward/')}}/{{$project->id}}/{{$reward->id}}/{{round(($reward->pledgeamount*$project->rate)*100)/100}}"<div class="fb-rewars-grid-hover-card">
              <span class="fb-rewars-grid-hover-card-text" >Select your reward</span></a>
            </div>
									 
                                </div>
								<?php $i++;?>
                                @endforeach
								
          <div class="fb-rewards-section-left" data-toggle="modal" data-target="#rewardsModal" style="display:none;">
            <ul class="fb-rewars-grid-list">
              <li><strong>Pledge $100 or more</strong></li>
              <li><strong>0 backers</strong> Limited (1000 left of 1000)</li>
              <li>Pledge amount per month</li>
              <li><strong>Estimated Delivery:</strong> 01/01/2017</li>
            </ul>
            <div class="fb-rewars-grid-hover-card">
              <span class="fb-rewars-grid-hover-card-text">Select your reward</span>
            </div>
          </div>
          <div class="fb-rewards-section-right" data-toggle="modal" data-target="#rewardsModal" style="display:none;">
            <ul class="fb-rewars-grid-list">
              <li><strong>Pledge $100 or more</strong></li>
              <li><strong>0 backers</strong> Limited (1000 left of 1000)</li>
              <li>Fb</li>
              <li><strong>Estimated Delivery:</strong> 232</li>
            </ul>
            <div class="fb-rewars-grid-hover-card">
              <span class="fb-rewars-grid-hover-card-text">Select your reward</span>
            </div>
          </div>
        </div>
        <div class="fb-parents-quote-wrapper" style="display:none;">
          <p class="fb-parents-quote">Please contribute as much as you can and help save my Charlie, there's less than 30 days left.</p>
          <h6 class="fb-parents-details"><span class="fb-parents-name">—Wyatt Isabelle,</span> <span class="fb-parents-relation">Charlie's Mom</span></h6>
          <span class="fb-parents-name-grey">Wyatt Isabelle</span>
          <i class="fb-quote-top"></i>
          <i class="fb-quote-bottom"></i>
        </div>
      </div>
      <!-- <div class="fb-p" -->
    </div>
  </section>
  <section class="fb-pd-tab-section" id="project-details">
    <div class="container">
      <div class="fb-pd-tab-triggers-wrap">
        <ul class="fb-pd-tab-trigger-list" role="tablist">
          <li role="presentation" class="active"><a href="#about-project" aria-controls="about-project" role="tab" data-toggle="tab">About Project</a></li>
          <li role="presentation"><a href="#updates" aria-controls="updates" role="tab" data-toggle="tab">Updates</a></li>
          <li role="presentation"><a href="#comments" aria-controls="comments" role="tab" data-toggle="tab">Comments</a></li>
        </ul>
        <div class="fb-pd-tab-panes-wrapper">
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="about-project">
              <div class="fb-pd-tab-contents">
                <div class="fb-about-project-head-wrapper">
                  <h2 class="fb-about-project-head" style="text-align:left;">{{$project->title}}</h2>
                  <p class="fb-about-project-head-para" style="text-align:left;">{{$project->shortblurb}}</p>
                </div>
                <div class="fb-about-project-cover-image" style="display:none;">
                  <img src="{{URL::to('')}}/{{$project->projectimage}}" alt="about project" />
                  </div>
                <div class="fb-about-project-grid-section">
                  <div class="row">
                    <div class="col-xs-12 col-md-12">
                      <div class="fb-about-project-grid">
                        
                        <div class="fb-about-project-grid-content">
                          <p class="fb-about-project-grid-para">{{$project->description}}</p>
						  
						   <h2 class="fb-about-project-head"><!-- {{trans('messages.risksandchallenges')}} -->Social Impact</h2>
						  <p class="fb-about-project-grid-para">{{$project->risks}}</p>
                        </div>
                      </div>
                    </div>
                   
                   
                  </div>
                </div>
                <div class="fb-about-project-video-section" style="display:none;">
                  <div class="fb-about-highlighted-text-wrapper">
                    <h3 class="fb-about-highlighted-text">He was born on the  04/08/16 (4th of August) perfectly healthy but then he started to decline. We took him into hospital at 8 weeks old and none of us have been anywhere near home since.</h3>
                  </div>
                  <div class="fb-about-project-video-grids-wrapper">
                    <div class="row">
                      <div class="col-xs-12 col-md-8">
                        <a href="https://www.youtube.com/watch?v=nnst67NWW6w" class="fb-home-news-slide fb-about-project-video-grid popup-youtube">
                          <img src="images/about-project-image.png" alt="about project image">
                          <div class="fb-home-news-slide-content">
                            <i class="icon-video"></i>
                            <p class="fb-home-news-slide-text">Annie Clooney speaks about genocide in the UN</p>
                          </div>
                        </a>
                      </div>
                      <div class="col-xs-12 col-md-4">
                        <div class="fb-about-project-info-grid">
                          <img src="images/baby.png" alt="baby"/>
                          <div class="fb-about-project-info-grid-hover-card">
                            <p>"After endlessly researching and speaking to Dr's all over the world we found hope in a medication that may help him and a Dr in America has accepted him in his hospital. It hasn't been tried on anyone with his gene before (he's only number 16 in the world ever reported)</p>
                          </div>
                        </div>
                        <div class="fb-about-project-info-grid">
                          <img src="images/baby.png" alt="baby"/>
                          <div class="fb-about-project-info-grid-hover-card">
                            <p>"After endlessly researching and speaking to Dr's all over the world we found hope in a medication that may help him and a Dr in America has accepted him in his hospital. It hasn't been tried on anyone with his gene before (he's only number 16 in the world ever reported)</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="updates">
              <div class="fb-pd-tab-contents">
                <div class="fb-pd-add-update-btn-wrapper">
				@if($project->userid == $userid)
					
                  <a href="{{URL::to('project/updates')}}/{{Crypt::encrypt($project->id)}}" class="fb-pd-add-update-btn"><i class="icon-add"></i>Add Updates</a>
				  @endif
                </div>
                <div class="fb-timeline-wrapper">
                      
                      @if($updates=='[]')
                      <p class="fb-timeline-node-para">{{trans('messages2.noupdatesfound')}}</p>
                      @else
                      <?php $i=0;?>
                      @foreach($updates->reverse() as $key=>$update)
					  <?php
					  $classname=($i%2==0)?'alternate':'';
					  ?>
    <div class="fb-timeline-row <?php echo $classname;?>">
                    <div class="fb-timeline-node">
                       <span class="fb-timeline-date"> <?php echo date("jS F, Y", strtotime($update->postedon)); ?></span>
					   
                      <h3 class="fb-timeline-node-head">{{{$update->title}}}</h3>
                      <p class="fb-timeline-node-para">  {{$update->description}}</p>
                      <a href="#" class="fb-timeline-read-more-btn">Read More</a>
  </div>
                  </div>
				  <?php $i++;?>
                                    @endforeach     
                                    @endif

                     
                      
                  
                  
                 
                </div>

              </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="comments">
              <div class="fb-pd-tab-contents">
			  
			  
			  
			  
			  
			  <div class="col-md-12" style='margin-bottom: 5%;'>
			  
			  <div class="fb-timeline-wrapper">
                  
                 @if($comments=='[]')
                 {{trans('messages2.nocommentsfound')}}
                 @else
                                    @foreach($comments as $comment)

                        <div class="fb-timeline-row">
                    <div class="fb-comment-timeline-node">
                      <span class="fb-timeline-date"><?php echo date("jS F, Y", strtotime($comment->postedon)); ?></span>
                      <div class="fb-comment-timeline-comment">
                        <div class="fb-comment-timline-author-image">
                          <img src="{{url::asset('main/images/default.png');}}" alt="testimonial image 2" />
                        </div>
                        <div class="fb-comment-timeline-comment-text-section">
                          <h3 class="fb-comment-timeline-author-name">{{$comment->username}}</h3>
                          <p class="fb-comment-timeline-comment-text">{{{$comment->comment}}}</p>
                          <div class="fb-comment-action-btns-wrapper">
                            <a href="javascript:void(0);" class="fb-comment-like-btn"><i class="icon-like"></i></a>
                            <a href="javascript:void(0);" class="fb-comment-reply-btn"><i class="icon-reply"></i></a>
                          </div>
                          <div class="fb-add-comment-input-wrapper" style="display:none;">
                            <input type="text" name="comment" class="fb-add-comment-input-box" placeholder="Add a comment"/>
                          </div>
                          <div class="fb-comment-replies-section" style="display:none;">
                            
                            <a href="javascript:void(0);" class="fb-replies-link"><span>2 replies</span> <i class="icon-down-arrow"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                                    @endforeach
                                    @endif
                  

                </div>
                                <ul class="coment-area" style="display:none;">
                                    @if($comments=='[]')
                                    <p  style='padding: 20px;background: #eee;margin-bottom: 20px;'>{{trans('messages2.nocommentsfound')}}.</p>
                                    @else
                                    @foreach($comments as $comment)
                                    <li style="  background: #eee;padding-left: 20px;margin-bottom: 2%;">
                                        <div class="ing-left">
                                            <a @if($comment->username!='')href="{{URL::to('')}}/profile/{{$comment->username}}" @else href="javascript:void(0);" @endif><img src="{{URL::to('')}}/{{$comment->image}}" alt="image" onerror="this.src='{{URL::to('main/images/default.png')}}'"></a>
                                        </div>
                                        <div class="ing-rit">
                                            <h3>
                                                <a class="author green-dark" @if($comment->username!='')href="{{URL::to('')}}/profile/{{$comment->username}}" @else href="javascript:void(0);" @endif>{{{$comment->firstname}}} {{{$comment->lastname}}}</a>
                                                <span class="date normal h6">
                                                    <span>posted on <?php echo date("jS F, Y", strtotime($comment->postedon)); ?></span>
                                                    <?php $email = Session::get('email'); ?>
                                                    @if($comment->email==$email)
                                                    <a class="grey-dark" onclick="confirmation('{{$comment->id}}')" style="position: absolute; margin-top: -4%;margin-left: 32%;font-size:20px;cursor: pointer;">
                                                        <i class="fa fa-close" ></i>
                                                    </a>
                                                    @endif
                                                </span>
                                            </h3>
                                            <p>{{{$comment->comment}}}</p>
                                        </div>
                                    </li>
                                    @endforeach
                                    @endif
                                </ul>
                                <?php $status = Session::get('email'); ?>
                                @if($status!='')
                                <ul>
                                    <li>
                                        <form method='post' action='{{URL::to('project/postcomment')}}'>
                                            <input type='hidden' value='{{$project->id}}' name='projectid'>
                                            <input type='hidden' value='{{$userid}}' name='userid'>
                                            <input type="hidden" value="{{Session::get('locale')}}" name="language" id="language">
                                            <textarea name='comment' oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required style="width:100%;float:left;"></textarea>
                                            <input type='submit' name='post' value='{{trans('messages2.post')}}' class='fb-pd-add-update-btn' style="float:right;margin-top:5px;clear:both;"/>
                                        </form>
                                    </li>
                                </ul>
                                @else
                                <h3>
                                    {{trans('messages.logintocomment')}}!<br> <a  href=".success-login" data-toggle="modal" class="button button_small button_outline button_outline_green">{{trans('messages.clickhere')}} {{trans('messages.smallto')}} {{trans('messages.login')}}</a>
                                </h3>
                                @endif

                                <!-- facebook comments -->
                                <div class="fb-comments" data-href="http://quickiz.com/fundstarter/project/detail/{{$project->id}}" data-width="600" data-numposts="10"></div>
                                <!-- facebook comments -->
                            </div>
							
                
              </div>
            </div>
          </div>
        </div>
        <div class="fb-about-project-people-say-section" style="display:none;">
          <div class="fb-section-head-wrap fb-donate-head-wrap">
            <h3 class="fb-section-head">Please <strong>donate</strong> and help</h3>
            
          </div>
          <div class="fb-line-section-head-wrapper">
            <h3 class="fb-line-section-head">FreeBasics Citizens say</h3>
          </div>
          <div class="fb-about-project-twitter-wrapper" style="display:none;">
         
               <a class="twitter-timeline" href="https://twitter.com/Freebasics" data-height="400" data-chrome="noheader, nofooter, noborders, transparent, noscrollbar" data-tweet-limit="3" >Tweets by @{Freebasics}</a>
          </div>
          <div class="fb-ap-donation-details-list-wrapper" style="display:none;">
            <ul class="fb-ap-donation-details-list">
              <li>
                <a href="#" class="fb-ap-ddl-image">
                  <img src="{{url::asset('main/images/testimonial-image-1.jpeg');}}" alt="testimonial image 1" />
                </a>
                <span class="fb-ap-ddl-details">
                  <h4 class="fb-ap-ddl-donated-amount">$46</h4>
                  <a class="fb-ap-ddl-donated-person-name" href="#">Jason Dunn</a>
                  <span class="fb-ap-ddl-donated-person-country">Paris</span>
                </span>
              </li>
              <li>
                <a href="#" class="fb-ap-ddl-image">
                  <img src="{{url::asset('main/images/testimonial-image-2.jpeg');}}" alt="testimonial image 2" />
                </a>
                <span class="fb-ap-ddl-details">
                  <h4 class="fb-ap-ddl-donated-amount">$78</h4>
                  <a class="fb-ap-ddl-donated-person-name" href="#">Paul Estrada</a>
                  <span class="fb-ap-ddl-donated-person-country">Paris</span>
                </span>
              </li>
              <li>
                <a href="#" class="fb-ap-ddl-image">
                  <img src="{{url::asset('main/images/testimonial-image-1.jpeg');}}" alt="testimonial image 1" />
                </a>
                <span class="fb-ap-ddl-details">
                  <h4 class="fb-ap-ddl-donated-amount">$540</h4>
                  <a class="fb-ap-ddl-donated-person-name" href="#">Blake Park</a>
                  <span class="fb-ap-ddl-donated-person-country">Paris</span>
                </span>
              </li>
              <li>
                <a href="#" class="fb-ap-ddl-image">
                  <img src="{{url::asset('main/images/testimonial-image-2.jpeg');}}" alt="testimonial image 2" />
                </a>
                <span class="fb-ap-ddl-details">
                  <h4 class="fb-ap-ddl-donated-amount">$350</h4>
                  <a class="fb-ap-ddl-donated-person-name" href="#">Leila Adams</a>
                  <span class="fb-ap-ddl-donated-person-country">Paris</span>
                </span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="modal fade fb-modal fb-ac-modal" id="rewardsModal" tabindex="-1" role="dialog" aria-labelledby="rewardsModalLabel" data-backdrop="static" data-keyboard="false">
  <div class="vertical-alignment-helper">
    <div class="modal-dialog vertical-align-center" role="document">
      <div class="modal-content">
        <div class="modal-header fb-customized-modal-header">
          <h4 class="modal-title">Rewards</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="icon-close"></i></button>
        </div>
        <div class="modal-body fb-rewards-modal-body">
          <div class="fb-create-project-box">
            <div class="fb-cp-steps-trigger-wrapper">
              <ul class="fb-cp-steps-trigger">
                <li>
                  <button class="fb-cp-step-button fb-cp-step-one-trigger clickable">
                    <span class="fb-cp-step-count">1</span>
                    <span class="fb-cp-step-completed-icon"><i class="icon-checked"></i></span>
                    <span class="fb-cp-step-name">Reward Info</span>
                  </button>
                </li>
                <li>
                  <button class="fb-cp-step-button fb-cp-step-two-trigger" disabled="disabled">
                    <span class="fb-cp-step-count">2</span>
                    <span class="fb-cp-step-completed-icon"><i class="icon-checked"></i></span>
                    <span class="fb-cp-step-name">Payment Information</span>
                  </button>
                </li>
              </ul>
            </div>
            <div class="fb-cp-steps-content-wrapper">
              <div class="fb-cp-step-content fb-cp-step-one-content">
                <form action="#">
                  <ul class="fb-reward-info-list">
                    <li>
                      <span class="fb-reward-info-label">Enter your pledge amount</span>
                      <span class="fb-reward-info-inpu-wrap"><input type="text" class="fb-input-text fb-rewards-input-text" value="$ 20"/></span>
                    </li>
                    <li>
                      <span class="fb-reward-info-label">Select your reward</span>
                      <span class="fb-reward-info-inpu-wrap">
                        <ol class="fb-reward-radio-list">
                          <li>
                            <label class="fb-custom-radio-btn-wrap">
                              <input type="radio" class="fb-custom-radio-btn-input" name="test">
                              <span class="fb-custom-radio-btn-tick"><i class="icon-checked"></i></span>
                              <span class="fb-custom-radio-btn-label">
                                No reward
                                <span class="fb-rewards-radio-additional-info">No thanks i just want to help the project</span>
                              </span>
                            </label>
                          </li>
                          <li>
                            <label class="fb-custom-radio-btn-wrap">
                              <input type="radio" class="fb-custom-radio-btn-input" name="test">
                              <span class="fb-custom-radio-btn-tick"><i class="icon-checked"></i></span>
                              <span class="fb-custom-radio-btn-label">
                                $ 20+
                                <span class="fb-rewards-radio-additional-info">Limited (12 left of 50)</span>
                                <span class="fb-rewards-radio-additional-info">Estimated delivery: <strong>Dec 2017</strong></span>
                              </span>
                            </label>
                          </li>
                          <li>
                            <label class="fb-custom-radio-btn-wrap">
                              <input type="radio" class="fb-custom-radio-btn-input" name="test">
                              <span class="fb-custom-radio-btn-tick"><i class="icon-checked"></i></span>
                              <span class="fb-custom-radio-btn-label">
                                $ 10+
                                <span class="fb-rewards-radio-additional-info">Limited (12 left of 50)</span>
                                <span class="fb-rewards-radio-additional-info">Estimated delivery: <strong>Dec 2017</strong></span>
                              </span>
                            </label>
                          </li>
                        </ol>
                      </span>
                    </li>
                  </ul>
                  <div class="fb-submit-btn-wrapper fb-rewards-btn-wrapper">
                    <span class="fb-rewards-total-info">Total: <strong>$ 20</strong></span>
                    <button type="button" class="fb-submit-btn"><i class="icon-right-arrow"></i><span>Continue to next Step</span></button>
                  </div>
                </form>
              </div>
              <div class="fb-cp-step-content fb-cp-step-two-content">
                <p class="fb-payment-info-para">Your card will not be charged at this time. If the project is successfully funded your card will be charged $20 when the project ends</p>
                <h3 class="fb-payment-info-head">Card Information</h3>
                <ul class="fb-payment-info-list">
                  <li>
                    <span class="fb-payment-info-label">Name</span>
                    <span class="fb-payment-info-input-wrap">
                      <input type="text" class="fb-input-text" placeholder="eg: Don Joe"/>
                    </span>
                  </li>
                  <li>
                    <span class="fb-payment-info-label">Card Number</span>
                    <span class="fb-payment-info-input-wrap">
                      <input type="text" class="fb-input-text" placeholder="Card Number"/>
                    </span>
                  </li>
                  <li>
                    <span class="fb-payment-info-label">Expiration</span>
                    <span class="fb-payment-info-input-wrap">
                      <input type="text" class="fb-input-text"/>
                    </span>
                  </li>
                </ul>
                <h3 class="fb-payment-info-head">Billing Address</h3>
                <ul class="fb-payment-info-list">
                  <li>
                    <span class="fb-payment-info-label">Country</span>
                    <span class="fb-payment-info-input-wrap">
                      <input type="text" class="fb-input-text"/>
                    </span>
                  </li>
                  <li>
                    <span class="fb-payment-info-label">Address 1</span>
                    <span class="fb-payment-info-input-wrap">
                      <input type="text" class="fb-input-text"/>
                    </span>
                  </li>
                  <li>
                    <span class="fb-payment-info-label">Address 2</span>
                    <span class="fb-payment-info-input-wrap">
                      <input type="text" class="fb-input-text"/>
                    </span>
                  </li>
                  <li>
                    <span class="fb-payment-info-label">Address 2</span>
                    <span class="fb-payment-info-input-wrap">
                      <input type="text" class="fb-input-text"/>
                    </span>
                  </li>
                  <li>
                    <span class="fb-payment-info-label">City</span>
                    <span class="fb-payment-info-input-wrap">
                      <input type="text" class="fb-input-text"/>
                    </span>
                  </li>
                  <li>
                    <span class="fb-payment-info-label">Postal code</span>
                    <span class="fb-payment-info-input-wrap">
                      <input type="text" class="fb-input-text"/>
                    </span>
                  </li>
                </ul>
                <div class="fb-submit-btn-wrapper fb-rewards-btn-wrapper">
                  <button type="button" class="fb-submit-btn"><i class="icon-right-arrow"></i><span>Pledge</span></button>
                </div>
              </div>
              <div class="fb-cp-step-content fb-cp-step-three-content" style="display:none;">
                <div class="fb-cp-step-three-content-inner-wrapper">
                  <div class="fb-create-project-success-modal-content">
                      <span class="fb-create-project-success-modal-icon"><i class="icon-checked"></i></span>
                      <h4 class="fb-create-project-success-modal-head">Congrats!</h4>
                      <p class="fb-create-project-success-modal-para">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                      <a href="index.html" type="button" class="fb-cpsm-thanks-btn">Ok, Thanks!</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade fb-modal fb-cp-success-modal" id="projectSubmittedModal" tabindex="-1" role="dialog" aria-labelledby="projectSubmittedModalLabel" data-backdrop="static" data-keyboard="false">
  <div class="vertical-alignment-helper">
    <div class="modal-dialog vertical-align-center" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="icon-close"></i></button>
        </div>
        <div class="modal-body">
          <div class="fb-create-project-success-modal-content">
            <span class="fb-create-project-success-modal-icon"><i class="icon-checked"></i></span>
            <h4 class="fb-create-project-success-modal-head">Congrats!</h4>
            <p class="fb-create-project-success-modal-para">Your project has been successfully submitted to our team for review.
Please wait 3-5 days for confirmation.</p>
            <a href="projects.html" type="button" class="fb-cpsm-thanks-btn">Ok, Thanks!</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade fb-modal fb-ac-modal" id="aboutCreatorModal" tabindex="-1" role="dialog" aria-labelledby="aboutCreatorModalLabel" data-backdrop="static" data-keyboard="false">
  <div class="vertical-alignment-helper">
    <div class="modal-dialog vertical-align-center" role="document">
      <div class="modal-content">
        <div class="modal-header fb-customized-modal-header">
          <h4 class="modal-title">{{trans('messages.aboutcreator')}}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="icon-close"></i></button>
        </div>
        <div class="modal-body">
          <div class="fb-ac-modal-top-section">
            <div class="fb-ac-modal-profile-image">
              <img src="{{URL::to('')}}/{{$project->image}}" alt="testimonial image 2" onerror="this.src='{{URL::to('main/images/default.png')}}'" />
            </div>
            <div class="fb-ac-modal-profile-content">
              <div class="fb-ac-modal-profile-name-wrapper">
                <span class="fb-ac-modal-profile-name-icon">
                  <img src="{{url::asset('main/images/profile-icon.svg');}}" alt="profile icon" />
                </span>
                <h4 class="fb-ac-modal-profile-name-text">{{{$project->firstname}}} {{{$project->lastname}}}</h4>
              </div>
              <ul class="fb-ac-modal-profile-detail-list">
                <li>
                  <span class="fb-ac-modal-pdl-label">Location</span>
                  <span class="fb-ac-modal-pdl-value">On, {{$project->country}}</span>
                </li>
                <li>
                  <span class="fb-ac-modal-pdl-label">Phone</span>
                  <span class="fb-ac-modal-pdl-value"><!-- {{$project->mobile}} -->**********</span>
                </li>
                <li>
                  <span class="fb-ac-modal-pdl-label">{{trans('messages.email')}}</span>
                  <span class="fb-ac-modal-pdl-value"><!-- {{$project->email}} -->************</span>
                </li>
                <li>
                  <span class="fb-ac-modal-pdl-label">Website</span>
                  <span class="fb-ac-modal-pdl-value"><a href="#">{{$project->weburl}}</a></span>
                </li>
                <li>
                  <span class="fb-ac-modal-pdl-label">Last Login</span>
                  <span class="fb-ac-modal-pdl-value">{{date("jS F, Y", strtotime($project->lastlogindate));}}</span>
                </li>
              </ul>
            </div>
          </div>
          <div class="fb-ac-modal-bottom-section">
            <ul class="fb-ac-modal-btootm-list">
              <li class="fb-ac-modal-bl-project-name-wrapper">
                <span class="fb-ac-modal-bl-project-name-left">
                  <span class="fb-ac-modal-bl-icon">
                    <img src="{{url::asset('main/images/project-name-icon.svg');}}" alt="{{$project->title}} icon" />
                  </span>
                  <span class="fb-ac-modal-bl-text bold">{{$project->title}}</span>
                </span>
                <span class="fb-ac-modal-bl-project-name-right">
                  <a href="#">{{count($creatorcreated)}} created</a>
                  <a href="#">, {{count($creatorbacked)}} backed</a>
                </span>
              </li>
              <li>
                <span class="fb-ac-modal-bl-icon">
                  <img src="{{url::asset('main/images/facebook-icon.svg');}}" alt="facebook icon" />
                </span>
                <span class="fb-ac-modal-bl-text">@if($project->logintype=="facebook") {{$project->firstname}} {{$project->lastname}} @else {{trans('messages.notconnected')}} @endif</span>
              </li>
              <li>
                <span class="fb-ac-modal-bl-icon">
                  <img src="{{url::asset('main/images/followers-icon.svg');}}" alt="followers icon" />
                </span>
                <span class="fb-ac-modal-bl-text">{{$project->followerscount}} followers , {{$project->followingcount}} following</span>
              </li>
              <li>
                <span class="fb-ac-modal-bl-icon">
                  <img src="{{url::asset('main/images/follow-me-icon.svg');}}" alt="follow me icon" />
                </span>
               <a href="{{URL::to('followcreator')}}/{{Session::get('email')}}/{{$project->userid}}" href="#"> <span class="fb-ac-modal-bl-text">Follow me</span></a>
              </li>
            </ul>
            <a href="javascript:void(0)" class="fb-ac-contact-me-btn">Contact me</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> 
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
            <form class="pop-forms" style="margin-top: 20px;" method='post' action='{{URL::to('postmessage')}}' >
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
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="{{URL::asset('main/js/bootstrap.min.js');}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script>
$(document).ready(function() {
    $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,

        fixedContentPos: false
    });
});
</script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<script src="{{url::asset('main/js/customize-twitter-1.1.min.js');}}" type="text/javascript"></script>
<script src="{{url::asset('main/js/owl.carousel.min.js');}}"></script> <!-- owl carousel -->
<script>
$(document).ready(function() {
	
	var leftHeight=$('.fb-project-details-left').height();
	//alert(leftHeight);
	$('.dxc_goal_thermometer-class').css('height',leftHeight);
  $("#featured-projects-slider").owlCarousel({
    nav:true,
    navText:["<i class='icon-secondary-left-arrow'></i>","<i class='icon-secondary-right-arrow'></i>"],
    autoPlay: 3000,
    responsive:{
        0:{
            items:1
        },
        768:{
            items:2
        },
        992:{
            items:3
        }
    },
    margin: 20,
  });

});

// Dynamically Adding Twitter styles based on device width

// For Mobile - Portrait
viewportWidth = $(window).width();
if (viewportWidth > 0 && viewportWidth <479){
  var options = {
      "url": "{{URL::asset('main/css/twitter-widget-custom-styles.css');}}"
  };
  CustomizeTwitterWidget(options);
}
// For Mobile - Landscape
else if (viewportWidth > 479 && viewportWidth < 767){
  var options = {
      "url": "{{URL::asset('main/css/twitter-widget-custom-styles-mobile-landscape.css');}}"
  };
  CustomizeTwitterWidget(options);
}
// For Tablet
else if (viewportWidth > 767 && viewportWidth < 991){
  var options = {
      "url": "{{URL::asset('main/css/twitter-widget-custom-styles-tablet.css');}}"
  };
  CustomizeTwitterWidget(options);
}
// For Desktop
else if(viewportWidth > 991){
  var options = {
      "url": "{{URL::asset('main/css/twitter-widget-custom-styles-desktop.css');}}"
  };
  CustomizeTwitterWidget(options);
}


</script>
<script src="{{url::asset('main/js/amcharts.js');}}" type="text/javascript"></script>
<script src="{{url::asset('main/js/serial.js');}}" type="text/javascript"></script>
<script src="{{url::asset('main/js/custom.js');}}"></script>
<script src="{{url::asset('main/js/project-view.js');}}"></script>
<script src="{{url::asset('main/js/thermometer_widget.js');}}"></script>

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