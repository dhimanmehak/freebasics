﻿@extends('layouts.mainlayout')
@section('content')


<div class="tab-content fb-goal-tab-content">
   
      <div class="fb-scroll-to-list">
        <ul class="nav navbar-nav" role="tablist" id="nav-one">
            <li class="current">
                <a class="page-scroll" href="#section1">
                  <span class="fb-stl-line"></span>
                  <span class="fb-stl-detail">
                    <span class="fb-stl-section-title">Sustainable Development Goals</span>
                    <span class="fb-stl-section-description">‘End world poverty by 2030’ through the UN’s 17 Sustainable Development Goals</span>
                  </span>
                </a>
            </li>
            <li>
                <a class="page-scroll" href="#section2">
                  <span class="fb-stl-line"></span>
                  <span class="fb-stl-detail">
                    <span class="fb-stl-section-title">Global Goals</span>
                    <span class="fb-stl-section-description">There are 17 Sustainable Development Goals by the UN which you can align yourself with</span>
                  </span>
                </a>
            </li>
            <li>
                <a class="page-scroll" href="#section3">
                  <span class="fb-stl-line"></span>
                  <span class="fb-stl-detail">
                    <span class="fb-stl-section-title">Global Movement</span>
                    <span class="fb-stl-section-description">Be a part of the revolution across the earth by showing your support and standing beside millions of others who are already a part of this revolution</span>
                  </span>
                </a>
            </li>
            <li>
                <a class="page-scroll" href="#section4">
                  <span class="fb-stl-line"></span>
                  <span class="fb-stl-detail">
                    <span class="fb-stl-section-title">Global Platform</span>
                    <span class="fb-stl-section-description">We provide you with the world’s first smart funding platform that aligns with each of these 17 Sustainable Development Goals</span>
                  </span>
                </a>
            </li>
            
            <li>
                <a class="page-scroll" href="#section6">
                  <span class="fb-stl-line"></span>
                  <span class="fb-stl-detail">
                    <span class="fb-stl-section-title">Goals in the news</span>
                    <span class="fb-stl-section-description">News from around the globe about the 17 Sustainable Development Goals</span>
                  </span>
                </a>
            </li>
            <li style="display:none;">
                <a class="page-scroll" href="#section7">
                  <span class="fb-stl-line"></span>
                  <span class="fb-stl-detail">
                    <span class="fb-stl-section-title">Voices from around the World</span>
                    <span class="fb-stl-section-description">See what FreeBasics Citizens have to say</span>
                  </span>
                </a>
            </li>

        </ul>
      </div>
      <section class="section fb-home-first-fold" id="section1">
        <div class="container">
          <div class="fb-low-poly-globe-wrapper wow bounceIn" data-wow-delay="0.2s">
            <!-- <img src="images/low-poly-globe.png" alt="low poly globe" /> -->
            <!-- <aside class="icosahedron visible"></aside> -->
            <div id="container"></div>
            <!-- <div id="host"></div> -->
          </div>
          <div class="fb-home-first-fold-content-wrapper wow fadeInRight" data-wow-delay="0.6s">
            <div id="fb-text-slider" class="carousel slide carousel-fade" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#fb-text-slider" data-slide-to="0" class="active"></li>
                <li data-target="#fb-text-slider" data-slide-to="1"></li>
                <li data-target="#fb-text-slider" data-slide-to="2"></li>
                <li data-target="#fb-text-slider" data-slide-to="3"></li>
                <li data-target="#fb-text-slider" data-slide-to="4"></li>
                <li data-target="#fb-text-slider" data-slide-to="5"></li>
                <li data-target="#fb-text-slider" data-slide-to="6"></li>
              </ol>
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <h4 class="fb-hff-grey-head">By 2030, you can:</h4>
                  <h1 class="fb-hff-black-text">End poverty;<br/>Protect the planet;<br/> Ensure prosperity.<br/></h1>
                  <!-- <h5 class="fb-hff-grey-head without-top-line">to transform our world</h5> -->
                </div>
                <div class="item">
                  <h4 class="fb-hff-grey-head">The UNSDGs:</h4>
                  <h1 class="fb-hff-black-text">17 initiatives;<br/>193 countries;<br/>Just 800 weeks-Make them count.
