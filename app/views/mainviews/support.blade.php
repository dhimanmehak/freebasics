@extends('layouts.mainlayout')
@section('content')
<style type="text/css">

.fb-sap-map-iframe 
{
	overflow:visible;
}

.carousel-control.left , .carousel-control.right
{
	background-image:none;
}

.fb-fp-grid-image
{
max-height:296px;	
}
.owl-carousel .owl-item img
{
height:171px;
}

.fb-fp-grid-goal-image img
{
	height:auto !important;
}

.carousel-inner > .item > img
{
	max-width:100%;
	margin:0 auto;
}
.item.slider_image img {
	width:100%;
	height:400px !important; 
}

</style>

      <section class="fb-sap-first-fold">
      <?php

//$password = Hash::make('admin');
//echo $password;
$a=App::getLocale();

?>

        <div class="fb-sap-ff-content-wrapper">
          <div class="fb-sap-ff-left">
            <div id="sap-slider" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <?php
                $i=0;
                foreach($sliders as $slider)
                {
                  
?>
<li data-target="#sap-slider" data-slide-to="<?php echo $i;?>" class="<?php if($i==1){echo 'active';}else{echo '';}?>"></li>
                
<?php
$i++;
                }
                ?>
                
              </ol>

              <div class="carousel-inner" role="listbox">
         
         
<?php $i=1;?>
@foreach($sliders as $slider)
<?php $baseurl = url();
		$img_url = $baseurl.'/'.$slider->sliderimage;
		
 ?>
    <div class="item slider_image <?php if($i==1){echo 'active';}else{echo '';}?>">
       
           <img src="{{URL::to($slider->sliderimage)}}" alt="Fundstarter-banner-img">
       
    </div>
   <?php $i++;?>
    @endforeach
</div>
               

              <a class="left carousel-control" href="#sap-slider" role="button" data-slide="prev">
                <i class="icon-secondary-left-arrow"></i>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#sap-slider" role="button" data-slide="next">
                <i class="icon-secondary-right-arrow"></i>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
          <div class="fb-sap-ff-right">
            <!-- <iframe class="fb-sap-map-iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
            src="https://www.easymapmaker.com/map/168d17236c92f4f3b07e960e4f00e745">
            </iframe> -->
            <div class="fb-sap-map-iframe" id="map"></div>
            <div class="fb-selected-projects-section" style="display:none;">
              <h1 class="fb-selected-project-text">Projects under <strong>NO POVERTY</strong></h1>
            </div>
          </div>
        </div>
      </section>
      <section class="fb-sap-map-filter-section wow fadeInUp" data-wow-delay="0.4s">
        <div class="container">
		
		
          <div class="fb-sap-map-filter-content-left">
		 
		  
            <select id="goalssearch">
               <option value="">Global Goals</option>
              <?php $i=1;?>
               @foreach($categories as $category)
               
              
                        <option value="{{$category->id}}">{{$category->categoryname}}</option>
                        <?php $i++;?>        
                        @endforeach
             
            </select>
          </div>
          <ul class="fb-sap-map-content-right-list">
		 
            <li>
              <select id="sortbynew">
                <option value="">Sort</option>
                <option value="magic">Featured</option>
                <option value="popular">Trending</option>
                <option value="funded">Nearly Funded</option>
                <option value="new">Just Launched</option>
                <option value="enddate">Everything</option>
              </select>
            </li>
			<li>
			 <input type="text" placeholder="Search by project name..." id="txtsrch" name="txtsrch" class="fb-input-text" style="border:1px solid #e5e5e5;height:auto;">
			 </li>
            <li style="display:none;">
              <select id="filterSelectBox">
                <option value="">Filter</option>
                <option value="age">Age</option>
                <option value="gender">Gender</option>
                <option value="religion">Religion</option>
                <option value="country">Country</option>
              </select>
            </li>
            <li class="fb-sap-map-crl-filter-wrap fb-sap-filter-age-wrap">
              <select>
                <option value="">Select Age</option>
                <option value="">1 - 10</option>
                <option value="">11 - 20</option>
                <option value="">21 - 30</option>
                <option value="">31 - 40</option>
                <option value="">41 - 50</option>
                <option value="">51 +</option>
              </select>
            </li>
            <li class="fb-sap-map-crl-filter-wrap fb-sap-filter-gender-wrap">
              <select>
                <option value="">Select Gender</option>
                <option value="">Male</option>
                <option value="">Female</option>
              </select>
            </li>
            <li class="fb-sap-map-crl-filter-wrap fb-sap-filter-religion-wrap">
              <select>
                <option value="">Select Religion</option>
                <option value="">Hindu</option>
                <option value="">Christian</option>
                <option value="">Muslim</option>
              </select>
            </li>
            <li class="fb-sap-map-crl-filter-wrap fb-sap-filter-country-wrap">
              <select>
                <option value="">Select Country</option>
                <option value="">India</option>
                <option value="">United Kingdom</option>
                <option value="">United Arab Emirates</option>
                <option value="">Uruguay</option>
                <option value="">Venezuela</option>
                <option value="">Sri Lanka</option>
                <option value="">Switzerland</option>
              </select>
            </li>
			
			<li>
			
			</li>
            
          </ul>
		  
		  
		  
		  


        </div>
      </section>
      <section class="fb-sap-projects-section wow fadeInUp">
        <div class="container">
          <div class="fb-sap-section-head">
            <span class="fb-sap-section-head-icon"><i class="icon-featured"></i></span>
            <h1 class="fb-sap-section-heading">Featured Projects</h1>
            <ul class="fb-sap-filter-list" style="display:none;">
              <li>
                <span class="fb-sap-filter">
                  Hindu
                  <a href="javascript:void(0)" class="fb-sap-filter-close-btn"><i class="icon-close"></i></a>
                </span>
              </li>
              <li>
                <span class="fb-sap-filter">
                  8 - 60 years
                  <a href="javascript:void(0)" class="fb-sap-filter-close-btn"><i class="icon-close"></i></a>
                </span>
              </li>
            </ul>
          </div>
          <div class="fb-featured-projects-slider wow fadeInUp">

           
           
              <div id="featured-projects-slider" class="owl-carousel">

                  @foreach($projects as $project)

