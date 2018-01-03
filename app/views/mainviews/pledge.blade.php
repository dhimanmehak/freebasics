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
		<h3 class="fb-section-head">Pledge</h3>
		<p style="font-size:20px;">It's a simple click to show your support for the Global Goals. Share your pledge on social media and invite your friends and families too. Every pledge matters as each pledge from your country is counted. </P>
		<p style="font-size:20px;">
		If you haven’t taken a pledge yet, show your support NOW.
		</p>
		<div class="text-center"><a href="{{URL::to('align/goal')}}" class="fb-primary-action-btn fb-take-action-btn"><i class="icon-right-arrow"></i> <span>TAKE ACTION</span></a>
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
