@extends('layouts.mainlayoutold')
@section('content')
<section>
<style type="text/css">
.mce-path {/* CSS */
    display: none !important;
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
        <a href="{{URL::to('project/reward')}}/{{Crypt::encrypt($projectdetails->id)}}" type="button" class="btn btn-default btn-circle">2</a>
        <p>Incentives to supporters</p>
      </div>
      <div class="stepwizard-step">
        <a href="{{URL::to('project/story')}}/{{Crypt::encrypt($projectdetails->id)}}" type="button" class="btn btn-primary btn-circle active">3</a>
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
        <a href="{{URL::to('project/reward')}}/{{Crypt::encrypt($projectdetails->id)}}" type="button" class="btn btn-default btn-circle">3</a>
        <p>Incentives to supporters</p>
      </div>
	  <div class="stepwizard-step">
        <a href="{{URL::to('project/story')}}/{{Crypt::encrypt($projectdetails->id)}}" type="button" class="btn btn-primary btn-circle active">4</a>
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
  <li><a href="{{URL::to('project/reward')}}/{{Crypt::encrypt($projectdetails->id)}}">3</a><span>Incentives to supporters</span></li>
  <li class="active"><a href="{{URL::to('project/story')}}/{{Crypt::encrypt($projectdetails->id)}}">4</a><span>Social Impact</span></li>
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
                    <li class="stp1">
                        <a class="a" href="{{URL::to('project/reward')}}/{{Crypt::encrypt($projectdetails->id)}}" @if($rewardstatus==1)style="color:#020;font-weight: bold;"@endif><i class="fa fa-check-circle" @if($rewardstatus==1)style="color:#2bde73;"@endif></i> {{trans('messages.rewards')}} </a>
                    </li>
                    <li class="stp1 active">
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
                @if(Session::has('failed'))
                <div class="alert-message error">
                    {{Session::get('failed');}}
                </div>
                @endif
                <span>{{trans('messages.whatcreating')}}</span>
                <p>{{trans('messages.whatcreatinginfo')}} </p>
            </div>            

            <div class="middle-containers">
                <form method="post" id="form" action="{{URL::to('project/poststory')}}" enctype="multipart/form-data">
                    <input type="hidden" value="{{$projectdetails->id}}" name="id">
                    <ul class="middle-left">
                        @if($projectdetails->projectvideo!='')
                        <input type="hidden" value="1" name="uploaded">
                        @else 
                        <input type="hidden" value="0" name="uploaded" id="uploaded">
                        @endif
                        <li>                            
                            <label class="titl-left-side col-md-3" ><span id="textchage">{{trans('messages.projectvideo')}}</span> </label>
                            @if($projectdetails->projectvideo!='')
                            <a href="javascript:void(0)"> <span  class="round-button" onclick="deletevideo({{$projectdetails->id}});">x</span></a>
                            @endif
                            <div class="col-md-9">
                                @if($projectdetails->projectvideo!='')
                                <?php
                                $array = explode('/', $projectdetails->projectvideo);
                                $explodedata = explode('.', $array[4]);
                                ?>
                                @if(Str::contains("www.youtube.com",$array))
                                <iframe src="{{$projectdetails->projectvideo}}"
                                        width="100%" height="300px" frameborder="0" allowfullscreen></iframe>
                                @else 
                                <?php
                                if ($explodedata[1] == 'JPEG' || $explodedata[1] == 'PNG' || $explodedata[1] == 'GIF' || $explodedata[1] == 'BMP' ||
                                        $explodedata[1] == 'jpeg' || $explodedata[1] == 'png' || $explodedata[1] == 'gif' || $explodedata[1] == 'bmp' || $explodedata[1] == 'jpg') {
                                    ?>                                  
                                    <img class="preview" id="img" style="width:100%;height:100%;" src="{{URL::to('');}}/{{$projectdetails->projectvideo}}" >
                                <?php } else { ?>
                                    <video width="100%" height="100%" controls>
                                        <source src="{{URL::to('');}}/{{$projectdetails->projectvideo}}" >
                                        {{trans('messages.novideosupport')}}.
                                    </video>
                                <?php } ?>
                                @endif
                                @endif
                                <div class="upload @if($errors->has('projectvideo')) has-error @endif" id="project_video">
                                    <div class="image-clip">
                                        <img class="preview" id="myImg" style="width:112px;height:112px;" src="{{URL::to('')}}/{{$projectdetails->projectvideo}}" onerror="this.src='{{URL::To('main/images/projectdefault.png');}}'">
                                    </div>
                                    <input id="project_photo" class="photo file" name="projectvideo" type="file" >
                                    <strong class="center">
                                        {{trans('messages.videoinfo')}}
                                        <span>MOV, MPEG, AVI, MP4, 3GP, WMV, or FLV • 5MB {{trans('messages.filelimit')}}</span>
                                        <span>JPEG, PNG, GIF, BMP • 5MB {{trans('messages.filelimit')}}</span>
                                        <span>640x480 pixels • 4:3 {{trans('messages.aspectratio')}}</span>
                                    </strong>
                                </div>
                                <p class="help-block videosize" style="display:none">Project video may not be greater than 5000 kilobytes.</p>
                                @if ($errors->has('projectvideo')) <p class="help-block">{{ $errors->first('projectvideo') }}</p> @endif
                                <p style="text-align:center">{{trans('messages.or')}}</p>
                                <div class="upload">
                                    <strong class="center">
                                        <p>{{trans('messages.pasteyoutubelink')}}</p>
                                        <input type="text" class="@if($errors->has('youtubelink')) has-error @endif" name="youtubelink" style="width: 100%;margin-top:10px;" placeholder="{{trans('messages2.youtubeurllink')}}" id="youtubelink">
                                        <span style="font-size:12px;color:#999;text-align: left;">{{trans('messages2.uploadyourprojectvideoinyoutube')}}<span style="color:#00A8EF;display:inline;"> Eg: https://www.youtube.com/watch?v=UFrYGiSi0Uw</span>
                                    </strong>
                                </div>
                                @if ($errors->has('youtubelink')) <p class="help-block">{{ $errors->first('youtubelink') }}</p> @endif
                                <span id="upload_error" style="color:red;display:none;font-size: 13px;">Please upload any one of the field.</span>
                            </div>
                        </li>                        
                        <li>
                            <label class="titl-left-side col-md-3" >{{trans('messages.projectdescription')}}</label>

                            <div class="col-md-9"> 
                                <textarea id='edit' style="margin-top: -230px;" name="description" class="required input-editor @if($errors->has('description')) has-error @endif">
                                  @if(Input::old('description')!=''){{ Input::old('description')}}@else {{$projectdetails->description}}@endif
                                </textarea>
                                @if ($errors->has('description')) <p class="help-block help-editor">{{ $errors->first('description') }}</p> @endif
                            </div>

                        </li>
                        <li>
                            <label class="titl-left-side col-md-3" ><!-- {{trans('messages.risksandchallenges')}} -->Social Impact</label>

                            <div class="col-md-9">
                                <div class="chr-ful-wapr">
                                    <textarea style="height:200px; overflow:hidden" id="project_blurb" class="input-text required textarea @if($errors->has('risks')) has-error @endif" name="risks">@if(Input::old('risks')!=''){{ Input::old('risks')}}@else{{$projectdetails->risks}}@endif</textarea>
                                    @if ($errors->has('risks')) <p class="help-block">{{ $errors->first('risks') }}</p> @endif
                                </div>
                            </div>

                        </li>
						
						
						
						

                    </ul>
					
					<div class="col-md-9 col-md-offset-3">
					<ul class='middle-left' style="width: 100%;">
					<li class='banner-section'>
                              <a href="{{URL::to('project/reward')}}/{{Crypt::encrypt($projectdetails->id)}}" class="btns-green backMoreFields">Back</a> 
                                

                            </li>

                        <li class='banner-section'>
                            <input type="submit" class='btns-green' style='line-height: 0px; min-height: 45px;float:right;margin-right: 14px;' value="{{trans('messages.updateandcntue')}}">
                        </li>
					</ul>
					</div>
                </form>
                <div class="middle-right">


                    <li id="step-2-sidebar-help" class="panel video" style="display: list-item;">
                        <!--right side div-->
                    </li>
                </div>
            </div>
            <ul class="alt-tools right list-inline ml1 mt2">
                <li class="mr2">
                    <i class="fa fa-close"></i>
                    <!-- <a class="inline-block py1 delete-project grey-dark h5" href="{{URL::to('project/delete');}}/{{Crypt::encrypt($projectdetails->id)}}" title="Delete this project">  -->
					 <a class="inline-block py1 delete-project grey-dark h5" href="#" title="Delete this project" data-id="{{Crypt::encrypt($projectdetails->id)}}">
                        {{trans('messages.deleteproject')}}
                    </a></li>
            </ul>
        </div>
</section>
<script type="text/javascript" src="{{URL::to('main/tinymce/js/tinymce/tinymce.min.js');}}"></script>
<script src="{{URL::to('admin/js/jquery.validate.min.js');}}"></script>
<script type="text/javascript">

                                        tinymce.init({
                                        selector: "#edit",
                                                // ===========================================
                                                // INCLUDE THE PLUGIN
                                                // ===========================================

                                                plugins: [
                                                        "advlist autolink lists link image charmap print preview anchor",
                                                        "searchreplace visualblocks code fullscreen",
                                                        "insertdatetime media table contextmenu paste jbimages"
                                                ],
                                                // ===========================================
                                                // PUT PLUGIN'S BUTTON on the toolbar
                                                // ===========================================

                                                toolbar: "insertfile undo redo | styleselect | bold italic | link image jbimages",
                                                // ===========================================
                                                // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
                                                // ===========================================

                                                relative_urls: false

                                        });
</script>
<!-- /TinyMCE -->

<script>
            /* $('#form').data('serialize', $('#form').serialize()); // On load save form current state
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
            $('#form_submit').click(function(){
    var linkavail = $("#youtubelink").val();
            if (linkavail != ''){
    $('#uploaded').val('1');
    }
    });
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

<script>
            function deletevideo(id) {
            if (id != '') {
            $.ajax({
            url: "deletevideo",
                    type: "post",
                    data: {'videoid':id},
                    success: function(data) {
                    if (data != 0) {
                    window.location.href = "";
                    }
                    }
            });
            }
            }
</script>
<!-- div class="round-button">
    <a href="http://example.com">
        <img src="http://codeitdown.com/media/Cross_Icon.svg"  />
    </a>
</div> -->
<style>
    .round-button {
        background: black none repeat scroll 0 0;
        border: 1px solid #f5f5f5;
        border-radius: 52%;
        box-shadow: 0 0 0 gray;
        float: right;
        height: 2px;
        margin-top: -16px;
        overflow: hidden;
        padding-bottom: 18px;
        text-align: center;
        width: 33px;
    }
    .round-button:hover {
        background: #262626;
    }
    .round-button img {
        display: block;
        width: 76%;
        padding: 12%;
        height: auto;
    }
</style>
<script>
    $('#project_photo').bind('change', function() {
    $('#proj_video').addClass('has-error');
            //this.files[0].size gets the size of your file.
            var filesize = this.files[0].size / 1024;
            if (filesize > 5000){
    $('.videosize').css('display', 'block');
            $('#myImg').css('display', 'none');
            $('#project_video').addClass('has-error');
    } else{
    $('.videosize').css('display', 'none');
            $('#myImg').attr('src', '');
            $('#project_video').removeClass('has-error');
            $('#myImg').css('display', 'block');
    }
    });
            $(".input-text").each(function () {
    $(this).keypress(function () {
    $(this).next().fadeOut();
            $(this).removeClass('has-error');
    });
    });
            $(".input-editor").keypress(function () {
    $(".help-editor").fadeOut();
            $(this).removeClass('has-error');
    });</script>
<style>
    .pledge-texct.error {
        border: 1px solid red !important;
    }
    label.error  { 
        border:0px;
    }
    .ast {
        color: red !important;
        padding:5px;
    }
    .error {
        border: 1px solid red !important;
    }
</style>
<script>
            function validatestory() {
            var editorcontent = tinyMCE.get('edit').getContent();
                    if (editorcontent == "") {
            $("#tinymce-8").addClass("error");
            }
            $("#form").validate({
            onsubmit: true,
                    rules: {
                    "description":	{
                    required:true,
                    },
                            "risks":	{
                            required:true,
                            },
                    }
            });
            }

    $("#tinymce-8").keyup(function(e) {
    //alert(234)
            $("#tinymce-8").removeClass("error");
    });
            $("#tinymce").keyup(function() {
    alert("Handler for .change() called.");
    });</script>

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
            };
			
	$('a.delete-project').click(function(e){
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



<!--<script>
            $("#form_submit").click(function(){
    var project_photo = $('#project_photo').val();
            var youtubelink = $('#youtubelink').val();
            if (project_photo == "" && youtubelink == ""){
    $('#upload_error').css('display', 'block');
            $('html, body').animate({
    scrollTop: $("#project_photo").offset().top}, 2000);
            return false;
    }
    });</script>    

<script>
$('#textchage').html('Image');</script>	-->
@stop        