</h1>
                  
                </div>
                <div class="item">
                  <h4 class="fb-hff-grey-head">3 trillion USD needed:</h4>
                  <h1 class="fb-hff-black-text">Per year;<br/>Every year;<br/>By 2030-to achieve the SDGs.
 </h1>
                
                </div>

                  <div class="item">
                  <h4 class="fb-hff-grey-head">5 Ps of SDGs:</h4>
                  <h1 class="fb-hff-black-text">People, Planet,<br/>Peace, Prosperity,<br/>In Partnership with you.
</h1>
                
                </div>

                <div class="item">
                  <h4 class="fb-hff-grey-head">Uniting for the SDGs:</h4>
                  <h1 class="fb-hff-black-text">Governments,<br/>Private enterprises,<br/>Charity organisations<br/>And YOU!

</h1>
                
                </div>

                <div class="item">
                  <h4 class="fb-hff-grey-head">The SDG Agenda:</h4>
                  <h1 class="fb-hff-black-text">No one left behind<br/>Because<br/>Everyone matters.<br/>We can make it happen!
</h1>
                
                </div>



                <div class="item">
                  <h4 class="fb-hff-grey-head">The BIG question</h4>
                  <h1 class="fb-hff-black-text">What’s<br/>Your<br/>Global Goal?<br/>Know more. Act now.
</h1>
                
                </div>




              </div>
            </div>
            <a href="{{URL::to('align/goal')}}" class="fb-primary-action-btn fb-take-action-btn"><i class="icon-right-arrow"></i> <span>TAKE ACTION</span></a>
          </div>
          <span class="fb-learn-more-btn-wrap">
            <a href="javascript:void(0)">
              <!-- <span class="fb-learn-more-text">learn more</span> -->
              <span class="fb-learn-more-btn-icon">
                <i class="icon-down-arrow"></i>
                <i class="icon-down-arrow"></i>
                <i class="icon-down-arrow"></i>
              </span>
            </a>
          </span>
        </div>
      </section>
      <section class="section fb-home-second-fold" id="section2">
        <div class="fb-hsf-content-right" style="padding:0px;">
          <h3 class="fb-section-head text-center">Global Goals</h3>
         
          </div>

     <div class="fb-hsf-content-left">
          <div class="triangle-masked-image wow rollIn" style="display:none;">
        <img src="{{URL::asset('main/images/triangle.svg');}}" alt="triangle"/>
          </div>
		   <div class="triangle-masked-image wow rollIn">
		   
                <a href="{{URL::asset('main/videos/freebasics.mp4');}}" class="fb-home-news-slide popup-youtube">
                  <img class="youtube_img" src="{{URL::asset('main/images/casar.png');}}" alt="news image 1" />
                  <div class="fb-home-news-slide-content">
                    <i class="icon-video"></i>
