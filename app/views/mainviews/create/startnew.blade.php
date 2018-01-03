@extends('layouts.mainlayout')
@section('content')
<style type="text/css">
.overflow {
      height: 200px;
    }
</style>
@if(Session::has('failed'))
        <div class="alert-message error">
            {{Session::get('failed');}}
        </div>
        @endif

<?php 
$url_segment = \URL::current();
$url=explode("/",$url_segment);
$url_new=array_reverse($url);

$p_id=Crypt::decrypt($url_new[0]);


?>
<section class="fb-projects-section">
    <div class="container">
      <div class="fb-section-head-wrap">
        <h1 class="fb-section-head">Create Project</h1>
      </div>
    </div>
  </section>
  <section class="fb-pd-tab-section fb-projects-tab-section">
    <div class="container">
      <div class="fb-create-project-box">
        <div class="fb-cp-steps-trigger-wrapper">
          <ul class="fb-cp-steps-trigger">
            <li>
              <button class="fb-cp-step-button fb-cp-step-one-trigger clickable">
                <span class="fb-cp-step-count">1</span>
                <span class="fb-cp-step-completed-icon" style="display: none;"><i class="icon-checked"></i></span>
                <span class="fb-cp-step-name">Project Details</span>
              </button>
            </li>
            <li>
              <button class="fb-cp-step-button fb-cp-step-two-trigger" disabled="disabled">
                <span class="fb-cp-step-count">2</span>
                <span class="fb-cp-step-completed-icon" style="display: none;"><i class="icon-checked"></i></span>
                <span class="fb-cp-step-name">Financial Details</span>
              </button>
            </li>
            <li>
              <button class="fb-cp-step-button fb-cp-step-three-trigger" disabled="disabled">
                <span class="fb-cp-step-count">3</span>
                <span class="fb-cp-step-completed-icon" style="display: none;"><i class="icon-checked"></i></span>
                <span class="fb-cp-step-name">Submit for Review</span>
              </button>
            </li>
          </ul>
        </div>
        <div class="fb-cp-steps-content-wrapper">
          <div class="fb-cp-step-content fb-cp-step-one-content">
            <form action="{{URL::to('postbasicupdate/project/')}}/<?php echo $url_new[0];?>" method="post" id="form" enctype="multipart/form-data">

              <input name='id' type='hidden' value='{{$projectdetails->id}}'>
                        
            
                        <input type="hidden" value="{{Session::get('locale')}}" name="language" id="language">
              <ul class="fb-cp-form-list fb-cp-form-list-left">
                <li>
                  <label class="fb-cp-form-label">Choose which SDG your project falls under</label>
                  <span class="fb-cp-form-input-wrapper">
                    <select name='category'>
                     @foreach($categories as $category)
                                        <option value='{{$category->id}}' @if($category->id==$projectdetails->categoryid)selected="selected" @endif >{{$category->categoryname}}</option>
                                        @endforeach
                    </select>
                  </span>
                </li>
                <li>
                  <label class="fb-cp-form-label required">Project Title</label>
                  <span class="fb-cp-form-input-wrapper">
                    <input type="text" class="fb-input-text @if($errors->has('title')) has-error @endif"  name='title' required="" value="{{{$projectdetails->title}}}"/> @if ($errors->has('title')) <p class="help-block">{{ $errors->first('title') }}</p> @endif
                    <i class="fb-form-hint">This will be the main title through which donors can find your title</i>
                  </span>
                </li>
                <li>
                  <label class="fb-cp-form-label required">Country</label>
                  <span class="fb-cp-form-input-wrapper">
                    <select name="country" id="country">
                          @foreach($countries as $country)
                                        <option value='{{$country->id}}' @if($country->id==$projectdetails->location)selected="selected" @endif >{{$country->countryname}}</option>
                                        @endforeach
                    </select>
                  </span>
                </li>
                <li>
                  <label class="fb-cp-form-label required">Feature Photograph</label>
                  <span class="fb-cp-form-input-wrapper">
                         <img class="preview" id="myImg" style="width:112px;height:112px;" src="{{URL::to('')}}/{{$projectdetails->projectimage}}" onerror="this.src='{{URL::To('main/images/projectdefault.png');}}'">

                    <div class="custom-file-upload @if($errors->has('image')) has-error @endif">
                        <input type="file" id="file" name="image" />
                        @if ($errors->has('image')) <p class="help-block">{{ $errors->first('image') }}</p> @endif
                    </div>
                    <i class="fb-form-hint">This will be the main image anyone looking at your story will see. JPEG, PNG, 5MB file limit. Atleast 1024 x 768</i>
                  </span>
                </li>
                <li>
                  <label class="fb-cp-form-label required">Appeal Message</label>
                  <span class="fb-cp-form-input-wrapper">
                    <textarea class="fb-input-textarea @if($errors->has('shortblurb')) has-error @endif" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required="" placeholder="Please give as much as you can and help" name="shortblurb">@if($projectdetails->shortblurb!=''){{{$projectdetails->shortblurb}}}@else{{ Input::old('shortblurb') }}@endif</textarea>
                    @if ($errors->has('shortblurb')) <p class="help-block">{{ $errors->first('shortblurb') }}</p> @endif
                  </span>
                </li>
                <li>

                  <label class="fb-cp-form-label">Feature Video</label>
                   @if($projectdetails->projectvideo!='')
                    <label class="titl-left-side col-md-3" ><span id="textchage">{{trans('messages.projectvideo')}}</span> </label>
                            @if($projectdetails->projectvideo!='')
                            <a href="javascript:void(0)"> <span  class="round-button" onclick="deletevideo({{$projectdetails->id}});">x</span></a>
                            @endif
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
                  <span class="fb-cp-form-input-wrapper">
                    <div class="custom-file-upload">
                        <input type="file" name="projectvideo"  />
                       
                      

                        @if ($errors->has('projectvideo')) <p class="help-block">{{ $errors->first('projectvideo') }}</p> @endif
                    </div>
                  </span>
                  <span class="fb-cp-form-or-text">OR</span>
                  <span class="fb-cp-form-input-wrapper">
                    <input type="text" class="fb-input-text" placeholder="Paste Youtube Video URL" name="youtubelink"/>
                    <i class="fb-form-hint">This will be the main video for your project. Make sure it talks about why the donee needs money, what they are doing right now and what they will be doing once they get the money.</i>
                    @if ($errors->has('youtubelink')) <p class="help-block">{{ $errors->first('youtubelink') }}</p> @endif
                  </span>
                </li>
                <li>
                  <label class="fb-cp-form-label required">Description</label>
                  <span class="fb-cp-form-input-wrapper">
                      

                    <textarea class="fb-input-textarea @if($errors->has('description')) has-error @endif" name="description" required="" >@if($projectdetails->description!=''){{{$projectdetails->description}}}@else{{ Input::old('description') }}@endif</textarea>
                    <i class="fb-form-hint">This gives people a sense of who you are trying to help and how.</i>
                    @if ($errors->has('description')) <p class="help-block help-editor">{{ $errors->first('description') }}</p> @endif
                  </span>
                </li>
              </ul>
              <ul class="fb-cp-form-list fb-cp-form-list-right">
                <li>
                  <label class="fb-cp-form-label required">Risks and challenges</label>
                  <span class="fb-cp-form-input-wrapper">
                    <textarea class="fb-input-textarea" name="risks" required>@if(Input::old('risks')!=''){{ Input::old('risks')}}@else{{$projectdetails->risks}}@endif</textarea>
                     @if ($errors->has('risks')) <p class="help-block">{{ $errors->first('risks') }}</p> @endif
                    <i class="fb-form-hint">A hint text will go here ...</i>
                  </span>
                </li>
                <li style="display:none;">
                  <label class="fb-cp-form-label">Sponsored By</label>
                  <span class="fb-cp-form-input-wrapper fb-sponsored-field">
                    <span class="fb-cp-sponsor-image-wrap"><img src="{{URL::asset('main/images/testimonial-image-2.jpeg');}}" alt="testimonial image 2"/></span>
                    <textarea class="fb-input-textarea"></textarea>
                    <i class="fb-form-hint">This gives people a sense of who you are trying to help and how.</i>
                  </span>
                </li>
                <li style="display:none;">
                  <label class="fb-cp-form-label">Description</label>
                  <span class="fb-cp-form-input-wrapper">
                    <textarea class="fb-input-textarea"></textarea>
                    <i class="fb-form-hint">Explain in detail who you have started this project for, their past, their present and what they plan to do with the money.</i>
                  </span>
                </li>
                <li>
                  <label class="fb-cp-form-label">Donee Information</label>
                  <span class="fb-cp-form-input-wrapper">
                    <input type="text" class="fb-input-text" placeholder="Name of Donee"/>
                  </span>
                  <span class="fb-cp-form-input-wrapper">
                    <select id="doneecountry">
                      <option value=''>{{trans('messages.selectcountry')}}</option>
                     @foreach($countries as $country)
                        <option value="{{$country->id}}">{{$country->countryname}}</option>
                        @endforeach
                    </select>
                  </span>
                  <span class="fb-cp-form-input-wrapper">
                    <select>
                      <option value="">Religion</option>
                      <option value="">Hindu</option>
                      <option value="">Christian</option>
                      <option value="">Muslim</option>
                    </select>
                  </span>
                  <span class="fb-cp-form-input-wrapper fb-date-picker-wrapper">
                    <input type="text" class="fb-input-text" value="DOB" id="datepicker"/>
                  </span>
                  <span class="fb-cp-form-input-wrapper">
                    <select>
                      <option value="">Gender</option>
                      <option value="">Male</option>
                      <option value="">Female</option>
                    </select>
                  </span>
                  <span class="fb-cp-form-input-wrapper">
                    <div class="custom-file-upload">
                        <input type="file" name="prrofimage" />
                    </div>
                    <i class="fb-form-hint">Upload Beneficiary Document (ID Proof)</i>
                  </span>
                </li>
              </ul>
              <div class="fb-submit-btn-wrapper">
                <button type="submit" class="fb-submit-btn"><i class="icon-right-arrow"></i><span>NEXT</span></button>
              </div>
            </form>
          </div>
         
      </div>
    </div>
  </section>

   

<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="{{URL::asset('main/js/bootstrap.min.js');}}"></script>

<script src="{{URL::asset('main/js/jquery-ui.min.js');}}"></script>
<script src="{{URL::asset('main/js/custom.js');}}"></script>
<script src="{{URL::asset('main/js/create-project.js');}}"></script>

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

</script>
<script>
$( function() {
    
    $( "select" ).selectmenu().selectmenu( "menuWidget" )
        .addClass( "overflow" );

         $( "select#country" ).selectmenu().selectmenu( "menuWidget" )
        .addClass( "overflow" );

  $( "select#doneecountry" ).selectmenu().selectmenu( "menuWidget" )
        .addClass( "overflow" );
        

 
    $('#datepicker').datepicker({
      inline: true,
      nextText: '&rarr;',
      prevText: '&larr;',
      showOtherMonths: true,
      dateFormat: 'dd MM yy',
      showOn: "both",
      buttonImage: "{{url::asset('main/images/calendar.svg');}}",
      buttonImageOnly: true,
      buttonText: "",
      changeYear:true,
      changeMonth: true,
      yearRange: '1950:+0'
     
    });
});

</script>

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
@stop