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
                    <h6> Settings</h6>
                    <div id="widget_tab">
                        <ul>
                            <li><a href="#tab1" class="active_tab">Admin Settings</a></li>
                            <li><a href="#tab2">Social Media Settings</a></li>
                            <li><a href="#tab3">Webmaster Settings & SEO</a></li>
                        </ul>
                    </div>
                </div>
                <div class="widget_content">
                    <div id="tab1">
                        <form method="post" action="{{URL::to('postadminsettings')}}" class="form_container left_label" enctype='multipart/form-data' id="form103">
                            <input type='hidden' name='adminsettingsid' value='{{$adminsettings[0]['id']}}' >
                            <ul>
                                <input type="hidden" name="adminid" value="{{$admins[0]['id']}}">
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title" >Admin Name<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input  name="admin" type="text" value="{{$admins[0]['name']}}" maxlength="100" class="large required" />
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Email<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="email" type="text" value="{{$admins[0]['email']}}" maxlength="100" class="large required email">
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Contact Email<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="contactemail" type="text" value="{{$adminsettings[0]['contactmail']}}" maxlength="50" class="large required email"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Contact Number<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="contactnumber" type="text" value="{{$adminsettings[0]['contactnumber']}}" maxlength="50" class="large required"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Site Name<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input id="password" name="sitename" type="text" maxlength="50" value="{{$adminsettings[0]['sitetitle']}}" class="large required"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title" >Logo<span class="req">*</span></label>
                                        <div class="form_input" >
                                            <img src="{{$adminsettings[0]['logo']}}" width="25%" height="25%" alt="gal" style='margin-left:20px;'/> <br>
                                            <input name="logo" type="file" maxlength="50" value="" class="large"/>
                                        </div>
                                    </div>
                                    @if ($errors->has('logo')) <p class="help-block">{{ $errors->first('logo') }}</p> @endif
                                </li>

                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Favicon<span class="req">*</span></label>
                                        <div class="form_input">
                                            <img src="{{$adminsettings[0]['favicon']}}" width="3%" height="3%" alt="gal" style='margin-left:70px;'/><br>
                                            <input name="favicon" type="file" value="" maxlength="150" class="large"/>
                                        </div>
                                    </div>
                                    @if ($errors->has('favicon')) <p class="help-block">{{ $errors->first('favicon') }}</p> @endif
                                </li>

                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Watermark<span class="req">*</span></label>
                                        <div class="form_input">
                                            <img src="{{$adminsettings[0]['watermark']}}" width="56" height="56" alt="gal" style='margin-left:75px;'/><br>
                                            <input name="watermark" type="file" value="" maxlength="150" class="large"/>
                                        </div>
                                    </div>
                                    @if ($errors->has('watermark')) <p class="help-block">{{ $errors->first('watermark') }}</p> @endif
                                </li>                               
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Home Title<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="hometitle1" type="text" value="{{$adminsettings[0]['hometitle1']}}" maxlength="150" class="large required"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title" >Footer Logo<span class="req">*</span></label>
                                        <div class="form_input" >
                                            <img src="{{$adminsettings[0]['footerlogo']}}" width="25%" height="25%" alt="footerlogo" style='margin-left:20px;'/> <br>
                                            <input name="footerlogo" type="file" maxlength="50" value="" class="large"/>
                                        </div>
                                    </div>
                                    @if ($errors->has('footerlogo')) <p class="help-block">{{ $errors->first('footerlogo') }}</p> @endif
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Footer Content<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="footercontent" type="text" value="{{$adminsettings[0]['footercontent']}}" maxlength="150" class="large required"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Listing Fee<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="listingfee" type="text" value="{{$adminsettings[0]['listingfee']}}" maxlength="150" class="large required"/>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Default Language<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="language" type="text" value="{{$adminsettings[0]['language']}}" maxlength="150" class="large required"/>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Default Currency Code<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="currency" type="text" value="{{$adminsettings[0]['currency']}}" maxlength="3" class="large required" id="currency"/>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Paypal Mode<span class="req">*</span></label>
                                        <div class="form_input">
                                            @if($adminsettings[0]['paypalmode']=="sandbox")
                                            <select data-placeholder="Select Status" name="paypalmode" style=" width:350px" class="chzn-select" tabindex="13">
                                                <option value="sandbox" selected>Sandbox</option>     
                                                <option value="live">Live</option>  
                                            </select>  
                                            @else
                                            <select data-placeholder="Select Status" name="paypalmode" style=" width:350px" class="chzn-select" tabindex="13">
                                                <option value="sandbox">Sandbox</option>     
                                                <option value="live" selected>Live</option>  
                                            </select>  
                                            @endif
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Paypal Appid<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="paypalid" type="text" value="{{$adminsettings[0]['paypalid']}}" maxlength="150" class="large"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Paypal Username<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="paypalapiname" type="text" value="{{$adminsettings[0]['paypalapiname']}}" maxlength="150" class="large"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Paypal Password<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="paypalapipwd" type="text" value="{{$adminsettings[0]['paypalapipwd']}}" maxlength="150" class="large"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Paypal Signature<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="paypalapikey" type="text" value="{{$adminsettings[0]['paypalapikey']}}" maxlength="150" class="large"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Paypal Clientid<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="paypalclientid" type="text" value="{{$adminsettings[0]['paypalclientid']}}" maxlength="150" class="large"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Paypal secret<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="paypalsecret" type="text" value="{{$adminsettings[0]['paypalsecret']}}" maxlength="150" class="large"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Twilio Account Sid<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="twilioaccountid" type="text" value="{{$adminsettings[0]['twilioaccountid']}}" maxlength="150" class="large"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Twilio account auth token<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="twilioauth" type="text" value="{{$adminsettings[0]['twilioaccounttoken']}}" maxlength="150" class="large"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Twilio Phone Number<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="twiliophone" type="text" value="{{$adminsettings[0]['twiliophonenumber']}}" maxlength="150" class="large"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Google map api key<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="googlemapapi" type="text" value="{{$adminsettings[0]['googlemapapi']}}" maxlength="150" class="large"/>
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
                                            <button type="submit" class="btn_small btn_blue"><span>Submit</span></button>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </form>
                    </div>
                    <div id="tab2">
                        <form autocomplete="off" method="post" action="{{URL::to('postsocialsettings')}}" class="form_container left_label" id="socialmediaform">
                            <input type='hidden' name='id' value='{{$adminsettings[0]['id']}}' >
                            <ul>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title" >Facebook Link<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input  name="facebooklink" type="text" value="{{$adminsettings[0]['facebooklink']}}" maxlength="100" class="large"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Googleplus Link<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="googlepluslink" type="text" value="{{$adminsettings[0]['googlepluslink']}}" maxlength="100" class="large">
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Youtube Link<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="youtubelink" type="text" value="{{$adminsettings[0]['youtubelink']}}" maxlength="50" class="large"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Twitter Link<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="twitterlink" type="text" maxlength="50" value="{{$adminsettings[0]['twitterlink']}}" class="large"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Pinterest Link<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="pinterestlink" type="text" maxlength="50" value="{{$adminsettings[0]['pinterestlink']}}" class="large"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Google client id<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="googleclientid" type="text" value="{{$adminsettings[0]['googleclientid']}}" maxlength="150" class="large"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Google redirect URL<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="googleredirecturl" type="text" value="{{$adminsettings[0]['googleredirecturl']}}" maxlength="150" class="large"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Google secret key<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="googleclientsecret" type="text" value="{{$adminsettings[0]['googleclientsecret']}}" maxlength="150" class="large"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Google developer key<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="googledeveloperkey" type="text" value="{{$adminsettings[0]['googledeveloperkey']}}" maxlength="150" class="large"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Facebook app id<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="facebookappid" type="text" value="{{$adminsettings[0]['facebookappid']}}" maxlength="150" class="large"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Facebook app secret<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="facebookappsecret" type="text" value="{{$adminsettings[0]['facebooksecretkey']}}" maxlength="150" class="large"/>
                                        </div>
                                    </div>
                                </li>                                
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Facebook access token<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="facebookaccesstoken" type="text" value="{{$adminsettings[0]['facebookaccesstoken']}}" maxlength="150" class="large"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Twitter consumer key<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="consumerkey" type="text" value="{{$adminsettings[0]['consumerkey']}}" maxlength="150" class="large"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Twitter consumer secret<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="consumersecret" type="text" value="{{$adminsettings[0]['consumersecret']}}" maxlength="150" class="large"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Twitter access token<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="accesstoken" type="text" value="{{$adminsettings[0]['accesstoken']}}" maxlength="150" class="large"/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Twitter access token secret<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="accesstokensecret" type="text" value="{{$adminsettings[0]['accesstokensecret']}}" maxlength="150" class="large"/>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Banner text<span class="req">*</span></label>
                                        <div class="form_input">
                                            <textarea name='banner'>{{$adminsettings[0]['bannertext']}}</textarea>
                                        </div>
                                    </div>
                                </li>                               
                                <li>
                                    <div class="form_grid_12">
                                        <div class="form_input">
                                            @if($name=="demo")
                                            <a class="inline cboxElement btn_small btn_blue" href="#inline_content" style="line-height: 28px !important;color: #fff;">Submit</a>
                                            @else
                                            <button type="submit" class="btn_small btn_blue"><span>Submit</span></button>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </form>
                    </div>
                    <div id="tab3">                            
                        <div class="page_content">
                            <div class="grid_12 post_preview">
                                <h3>Search Engine Information</h3>
                                <form id="regitstraion_form" autocomplete="off" method="post" action="{{URL::to('postseosettings')}}" class="form_container left_label">
                                    <input type='hidden' name='id' value='{{$adminsettings[0]['id']}}'>                                     
                                    <ul>
                                        <li>
                                            <div class="form_grid_12">
                                                <label class="field_title">Meta Title<span class="req">*</span></label>
                                                <div class="form_input">
                                                    <input name="metatitle" type="text" value="{{{$adminsettings[0]['metatitle']}}}" maxlength="150" class="large required"/>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form_grid_12">
                                                <label class="field_title">Meta Keyword<span class="req">*</span></label>
                                                <div class="form_input">
                                                    <input name="metakeyword" type="text" value="{{{$adminsettings[0]['metakeyword']}}}" maxlength="150" class="large required"/>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="form_grid_12">
                                                <label class="field_title">Meta Description<span class="req">*</span></label>
                                                <div class="form_input">
                                                    <textarea name='metadescription' class="required">{{{$adminsettings[0]['metadescription']}}}</textarea>
                                                </div>
                                            </div>
                                        </li> 
                                        <li> <h3>Google Webmaster Info</h3> </li>
                                        <li>
                                            <div class="form_grid_12">
                                                <label class="field_title">Google analytics code<span class="req">*</span></label>
                                                <div class="form_input">
                                                    <textarea name='googleanalytics' class="required">{{{stripslashes($adminsettings[0]['googleanalyticscode'])}}}</textarea>
                                                    <span style="float:left;"> For Examples:
                                                        <pre>
                                                            
