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
		
		<div class="col-md-12 global_goals_us">
		<h3 class="fb-section-head">Pricing</h3>
		<p style="font-size:20px;">Does FreeBasics charge a fee towards platform usage?</p>
		<p style="font-size:20px;">FreeBasics does not charge anything from the donors.</p>
		<p style="font-size:20px;">The funds paid through the website will attract a deduction of 5% towards platform usage charges and administrative expenses.</p>	
<p style="font-size:20px;">For premium services requested by the project owners, please contact <a href="maitlto:customersupport@freebasics.ca">customersupport@freebasics.ca</a> for more details.</p>
<p><strong>What are the other deductions from the payment?</strong></p>
<p>Other than the platform usage fee of 5%, the other deductions are </p>
<P>- Gateway usage fee of 2.90%</p>
<p>- Any other prevalent Government taxes (GST etc.)</p>


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
