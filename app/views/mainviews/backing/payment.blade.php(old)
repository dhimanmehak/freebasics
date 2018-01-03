@extends('layouts.mainlayout')
@section('content') 

<section style="margin-bottom:5%;">
    <div class="payment-page1">
        <div class="container">
            <h2 class="top-healin">{{{$projectdetail->title}}}</h2>

            <span class="end-tags">by {{{$projectdetail->firstname}}} {{{$projectdetail->lastname}}}</span>

            <div class="alrighty-div">
                @if(Session::has('failed'))
                <div class="alert-message error">
                    {{Session::get('failed');}}
                </div>
                @endif
                <div class="col-sm-8">
                    <span class="green-text">{{trans('messages2.paymentinformation')}}</span>
                    <span class="pledge-text">{{trans('messages2.cardwillnotbecharged')}} {{$projectdetail->currencysymbol}}{{$pledgeamount}} {{trans('messages2.whentheprojectends')}}. </span>


                    <h3 class="rewd-text">{{trans('messages2.cardinformation')}} </h3>
                    <form action="{{URL::to('poststripepayment')}}" method="post" name="form">
                        <ul class="card-area">
                            <input type="hidden" name="projectid" value="{{$projectdetail->id}}">
                            <input type="hidden" name="rewardid" value="{{$rewardid}}">
                            <input type="hidden" name="userid" value="{{$userid}}">
                            <input type="hidden" name="pledgeamount" value="{{$pledgeamount}}">
                            <input type="hidden" value="{{Session::get('locale')}}" name="language" id="language">
                            <li>
                                <span class="col-md-2 name-holder">{{trans('messages.name')}} <i>*</i></span>
                                <div class="ip-holder col-md-10">
                                    <input placeholder="{{trans('messages.name')}}" type="text" id="name" name="name" class="@if($errors->has('name')) has-error @endif" style="text-transform: uppercase;" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required>
                                    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                                    <span class="name_error" style="color:red;float: right;margin-right: -275px;margin-top: -22px;"></span>
                                </div>

                            </li>

                            <li>
                                <span class="col-md-2 name-holder">{{trans('messages2.cardnumber')}}<i>*</i/></span>
                                <div class="ip-holder col-md-10">
                                    <input class="wid-67 @if($errors->has('cardnumber')) has-error @endif" placeholder="{{trans('messages2.cardnumber')}}" type="text" name="cardnumber" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required>
                                    @if ($errors->has('cardnumber')) <p class="help-block">{{ $errors->first('cardnumber') }}</p> @endif
                                    <span class="cardnumber_error" style="color:red;margin-top: -22px;"></span>
                                </div>

                            </li>

                            <li>
                                <span class="col-md-2 name-holder">{{trans('messages2.expiration')}} <i>*</i/></span>
                                <div class="ip-holder col-md-10">
                                    <select name="month" oninvalid="InvalidCountry(this);" oninput="InvalidCountry(this);" required="">
                                        <option value="">--{{trans('messages2.month')}}--</option>
                                        <?php for ($m = 1; $m <= 12; $m++) { ?>
                                            <option value="{{sprintf("%02d", $m);}}" >{{sprintf("%02d", $m);}}</option>
                                        <?php } ?>
                                    </select>

                                    <select name="year" oninvalid="InvalidCountry(this);" oninput="InvalidCountry(this);" required="">
                                        <option value="">--{{trans('messages2.year')}}--</option>
                                        <?php
                                        $currentdate = date('Y');
                                        for ($i = $currentdate; $i < $currentdate + 20; $i++) {
                                            ?>
                                            <option value='{{$i}}'>{{$i}}</option>
                                        <?php } ?>  
                                    </select>

                                    <div class="cvn">
                                        <span>CVN <i>*</i/></span>
                                        <input class="cvn-ip @if($errors->has('cvv')) has-error @endif" placeholder="CVN" name="cvv" id="cvv" type="password" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required="">
                                        @if ($errors->has('cvv')) <p class="help-block">{{ $errors->first('cvv') }}</p> @endif
                                    </div>
                                </div>
                            </li>

                        </ul>

                        <h3 class="rewd-text">{{trans('messages2.billingaddress')}}</h3>

                        <ul class="card-area">
                            <li>
                                <span class="col-md-2 name-holder">{{trans('messages.country')}} <i>*</i/></span>
                                <div class="ip-holder col-md-10">

                                    {{ Form::select('country',array(trans('messages.country')) + $countries->lists('countryname', 'countryname'), 'default', array('class' => 'cnt-selct','required'=>'true' ,'id' => '', Input::old('country'))) }}
                                    <span class="country_error" style="color:red;float: right;margin-right: -275px;margin-top: -22px;"></span>    
                                </div>

                            </li>

                            <li>
                                <span class="col-md-2 name-holder">{{trans('messages.address')}} 1 <i>*</i/></span>
                                <div class="ip-holder col-md-10">
                                    <input placeholder="{{trans('messages.address')}} 1" type="text" name="address1" class="@if($errors->has('address1')) has-error @endif" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required>
                                    @if ($errors->has('address1')) <p class="help-block">{{ $errors->first('address1') }}</p> @endif
                                    <span class="address1_error" style="color:red;float: right;margin-right: -275px;margin-top: -22px;"></span>
                                </div>

                            </li>


                            <li>
                                <span class="col-md-2 name-holder">{{trans('messages.address')}} 2</span>
                                <div class="ip-holder col-md-10">
                                    <input placeholder="{{trans('messages.address')}} 2" type="text" name="address2" class="@if($errors->has('address2')) has-error @endif" >
                                    @if ($errors->has('address2')) <p class="help-block">{{ $errors->first('address2') }}</p> @endif
                                    <span class="address2_error" style="color:red;float: right;margin-right: -275px;margin-top: -22px;"></span>
                                </div>

                            </li>


                            <li>
                                <span class="col-md-2 name-holder">{{trans('messages.city')}} <i>*</i/></span>
                                <div class="ip-holder col-md-10">
                                    <input placeholder="{{trans('messages.city')}}" type="text" id="city" name="city" class="@if($errors->has('city')) has-error @endif" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required>
                                    @if ($errors->has('city')) <p class="help-block">{{ $errors->first('city') }}</p> @endif
                                    <span class="city_error" style="color:red;float: right;margin-right: -275px;margin-top: -22px;"></span>
                                </div>

                            </li>

                            <li>
                                <span class="col-md-2 name-holder">{{trans('messages2.postalcode')}} <i>*</i/></span>
                                <div class="ip-holder col-md-10">
                                    <input placeholder="{{trans('messages2.postalcode')}}" type="text" id="postalcode" name="postalcode" class="@if($errors->has('postalcode')) has-error @endif" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required>
                                    @if ($errors->has('postalcode')) <p class="help-block">{{ $errors->first('postalcode') }}</p> @endif
                                    <span class="postalcode_error" style="color:red;float: right;margin-right: -275px;margin-top: -22px;"></span>
                                </div>

                            </li>

                        </ul>

                        <div class="botm-btns">
                            <input class="pledgebtn" value="{{trans('messages.pledge')}}" type="submit">
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>
</section>


