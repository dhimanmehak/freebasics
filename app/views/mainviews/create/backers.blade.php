@extends('layouts.mainlayoutold')
@section('content')
<section>
<div class="col-md-12 text-center">

	
	 	<div class="stepwizard">
 <div class="stepwizard-row setup-panel">
   
      <div class="stepwizard-step">
        <a href="{{URL::to('project/basic')}}/{{Crypt::encrypt($projectdetails->id)}}" type="button" class="btn btn-default btn-circle">1</a>
        <p>Project Details</p>
      </div>
      <div class="stepwizard-step">
        <a href="{{URL::to('project/reward')}}/{{Crypt::encrypt($projectdetails->id)}}" type="button" class="btn btn-default btn-circle">2</a>
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
        <a href="{{URL::to('project/backers')}}/{{Crypt::encrypt($projectdetails->id)}}" type="button" class="btn btn-primary btn-circle active">6</a>
        <p>Donors</p>
      </div>
	  
	   <div class="stepwizard-step">
        <a href="{{URL::to('project/faq')}}/{{Crypt::encrypt($projectdetails->id)}}" type="button" class="btn btn-default btn-circle">7</a>
        <p>FAQ's</p>
      </div>
    </div>
	
	</div>
</div>				
				
    <div class="preview-top">
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
                    <!-- <li class="stp1">
                        <a class="a" href="{{URL::to('project/about')}}/{{Crypt::encrypt($projectdetails->id)}}" @if($aboutstatus==1)style="color:#020;font-weight: bold;"@endif><i class="fa fa-check-circle" @if($aboutstatus==1)style="color:#2bde73;"@endif></i> {{trans('messages.aboutyou')}} </a>
                    </li>
                    <li class="stp1">
                        <a class="a" href="{{URL::to('project/account')}}/{{Crypt::encrypt($projectdetails->id)}}" @if($accountstatus==1)style="color:#020;font-weight: bold;"@endif><i class="fa fa-check-circle" @if($accountstatus==1)style="color:#2bde73;"@elseif($accountstatus==2)style="color:#ffffc9;" @elseif($accountstatus==3)style="color:#fc875f;" @endif></i> {{trans('messages.account')}} </a>
                    </li> -->
                </ol>


                <ol id="" class="steps-navgiaton">
                    <li class="stp1 ">
                        <a class="a" href="{{URL::to('project/preview')}}/{{Crypt::encrypt($projectdetails->id)}}"> {{trans('messages.preview')}} </a>
                    </li>
                </ol>


                <ol id="" class="steps-navgiaton">
                    <li class="stp1">
                        <a class="a" href="{{URL::to('project/updates')}}/{{Crypt::encrypt($projectdetails->id)}}"> {{trans('messages.updates')}} </a>
                    </li>
                </ol>

                <ol id="" class="steps-navgiaton">
                    <li class="stp1 active">
                        <a class="a" href="{{URL::to('project/backers')}}/{{Crypt::encrypt($projectdetails->id)}}"> {{trans('messages.capsbackers')}} </a>
                    </li>
                </ol>
                
                 <ol id="" class="steps-navgiaton">
                    <li class="stp1">
                        <a class="a" href="{{URL::to('project/faq')}}/{{Crypt::encrypt($projectdetails->id)}}"> {{trans('messages.faq')}} </a>
                    </li>
                </ol>

            </div>

            <div class="title-lined">
                @if(Session::has('success'))
                <div class="alert-message success">
                    {{Session::get('success');}}
                </div>
                @endif
                <span>Bunch of Donors<!-- {{trans('messages.bunchofbackers')}}--></span>
                <p>{{trans('messages.spacetohavelook')}}. </p>
            </div>
            <div class="middle-containers">     
                @if($backingdetails =='[]')
                <center><h1>You can view your project donors here if your project is backed!<!-- {{trans('messages.projectbackersview')}} --></h1></center>
                @else
                <center><h1>{{trans('messages.backerswithreward')}}</h1></center>

             <div class="table-space-container">
                <table class="table-bordered table-striped table-condensed" id="tableID"> 
                    <tbody class="backerslist">
                        <tr style="font-weight: bold;">
                            <td>S.no</td>
                            <td style="width:15%">{{trans('messages.backername')}}</td>
                            <td style="width:40%">{{trans('messages.selectedreward')}}</td>
                            <td>{{trans('messages.pleadegeamount')}}</td>
                            <td style="width: 10%;">{{trans('messages.backedon')}}</td>
                            <td>{{trans('messages.sendmsg')}}</td>
                            <td>{{trans('messages.rewardstatus')}}</td>
                        </tr>
                        @foreach($backingdetails as $key=>$backing)     
                        <tr>                                                                             
                            <td style="display:none"><input type="text" value="3" name="id"></td>
                            <td>{{$key+1}}</td>
                            <td>{{$backing->firstname}} {{$backing->lastname}}</td>
                            <td class="message-desc">{{$backing->description}}</td> 
                            <td>{{$backing->pledgeamount}}</td>                        
                            <td>{{$backing->createdon}}</td>
                            <td><a class="Contact-me-popup btn-gren sendmessage" href="#" data-id='{{$backing->userid}}' data-name='{{$backing->firstname}} {{$backing->lastname}}' data-toggle="modal" data-target="#ContactModal">{{trans('messages.message')}} </a></td>
                            <td>@if($backing->status==1)
                                <form action='{{URL::to('project/postrewardstatus')}}' method='post'><input type='hidden' value='{{$backing->id}}' name='backingid'><input type='submit' value='{{trans('messages.sent')}}' class="btn-gren" ></form>
                                @else
                                <form action='{{URL::to('project/postrewardstatus')}}' method='post'><input type='hidden' value='{{$backing->id}}' name='backingid'><input type='submit' value='{{trans('messages2.notsent')}}' class="btn-gren" style="background:#D8000C"></form>
                                @endif</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                </div>
                @endif
                @if($withoutrewards!='[]')
                <center><h1>{{trans('messages.backerswithreward')}}</h1></center>
                 <div class="table-space-container">
                <table class="table-bordered table-striped table-condensed" id="tableID"> 
                    <tbody class="backerslist">
                        <tr style="font-weight: bold;">
                            <td>S.no</td>
                            <td style="width:35%">{{trans('messages.backername')}}</td>
                            <td style="width:25%">{{trans('messages.pleadegeamount')}}</td>
                            <td style="width:20%">{{trans('messages.backedon')}}</td>
                            <td style="width:25%">{{trans('messages.sendmsg')}}</td>
                        </tr>
                        @foreach($withoutrewards as $reward) 
                        <tr>
                            <td style="display:none"><input type="text" value="3" name="id"></td>
                            <td>1</td>
                            <td>{{$reward->firstname}} {{$reward->lastname}}</td>
                            <td>{{$reward->pledgeamount}}</td>                        
                            <td>{{$reward->createdon}}</td>
                            <td><a class="Contact-me-popup btn-gren sendmessage" href="#" data-id='{{$reward->userid}}' data-name='{{$reward->firstname}} {{$reward->lastname}}' data-toggle="modal" data-target="#ContactModal">{{trans('messages.message')}} </a></td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            </div>
            <ul class="alt-tools right list-inline ml1 mt2">
                <li class="mr2">
                    <i class="fa fa-close"></i>
                    <a class="inline-block py1 delete-project grey-dark h5" href="{{URL::to('project/delete');}}/{{Crypt::encrypt($projectdetails->id)}}" title="Delete this project">
                        {{trans('messages.deleteproject')}}
                    </a></li>
            </ul>
        </div>
