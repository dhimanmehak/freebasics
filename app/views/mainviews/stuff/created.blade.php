@extends('layouts.mainlayoutold')
@section('content')
<section>
    <div class="profile-section">
        <div class="top-profilea">
            <div class="container">
                <div class="col-md-3">
                    <img src="{{URL::to('')}}/{{$details->image}}" onerror="this.src='main/images/default.png'">
                </div>
                <div class="col-md-5">
                    <ul class="profli-list">
                        <li><h2>{{{$details->firstname}}} {{{$details->lastname}}} </h2></li>
                        <li> {{trans('messages.backed')}} {{$details->backedcount}} {{trans('messages.projects')}} · {{trans('messages.from')}} {{$details->country}} · {{trans('messages.joined')}} {{$details->createdon}}</li>
                        <li><i>{{{$details->biography}}}</i></li> 
                        <li><a class="See-full-bio-popup" href="#" data-toggle="modal" data-target="#profileModal">{{trans('messages.seebioandlinks')}}</a></li>                       
                    </ul>
                </div>
                <!--                <div class="col-md-4">
                                    <h5 style='text-indent: 5px;'>{{trans('messages.backedprojects')}}<i>({{trans('messages.categorywise')}})</i></h5>
                                    <ul class="art-section">
                                        @foreach($categories as $category)
                                        <li><a href="#">{{$category->categoryname}}@if(($category->total)!=0)({{$category->total}})@endif</a></li>   
                                        @endforeach
                                    </ul>
                
                                </div>-->

            </div>
        </div>

        <div class="profile-botm">
            <div class="container">
                
                <ul class="top-noch">
                    <li class="cretd">
                        
                       @if(Request::segment(2)=='')
                        <a href="{{URL::to('profile')}}">{{trans('messages.backed')}} <span>{{count($backedprojects)}}</span></a>
                        @else
                        <a href="{{URL::to('profile')}}/{{Request::segment(2)}}">{{trans('messages.backed')}} <span>{{count($backedprojects)}}</span></a>
                        @endif
                    </li>
                    <li class="bkend">
                        @if(Request::segment(2)=='')
                        <a href="{{URL::to('created')}}">{{trans('messages.created')}} <span>({{count($createdprojects)}})</span></a>
                        @else
                        <a href="{{URL::to('created')}}/{{Request::segment(2)}}">{{trans('messages.created')}} <span>({{count($createdprojects)}})</span></a>
                        @endif
                    </li>

                    <li class="cretd">
                        @if(Request::segment(2)=='')
                        <a href="{{URL::to('comments')}}">{{trans('messages.comments')}}  <span>({{$commentscount}})</span></a>
                        @else
                        <a href="{{URL::to('comments')}}/{{Request::segment(2)}}">{{trans('messages.comments')}}  <span>({{$commentscount}})</span></a>
                        @endif
                    </li>
                </ul>
               
                @if($createdprojects=='[]')
                <div  style="margin-top:5%">
                    <p class="no-content">
                        <strong>{{trans('messages.notcreated')}}.</strong>
                        {{trans('messages.changethat')}}!
                        <br>
                        <b><a href="{{URL::to('start')}}">{{trans('messages.startproject')}}</a></b>
                    </p>
                </div>
                @else
                @if(isset($userprofile))
                 <ul class="dual-profile-left" id="poj_8">
                    @foreach($createdprojects as $created) 
                    @if($created->projectverified == 2)
                    <li class="eachli"><a href="{{URL::to('project/detail')}}/{{$created->id}}">
                            <div class="profile-li-top">
                                <img src="{{URL::to('')}}/{{$created->projectimage}}" onerror="this.src='{{URL::to('main/images/projectdefault.png');}}'">
                                <span class="grn-abs">{{{$created->title}}}<br><i>{{trans('messages.by')}}<br>{{{$created->firstname}}} {{{$created->lastname}}}</i></span>
                            </div>
                            <div class="profile-li-brtm">
                                <p class="">{{{$created->title}}}<br><i>{{trans('messages.by')}} {{{$created->firstname}}} {{{$created->lastname}}}</i></p>
                            </div>
                        </a>
                    </li>
                    @endif
                    @endforeach
                </ul>
                @else
                <span class="cret-sub-til" style="font-size: 17px;font-weight: bold; padding: 20px 0px 5px 12px;color:orange">{{trans('messages.draftprojects')}}</span>
                @if($projecttype['draftcount']==0)
                <span class="cret-sub-til" style='margin:0px 0px 50px 12px;'>{{trans('messages.noprojectsfound')}}.</span>               
                @else
                <ul class="dual-profile-left" id="poj_8">
                    @foreach($createdprojects as $created) 
                    @if($created->projectverified == 0)
                    <li class="eachli"><a href="{{URL::to('project/detail')}}/{{$created->id}}">
                            <div class="profile-li-top">
                                <img src="{{URL::to('')}}/{{$created->projectimage}}" onerror="this.src='{{URL::to('main/images/projectdefault.png');}}'">
                                <span class="grn-abs">{{{$created->title}}}<br><i>{{trans('messages.by')}}<br>{{{$created->firstname}}} {{{$created->lastname}}}</i></span>
                            </div>
                            <div class="profile-li-brtm">
                                <p class="">{{{$created->title}}}<br><i>{{trans('messages.by')}} {{{$created->firstname}}} {{{$created->lastname}}}</i></p>
                            </div>
                        </a>
                    </li>
                    @endif
                    @endforeach
                </ul>
                @endif

                <span class="cret-sub-til" style="font-size: 17px;font-weight: bold; padding: 20px 0px 5px 12px;color:orange">{{trans('messages.pendingprojects')}}</span>
                @if($projecttype['pendingcount']==0)
                <span class="cret-sub-til" style='margin:0px 0px 50px 12px;'>{{trans('messages.noprojectsfound')}}.</span>               
                @else
                <ul class="dual-profile-left" id="poj_8">
                    @foreach($createdprojects as $created) 
                    @if($created->projectverified == 1)
                    <li class="eachli"><a href="{{URL::to('project/detail')}}/{{$created->id}}">
                            <div class="profile-li-top">
                                <img src="{{URL::to('')}}/{{$created->projectimage}}" onerror="this.src='{{URL::to('main/images/projectdefault.png');}}'">
                                <span class="grn-abs">{{{$created->title}}}<br><i>{{trans('messages.by')}}<br>{{{$created->firstname}}} {{{$created->lastname}}}</i></span>
                            </div>
                            <div class="profile-li-brtm">
                                <p class="">{{{$created->title}}}<br><i>{{trans('messages.by')}} {{{$created->firstname}}} {{{$created->lastname}}}</i></p>
                            </div>
                        </a>
                    </li>
                    @endif
                    @endforeach
                </ul>
                @endif

                <span class="cret-sub-til" style="font-size: 17px;font-weight: bold; padding: 20px 0px 5px 12px;color:#2BDE73">{{trans('messages.liveprojects')}}</span>
                @if($projecttype['livecount']==0)
                <span class="cret-sub-til" style='margin:0px 0px 50px 12px;'>{{trans('messages.noprojectsfound')}}.</span>               
                @else
                <ul class="dual-profile-left" id="poj_8">
                    @foreach($createdprojects as $created) 
                    @if($created->projectverified == 2)
                    <li class="eachli"><a href="{{URL::to('project/detail')}}/{{$created->id}}">
                            <div class="profile-li-top">
                                <img src="{{URL::to('')}}/{{$created->projectimage}}" onerror="this.src='{{URL::to('main/images/projectdefault.png');}}'">
                                <span class="grn-abs">{{{$created->title}}}<br><i>{{trans('messages.by')}}<br>{{{$created->firstname}}} {{{$created->lastname}}}</i></span>
                            </div>
                            <div class="profile-li-brtm">
                                <p class="">{{{$created->title}}}<br><i>{{trans('messages.by')}} {{{$created->firstname}}} {{{$created->lastname}}}</i></p>
                            </div>
                        </a>
                    </li>
                    @endif
                    @endforeach
                </ul>
                @endif
                <span class="cret-sub-til" style="font-size: 17px;font-weight: bold;padding: 20px 0px 5px 12px;color:red">{{trans('messages.suspendedprojects')}}</span>
                @if($projecttype['suspendedcount']==0)
                <span class="cret-sub-til" style='margin:0px 0px 50px 12px;'>{{trans('messages.noprojectsfound')}}.</span>               
                @else
                <ul class="dual-profile-left" id="poj_8">
                    @foreach($createdprojects as $created)  
                    @if ($created->projectverified == 3)
                    <li class="eachli"><a href="{{URL::to('project/detail')}}/{{$created->id}}">
                            <div class="profile-li-top">
                                <img src="{{URL::to('')}}/{{$created->projectimage}}" onerror="this.src='{{URL::to('main/images/projectdefault.png');}}'">
                                <span class="grn-abs">{{{$created->title}}}<br><i>{{trans('messages.by')}}<br>{{{$created->firstname}}} {{{$created->lastname}}}</i></span>
                            </div>
                            <div class="profile-li-brtm">
                                <p class="">{{{$created->title}}}<br><i>{{trans('messages.by')}} {{{$created->firstname}}} {{{$created->lastname}}}</i></p>
                            </div>
                        </a>
                    </li>
                    @endif
                    @endforeach
                </ul>
                @endif
                
                <span class="cret-sub-til" style="font-size: 17px;font-weight: bold;padding: 20px 0px 5px 12px;color:red">{{trans('messages.expiredprojects')}}</span>
                <?php $count = 0; ?>
                <ul class="dual-profile-left" id="poj_8">
                    @foreach($createdprojects as $created)
                    @if($created->dayscount <0 && $created->projectverified==2)
                    <li class="eachli"><a href="{{URL::to('project/detail')}}/{{$created->id}}">
                            <div class="profile-li-top">
                                <img src="{{URL::to('')}}/{{$created->projectimage}}" onerror="this.src='{{URL::to('main/images/projectdefault.png');}}'">
                                <span class="grn-abs">{{{$created->title}}}<br><i>{{trans('messages.by')}}<br>{{{$created->firstname}}} {{{$created->lastname}}}</i></span>
                            </div>
                            <div class="profile-li-brtm">
                                <p class="">{{{$created->title}}}<br><i>{{trans('messages.by')}} {{{$created->firstname}}} {{{$created->lastname}}}</i></p>
                            </div>
                        </a>
                    </li>
                    <?php $count++; ?>
                    @endif
                    @endforeach
                    @if($count==0)
                    <span class="cret-sub-til" style='margin:0px 0px 50px 12px;text-align: left;'>{{trans('messages.noprojectsfound')}}.</span>   
                    @endif 
                    @endif
                    @endif
            </div>

        </div>
    </div>
