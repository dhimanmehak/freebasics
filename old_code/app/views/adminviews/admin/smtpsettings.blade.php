@extends('layouts.adminlayout')
@section('content')
<div id="content">
    <div class="grid_container">
        <div class="grid_12">
            <div class="widget_wrap">
                @if(Session::has('success'))
                <div class="login_success">
                    <span class="icon"></span> {{Session::get('success');}}
                </div>
                @endif
                <div class="widget_top">
                    <span class="h_icon list"></span>
                    <h6>SMTP Settings</h6>
                </div>
                <div class="widget_content">
                    <form autocomplete="off" id="regitstraion_form" method="post" action="{{URL::to('postsmtpsettings')}}" class="form_container left_label">
                        <input type='hidden' name='id' value='{{$adminsettings[0]['id']}}'>
                        <ul>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title" >SMTP Host<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="smtphost" type="text" value="{{$adminsettings[0]['smtphost']}}" maxlength="100" class="required large"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">SMTP Port<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input  name="smtpport" type="text" value="{{$adminsettings[0]['smtpport']}}" maxlength="100" class="required large">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">SMTP Username<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="smtpusername" type="text" value="{{$adminsettings[0]['smtpusername']}}" maxlength="50" class="required large"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">SMTP Password<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="smtppassword" type="password" maxlength="50" value="{{$adminsettings[0]['smtppassword']}}" class="required large"/>
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
                                        <button name="signup" type="submit" class="btn_small btn_blue"><span>Submit</span></button>
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
@stop