@extends('layouts.adminlayout')
@section('content')
<link href="{{URL::to('admin/colorpicker/css/colorpicker.css')}}" ref="stylesheet" type="text/css"/>
<div id="content">
    <div class="grid_container">
        <div class="grid_12">     
            @if(Session::has('failed'))
            <div class="login_invalid">
                <span class="icon"></span> {{Session::get('failed');}}
            </div>
            @endif           
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon list"></span>
                    <h6>Edit Theme</h6>
                </div>
                <div class="widget_content">
                    <form autocomplete="off" id="form103" method="post" action="{{URL::to('postsubadmin')}}" class="form_container left_label" onsubmit="return myFunction();">
                        <ul>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Header background<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="name" type="text" value="#000" maxlength="100" class="demo-1 demo-auto colorpicker-element large required"/>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Header font color<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="name" type="text" value="#000" maxlength="100" class="demo-1 demo-auto colorpicker-element large required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Header font size<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="name" type="text" value="#000" maxlength="100" class="large required"/>
                                    </div>
                                </div>
                            </li>     

                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Body background<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="name" type="text" value="#000" maxlength="100" class="demo-1 demo-auto colorpicker-element large required"/>
                                    </div>
                                </div>
                            </li>                            
                            <li>
                                <div class="form_grid_12">
                                    <div class="form_input">
                                        <button name="addsubadmin" type="submit" class="btn_small btn_blue"><span>Update Theme</span></button>
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

<script>
    $(function () {
        $('.demo1').colorpicker();
    });
</script>


<div class="colorpicker dropdown-menu colorpicker-with-alpha colorpicker-right colorpicker-hidden" style="top: 1202px; left: 166.5px;"><div class="colorpicker-saturation" style="background-color: rgb(0, 0, 0);"><i style="top: 100px; left: 0px;"><b></b></i></div><div class="colorpicker-hue"><i style="top: 100px;"></i></div><div class="colorpicker-alpha" style="background-color: rgb(0, 0, 0);"><i style="top: 0px;"></i></div><div class="colorpicker-color" style="background-color: rgb(0, 0, 0);"><div style="background-color: rgb(0, 0, 0);"></div></div></div><div class="colorpicker dropdown-menu colorpicker-hidden colorpicker-horizontal colorpicker-with-alpha colorpicker-right"><div class="colorpicker-saturation" style="background-color: rgb(143, 255, 0);"><i style="top: 0px; left: 100px;"><b></b></i></div><div class="colorpicker-hue"><i style="left: 76.0130718954249px;"></i></div><div class="colorpicker-alpha" style="background-color: rgb(143, 255, 0);"><i style="left: 0px;"></i></div><div class="colorpicker-color" style="background-color: rgb(143, 255, 0);"><div style="background-color: rgb(143, 255, 0);"></div></div></div><div class="colorpicker dropdown-menu colorpicker-with-alpha colorpicker-right colorpicker-hidden" style="top: 494px; left: 491.5px;"><div class="colorpicker-saturation" style="background-color: rgb(0, 41, 255);"><i style="top: 14px; left: 44.5px;"><b></b></i></div><div class="colorpicker-hue"><i style="top: 36.0433604336047px;"></i></div><div class="colorpicker-alpha" style="background-color: rgb(122, 138, 219);"><i style="top: 0px;"></i></div><div class="colorpicker-color" style="background-color: rgb(122, 138, 219);"><div style="background-color: rgb(122, 138, 219);"></div></div></div><div class="colorpicker dropdown-menu colorpicker-with-alpha colorpicker-right colorpicker-hidden" style="top: 821px; left: 491.5px;"><div class="colorpicker-saturation" style="background-color: rgb(0, 232, 255);"><i style="top: 32px; left: 53.5px;"><b></b></i></div><div class="colorpicker-hue"><i style="top: 48.4848484848489px;"></i></div><div class="colorpicker-alpha" style="background-color: rgb(81, 165, 173);"><i style="top: 0px;"></i></div><div class="colorpicker-color" style="background-color: rgb(81, 165, 173);"><div style="background-color: rgb(81, 165, 173);"></div></div></div><div class="colorpicker dropdown-menu colorpicker-hidden colorpicker-right"><div class="colorpicker-saturation" style="background-color: rgb(0, 0, 0);"><i style="top: 100px; left: 0px;"><b></b></i></div><div class="colorpicker-hue"><i style="top: 100px;"></i></div><div class="colorpicker-alpha" style="background-color: transparent;"><i style="top: 100px;"></i></div><div class="colorpicker-color" style="background-color: transparent;"><div style="background-color: transparent;"></div></div></div><div class="colorpicker dropdown-menu colorpicker-hidden colorpicker-with-alpha colorpicker-right"><div class="colorpicker-saturation"><i><b></b></i></div><div class="colorpicker-hue"><i></i></div><div class="colorpicker-alpha"><i></i></div><div class="colorpicker-color"><div></div></div></div><div class="colorpicker dropdown-menu colorpicker-with-alpha colorpicker-right colorpicker-hidden" style="top: 2836px; left: 810.5px;"><div class="colorpicker-saturation" style="background-color: rgb(107, 66, 66);"><i style="left: 38.5px; top: 58px;"><b></b></i></div><div class="colorpicker-hue"><i style="top: 100px;"></i></div><div class="colorpicker-alpha" style="background-color: rgb(107, 66, 66);"><i style="top: 0px;"></i></div><div class="colorpicker-color" style="background-color: rgb(107, 66, 66);"><div style="background-color: rgb(107, 66, 66);"></div></div></div><div class="colorpicker dropdown-menu colorpicker-2x colorpicker-with-alpha colorpicker-right colorpicker-hidden" style="top: 1794px; left: 361.5px;"><div class="colorpicker-saturation" style="background-color: rgb(255, 170, 0);"><i style="top: 60px; left: 186.5px;"><b></b></i></div><div class="colorpicker-hue"><i style="top: 177.777777777777px;"></i></div><div class="colorpicker-alpha" style="background-color: rgb(179, 123, 12);"><i style="top: 96px; left: 0px;"></i></div><div class="colorpicker-color" style="background-color: rgba(179, 123, 12, 0.521569);"><div style="background-color: rgba(179, 123, 12, 0.521569);"></div></div></div><iframe name="oauth2relay446980588" id="oauth2relay446980588" src="./Colorpicker for Twitter Bootstrap_files/postmessageRelay.html" tabindex="-1" style="width: 1px; height: 1px; position: absolute; top: -100px;"></iframe>
@stop