<script type="text/javascript">
    $(document).ready(function () {
        $('#postalcode').keypress(function (evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            if ((charCode > 31 && charCode < 48) || (charCode > 57 && charCode < 65) || (charCode > 90 && charCode < 97) || (charCode > 122))
                return false;
            return true;
        });

        $('#city').keypress(function (evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;

            if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)) {
                return true;
            } else {
                return false;
            }
        });

        $("#cvv").keypress(function (e) {
             if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
            if ($("#cvv").val() > 999) {
                return false;
            }
        });
    });
//    $('.pledgebtn').click(function () {
//        var name = document.form.name.value;
//        var city = document.form.city.value;
//        var postalcode = document.form.postalcode.value;
//        var cardnumber = document.form.cardnumber.value;
//        var country = document.form.country.value;
//        var address1 = document.form.address1.value;
//        var address2 = document.form.address2.value;
//        var nameformat = /^[a-zA-Z ]*$/;
//        var alphanumericformat = /^[a-zA-Z0-9_-]*$/;
        /* name */
//        if (name == "") {
//            $('.name_error').html("This field is required");
//        } else if (!nameformat.test(name)) {
//            $('.name_error').html("Name should accept only alphabets");
//        } else {
//            $('.name_error').hide();
//        }
//
//        /* cardnumber */
//        if (cardnumber == "") {
//            $('.cardnumber_error').html("This field is required");
//        } else {
//            $('.cardnumber_error').hide();
//        }
//
//        /* address1 */
//        if (country == 'default') {
//            $('.country_error').html("This field is required");
//        } else {
//            $('.country_error').hide();
//        }
//
//        /* address1 */
//        if (address1 == "") {
//            $('.address1_error').html("This field is required");
//        } else {
//            $('.address1_error').hide();
//        }

//        /*city */
//       if (!nameformat.test(city)) {
//            $('.city_error').html("City should accept only alphabets");
//        } else {
//            $('.city_error').hide();
//        }
//
//        /*postal code */
//       if (!alphanumericformat.test(postalcode)) {
//            $('.postalcode_error').html("Postalcode should accept only alphanumerics");
//        } else {
//            $('.postalcode_error').hide();
//        }
//
//
//    });

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
@stop