<p class="fb-home-news-slide-text" style="font-size:30px;">Global Goals for Everyone</p>
<p class="fb-home-news-slide-text" style="font-family:Source Sans Pro,sans-serif;padding:0px;">Ms. Casar Jacobson<br>UN Youth Ambassador | Former Miss Canada</p>
                  </div>
                </a>
              </div>
			  
        </div>
 
        <div class="fb-hsf-content-right"  style="padding:0px;">
          <p class="text-center" style="display:none;"><img src="{{URL::asset('main/images/wheel.png');}}" alt="global revolution map" class="fb-gr-map-image"/></p>
 
           
         <h2 class="text-center">Transforming our world: Agenda 2030 for Sustainable Development</h2>
        <p class="fb-section-head-para">17 Global Goals for people, planet and prosperity. It’s a global call to action by the United Nations to end poverty, fix climate changes and fight inequalities.</p>
        <p class="fb-section-head-para">With 193 countries backing it, the Global Goals are an excellent framework to create awareness, mobilise funds and encourage innovations to solve some of the world’s biggest problems.</p>
       <p class="fb-section-head-para">Remember, we have less than 5000 days!</p>
           
          <div class="text-center"><a href="{{URL::to('align/goal')}}" class="fb-primary-action-btn fb-take-action-btn"><i class="icon-right-arrow"></i> <span>TAKE ACTION</span></a>
          </div>
          <div class="fb-gg-learn-more-wrap">
            <a class="fb-gg-learn-more-btn" role="button" data-toggle="collapse" href="#gg-learn-more-collapse" aria-expanded="false" aria-controls="gg-learn-more-collapse">Learn More >> </a>
          </div>

          </div>



      <div class="container" style="clear:both;">
          <div class="collapse" id="gg-learn-more-collapse">

          <div class='container'>
          <div class="col-md-3 col-xs-12">
      <img src="{{url::asset('main/images/un-goal-images/un-goal-no-poverty.png');}}" width=100% class="learn" />
          </div>
            <div class="col-md-3 col-xs-12">
<p>End poverty in all its forms everywhere</p>
<img src="{{url::asset('main/images/learn1.png');}}" width=100% />
          </div>
            <div class="col-md-3 col-xs-12">
<img src="{{url::asset('main/images/un-goal-images/un-goal-zero-hunger.png');}}" width=100% class="learn" />
          </div>
            <div class="col-md-3 col-xs-12">
<p>End hunger, achieve food security and improved nutrition and promote sustainable agriculture</p>
<img src="{{url::asset('main/images/learn2.png');}}" width=100% />
          </div>
</div>

<div class="container">

           <div class="col-md-3 col-xs-12">
<img src="{{url::asset('main/images/un-goal-images/un-goal-good-health-well-being.png');}}" width=100% class="learn" />
          </div>
            <div class="col-md-3 col-xs-12">
<p>Ensure healthy lives and promote well-being for all, at all ages</p>
<img src="{{url::asset('main/images/learn3.png');}}" width=100% />
          </div>
      
 <div class="col-md-3 col-xs-12">
      <img src="{{url::asset('main/images/un-goal-images/un-goal-quality-education.png');}}" width=100% class="learn" />
          </div>
            <div class="col-md-3 col-xs-12">
<p>Achieve gender equality and empower all women and girls</p>
<img src="{{url::asset('main/images/learn4.png');}}" width=100% />
          </div>
          </div>

          <div class="container">
            <div class="col-md-3 col-xs-12">
<img src="{{url::asset('main/images/un-goal-images/un-goal-gender-equality.png');}}" width=100% class="learn"/>
          </div>
            <div class="col-md-3 col-xs-12">
<p>Achieve gender equality and empower all women and girls</p>
<img src="{{url::asset('main/images/learn5.png');}}" width=100% />
          </div>
           <div class="col-md-3 col-xs-12">
<img src="{{url::asset('main/images/un-goal-images/un-goal-clean-water-sanitation.png');}}" width=100% class="learn"/>
          </div>
            <div class="col-md-3 col-xs-12">
<p>Ensure availability and sustainable management of water and sanitation for all </p>
<img src="{{url::asset('main/images/learn6.png');}}" width=100% />
          </div>

  </div>

<div class="container">
<div class="col-md-3 col-xs-12">
      <img src="{{url::asset('main/images/un-goal-images/un-goal-affordable-clean-energy.png');}}" width=100% class="learn"/>
          </div>
            <div class="col-md-3 col-xs-12">
<p>Ensure access to affordable, reliable, sustainable and modern energyfor all</p>
<img src="{{url::asset('main/images/learn7.png');}}" width=100% />
          </div>
            <div class="col-md-3 col-xs-12">
<img src="{{url::asset('main/images/un-goal-images/un-goal-decent-work-economic-growth.png');}}" width=100% class="learn" />
          </div>
            <div class="col-md-3 col-xs-12">