</section>
<!-- /.forgot password container -->

@if(Session::has('email'))
<div class="modal modal-forg fade" id="ContactModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">{{trans('messages.sendmessage')}} {{trans('messages.smallto')}} <span class='user'></span></h4>
            </div> 
            <div class="modal-body">
                <span><b>{{trans('messages.to')}}:</b></span><span class='username'></span><br>
                <form class="pop-forms" style="margin-top: 20px;" method='post' action='{{URL::to('postmessage')}}' onsubmit="return validation();">
                    <input type="hidden" name="recieverid" class='userid'> 
                    <textarea name="message" rows="5" id="messagebox"></textarea>
                    <p class="help-block" id="error-block" style="display:none">{{trans('messages.messagecannotnull')}}!</p>
                    <input class="popup-btn" value="{{trans('messages.sendmessage')}}" type="submit">
                </form>
            </div> 
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@else
<div class="modal modal-forg fade" id="ContactModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">{{trans('messages.loginrequired')}}!</h4>
            </div> <!-- /.modal-header -->
            <div class="modal-body">
                <p>{{trans('messages.loginrequiredmessage')}}!</p>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endif
<style>
    .backerslist tr td{
        padding: 10px !important;
        font-size: 14px;
    }


    .backerslist tr td .btn-gren{
        margin: 10px 0 0;
        padding: 6px 10px;
    }

</style>
<script>
    $(document).on("click", ".sendmessage", function () {
        var userid = $(this).data('id');
        var name = $(this).data('name');
        $(".pop-forms .userid").val(userid);
        $(".modal-body .username").text(name);
        $(".modal-title .user").text(name);
    });

    function validation() {
        var x = document.getElementById("messagebox").value;
        if (x == '') {
            var doc = document.getElementById("error-block");
            doc.style.display = "block";
            return false;
        }
    }

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