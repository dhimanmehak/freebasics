@extends('layouts.adminlayout')
@section('content')
<div  id="content">
    <div class="grid_container">
        <div class="grid_12 full_block">
            <div class="widget_wrap">
                <div class="widget_content">
                    <h3>Address Verification</h3>  
                    <form class="form_container left_label">                       
                        <ul>
                            <input type='hidden' name='id' value='{{$user->id}}'>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">User Name</label>
                                    <div class="form_input">
                                        <input name="project" type="text" tabindex="1" value="{{{$user->firstname}}} {{{$user->lastname}}}" disabled/>
                                    </div>
                                </div>
                            </li>                                                        
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Address</label>
                                    <div class="form_input">
                                        <textarea disabled>{{{$user->address}}}</textarea>
                                    </div>
                                </div>
                            </li>
                           
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Mobile</label>
                                    <div class="form_input">
                                        <input name="mobile" type="text" tabindex="1" value="{{{$user->mobile}}}" disabled/>
                                    </div>
                                </div>
                            </li> 
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">City</label>
                                    <div class="form_input">
                                        <input name="project" type="text" tabindex="1" value="{{{$user->city}}}" disabled/>
                                    </div>
                                </div>
                            </li>   
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">State</label>
                                    <div class="form_input">
                                        <input name="project" type="text" tabindex="1" value="{{{$user->state}}}" disabled/>
                                    </div>
                                </div>
                            </li>   
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Country</label>
                                    <div class="form_input">
                                        <input name="project" type="text" tabindex="1" value="{{{$user->country}}}" disabled/>
                                    </div>
                                </div>
                            </li> 
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Proof type</label>
                                    <div class="form_input">
                                        <input name="project" type="text" tabindex="1" value="{{{$user->prooftype}}}" disabled/>
                                    </div>
                                </div>
                            </li>  
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Identity Proof</label>
                                    <div class="form_input">
                                        <img src='{{URL::to('')}}/{{$user->idproof}}' style='width: 100%;'/>
                                    </div>
                                </div>
                            </li>  
                    </form>
                    <form class="form_container left_label" method='post' style='display: inline;' action='{{URL::to('postverification')}}'>
                        <input type='hidden' name='verifyval' id="verifyval" value=''/>
                            <li>
                                <div class="form_grid_12">
                                    <label class="field_title">Admin Remarks</label>
                                    <div class="form_input">
                                        <textarea name="remarks" class="remarks">{{$user->adminremarks}}</textarea>
                                        <span class="remarks_error" style="color:red;font-size: 13px;font-weight: bold;"></span>
                                            
                                    </div>
                                </div>
                            </li>
                    <li>
                        <!-- <div class="form_grid_12"> -->
                           <!--  <div class="form_input"> -->
                                <?php $name = Session::get('adminname'); ?>
                                @if($name=="demo")
                                <a class="inline cboxElement btn_small btn_blue" href="#inline_content" style="line-height: 28px !important;color: #fff;">Verify</a>
                                @else
                                    <input type='hidden' name='id' value='{{$user->id}}'/>
                                    <button name="submit" type="submit"   onclick="return verify();" class="btn_small btn_blue" ><span>Verify</span></button>
                                @endif
                                <?php $name = Session::get('adminname'); ?>
                                @if($name=="demo")
                                <a class="inline cboxElement btn_small btn_orange" href="#inline_content" style="line-height: 28px !important;color: #fff;">Don't Verify</a>
                                @else
                                    <input type='hidden' name='id' value='{{$user->id}}'/>
                                    <button name="submit" type="submit" onclick="return noverify();" class="btn_small btn_orange" ><span>Don't Verify</span></button>
                                </form>
                                @endif
                                <a href='{{URL::to('verifyaccount')}}' class="btn_small btn_gray" style='line-height: 2.7 !important;'>Back</a>
                            <!-- </div> -->
                       <!--  </div> -->
                    </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
	function verify() {
		var verifyval	= $('#verifyval').val('verify');
               
	}	
	function noverify() {
		var verifyval	= $('#verifyval').val('noverify');
	}
        
        $('.form_container').on('submit',function(){
            var remarks = $.trim($(".remarks").val()); 
            if(remarks == ""){
               // alert("Please fill the admin remarks");
                $('.remarks_error').html("This Field is Required.");
                return false;
            }
        });
</script>
@stop
