
@extends('layouts.mainlayout')
@section('content')
<style type="text/css">
.overflow {
      height: 200px;
    }
</style>

<div class="container text-center">

 @if(Session::has('failed'))
                <div class="alert-message error">
                    {{Session::get('failed');}}
                </div>
                @endif
</div>

<section class="fb-donate-section">
    <div class="container">
   
                <div class="col-md-12 col-sm-12">
                    

                    <h3 class="rewd-text">{{trans('messages2.cardinformation')}} </h3>
                    
                    </div>
      <div class="fb-donate-box">
          <div class="fb-section-head-wrap">
         
            <h1 class="fb-section-head">{{{$projectdetail->title}}}</h1>
            <p class="fb-signup-top-text">by {{{$projectdetail->firstname}}} {{{$projectdetail->lastname}}} <span style="float:right">Your pledge amount is: <strong>{{$projectdetail->currencysymbol}}{{$pledgeamount}}</strong></span></p>
			
          </div>
         <form action="{{URL::to('poststripepayment')}}" method="post" name="form">
           <input type="hidden" name="projectid" value="{{$projectdetail->id}}">
                            <input type="hidden" name="rewardid" value="{{$rewardid}}">
                            <input type="hidden" name="userid" value="{{$userid}}">
                            <input type="hidden" name="pledgeamount" value="{{$pledgeamount}}">
                            <input type="hidden" value="{{Session::get('locale')}}" name="language" id="language">
            <div class="fb-donate-form-box">
              <div class="fb-donate-form-box-left" style="display:none;">
                <textarea class="fb-input-textarea fb-donation-amount-input">{{$projectdetail->currencysymbol}}{{$pledgeamount}}</textarea>
              </div>
              <div class="fb-donate-form-box">
                <ul class="fb-donate-form-list">
                  <li class="col-md-6">
                    <input type="text" class="fb-input-text" placeholder="Card Holder Name" name="name" class="@if($errors->has('name')) has-error @endif" style="text-transform: uppercase;" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required/>
                     @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                  </li>
                  <li class="col-md-6">
                    <input type="text" class="fb-input-text" placeholder="Card Number" name="cardnumber" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required/>
                     @if ($errors->has('cardnumber')) <p class="help-block">{{ $errors->first('cardnumber') }}</p> @endif
                                    <span class="cardnumber_error" style="color:red;margin-top: -22px;"></span>
                  </li>
                  <li class="col-md-4">
                  <select name="month" oninvalid="InvalidCountry(this);" oninput="InvalidCountry(this);" required="">
                                        <option value="">--{{trans('messages2.month')}}--</option>
                                        <?php for ($m = 1; $m <= 12; $m++) { ?>
                                            <option value="{{sprintf("%02d", $m);}}" >{{sprintf("%02d", $m);}}</option>
                                        <?php } ?>
                                    </select>
                                   
                   
                  </li>
				  <li class="col-md-4">
				   <select name="year" oninvalid="InvalidCountry(this);" oninput="InvalidCountry(this);" required="">
                                        <option value="">--{{trans('messages2.year')}}--</option>
                                        <?php
                                        $currentdate = date('Y');
                                        for ($i = $currentdate; $i < $currentdate + 20; $i++) {
                                            ?>
                                            <option value='{{$i}}'>{{$i}}</option>
                                        <?php } ?>  
                                    </select>
				  </li>
                  <li class="col-md-4"><input class="fb-input-text @if($errors->has('cvv')) has-error @endif" placeholder="CVV" name="cvv" id="cvv" type="password" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required="">
                                        @if ($errors->has('cvv')) <p class="help-block">{{ $errors->first('cvv') }}</p> @endif

                  </li>

                   <li class="col-md-6">
                               

                                    {{ Form::select('country',array(trans('messages.country')) + $countries->lists('countryname', 'countryname'), 'default', array('class' => 'cnt-selct','required'=>'true' ,'id' => 'country', Input::old('country'))) }}
                                    <span class="country_error" style="color:red;float: right;margin-right: -275px;margin-top: -22px;"></span>    
                              

                            </li> 

                            <li class="col-md-6">
                                
                                    <input placeholder="{{trans('messages.address')}} 1" type="text" name="address1" class="fb-input-text @if($errors->has('address1')) has-error @endif" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required>
                                    @if ($errors->has('address1')) <p class="help-block">{{ $errors->first('address1') }}</p> @endif
                                    <span class="address1_error" style="color:red;float: right;margin-right: -275px;margin-top: -22px;"></span>
                               

                            </li>

