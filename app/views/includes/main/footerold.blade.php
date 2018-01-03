<footer>
    <div class="footer"> 
        <div class="container-fluid">
         <div class="container">
          <div class="fb-section-head-wrap">
            <h3 class="fb-section-head">Show that you care</h3>
          </div>
          <div class="fb-home-footer-button-wrapper">
            <a href="{{URL::to('align/goal')}}" class="fb-primary-action-btn fb-take-action-btn"><span>TAKE ACTION</span> <i class="icon-right-arrow"></i></a>
          </div>
        </div>
           

        </div>

          <div class="fb-footer-developed-by-info">
		  
		  <div class="container-fluid">
		<h1 class="fb-section-head text-center"><a href="{{URL::to('global_goals')}}" style="color:#fff;color:#fff;font-family:BebasNeue !important;>Global Goals Advocacy">Global Goals and Freebasics</a></h1>
		<div class="col-xs-12 col-md-2">
		<h3>Global Goals Advocacy</h3>
		
		<ul class="footerlinks">
<li><a href="{{URL::to('advocacy')}}">Advocacy</a></li>
		<li><a href="{{URL::to('pledge')}}">The pledge</a></li>
		<li style="display:none;"><a href="#">Advisory Board</a></li>
		<li style="display:none;"><a href="#">Our Partners</a></li>
		<li style="display:none;"><a href="#">Videos</a></li>
		
		
		</ul>
		</div>
		
		<div class="col-xs-12 col-md-2">
		<h3>Projects under Global Goals</h3>
		
		<ul class="footerlinks">
		<li><a href="{{URL::to('discover/category/all/new')}}">Social upliftment</a></li>
		<li><a href="{{URL::to('discover/category/all/new')}}">Innovations and Inventions</a></li>
		</ul>
		
		
		<ul class="footerlinks" style="display:none;">
		<?php $i=1;
		
		
		?>
                    @foreach($categories as $category)
					<?php if($i==7){break;}?>
                    <li>
                        <a class="mega-footer__link"  href="{{URL::to('discover/category')}}/{{$category->id}}/magic">{{$category->categoryname}}</a>
                    </li>
					<?php $i++;?>
                    @endforeach   
		</ul>				
		</div>
		
			
		<div class="col-xs-12 col-md-2">
		<h3>How it works</h3>
			<ul class="footerlinks">
	<li><a href="{{URL::to('nonprofit')}}">Non profit Organizations</a></li>
		<li><a href="{{URL::to('corporates')}}">Corporates</a></li>
		<li><a href="{{URL::to('individuals')}}">Individuals</a></li>
		<li><a href="#" style="display:none;">Videos</a></li>
		
		
		</ul>
		</div>
		
			<div class="col-xs-12 col-md-2">
		<h3>FreeBasics</h3>
			<ul class="footerlinks">
		<li><a href="{{URL::to('about_us')}}">About us</a></li>
		<li style="display:none;"><a href="#">The Team</a></li>
		<li style="display:none;"><a href="#">Our Partners</a></li>
		<li><a href="{{URL::to('careers')}}">Careers</a></li>
		<li><a href="{{URL::to('contact-us')}}">Contact Us</a></li>
		<li style="display:none;"><a href="#">Press</a></li>
		<li style="display:none;"><a href="#">Blog</a></li>
		
		
		</ul>
		</div>
		
		
		<div class="col-xs-12 col-md-2">
		<h3>Support</h3>
<ul class="footerlinks">
		<li><a href="{{URL::to('faq')}}">FAQ</a></li>
		<li><a href="#" style="display:none;">Pictures & Videos</a></li>
		<li><a href="{{URL::to('guidelines')}}">Guidelines</a></li>
		<li><a href="{{URL::to('pricing')}}">Pricing</a></li>
		<li><a href="{{URL::to('payouts')}}">Payouts</a></li>
		<li><a href="#" style="display:none;">Contact us</a></li>
		
		
		
		</ul>
		</div>
		
		<div class="col-xs-12 col-md-2">
		<h3>Follow us</h3>
		<ul class="footerlinks">
		<li><a href="http://www.twitter.com/freebasics" target="_blank">Twitter</a></li>
		<li><a href="https://www.facebook.com/FreeBasics-Global-1436748879747428/" target="_blank">Facebook</a></li>
		<li><a href="https://www.linkedin.com/company/freebasics" target="_blank">LinkedIn</a></li>
		<li><a href="https://instagram.com/freebasics_global" target="_blank">Instagram</a></li>
		
		</ul>
		</div>
		
		</div>
          <div class="container"  style="display:none;">
            <span class="fb-footer-developed-by-label">Designed by</span>
            <a href="https://netbramha.com/" target="_blank" class="fb-footer-developers-logo" title="NetBramha Studios"></a>
          </div>
		  
		  
		  
        </div>
    </div>
    {{Config::get('adminconfig.googleanalyticscode');}}

   

</footer>

<div class="container-fluid footerbottom ktfooter">

<div class="container_footer">

<div class="col-md-6 col-xs-12 footer-copyright clearfix">
           <p class="pull-left"><a href="{{URL::to('')}}" class="footer-logo">
        <img src="{{URL::asset('main/images/free-basics-logo.png');}}" alt="free basics logo" />
      </a></p>
		   	<div class="inner">
			 
	  
				<ul class="clearfix">
					<li class="pull-left"><a href="{{URL::to('terms-conditions')}}">Terms of Use</a></li>
					<li class="pull-left"><a href="{{URL::to('privacy-policy')}}">Privacy Policy</a></li>
					
				</ul>
			</div>
			<div class="date">
				<script>document.write(new Date().getFullYear());</script> | All Rights Reserved
			</div>
		</div>
			


<div class="col-md-6 col-xs-12 kt-payment-methods">
           
			<ul class="pull-left clearfix">
				<li id="Visa"></li>
				<li id="AmericanExp"></li>
				<li id="Master"></li>
				<li id="Net"></li>
				<!-- <li id="Cash"></li> 
				<li id="Cheque"></li> -->
				<li id="Ssl"></li>
				<li class="secure">100% Secure</li>
			</ul>
</div>

</div>			

</div>



 <script>
        $(document).ready(function () {
            if (!localStorage.counter) {
                window.location.reload();
                localStorage.counter = true;
            }
        });
    </script>


    <script>

        if (window.location.hash == '#_=_') {
            window.location.hash = ''; // for older browsers, leaves a # behind
            history.pushState('', document.title, window.location.pathname); // nice and clean
            e.preventDefault(); // no page reload
        }
    </script>

    <script>
        setTimeout(function () {
            $('.alert-message').fadeOut('slow');
        }, 8000); // <-- time in milliseconds
    </script>
    <?php $baseurl = url(); ?>
    <script>
        $('#languageselect').on('change', function () {
            var url = '<?php echo $baseurl; ?>';
            dataString = $(this).val();
            $.ajax({
                type: "POST",
                url: url + "/setsession",
                data: "locale=" + dataString,
                success: function (data) {
                    location.reload();
                }
            });
        });

    </script>
    <script>
        $('#currencyselect').on('change', function () {
            var url = '<?php echo $baseurl; ?>';
            dataString = $(this).val();
            $.ajax({
                type: "POST",
                url: url + "/setcurrencysession",
                data: "currency=" + dataString,
                success: function (data) {
                    location.reload();
                }
            });
        });

    </script>

    <script>
        setInterval(function () {
            //alert("Hello"); 
        }, 86400000);
    </script>

