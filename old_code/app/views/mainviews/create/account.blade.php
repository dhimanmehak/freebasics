@extends('layouts.mainlayout')
@section('content')
<section>
    <div class="steps steps-5">
        <div class="container">
            <div class="step-head">
                <ol id="" class="steps-navgiaton">
                    <li  class="stp1 ">
                        <a class="a" href="{{URL::to('project/basic')}}/{{$projectdetails->id}}" @if($basicstatus==1)style=" color:#020;font-weight: bold;"@endif><i class="fa fa-check-circle" @if($basicstatus==1)style="color:#2bde73;"@endif></i> {{trans('messages.basics')}} </a>
                    </li>
                    <li class="stp1 ">
                        <a class="a" href="{{URL::to('project/reward')}}/{{$projectdetails->id}}" @if($rewardstatus==1)style="color:#020;font-weight: bold;"@endif><i class="fa fa-check-circle" @if($rewardstatus==1)style="color:#2bde73;"@endif></i> {{trans('messages.rewards')}} </a>
                    </li>
                    <li class="stp1">
                        <a class="a" href="{{URL::to('project/story')}}/{{$projectdetails->id}}" @if($storystatus==1)style="color:#020;font-weight: bold;"@endif><i class="fa fa-check-circle" @if($storystatus==1)style="color:#2bde73;"@endif></i> {{trans('messages.story')}} </a>
                    </li>
                    <li class="stp1">
                        <a class="a" href="{{URL::to('project/about')}}/{{$projectdetails->id}}" @if($aboutstatus==1)style="color:#020;font-weight: bold;"@endif><i class="fa fa-check-circle" @if($aboutstatus==1)style="color:#2bde73;"@endif></i> {{trans('messages.aboutyou')}} </a>
                    </li>
                    <li class="stp1">
                        <a class="a" href="{{URL::to('project/account')}}/{{$projectdetails->id}}" @if($accountstatus==1)style="color:#020;font-weight: bold;"@endif><i class="fa fa-check-circle" @if($accountstatus==1)style="color:#2bde73;"@elseif($accountstatus==2)style="color:#ffffc9;" @elseif($accountstatus==3)style="color:#fc875f;" @endif></i> {{trans('messages.account')}} </a>
                    </li>
                </ol>
                <ol id="" class="steps-navgiaton">
                    <li class="stp1">
                        <a class="a" href="{{URL::to('project/preview')}}/{{$projectdetails->id}}"> {{trans('messages.preview')}} </a>
                    </li>
                </ol>

                <ol id="" class="steps-navgiaton">
                    <li class="stp1">
                        <a class="a" href="{{URL::to('project/updates')}}/{{$projectdetails->id}}"> {{trans('messages.updates')}} </a>
                    </li>
                </ol>

                <ol id="" class="steps-navgiaton">
                    <li class="stp1">
                        <a class="a" href="{{URL::to('project/backers')}}/{{$projectdetails->id}}"> {{trans('messages.capsbackers')}} </a>
                    </li>
                </ol>

                <ol id="" class="steps-navgiaton">
                    <li class="stp1">
                        <a class="a" href="{{URL::to('project/faq')}}/{{$projectdetails->id}}"> {{trans('messages.faq')}} </a>
                    </li>
                </ol>


            </div>

            <div class="title-lined">
                @if(Session::has('success'))
                <div class="alert-message success">
                    {{Session::get('success');}}
                </div>
                @endif
                <span>{{trans('messages.somehousekeeping')}}.</span>
                <p>{{trans('messages.getaccountverified')}}.</p>
            </div>
 <?php //fadminremarksecho "<pre>";print_r($projectdetails);"</pre>";exit; ?>
            <div class="middle-containers">
                <ul class="middle-left">
                    <li>
                        <label class="titl-left-side col-md-3" >{{trans('messages.contactdetails')}}</label>

                        <div class="col-md-9">
                            <form action="{{URL::to('project/sendverification')}}" method="post" id="form">
                                <ul class="amont-bar verrify">
                                    @if($userdetails->emailstatus==1)
                                    <li style="background:#def7e0">
                                        <span class="pldg-titl" style="background:#def7e0">{{trans('messages.email')}}</span>
                                        <div class="phone-veri-cont" style="text-transform: none !important;">
                                            <ul>
                                                <li><input type="text" style="width:100%;" name="email" value="{{$email}}" readonly><span class="fa fa-check-circle" style="float: right;margin-top: -22px;margin-right: 20px;color: #2bde73;"></span></li>
                                            </ul>
                                        </div>
                                    </li>

                                    @else
                                    <li>
                                        <span class="pldg-titl">{{trans('messages.email')}}</span>
                                        <div class="phone-veri-cont" style="text-transform: none !important;">
                                            <ul>
                                                <li><input type="text" style="width:100%;" name="email" value="{{$email}}" readonly></li>
                                                <li> <p style=" color: #666; line-height: 1.3; font-size: 12px; margin-top: 10px; margin-left: 5px;">{{trans('messages.verifyemailinfo')}}</p></li>
                                                <li><input type="submit" value="{{trans('messages.sendverificationemail')}}" style="background: none repeat scroll 0 0 #2bde73;  border-radius: 3px;  color: #fff;  float: left;  font-size: 14px;  margin: 5px 0;  padding: 7px 11px;"></li>
                                            </ul>

                                        </div>
                                    </li>
                                    @endif
                                </ul>
                            </form>

                            <ul class="amont-bar verrify">
                                @if($userdetails->mobile!='')
                                <li style="background:#def7e0">
                                    <span class="pldg-titl" style="background:#def7e0">{{trans('messages.mobile')}}</span>
                                    <div class="phone-veri-cont" style="text-transform: none !important;">
                                        <ul>
                                            <li><input type="text" style="width:100%;" name="mobile" value="{{$userdetails->mobile}}" readonly><span class="fa fa-check-circle" style="float: right;margin-top: -22px;margin-right: 20px;color: #2bde73;"></span></li>
                                        </ul>
                                    </div>
                                </li>
                                @else
                                <li>
                                    <span class="pldg-titl">{{trans('messages.phone')}}</span>
                                    <div class="phone-veri-cont">
                                        <form method="post" action="{{URL::to('project/savemobile');}}">
                                            <ul>                                              
                                                <li><select name="countrycode" required="">
                                                        <option value="">-- Select country code --</option>
                                                        @foreach($countries as $country)
                                                        <option value="{{$country->countrymobilecode}}">{{$country->countryname}} ({{$country->countrymobilecode}})</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="text" name="mobile" required>
                                                </li>
                                                <li><input type="radio" name="verifyvia" required=""><span> {{trans('messages.verifyviatext')}} </span></li>
                                                <li><input type="radio" name="verifyvia" required=""><span> {{trans('messages.verifyviacall')}} </span></li>
                                                <li><input type="submit" style="background: none repeat scroll 0 0 #2bde73;  border-radius: 3px;  color: #fff;  float: left;  font-size: 14px;  margin: 5px 0;  padding: 7px 11px;" value="{{trans('messages.startverification')}}"></li>
                                                <li><p>{{trans('messages.callinfo')}}</p></li>
                                            </ul>
                                        </form>
                                    </div>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                    @if(($projectdetails->idverified)==0)
                    <li>
                        <label style="margin:0" class="titl-left-side col-md-3" >{{trans('messages.identityverification')}}</label>
                        <div class="right-acont col-md-9">
                            <p>{{trans('messages.verifyidentityinfo')}}</p>
                            <p>
                                <b>{{trans('messages.note')}}:</b> {{trans('messages.noteinfo')}}
                            </p>
                            <ul class="amont-bar verrify">
                                <li>
                                    <span class="pldg-titl">{{trans('messages.verifiedas')}}</span>
                                    <input class="Email-texct" type="text" name="name" value="{{$projectdetails->firstname}} {{$projectdetails->lastname}}" readonly="">
                                    <i class="fa fa-check-circle gen"></i>
                                </li>
                            </ul>
                            <form method="post" action="{{URL::to('project/postidentity')}}" onsubmit="return clicksubmit();">

                                <input type="hidden" value="{{$projectdetails->id}}" name="id">
                                <ul class="amont-bar verrify vieaddres-file">
                                    <li>
                                        <span class="pldg-titl">{{trans('messages.homeaddress')}}</span>
                                        <input placeholder="{{trans('messages.address')}} 1" class="Email-texct" type="text" name="address1" value="{{ Input::old('address1') }}">
                                    </li>
                                    <li>                                       
                                        <div class="right-addes">                                           
                                            <input placeholder="{{trans('messages.address')}} 2 (optional)" class="Email-texct" type="text" name="address2" value="{{ Input::old('address2') }}">
                                            <input placeholder="{{trans('messages.city')}}" class="Email-texct" type="text" name="city" value="{{ Input::old('city') }}">
                                            <input placeholder="{{trans('messages.state')}}" class="Email-texct" type="text" name="state" value="{{ Input::old('state') }}">
                                            <input placeholder="{{trans('messages.zipcode')}}" class="zip" type="text" name="zipcode" value="{{ Input::old('zipcode') }}">
                                            <select name="country">
                                                <option value="{{ Input::old('country') }}">{{trans('messages.selectcountry')}}</option>
                                                @foreach($countries as $country)<option value="{{$country->countryname}}">{{$country->countryname}}</option>@endforeach
                                            </select>
                                        </div>
                                    </li>
                                </ul>
                                @if ($errors->has('address1')) <p class="help-block">{{ $errors->first('address1') }}</p> @endif
                                @if ($errors->has('address2')) <p class="help-block">{{ $errors->first('address2') }}</p> @endif
                                @if ($errors->has('city')) <p class="help-block">{{ $errors->first('city') }}</p> @endif
                                @if ($errors->has('state')) <p class="help-block">{{ $errors->first('state') }}</p> @endif 
                                @if ($errors->has('zipcode'))  <p class="help-block">{{ $errors->first('zipcode') }}</p> @endif
                                @if ($errors->has('country'))  <p class="help-block">{{ $errors->first('country') }}</p> @endif

                                <h5 class="fun-head">{{trans('messages.fundsrecipient')}}</h5>
                                <div class="right-addes ful-r">                                    
                                    <div class="top-date top-date2">
                                        <label class="option_label" for="duration_duration">
                                            <input id="duration_duration" name="recipient" class="radio" type="radio" value="individual"  onclick="myFunction('individual')">
                                            <strong>{{trans('messages.individual')}} </strong>
                                        </label>
                                    </div>

                                    <div class="top-date top-date2">
                                        <label class="option_label" for="duration_duration">
                                            <input name="recipient" class="radio" type="radio" value="organization" id="organisation_radio"  onclick="myFunction('organization')">
                                            <strong>{{trans('messages.legalentity')}} </strong>
                                        </label>
                                        <div id="organisation_block" style="display: none;margin-top:20px;">
                                            <ol>
                                                <li style="margin-left: 6px;margin-top: 15px;">
                                                    <label class="label-ordinary" for="account_business_type" style="padding:10px;">{{trans('messages.businesstype')}}</label>
                                                    <div class="px1 pb1 clearfix"><select class="select" id="account_business_type" name="business_type" style="width: 100%;"><option value="sole_prop">Sole Proprietorship</option>
                                                            <option value="corporation">Corporation</option>
                                                            <option value="non profit">Nonprofit</option>
                                                            <option value="partnership">Partnership</option>
                                                            <option value="llc">LLC</option></select></div>
                                                </li>
                                                <li style="margin-left: 6px;">
                                                    <label class="label-ordinary" for="account_business_name" style="padding:10px;">{{trans('messages.businessname')}}</label>
                                                    <div class="px1 pb1 clearfix"><input class="optional required_business text" id="business_name" name="business_name" type="text" style="width: 100%;"></div>
                                                </li>
                                                <p class="help-block" style="display:none" id="show_businessname">Business name field required.</p>
                                            </ol>
                                        </div>
                                    </div>
                                    @if ($errors->has('recipient'))  <p class="help-block">{{ $errors->first('recipient') }}</p> @endif
                                </div>
                                <h5 class="fun-head">{{trans('messages.paypalaccount')}}</h5>
                                <div class="right-addes ful-r">    
                                    <div class="top-date top-date2">
                                        <label class="option_label" for="duration_duration">
                                            <span class="rout-numb">{{trans('messages.paypalemail')}}</span>
                                            <div class="chr-ful-wapr-sel">
                                                <input type="text" name="paypal_email" value="{{ Input::old('paypal_email') }}">
                                            </div>
                                        </label>
                                    </div>
                                    @if ($errors->has('paypal_email'))  <p class="help-block">{{ $errors->first('paypal_email') }}</p> @endif
                                    <input class="btn btn--blue submit" type="submit" value="Submit" name="commit">
                                </div>
                            </form>
                        </div>
                    </li>
                    @elseif(($projectdetails->proofverified)==0)
                    <form action="{{URL::to('project/postproof')}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="{{$projectdetails->id}}" name="id">
                        <li>
                            <label style="margin:0" class="titl-left-side col-md-3" >{{trans('messages.identityproofverification')}}</label>
                            <div class="right-acont col-md-9">
                                <p>
                                    {{trans('messages.identityproofinfo')}}.
                                </p>                           
                                <ul class="amont-bar verrify">
                                    <li>
                                        <span class="pldg-titl">{{trans('messages.prooftype')}}</span>
                                        <div class="phone-veri-cont" style="text-transform: none !important;">
                                            <select name="prooftype">
                                                <option value="">{{trans('messages.selectprooftype')}}</option>
                                                <option value="driving license">Driving license</option>
                                                <option value="voter id">Voter id</option>
                                                <option value="passport">Passport</option>
                                            </select>
                                            @if ($errors->has('prooftype')) <p class="help-block">{{ $errors->first('prooftype') }}</p> @endif
                                        </div>
                                    </li>
                                </ul>
                                <ul class="amont-bar verrify">
                                    <li>
                                        <span class="pldg-titl">{{trans('messages.uploadidproof')}}</span>
                                        <div class="phone-veri-cont" style="text-transform: none !important;">
                                            <ul>
                                                <li><input type="file" style="width:100%;" name="identityproof"></li>
                                            </ul>
                                            @if ($errors->has('identityproof')) <p class="help-block">{{ $errors->first('identityproof') }}</p> @endif
                                        </div>
                                    </li>
                                </ul>
                                <input class="btn btn--blue submit" type="submit" value="Submit" name="commit">
                            </div>
                        </li>
                    </form>
                    @elseif(((($projectdetails->idverified)==1)&&(($projectdetails->proofverified)==1))||((($projectdetails->idverified)==2)&&(($projectdetails->proofverified)==1))||((($projectdetails->idverified)==1)&&(($projectdetails->proofverified)==2)))
                    <li>
                        <label class="titl-left-side col-md-3">{{trans('messages.identityverification')}}</label>   
                        <div class="right-acont col-md-9">

                            <ul class="amont-bar verrify" style="background:#ffffc9">
                                <p style="padding-top: 10px; text-align: center;">
                                    {{trans('messages.idproofverificationpending')}}
                                </p> 
                            </ul>
                        </div>
                    </li>
                    @elseif((($projectdetails->idverified)==2)&&(($projectdetails->proofverified)==2))
                    <li>
                        <label class="titl-left-side col-md-3">{{trans('messages.identityverification')}}</label>   
                        <div class="right-acont col-md-9">

                            <ul class="amont-bar verrify" style="background:#def7e0">
                                <p style="padding-top: 10px; text-align: center;">
                                    {{trans('messages.idproofsuccess')}}
                                </p> 
                            </ul>
                        </div>
                    </li>
                    @if(Config::get('adminconfig.listingfee')!=0)

                    @if($projectdetails->feerecieved==1)
                    <li>
                        <label class="titl-left-side col-md-3">{{trans('messages.payment')}}</label>   
                        <div class="right-acont col-md-9">
                            <ul class="amont-bar verrify" style="background:#def7e0">
                                <p style="padding-top: 10px; text-align: center;">
                                    {{trans('messages.paymentsuccess')}}!
                                </p> 
                            </ul>
                        </div>
                    </li>
					<?php if($projectdetails->remarks != '') { ?>
					<li>
                        <label class="titl-left-side col-md-3">{{trans('messages.adminremarks')}}</label>   
                        <div class="right-acont col-md-9">
                            <ul class="amont-bar verrify" style="background:#def7e0">
                                <p style="padding-top: 10px; text-align: center;">
                                    <?php echo $projectdetails->remarks; ?>
                                </p> 
                            </ul>
                        </div>
                    </li>
				<?php } ?>
                    @else
                    <li>
                        <label class="titl-left-side col-md-3">{{trans('messages.payment')}}</label>   
                        <div class="right-acont col-md-9">
                            <span style="margin-left: 30%;font-weight: bold;">{{trans('messages.pay')}} $ {{Config::get('adminconfig.listingfee')}} {{trans('messages.makelive')}}</span>
                            <p style="text-align: center;">
                            <form method='post' action='{{URL::to('pay_via_paypal')}}' style='text-align: center;'>
                                <input type='hidden' name='projectid' value='{{$projectdetails->id}}'>
                                <input type='hidden' name='title' value='{{$projectdetails->title}}'>
                                <input type='hidden' name='currencytype' value="USD">
                                <input type='hidden' name='listingfee' value='{{Config::get('adminconfig.listingfee')}}'>
                                <input class="gru-btns" type='submit' value='Pay Now'>
                            </form>
                            </p> 
                        </div>
                    </li>
                    <center>{{trans('messages.or')}}</center>
                    <div class="memebr-package">
                        @foreach($packages as $package)
                        <div class="col-xs-6 col-sm-6 col-md-4">
                            <div class="panel price panel-green">
                                <div class="panel-heading arrow_box text-center">
                                    <h3>{{$package->packagename}}</h3> 
                                    <i class="fa fa-cube"></i>
                                </div>
                                <div class="panel-body text-center">
                                    <p class="lead" style="font-size:30px"><strong>${{$package->price}}/{{$package->duration}}</strong></p>
                                </div>
                                <ul class="list-group list-group-flush text-center">
                                    <li class="list-group-item">{{$package->features}}</li>
                                </ul>
                                <div class="panel-footer">
                                    <form method="post" action="{{URL::to('member_paypal')}}">
                                        <input type="hidden" name="package" value="{{$package->id}}">
                                        <input type="hidden" name="packagename" value="{{$package->packagename}}">
                                        <input type='hidden' name='projectid' value='{{$projectdetails->id}}'>
                                        <input type='hidden' name='userid' value='{{$projectdetails->userid}}'>
                                        <input type='hidden' name='currencytype' value="USD">
                                        <input type="hidden" value="{{$package->price}}" name="membershipfee"> 
                                        <input type="submit" class="btn btn-lg btn-block btn-success" value="BUY NOW!"> 
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif    
                    @endif
                    @else
                    <li>
                        <label class="titl-left-side col-md-3">{{trans('messages.identityverification')}}</label>   
                        <div class="right-acont col-md-9">
                            <ul class="amont-bar verrify" style="background:#fc875f">
                                <p style="padding-top: 10px; text-align: center;">
                                    {{trans('messages.idprooffailed')}}
                                </p> 
                            </ul>
                        </div>
                    </li>
					<?php if($projectdetails->remarks != '') { ?>
					<li>
                        <label class="titl-left-side col-md-3">{{trans('messages.adminremarks')}}</label>   
                        <div class="right-acont col-md-9">
                            <ul class="amont-bar verrify" style="background:#fc875f">
                                <p style="padding-top: 10px; text-align: center;">
                                    <?php echo $projectdetails->remarks; ?>
                                </p> 
                            </ul>
                        </div>
                    </li>
				<?php } ?>
                    @endif
                </ul>
                <div class="middle-right">

                    <li id="step-2-sidebar-help" class="panel" style="display: list-item;">

                        <h5>{{trans('messages.eligibilityreq')}}</h5>
                        <p> {{trans('messages.eligibilityreqinfo')}} </p>

                        <ul><li> {{trans('messages.eligibilityreq1')}} </li>
                            <li> {{trans('messages.eligibilityreq2')}} </li>
                            <li> {{trans('messages.eligibilityreq3')}} </li>
                            <li> {{trans('messages.eligibilityreq4')}} </li>
                        </ul>
                    </li>
                </div>
            </div>
            <ul class="alt-tools right list-inline ml1 mt2">
                <li class="mr2">
                    <i class="fa fa-close"></i>
                    <a class="inline-block py1 delete-project grey-dark h5" href="{{URL::to('project/delete');}}/{{$projectdetails->id}}" title="Delete this project">
                        {{trans('messages.deleteproject')}}
                    </a></li>
            </ul>
        </div>
