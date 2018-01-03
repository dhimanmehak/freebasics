@extends('layouts.adminlayout')
@section('content')
<div id="content">
    <div class="grid_container">
        <div class="grid_12 full_block">
            @if(Session::has('success'))
            <div class="login_success">
                <span class="icon"></span> {{Session::get('success');}}
            </div>
            @endif
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon list"></span>
                    <h6>Commission Settings</h6>
                </div>
                <div class="widget_content">
                    <div id="tab1">

                        <form method="post" action="{{URL::to('postcommissionsettings')}}" class="form_container left_label" enctype='multipart/form-data'>
                            <ul>
                                <input type="hidden" name="adminsettingsid" value="{{$adminsettings[0]['id']}}">
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Admin commission <span style="color:red">(only in %)</span><span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="admincommission" type="text" value="{{$adminsettings[0]['admincommission']}}" maxlength="150" class="large allownumericwithdecimal"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Affiliate Commission type<span class="req">*</span></label>
                                        <div class="form_input">
                                            @if($adminsettings[0]['affcommissiontype']=="percentage")
                                            <select  name="affiliatetype" style=" width:350px" class="chzn-select" tabindex="13">
                                                <option value="percentage" selected>Percentage</option>     
                                                <option value="flat">Flat amount</option>  
                                            </select>  
                                            @else
                                            <select  name="affiliatetype" style=" width:350px" class="chzn-select" tabindex="13">
                                                <option value="percentage" >Percentage</option>     
                                                <option value="flat" selected>Flat amount</option>  
                                            </select>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Affiliate Commission<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="affiliatecommission" type="text" value="{{$adminsettings[0]['affiliatecommission']}}" maxlength="50" class="large allownumericwithdecimal"/>
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
                                            <button name="submit" type="submit" class="btn_small btn_blue"><span>Submit</span></button>
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
    </div>
   
</div>
<script>
    $(".allownumericwithdecimal").on("keypress keyup blur", function (event) {
        //this.value = this.value.replace(/[^0-9\.]/g,'');
        $(this).val($(this).val().replace(/[^0-9\.]/g, ''));
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });
</script>
@stop