<div class="item">
                  <a href="{{URL::to('project/detail')}}/{{$project->id}}" class="fb-fp-grid">
                    <img src="{{URL::to('')}}/{{$project->projectimage}}" onerror="this.src='{{URL::to('main/images/projectdefault.png')}}'" alt="{{$project->title}}"/>
                    <div class="fb-fp-grid-top-bar">
                      <h2 class="fb-fp-top-bar-text">{{$project->title}}</h2>
                      <div class="fb-fp-grid-goal-image">
                        
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
                    </div>
                    <div class="fb-fp-grid-supported-people">
                      <h3 class="fb-fp-grid-supported-people-number">
                        {{$project->currencysymbol}}{{round((($project->totalpledgeamount*$project->rate)*100)/100)}}
                        <span>0f {{$project->currencysymbol}} {{round((($project->fundinggoal*$project->rate)*100)/100)}} raised</span>
                        
                      </h3>
                    </div>
                  </a>
                </div>

             @endforeach

                
              </div>
          </div>
        </div>
      </section>
      <section class="fb-sap-live-projects-section wow fadeInUp">
        <div class="container">
          <div class="fb-section-head-wrap">
            <h3 class="fb-section-head">Explore all <strong>{{count($projects)}}</strong> live projects</h3>
          </div>
          <div class="fb-live-projects-wrapper wow fadeInUp">
        
            <div class="row">
              <?php  $i=1;?>
                @foreach($projects as $project)
                 
              <?php
             
              if($i==5){break;}?>
              <div class="col-xs-12 col-md-6">
                <div class="fb-fp-grid">
                  <a href="{{URL::to('project/detail')}}/{{$project->id}}"><img src="{{URL::to('')}}/{{$project->projectimage}}" alt="{{{$project->title}}}" class="fb-fp-grid-image"/></a>
                  <div class="fb-fp-grid-top-bar">
                    <h2 class="fb-fp-top-bar-text">{{$project->title}}</h2>
                    <div class="fb-fp-grid-goal-image">
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
                  </div>
                  <div class="fb-fp-grid-supported-people">
                    <h3 class="fb-fp-grid-supported-people-number">
                     
					 {{$project->currencysymbol}}{{round((($project->totalpledgeamount*$project->rate)*100)/100)}}
                        <span>0f  {{$project->currencysymbol}} {{round((($project->fundinggoal*$project->rate)*100)/100)}} raised</span>
                    </h3> 
                  </div>
                  <a href="{{URL::to('project/detail')}}/{{$project->id}}" class="fb-fp-grid-hover-card">
                    <div class="fb-fp-grid-hover-card-top">
                      <div class="fb-fp-grid-hover-card-chart-wrapper">
                        <div id="chart-four" class="fb-fp-grid-hover-card-chart"  style="display:none;"></div>
                      </div>
                      <div class="fb-fp-grid-hover-card-description">
                        <p class="fb-fp-grid-hover-card-para">{{$project->shortblurb}}</p>
                        <ul class="fb-fp-numbers-list">
                          <li>
                            {{$project->totalbacking}}
                            <span>people supported</span>
                          </li>
                          <li>
                           {{$project->currencysymbol}}{{round((($project->totalpledgeamount*$project->rate)*100)/100)}}
                        <span>0f {{$project->currencysymbol}} {{round((($project->fundinggoal*$project->rate)*100)/100)}} raised</span>
                          </li>
                          <li>
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
                        </ul>
                      </div>
                    </div>
                    <ul class="fb-fp-grid-hover-card-bottom">
                      <li>
                    
                        <span class="fb-fp-grid-hover-card-bottom-head">Started on <?php echo  date('d F Y', strtotime($project->createdon));?></span>
                        <span class="fb-fp-hcb-list-content-wrap">
                          <span class="fb-fp-hcb-list-image">
                            <img src="{{URL::to('');}}/{{$project->projectimage}}" alt="{{$project->title}}" onerror="this.src='{{URL::to('main/images/default.png')}}'" />
                          </span>
                          <p class="fb-fp-hcb-list-para"><strong>{{$project->firstname}} {{$project->lastname}}</strong><br />{{$project->country}}</p>
                        </span>
                      </li>
                      <li style="display:none;">
                        <span class="fb-fp-grid-hover-card-bottom-head">Sponsored by</span>
                        <span class="fb-fp-hcb-list-content-wrap">
                          <span class="fb-fp-hcb-list-image">
                            <img src="{{url::asset('main/images/testimonial-image-2.jpeg');}}" alt="testimonial image 2" />
                          </span>
                          <p class="fb-fp-hcb-list-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </span>
                      </li>
                    </ul>
                  </a>
                </div>
              </div>
              <?php $i++;?>
              @endforeach
              
            </div><!-- row close here -->
            <div class="fb-sap-explore-projects-btn-wrapper">
              <a href="{{URL::to('discover/category/all/new')}}" class="fb-sap-explore-projects-btn">Explore all Projects</a>
            </div>
          </div>
        </div>
      </section>
      <section class="fb-gr-section wow fadeInUp" id="awg-section-5">
        <div class="container">
          <div class="fb-section-head-wrap" style="display:none;">
            <h3 class="fb-section-head">And this global revolutions starts with you.</h3>
            <p class="fb-section-head-para">How? It�s simple: Align with a project, support a goal and lend another helping hand to those who need it.</p>
          </div>
          <ul class="fb-grey-stats-list fb-gr-stats-list" style="display:none;">
            <li class="wow fadeInUp">
              <h6 class="fb-grey-stats-list-head">50000+</h6>
              <p class="fb-grey-stats-list-description">projects</p>
            </li>
            <li class="wow fadeInUp" data-wow-delay="0.4s">
              <h6 class="fb-grey-stats-list-head">100000+</h6>
              <p class="fb-grey-stats-list-description">people helped</p>
            </li>
            <li class="wow fadeInUp" data-wow-delay="0.8s">
              <h6 class="fb-grey-stats-list-head">$1M +</h6>
              <p class="fb-grey-stats-list-description">raised</p>
            </li>
            <li class="wow fadeInUp" data-wow-delay="1.2s">
              <h6 class="fb-grey-stats-list-head">120 +</h6>
              <p class="fb-grey-stats-list-description">countries</p>
            </li>
            <li class="wow fadeInUp" data-wow-delay="1.6s">
              <h6 class="fb-grey-stats-list-head">1</h6>
              <p class="fb-grey-stats-list-description">earth</p>
            </li>
          </ul>
          <div class="fb-gr-middle-text" style="display:none;">
            <p>and innumerable projects for you to support</p>
          </div>
          <div class="fb-gr-slider-wrapper">
            <div class="row">
              <div id="global-revolution-slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">


                    <?php  $i=1;
                    
                   
                    ?>
                @foreach($projects as $project)
                 <?php
                     $classname=($i==1)?'active':'';
                 ?>
              <div class="item <?php echo $classname;?>">
                 <div class="fb-gr-slide">
                      <div class="col-xs-12 col-md-4">
                        <div class="fb-gr-slide-image">
                        
                          <a href="{{URL::to('project/detail')}}/{{$project->id}}"><img src="{{URL::to('')}}/{{$project->projectimage}}" alt="{{{$project->title}}}" class="fb-fp-grid-image"/></a>
                        </div>
                      </div>
                      <div class="col-xs-12 col-md-8">
                        <div class="fb-gr-slide-grey-card">
                          <h6 class="fb-gr-slide-grey-card-head">{{$project->title}}</h6>
                          <p class="fb-grey-card-para">{{$project->shortblurb}}</p>
                        </div>
                        <ul class="fb-gr-slide-bottom-list">
                          <li>
                            <h6 class="fb-gr-slide-supported-ppl-number">{{$project->totalbacking}}</h6>
							@if($project->totalbacking > 1)
								
                            <p class="fb-gr-slide-supported-ppl-label">people supported</p>
							@else
							<p class="fb-gr-slide-supported-ppl-label">person supported</p>
							
							@endif
                          </li>
                          <li class="fb-gr-slide-btm-list-grey">
                            <p class="fb-gr-slide-btm-grey-text">
                              <span>{{$project->currencysymbol}}{{round((($project->totalpledgeamount*$project->rate)*100)/100)}}</span> 0f {{$project->currencysymbol}}{{round((($project->fundinggoal*$project->rate)*100)/100)}} raised
                            </p>
                            <p class="fb-gr-slide-btm-grey-text">
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
                            </p>
                          </li>
                        </ul>
                      </div>
                    </div>

                    </div>
           
              <?php $i++;?>
              @endforeach

             


                   


                </div>
                <a class="left gr-slider-controls" href="#global-revolution-slider" role="button" data-slide="prev">
                  <i class="icon-secondary-left-arrow"></i>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right gr-slider-controls" href="#global-revolution-slider" role="button" data-slide="next">
                  <i class="icon-secondary-right-arrow"></i>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
 
 
 <link href="{{url::asset('main/css/owl.carousel.css');}}" rel="stylesheet"> <!-- Owl Carousel Styles -->
