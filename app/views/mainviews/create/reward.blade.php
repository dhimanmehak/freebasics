@extends('layouts.mainlayoutold')
@section('content')

<link href="http://eternicode.github.io/bootstrap-datepicker/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" media="screen">
<section>
    <style>
        .addMoreFields{
            border-radius: 2px;
            color: #fff;
            font-size: 14px;
            height: auto;
            line-height: 60px;
            min-height: 60px;
            padding: 7px 7px;
            background: #2bde73;
            line-height: 0px;
            min-height: 45px;
			margin-right:40px;
        }
		.addMoreFields1{
            border-radius: 2px;
            color: #fff;
            font-size: 14px;
            height: auto;
            line-height: 14px !important;
            min-height: 60px;
            padding: 7px 7px;
            background: #fb1342 none repeat scroll 0 0;
            line-height: 0px;
            min-height: 14px !important;
			text-align:center;
			float:right;
			margin-top: -1px;
margin-bottom: 7px;
margin-right: 40px;
width:82px;
        }
		.middle-lefts .addMoreFields
		{
			margin-right: 40px;
		}
        .removeFields{
            border-radius: 2px;
            color: #fff;
            font-size: 14px;
            height: auto;
            line-height: 60px;
            min-height: 60px;
            padding: 7px 7px;
            background: #999;
            line-height: 0px;
            min-height: 45px;
            margin-left: 40%;
        }

        .middle-lefts{
            float: left;
            width: 74%;
        }


        .elem_extend .middle-left {
            float: left;
            width: 100%;
        }
        .txtarea{
            width: 77%;
        }
    </style>
	<div class="col-md-12 text-center">
 @if ($projectdetails->projectverified == 2)
<div class="stepwizard">
 <div class="stepwizard-row setup-panel">
   
      <div class="stepwizard-step">
        <a href="{{URL::to('project/basic')}}/{{Crypt::encrypt($projectdetails->id)}}" type="button" class="btn btn-default btn-circle">1</a>
        <p>Project Details</p>
      </div>
      <div class="stepwizard-step">
        <a href="{{URL::to('project/reward')}}/{{Crypt::encrypt($projectdetails->id)}}" type="button" class="btn btn-primary btn-circle active">2</a>
        <p>Incentives to supporters</p>
      </div>
      <div class="stepwizard-step">
        <a href="{{URL::to('project/story')}}/{{Crypt::encrypt($projectdetails->id)}}" type="button" class="btn btn-default btn-circle">3</a>
        <p>Social Impact</p>
      </div>
	  <div class="stepwizard-step">
        <a href="{{URL::to('project/preview')}}/{{Crypt::encrypt($projectdetails->id)}}" type="button" class="btn btn-default btn-circle">4</a>
        <p>Submit</p>
      </div>
	  <div class="stepwizard-step">
        <a href="{{URL::to('project/updates')}}/{{Crypt::encrypt($projectdetails->id)}}" type="button" class="btn btn-default btn-circle">5</a>
        <p>Updates</p>
      </div>
	   <div class="stepwizard-step">
        <a href="{{URL::to('project/backers')}}/{{Crypt::encrypt($projectdetails->id)}}" type="button" class="btn btn-default btn-circle">6</a>
        <p>Donors</p>
      </div>
	  
	   <div class="stepwizard-step">
        <a href="{{URL::to('project/faq')}}/{{Crypt::encrypt($projectdetails->id)}}" type="button" class="btn btn-default btn-circle">7</a>
        <p>FAQ's</p>
      </div>
    </div>
	
	</div>
	 
	         
				
				
