<html>
    @include('includes.admin.head')
    <body id="theme-default" class="full_block">
        <div id="login_page" style="background:url({{Config::get('adminconfig.watermark');}})repeat scroll 0 0 / cover rgba(0, 0, 0, 0);">
            <div class="login_container" style="margin-top:10%;">
                <div class="login_header blue_lgel">
                    <ul class="login_branding">
                        <li>
                            <div class="logo_small">
                                <img src="{{Config::get('adminconfig.logo');}}" width="180" height="35" alt="bingo">
                            </div>				
                        </li>
                    </ul>
                </div>

                @if(Session::has('failed'))
                <div class="login_invalid">
                    <span class="icon"></span> {{Session::get('failed');}}
                </div>
                @endif
                @if(Session::has('change'))
                <div class="login_success">
                    <span class="icon"></span> {{Session::get('change');}}
                </div>
                @endif
                <form action="postadminlogin" method="post" id="form103">
                    <div class="login_form">
                        <h3 class="blue_d">Admin Login</h3>
                        <ul>
                            <li class="login_user">
                                <input name="email" type="email" placeholder="email" class="required">
                            </li>
                            <li class="login_pass">
                                <input name="password" type="password" placeholder="password" class="required">
                            </li>
                        </ul>
                    </div>
                    <input class="login_btn blue_lgel" name="" value="Login" type="submit">
                    <ul class="login_opt_link">  
                        <!--URL::current()-->
                        <?php
                        $array = explode('.', URL::current());
                        ?>
                        @if(Str::contains("zoplay",$array))
                        <li><a  href="#inline_content"> Forgot Password?</a></li>
                        @else
                        <li><a href="{{URL::to('forgotpassword')}}"> Forgot Password?</a></li>
                        @endif
                        <li class="remember_me right">
                            <input name="" class="rem_me" type="checkbox" value="checked"/>
                            Remember Me</li>
                    </ul>
                </form>
            </div>
        </div>
    </body>
</html>
<div style='display:none;'>
    <div id='inline_content' style='padding:0px; background:#fff;'>
        <p> <center><strong>WARNING!</strong><br> <br>               
            This feature is disabled in demo!</center> </p>                        
    </div>
</div>