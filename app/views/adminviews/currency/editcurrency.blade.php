@extends('layouts.adminlayout')
@section('content')
<div id="content">
    <div class="grid_container">
        <div class="grid_12">
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon list"></span>
                    <h6>Edit Currency</h6>
                </div>
                <div class="widget_content">
                    <form autocomplete="off" method="post" action="posteditcurrency" id="form103" class="form_container left_label">
                       @foreach($currencies as $currency)
                       <input type='hidden' name='id' value='{{$currency->id}}'>
                        <ul>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Country Name<span class="req">*</span></label>
                                    <div class="form_input">
                                        <select name="country" style=" width:359px" class="country" tabindex="13">
											<option value="">Select Country</option>
                                            @foreach($countries as $country)
                                            <option value='{{$country->countryname}}' <?php if($country->countryname==$countryname){?> selected='selected' <?php } ?>>{{$country->countryname}}</option>                                            
                                            @endforeach
                                        </select>                                    
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title" >Currency Type<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="currencytype" type="text" value="{{$currency->currencytype}}" maxlength="100" class="large required">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title" >Currency Symbol<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="currencysymbol" type="text" value="{{$currency->currencysymbol}}" maxlength="50" class="large required"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title" >Currency Rate(1$)<span class="req">*</span></label>
                                    <div class="form_input">
                                        <input name="currencyrate" type="text" value="{{$currency->currencyrate}}" maxlength="50" class="currencyrate large required"/>
                                        <span id="currencyrate_error" style="color:red;display:none;">Please enter a valid amount.</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Status<span class="req">*</span></label>
                                    <div class="form_input">
                                        <select data-placeholder="Select Status" name="status" style=" width:350px" class="chzn-select required" tabindex="13">
                                            <option value="active" @if($currency->status=="active")selected="selected" @endif>active</option>     
                                            <option value="inactive" @if($currency->status=="inactive")selected="selected" @endif>inactive</option>  
                                        </select>                   
                                        <br><br>&nbsp;<a target='_blank' href="https://developer.paypal.com/webapps/developer/docs/classic/api/currency_codes/">
                                            https://developer.paypal.com/webapps/developer/docs/classic/api/currency_codes/</a>
                                    </div>                                              
                                </div>

                            </li>

                            <li>
                                <div class="form_grid_12">
                                    <div class="form_input">
                                        <button id="signupsubmit" name="signup" type="submit" class="btn_small btn_blue"><span>Add Currency</span></button>
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
<script type="text/javascript">
    $('.currencyrate').keypress(function(e){ 
        if (this.value.length == 0 && e.which == 48 ){
        $('#currencyrate_error').show();
        return false;
    }else{
        $('#currencyrate_error').hide();
    }
});
 </script> 
@stop