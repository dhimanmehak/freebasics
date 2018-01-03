<html>
    @include('includes.admin.head')
    <body id="theme-default" class="full_block">
        <div id="login_page" style="background:url({{Config::get('adminconfig.watermark');}})repeat scroll 0 0 / cover rgba(0, 0, 0, 0);">
            <div class="login_container" style="margin-top:10%;">
                <div class="login_header blue_lgel">
                    <ul class="login_branding">
                        <li>
                            <div class="logo_small">
                                <img src="{{Config::get('adminconfig.logo')}}" width="99" height="35" alt="bingo">
                            </div>
                            <span>{{Config::get('adminconfig.title')}}</span>
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

                <div class="login_invalid" id="password_error" style="display:none">
                    <span class="icon"></span> Passwords do not match!
                </div>

                <form action="postresetforgotpassword" method="post" onsubmit="return myFunction();">
                    <div class="login_form">
                        <h3 class="blue_d">Reset Password</h3>
                        <input name="id" type="hidden" placeholder="id" value="{{$id}}" >
                        <ul>     
                            <li class="login_user" id="password1">
                                <input name="password" type="password" placeholder="New Password" id="pass1">
                            </li>
                            <li class="login_user" id="password2">
                                <input name="confirmpassword" type="password" placeholder="Confirm Password" id="pass2">
                            </li>
                        </ul>
                    </div>
                    <input class="login_btn blue_lgel" name="" value="Submit" type="submit">

                </form>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        function myFunction() {
            var pass1 = document.getElementById("pass1").value;
            var pass2 = document.getElementById("pass2").value;

            if (pass1 != pass2) {
                //alert("Passwords Do not match");
                document.getElementById('password_error').style.display = "block";
//                document.getElementById("password1").style.background = "#E34234";
//                document.getElementById("password2").style.background = "#E34234";
                return false;
            }
            else {
                return true;
            }
        }
    </script>
</html>