<p>Promote sustained, inclusive and sustainable economic growth,full and productive employment as well as decent work for all</p>
<img src="{{url::asset('main/images/learn8.png');}}" width=100% />
          </div>
          </div>


          <div class="container">
           <div class="col-md-3 col-xs-12">
<img src="{{url::asset('main/images/un-goal-images/un-goal-industry-innovation-infrastructure.png');}}" width=100% class="learn"/>
          </div>
            <div class="col-md-3 col-xs-12">
<p>Build resilient infrastructure, promote inclusive and sustainable industrialization as well as foster innovation</p>
<img src="{{url::asset('main/images/learn9.png');}}" width=100% />
          </div>

<div class="col-md-3 col-xs-12">
      <img src="{{url::asset('main/images/un-goal-images/un-goal-reduced-inequalities.png');}}" width=100% class="learn"/>
          </div>
            <div class="col-md-3 col-xs-12">
<p>Reduce inequality within and among countries</p>
<img src="{{url::asset('main/images/learn10.png');}}" width=100% />
          </div>
          
          </div>
          
          <div class="container">
            <div class="col-md-3 col-xs-12">
<img src="{{url::asset('main/images/un-goal-images/un-goal-sustainable-cities-communities.png');}}" width=100% class="learn"/>
          </div>
            <div class="col-md-3 col-xs-12">
<p>Make cities and human settlements inclusive, safe, resilient and sustainable</p>
<img src="{{url::asset('main/images/learn11.png');}}" width=100% />
          </div>
           <div class="col-md-3 col-xs-12">
<img src="{{url::asset('main/images/un-goal-images/un-goal-responsible-consumption-production.png');}}" width=100% class="learn"/>
          </div>
            <div class="col-md-3 col-xs-12">
<p>Ensure sustainable consumption and production patterns</p>
<img src="{{url::asset('main/images/learn12.png');}}" width=100% />
          </div>

</div>

<div class="container">
<div class="col-md-3 col-xs-12">
      <img src="{{url::asset('main/images/un-goal-images/un-goal-climate-action.png');}}" width=100% class="learn"/>
          </div>
            <div class="col-md-3 col-xs-12">
<p>Take urgent action to combat climate change and its impacts</p>
<img src="{{url::asset('main/images/learn13.png');}}" width=100% />
          </div>
            <div class="col-md-3 col-xs-12">
<img src="{{url::asset('main/images/un-goal-images/un-goal-life-below-water.png');}}" width=100% class="learn"/>
          </div>
            <div class="col-md-3 col-xs-12">
<p>Conserve and sustainably use the oceans, seas and marine resources for sustainable development</p>
<img src="{{url::asset('main/images/learn14.png');}}" width=100% />
          </div>
</div>

<div class="container">

           <div class="col-md-3 col-xs-12">
<img src="{{url::asset('main/images/un-goal-images/un-goal-life-on-land.png');}}" width=100% class="learn"/>
          </div>
            <div class="col-md-3 col-xs-12">
<p>Protect, restore and promote sustainable use of terrestrial ecosystems, sustainably manage forests, combat desertification; halt and reverse land degradation and halt biodiversity loss</p>
<img src="{{url::asset('main/images/learn15.png');}}" width=100% />
          </div>


<div class="col-md-3 col-xs-12">
      <img src="{{url::asset('main/images/un-goal-images/un-goal-peace-justice-strong-institutions.png');}}" width=100% class="learn"/>
          </div>
            <div class="col-md-3 col-xs-12">
<p>Promote peaceful and inclusive societies for sustainable development, provide access to justice for all and build effective, accountable and inclusive institutions at all levels</p>
<img src="{{url::asset('main/images/learn16.png');}}" width=100% />
          </div>

          </div>

          <div class="container">
            <div class="col-md-3 col-xs-12">
