@extends('layouts.mainlayoutold')
@section('content') 
<section>
    <div class="payment-page1">
        <div class="container">
            @if(Session::has('failed'))
            <div class="alert-message error">
                {{Session::get('failed');}}
            </div>
            @endif
            <h2 class="top-healin">{{{$projectdetails->title}}}</h2>            
            <span class="end-tags">by {{{$projectdetails->firstname}}} {{{$projectdetails->lastname}}}</span>

          
            <div class="alrighty-div">
           
                <form method="post" action="{{URL::to('postback')}}">
                    <input type="hidden" value="{{$projectdetails->id}}" name="projectid">
                    <input type="hidden" value="userend" name="posttype">
                    <input type="hidden" value="{{$userid}}" name="userid">
                    <div class="col-sm-8">
                       <!-- <span class="green-text">{{trans('messages.alrighty')}}!</span> -->
                        <span class="pledge-text">{{trans('messages.enterpledgeamount')}}</span>


                        <div class="bntscold"> <span class="green-text" >{{$projectdetails->currencysymbol}}</span>
                            <input class="plc-amount @if($errors->has('pledge_amount')) has-error @endif" id="amount" type="text" name="pledge_amount" onkeyup="" onblur="changeVal()" @if(isset($pledge)) value="{{$pledge}}" @else value="{{ Input::old('pledge_amount') }}" @endif >
                        </div>
                        @if ($errors->has('pledge_amount')) <p class="help-block">{{ $errors->first('pledge_amount') }}</p> @endif
                        <h3 class="rewd-text">{{trans('messages.selectreward')}}</h3>
                        <ul class="rewd-area">
                            <li>
                                <label >
                                    <div class="rewd-area-left">
                                        <input  onclick="changeValue('1')" id="redio" type="radio"  name="reward"  mycustomtag="1" class="@if($errors->has('reward')) has-error @endif " value='0'>
                                        <span class="no-rewrds" style="padding: 10px;">{{trans('messages.noreward')}}</span>
                                    </div>
                                    <div class="rewd-area-right">
                                        {{trans('messages.helptheproject')}}
                                    </div>
                                </label>
                            </li>
                            @if ($errors->has('reward')) <p class="help-block reward">{{ $errors->first('reward') }}</p> @endif
                            @foreach($rewards as $reward)                           
                            <li>
                                <label  >
                                    <div class="rewd-area-left">                                            
                                        <input onclick="changeValue({{round(($reward->pledgeamount*$projectdetails->rate)*100)/100}})"  type="radio" name="reward" value="{{$reward->id}}"  mycustomtag="{{round(($reward->pledgeamount*$projectdetails->rate)*100)/100}}" class="reward-select @if($errors->has('reward')) has-error @endif" @if($reward->islimited==1) @if($reward->quantity==$reward->backerscount)disabled @endif @endif  @if(isset($rewardid)&&$reward->id==$rewardid)checked="checked"  @endif>
                                               <span class="no-rewrds reward-amount" style="padding: 10px;">{{$projectdetails->currencysymbol}} {{round(($reward->pledgeamount*$projectdetails->rate)*100)/100}}+</span>
                                    </div>

                                    <div class="rewd-area-right">
                                        @if($reward->islimited==1)
                                        @if($reward->quantity==$reward->backerscount)
                                        <span style='font-size: 13px; padding: 5px;  background: #000; color: #fff;'>
                                            <span class="limited-number">{{trans('messages.allgone')}}!</span>
                                        </span> <br>                                           
                                        @else
                                        <span class="bg-yellow " style='font-size: 13px; padding: 5px;'>
                                            <span class="limited-number">{{trans('messages.limited')}} ({{$reward->quantity-$reward->backerscount}} {{trans('messages.leftof')}} {{$reward->quantity}})</span>
                                        </span><br>
                                        @endif
                                        @endif
                                        {{{$reward->description}}}
                                        <br>
                                        <br>
                                        <?php
                                        
                                        $date = explode('-', $reward->estimateddelivery);
                                       
                                       // $delivery = date("M", mktime(0, 0, 0, $date[0])) . ' ' . $date[1];
                                        $delivery = '';
                                        
                                      
                                        ?>
                                        {{trans('messages.estimateddelivery')}} : {{$reward->estimateddelivery}}
                                    </div>
                                </label>
                            </li>

                            @endforeach

                            <div><b style="float: right; padding: 10px; margin-right: 60px;">{{trans('messages.total')}}:<span>{{$projectdetails->currencysymbol}}</span><b id="total">@if(isset($pledge)){{$pledge}}@else 0 @endif</b> </b></div>
                            <div  style="float:right; margin-top: 45px; margin-right: -120px;">
                                <input type="submit" value="{{trans('messages.continuetonextstep')}}" class="button button_green submit"> 
                            </div>
                        </ul>
                    </div>
                </form>

            </div>

        </div>

    </div>
