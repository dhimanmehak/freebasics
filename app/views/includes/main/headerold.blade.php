<header>
    <div class="header">
        <div class="logo-left">
           <a href="{{URL::to('')}}" class="fb-logo">
        <img src="{{URL::asset('main/images/free-basics-logo.png');}}" alt="free basics logo" />
      </a>
        </div>    

        <div class="head-right">
            <div class="navbar" style="margin:0">
                <div class="navbar-inner">
                    <a class="btn btn-navbar" data-target=".nav-collapse" data-toggle="collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                  

                   <div class="nav-collapse navbar-collapse my-nav">
                        <ul class="nav fb-header-tab-trigger">
  <li class="fb-un-goal-tab-trigger {{ Request::path() == '/' ? 'active' : '' }}"><a href="{{URL::to('/')}}"><span class="fb-htt-number">01</span><h3 class="fb-htt-text">GLOBAL<br />GOALS</h3></a></li>
      <li class="fb-align-with-goal-tab-trigger {{ Request::path() == 'align/goal' ? 'active' : '' }}"><a href="{{URL::to('align/goal')}}"><span class="fb-htt-number">02</span><h3 class="fb-htt-text">ALIGN<br />WITH A GOAL</h3></a></li>
      <li class="fb-start-project-tab-trigger {{ Request::path() == 'support/project' ? 'active' : '' }}"><a href="{{URL::to('support/project')}}"><span class="fb-htt-number">03</span><h3 class="fb-htt-text">SUPPORT<br />A PROJECT</h3></a></li>
                            
                            <li  style="display:none;">
                                <a class="reg-popup" href="{{URL::to('discover')}}">{{Lang::get('messages.discover')}}</a>
                            </li>
                            <li  style="display:none;">
                                <a class="login-popup" href="{{URL::to('project/start')}}">{{trans('messages.start')}}</a>
                            </li>
                            <?php $projects = app('project'); ?>
                            <?php $headerlinks = app('headerlinks'); ?>
                            <?php $submenu = app('submenu'); ?>
                            @foreach($headerlinks as $header)
                            <li class="dropdown">
                                <a id="caret" class="login-popup" href="{{URL::to('pages')}}/{{$header->seourl}}">{{$header->pagename}}<span class="test"></span></a>
                                <ul id="test" class="" role="menu">
                                    @foreach($submenu as $smenu)
                                    <?php if ($header->id == $smenu->parent) { ?>
                                        <script>
                                            $('#test').addClass('dropdown-menu');
                                            $('#caret').find('.test').addClass('caret');
                                        </script>	
                                        <li><a href="{{URL::to('pages')}}/{{$smenu->seourl}}"><?php echo $smenu->pagename; ?></a></li>
                                    <?php } ?>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                            <li class="seach-box" style="display:none;">
                                <form class="js-header-livesearch nav-livesearch" method="get" action="{{URL::to('search')}}" accept-charset="UTF-8">
                                    <span class="ksr-icon__search"></span>
                                    <input id="term" class="nav-livesearch-input js-search-term text" type="text" placeholder="{{trans('messages.searchprojects');}}" name="search" data-tracker-name="Header Live Search" autocomplete="off">
                                </form>
                            </li>

                            @if(Session::has('userid'))
                            <a href='#' id='profile'><li class="logins" style="border-left: 1px solid #ccc;">
                                    <img class="avatar-circle-small" style="border-radius:60%;display: block;height: 50px;overflow: hidden;width:92px;" src="{{URL::to('')}}/{{$headerpic}}" onerror="this.src='{{URL::to('main/images/default.png');}}'" width="40" height="40" alt="" title="{{Session::get('name');}}">
                                </li>
                                <div class="arrow-up"></div>
                            </a>

                            <style> .arrow-up {
                                    width: 0;
                                    height: 0;
                                    border-left: 7px solid transparent;
                                    border-right: 7px solid transparent;
                                    border-top: 7px solid #666;
                                    float:right;
                                    margin-right: -75px;
                                    margin-top: 27px;
                                } 
                            </style>
                            @else
                            <li class="logged">
                                <a href="{{URL::to('login');}}">{{trans('messages.login')}}</a>
                            </li>
                            <li class="logged">
                                <a href="{{URL::to('signup');}}">{{trans('messages.signup')}}</a>
                            </li>
                            @endif

                        </ul>

                    </div>

                </div>
            </div>
        </div>

        <div class="seach-box head-lin">
            <form class="js-header-livesearch nav-livesearch" accept-charset="UTF-8" action="{{URL::to('search')}}" method="get">
                <input id="term" class="nav-livesearch-input js-search-term text" type="text" autocomplete="off" data-tracker-name="Header Live Search" name="search" placeholder="Search Projects">
            </form>			
        </div>
		
        <div class="after-menu" id='profile-display'>
            <div class="after-menu-left">
                <ul>
                    <h3>{{trans('messages.mystuff')}} </h3>
                    <li>
                        <a title="Inbox" href="{{URL::to('messages')}}">{{trans('messages.messages')}} @if($headermsgs!=0)<span style="background: #2bde73;color: #fff;padding: 4px 7px 4px 7px;border-radius: 15px;font-size: 12px;">{{$headermsgs}}</span>@endif</a>
                    </li>
                    <li>
                        <a title="Activity" href="{{URL::to('activity')}}">{{trans('messages.activity')}} </a>
                    </li>
                    <li>
                        <a href="{{URL::to('profile')}}">{{trans('messages.profile')}}</a>
                    </li>
                    <li>
                        <a href="{{URL::to('backedprojects')}}">{{trans('messages.backedprojects')}}</a>
                    </li>
                    <li>
                        <a href="{{URL::to('createdprojects')}}">{{trans('messages.createdprojects')}}</a>
                    </li>
                    <li>
                        <a href="{{URL::to('starredprojects')}}">{{trans('messages.starredprojects')}} </a>
                    </li>
                </ul>

                <ul>
                    <h3 class="dropdown-menu-header"> {{trans('messages.settings')}} </h3>
                    <li>
                        <a href="{{URL::to('myaccount')}}">{{trans('messages.account')}}</a>
                    </li>
                    <li>
                        <a href="{{URL::to('editprofile')}}">{{trans('messages.editprofile')}}</a>
                    </li>
                     <li>
                        <a href="{{URL::to('stripesettings')}}">{{trans('messages.stripesettings')}}</a>
                    </li>
                    <li>
                        <a href="{{URL::to('notifications')}}">{{trans('messages.notifications')}}</a>  
                    </li>
                    <li>
                        <a href="{{URL::to('privacysettings')}}">{{trans('messages.privacysettings')}}</a>  
                    </li>
                    <li><a href="{{URL::to('findfriends')}}">{{trans('messages.findfriends')}}</a></li>
                </ul>

            </div>
            @if($projects!='[]')
              <div class="after-menu-right-full">
            <div class="after-menu-right">
                <h3>{{trans('messages.createdprojects')}}</h3>

                <div id="prolist" class="crnt-pro" style="font-size: 12px; font-weight: bold; padding: 10px 0px 5px 2px;color:#98B50B"><h2>{{trans('messages.liveprojects')}}</h2></div>

                @if($projecttype['livecount']==0)
                <p style='font-size: 12px;padding-bottom: 12px;color: #888;'>{{trans('messages.noprojectsfound')}}.</p>                
                @else
                <ul>
                    <?php $i = 1; ?>	
                    @foreach($projects as $project)
                    @if ($project->dayscount >=0 &&$project->projectverified == 2)
                    <li class="project-title">
                        <a href="{{URL::to('project/basic')}}/{{Crypt::encrypt($project->id)}}">
                            <img class="project-thumb" src="{{URL::asset('')}}/{{$project->projectimage}}" onerror="this.src='{{URL::asset('main/images/projectdefault.png')}}'" alt="" width="40" height="40">
                            {{{$project->title}}}
                        </a>
                    </li>
                    <?php if ($i++ == 2) break; ?>
                    @endif
                    @endforeach
                </ul>                
                @endif

            </div>

            <div class="after-menu-right">

                <div id="prolist" style="font-size: 12px;font-weight: bold; padding: 10px 0px 5px 2px;color:orange"><h2>{{trans('messages.draftprojects')}}</h2></div>
                @if($projecttype['draftcount']==0)
                <p style='font-size: 12px;padding-bottom: 12px;color: #888;'>{{trans('messages.noprojectsfound')}}.</p>                
                @else
                <ul>
                    <?php $i = 1; ?>
                    @foreach($projects as $project)
                    @if($project->projectverified == 0)
                    <li class="project-title">
                        <a href="{{URL::to('project/basic')}}/{{Crypt::encrypt($project->id)}}">
                            <img class="project-thumb" src="{{URL::asset('')}}/{{$project->projectimage}}" onerror="this.src='{{URL::asset('main/images/projectdefault.png')}}'" alt="" width="40" height="40">
                            {{{$project->title}}}
                        </a>
                    </li>
                    <?php if ($i++ == 2) break; ?>
                    @endif
                    @endforeach
                </ul>
                @endif
            </div>
            

            <div class="after-menu-right">
                <div id="prolist" style="font-size: 12px; font-weight: bold; padding: 10px 0px 5px 2px;color:orange"><h2>{{trans('messages.pendingprojects')}}</h2></div>
                @if($projecttype['pendingcount']==0)
                <p style='font-size: 12px;padding-bottom: 12px;color: #888;'>{{trans('messages.noprojectsfound')}}.</p>                
                @else
                <ul>
                    <?php $i = 1; ?>
                    @foreach($projects as $project)
                    @if ($project->projectverified == 1)
                    <li class="project-title">
                        <a href="{{URL::to('project/basic')}}/{{Crypt::encrypt($project->id)}}">
                            <img class="project-thumb" src="{{URL::asset('')}}/{{$project->projectimage}}" onerror="this.src='{{URL::asset('main/images/projectdefault.png')}}'" alt="" width="40" height="40">
                            {{{$project->title}}}
                        </a>
                    </li>
                    <?php if ($i++ == 2) break; ?>
                    @endif
                    @endforeach
                </ul>
                @endif

            </div>	


            <div class="after-menu-right">
                <div id="prolist" style="font-size: 12px; font-weight: bold; padding: 10px 0px 5px 2px;color:red"><h2>{{trans('messages.suspendedprojects')}}</h2></div>
                @if($projecttype['suspendedcount']==0)
                <p style='font-size: 12px;padding-bottom: 12px;color: #888;'>{{trans('messages.noprojectsfound')}}.</p>                
                @else
                <ul>
                    <?php $i = 1; ?>
                    @foreach($projects as $project)
                    @if ($project->projectverified == 3)
                    <li class="project-title">
                        <a href="{{URL::to('project/basic')}}/{{Crypt::encrypt($project->id)}}">
                            <img class="project-thumb" src="{{URL::asset('')}}/{{$project->projectimage}}" onerror="this.src='{{URL::asset('main/images/projectdefault.png')}}'" alt="" width="40" height="40">
                            {{{$project->title}}}
                        </a>
                    </li>
                    <?php if ($i++ == 2) break; ?>
                    @endif
                    @endforeach
                </ul>
                @endif
               
            </div>

            <div class="after-menu-right">
                <div id="prolist" style="font-size: 12px; font-weight: bold; padding: 10px 0px 5px 2px;color:red"><h2>{{trans('messages.expiredprojects')}}</h2></div>
                <ul>
                    <?php
                    $i = 1;
                    $count = 0;
                    ?>
                    @foreach($projects as $project)
                    @if($project->dayscount <0 && $project->projectverified==2)
                    <li class="project-title">
                        <a href="{{URL::to('project/basic')}}/{{Crypt::encrypt($project->id)}}">
                            <img class="project-thumb" src="{{URL::asset('')}}/{{$project->projectimage}}" onerror="this.src='{{URL::asset('main/images/projectdefault.png')}}'" alt="" width="40" height="40">
                            {{{$project->title}}}
                        </a>
                    </li>
                    <?php $count++;
                    if ($i++ == 2)
                        break;
                    ?>
                    @endif
                    @endforeach
                    @if($count==0)
                    <p style='font-size: 12px;padding-bottom: 12px;color: #888;'>{{trans('messages.noprojectsfound')}}.</p>  
                    @endif
                </ul>
                 <a class="viewall" href="{{URL::to('createdprojects')}}">{{trans('messages.viewall')}}</a>
            </div>

            @else
            <div class="after-menu-right">
                <h3>{{trans('messages.createdprojects')}}</h3>
                <p style='color:#999;font-size:14px;'>{{trans('messages2.none')}}!</p>
            </div>
            @endif
            
            
            <div class="botom-divs">
                <p> {{trans('messages.loggedin')}}
                    <b>{{Session::get('name');}}</b>
                    <span class="mobile-show"></span>
                    <a href="{{URL::to('userlogout');}}">{{trans('messages.logout')}}</a></p>
            </div>
            </div>
            
            </div>

        </div>
    </div>