<img src="{{url::asset('main/images/un-goal-images/un-goal-partnerships-for-goals.png');}}" width=100% class="learn"/>
          </div>
            <div class="col-md-3 col-xs-12">
<p>Strengthen the means of implementation and revitalize the GlobalPartnership for Sustainable Development</p>
<img src="{{url::asset('main/images/learn17.png');}}" width=100% />
          </div>
       </div> 


          </div>

        </div><!-- container end -->

        </div>
       
       
        <div class="fb-second-fold-connector">
          <img src="{{URL::asset('main/images/global-revolution-connector-web.svg');}}" alt="global revolution connector web"/>
        </div>
      </section>
      <section class="section fb-home-third-fold" id="section3">
        <div class="fb-global-revolution-map-wrapper">
          <div class="fb-section-head-wrap wow fadeInUp" data-wow-delay="0.8s">
            <h3 class="fb-section-head">Global Movement</h3>
            <h3 class="fb-ff-content-head text-center">This is the world’s largest lesson! </h3>
            <p class="fb-section-head-para">Spearheaded by the United Nations, It’s a global call for everyone on planet earth to spread awareness, collaborate and jointly mobilise resources to achieve success on the global goals. </p>

             <p class="fb-section-head-para">Governments, Corporations, Philanthropists, Social change agents, Youth, innovators and non-profit organizations are all aligning with these goals to solve regional, national and international problems.</p>
             <p class="fb-section-head-para">Take a pledge, show your support for the Global goals and join the Global Movement!</p>

             
          </div>
          <div class="fb-gr-map-image-wrapper hidden-xs hidden-sm" style="height:592px;">
		  
            <!-- <img src="{{URL::asset('main/images/global-revolution-map.svg');}}" alt="global revolution map" class="fb-gr-map-image"/> -->
          </div>

          
        </div>
        <div class="fb-hsf-square-masked-image wow fadeInUp" data-wow-delay="0.2s">
          <img src="{{URL::asset('main/images/global_movement.png');}}" alt="global movement"/>
        </div>
        
      </section>
      <div class="fb-third-fold-connector">
       <div class="text-center leftaction"><a href="{{URL::to('align/goal')}}" class="fb-primary-action-btn fb-take-action-btn"><i class="icon-right-arrow"></i> <span>TAKE ACTION</span></a></div>
        <img src="{{URL::asset('main/images/platform-connector-web.svg');}}" alt="platform connector web"/>
      </div>
       
      <section class="section fb-home-fourth-fold" id="section4">
        <div class="fb-hff-content-right">
          <div class="fb-section-head-wrap fb-hff-section-head">
            <h3 class="fb-section-head">Global Platform</h3>
            
            <h3 class="fb-ff-content-head fb-ff-content-head1">Take action for the Global Goals!</h3>
      <p class="fb-ff-content-para">
Yes, this is a one-stop exclusive platform to learn, align and take action on the Global Goals.
</p>
<p class="fb-ff-content-para">
An eco-system that comprises of awareness programs, qualified projects under each goal, network of impact investors, and a technology platform to interconnect and measure the progress through Analytics.

        </p>

        <h3 class="fb-ff-content-head text-center" style="display:none;">Record your Pledge  | Support a project</h3>
         
 <div class="text-center"><a href="{{URL::to('align/goal')}}" class="fb-primary-action-btn fb-take-action-btn"><i class="icon-right-arrow"></i> <span>TAKE ACTION</span></a></div>

          </div>
         
         
        </div>
       

       <div class="fb-hff-content-left">
	   
          <div class="wow fadeInLeft" data-wow-delay="0.4s">
            <img src="{{url::asset('main/images/polygon_2.jpg');}}" alt="triangle"  class="fb-triangle-mask" style="width:400px;"/>
          </div>
        </div>

       

      </section>
      
