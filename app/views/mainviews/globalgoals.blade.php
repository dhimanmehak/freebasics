@extends('layouts.mainlayout')
@section('content')
<style type="text/css">
.fb-home-footer >  div.container
{
	display:none;
}
.fb-home-footer 
{
	padding-top:0px;
}
.fb-footer-developed-by-info
{
	margin-top:0px;
}
</style>
<section class="fb-signup-section">
    <div class="container">
    
       @if(Session::has('success'))
        <div class="alert-message success">
            {{Session::get('success');}}
        </div>
        @endif
        @if(Session::has('failed'))
        <div class="alert alert-warning text-center">
            {{Session::get('failed');}}
        </div>
        @endif
		
		<div class="col-md-12">
		<h3 class="fb-section-head">Global Goals and Us</h3>
		
        <div class="col-md-12 global_goals_us">
		<p class="ques">World: What’s your business model ?</p>
		<p>Us: We are Profit & Purpose driven- We are black & white-We won’t let one pull the other down. We call ourselves a Zebra company</p>
		
		<p class="ques">World: Where do you apply this business model?</p>
		<p>Us: To the world’s largest lesson- The 17 Global goals by United Nations to be achieved by year 2030</p>
		
		<p class="ques">World: How?</p>
		<p>Us: By creating an eco-system around these 17 goals where people with shared prosperity bent of mind come to support one another for charitable causes and bring innovations to life</p>
		
		<p class="ques">World: What problem are you solving?</p>
		<p>Us: Awareness and funding for 17 global goals are two biggest challenges to achieve 169 targets under these goals by 2030. Our platform will educate people and help them take action on each of these goals</p>
		
		
		<p class="ques">World: How will Global Goalsbenefit?</p>
		<p>Us: Every year Global Goals need $5-7 trillion. Our aim is to contribute to the success of these goal. We will bring projects that can eradicate poverty, fix climate change and reduce inequalities to be funded through community participation and social impact investors</p>		
		
		
		<p class="ques">World: What does the eco system comprises of?</p>
		<p>Us: Advocacy | Projects | Funding | Impact Analysis | Technology|  ...And all this exclusively for Global Goals</p>
		
		
		<p class="ques">World: Why do you think Advocacy is important?</p>
		<p>Us: Advocacy on Global Goals is the need of the hour, we are running out of time and it is highly under invested. Our marketing budgets and the grants we solicit will go towards spreading awareness on Global Goals</p>
		
		<p class="ques">World: Why do you think Advocacy is important?</p>
		<p>Us: Advocacy on Global Goals is the need of the hour, we are running out of time and it is highly under invested. Our marketing budgets and the grants we solicit will go towards spreading awareness on Global Goals</p>
		
		
		
		<p class="ques">World: What projects make it to your platform?</p>
		<p>Us: Projects that help eradicate poverty, fix climate change and reduce inequalities qualify to be under one of the 17 global goals. We capture the impact created by the network on our platform and help countries to rank higher on SDG Index published every year</p>
		
		<p class="ques">World: Where are you based out of ?</p>
		<p>Us: Headquartered in Canada we represent North America | Europe | Asia through our group companies and representatives</p>
		
		<p class="ques">World: How are you structured?</p>
		<p>Us: We operate under the FreeBasics Group of companies that comprise of <br/>
		1) FreeBasics foundations – A Non-profit organization to create awareness on Global goals<br/>
		2) FreeBasics Inc – A Technology Company to support financing the SDGs initiative.<br/>
		3) Sustainable Living India Pvt ltd –An operating company in India that facilitates India based projects</p>
		
		
		
		<p class="ques">World: typing...</p>
		<p>Us: We gotta go now…please mail us at <a href="mailto:info@freebasics.ca">info@freebasics.ca</a> for more information follow us on twitter, facebook, Instagram, linkedin</p>
		
		</div>
		
		</div>
      <div class="fb-login-box" style="display:none;">
        <div class="fb-signup-right">
          <!-- <p class="fb-signup-top-text">Be the first of your friends to join the global revolution. <strong>Sign up now!</strong></p> -->
                   <div class="fb-signup-form-wrapper">
            <form action="{{URL::to('dologin');}}"  method="post" id="formzip">
            
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="{{url::asset('main/js/bootstrap.min.js');}}"></script>
<script src="{{url::asset('main/js/jquery-ui.min.js');}}"></script>
<?php $baseurl = url(); ?>
 <script>

  $('.FAB').on('click', function () {
  $(this).closest('.user-input').toggleClass('show-input');
  $(this).find(".icon-add").toggleClass("rotate");
});

   
        $('#currencyselect').on('selectmenuchange', function () {
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



@stop
