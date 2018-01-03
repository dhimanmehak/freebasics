@extends('layouts.mainlayout')
@section('content')


<script type="text/javascript">

    $(window).scroll(function() {

    var styledDiv = $('.tabbable-line-ful'),
            targetScroll = $('#styledDiv').position().top,
            currentScroll = $('html').scrollTop() || $('body').scrollTop();
            styledDiv.toggleClass('fixedPos', currentScroll >= targetScroll);
    });
            $(window).scroll(function() {

    var styledDiv2 = $('.float-right'),
            targetScroll2 = $('#tochg-span').position().top,
            currentScroll1 = $('html').scrollTop() || $('body').scrollTop();
            styledDiv2.toggleClass('anieffect', currentScroll1 >= targetScroll2);
    });</script>
<section>

    <style>

        .fixedPos {
            position: fixed;
            top:0px;
            background: #fff;
            z-index: 9;
        }
        .green{
            color:#17aa56;
        }
        .follow-btn{
            color: #999;text-decoration: none;border:none;background:none;font-weight:bold;
        }
        .follow-btn:hover{
            color: #333;
        }
    </style>

    <section>

        <div>

    </section>
    <div class="detail-page">

        <div class="detail-top">
            <div class="container">
                @if(Session::has('failed'))
                <div class="alert-message error">
                    {{Session::get('failed');}}
                </div>
                @endif

                @if(Session::has('success'))
                <div class="alert-message success">
                    {{Session::get('success');}}
                </div>
                @endif
                <div class="title-lined">
                    <span>{{{$project->title}}}</span>
                    <p>by <a class="See-full-bio-popup" href="#" data-toggle="modal" data-target="#profileModal">{{{$project->firstname}}} {{{$project->lastname}}}</a></p>
                </div>
                <input type="hidden" name="ajaxprojectid" id="ajaxprojectid" value="{{$project->id}}" />
                <?php $unserilize = unserialize($project->privilege); ?>
                <div class="col-md-8">
                    <div class="banner-cont">
                        <?php
                        if ($project->projectvideo != '') {
                            $array = explode('/', $project->projectvideo);
                            ?>
                            @if(Str::contains("www.youtube.com",$array))
                            <iframe src="{{$project->projectvideo}}" width="100%" height="480px" frameborder="0" allowfullscreen></iframe>
                            @else 
                            <?php
                            $explodedata = explode('.', $array[4]);
                            if ($explodedata[1] == 'JPEG' || $explodedata[1] == 'PNG' || $explodedata[1] == 'GIF' || $explodedata[1] == 'BMP' ||
                                    $explodedata[1] == 'jpeg' || $explodedata[1] == 'png' || $explodedata[1] == 'gif' || $explodedata[1] == 'bmp' || $explodedata[1] == 'jpg') {
                                ?>
                                <img class="preview" id="img" style="width:100%;height:100%;" src="{{URL::to('');}}/{{$project->projectvideo}}" >
                            <?php } else { ?>
                                <video width="100%" height="100%" controls>
                                    <source src="{{URL::to('');}}/{{$project->projectvideo}}" >
                                    {{trans('messages.novideosupport')}}.
                                </video>
                            <?php } ?>
                            @endif
                        <?php } else { ?>
                            <img class="preview" id="img" style="width:100%;height:100%;" src="{{URL::to('main/images/projectdefault.png');}}" >
                        <?php } ?>
                        <div class="content-btm">
                            <p class="h3 mb3"> {{{$project->shortblurb}}} </p>
                            <div class="h5">
                                <a class="grey-dark mr3 nowrap" href="{{URL::to('project/country')}}/{{$project->countryname}}">
                                    <span class="glyphicon glyphicon-map-marker"></span>
                                    <b>{{$project->countryname}}</b>
                                </a>
                                <a class="grey-dark mr3 nowrap" href="{{URL::to('discover/category')}}/{{$project->categoryid}}/magic">
                                    <span class="glyphicon glyphicon-tag"></span>
                                    <b>{{$project->categoryname}}</b>
                                </a>
                                <?php
                                $replace_str = array('"', "'", ",");
                                $shortblurb = str_replace($replace_str, "", $project->shortblurb);
                                ?>
                                @if(Session::has('userid'))
                                <a id="project_share" class="button button_small button_outline button_outline_grey" href="javascript:fbShare('{{URL::to("project/detail")}}/{{$project->id}}?referral={{Session::get("userid")}}','{{{$project->title}}}', '{{{$shortblurb}}}', '{{URL::to('')}}/{{$project->projectimage}}', 520, 350)"><i class="fa fa-facebook"></i> {{trans('messages2.share')}}</a>
                                @else
                                <a id="project_share" class="button button_small button_outline button_outline_grey" href="javascript:fbShare('{{URL::to('project/detail')}}/{{$project->id}}','{{{$project->title}}}', '{{{$shortblurb}}}', '{{URL::to('')}}/{{$project->projectimage}}', 520, 350)"><i class="fa fa-facebook"></i> {{trans('messages2.share')}}</a>
                                @endif

                                @if(Session::has('userid'))
                                <a id="project_share" class="button button_small button_outline button_outline_grey" href="javascript:twtShare('{{URL::to("project/detail")}}/{{$project->id}}?referral={{Session::get("userid")}}','{{{$project->title}}}', '{{{$shortblurb}}}', '{{URL::to('')}}/{{$project->projectimage}}', 520, 350)"><i class="fa fa-twitter"></i> {{trans('messages2.share')}}</a>
                                @else
                                <a id="project_share" class="button button_small button_outline button_outline_grey" href="javascript:twtShare('{{URL::to('project/detail')}}/{{$project->id}}','{{{$project->title}}}', '{{{$shortblurb}}}', '{{URL::to('')}}/{{$project->projectimage}}', 520, 350)"><i class="fa fa-twitter"></i> {{trans('messages2.share')}}</a>
                                @endif

                                @if(Session::has('userid'))
                                <a class="button button_small button_outline button_outline_grey" href="{{URL::to('likeproject')}}/{{Session::get('email')}}/{{$project->id}}" @if($liked!='')style="border-color:#98B50B;color: #98B50B;"@endif title="Like this"><i class="fa fa-thumbs-up"></i> {{$likes}}</a>
                                @endif

                                @if(Session::has('userid'))
                                @if($followproject =='')
                                <a class="button button_small button_outline button_outline_grey" href="{{URL::to('followproject')}}/{{Session::get('email')}}/{{$project->id}}" title="Follow this"><i class="fa fa-paper-plane"></i> {{trans('messages.follow')}}</a>
                                @else 
                                <a class="button button_small button_outline button_outline_grey" href="{{URL::to('followproject')}}/{{Session::get('email')}}/{{$project->id}}" title="Follow this" style="border-color: #98B50B;color: #98B50B;"><i class="fa fa-paper-plane"></i> {{trans('messages.following')}} </a>
                                @endif
                                @endif
                            </div>
                        </div>
                    </div>
                 
                </div>

                <div class="col-md-4">
                    <ul class="top-beting">
                        <li>
                            <h1 class="top-tiles">{{$project->totalbacking}}</h1>
                            <span class="bold h5">{{trans('messages.backers')}}</span>
                        </li>

                        <li>
                            <h1 class="top-tiles">{{$project->currencysymbol}} {{round((($project->totalpledgeamount*$project->rate)*100)/100)}}</h1>
                            <span class="bold h5">{{trans('messages.pledgedof')}} {{$project->currencysymbol}} {{round((($project->fundinggoal*$project->rate)*100)/100)}} {{trans('messages.goal')}}</span>
                        </li>

                        <li>
                            @if($project->dayscount>0)
                            <h1 class="top-tiles">{{$project->dayscount}}</h1>
                            <span class="bold h5">{{trans('messages.daystogo')}}</span>
                            @else
                            <?php
                            $count = $project->dayscount;
                            $result = str_replace('-', '', $count);
                            ?>
                            <h1 class="top-tiles">{{$result}}</h1>
                            <span class="bold h5">{{trans('messages.daysago')}}</span>
                            @endif
                        </li>
                        @if(round((($project->totalpledgeamount/$project->fundinggoal)*100)>=100)&&($project->dayscount<0))
                        <li>
                            <div class="border-left-thick border-green pl2 py2">
                                <h3 class="normal mb1">{{trans('messages.funded')}}!</h3>
                                <p class="mb0 h5">
                                    {{trans('messages.projectsucessfullyfunded')}}.
                                </p>
                            </div>
                        </li>
                        <li><span class="sm-text">{{trans('messages.projectfundedon')}} {{substr($project->enddate,0,10)}} </span></li>

                        @elseif(round((($project->totalpledgeamount/$project->fundinggoal)*100)<100)&&($project->dayscount<0))

                        <li>
                            <div class="border-left-thick border-red pl2 py2">
                                <h3 class="normal mb1">{{trans('messages.expired')}}!</h3>
                                <p class="mb0 h5">
                                    {{trans('messages.projectexpired')}}.
                                </p>
                            </div>
                        </li>
                        <li><span class="sm-text">{{trans('messages.projectexpiredon')}} {{substr($project->enddate,0,10)}} </span></li>

                        @elseif(round((($project->totalpledgeamount/$project->fundinggoal)*100)>=100)&&($project->dayscount>=0))

                        <li>
                            @if(Session::get('email')=='')
                            <a  href=".success-login" data-toggle="modal" class="pro-btn">{{trans('messages.backthisproject')}}</a>
                            @else
                            <a class="pro-btn" href="{{URL::to('back/reward/')}}/{{$project->id}}">{{trans('messages.backthisproject')}}</a>
                            @endif
                            <form method="post" action="{{URL::to('poststarred')}}">
                                <input type="hidden" value="{{$project->id}}" name="projectid">
                                <button class="flo-ri @if($starred!='') green @endif" type="submit" style="  margin-top: -42px;  background: transparent;  border: none;">
                                    <span class="fa fa-star"></span>  
                                    <span class="text"> Remind me </span>
                                </button>
                            </form>
                        </li>
                        <li><span class="sm-text">{{trans('messages.projectwillbefundedon')}} {{substr($project->enddate,0,10)}} </span></li>
                        @else
                        <li>
                            @if(Session::get('email')=='')
                            <a  href=".success-login" data-toggle="modal" class="pro-btn">{{trans('messages.backthisproject')}}</a>
                            @else
                            <a class="pro-btn" href="{{URL::to('back/reward/')}}/{{$project->id}}">{{trans('messages.backthisproject')}}</a>
                            @endif
                            <form method="post" action="{{URL::to('poststarred')}}">
                                <input type="hidden" value="{{$project->id}}" name="projectid">
                                <button class="flo-ri @if($starred!='') green @endif" type="submit" style="  margin-top: -42px;  background: transparent;  border: none;">
                                    <span class="fa fa-star"></span>  
                                    <span class="text">{{trans('messages.remindme')}}</span>
                                </button>
                            </form>
                        </li>
                        <li><span id="detection"></span></li>
                        <li><span class="sm-text">{{trans('messages.projectwillonlybefunded')}} {{trans('messages.if')}} {{$project->currencysymbol}}{{round(($project->fundinggoal*$project->rate)*100)/100}} {{trans('messages.ispledgedby')}} {{substr($project->enddate,0,10)}} </span></li>
                        @endif
                    </ul>

                    <div class="botm-cntnt">
                        <span id="tochg-span"></span>
                        <div class="botm-cntnt-left">
                            <ul>
                                <li><h4><a class="See-full-bio-popup" href="#" data-toggle="modal" data-target="#profileModal">{{$project->firstname}} {{$project->lastname}}</a></h4></li>
                                <li><p class="h5 mb0">
                                        <span class="inline-block">
                                            <a class="grey-dark bold remote_modal_dialog" style='cursor:pointer' data-toggle="modal" data-target="#CreatedeModal">{{count($creatorcreated)}} {{trans('messages.created')}}</a>
                                            <span class="grey-dark"> | </span>
                                        </span>
                                        <span class="inline-block">
                                            @if($project->backedcount==0){{$project->backedcount}} {{trans('messages.backed')}} @else <a class="grey-dark bold remote_modal_dialog" data-dismiss="modal"  href="#" data-toggle="modal" data-target="#BackedModal"> {{count($creatorbacked)}} {{trans('messages.backed')}} </a>@endif
                                        </span>
                                    </p></li>
                                <?php if (isset($unserilize['Website']) == "" && isset($unserilize['Website']) != "on") { ?>
                                    <li class="globle-1"><i class="fa fa-globe"></i><a href="{{$project->website}}" target='_blank'>{{$project->weburl}}</a></li>
                                <?php } ?>
                            </ul>
                        </div>

                        <div class="botm-cntnt-right">
                            <a class="See-full-bio-popup" href="#" data-toggle="modal" data-target="#profileModal"><img src="{{URL::to('')}}/{{$project->image}}" onerror="this.src='{{URL::to('main/images/default.png')}}'"></a>
                        </div>

                        <a class="See-full-bio-popup" href="#" data-toggle="modal" data-target="#profileModal">{{trans('messages.seefullprofile')}}</a>
                        @if($project->userid!= $userid)<a class="Contact-me-popup" href="#" data-toggle="modal" data-target="#ContactModal">{{trans('messages.contactme')}}</a>@endif

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="tab-content-full">
        <div class="tabbable-panel">
            <div class="tabbable-line">

                <div id="styledDiv"></div>
                <div id="tabbable-line-ful" class="tabbable-line-ful">
                    <div class="container">

                        <ul class="nav nav-tabs "> 
                            <li class="active">
                                <a data-toggle="tab" href="#tab_default_1"> {{trans('messages.campaign')}} </a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#tab_default_2" > {{trans('messages.updates')}}({{count($updates)}})</a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#tab_default_3" id="commenttab"> {{trans('messages.comments')}} ({{count($comments)}})</a>
                            </li>
                            @if($project->dayscount>=0)
                            <div class="float-right">
                                @if(Session::get('email')=='')
                                <a  href=".success-login" data-toggle="modal" class="pro-btn">{{trans('messages.backthisproject')}}</a>
                                @else
                                <a class="pro-btn" href="{{URL::to('back/reward/')}}/{{$project->id}}">{{trans('messages.backthisproject')}}</a>
                                @endif
                                <form method="post" action="{{URL::to('poststarred')}}">
                                    <input type="hidden" value="{{$project->id}}" name="projectid">
                                    <button class="flo-ri @if($starred!='') green @endif" type="submit" style="  background: transparent;  border: none;">
                                        <span class="fa fa-star"></span>  
                                        <span class="text">{{trans('messages.remindme')}}</span>
                                    </button>
                                </form>
                            </div>
                            @endif
                        </ul>

                    </div>

                </div>

                <div class="container">
                    <div class="tab-content">
                        <div id="tab_default_1" class="tab-pane  active">
                            <div class="col-sm-8">
                                <h3 class="detail-head">{{trans('messages.aboutproject')}}</h3><br><br>                                
                                {{$project->description}}
                                <h3 class="detail-head">{{trans('messages.risksandchallenges')}}</h3><br><br>
                                {{$project->risks}}

                                <ul class="faq-ask-box" style="margin-top:20px;">

                                    <li><h3 class="detail-head">{{trans('messages.faq')}}</h3> </li>

                                    @foreach($faqs as $faq)
                                    <li style="margin-bottom:5px;"><b>{{$faq->question}}</b></li>
                                    <li style="margin-bottom:20px;">{{$faq->answer}}</li>
                                    @endforeach


                                    <li>
                                        <strong>{{trans('messages.haveaquestion')}}?</strong>
                                        {{trans('messages.doesnothelp')}},{{trans('messages.creatordirectly')}}.
                                        </p>
                                    </li>                                      
                                    <li> 
                                        <a class="gru-btns Contact-me-popup" href="#" data-toggle="modal" @if($project->userid!= $userid) data-target="#FAQModal" @endif>{{trans('messages.askaquestion')}}</a>
                                    </li>
                                    <li>
                                        <a id="reportk" class="reportk Contact-me-popup" href="#" data-toggle="modal" @if($project->userid!= $userid) data-target="#ReportModal" @endif>{{trans('messages.reportthisproject')}}</a>
                                    </li>

                                </ul>
                            </div>

                            <div class="col-sm-4">

                                <h3 class="detail-head">{{trans('messages.rewards')}}</h3>
                                @foreach($rewards as $reward)
                                <div class="reward-set">
                                    @if((($reward->islimited==1)&&($reward->quantity>$reward->backerscount))||($reward->islimited==0))
                                    @if($project->dayscount>=0)   
                                    @if(Session::get('email')=='')
                                    <a  href=".success-login" data-toggle="modal">
                                        <div class="reward-hover-outer">
                                            <div class="reward-hover-middle">
                                                <div class="reward-hover-inner">
                                                    <div class="reward-set-hover">{{trans('messages.selectreward')}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    @else
                                    <a href="{{URL::to('back/reward/')}}/{{$project->id}}/{{$reward->id}}/{{round(($reward->pledgeamount*$project->rate)*100)/100}}">
                                        <div class="reward-hover-outer">
                                            <div class="reward-hover-middle">
                                                <div class="reward-hover-inner">
                                                    <div class="reward-set-hover">{{trans('messages.selectreward')}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    @endif
                                    @endif
                                    @endif
                                    <div class="reward-set-holder">

                                        <h5 class="mb1"> {{trans('messages.pledge')}} {{$project->currencysymbol}} {{round(($reward->pledgeamount*$project->rate)*100)/100}} {{trans('messages.ormore')}} </h5>
                                        <p class="backers-limits">
                                            <span class="backers-wrap h6 bold">
                                                <span class="num-backers mr1"> {{$reward->backerscount}} {{trans('messages.backers')}} </span>
                                            </span>
                                            @if($reward->islimited==1)
                                            @if($reward->quantity==$reward->backerscount)
                                            <span style='font-size: 13px; padding: 5px;  background: #000; color: #fff;'>
                                                <span class="limited-number" style='color:#FFF !important;'>{{trans('messages.allgone')}}!</span>
                                            </span>                                            
                                            @else
                                            <span class="bg-yellow " style='font-size: 13px; padding: 5px;'>
                                                <span class="limited-number">{{trans('messages.limited')}} ({{$reward->quantity-$reward->backerscount}} {{trans('messages.leftof')}} {{$reward->quantity}})</span>
                                            </span>
                                            @endif
                                            @endif
                                        </p><br>
                                        <div class="desc h5 mb2 break-word">
                                            <p>{{{$reward->description}}}</p>
                                        </div>
                                        <div class="shipping-wrap">
                                            <div class="delivery-date h6">
                                                <b>{{trans('messages.estimateddelivery')}}:</b>
                                                <time class="js-adjust-time" ><?php
                                                    //$date = explode('-', $reward->estimateddelivery);
                                                    //echo $delivery = date("M", mktime(0, 0, 0, $date[0])) . ' ' . $date[1];
                                                    ?> {{$reward->estimateddelivery}} </time>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @endforeach

                            </div>

                        </div>

                        <div id="tab_default_2" class="tab-pane">
                            <div class="col-md-7">
                                <ul class="coment-1">
                                    @if($updates=='[]')
                                    <p style='padding: 20px;background: #eee;margin-bottom: 20px;'>{{trans('messages2.noupdatesfound')}}.</p>
                                    @else
                                    @foreach($updates as $key=>$update)
                                    <li>
                                        <div class="clearfix">

                                            <div class="left">
                                                <p class="update-number h5 bold">
                                                    <a class="green no-wrap" href="#">{{trans('messages.update')}} #{{$key+1}} </a>
                                                </p>
                                            </div>

                                            <div class="right">
                                                <p class="published h6 grey-dark">
                                                    <time class="js-adjust-time" datetime="" data-format=""> <?php echo date("jS F, Y", strtotime($update->postedon)); ?></time>
                                                </p>
                                            </div>

                                        </div>
                                        <img class="preview" id="img" style="width:100%;height:100%;" src="{{URL::to('main/images/projectdefault.png');}}" >        
                                        <h2 class="normal title">
                                            <a class="green-dark" href="#">{{{$update->title}}}</a>
                                        </h2>


                                        <div class="full-description js-full-description responsive-media formatted-lists">
                                            {{$update->description}}
                                        </div>

                                    </li>
                                    <hr>
                                    @endforeach     
                                    @endif
                                </ul>
                            </div></div>

                        <div id="tab_default_3" class="tab-pane" >
                            <div class="col-md-7" style='  margin-bottom: 5%;'>
                                <ul class="coment-area">
                                    @if($comments=='[]')
                                    <p  style='padding: 20px;background: #eee;margin-bottom: 20px;'>{{trans('messages2.nocommentsfound')}}.</p>
                                    @else
                                    @foreach($comments as $comment)
                                    <li style="  background: #eee;padding-left: 20px;margin-bottom: 2%;">
                                        <div class="ing-left">
                                            <a @if($comment->username!='')href="{{URL::to('')}}/profile/{{$comment->username}}" @else href="javascript:void(0);" @endif><img src="{{URL::to('')}}/{{$comment->image}}" alt="image" onerror="this.src='{{URL::to('main/images/default.png')}}'"></a>
                                        </div>
                                        <div class="ing-rit">
                                            <h3>
                                                <a class="author green-dark" @if($comment->username!='')href="{{URL::to('')}}/profile/{{$comment->username}}" @else href="javascript:void(0);" @endif>{{{$comment->firstname}}} {{{$comment->lastname}}}</a>
                                                <span class="date normal h6">
                                                    <span>posted on <?php echo date("jS F, Y", strtotime($comment->postedon)); ?></span>
                                                    <?php $email = Session::get('email'); ?>
                                                    @if($comment->email==$email)
                                                    <a class="grey-dark" onclick="confirmation('{{$comment->id}}')" style="position: absolute; margin-top: -4%;margin-left: 32%;font-size:20px;cursor: pointer;">
                                                        <i class="fa fa-close" ></i>
                                                    </a>
                                                    @endif
                                                </span>
                                            </h3>
                                            <p>{{{$comment->comment}}}</p>
                                        </div>
                                    </li>
                                    @endforeach
                                    @endif
                                </ul>
                                <?php $status = Session::get('email'); ?>
                                @if($status!='')
                                <ul>
                                    <li>
                                        <form method='post' action='{{URL::to('project/postcomment')}}'>
                                            <input type='hidden' value='{{$project->id}}' name='projectid'>
                                            <input type='hidden' value='{{$userid}}' name='userid'>
                                            <input type="hidden" value="{{Session::get('locale')}}" name="language" id="language">
                                            <textarea name='comment' oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required></textarea>
                                            <input type='submit' name='post' value='{{trans('messages2.post')}}' class='button button_green submit' style='float:right'/>
                                        </form>
                                    </li>
                                </ul>
                                @else
                                <h3>
                                    {{trans('messages.logintocomment')}}!<br> <a  href=".success-login" data-toggle="modal" class="button button_small button_outline button_outline_green">{{trans('messages.clickhere')}} {{trans('messages.smallto')}} {{trans('messages.login')}}</a>
                                </h3>
                                @endif

                                <!-- facebook comments -->
                                <div class="fb-comments" data-href="http://quickiz.com/fundstarter/project/detail/{{$project->id}}" data-width="600" data-numposts="10"></div>
                                <!-- facebook comments -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- /.forgot password container -->

@if(Session::has('email'))
<div class="modal modal-forg fade" id="ContactModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">{{trans('messages.sendmessage')}} {{trans('messages.smallto')}} {{$project->firstname}} {{$project->lastname}}</h4>
            </div> <!-- /.modal-header -->
            <div class="modal-body">
                <span><b>{{trans('messages.to')}}:</b></span> {{{$project->firstname}}} {{{$project->lastname}}}<br>
                <form class="pop-forms" style="margin-top: 20px;" method='post' action='{{URL::to('postmessage')}}' >
                    <input type="hidden" value="{{$project->userid}}" name="recieverid"> 
                    <textarea name="message" rows="5" required=""></textarea>
                    <input class="popup-btn" value="{{trans('messages.sendmessage')}}" type="submit">
                </form>
            </div> <!-- /.modal-body -->
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
<!-- /.profile-popup-->
<!-- /.forgot password container -->

@if(Session::has('email'))
<div class="modal modal-forg fade" id="FAQModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">{{trans('messages.sendmessage')}} {{trans('messages.smallto')}} {{$project->firstname}} {{$project->lastname}}</h4>
            </div> <!-- /.modal-header -->

            <div class="modal-body">
                <span><b>{{trans('messages.to')}}:</b></span> {{{$project->firstname}}} {{{$project->lastname}}}<br>
                <form class="pop-forms" style="margin-top: 20px;" method='post' action='{{URL::to('postmessage')}}'>
                    <input type="hidden" value="{{$project->userid}}" name="recieverid"> 
                    <textarea name="message" rows="5" required="" placeholder="{{trans('messages.message')}}"></textarea>
                    <input class="popup-btn" value="{{trans('messages.sendmessage')}}" type="submit">
                </form>


            </div> <!-- /.modal-body -->

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@else
<div class="modal modal-forg fade" id="FAQModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
<!-- /.profile-popup-->


<div class="modal modal-profile fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">{{trans('messages.aboutcreator')}}</h4>
            </div> <!-- /.modal-header -->

            <div class="modal-body">

                <div class="profile-sections">
                    <img src="{{URL::to('')}}/{{$project->image}}" onerror="this.src='{{URL::to('main/images/default.png')}}'" style="width: 150px;height: 150px;float: left;"></a>
                    <div class="left-conten">
                        <a @if($project->username!='')href="{{URL::to('')}}/profile/{{$project->username}}" @else href="#" @endif><h2>{{{$project->firstname}}} {{{$project->lastname}}}</h2></a>
                        <h6>{{$project->state}},{{$project->country}}</h6>
                    </div>
                </div>
                <div class="col-md-8">
                    <?php if (isset($unserilize['Bio-Graphy']) == "" && isset($unserilize['Bio-Graphy']) != "on") { ?>
                        <div class="profile-ciontent">
                            <p>
                                {{$project->biography}}
                            </p>
                        </div>
                    <?php } ?>
                    <?php if (isset($unserilize['Email']) == "" && isset($unserilize['Email']) != "on") { ?>
                        <div class="websit-link mobile-hide">
                            <h4 class="text-links-title">{{trans('messages.email')}}</h4>
                            <ul class="links list h5 bold">
                                <li>
                                    <p>{{$project->email}}</p>
                                </li>  
                            </ul>
                        </div>
                    <?php } ?>
                    <?php if (isset($unserilize['Website']) == "" && isset($unserilize['Website']) != "on" && $project->weburl != "") { ?>
                        <div class="websit-link mobile-hide">
                            <h4 class="text-links-title">{{trans('messages.websites')}}</h4>
                            <ul class="links list h5 bold">
                                <li>
                                    <a  href="{{$project->website}}" target='_blank'>{{$project->weburl}}</a>
                                </li>  

                            </ul>
                        </div>
                    <?php } ?>
                    @if(Session::has('email') && (Session::get('email')!=$project->email))
                    <div class=" mobile-hide websit-link" style='margin-top:20px;'>
                        <h4 class="text-links-title">{{trans('messages.followcreator')}}</h4>
                        <ul class="links list h5 bold">
                            <li>  
                                @if($follow=='')
                                <a href="{{URL::to('followcreator')}}/{{Session::get('email')}}/{{$project->userid}}" class='follow-btn'>
                                    <i class='fa fa-plus-square'></i> {{trans('messages.follow')}}</a>
                                @else
                                <a href="{{URL::to('followcreator')}}/{{Session::get('email')}}/{{$project->userid}}" class="btn_gray" href="#"><i class='fa fa-check'></i>
                                    {{trans('messages.following')}}</a>
                                @endif
                            </li>  

                        </ul>
                    </div>
                    @endif
                </div>
                <div class="col-md-4">
                    <ul class="popup-right">
                        <li><i class="fa fa-check"></i><a href="#" data-toggle="tooltip" data-placement="top" title="Username is been verified the identity"><span>{{{$project->firstname}}} {{{$project->lastname}}}</span></a></li>
                        <li><i class="fa fa-lock"></i><span>Last login {{date("jS F, Y", strtotime($project->lastlogindate));}}</span></li>
                        <?php if (isset($unserilize['Mobile']) == "" && isset($unserilize['Mobile']) != "on" && $project->mobile != '') { ?>
                            <li><i class="fa fa-phone"></i><span>Mobile {{$project->mobile}}</span></li>
                        <?php } ?>
                        <li>@if($project->logintype=="facebook")<i class="fa fa-facebook-square" style="color: #3b5998;"></i><span>{{$project->firstname}} {{$project->lastname}}</span>@else<i class="fa fa-facebook-square"></i><span>{{trans('messages.notconnected')}} </span>@endif</li>
                        <li><i class="fa fa-star"></i><a data-dismiss="modal"  href="#" data-toggle="modal" data-target="#CreatedeModal"><span>{{count($creatorcreated)}} {{trans('messages.created')}} </span></a>, <a data-dismiss="modal"  href="#" data-toggle="modal" data-target="#BackedModal"><span>{{count($creatorbacked)}} {{trans('messages.backed')}}</span></a></li>
                        <li><i class="fa fa-bell "></i><span>{{$project->followerscount}} {{trans('messages.followers')}} , {{$project->followingcount}} {{trans('messages.following')}}  </span></li>

                        @if($project->userid!= $userid)<a class="gru-btns Contact-me-popup" data-dismiss="modal"  href="#" data-toggle="modal" data-target="#FAQModal">{{trans('messages.contactme')}}</a> @endif

                    </ul>

                </div>



            </div> <!-- /.modal-body -->

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@if(Session::has('email'))
<div class="modal modal-forg fade" id="ReportModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">{{trans('messages.sendmessage')}} {{trans('messages.smallto')}} Fundstarter</h4>
            </div> <!-- /.modal-header -->

            <div class="modal-body">
                <span><b>{{trans('messages.to')}}:</b></span> Fundstarter<br>
                <form class="pop-forms" style="margin-top: 20px;" method='post' action='{{URL::to('postfundstarter')}}' >
                    <input type="hidden" value="{{Session::get('name')}}" name="name"> 
                    <input type="hidden" value="{{Session::get('email')}}" name="email" > 
                    <input type="hidden" value="{{$project->id}}" name="mobile" > 
                    <input type="text" placeholder="{{trans('messages2.subject')}}" name="subject" style="width:100%;margin-bottom:20px;" required=""> 
                    <textarea name="message" rows="5" placeholder="{{trans('messages.message')}}" required=""></textarea>
                    <input class="popup-btn" value="{{trans('messages.sendmessage')}}" type="submit">
                </form>
            </div> <!-- /.modal-body -->

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@else
<div class="modal modal-forg fade" id="ReportModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

<div class="modal modal-forg fade" id="BackedModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">{{trans('messages.bigprojects')}} {{trans('messages.smallbacked')}} {{trans('messages.by')}} {{{$project->firstname}}} {{{$project->lastname}}}</h4>
            </div> <!-- /.modal-header -->

            <div class="modal-body" style="  max-height: 400px;">
                @foreach($creatorbacked as $backed)
                <div class="col-lg-6">
                    <div class="project-card project-card-tall-big" data-project="">
                        <div class="project-thumbnail">
                            <a href="{{URL::to('project/detail')}}/{{$backed->id}}">
                                <img class="project-thumbnail-img" width="100%" src="{{URL::to('')}}/{{$backed->projectimage}}" alt="Project image">
                            </a>
                        </div>
                        <div class="project-card-content">
                            <h6 class="project-title">
                                <a href="{{URL::to('project/detail')}}/{{$backed->id}}">{{{$backed->title}}}</a>
                            </h6>
                            <p class="project-byline">{{{$backed->firstname}}}</p>
                            <p class="project-blurb"> {{{$backed->shortblurb}}} </p>
                        </div>
                        <div class="project-card-footer">
                            <div class="project-location">
                                <a target="" href="{{URL::to('project/country')}}/{{$backed->countryname}}" data-location="">
                                    <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                                    <span class="location-name">{{$backed->countryname}}</span>
                                </a>
                                <span class="grey-dark" style='display: inline;margin-left: 20px;'><span class="fa fa-thumbs-up"> {{$backed->likes}}</span></span>
                            </div>
                            <div class="project-stats-container">
                                @if(round((($backed->totalpledgeamount/$backed->fundinggoal)*100)>=100)&&($backed->dayscount<0))
                                <div class="project-pledged-successful">
                                    <strong>{{trans('messages.successfullyfunded')}}!</strong>
                                </div>
                                @elseif(round((($backed->totalpledgeamount/$backed->fundinggoal)*100)<100)&&($backed->dayscount<0))
                                <div class="project-pledged-successful expired">
                                    <strong>{{trans('messages.expired')}}!</strong>
                                </div>
                                @else
                                <div class="project-progress-bar">
                                    <div class="project-percent-pledged" style="width: {{round(($backed->totalpledgeamount/$backed->fundinggoal)*100)}}%"></div>
                                </div>
                                @endif
                                <ul class="project-stats">
                                    <li>
                                        <div class="project-stats-value">{{round(($backed->totalpledgeamount/$backed->fundinggoal)*100)}}%</div>
                                        <span class="project-stats-label">{{trans('messages.smallfunded')}}</span>
                                    </li>
                                    <li>
                                        <div class="project-stats-value">
                                            <span class="money usd no-code">{{$backed->currencysymbol}}{{round(($backed->totalpledgeamount*$backed->rate)*100)/100}}</span>
                                        </div>
                                        <span class="project-stats-label">{{trans('messages.pledged')}}</span>
                                    </li>
                                    <li style="display: none;">
                                        <div class="project-stats-value">{{trans('messages.funded')}}</div>
                                        <span class="project-stats-label"> </span>
                                    </li>  
                                    @if(round((($backed->totalpledgeamount/$backed->fundinggoal)*100)>=100)&&($backed->dayscount<0))
                                    <li class="ksr_page_timer">
                                        <div class="project-stats-value text" data-word="left">{{trans('messages.bigfundedon')}}</div>
                                        <div class="project-stats-label">
                                            <div class="num">{{chop($backed->enddate,"00:00:00")}}</div>
                                        </div>                                        
                                    </li>
                                    @elseif(round((($backed->totalpledgeamount/$backed->fundinggoal)*100)<100)&&($backed->dayscount<0))
                                    <li class="ksr_page_timer">
                                        <div class="project-stats-value text " data-word="left">{{trans('messages.expiredon')}}</div>
                                        <div class="project-stats-label">
                                            <div class="num">{{chop($backed->enddate,"00:00:00")}}</div>
                                        </div>

                                    </li>
                                    @else
                                    <li class="ksr_page_timer">
                                        <div class="project-stats-value">
                                            <div class="num">{{$backed->dayscount}}</div>
                                        </div>
                                        <div class="project-stats-label text" data-word="left">{{trans('messages.daystogo')}}</div>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div> <!-- /.modal-body -->

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal modal-forg fade" id="CreatedeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">{{trans('messages.bigprojects')}} {{trans('messages.created')}} {{trans('messages.by')}} {{$project->firstname}} {{$project->lastname}}</h4>
            </div> <!-- /.modal-header -->

            <div class="modal-body" style="  max-height: 400px;">
                @foreach($creatorcreated as $backed)
                <div class="col-lg-6">
                    <div class="project-card project-card-tall-big" data-project="">
                        <div class="project-thumbnail">
                            <a href="{{URL::to('project/detail')}}/{{$backed->id}}">
                                <img class="project-thumbnail-img" width="100%" src="{{URL::to('')}}/{{$backed->projectimage}}" alt="Project image">
                            </a>
                        </div>
                        <div class="project-card-content">
                            <h6 class="project-title">
                                <a href="{{URL::to('project/detail')}}/{{$backed->id}}">{{{$backed->title}}}</a>
                            </h6>
                            <p class="project-byline">{{{$backed->firstname}}}</p>
                            <p class="project-blurb"> {{{$backed->shortblurb}}} </p>
                        </div>
                        <div class="project-card-footer">
                            <div class="project-location">
                                <a target="" href="{{URL::to('project/country')}}/{{$backed->countryname}}" data-location="">
                                    <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                                    <span class="location-name">{{$backed->countryname}}</span>
                                </a>
                                <span class="grey-dark" style='display: inline;margin-left: 20px;'><span class="fa fa-thumbs-up"> {{$backed->likes}}</span></span>
                            </div>
                            <div class="project-stats-container">
                                @if(round((($backed->totalpledgeamount/$backed->fundinggoal)*100)>=100)&&($backed->dayscount<0))
                                <div class="project-pledged-successful">
                                    <strong>{{trans('messages.successfullyfunded')}}!</strong>
                                </div>
                                @elseif(round((($backed->totalpledgeamount/$backed->fundinggoal)*100)<100)&&($backed->dayscount<0))
                                <div class="project-pledged-successful expired">
                                    <strong>{{trans('messages.expired')}}!</strong>
                                </div>
                                @else
                                <div class="project-progress-bar">
                                    <div class="project-percent-pledged" style="width: {{round(($backed->totalpledgeamount/$backed->fundinggoal)*100)}}%"></div>
                                </div>
                                @endif
                                <ul class="project-stats">
                                    <li>
                                        <div class="project-stats-value">{{round(($backed->totalpledgeamount/$backed->fundinggoal)*100)}}%</div>
                                        <span class="project-stats-label">{{trans('messages.smallfunded')}}</span>
                                    </li>
                                    <li>
                                        <div class="project-stats-value">
                                            <span class="money usd no-code">{{$backed->currencysymbol}}{{round(($backed->totalpledgeamount*$backed->rate)*100)/100}}</span>
                                        </div>
                                        <span class="project-stats-label">{{trans('messages.pledged')}}</span>
                                    </li>
                                    <li style="display: none;">
                                        <div class="project-stats-value">{{trans('messages.funded')}}</div>
                                        <span class="project-stats-label"> </span>
                                    </li>  
                                    @if(round((($backed->totalpledgeamount/$backed->fundinggoal)*100)>=100)&&($backed->dayscount<0))
                                    <li class="ksr_page_timer">
                                        <div class="project-stats-value text" data-word="left">{{trans('messages.bigfundedon')}}</div>
                                        <div class="project-stats-label">
                                            <div class="num">{{chop($backed->enddate,"00:00:00")}}</div>
                                        </div>                                        
                                    </li>
                                    @elseif(round((($backed->totalpledgeamount/$backed->fundinggoal)*100)<100)&&($backed->dayscount<0))
                                    <li class="ksr_page_timer">
                                        <div class="project-stats-value text " data-word="left">{{trans('messages.expiredon')}}</div>
                                        <div class="project-stats-label">
                                            <div class="num">{{chop($backed->enddate,"00:00:00")}}</div>
                                        </div>

                                    </li>
                                    @else
                                    <li class="ksr_page_timer">
                                        <div class="project-stats-value">
                                            <div class="num">{{$backed->dayscount}}</div>
                                        </div>
                                        <div class="project-stats-label text" data-word="left">{{trans('messages.daystogo')}}</div>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div> <!-- /.modal-body -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal -->
<div class="modal fade success-login" id="success-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-success">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 class="title-log">{{trans('messages.login')}}</h2>
            </div>
            <div class="modal-body">


                <div class="login">
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

                    <div class="login-container">
                        <div class="holder">

                            <form method="post" action="{{URL::to('dologin');}}">
                                <ol class="login-form">
                                    <li class="li1">
                                        <input id="user_session_email" class="input-text full-width js-auto_focus email @if($errors->has('email')) has-error @endif" type="email" placeholder="{{trans('messages.email')}}" name="email" autofocus="autofocus" value="{{ Input::old('email') }}">
                                        @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                                    </li>
                                    <li class="li1 relative">
                                        <div class="relative">
                                            <input id="user_session_password" class="input-text full-width js-auto_focus password @if($errors->has('password')) has-error @endif" type="password" placeholder="{{trans('messages.password')}}" name="password">
                                            @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
                                            <a class="forgt-pss" href="{{URL::to('user/forgotpassword');}}"> {{trans('messages.forgot')}}? </a>
                                        </div>
                                    </li>
                                    <li class="clearfix restlv">
                                        <div class="right remember-me">
                                            <div class="pt1">
                                                <input id="user_session_remember_me" class="checkbox" type="checkbox" name="remember">
                                                <label class="label-checkbox h5 grey-dark" for="user_session_remember_me">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="center">
                                            <input class="button button_green submit" style=' float:left' type="submit" value="{{trans('messages.logmein')}}!" name="commit">
                                        </div>
                                    </li>
                                </ol>
                            </form>
                            @if(Config::get(('adminconfig.facebooksecretkey')=='' || Config::get('adminconfig.facebookappid')=='') && (Config::get('adminconfig.consumerkey')=='' || Config::get('adminconfig.consumersecret')=='' || Config::get('adminconfig.accesstoken')=='' || Config::get('adminconfig.accesstokensecret')==''))
                            @else
                            <div class="lined">
                                <span class="divs"></span>
                                <span class="ortxt"> or </span>
                            </div>
                            @if(Config::get('adminconfig.facebooksecretkey')!='' && Config::get('adminconfig.facebookappid')!='')

                            <a href="{{URL::to('fblogin');}}" class="face-book">
                                <i></i>
                                <span>{{trans('messages.facebooklogin')}}</span>
                            </a>
                            @endif
                            @if(Config::get('adminconfig.consumerkey')!='' && Config::get('adminconfig.consumersecret')!='' && Config::get('adminconfig.accesstoken')!='' && Config::get('adminconfig.accesstokensecret')!='')
                            <span style="margin:20px;"></span>

                            <a href="{{URL::to('twitter/login');}}" class="face-book" style="background:#5EA9DD;background-image:none">
                                <i class="fa fa-twitter-square" style="background-image:none;font-size: 15px;"></i>
                                <span>{{trans('messages.twitterlogin')}}</span>
                            </a>
                            @endif                
                            @endif
                            <p class="disp-text grey-dark" style="width:64%;margin-left:18%;">
                                {{trans('messages.postonfacebook')}}
                            </p>
                        </div>

                        <div class="footer-bootom">
                            {{trans('messages.newtokickstarter')}}?
                            <a class="bold" href="{{URL::to('signup')}}">{{trans('messages.signup')}}!</a>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Modal -->

<script type="text/javascript">
                    function confirmation(id) {
                    var answer = confirm("Are you sure to delete this record?");
                            if (answer) {
                    location.href = 'deletecomment/' + id;
                    }
                    else {
                    return false;
                    }
                    }

</script>
<script>
            function fbShare(url, title, descr, image, winWidth, winHeight) {
            var winTop = (screen.height / 2) - (winHeight / 2);
                    var winLeft = (screen.width / 2) - (winWidth / 2);
                    window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
            }
</script>
<script>
            function twtShare(url, title, descr, image, winWidth, winHeight) {
            var winTop = (screen.height / 2) - (winHeight / 2);
                    var winLeft = (screen.width / 2) - (winWidth / 2);
                    window.open('http://twitter.com/share?url=' + url + '&text=' + title + '&', 'twitterwindow', 'height=450, width=550, top=' + winTop + ', left=' + winLeft + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
            }
</script>
<script>
            $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            });</script>

<script>
    $("#commenttab").click(function(){
      FB.XFBML.parse();
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
}
</script>    
@stop