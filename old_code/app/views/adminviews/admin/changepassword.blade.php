@extends('layouts.adminlayout')
@section('content')
<div id="content">
    <div class="grid_container">
        <div class="grid_12">
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon list"></span>
                    <h6>Change Password</h6>
                </div>
                <div class="widget_content">
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
                    <div class="login_invalid" id="password_error" style="display:none">
                        <span class="icon"></span> Passwords do not match!
                    </div>
                    <form autocomplete="off" method="post" id="form103" action="postchangepassword" class="form_container left_label" onsubmit="return myFunction();">
                        <ul>

                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title" >Old Password<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="oldpassword" type="password" maxlength="50" value="" class="large required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">New Password<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input id="pass1" name="password" type="password" maxlength="50" value="" class="large required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title" >Confirm Password<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input id="pass2" name="confirmpassword" type="password" maxlength="50" value="" class="large required"/>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="form_grid_12">
                                    <div class="form_input">
                                        <?php $name = Session::get('adminname'); ?>
                                        @if($name=="demo")
                                         <a class="inline cboxElement btn_small btn_blue" href="#inline_content" style="line-height: 28px !important;color: #fff;">Submit</a>
                                        @else
                                        <button id="signupsubmit" name="submit" type="submit" class="btn_small btn_blue"><span>Submit</span></button>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div style='display:none;'>
        <div id='inline_content' style='padding:0px; background:#fff;'>
            <p> <center><strong>WARNING!</strong><br> <br>               
                This feature is disabled in demo!</center> </p>                        
        </div>
    </div>
    <span class="clear"></span>
</div>
<script type="text/javascript">
    function myFunction() {
        var pass1 = document.getElementById("pass1").value;
        var pass2 = document.getElementById("pass2").value;

        if (pass1 != pass2) {
            document.getElementById('password_error').style.display = "block";
            return false;
        }
        else {
            return true;
        }
    }
</script>
@stop