<link href="{{url::asset('main/css/owl.theme.css');}}" rel="stylesheet"> <!-- Owl Carousel Styles -->
 <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="{{url::asset('main/js/bootstrap.min.js');}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<?php $baseurl = url(); ?>

<script>
$(document).ready(function() {
	
   
	
	 $( "#txtsrch" ).autocomplete({
	  source: "<?php echo $baseurl;?>/search/autocomplete",
	  minLength: 1,
	  select: function(event, ui) {
		 //alert(ui.item.id);
	  	//$('#txtsrch').val(ui.item.value);
		window.location.href="<?php echo $baseurl;?>/project/detail/"+ui.item.id;
	  }
	  
	  
	});
	
	
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
<script src="{{url::asset('main/js/jquery.easing.min.js');}}"></script>
<script src="{{url::asset('main/js/jquery.nav.js');}}"></script>
<script src="{{url::asset('main/js/owl.carousel.min.js');}}"></script> <!-- owl carousel -->
<script>
$(document).ready(function() {
	initMap();
  $("#featured-projects-slider").owlCarousel({
    nav:true,
    navText:["<i class='icon-secondary-left-arrow'></i>","<i class='icon-secondary-right-arrow'></i>"],
    autoPlay: 3000,
    // items : 1,
    // itemsDesktop : [1199, 3],
    // itemsDesktopSmall : [979, 3],
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
</script>
<script src="{{url::asset('main/js/amcharts.js');}}" type="text/javascript"></script>
<script src="{{url::asset('main/js/serial.js');}}" type="text/javascript"></script>
<script src="{{url::asset('main/js/wow.js');}}" type="text/javascript"></script>
<script>
  new WOW().init();
</script>
<script src="{{url::asset('main/js/custom.js');}}"></script>
<script src="{{url::asset('main/js/jquery-ui.min.js');}}"></script>
<script src="{{url::asset('main/js/support-project.js');}}"></script>

    </script>
<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9v7m4xl1_azviTnNcYUPHjBL1bwVF-lc&callback=initMap" type="text/javascript"></script> -->
<script type="text/javascript"  src="//maps.google.com/maps/api/js?key=AIzaSyB9v7m4xl1_azviTnNcYUPHjBL1bwVF-lc"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/googlemaps/v3-utility-library/master/markerclustererplus/src/markerclusterer.js"></script>

<?php
foreach($projects as $project)
{

if($project->projectip)
{
	//print_r($project);
	 $baseurl = url();
	$url=$baseurl.'/project/detail/'.$project->id;
	
	$title=addslashes('<a href="'.$url.'">'.$project->title.'</a>');
	$desc=$project->shortblurb;
	
	$ip=$project->projectip;
//$json = file_get_contents('http://www.geoplugin.net/json.gp?ip='.$ip);
$json = 'http://www.geoplugin.net/json.gp?ip='.$ip;

$ch = curl_init($json);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  $data = curl_exec($ch);
  
  
$obj = json_decode($data);
$lat=$obj->geoplugin_latitude;
$long=$obj->geoplugin_longitude;
//echo '['','$lat'.','.$long.']'.';

$loc_data[]='"'.$lat.','.$long.'",';

$info_data[]='"'.$title.'",';
curl_close($ch);
}

}


//print_r($info_data);        

	?>
<script>

    var map;
        
        //marker clusterer
        var mc;
        //var mcOptions = {gridSize: 20, maxZoom: 17, imagePath: "https://cdn.rawgit.com/googlemaps/v3-utility-library/master/markerclustererplus/images/m"};

		var mcOptions = {gridSize: 20, maxZoom: 7, styles: [{
    height: 61,
    url: "https://raw.githubusercontent.com/googlemaps/v3-utility-library/master/markerclustererplus/images/m3.png",
    width: 61
		}]
		};
		
        //global infowindow
        var infowindow = new google.maps.InfoWindow();

        //geocoder
        var geocoder = new google.maps.Geocoder(); 

var address = new Array(

<?php 
		foreach($loc_data as $loc_datas)
		{
		echo $loc_datas;
		
		}
		?>
);
var content = new Array(

<?php 
		foreach($info_data as $info_datas)
		{
		echo $info_datas;
		
		}
		?>
);

        //min and max limits for multiplier, for random numbers
        //keep the range pretty small, so markers are kept close by
        var min = .999999;
        var max = 1.000001;

function createMarker(latlng,text) {
  var marker = new google.maps.Marker({
    position: latlng,
    map: map
  });

  ///get array of markers currently in cluster
  var allMarkers = mc.getMarkers();

  //check to see if any of the existing markers match the latlng of the new marker
  if (allMarkers.length != 0) {
    for (i=0; i < allMarkers.length; i++) {
      var existingMarker = allMarkers[i];
      var pos = existingMarker.getPosition();

      if (latlng.equals(pos)) {
        text = text + " & " + content[i];
      }                   
    }
  }

  google.maps.event.addListener(marker, 'click', function() {
    infowindow.close();
    infowindow.setContent(text);
    infowindow.open(map,marker);
  });
  mc.addMarker(marker);
  return marker;
}

function initMap(){
var options = { 
zoom: 1, 
//center: new google.maps.LatLng(39.8282,-98.5795), 
center:new google.maps.LatLng(0,-0),
mapTypeId: google.maps.MapTypeId.ROADMAP ,

};
map = new google.maps.Map(document.getElementById('map'), options); 

//marker cluster

var gmarkers = [];

mc = new MarkerClusterer(map, [], mcOptions);
for (i=0; i<address.length; i++) {
   var ptStr = address[i];
   var coords = ptStr.split(",");
   var latlng = new google.maps.LatLng(parseFloat(coords[0]),parseFloat(coords[1]));			    
   gmarkers.push(createMarker(latlng,content[i]));
}

}

/*function initMap() {
var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
                    
    // Display a map on the page
    map = new google.maps.Map(document.getElementById("map"), mapOptions);
    map.setTilt(45);
        
    // Multiple Markers
    var markers = [
		<?php 
		foreach($loc_data as $loc_datas)
		{
		echo $loc_datas;
		
		}
		?>
		
           
        ];
	
	
	
                        
    // Info Window Content
    var infoWindowContent = [
	
	<?php 
		foreach($info_data as $info_datas)
		{
		echo $info_datas;
		
		}
		?>
     
    ];
        
    // Display multiple markers on a map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Loop through our array of markers & place each one on the map  
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0]
        });
        
        // Allow each marker to have an info window    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Automatically center the map fitting all markers on the screen
        map.fitBounds(bounds);
    }

    // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(2);
        google.maps.event.removeListener(boundsListener);
    });
    
	
}*/
/*function initMap() {
        var uluru = {lat: <?php echo $lat;?>, lng: <?php echo $long;?>};
        var styledMapType = new google.maps.StyledMapType([
        {
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#f5f5f5"
            }
          ]
        },
        {
          "elementType": "labels.icon",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#616161"
            }
          ]
        },
        {
          "elementType": "labels.text.stroke",
          "stylers": [
            {
              "color": "#f5f5f5"
            }
          ]
        },
        {
          "featureType": "administrative.land_parcel",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#bdbdbd"
            }
          ]
        },
        {
          "featureType": "poi",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#eeeeee"
            }
          ]
        },
        {
          "featureType": "poi",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#757575"
            }
          ]
        },
        {
          "featureType": "poi.park",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#e5e5e5"
            }
          ]
        },
        {
          "featureType": "poi.park",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#9e9e9e"
            }
          ]
        },
        {
          "featureType": "road",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#ffffff"
            }
          ]
        },
        {
          "featureType": "road.arterial",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#757575"
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#dadada"
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#616161"
            }
          ]
        },
        {
          "featureType": "road.local",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#9e9e9e"
            }
          ]
        },
        {
          "featureType": "transit.line",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#e5e5e5"
            }
          ]
        },
        {
          "featureType": "transit.station",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#eeeeee"
            }
          ]
        },
        {
          "featureType": "water",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#c9c9c9"
            }
          ]
        },
        {
          "featureType": "water",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#9e9e9e"
            }
          ]
        }
        ],
            {name: 'Styled Map'});
			
		//add locations
        var locations = [
		<?php 
		foreach($loc_data as $loc_datas)
		{
		echo $loc_datas;
		
		}
		?>
		
           
        ];
		
		 // Info Window Content
    var infoWindowContent = [
        ['<div class="info_content">' +
        '<h3>London Eye</h3>' +
        '<p>The London Eye is a giant Ferris wheel situated on the banks of the River Thames. The entire structure is 135 metres (443 ft) tall and the wheel has a diameter of 120 metres (394 ft).</p>' +        '</div>'],
        ['<div class="info_content">' +
        '<h3>Palace of Westminster</h3>' +
        '<p>The Palace of Westminster is the meeting place of the House of Commons and the House of Lords, the two houses of the Parliament of the United Kingdom. Commonly known as the Houses of Parliament after its tenants.</p>' +
        '</div>']
    ];
        

		
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 2,
          center: uluru,
          mapTypeControlOptions: {
            mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain',
                    'styled_map']
          }
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
        map.mapTypes.set('styled_map', styledMapType);
        map.setMapTypeId('styled_map');
		
		 for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map,
				title:locations[i][0],
				
            });
		
			

            //click function to marker, pops up infowindow
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
				
                return function() {
                    infowindow.setContent(infoWindowContent[i][0]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
			
			 // Automatically center the map fitting all markers on the screen
        map.fitBounds(bounds);
        }
		
		// Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(14);
        google.maps.event.removeListener(boundsListener);
    });
		
      } */
</script>
   <?php $baseurl = url(); ?>

      <script>
        setInterval(function () {
            //alert("Hello"); 
        }, 86400000);

    
    </script>

    
<script>
$("#goalssearch").selectmenu({
  change: function(event, ui) {
	   var SelectedFilter = ui.item.value;
	  
	   window.location.href="<?php echo $baseurl;?>/discover/category/"+SelectedFilter+"/popular";
  }
});




</script>
<script>
$("#sortbynew").selectmenu({
  change: function(event, ui) {
	   var SelectedFilter = ui.item.value;
	  
	// alert(SelectedFilter);
	 window.location.href="<?php echo $baseurl;?>/discover/category/all/"+SelectedFilter;
  }
});

$(document).ready(function(){
	
	var height=jQuery('.fb-sap-ff-left').height();
	
	jQuery('.fb-sap-map-iframe').css('height',height);
	
	
	
});
</script>



 @stop

 
  
    