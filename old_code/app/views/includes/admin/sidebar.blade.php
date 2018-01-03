<?php $admintype=Session::get('admintype');
      $name=Session::get('adminname');
      $previleges=Session::get('previleges');
      if($previleges=="all"){
          $priv="all";
      }else{
      $priv=unserialize($previleges);
      } ?>

<div id="actionsBox" class="actionsBox" >
    <div id="actionsBoxMenu" class="menu">
        <span id="cntBoxMenu">0</span>
        <a class="button box_action">Archive</a>
        <a class="button box_action">Delete</a>
        <a id="toggleBoxMenu" class="open"></a>
        <a id="closeBoxMenu" class="button t_close">X</a>
    </div>
    <div class="submenu">
        <a class="first box_action">Move...</a>
        <a class="box_action">Mark as read</a>
        <a class="box_action">Mark as unread</a>
        <a class="last box_action">Spam</a>
    </div>
</div>

<div id="left_bar" class='sidebarmenu'>
    <div id="primary_nav" class="blue_lin">
    </div>    
    <div id="sidebar">
        <div id="secondary_nav">
            <ul id="sidenav" class="accordion_mnu collapsible">
            <li class="logo-path">
                  <div class="logo">
          
            <img src="{{Config::get('adminconfig.logo');}}" width="50" height="150" alt="Freebasics">
        </div>
          
            </li> 
           
               <?php if($priv!="all"){ extract($priv);}?>
                <li  <?php if(Request::path() == 'admindashboard'){ echo 'class="active"';}?>><a href="{{URL::to('admindashboard')}}"><i class="fa fa-laptop"></i>Dashboard</a></li>
                @if($admintype=="super"||$name=="demo")
                <li><a href="#"><i class="fa fa-laptop"></i> Admin <span class="up_down_arrow">&nbsp;</span></a>
                    <ul <?php if(Request::path()=='adminuser'|| Request::path()=='changepassword'||Request::path()=='adminsettings'||Request::path()=='smtpsettings'||Request::path()=='commissionsettings'){ echo 'class="acitem blockmenu"';}else{ echo 'class="acitem"';} ?>>
                        <li <?php if(Request::path() == 'adminuser'){ echo 'class="active"';}?>><a href="{{URL::to('adminuser')}}">Admin Users</a></li>
                        <li <?php if(Request::path() == 'changepassword'){ echo 'class="active"';}?>><a href="{{URL::to('changepassword')}}">Change Password</a></li>
                        <li <?php if(Request::path() == 'adminsettings'){ echo 'class="active"';}?>><a href="{{URL::to('adminsettings')}}">Settings</a></li>
                        <li <?php if(Request::path() == 'commissionsettings'){ echo 'class="active"';}?>><a href="{{URL::to('commissionsettings')}}">Commission Settings</a></li>
                        <li <?php if(Request::path() == 'smtpsettings'){ echo 'class="active"';}?>><a href="{{URL::to('smtpsettings')}}">SMTP Settings</a></li>
                    </ul>
                </li>
                @endif
                @if($admintype=="super"||$name=="demo")
                 <li><a href="#"><i class="fa fa-th"></i> Sub-Admin<span class="up_down_arrow">&nbsp;</span></a>
                    <ul <?php if(Request::path()=='subadminlist'|| Request::path()=='addsubadmin'){ echo 'class="acitem blockmenu"';}else{ echo 'class="acitem"';} ?>>
                        <li <?php if(Request::path() == 'subadminlist'){ echo 'class="active"';}?>><a href="{{URL::to('subadminlist')}}">Sub-Admin List</a></li>
                        <li <?php if(Request::path() == 'addsubadmin'){ echo 'class="active"';}?>><a href="{{URL::to('addsubadmin')}}">Add Sub-Admin</a></li>
                    </ul>
                </li> 
                @endif
                @if(isset($User)&& is_array($User) && in_array('0', $User)||($priv=="all"))
                <li><a href="#"><i class="fa fa-user"></i>Users<span class="up_down_arrow">&nbsp;</span></a>
                    <ul <?php if(Request::path()=='user'|| Request::path()=='userlist'|| Request::path()=='adduser'){ echo 'class="acitem blockmenu"';}else{ echo 'class="acitem"';} ?>>
                        <li <?php if(Request::path() == 'user'){ echo 'class="active"';}?>><a href="{{URL::to('user')}}">Dashboard</a></li>
                        <li <?php if(Request::path() == 'userlist'){ echo 'class="active"';}?>><a href="{{URL::to('userlist')}}" >Users List</a></li>
                        @if ($priv == 'all' || in_array('1', $User))
                        <li <?php if(Request::path() == 'adduser'){ echo 'class="active"';}?>><a href="{{URL::to('adduser')}}" >Add User</a></li>
                        @endif
                        @if($admintype=="super")<li><a href="{{URL::to('exportusers')}}">Export Users</a></li>@endif
                    </ul>
                </li>
                @endif
                @if(isset($Project)&& is_array($Project) && in_array('0', $Project)||($priv=="all"))
                <li><a href="#"><i class="fa fa-th-large"></i>Projects <span class="up_down_arrow">&nbsp;</span></a>
                    <ul <?php if(Request::path()=='project'|| Request::path()=='projectlist'|| Request::path()=='addproject'||Request::path()=='featureprojectlist'){ echo 'class="acitem blockmenu"';}else{ echo 'class="acitem"';} ?>>
                        <li <?php if(Request::path() == 'project'){ echo 'class="active"';}?>><a href="{{URL::to('project')}}">Dashboard</a></li>
                        <li <?php if(Request::path() == 'projectlist'){ echo 'class="active"';}?>><a href="{{URL::to('projectlist')}}" >Projects List @if($projectapprovals!=0)</a>  <span class="alert_notify blue">{{$projectapprovals}}</span> @endif </li>
                        <li <?php if(Request::path() == 'featureprojectlist'){ echo 'class="active"';}?>><a href="{{URL::to('featureprojectlist')}}" >Featured Projects</a></li>
                        @if ($priv == 'all' || in_array('1', $Project))
                        <li <?php if(Request::path() == 'addproject'){ echo 'class="active"';}?>><a href="{{URL::to('addproject')}}" >Add Project</a></li>
                        @endif
                        @if($admintype=="super")<li><a href="{{URL::to('exportprojects')}}">Export Projects</a></li>@endif 
						<!--  <li><a href="{{URL::to('export')}}">Export Projects</a></li> -->
                    </ul>
                </li>
                @endif
                @if(isset($Account_verification)&& is_array($Account_verification) && in_array('0', $Account_verification)||($priv=="all"))
                <li <?php if(Request::path() == 'verifyaccount'){ echo 'class="active"';}?>><a href="{{URL::to('verifyaccount')}}"><i class="fa fa-tablet"></i> Account Verification  @if($approvals!=0) <span class="alert_notify blue">{{$approvals}}</span> @endif</a></li>
                @endif
                @if(isset($Backing)&& is_array($Backing) && in_array('0', $Backing)||($priv=="all"))
                <li><a href="#"><i class="fa fa-money"></i>Backings<span class="up_down_arrow">&nbsp;</span></a>
                    <ul <?php if(Request::path()=='backproject'|| Request::path()=='backinglist'){ echo 'class="acitem blockmenu"';}else{ echo 'class="acitem"';} ?>>
                        <li <?php if(Request::path() == 'backproject'){ echo 'class="active"';}?>><a href="{{URL::to('backproject')}}" >Back Project</a></li>
                        <li <?php if(Request::path() == 'backinglist'){ echo 'class="active"';}?>><a href="{{URL::to('backinglist')}}" >Backing List</a></li>
                    </ul>
                </li>
                @endif
                
                @if(isset($Referral)&& is_array($Referral) && in_array('0', $Referral)||($priv=="all"))
                <li <?php if(Request::path() == 'referral'|| Request::path()=='viewreferral'){ echo 'class="active"';}?>><a href="{{URL::to('referral')}}"><i class="fa fa-users"></i>Referrals</a></li>
               @endif
                
                @if(isset($Category)&& is_array($Category) && in_array('0', $Category)||($priv=="all"))
                <li><a href="#"><i class="fa fa-sort-alpha-asc"></i>Categories<span class="up_down_arrow">&nbsp;</span></a>
                    <ul <?php if(Request::path()=='categorylist'|| Request::path()=='addcategory'|| Request::path()=='addsubcategory'|| Request::path()=='subcategorylist'){ echo 'class="acitem blockmenu"';}else{ echo 'class="acitem"';} ?>>
                        <li <?php if(Request::path() == 'categorylist'){ echo 'class="active"';}?>><a href="{{URL::to('categorylist')}}">Categories List</a></li>
                        @if ($priv == 'all' || in_array('1', $Category))
                        <li <?php if(Request::path() == 'addcategory'){ echo 'class="active"';}?>><a href="{{URL::to('addcategory')}}">Add Category</a></li>
                        @endif
						<!--
                        <li <?php if(Request::path() == 'subcategorylist'){ echo 'class="active"';}?>><a href="{{URL::to('subcategorylist')}}">Subcategories List</a></li>
                        @if ($priv == 'all' || in_array('1', $Category))
                        <li <?php if(Request::path() == 'addsubcategory'){ echo 'class="active"';}?>><a href="{{URL::to('addsubcategory')}}">Add Subcategory</a></li>
                        @endif
						-->
                    </ul>  
                </li>
                @endif
                
                @if(isset($Comment)&& is_array($Comment) && in_array('0', $Comment)||($priv=="all"))
                   <li <?php if(Request::path() == 'viewaddcomments'){ echo 'class="active"';}?>><a href="{{URL::to('viewaddcomments')}}"><i class="fa fa-comments"></i>Comments</a></li>
                @endif
                
                @if(isset($Subscription)&& is_array($Subscription) && in_array('0', $Subscription)||($priv=="all"))
                <li <?php if(Request::path() == 'subscriptionlist'){ echo 'class="active"';}?>><a href="{{URL::to('subscriptionlist')}}"><i class="fa fa-ticket"></i>Subscriptions</a></li>
                @endif
                @if(isset($Newsletter)&& is_array($Newsletter) && in_array('0', $Newsletter)||($priv=="all"))
                <li><a href="#"><i class="fa fa-envelope-o"></i>Newsletter Template<span class="up_down_arrow">&nbsp;</span></a>
                    <ul <?php if(Request::path()=='massemail'|| Request::path()=='addtemplate'|| Request::path()=='templatelist'|| Request::path()=='subscriptionlist'){ echo 'class="acitem blockmenu"';}else{ echo 'class="acitem"';} ?>>
                        <li <?php if(Request::path() == 'templatelist'){ echo 'class="active"';}?>><a href="{{URL::to('templatelist')}}">Email Template List</a></li>
                        @if ($priv == 'all' || in_array('1', $Newsletter))
                        <li <?php if(Request::path() == 'addtemplate'){ echo 'class="active"';}?>><a href="{{URL::to('addtemplate')}}">Add Email Template</a></li>
                        @endif
                        <li <?php if(Request::path() == 'massemail'){ echo 'class="active"';}?>><a href="{{URL::to('massemail')}}">Mass Email Campaigns</a></li>
                    </ul>
                </li>
                @endif
                
                @if(isset($Membership)&& is_array($Membership) && in_array('0', $Membership)||($priv=="all"))
                <li><a href="#"><i class="fa fa-user-plus"></i>Membership<span class="up_down_arrow">&nbsp;</span></a>
                    <ul <?php if(Request::path()=='membershiplist'|| Request::path()=='addmembership'){ echo 'class="acitem blockmenu"';}else{ echo 'class="acitem"';} ?>>
                        <li <?php if(Request::path() == 'membershiplist'){ echo 'class="active"';}?>><a href="{{URL::to('membershiplist')}}">Membership List</a></li>
                         @if ($priv == 'all' || in_array('1', $Membership))
                        <li <?php if(Request::path() == 'addmembership'){ echo 'class="active"';}?>><a href="{{URL::to('addmembership')}}">Add Membership</a></li>
                        @endif
                    </ul>
                </li>
                @endif
                
                @if(isset($Country)&& is_array($Country) && in_array('0', $Country)||($priv=="all"))
                <li><a href="#"><i class="fa fa-globe"></i>Manage Country<span class="up_down_arrow">&nbsp;</span></a>
                    <ul <?php if(Request::path()=='countrylist'|| Request::path()=='addstate'){ echo 'class="acitem blockmenu"';}else{ echo 'class="acitem"';} ?>>
                        <li <?php if(Request::path() == 'countrylist'){ echo 'class="active"';}?>><a href="{{URL::to('countrylist')}}">Country List</a></li>
                        <li <?php if(Request::path() == 'addcountry'){ echo 'class="active"';}?>><a href="{{URL::to('addcountry')}}">Add Country</a></li>