@else
	<div class="stepwizard">
 <div class="stepwizard-row setup-panel">
 
 
      <div class="stepwizard-step">
        <a href="#" type="button" class="btn btn-default btn-circle">1</a>
        <p>Project Type</p>
      </div>
      <div class="stepwizard-step">
        <a href="{{URL::to('project/basic')}}/{{Crypt::encrypt($projectdetails->id)}}" type="button" class="btn btn-default btn-circle">2</a>
        <p>Project Details</p>
      </div>
      <div class="stepwizard-step">
        <a href="{{URL::to('project/reward')}}/{{Crypt::encrypt($projectdetails->id)}}" type="button" class="btn btn-primary btn-circle active">3</a>
        <p>Incentives to supporters</p>
      </div>
	  <div class="stepwizard-step">
        <a href="{{URL::to('project/story')}}/{{Crypt::encrypt($projectdetails->id)}}" type="button" class="btn btn-default btn-circle">4</a>
        <p>Social Impact</p>
      </div>
	  <div class="stepwizard-step">
        <a href="{{URL::to('project/preview')}}/{{Crypt::encrypt($projectdetails->id)}}" type="button" class="btn btn-default btn-circle">5</a>
        <p>Submit</p>
      </div>
    </div>
	
	</div>
<ul class="project_circle" style="display:none;">
<li>1<span>Project Type</span></li>
  <li><a href="{{URL::to('project/basic')}}/{{Crypt::encrypt($projectdetails->id)}}">2</a><span>Project Details</span></li>
  <li   class="active"><a href="{{URL::to('project/reward')}}/{{Crypt::encrypt($projectdetails->id)}}">3</a><span>Incentives to supporters</span></li>
  <li><a href="{{URL::to('project/story')}}/{{Crypt::encrypt($projectdetails->id)}}">4</a><span>Social Impact</span></li>
  <li><a href="{{URL::to('project/preview')}}/{{Crypt::encrypt($projectdetails->id)}}">5</a><span>Submit</span></li>	
               
  
</ul> 
 @endif    