&lt;script type="text/javascript"&gt;

  var _gaq = _gaq || [];
  _gaq.push([_setAccount, UA-XXXXX-Y]);
  _gaq.push([_trackPageview]);

  (function() {
    var ga = document.createElement(script); ga.type = text/javascript; ga.async = true;
    ga.src = (https: == document.location.protocol ? https://ssl : http://www) + .google-analytics.com/ga.js;
    var s = document.getElementsByTagName(script)[0]; s.parentNode.insertBefore(ga, s);
  })();

&lt;/script&gt;
                                                        </pre>
                                                    </span>
                                                </div>  
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form_grid_12">
                                                <label class="field_title">Google html meta verificaion code<span class="req">*</span></label>
                                                <div class="form_input">
                                                    <input name="googleverification" type="text" value="{{$adminsettings[0]['googleverification']}}" maxlength="150" class="large required"/><br><br>
                                                    Google Webmaster Verification using Meta tag. 
                                                    For more reference:<a href="https://support.google.com/webmasters/answer/35638#3" target="_blank">https://support.google.com/webmasters/answer/35638#3</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form_grid_12">
                                                <div class="form_input">
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
    </div>

    <span class="clear"></span>
</div>

<script>
    jQuery.validator.addMethod("complete_url", function (val, elem) {
        // if no url, don't do anything
        if (val.length == 0) {
            return true;
        }

        // if user has not entered http:// https:// or ftp:// assume they mean http://
        if (!/^(https?|ftp):\/\//i.test(val)) {
            val = 'http://' + val; // set both the value
            $(elem).val(val); // also update the form element
        }
        // now check if valid url
        // http://docs.jquery.com/Plugins/Validation/Methods/url
        // contributed by Scott Gonzalez: http://projects.scottsplayground.com/iri/
        return /^(https?|ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&amp;'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&amp;'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&amp;'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&amp;'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&amp;'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(val);
    });

    $.validator.addMethod("alphanumeric", function (value, element) {
        return this.optional(element) || /^[a-z0-9\\-]+$/i.test(value);
    });

    jQuery.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
    });

    $("#form103").validate({
        rules: {
            admin: {
                lettersonly: true,
            }, sitename: {
                alphanumeric: true,
            }, contactnumber: {
                number: true,
                minlength: 6,
                maxlength: 12,
            }, currency: {
                required: true,
                maxlength: 3
            },
        },
        messages: {
            admin: {
                lettersonly: 'Admin name should be in alphabets.'
            }, sitename: {
                alphanumeric: 'Site name should not contain special characters.'
            }, contactnumber: {
                number: 'Price should be in numbers.',
                minlength: 'Provide valid contact number.',
                maxlength: 'Provide valid contact number.'
            }
        },
    });

    $("#socialmediaform").validate({
        rules: {
            facebooklink: {
                required: true,
                url: true,
                complete_url: true
            },
            googlepluslink: {
                required: true,
                url: true,
                complete_url: true
            },
            youtubelink: {
                required: true,
                url: true,
                complete_url: true
            },
            twitterlink: {
                required: true,
                url: true,
                complete_url: true
            },
            pinterestlink: {
                required: true,
                url: true,
                complete_url: true
            },
            googleredirecturl: {
                required: true,
                url: true,
                complete_url: true
            },
        },
        submitHandler: function (form) {
            form.submit();
        }
    });


</script> 
<script>
    $('#currency').bind('keyup blur', function () {
        $(this).val(function (i, val) {
            return val.replace(/[^a-z\s]/gi, '');
        });
    });
</script> 

@stop