@extends('layouts.mainlayout')
@section('content')
<section>
    <div class="steps">
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
                <span>{{trans('messages.littlebitaboutyou')}}.</span>
                <p>{{trans('messages.tellpeople')}}.</p>

            </div>

            <div class="middle-containers">
                <form method="post" id="form" action="{{URL::to('project/postabout')}}" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="{{$projectdetails->id}}">
                    <input type="hidden" name="userid" value="{{$userdetails->id}}">
                    <ul class="middle-left">
                        <li>
                            <label class="titl-left-side col-md-3" >{{trans('messages.profilephoto')}}</label>
                            <div class="col-md-9">
                                <div class="upload  @if($errors->has('image')) has-error @endif">
                                    <div class="image-clip">
                                        <img class="preview" id="myImg" style="width:76px;height:76px;" src="{{URL::to('')}}/{{$userdetails->image}}" onerror="this.src='{{URL::To('main/images/default.png');}}'">
                                    </div>
                                    <input id="project_photo" class="photo file" type="file" name="image">
                                    <strong class="center">
                                        {{trans('messages.pictureinfo')}}
                                        <span>JPEG, PNG, GIF, or BMP • 50MB {{trans('messages.picturelimit')}}</span>
                                    </strong>
                                </div>
                                @if ($errors->has('image')) <p class="help-block">{{ $errors->first('image') }}</p> @endif
                            </div>
                        </li>
                        <li>
                            <label class="titl-left-side col-md-3">{{trans('messages.name')}}</label>
                            <div class="col-md-9">
                                <div class="chr-ful-wapr-sel">
                                    <input type="text" name="name" value="{{$userdetails->firstname}} {{$userdetails->lastname}}" disabled>
                                </div>
                                <p class="span-lint">{{trans('messages.nameinfo')}}.
                                </p>
                            </div>
                        </li>

                        <li>
                            <label class="titl-left-side col-md-3" >{{trans('messages.biography')}}</label>

                            <div class="col-md-9">
                                <div class="chr-ful-wapr">
                                    <textarea style="height:200px; overflow:hidden" id="project_blurb" name="biography" class="required textarea  @if($errors->has('biography')) has-error @endif">{{$userdetails->biography}}</textarea>
                                </div>
                                @if ($errors->has('biography')) <p class="help-block">{{ $errors->first('biography') }}</p> @endif
                            </div>
                        </li>
                        <li>
                            <label class="titl-left-side col-md-3">{{trans('messages.yourlocation')}}</label>
                            <div class="col-md-9">
                                <div class="chr-ful-wapr-sel" style="width: 47%;">
                                    <span style="color: #999;font-size: 12px;">{{trans('messages.country')}}</span>
                                    <select name="country" style="margin-top: 5px;">
                                        @foreach($countries as $country)
                                        <option value="{{$country->countryname}}" @if($userdetails->country==$country->countryname)selected="selected" @endif>{{$country->countryname}}</option>
                                        @endforeach
                                    </select>                                
                                </div>
                                <div class="chr-ful-wapr-sel" style="width: 47%;margin-left:30px;">
                                    <span style="color: #999;font-size: 12px;">{{trans('messages.state')}}</span>
                                    <input type="text" name="state" style="margin-top: 5px;" value="{{$userdetails->state}}" class="@if($errors->has('state')) has-error @endif">  
                                    @if ($errors->has('state')) <p class="help-block">{{ $errors->first('state') }}</p> @endif
                                </div>

                            </div>
                        </li>
                        <li>
                            <label class="titl-left-side col-md-3">{{trans('messages.websites')}}</label>
                            <div class="col-md-9">
                                <div class="chr-ful-wapr-sel">
                                    <div>
                                        <input type="text" name="website" value="{{$userdetails->weburl}}">
                                    </div>
                                </div>
                                <p class="span-lint">{{trans('messages.websitesinfo')}}</p>
                            </div>
                        </li>

                        <li class='banner-section'>
                            <input type="submit" class=' btns-green' style='line-height: 0px; min-height: 45px;  margin-left: 42%;' value="Update & Continue">
                        </li>
                    </ul>
                </form>
                <div class="middle-right">
                    <li id="step-2-sidebar-help" class="panel video" style="display: list-item;">

                        <h5>{{trans('messages.importantnotes')}}</h5>
                        <p>{{trans('messages.importantnotesinfo')}}</p>

                        <h5>{{trans('messages.returningcreators')}}</h5>
                        <p>{{trans('messages.returningcreatorsinfo')}}</p>
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
    $(function () {
        $(":file").change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
            }
        });
    });

    function imageIsLoaded(e) {
        $('#myImg').attr('src', e.target.result);
    }
    ;
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