</div>

    <div class="steps">
        <div class="container">
            <div class="step-head" style="display:none;">
                <ol id="" class="steps-navgiaton">
                    <li  class="stp1 ">
                        <a class="a" href="{{URL::to('project/basic')}}/{{Crypt::encrypt($projectdetails->id)}}" @if($basicstatus==1)style=" color:#020;font-weight: bold;"@endif><i class="fa fa-check-circle" @if($basicstatus==1)style="color:#2bde73;"@endif></i> {{trans('messages.basics')}} </a>
                    </li>
                    <li class="stp1 ">
                        <a class="a" href="{{URL::to('project/reward')}}/{{Crypt::encrypt($projectdetails->id)}}" @if($rewardstatus==1)style="color:#020;font-weight: bold;"@endif><i class="fa fa-check-circle" @if($rewardstatus==1)style="color:#2bde73;"@endif></i> {{trans('messages.rewards')}} </a>
                    </li>
                    <li class="stp1">
                        <a class="a" href="{{URL::to('project/story')}}/{{Crypt::encrypt($projectdetails->id)}}" @if($storystatus==1)style="color:#020;font-weight: bold;"@endif><i class="fa fa-check-circle" @if($storystatus==1)style="color:#2bde73;"@endif></i> {{trans('messages.story')}} </a>
                    </li>
                    <!--  <li class="stp1">
                         <a class="a" href="{{URL::to('project/about')}}/{{Crypt::encrypt($projectdetails->id)}}" @if($aboutstatus==1)style="color:#020;font-weight: bold;"@endif><i class="fa fa-check-circle" @if($aboutstatus==1)style="color:#2bde73;"@endif></i> {{trans('messages.aboutyou')}} </a>
                     </li>
                     <li class="stp1">
                         <a class="a" href="{{URL::to('project/account')}}/{{Crypt::encrypt($projectdetails->id)}}" @if($accountstatus==1)style="color:#020;font-weight: bold;"@endif><i class="fa fa-check-circle" @if($accountstatus==1)style="color:#2bde73;"@elseif($accountstatus==2)style="color:#ffffc9;" @elseif($accountstatus==3)style="color:#fc875f;" @endif></i> {{trans('messages.account')}} </a>
                     </li> -->
                </ol>

                <ol id="" class="steps-navgiaton">
                    <li class="stp1">
                        <a class="a" href="{{URL::to('project/preview')}}/{{Crypt::encrypt($projectdetails->id)}}"> {{trans('messages.preview')}} </a>
                    </li>
                </ol>

                @if ($projectdetails->projectverified == 2)
                <ol id="" class="steps-navgiaton">
                    <li class="stp1">
                        <a class="a" href="{{URL::to('project/updates')}}/{{Crypt::encrypt($projectdetails->id)}}"> {{trans('messages.updates')}} </a>
                    </li>
                </ol>

                <ol id="" class="steps-navgiaton">
                    <li class="stp1">
                        <a class="a" href="{{URL::to('project/backers')}}/{{Crypt::encrypt($projectdetails->id)}}"> {{trans('messages.capsbackers')}} </a>
                    </li>
                </ol>

                <ol id="" class="steps-navgiaton">
                    <li class="stp1">
                        <a class="a" href="{{URL::to('project/faq')}}/{{Crypt::encrypt($projectdetails->id)}}"> {{trans('messages.faq')}} </a>
                    </li>
                </ol>
                @endif
            </div>

            <div class="title-lined">
                @if(Session::has('success'))
                <div class="alert-message success">
                    {{Session::get('success');}}
                </div>
                @endif
                <span>{{trans('messages.thankpeople')}}?</span>
                <p>{{trans('messages.thankpeopleinfo')}},{{trans('messages.thankpeopleinfo2')}}, {{trans('messages.thankpeopleinfo3')}} </p>
            </div>

            <div class="middle-containers" >
                <form id="form" class="coltrolg-form" method="post" action="{{URL::to('project/postreward');}}">
                    <?php $rewardcount = count($rewards); ?>
                    <input type="hidden" name="rcount" id="rcount" value="<?php echo $rewardcount; ?>">
                    <ul class="middle-left full-width" >
                        @foreach($rewards as $key=>$reward)
                        <li>
                            <label class="titl-left-side col-md-3" >{{trans('messages.reward')}} #{{$key+1}}</label>
                            <div class="col-md-9">
                                <ul class="amont-bar">
                                    <li>
                                        <h3 class="mb0" style="margin-left:2%;width: 68%; float: left;"> 
                                            {{trans('messages.pledge')}} <span style="padding-right: 2px;">{{$projectdetails->currencysymbol}}</span>{{round($reward->pledgeamount)}} {{trans('messages.ormore')}}
                                        </h3>
                                        @if($reward->backerscount==0)
                                        <a class="delete" style="float: left;" onclick="popup('{{$reward->id}}');" title="Edit this reward">
                                            <span class="fa fa-edit"></span>
                                            {{trans('messages.edit')}}
                                        </a>
                                        <a class="delete" style="float: left; margin-left: 10px;" onclick="confirmation('{{$reward->id}}')" title="Delete this update">
                                            <span class="fa fa-close"></span>
                                            {{trans('messages.delete')}}
                                        </a>
                                        @endif
                                        <div class="pldg-titl" style="width:100%;">
                                            <span class="num-backers">
                                                {{$reward->backerscount}} {{trans('messages.backers')}}
                                            </span>                                       
                                            @if($reward->islimited==1)
                                            @if($reward->quantity==$reward->backerscount)
                                            <span style='font-size: 13px; padding: 5px;  background: #000; color: #fff;'>
                                                <span class="limited-number">{{trans('messages.allgone')}}!</span>
                                            </span>                                            
                                            @else
                                            <span class="bg-yellow " style='font-size: 13px; padding: 5px;'>
                                                <span class="limited-number">{{trans('messages.limited')}} ({{$reward->quantity-$reward->backerscount}} {{trans('messages.leftof')}} {{$reward->quantity}})</span>
                                            </span>
                                            @endif
                                            @endif
                                        </div>
                                        <div class="pldg-titl" style="width:100%;">
                                            <p>{{{$reward->description}}}</p>
                                        </div>
                                        <div class="pldg-titl" style="width:100%;">
                                            <?php
                                          //  $date = explode('-', $reward->estimateddelivery);
                                          //  $delivery = date("M", mktime(0, 0, 0, $date[0])) . ' ' . $date[1];
                                            ?>
                                            <p><b>{{trans('messages.estimateddelivery')}}:</b> {{$reward->estimateddelivery}}</p>
                                        </div>                                    
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="middle-lefts full-width">     <div uniqueid="addMoreFields0.26436613842351553" fieldcount="0" maxcountreached="false" totalfieldsadded="0" class="elem_extend" id="reward" style='height: 295px;'>
                            <ul class="middle-left">

                                <input type='hidden' name='id' value='{{$id}}' >
                                <input type="hidden" value="{{Session::get('locale')}}" name="language" id="language">
                                <li>
                                    <label class="titl-left-side col-md-3" >{{trans('messages.reward')}}</label>
                                    <div class="col-md-9">
                                        <ul class="amont-bar">
                                            <li>
                                                <span class="pldg-titl">{{trans('messages.pledgeamount')}}</span>
                                                <div class="rightholdrs">
                                                    <span>{{$projectdetails->currencysymbol}}</span>
                                                    <input required="" name="pledgeamount" onkeypress="return numbersonly(event)" type="text" id="pledgeamount" class="pledge-texct" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);">  
                                                </div>
                                                <span id='pledgeamount_error' style="color:red;display:none;margin-top: 13px;">It can't Be Blank</span>  
                                            </li>

                                            <li>
                                                <span class="pldg-titl">{{trans('messages.description')}}</span>
                                                <textarea name="description" id="description" class="hide-br txtarea" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required></textarea>
                                                <span id='description_error' style="color:red;display:none;margin-top: 41px;margin-right:-80px;">It can't Be Blank</span>  
                                            </li>
                                            <li>

                                                <span class="pldg-titl">{{trans('messages.estimateddelivery')}}</span>
                                                <div class="select-left">
                                                    <input placeholder="mm-yyyy" type="text" class="estimateddelivery" id="estimateddelivery" name="estimateddelivery" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required>
                                                    <span id='estimateddelivery_error' style="color:red;display:none;margin-top: -12px;margin-left: 560px;margin-right: -122px;">It can't Be Blank</span>  
                                                </div>
                                            </li>
                                            <li>
                                                <span class="pldg-titl">{{trans('messages.limitquantity')}}</span>  
                                                <input class="limit_checkbox" name="limit" id="limit" type="checkbox" onclick="checkedcheckbox();" style="float: left;margin-left: 27px; margin-right: 20px;height: 36px;">
                                                <input name="limitcount" type="text" id="limitcount" onkeypress="return numbersonly(event)" class="pledge-texct " style="display:none;">
                                                <span id='limit_error' style="color:red;display:none;margin-top: -12px;margin-left: 560px;margin-right: -122px;">It can't Be Blank</span>  
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <div><a href="#" class="addMoreFields">Add More</a>
								</div>
                            </ul>   
 <a href="{{URL::to('project/story')}}/{{Crypt::encrypt($projectdetails->id)}}" class="addMoreFields1">Skip</a>
                        </div>
						<div class="col-md-9 col-md-offset-3" style="display:none;">
            <a href="{{URL::to('project/story')}}/{{Crypt::encrypt($projectdetails->id)}}" class="addMoreFields1">Skip</a></div>
                        <input type="hidden" name="rewardCount" id="rewardCount" value="0" >
						
						<div class="col-md-9 col-md-offset-3">
                        <ul class='middle-left' style="width: 100%;">
						
						<li class='banner-section'>
                              <a href="{{URL::to('project/basic')}}/{{Crypt::encrypt($projectdetails->id)}}" class="btns-green backMoreFields">Back</a> 
                                

                            </li>
							
							
                            <li class='banner-section'>
                                <input type="submit" class='btns-green' style='line-height: 0px; min-height: 45px;float:right;margin-right: 14px;' value="{{trans('messages.updateandcntue')}}">
                                <!--<input type="submit" class='btns-green' onclick="return supportvalidate();" style='line-height: 0px; min-height: 45px;  margin-left: 42%;' value="Update & Continue">-->

                            </li>
							
							 
							
							
                        </ul>
                        </div>
						</div>
                </form>
                <div class="middle-right">

                    <!--right side div-->

                </div>

            </div>
            <ul class="alt-tools right list-inline ml1 mt2">
                <li class="mr2">
                    <i class="fa fa-close"></i>
                    <!-- <a class="inline-block py1 delete-project grey-dark h5" href="{{URL::to('project/delete');}}/{{Crypt::encrypt($projectdetails->id)}}" title="Delete this project"> -->
					 <a class="inline-block py1 delete-project grey-dark h5" href="#" title="Delete this project" data-id="{{Crypt::encrypt($projectdetails->id)}}">
					 
                        {{trans('messages.deleteproject')}}
                    </a></li>
            </ul>
        </div>
