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
                    <h6>Edit Subadmin</h6>
                </div>
                <?php
                $previlege = Config::get('privilegeconfig.privilege');
                ?>

                <div class="widget_content">
                    <form autocomplete="off" id="form103" method="post" action="{{URL::to('posteditsubadmin')}}" class="form_container left_label" onsubmit="return myFunction();">
                        <input type='hidden' name='id' value='{{$subadmin['id']}}'>
                        <ul>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Name<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="name" type="text" value='{{$subadmin['name']}}' maxlength="100" class="large required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Email<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="email" type="text" value='{{$subadmin['email']}}' maxlength="100" class="large required">
                                    </div>
                                </div>
                            </li>
							<li>
                                <div class="form_grid_12">
                                    <label class="field_title">Address<span class="req">*</span></label>
                                    <div class="form_input">
										<textarea name="address" id="address" class="large required">{{$subadmin['address']}}</textarea>
                                    </div>
                                </div>
                            </li>
							<li>
                                <div class="form_grid_12">
                                    <label class="field_title">Contact<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="contact" type="text" value='{{$subadmin['contact']}}' maxlength="100" class="large required"/>
                                    </div>
                                </div>
                            </li>  
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Status<span class="req">*</span></label>
                                    <div class="form_input">
                                        <select data-placeholder="status" style=" width:350px" name="status" class="chzn-select" tabindex="13">
                                            @if($subadmin->status == "active")
                                            <option value="active" selected="selected">active</option>
                                            <option value="inactive">inactive</option>   
                                            @else
                                            <option value="active">active</option>
                                            <option value="inactive" selected="selected">inactive</option>   
                                            @endif
                                        </select> 
                                    </div>
                                </div>
                            </li>

                            <!--                            $previlege-->
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title" for="site_contact_mail"></label>
                                    <div id="uniform-undefined" class="form_input focus">
                                        <span class="" style="float:left;">
                                            <input type="checkbox" id="select-all" name="all"  @if ($previleges == "all") checked="checked" @endif/></span><label style="float:left;margin:5px;">Select all</label>
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
                                @for($i=0;$i<count($previlege);$i++)                                    
                            <?php
                            $subAdmin = $previlege[$i];
                            $priv = array();
                            if ($previleges == "all") {
                                $priv = "all";
                            } else {
                                if (isset($previleges[$subAdmin])) {
                                    $priv = $previleges[$subAdmin];
                                }
                                if (!is_array($priv)) {
                                    $priv = array();
                                }
                            }
                            ?>
                                <div class="form_grid_12">
                                    <label class="field_title">{{$previlege[$i]}}</label>
                                    <table border="0" cellpadding="0" cellspacing="0" width="400">
                                        <tbody><tr>
                                                <?php for ($j = 0; $j < 4; $j++) { ?>
                                                    <td align="center" width="15%">
                                                        <input  name="{{$previlege[$i].'[]';}}" id="{{$previlege[$i].'[]';}}" value="{{$j}}" type="checkbox" class='case'  
							<?php
                                                        if ($priv == "all") {
                                                            echo 'checked="checked"';
                                                        } else {
                                                            if (in_array($j, $priv)) {
                                                                echo 'checked="checked"';
                                                            }
                                                        }
                                                        ?>>
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
                                            <?php $name = Session::get('adminname'); ?>
                                            @if($name=="demo")
                                            <a class="inline cboxElement btn_small btn_blue" href="#inline_content" style="line-height: 28px !important;color: #fff;">Update Subadmin</a>
                                            @else
                                            <button type="submit" class="btn_small btn_blue"><span>Update Subadmin</span></button>
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
    <span class="clear"></span>
</div>
<!--<script>
    $("#select-all").on("click", function () {
        var all = $(this);
        $('input:checkbox').each(function () {
            $(this).prop("checked", all.prop("checked"));
        });
    });
</script>-->

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
</script>
@stop