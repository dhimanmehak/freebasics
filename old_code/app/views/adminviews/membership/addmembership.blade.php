@extends('layouts.adminlayout')
@section('content')
<div id="content">
    <div class="grid_container">
        <div class="grid_12">
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon list"></span>
                    <h6>Add Membership</h6>
                </div>
                <div class="widget_content">
                    <form autocomplete="off" method="post" action="{{URL::to('postaddmembership')}}" id="form103" class="form_container left_label" enctype="multipart/form-data">
                        <ul>                           
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title" >Package Name<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="packagename" id="packagename" type="text" value="" maxlength="100" class="large required">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title" >Duration<span class="req">*</span></label>
                                    <div class="form_input">
                                        <select data-placeholder="Select Duration" name="duration" style=" width:350px" class="chzn-select required" tabindex="13">
                                            <option value="month">Monthly</option>     
                                            <option value="year">Yearly</option>  
                                        </select>    
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Features<span class="req">*</span></label>
                                    <div class="form_input">       
                                        <textarea name="features" id="editor1" class="large required"></textarea>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Price<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="price" type="text" value="" maxlength="100" class="large required">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Status<span class="req">*</span></label>
                                    <div class="form_input">
                                        <select data-placeholder="Select Status" name="status" style=" width:350px" class="chzn-select required" tabindex="13">
                                            <option value="1">active</option>     
                                            <option value="0">inactive</option>  
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
                                        <button id="signupsubmit" name="signup" type="submit" class="btn_small btn_blue"><span>Add Membership</span></button>
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
<script>

    jQuery.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
    });

    $("#form103").validate({
        rules: {
            packagename: {
                lettersonly: true,
            }, price: {
                number: true,
            },
        },
        messages: {
            packagename: {
                lettersonly: 'Package name should be in alphabets.'
            },
            price: {
                number: 'Price should be in numbers.'
            },
        },
    });

    CKEDITOR.replace('editor1', {
        fullPage: true,
        allowedContent: true,
        extraPlugins: 'wysiwygarea'
    });

</script>
@stop