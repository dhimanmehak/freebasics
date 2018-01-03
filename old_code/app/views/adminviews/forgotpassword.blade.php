<html>
    @include('includes.admin.head')
    <body id="theme-default" class="full_block">
        <div id="login_page" style="background:url({{Config::get('adminconfig.watermark');}})repeat scroll 0 0 / cover rgba(0, 0, 0, 0);">
            <div class="login_container" style="margin-top:10%;">
                <div class="login_header blue_lgel">
                    <ul class="login_branding">
                        <li>
                            <div class="logo_small">
                                <img src="{{Config::get('adminconfig.logo');}}" width="99" height="35" alt="bingo">
                            </div>
                        </li>
                    </ul>
                </div>

                @if(Session::has('failed'))
                <div class="login_invalid">
                    <span class="icon"></span> {{Session::get('failed');}}
                </div>
                @endif
                @if(Session::has('success'))
                <div class="login_success">
			<span class="icon"></span> {{Session::get('success');}}
		</div>
                @endif
                <form action="adminsendpassword" method="post">
                    <div class="login_form">
                        <h3 class="blue_d">Forgot Password</h3>
                        <ul>
                            <li class="login_user">
                                <input name="email" type="text" placeholder="Registered email">
                            </li>					
                        </ul>
                    </div>
                    <input class="login_btn blue_lgel" name="" value="Send" type="submit">

                </form>
            </div>
        </div>
    </body>
</html>