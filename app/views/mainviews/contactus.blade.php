@extends('layouts.mainlayout')
@section('content')

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
		<h3 class="fb-section-head">Contact Us</h3>
		<p style="font-size:20px;">Address: Mississauga, Ontario-Canada</p>
<p style="font-size:20px;">Phone Number: +1 647 9471946</p>
		<p style="font-size:20px;">Email: <a href="mailto:info@freebasics.ca">info@freebasics.ca</a></P>
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