<li class="col-md-12">
                                
                                
                                    <input placeholder="{{trans('messages.address')}} 2" type="text" name="address2" class="fb-input-text @if($errors->has('address2')) has-error @endif" >
                                    @if ($errors->has('address2')) <p class="help-block">{{ $errors->first('address2') }}</p> @endif
                                    <span class="address2_error" style="color:red;float: right;margin-right: -275px;margin-top: -22px;"></span>
                                

                            </li>
                            <li class="col-md-6">
                                
                                    <input placeholder="{{trans('messages.city')}}" type="text" id="city" name="city" class="fb-input-text @if($errors->has('city')) has-error @endif" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required>
                                    @if ($errors->has('city')) <p class="help-block">{{ $errors->first('city') }}</p> @endif
                                    <span class="city_error" style="color:red;float: right;margin-right: -275px;margin-top: -22px;"></span>
                               

                            </li>

                            <li class="col-md-6">
                               
                                    <input placeholder="{{trans('messages2.postalcode')}}" type="text" id="postalcode" name="postalcode" class="fb-input-text @if($errors->has('postalcode')) has-error @endif" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required>
                                    @if ($errors->has('postalcode')) <p class="help-block">{{ $errors->first('postalcode') }}</p> @endif
                                    <span class="postalcode_error" style="color:red;float: right;margin-right: -275px;margin-top: -22px;"></span>
                               

                            </li>

                </ul>
                <ul class="fb-card-type-list">
                  <li>
                  
                    <img src="{{URL::asset('main/images/visa.png');}}" alt="visa" />
                  </li>
                  <li>
                    <img src="{{URL::asset('main/images/mastercard.png');}}" alt="visa" />
                  </li>
                  <li>
                    <img src="{{URL::asset('main/images/maestro.png');}}" alt="visa" />
                  </li>
                  <li>
                    <img src="{{URL::asset('main/images/cirrus.png');}}" alt="visa" />
                  </li>
                </ul>
              </div>
              <div class="fb-donate-form-submit-btn-wrapper">
                <a href="{{URL::to('project/detail/')}}/{{$projectdetail->id}}" class="fb-donate-cancel-btn"><span>CANCEL</span></a>
                <button type="submit" class="fb-donate-submit-btn"><i class="icon-checked"></i><p>SHOW MY SUPPORT</p></button>
              </div>
            </div>
          </form>
      </div>
    </div>
  </section>
</main>

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
<script src="{{URL::asset('main/js/bootstrap.min.js');}}"></script>
<script src="{{URL::asset('main/js/jquery-ui.min.js');}}"></script>
<script src="{{URL::asset('main/js/custom.js');}}"></script>
<script>
$(".fb-donate-submit-btn").click(function(){
    //   $('#donationSuccessModal').modal('show');
});
</script>

<script>
    function InvalidMsg(textbox) {
    var lang = $('#language').val();
    if(lang){
        if (textbox.value == '') {
            textbox.setCustomValidity('{{trans("messages2.required")}}');
        }
        else {
            textbox.setCustomValidity('');
        }
        return true;
    }
}
function InvalidCountry(textbox) {
    var lang = $('#language').val();
    if(lang){
        if (textbox.value == '') {
            textbox.setCustomValidity('{{trans("messages2.requiredcountry")}}');
        }
        else {
            textbox.setCustomValidity('');
        }
        return true;
    }
}
</script> 

<script>
$( function() {
    
   $( "select" ).selectmenu();
	$( "select#country" ).selectmenu().selectmenu( "menuWidget" )
        .addClass( "overflow" );

});
</script>   
@stop