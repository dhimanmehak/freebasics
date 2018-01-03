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
        <a href="{{URL::to('project/backers')}}/{{Crypt::encrypt($projectdetails->id)}}" type="button" class="btn btn-default btn-circle">6</a>
        <p>Donors</p>
      </div>
	  
	   <div class="stepwizard-step">
        <a href="{{URL::to('project/faq')}}/{{Crypt::encrypt($projectdetails->id)}}" type="button" class="btn btn-primary btn-circle active">7</a>
        <p>FAQ's</p>
      </div>
    </div>
	
	</div>
	 
	 
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
                <ol id="" class="steps-navgiaton">
                    <li class="stp1 ">
                        <a class="a" href="{{URL::to('project/updates')}}/{{Crypt::encrypt($projectdetails->id)}}"> {{trans('messages.updates')}} </a>
                    </li>
                </ol>

                <ol id="" class="steps-navgiaton">
                    <li class="stp1">
                        <a class="a" href="{{URL::to('project/backers')}}/{{Crypt::encrypt($projectdetails->id)}}"> {{trans('messages.capsbackers')}} </a>
                    </li>
                </ol>

                <ol id="" class="steps-navgiaton">
                    <li class="stp1 active">
                        <a class="a" href="{{URL::to('project/faq')}}/{{Crypt::encrypt($projectdetails->id)}}"> {{trans('messages.faq')}} </a>
                    </li>
                </ol>

            </div>
            <div class="title-lined">
				@if(Session::has('exist'))
                <div class="alert-message error">
                    {{Session::get('exist');}}
                </div>
                @endif
				
                @if(Session::has('success'))
                <div class="alert-message success">
                    {{Session::get('success');}}
                </div>
                @endif
				
                <span>{{trans('messages.postyourfaqs')}}</span>
                <p>{{trans('messages.postyourfaqsinfo')}} </p>
            </div>
			
            <div class="middle-containers">
			 <form method="post" id="form" action="{{URL::to('project/postfaq')}}" enctype="multipart/form-data">
                <ul class="middle-left" style="width:74%;">
                    @foreach($faqs as $key=>$faq)
                    <li>
                        <label class="titl-left-side col-md-3" >{{trans('messages.faq')}} #{{$key+1}}</label>
                        <div class="col-md-9">
                            <ul class="amont-bar">
                                <li>   
                                     <a class="delete" style="float: right;" onclick="confirmation('{{$faq->id}}')" title="Delete this faq">
                                        <span class="fa fa-close"></span>
                                        {{trans('messages.delete')}}
                                    </a>
                                    <a class="delete popupedit" style="float: right; margin-right: 7px;" data-id="{{$faq->id}}" title="Edit this faq">
                                        <span class="fa fa-edit"></span>
                                        {{trans('messages.edit')}}
                                    </a>
                                   
                                    <br>
                                    <br><br>
                                    <div style="width:100%;">
                                       <h3 class="mb0" style="margin-left:2%;"> 
                                        {{{$faq->question}}}
                                    </h3>
                                    </div>
                                    <div class="pldg-titl" style="width:100%;">
                                        <p style="line-height:1.8">{{$faq->answer}}</p>
                                    </div>                                   
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endforeach
                </ul>

               
                    <input type="hidden" value="{{$projectdetails->id}}" name="id">
                    <input type="hidden" value="{{$userid}}" name="userid">
                    <ul class="middle-left">
                        <li>
                            <label class="titl-left-side col-md-3" >{{trans('messages.question')}}</label>

                            <div class="col-md-9">
                                <div>
                                    <input id="project_photo" style="width: 100%;" name="question" type="text" class="@if($errors->has('question')) has-error @endif">                                  
                                </div>
                                @if ($errors->has('question')) <p class="help-block">{{ $errors->first('question') }}</p> @endif

                            </div>
                        </li>
                        <li>
                            <label class="titl-left-side col-md-3" >{{trans('messages.answer')}}</label>
                            <div class="col-md-9">
                                <p style='padding-top:10px;padding-bottom:10px;font-size:12px;line-height:1.5;'>{{trans('messages.projectdescriptioninfo')}}
                                </p> 
                                <textarea rows='10' name="answer" class="editable @if($errors->has('answer')) has-error @endif"></textarea>
                                @if ($errors->has('answer')) <p class="help-block">{{ $errors->first('answer') }}</p> @endif
                            </div>
                        </li>

                        <li class='banner-section'>
                            <input type="submit" class='btns-green' style='line-height: 0px; min-height: 45px;  margin-left: 42%;' value="{{trans('messages.submit')}}">
                        </li>

                    </ul>
                </form>
                <div class="middle-right">
                    <li id="step-2-sidebar-help" class="panel video" style="display: list-item;">
                        <a class="school-tout" target="_blank" href="{{URL::to('pages')}}/awesome-video">
                            <img src="{{URL::to('images/vid.png');}}">
                            <span class="awsme-area">
                                <span>{{trans('messages.howto')}}:</span>
                                {{trans('messages.makevideo')}}
                            </span>
                        </a>
                        <h5>{{trans('messages.importantreminder')}}</h5>
                        <p> {{trans('messages.importantreminderinfo1')}} </p>
                        <p>{{trans('messages.importantreminderinfo2')}}</p>
                        <p>
                            {{trans('messages.importantreminderinfo3')}}
                            <a class="has-icon popup" target="_blank" href="#">{{trans('messages.soundcloud')}}</a>
                            ,
                            <a class="has-icon popup" target="_blank" href="#">{{trans('messages.vimeomusicstore')}}</a>
                            ,
                            <a class="has-icon popup" target="_blank" href="#">{{trans('messages.freemusicarchive')}}</a>
                            , {{trans('messages.and')}}
                            <a class="has-icon popup" target="_blank" href="#">{{trans('messages.ccmixter')}}</a>
                            .
                        </p>
                    </li>
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

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<link href="{{URL::to('admin/css/ui-elements.css');}}" rel="stylesheet" type="text/css">

<link type="text/css" rel="stylesheet" href="{{URL::to('main/raptor/raptor-front-end.css');}}" />
<script type="text/javascript" src="{{URL::to('main/raptor/raptor.js');}}"></script>
<script type="text/javascript">
                                                jQuery(function($) {
                                                $('.editable').raptor({
                                                autoEnable: true,
                                                        enableUi: false,
                                                        unloadWarning: false,
                                                        classes: 'raptor-editing-inline',
                                                        "plugins": {
                                                        textBold: true,
                                                                textItalic: true,
                                                                textUnderline: true,
                                                                textStrike: true,
                                                                embed:true,
                                                                textBold:true,
                                                                textItalic:true,
                                                                insertFile:true,
                                                                linkCreate:true,
                                                                linkRemove:true,
                                                                dock: {
                                                                docked: true,
                                                                        dockToElement: true
                                                                },
                                                                unsavedEditWarning: false,
                                                        }
                                                });
                                                });</script>
<script>
            $(document).ready(function () {
    $(".popupedit").click(function() {
    var ValId = $(this).attr('data-id');
            $.colorbox({href:"edit/" + ValId});
    });
    });</script>

<script src="{{URL::to('admin/js/jquery.colorbox-min.js');}}"></script>

<script type="text/javascript">
            function confirmation(id) {
            var answer = confirm("Are you sure to delete this faq?")
                    if (answer) {
            location.href = 'delete/' + id;
            }
            else {
            return false;
            }
            }


    function popupEdit(valID) {
    //alert(valID);

    $.colorbox({href:"edit/" + valID});
    }

</script>

<script>
/*$(document).ready(function() {
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
	});*/
</script>


@stop