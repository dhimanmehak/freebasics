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
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon list"></span>
                    <h6>Add State</h6>
                </div>
                <div class="widget_content">
                    <form id="form103" autocomplete="off" method="post" action="{{URL::to('posteditstate')}}" class="form_container left_label">
                        @foreach($states as $state)
                        <input type="hidden" value="{{$state->id}}" name="id">
                        <ul>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Country Name</label>
                                    <div class="form_input">
                                        <select data-placeholder="Select Country" name="countryid" style=" width:350px" class="chzn-select" tabindex="13">
                                            @foreach($countries as $country)                                            
                                            <option value="{{$country->id}}" <?php if($country->id == $state->countryid){ ?> selected="selected" <?php } ?> >{{$country->countryname}}</option>
                                            @endforeach 
                                        </select>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">State Name<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input  name="statename" type="text" value="{{$state->statename}}" maxlength="100" class="large" id="statename">
                                        <span id="statename_errmsg" style="color:red;"></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title" >State Code<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="statecode" type="text" value="{{$state->statecode}}" maxlength="50" class="large" id="statecode"/>
                                         <span id="statecode_errmsg" style="color:red;"></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title" id="lpassword" for="password">Status<span class="req">*</span></label>
                                    <div class="form_input">
                                        <select data-placeholder="Select Status" name="status" style=" width:350px" class="chzn-select" tabindex="13">
                                            @if($state->status=='active')
                                            <option value="active" selected='selected'>active</option>
                                            <option value="inactive">inactive</option>
                                            @else
                                            <option value="active">active</option>
                                            <option value="inactive" selected='selected'>inactive</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="form_grid_12">
                                    <div class="form_input">
                                           <?php $name = Session::get('adminname'); ?>
                                        @if($name=="demo")
                                        <a class="inline cboxElement btn_small btn_blue" href="#inline_content" style="line-height: 28px !important;color: #fff;">Update</a>
                                        @else
                                        <button id="signupsubmit" name="signup" type="submit" class="btn_small btn_blue"><span>Add State</span></button>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        </ul>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
    <span class="clear"></span>
</div>
<script>
    $.validator.addMethod("alphanumeric", function (value, element) {
        return this.optional(element) || /^[a-z0-9\\-]+$/i.test(value);
    });
    jQuery.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
    });

    $("#form103").validate({
        rules: {
            statename: {
                lettersonly: true,
            },
            statecode: {
                alphanumeric: true,
            }
        },
        messages: {
            statename: {
                lettersonly: 'State name field should accept only alphabets.'
            },
            statecode: {
                alphanumeric: 'State code field should accept only alphanumerics.'
            }
        },
    });
</script>    
@stop
