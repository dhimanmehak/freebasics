@extends('layouts.mainlayoutold')
@section('content')
<section>
    <div class="account">
        <div class="container">
            <div class="account-top">
                <h3 class="seting col-md-12">{{trans('messages.settings')}}</h3>
                <ul class="setig-li col-md-12">
                    <li><a class="active" href="{{URL::to('myaccount')}}">{{trans('messages.account')}}</a> </li>
                    <li><a href="{{URL::to('editprofile')}}"> {{trans('messages.editprofile')}} </a></li>
                    <li><a href="{{URL::to('privacysettings')}}"> {{trans('messages.privacysettings')}} </a></li>
                    <li><a href="{{URL::to('notifications')}}"> {{trans('messages.notifications')}}</a> </li>
                    <li><a href="{{URL::to('findfriends')}}"> {{trans('messages.findfriends')}} </a></li>

                </ul>

                <div class="col-sm-6">
                    @if(Session::has('success'))
                    <div class="alert-message success" style='margin-left:0px;width:80%;'>
                        {{Session::get('success');}}
                    </div>
                    @endif
                    @if(Session::has('failed'))
                    <div class="alert-message error" style='margin-left:0px;width:80%;'>
                        {{Session::get('failed');}}
                    </div>
                    @endif
                    <form method="post" action="postaccount" id="account">
                        <ul class="email-pre">
                            <li>
                                <label>{{trans('messages.email')}}</label>
                                <input type="text" name="email" value="{{Session::get('email')}}" readonly="">
                            </li>

                            <li>
                                <label>{{trans('messages.currentpassword')}}</label>
                                <input type="password" name="current_password" class="input-text full-width js-auto_focus password @if(($errors->has('current_password'))) has-error @endif" placeholder="{{trans('messages.currentpassword')}}">
                                @if( $errors->has('current_password')) <p class="help-block">{{ $errors->first('current_password');}}</p> @endif
                            </li>                        
                            <li>
                                <label>{{trans('messages.newpassword')}}</label>
                                <input type="password" name="new_password" class="input-text full-width js-auto_focus password @if($errors->has('new_password')) has-error @endif" placeholder="{{trans('messages.newpassword')}}">
                                @if ($errors->has('new_password')) <p class="help-block">{{ $errors->first('new_password') }}</p> @endif
                            </li>
                            <li>
                                <label>{{trans('messages.repassword')}}</label>
                                <input type="password" name="confirm_password" class="input-text full-width js-auto_focus password @if($errors->has('confirm_password')) has-error @endif" placeholder="{{trans('messages.repassword')}}">
                                @if ($errors->has('confirm_password')) <p class="help-block">{{ $errors->first('confirm_password') }}</p> @endif
                            </li>

                            <li>
                                <input class="blus-btnl" value="{{trans('messages.savesettings')}}" type="submit">

                            </li>

                        </ul>
                    </form>
                </div>
                <input id="openoffset" type="hidden" value="0" name="openoffset">
                <div class="account-botom">
                    <h3 class="seting">{{trans('messages.loginhistory')}}</h3>

                    <p class="featurs-area">{{trans('messages.historyinfo')}} </p>

                    <div class="table-cover">
                        <table class="table" id="openupdates">
                            <tr>
                                <td>{{trans('messages.activity')}}</td>
                                <td>{{trans('messages2.time')}}</td>
                                <td>{{trans('messages.location')}}</td>
                                <td>{{trans('messages.ipaddress')}}</td>
                            </tr>
                            <?php
                            foreach ($userinfo as $historyvalue) {
                                $logindate = date('F j Y H:i:s', strtotime($historyvalue->logindatetime));
                                ?> 
                                <tr>
                                <input type="hidden" value="<?php echo $historyvalue->email ?>" name="email" id="email">
                                <td><?php echo $historyvalue->status ?></td>
                                <td><?php echo $logindate ?></td>
                                <td><?php echo $historyvalue->location ?>   </td>
                                <td> <?php echo $historyvalue->ipaddress ?> </td>
                                </tr>
<?php } ?>
                            <tr></tr>
                        </table>

                    </div>
                </div>

                <div class="col-sm-6">
                    <ul class="face-bk">
                        <li>
                            <!--                            <label>{{trans('messages.facebook')}} </label>
                                                        <a href="#" >{{trans('messages.disconnectfacebook')}}</a>-->
                        </li>

                        <li>
                            <label>{{trans('messages.deleteaccount')}}</label>
                            <a href="{{URL::to('account/delete');}}" >{{trans('messages.deletemyaccount')}}</a>
                        </li>

                    </ul>

                </div>
            </div>

        </div>
    </div>
</section>
<script>
    $('.loadmore').click(function () {
        var loadid = $(this).attr("id");
        offset = parseInt($('#openoffset').val()) + 1;
        $("#openoffset").val(offset);
        offset = parseInt($('#openoffset').val());
        email = $('#email').val();
        if (loadid) {
            $.ajax({
                type: "POST",
                url: "myaccount/loadmore",
                data: {'offset': offset, 'email': email},
                cache: false,
                success: function (html) {
                    //$("#loadmore").remove(); 
                    $("#openupdates").append(html);
                }
            });
        } else {
            $(".btn-grey").html('The End');
        }
        return false;
    });
</script>
@stop

<?php
/* $key="9dcde915a1a065fbaf14165f00fcc0461b8d0a6b43889614e8acdb8343e2cf15";
  $ip= "208.115.219.10";
  $url = "http://api.ipinfodb.com/v3/ip-city/?key=$key&ip=$ip&format=xml";
  // load xml file
  $xml = simplexml_load_file($url);
  // print the name of the first element
  echo $xml->getName() . "<br />";
  // create a loop to print the element name and data for each node
  foreach($xml->children() as $child)
  {
  echo $child->getName() . ": " . $child . "<br />";
  } */
?>
  