<section class="section fb-sixth-fold wow fadeInUp" id="section6">
        <div class="fb-section-head-wrap">
          <h3 class="fb-section-head">Goals in the News</h3>
        </div>
        <div class="fb-sixth-fold-content-wrap">
          <div class="fb-sixth-fold-header-section">
              <div class="container">
                  <h5 class="fb-news-section-small-head">Global News</h5>
                  <div class="fb-sixth-fold-header-right">
                      <select id="select_global_goal" onchange="onSelectedGlobalGoal(this.value);">
                          <option value="0">Global Goals</option>
                          <option value="1">SDG1: No Poverty</option>
                          <option value="2">SDG2: Zero Hunger</option>
                          <option value="3">SDG3: Good Health And Well-Being</option>
                          <option value="4">SDG4: Quality Education</option>
                          <option value="5">SDG5: Gender Equality</option>
                          <option value="6">SDG6: Clean Water And Sanitation</option>
                          <option value="7">SDG7: Affordable And Clean Energy</option>
                          <option value="8">SDG8: Decent Work And Economic Growth</option>
                          <option value="9">SDG9: Industry Innovation And Infrastructure</option>
                          <option value="10">SDG10: Reduced Inequalities</option>
                          <option value="11">SDG11: Sustainable Cities And Communities</option>
                          <option value="12">SDG12: Responsible Consumption And Production</option>
                          <option value="13">SDG13: Climate Action</option>
                          <option value="14">SDG14: Life Below Water</option>
                          <option value="15">SDG15: Life on Land</option>
                          <option value="16">SDG16: Peace, Justice And Strong Institutions</option>
                          <option value="17">SDG17: Partnership For The Goals</option>
                      </select>
                  </div>
              </div>
          </div>
            <div class="fb-news-tab-wrapper">
                <div class="container">
                    <div class="tab-content" id="goalPane">

                    </div>
                    <div class="fb-news-more-btn-wrapper">
                        <input type="button" value="Load more" class="fb-news-more-btn" onclick="loadMoreContent()" />
                    </div>
                </div>
            </div>

 
        </div>
      </section>

      <section class="section fb-seventh-fold wow fadeInUp" id="section7" style="display:none;">
        <div class="fb-section-head-wrap">
          <h3 class="fb-section-head">FreeBasics Citizens say</h3>
        </div>
        <div class="fb-twitter-feeds-section">
          <div class="container" id="twitter-container">
          <!--  <a class="twitter-timeline"  href="https://twitter.com/hashtag/design" data-widget-id="852452511894179841" data-width="100%" data-height="400" data-chrome="noheader, nofooter, noborders, transparent, noscrollbar" data-tweet-limit="3">#design Tweets</a> -->
       <a class="twitter-timeline" href="https://twitter.com/Freebasics" data-width="100%" data-chrome="noheader, nofooter, noborders, transparent, noscrollbar" data-tweet-limit="3">Tweets by @{Freebasics}</a>
       
                  
       

          </div>
        </div>
      </section>


 
    <!--- client section starts-->

   
   <div class="modal fade fb-modal fb-cp-success-modal" id="alignSuccessModal" tabindex="-1" role="dialog" aria-labelledby="alignSuccessModalLabel" data-backdrop="static" data-keyboard="false">
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
            <p class="fb-create-project-success-modal-para"><strong>You have successfully aligned yourself to this goal!</strong></p>
            <p class="fb-asModal-light-para">6 of your friends have done the same. Spread the joy!</p>
            <div class="fb-asModal-btns-wrapper">
              <a href="donate.html" type="button" class="fb-cpsm-thanks-btn">Support this Goal</a>
              <a href="project-detailed-view.html" type="button" class="fb-read-about-goal-btn">Read about the Goal</a>
            </div>
            <ul class="fb-modal-share-list">
              <li>
                <span>Share:</span>
              </li>
              <li><a href="#"><i class="icon-facebook"></i></a></li>
              <li><a href="#"><i class="icon-twitter"></i></a></li>
              <li><a href="#"><i class="icon-google-plus"></i></a></li>
              <li><a href="#"><i class="icon-linkedin"></i></a></li>
            </ul>
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
 var selectedCategory = 0;
 var currentOffset = 0;
 var currentLimit = 3;

 function getGlobalGoal(value, appendContent) {
  var container = $('#goalPane');
  var builder = "<div class='tab-pane fade in active'>";
  selectedCategory = value;
  
  var url = '//news.freebasics.ca/Home/News?category=' + value + '&currentOffset=' + currentOffset + '&currentLimit=' + currentLimit;
  
  
  
  $.get(url, function (data) {
   if (data != null) {

    currentOffset += data.CurrentOffset;
    var categories = data.Categories;
    if (categories != null) {
     builder = builder + "<div class='row'>";
     $.each(categories, function (index, value) {
      //builder = builder + "<div class='row'>";
      var categoryName = value.Name;
      var categoryImgUrl = value.ImageUrl;
      var articles = value.Articles;
      if (articles != null) {
       $.each(articles, function (itemIndex, article) {
        if (article != null) {
         var articleLink = article.Link;
         var articleTitle = article.Title;
         var pubDate = article.PublicationDate;
         var sourceName = article.SourceName;
         var description = article.Description;
         var articleImgUrl = article.ImageUrl;
         var imgUrl = categoryImgUrl;
         if (articleImgUrl != null) {
          imgUrl = articleImgUrl;
         }

         if (articleTitle != null && description != null) {
          if (articleTitle.length > 100) {
           if (articleTitle.length < 200) {
            if (articleTitle.length + description.length > 250) {
             var allowedLength = (250 - articleTitle.length);
             if (allowedLength > 0) {
              if (description.length >= allowedLength) {
               description = description.substring(0, allowedLength) + "...";
              }
              else {
               description = description + "...";
              }
             }
             else {
              description = description + "...";
             }

            }
            else {
             description = description + "...";
            }
           }
           else {
            articleTitle = articleTitle.substring(0, 150);
            if (articleTitle.length + description.length > 250) {
             var allowedLength = (250 - articleTitle.length);
             if (allowedLength > 0) {
              if (description.length >= allowedLength) {
               description = description.substring(0, allowedLength) + "...";
              }
              else {
               description = description + "...";
              }
             }
             else {
              description = description + "...";
             }

            }
            else {
             description = description + "...";
            }
           }
          }
          else {
           if (articleTitle.length + description.length > 250) {
            var allowedLength = (250 - articleTitle.length);
            if (allowedLength > 0) {
             if (description.length >= allowedLength) {
              description = description.substring(0, allowedLength) + "...";
             }
             else {
              description = description + "...";
             }
            }
            else {
             description = description + "...";
            }
           }
           else {
            description = description + "...";
           }
          }

         }

         builder = builder + "<div class='col-xs-12 col-md-4'>";
         builder = builder + "<a href='" + articleLink + "' class='fb-news-grid' target='_blank'>";
         builder = builder + "<span class='fb-news-grid-image' style='background-image:url(" + imgUrl + ");background-size: 100% 100% '></span>";
         builder = builder + "<span class='fb-news-grid-content-wrap'>";
         builder = builder + "<h3 class='fb-news-grid-head'>" + articleTitle + "</h3>";
         builder = builder + "<p class='fb-news-grid-description'>" + description + "</p>";
         builder = builder + "</span>"
         builder = builder + "</a>";
         builder = builder + "</div>";
        }
       });
       //builder = builder + "</div>";
      }

     });
     builder = builder + "</div>";
    }
   }
   builder = builder + "</div>";
   if (appendContent) {
    container.append(builder);
   }
   else {
    container.html(builder);
   }


  });
 };

 function onSelectedGlobalGoal(value) {
  currentOffset = 0;
  getGlobalGoal(value, false);
 }

 function loadMoreContent() {
  currentOffset += currentLimit;
  getGlobalGoal(selectedCategory, true);
 }



 $(document).ready(function () {

  getGlobalGoal(0, true);
 });