</section>
<script>
    function myFunction(result) {
        if (result == "organization") {
            var org = document.getElementById("organisation_block");
            org.style.display = "block";
        } else {
            var org = document.getElementById("organisation_block");
            org.style.display = "none";
        }
    }

    function clicksubmit() {
        var org = document.getElementById("organisation_radio");
        if (org.checked) {
            var name = document.getElementById("business_name").value;
            if (name == "") {
                var org = document.getElementById("show_businessname");
                org.style.display = "block";
                return false;
            } else {
                var org = document.getElementById("show_businessname");
                org.style.display = "none";
                return true;
            }
        }
    }
</script>

<script>
  /*  $('#form').data('serialize', $('#form').serialize()); // On load save form current state
    var confirmationMessage = 'It looks like you have been editing something.';
    confirmationMessage += 'If you leave before saving, your changes will be lost.';
    $(window).bind('beforeunload', function (e) {
        if ($('#form').serialize() != $('#form').data('serialize'))
            return confirmationMessage;
        else
            e = null; // i.e; if form state change show warning box, else don't show it.
    });*/
</script>
<script>
$(document).ready(function() {
	var formdata	=  $('#form').serialize();
  $('.a').on('click', function()  {
  	if (formdata!= $('#form').serialize()) {
			if(window.onbeforeunload = function() { 
		   		 var confirmationMessage = 'It looks like you have been editing something.';
		       	 confirmationMessage += 'If you leave before saving, your changes will be lost.';
		   		 return confirmationMessage; 
	        });
	}
  });
 });
 $('form').submit(function () {
    	window.onbeforeunload = null;
	});
</script>

@stop