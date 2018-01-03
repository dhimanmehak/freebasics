<div id="header" class="blue_lin">
    <div class="header_left">
       <!-- <div class="logo">
            <img src="{{Config::get('adminconfig.logo');}}" width="160" height="32" alt="Fundstarter" style="padding-top: 15px;">
        </div> -->
        <div class="btn_30_light" style='margin-top: 15px;'>
            <a id="showmenu"  href="#"><span class="icon application_view_tile_co"></span><span class="btn_link">MENU</span></a>
        </div>

        <div id="responsive_mnu">
            <a href="#responsive_menu" class="fg-button" id="hierarchybreadcrumb"><span class="responsive_icon"></span>Menu</a>
            <div id="responsive_menu" class="hidden">
                <ul>
                    <li><a href="{{URL::to('admindahboard')}}"> Dashboard</a></li>
                    <li><a href="#"> Admin</a>
                        <ul>
                            <li><a href="form-elements.html">Admin Users</a></li>
                            <li><a href="left-label-form.html">Change Password</a></li>
                            <li><a href="top-label-form.html">Settings</a></li>
                            <li><a href="form-xtras.html">SMTP Settings</a></li>
                            <li><a href="form-validation.html">Sitemap Creation</a></li>
                        </ul>
                    </li>
                    <li><a href="#"> Sub-Admin</a>
                        <ul>
                            <li><a href="ui-elements.html">Sub-Admin List</a></li>
                            <li><a href="buttons-icons.html">Add Sub-Admin</a></li>
                        </ul></li>

                    <li><a href="#">Creators</a>
                        <ul>
                            <li><a href="post-preview.html">Dashboard</a></li>
                            <li><a href="login-01.html" >Creator List</a></li>
                            <li><a href="login-02.html" >Add Creator</a></li>
                            <li><a href="login-03.html" >Export Creators</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Backers</a>
                        <ul>
                            <li><a href="post-preview.html">Dashboard</a></li>
                            <li><a href="login-01.html" >Backers List</a></li>
                            <li><a href="login-02.html" >Add Backer</a></li>
                            <li><a href="login-03.html" >Export Backers</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Projects</a>
                        <ul>
                            <li><a href="post-preview.html">Dashboard</a></li>
                            <li><a href="login-01.html" >Projects List</a></li>
                            <li><a href="login-02.html" >Add Project</a></li>
                            <li><a href="login-03.html" >Export Projects</a></li>
                        </ul>
                    </li>
                    <li><a href="typography.html">Categories</a>
                        <ul>
                            <li><a href="post-preview.html">Categories List</a></li>
                            <li><a href="login-01.html">Add Category</a></li>
                        </ul></li>
                    <li><a href="widgets.html">Newsletter Template</a>
                        <ul>
                            <li><a href="post-preview.html">Subscription List</a></li>
                            <li><a href="login-01.html">Email Template List</a></li>
                            <li><a href="login-01.html">Add Email Template</a></li>
                            <li><a href="login-01.html">Mass Email Campaigns</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Manage Country</a>
                        <ul>
                            <li><a href="content-grid.html">Country List</a></li>
                            <li><a href="form-grid.html">Add State</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Manage Static Pages</a>
                        <ul>
                            <li><a href="content-grid.html">Pages List</a></li>
                            <li><a href="form-grid.html">Add Main Page</a></li>
                            <li><a href="form-grid.html">Add Sub Page</a></li>
                        </ul>
                    </li>

                    <li><a href="#">Manage City</a>
                        <ul>
                            <li><a href="content-grid.html">Cities List</a></li>
                            <li><a href="form-grid.html">Add City</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Slider</a>
                        <ul>
                            <li><a href="content-grid.html">Sliders List</a></li>
                            <li><a href="form-grid.html">Add Slider</a></li>
                        </ul>
                    </li>
                    <li><a href="chart.html">Payment Gateway</a></li>
                    <li><a href="#">Prefooter</a>
                        <ul>
                            <li><a href="content-grid.html">Prefooter List</a></li>
                            <li><a href="form-grid.html">Add Prefooter</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Manage Currency</a>
                        <ul>
                            <li><a href="content-grid.html">Currency List</a></li>
                            <li><a href="form-grid.html">Add Currency</a></li>
                        </ul>
                    </li>
                    <li><a href="calendar.html">Contact Us</a></li>

                </ul>
            </div>
        </div>
    </div>
    <div class="header_right">
      
        <div id="user_nav">
            <ul>
                <!--<li class="user_thumb"><a href="#"><span class="icon"><img src="admin/images/user_thumb.png" width="30" height="30" alt="User"></span></a></li>-->
                <li class="user_info usr-inf" ><span class="user_name">{{Session::get('adminname');}}</span>
                    @if((Session::get('admintype')!="sub")||(Session::get('adminname')=="demo"))
                    <span> <a href="{{URL::to('adminsettings')}}">Settings</a> </span>
                    @endif
                </li>
                <li class="user_info visiting" ><a href="{{URL::to('blog/wp-admin')}}" target="_blank"><span class="user_name visitsite"  >Blog settings</span></a></li>
                <li class="user_info visiting" ><a href="{{URL::to('/')}}" target="_blank"><span class="user_name visitsite"  >Visit Site</span></a></li>
                <li class="logout"><a href="{{URL::to('adminlogout')}}"><span class="icon"></span></a></li>
            </ul>
        </div>
    </div>
    <div style='display:none;'>
        <div id='inline_content' style='padding:0px; background:#fff;'>
            <p> <center><strong>WARNING!</strong><br> <br>               
                This feature is disabled in demo!</center> </p>                        
        </div>
    </div>
</div>
