@extends('layouts.mainlayout')
@section('content')

<section>
    <div class="findfriends">
        <div class="container">
            <h2 class="getsocil">{{trans('messages.getsocial')}}</h2>
            <span class="folow-text">{{trans('messages.followyourfriends')}}</span>
            <div class="frds-container">
                <div class="col-md-12">
                    <div id="fb-root"></div>

                    <span class="kickstarter-impline" style="padding: 28px 0 20px 0;">{{trans('messages.nofriends')}}.<br><br>
                        <a href='#' onclick="FacebookInviteFriends();"> 
                            <img src="{{URL::to('main/images/fb-invite.png')}}" alt="fb-invite">
                        </a></span>
                </div>

            </div>
        </div>
</section>

<script src="http://connect.facebook.net/en_US/all.js"></script>
<script>

                                    FB.init({
                                    appId: <?php echo Config::get('adminconfig.facebookappid') ?>,
                                            cookie: true,
                                            status: true,
                                            xfbml: true
                                    });
                                    function FacebookInviteFriends() {
                                            FB.ui({
                                                    method: 'send',
                                                    message: 'Fundstarter',
                                                    link: '{{URL::to("/")}}?referral={{Session::get("userid")}}',
                                                    description: 'Create and back projects',
                                                    picture: '{{URL::to("uploads/images/fbshare.jpg")}}'
                                            });
                                    }
</script>

@stop