</script>

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
<!-- <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script> -->
<script src="{{URL::asset('main/js/customize-twitter-1.1.min.js');}}" type="text/javascript"></script>
<script src="{{URL::asset('main/js/jquery.easing.min.js');}}"></script>
<!-- <script src="js/globe.js"></script> -->
<script src="{{URL::asset('main/js/jquery.nav.js');}}"></script>
<!-- <script src="js/three.min.js"></script> -->
<script src="https://threejs.org/build/three.js"></script>
<script src="https://threejs.org/examples/js/controls/TrackballControls.js"></script>
<script src="https://threejs.org/examples/js/libs/stats.min.js"></script>
<script>
var $container = $('#container');
var renderer = new THREE.WebGLRenderer({antialias: true, alpha: true });
var camera = new THREE.PerspectiveCamera(80,1,0.1,10000);
var scene = new THREE.Scene();
var Ico;

scene.add(camera);
renderer.setSize(576, 576);

// Making the canvas responsive
function onWindowResize(){

    var screenWidth = $(window).width();
    if (screenWidth <= 479){
      renderer.setSize( 300, 300 );
    }
    else if (screenWidth <= 767){
      renderer.setSize( 400, 400 );
    }
    else if (screenWidth <= 991){
      renderer.setSize( 500, 500 );
    }
    else if (screenWidth <= 1200){
      renderer.setSize( 450, 450 );
    }
    else if (screenWidth <= 1366){
      renderer.setSize( 550, 550 );
    }
    camera.updateProjectionMatrix();

}
onWindowResize();
window.addEventListener( 'resize', onWindowResize, false );