</section>

<div class="modal modal-profile fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">{{trans('messages.aboutcreator')}}</h4>
            </div> <!-- /.modal-header -->

            <div class="modal-body">

                <div class="profile-sections">
                    <img src="{{URL::to('')}}/{{$details->image}}" onerror="this.src='{{URL::to('main/images/default.png')}}'" style="width: 150px;height: 150px;float: left;"></a>
                    <div class="left-conten">
                        <h2>{{$details->firstname}} {{$details->lastname}}</h2>
                        <h6>{{$details->state}},{{$details->country}}</h6>
                    </div>
                </div>
                <div class="col-md-8">

                    <div class="profile-ciontent">
                        <p>
                            {{$details->biography}}
                        </p>

                    </div>

                    <div class="websit-link mobile-hide">
                        <h4 class="text-links-title">{{trans('messages.websites')}}</h4>
                        <ul class="links list h5 bold">
                            <li>
                                <a  href="{{$details->weburl}}">{{$details->weburl}}</a>
                            </li>                            
                        </ul>
                    </div>

                </div>
                <div class="col-md-4">
                    <ul class="popup-right">
                        <li><i class="fa fa-check"></i><span>{{$details->firstname}} {{$details->lastname}}</span></li>
                        <li><i class="fa fa-lock"></i><span>{{trans('messages.lastlogin')}} {{date("jS F, Y", strtotime($details->lastlogindate));}}</span></li>
                        <li>@if($details->logintype=="facebook")<i class="fa fa-facebook-square" style="color: #3b5998;"></i><span>{{$details->firstname}} {{$details->lastname}}</span>@else<i class="fa fa-facebook-square"></i><span>{{trans('messages.notconnected')}} </span>@endif</li>
                        <li><i class="fa fa-envelope"></i><span>{{trans('messages.email')}} {{$details->email}} </span></li>
                        <li><i class="fa fa-phone"></i><span>Mobile {{$details->mobile}}</span></li>
                        <li><i class="fa fa-star"></i><span>{{$details->createdcount}} {{trans('messages.created')}} , {{$details->backedcount}} {{trans('messages.backed')}}  </span></li>
                        <li><i class="fa fa-bell "></i><span>{{$details->followerscount}} {{trans('messages.followers')}} , {{$details->followingcount}} {{trans('messages.following')}}  </span></li>
                    </ul>
                </div>


            </div> <!-- /.modal-body -->

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stop