</header>
<script>
    $(document).ready(function () {
		//$('.nav-collapse').addClass('collapse');
		
        $('#profile').click(function (event) {
            event.stopPropagation();
            $("#profile-display").slideToggle("fast");
        });
        $("#profile-display").on("click", function (event) {
            event.stopPropagation();
        });
    });

    $(document).on("click", function () {
        $("#profile-display").hide();
    });
</script>

<script>
    $(document).ready(function () {
        $('#btnAdd').click(function () {
            $selected_country = $('#selected_country option:selected').value;
           // alert($selected_country);
        });
    });

//    $(document).ready(function () {
//        $i = 1;
//        var vals = "";
//        $('#btnAdd').click(function () {
//            $i++;
//            $selected_country = $('#selected_country option:selected').text();
//            alert($selected_country);
//            $selected_country = encodeURIComponent($selected_country);
//            //$('#stimg').show();
//            $.get('loadshippinglist/' + $i + '/' + $selected_country, function (data) {
//                alert(data);
//                $("#tbNames tr:last").after(data);
//                $('#stimg').hide();
//            });
//        }
//        );
//
//        $('#tbNames td a.fa-close').click(function () {
//            rem_ship_loc = "#shipping_to_" + this.id;
//            vals = $(rem_ship_loc).val() + ':';
//            var arraySelects = document.getElementsByClassName('shipping_to');
//            var selectedOption = $(rem_ship_loc).attr("selectedIndex")
//            for (var k = 0; k < arraySelects.length; k++)
//            {
//                if (this.id != 2) {
//                    //arraySelects[k].options[selectedOption].disabled = false;	
//                }
//            }
//            var selected_country = $('#selected_country').html();
//            var rem = selected_country.replace(vals, "");
//            $('#selected_country').html(rem);
//            $(this).parent().parent().remove();
//        });
//    }
//
//    );
</script>