<!--                        @if ($priv == 'all' || in_array('1', $Country))
                        <li <?php if(Request::path() == 'addstate'){ echo 'class="active"';}?>><a href="{{URL::to('addstate')}}">Add State</a></li>
                        @endif-->
                    </ul>
                </li>
                @endif
                @if(isset($Language)&& is_array($Language) && in_array('0', $Language)||($priv=="all"))
                <li><a href="#"><i class="fa fa-laptop"></i>Manage Language<span class="up_down_arrow">&nbsp;</span></a>
                    <ul <?php if(Request::path()=='languagelist'|| Request::path()=='addlanguage'){ echo 'class="acitem blockmenu"';}else{ echo 'class="acitem"';} ?>>
                        <li <?php if(Request::path() == 'languagelist'){ echo 'class="active"';}?>><a href="{{URL::to('languagelist')}}">Language List</a></li>
                        @if ($priv == 'all' || in_array('1', $Country))
                        <li <?php if(Request::path() == 'addlanguage'){ echo 'class="active"';}?>><a href="{{URL::to('addlanguage')}}">Add Language</a></li>
                        @endif
                    </ul>
                </li>
                @endif
                @if(isset($Staticpage)&& is_array($Staticpage) && in_array('0', $Staticpage)||($priv=="all"))
                <li><a href="#"><i class="fa fa-file-code-o"></i>Manage Static Pages<span class="up_down_arrow">&nbsp;</span></a>
                    <ul <?php if(Request::path()=='pagelist'|| Request::path()=='addmainpage'||Request::path()=='addsubpage'){ echo 'class="acitem blockmenu"';}else{ echo 'class="acitem"';} ?>>
                        <li <?php if(Request::path() == 'pagelist'){ echo 'class="active"';}?>><a href="{{URL::to('pagelist')}}">Pages List</a></li>
                         @if ($priv == 'all' || in_array('1', $Staticpage))
                        <li <?php if(Request::path() == 'addmainpage'){ echo 'class="active"';}?>><a href="{{URL::to('addmainpage')}}">Add Main Page</a></li>
                        <li <?php if(Request::path() == 'addsubpage'){ echo 'class="active"';}?>><a href="{{URL::to('addsubpage')}}">Add Sub Page</a></li>
                        @endif
                    </ul>
                </li>
                @endif
                @if(isset($Slider)&& is_array($Slider) && in_array('0', $Slider)||($priv=="all"))
                <li><a href="#"><i class="fa fa-sliders"></i>Slider<span class="up_down_arrow">&nbsp;</span></a>
                    <ul <?php if(Request::path()=='sliderlist'|| Request::path()=='addslider'){ echo 'class="acitem blockmenu"';}else{ echo 'class="acitem"';} ?>>
                        <li <?php if(Request::path() == 'sliderlist'){ echo 'class="active"';}?>><a href="{{URL::to('sliderlist')}}">Sliders List</a></li>
                        @if ($priv == 'all' || in_array('1', $Slider))
                        <li <?php if(Request::path() == 'addslider'){ echo 'class="active"';}?>><a href="{{URL::to('addslider')}}">Add Slider</a></li>
                        @endif
                    </ul>
                </li>
                @endif
                @if(isset($Payment_gateway)&& is_array($Payment_gateway) && in_array('0', $Payment_gateway)||($priv=="all"))
                <li <?php if(Request::path() == 'paymentgateway'){ echo 'class="active"';}?>><a href="{{URL::to('paymentgateway')}}"><i class="fa fa-credit-card"></i> Payment Gateway</a></li>
                @endif
                @if(isset($Prefooter)&& is_array($Prefooter) && in_array('0', $Prefooter)||($priv=="all"))
                <li><a href="#"><i class="fa fa-list-ul"></i>Prefooter<span class="up_down_arrow">&nbsp;</span></a>
                    <ul <?php if(Request::path()=='prefooterlist'|| Request::path()=='addprefooter'){ echo 'class="acitem blockmenu"';}else{ echo 'class="acitem"';} ?>>
                        <li <?php if(Request::path() == 'prefooterlist'){ echo 'class="active"';}?>><a href="{{URL::to('prefooterlist')}}">Prefooter List</a></li>
                         @if ($priv == 'all' || in_array('1', $Prefooter))
                        <li <?php  if(Request::path() == 'addprefooter'){ echo 'class="active"';}?>><a href="{{URL::to('addprefooter')}}">Add Prefooter</a></li>
                        @endif
                    </ul>
                </li>
                @endif
                @if(isset($Currency)&& is_array($Currency) && in_array('0', $Currency)||($priv=="all"))
                <li><a href="#"><i class="fa fa-money"></i>Manage Currency<span class="up_down_arrow">&nbsp;</span></a>
                    <ul  <?php if(Request::path()=='currencylist'|| Request::path()=='addcurrency'){ echo 'class="acitem blockmenu"';}else{ echo 'class="acitem"';} ?>>
                        <li <?php if(Request::path() == 'currencylist'){ echo 'class="active"';}?>><a href="{{URL::to('currencylist')}}">Currencies List</a></li>
                        @if ($priv == 'all' || in_array('1', $Currency))
                        <li <?php if(Request::path() == 'addcurrency'){ echo 'class="active"';}?>><a href="{{URL::to('addcurrency')}}">Add Currency</a></li>
                        @endif
                    </ul>
                </li>
                @endif
                @if(isset($Transfer_fund)&& is_array($Transfer_fund) && in_array('0', $Transfer_fund)||($priv=="all"))
                <li <?php if(Request::path() == 'transferfund'){ echo 'class="active"';}?>><a href="{{URL::to('transferfund')}}"><i class="fa fa-send-o"></i>Transfer Fund  @if($transfers!=0) <span class="alert_notify blue">{{$transfers}}</span> @endif</a></li>
                @endif
                @if(isset($Contact_us)&& is_array($Contact_us) && in_array('0', $Contact_us)||($priv=="all"))
                <li <?php if(Request::path() == 'contactlist'){ echo 'class="active"';}?>><a href="{{URL::to('contactlist')}}"><i class="fa fa-mobile"></i>Contact Us</a></li>
                @endif
                 @if(isset($Change_request)&& is_array($Change_request) && in_array('0', $Change_request)||($priv=="all"))
                <li <?php if(Request::path() == 'requestlist'){ echo 'class="active"';}?>><a href="{{URL::to('requestlist')}}"><i class="fa fa-list-ol"></i> Request List @if($waitingrequests!=0) <span class="alert_notify blue">{{$waitingrequests}}</span> @endif</a></li>
                @endif
            </ul>
        </div>


    </div>
</div>

<style>
    .blockmenu{
        display:block !important;
    }
</style>
 