// renderer.setSize($container.innerWidth, $container.innerHeight);

$container.append(renderer.domElement);

// Camera
camera.position.z = 200;

// Material
var greyMat = new THREE.MeshPhongMaterial({
color      :  new THREE.Color("rgb(125,127,129)"),
emissive   :  new THREE.Color("rgb(125,127,129)"),
specular   :  new THREE.Color("rgb(125,127,129)"),
shininess  :  "100000000",
shading    :  THREE.FlatShading,
transparent: 1,
opacity    : 1
});

var L2 = new THREE.PointLight( );
L2.position.z = 1900;
L2.position.y = 1850;
L2.position.x = 1000;
scene.add(L2);
camera.add(L2);

var Ico = new THREE.Mesh(new THREE.IcosahedronGeometry(125, 1), greyMat);
Ico.rotation.z = 0.5;
scene.add(Ico);
var trackballControl = new THREE.TrackballControls(camera, renderer.domElement);
trackballControl.rotateSpeed = 1.0; // need to speed it up a little
trackballControl.noZoom = true;

function update(){
 Ico.rotation.x+=2/500;
 Ico.rotation.y+=2/500;
}

// Render
function render() {
trackballControl.update();
requestAnimationFrame(render);
renderer.render(scene, camera);
update();
}
render();
</script>

<script src="{{URL::asset('main/js/owl.carousel.min.js');}}"></script> <!-- owl carousel -->
<script>
$(document).ready(function() {
  jQuery("#featured-projects-slider").owlCarousel({
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

<script src="{{URL::asset('main/js/amcharts.js');}}" type="text/javascript"></script>
<script src="{{URL::asset('main/js/serial.js');}}" type="text/javascript"></script>
<script src="{{URL::asset('main/js/wow.js');}}" type="text/javascript"></script>
<script>
  new WOW().init();
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="{{URL::asset('main/js/jquery.counterup.min.js');}}"></script>
<script src="{{URL::asset('main/js/jquery-ui.min.js');}}"></script>
<script>
    jQuery(document).ready(function( $ ) {
        jQuery('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    });
</script>

<script src="{{URL::asset('main/js/custom.js');}}"></script>
<script src="{{URL::asset('main/js/home.js');}}"></script>
<script src="{{URL::asset('main/js/jquery.nav.js');}}"></script>


<script>
  jQuery(document).ready(function() {
    
    jQuery('#nav-one').onePageNav();




});
  
 
</script>





    @stop
	
	