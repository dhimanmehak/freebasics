@extends('layouts.mainlayout')
@section('content')
<section>
    <div class="steps">
        <div class="container">
            <div class="step-head">
                <ol id="" class="steps-navgiaton">
                    <li  class="stp1 ">
                        <a class="" href="{{URL::to('project/basic')}}/{{$projectdetails->id}}"><i class="fa fa-check-circle"></i> {{trans('messages.basics')}} </a>
                    </li>
                    <li class="stp1 ">
                        <a class="" href="{{URL::to('project/reward')}}/{{$projectdetails->id}}"><i class="fa fa-check-circle"></i> {{trans('messages.rewards')}} </a>
                    </li>
                    <li class="stp1 active">
                        <a class="" href="{{URL::to('project/story')}}/{{$projectdetails->id}}"><i class="fa fa-check-circle"></i> {{trans('messages.story')}} </a>
                    </li>
                    <li class="stp1">
                        <a class="" href="{{URL::to('project/about')}}/{{$projectdetails->id}}"><i class="fa fa-check-circle"></i> {{trans('messages.aboutyou')}} </a>
                    </li>
                    <li class="stp1">
                        <a class="" href="{{URL::to('project/account')}}/{{$projectdetails->id}}"><i class="fa fa-check-circle"></i> {{trans('messages.account')}} </a>
                    </li>
                </ol>
                <ol id="" class="steps-navgiaton">
                    <li class="stp1">
                        <a class="" href="{{URL::to('project/preview')}}/{{$projectdetails->id}}"> {{trans('messages.preview')}} </a>
                    </li>
                </ol>


                <ol id="" class="steps-navgiaton">
                    <li class="stp1">
                        <a class="" href="{{URL::to('project/updates')}}/{{$projectdetails->id}}"> {{trans('messages.updates')}} </a>
                    </li>
                </ol>

                <ol id="" class="steps-navgiaton">
                    <li class="stp1">
                        <a class="" href="{{URL::to('project/backers')}}/{{$projectdetails->id}}"> {{trans('messages.capsbackers')}} </a>
                    </li>
                </ol>

                <ol id="" class="steps-navgiaton">
                    <li class="stp1">
                        <a class="" href="{{URL::to('project/faq')}}/{{$projectdetails->id}}"> {{trans('messages.faq')}} </a>
                    </li>
                </ol>

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
                <form method="post" action="{{URL::to('project/poststory')}}" enctype="multipart/form-data">
                    <input type="hidden" value="{{$projectdetails->id}}" name="id">
                    <ul class="middle-left">
                        <li>
                            <label class="titl-left-side col-md-3" >{{trans('messages.projectvideo')}} </label>

                            <div class="col-md-9">
                                <div class="upload @if($errors->has('projectvideo')) has-error @endif">
                                    <input id="project_photo" class="photo file" name="projectvideo" type="file" >
                                    <strong class="center">
                                        {{trans('messages.videoinfo')}}
                                        <span>MOV, MPEG, AVI, MP4, 3GP, WMV, or FLV • 5MB {{trans('messages.filelimit')}}</span>
                                        <span>640x480 pixels • 4:3 {{trans('messages.aspectratio')}}</span>
                                    </strong>
                                </div>
                                @if ($errors->has('projectvideo')) <p class="help-block">{{ $errors->first('projectvideo') }}</p> @endif
                                <p style="text-align:center">{{trans('messages.or')}}</p>
                                <div class="upload">
                                    <strong class="center">
                                        <p>{{trans('messages.pasteyoutubelink')}}</p>
                                        <input type="text" class="@if($errors->has('youtubelink')) has-error @endif" name="youtubelink" style="width: 100%;margin-top:10px;" placeholder="Youtube link">
                                        <span style="font-size:12px;color:#999;text-align: left;">Eg: https://www.youtube.com/watch?v=UFrYGiSi0Uw</span>
                                    </strong>

                                </div>
                                @if ($errors->has('youtubelink')) <p class="help-block">{{ $errors->first('youtubelink') }}</p> @endif



                                <p class="span-lint">
                                    {{trans('messages.addvideo')}}
                                    <a class="has-icon popup" target="_blank" href="{{URL::to('pages')}}/creator-handbook">{{trans('messages.creatorhandbook')}}</a>
                                    . {{trans('messages.needhelpvisit')}}
                                    <a class="has-icon popup" target="_blank" href="{{URL::to('pages')}}/creator-faq">{{trans('messages.creator')}} {{trans('messages.faq')}}</a>
                                    .
                                </p>
                            </div>
                        </li>
                        <li>
                            <label class="titl-left-side col-md-3" >{{trans('messages.projectdescription')}}</label>

                            <div class="col-md-9">

                                <p style='padding-top:10px;padding-bottom:10px;font-size:12px;line-height:1.5;'>{{trans('messages.projectdescriptioninfo')}}
                                </p> 

                                <textarea id="texteditor" rows='10' name="description" class="@if($errors->has('description')) has-error @endif">{{$projectdetails->description}}</textarea>
                                @if ($errors->has('description')) <p class="help-block">{{ $errors->first('description') }}</p> @endif
                            </div>
                        </li>
                        <li>
                            <label class="titl-left-side col-md-3" >{{trans('messages.risksandchallenges')}}</label>

                            <div class="col-md-9">
                                <p class="span-lint">
                                    <b>{{trans('messages.whatarerisks')}}</b>
                                </p>
                                <p class="span-lint">
                                    {{trans('messages.whatarerisksinfo1')}}</p>
                                <p class="span-lint">
                                    {{trans('messages.whatarerisksinfo2')}}</p>
                                <div class="chr-ful-wapr">
                                    <textarea style="height:200px; overflow:hidden" id="project_blurb" class="required textarea @if($errors->has('risks')) has-error @endif" name="risks">{{$projectdetails->risks}}</textarea>
                                </div>
                                @if ($errors->has('risks')) <p class="help-block">{{ $errors->first('risks') }}</p> @endif
                            </div>
                        </li>

                        <li>
                            <label class="titl-left-side col-md-3" >{{trans('messages.project')}} {{trans('messages.faq')}}</label>

                            <div class="col-md-9">
                                <p class="span-lint">{{trans('messages.addfaqinfo')}}</p>
                            </div>
                        </li>

                        <li class='banner-section'>
                            <input type="submit" class=' btns-green' style='line-height: 0px; min-height: 45px;  margin-left: 42%;' value="{{trans('messages.update')}}">
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
                    <a class="inline-block py1 delete-project grey-dark h5" href="{{URL::to('project/delete');}}/{{$projectdetails->id}}" title="Delete this project">
                        {{trans('messages.deleteproject')}}
                    </a></li>
            </ul>
        </div>
</section>



@stop

    <script src="{{URL::to('main/froala_editor/js/libs/jquery-1.11.1.min.js');}}"></script>
    <script src="{{URL::to('main/froala_editor/js/froala_editor.min.js');}}"></script>
    <!-- Include IE8 JS. -->
    <!--[if lt IE 9]>
        <script src="../js/froala_editor_ie8.min.js"></script>
    <![endif]-->

  <!-- Initialize the editor. -->
  <script>
      $(function() {
          $('#texteditor').editable({inlineMode: false});
      });
  </script>
