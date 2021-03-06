@extends('layouts.adminlayout')
@section('content')
<div id="content">
    <div class="grid_container">
        <div class="grid_12">     
            @if(Session::has('failed'))
            <div class="login_invalid">
                <span class="icon"></span> {{Session::get('failed');}}
            </div>
            @endif
            <div class="login_invalid" id="password_error" style="display:none">
                <span class="icon"></span> Passwords do not match!
            </div>
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon list"></span>
                    <h6>Add Subadmin</h6>
                </div>
                <div class="widget_content">
                    <form autocomplete="off" id="form103" method="post" action="{{URL::to('postsubadmin')}}" class="form_container left_label" onsubmit="return myFunction();">
                        <ul>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Name<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="name" type="text" value="" maxlength="100" class="large required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Email<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="email" type="text" value="" maxlength="100" class="large required full-width js-auto_focus email @if($errors->has('email')) has-error @endif">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Password<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="password" type="password" id="pass1" maxlength="50" class="large required"/>
                                    </div>
                                </div>
                            </li>                            
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title" >Confirm Password<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input id="pass2" name="confirmpassword"  type="password" maxlength="50" value="" class="large required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Address<span class="req">*</span></label>
                                    <div class="form_input">
                                        <textarea name="address" id="address" class="large required"></textarea>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Contact<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="contact" type="text" value="" maxlength="100" class="large required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title" for="site_contact_mail"></label>
                                    <div id="uniform-undefined" class="form_input focus">
                                        <span class="" style="float:left;">
                                            <input type="checkbox" id="select-all" name="all" style="margin-top: 0px;">
                                        </span>
                                            <label style="float:left;margin:5px;margin-top: 2px;">Select all</label>                                            
                                    </div>
                                </div>
                                <div class="form_grid_12" style='margin-top: 35px;'>
                                    <label class="field_title">Mangement Name</label>
                                    <table border="0" cellpadding="0" cellspacing="0" width="400">
                                        <tbody><tr>
                                                <td align="center" width="15%">View</td>
                                                <td align="center" width="15%">Add</td>
                                                <td align="center" width="15%">Edit</td>
                                                <td align="center" width="15%">Delete</td>
                                            </tr>
                                        </tbody></table>
                                </div>   
                                <?php
                                $previlege = Config::get('privilegeconfig.privilege');
                                ?>
                                @for($i=0;$i<count($previlege);$i++)                                   

                                <div class="form_grid_12">
                                    <label class="field_title">{{$previlege[$i]}}</label>
                                    <table border="0" cellpadding="0" cellspacing="0" width="400">
                                        <tbody><tr>
                                                <?php for ($j = 0; $j < 4; $j++) { ?>
                                                    <td align="center" width="15%">
                                                        <input  name="{{$previlege[$i].'[]';}}" id="{{$previlege[$i].'[]';}}" value="{{$j}}" type="checkbox" class='case'>
                                                    </td>
                                                <?php } ?>                                                
                                            </tr>
                                        </tbody>
                                    </table>                                     
                                </div>
                                @endfor
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <div class="form_input">
                                            <button name="addsubadmin" type="submit" class="btn_small btn_blue"><span>Add Subadmin</span></button>
                                        </div>
                                    </div>
                                </li>
                        </ul>
                    </form>
                </div>
            </div>
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
<script language="javascript">
    $("#select-all").click(function () {
        $('.case').attr('checked', this.checked);
    });
    $(".case").click(function () {
        if ($(".case").length == $(".case:checked").length)
        {
            alert('check all');
            $("#select-all").attr('checked', 'checked');
        }
        else
        {
            $("#select-all").removeAttr("checked");
        }
    });
    
    
    $("#form103").validate({
        rules: {
            contact: {
                number: true,
                maxlength: 10,
            },
            name: {
                accept: "[a-zA-Z]+",
            },
        },
        messages: {
            name: {
                accept: 'Name field should accept only alphabets.'
            },
        },
    });
</script>
@stop