</section>

<!-- Modal -->
<div class="modal fade fb-modal fb-cp-success-modal" id="donationSuccessModal" tabindex="-1" role="dialog" aria-labelledby="donationSuccessModalLabel" data-backdrop="static" data-keyboard="false">
  <div class="vertical-alignment-helper">
    <div class="modal-dialog vertical-align-center" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="icon-close"></i></button>
        </div>
        <div class="modal-body">
          <div class="fb-create-project-success-modal-content">
            <span class="fb-create-project-success-modal-icon"><i class="icon-checked"></i></span>
            <h4 class="fb-create-project-success-modal-head">Well done!</h4>
            <p class="fb-create-project-success-modal-para">You have successfully <strong>donated.</strong>  Share the message and spread the smile! :)</p>
            <ul class="fb-modal-share-list">
              <li><a href="#"><i class="icon-facebook"></i></a></li>
              <li><a href="#"><i class="icon-twitter"></i></a></li>
              <li><a href="#"><i class="icon-google-plus"></i></a></li>
              <li><a href="#"><i class="icon-linkedin"></i></a></li>
            </ul>
            <a href="#" type="button" class="fb-cpsm-thanks-btn">Take me back to the project</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<!-- <script src="{{URL::asset('main/js/bootstrap.min.js');}}"></script>-->
<script src="{{URL::asset('main/js/jquery-ui.min.js');}}"></script>
<script src="{{URL::asset('main/js/custom.js');}}"></script>
<script>
$(".fb-donate-submit-btn").click(function(){
     $('#donationSuccessModal').modal('show');
});
</script>

<script>

            function changeValue(value) {
            var pledge = document.getElementById('amount').value;
			
                    if (pledge == '' || pledge < value){
						
            document.getElementById('amount').value = value;
            document.getElementById("total").innerHTML = value;
            }
            }

    $("#amount").keypress(function (e) {
		var pledge =$(this).value;
		 document.getElementById("total").innerHTML = value;
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
    return false;
    }
    });
            window.onload = function () {
            getTextVal();
                    var checked_value = $('input[name=reward]:checked').val();
					
                    if (checked_value) {
            $('.help-block').css('display', 'none');
            }
            };
			function changeVal() {
				 var x = document.getElementById("amount").value;
				 document.getElementById("total").innerHTML = x;
			}
            function getTextVal() {
            var x = document.getElementById("amount").value;
			
                    if (!x) {
						
            document.getElementById("total").innerHTML = 1;
			$("input[name='reward']:first").attr("checked",true);
			$("#amount").val(1);
            } else {
            document.getElementById("total").innerHTML = x;
            }
            }

    $('input').keypress(function () {
    $('.help-block').css('display', 'none');
            $(this).removeClass('has-error');
    });
            $('input').click(function () {
    $('.reward').hide();
    });
            $(document).ready(function () {
				
    $("input[type='radio']").click(function () {
    var radioValue = $("input[name='reward']:checked").attr("mycustomtag");
            var pledge_amount = parseInt($("#amount").val());
            if (pledge_amount < radioValue) {
    if (radioValue) {
    $("#amount").val(radioValue);
            $("#total").html(radioValue);
            // alert("Your are a - " + radioValue);
    }
    }
    });
    });
            $(document).ready(function () {
				
    if ($("#amount").val() != '' || $("#amount").val() != 0) {
    $(this).removeClass('has-error');
	
	
    }
    if ($("#total").val() != '') {
		
    $(this).removeClass('has-error');
    }
    });

</script>


<script type="text/javascript">
$('.rewd-area input[type="radio"]').change(function () {

$('.rewd-area li').removeClass( "active" );
$( this ).parents( "li" ).toggleClass( "active" );


});


 
</script>


@stop