</section>


<!--<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js" charset="UTF-8"></script>-->
<script type="text/javascript" src="http://eternicode.github.io/bootstrap-datepicker/bootstrap-datepicker/js/bootstrap-datepicker.js" charset="UTF-8"></script>
<!--<script type="text/javascript">
                                                                    var today = new Date();
                                                                    var lastDate = new Date(today.getFullYear(), today.getMonth() + 1, 0);
                                                                    $(document).ready(function() {
                                                            $(".datepicker").datepicker({
                                                            startDate: "+0d",
                                                                    format: "mm-yyyy",
                                                                    viewMode: "months",
                                                                    minViewMode: "months"

                                                            });
                                                            });</script>-->
<script> 
    
    $('.estimateddelivery').datetimepicker({
       startDate: '+1d',
        language: 'en',
        //endDate: "+60d",
        weekStart: 1,  
        format: "yyyy-mm-dd",		
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,         
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    
</script>    															

<script src="{{URL::to('admin/js/jquery.multiFieldExtender.min.js');}}"></script>
<script src="{{URL::to('admin/js/jquery.validate.min.js');}}"></script>
<script src="{{URL::to('admin/js/jquery.colorbox-min.js');}}"></script>
<link href="{{URL::to('admin/css/ui-elements.css');}}" rel="stylesheet" type="text/css">
<script>

                                                                 /*   $(document).on('focus', '.datepicker', function(){
                                                            $(this).datepicker({
                                                            startDate: "+0d",
                                                                    format: "mm-yyyy",
                                                                    viewMode: "months",
                                                                    minViewMode: "months"
                                                            });
                                                            });*/
															$(document).on('focus', '.estimateddelivery', function(){
															   $('.estimateddelivery').datetimepicker({
																	startDate: "+1d",
																	language: 'en',
																	//endDate: "+60d",
																	weekStart: 1,  
																	format: "yyyy-mm-dd",		
																	todayBtn: 1,
																	autoclose: 1,
																	todayHighlight: 1,         
																	startView: 2,
																	minView: 2,
																	forceParse: 0
																});
																});
                                                                    $(".elem_extend").EnableMultiField({
                                                            linkText: 'Add More',
                                                                    linkClass: 'addMoreFields',
                                                                    removeLinkText: 'Remove',
                                                                    removeLinkClass: 'removeFields',
                                                            });
                                                                    $('.item .delete').click(function () {

                                                            var elem = $(this).closest('.item');
                                                                    $.confirm({
                                                                    'title': 'Delete Confirmation',
                                                                            'message': 'You are about to delete this item. <br />It cannot be restored at a later time! Continue?',
                                                                            'buttons': {
                                                                            'Yes': {
                                                                            'class': 'btn_30_blue',
                                                                                    'action': function () {
                                                                                    elem.slideUp();
                                                                                    }
                                                                            },
                                                                                    'No': {
                                                                                    'class': 'btn_30_blue',
                                                                                            'action': function () {
                                                                                            }	// Nothing to do in this case. You can as well omit the action property.
                                                                                    }
                                                                            }
                                                                    });
                                                            });</script>
<script>
                    function checkedcheckbox() {
                    var x = document.getElementById("reward").getAttribute("totalfieldsadded");
                            var temp = document.getElementById("limit").checked;
                            if (temp == true) {
                    var userslist = document.getElementById("limitcount");
                            userslist.style.display = "block";
                            $('#limitcount').addClass('required');
                    } else {
                    var userslist = document.getElementById("limitcount"); userslist.style.display = "none";
                            $('#limitcount').removeClass('required');
                    }
                    for (var i = 0; i < x; i++) {
                    var temp = document.getElementById("limit_" + i).checked;
                            if (temp == true) {
                    var userslist = document.getElementById("limitcount_" + i);
                            userslist.style.display = "block";
                            $("#limitcount_" + i).addClass('required');
                    } else {
                    var userslist = document.getElementById("limitcount_" + i);
                            userslist.style.display = "none";
                            $("#limitcount_" + i).removeClass('required');
                    }
                    }
                    }

</script>
<script type="text/javascript">

            function confirmation(id) {
            var answer = confirm("Are you sure to delete this reward?")
                    if (answer) {
            location.href = 'delete/' + id;
            } else {
            return false;
            }
            }


            function popup(valID) {
            $.colorbox({href:"edit/" + valID});
            }


</script>
<script type="text/javascript">
            function numbersonly(e){
            var unicode = e.charCode? e.charCode : e.keyCode
                    if (unicode != 8){ //if the key isn't the backspace key (which we should allow)
            if (unicode < 48 || unicode > 57) //if not a number
                    return false //disable key press
            }
            }
</script>

<script type="text/javascript">
            function numbersonly(e){
            var unicode = e.charCode? e.charCode : e.keyCode
                    if (unicode != 8){ //if the key isn't the backspace key (which we should allow)
            if (unicode < 48 || unicode > 57) //if not a number
                    return false //disable key press
            }
            }
</script>

<script>
            /*   $('#form').data('serialize', $('#form').serialize()); // On load save form current state
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
            var formdata = $('#form').serialize();
                    $('.a').on('click', function()  {
            if (formdata != $('#form').serialize()) {
            if (window.onbeforeunload = function() {
            var confirmationMessage = 'It looks like you have been editing something.';
                    confirmationMessage += 'If you leave before saving, your changes will be lost.';
                    return confirmationMessage;
            });
            }
            });
            });
                    $('form').submit(function () {
            window.onbeforeunload = null;
            });</script>
<style>
    .error {
        border: 1px solid red !important;
    }
    label.error  { 
        display:none !important; 
    }
    .ast {
        color: red !important;
        padding:5px;
    }
</style>
<script>

                    /*
                     //Using onclick validation
                     function supportvalidate() {
                     var rcount = $('#rcount').val();
                     if (rcount != 0) {
                     return true;
                     } else {
                     var amountvalue = $('#pledgeamount').val();
                     var descriptionval = $('#description').val();
                     var estimateddelivery = $('#estimateddelivery').val();
                     if (amountvalue == '') {
                     $('#pledgeamount_error').css('display','block');
                     $('html, body').animate({
                     scrollTop: $("#pledgeamount").offset().top}, 2000);
                     return false;
                     } else if (descriptionval == '') {
                     $('#description_error').css('display','block');
                     $('#pledgeamount_error').css('display','none');
                     $('#description').addClass('error');
                     $('html, body').animate({
                     scrollTop: $("#description").offset().top}, 2000);
                     return false;
                     } else if(estimateddelivery == '') {
                     $('#estimateddelivery_error').css('display','block');
                     $('#description_error').css('display','none');
                     $('html, body').animate({
                     scrollTop: $("#estimateddelivery").offset().top}, 2000);
                     return false;
                     }else{
                     return true;
                     }
                     }
                     }
                     */
</script>
<script type = "text/javascript" >
                    history.pushState(null, null, '');
                    window.addEventListener('popstate', function(event) {
                    history.pushState(null, null, '');
                    });</script>
<script type = "text/javascript" >
                    $("#limitcount").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
            }

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
}$('a.delete-project').click(function(e){
	var id=$(this).attr('data-id');
	
	var r=confirm("Are you sure want to delete this project?");
	if(r == 1)
	{
		window.location.href="{{URL::to('project/postdelete');}}/"+id;
	}
	else
	{
		return false;
	}
	
});


</script>

@stop
