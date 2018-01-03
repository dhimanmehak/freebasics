@extends('layouts.mainlayout')
@section('content')
<section>
    <div class="strip-page">
        <div class="container">
            @if(Session::has('success'))
            <div class="alert-message success">
                {{Session::get('success');}}
            </div>
            @endif
            @if(Session::has('failed'))
            <div class="alert-message error">
                {{Session::get('failed');}}
            </div>
            @endif
            <div class="strip-holder">
                @if($userdetail->live_stripe_access_token!='' || $userdetail->sandbox_stripe_access_token!='')
                <h2>{{trans('messages2.stripeaccountstatus')}}</h2>
                @else
                <h2 class='connect-stripe'>{{trans('messages2.connectyourstripecccount')}}</h2>
                @endif 
                @if($mode=="sandbox")
                @if($userdetail->sandbox_stripe_access_token!='')
                <div class="sucfulycnted">
               <span><i class="fa fa-thumbs-o-up"></i> {{trans('messages2.successfullyconnectedwithstripe')}}</span> 
				</div>
				<div class="new_disconnect_stripe">
				 <form id="stripe" action="">
					<span><i class=""></i>
								<a class="bluebtn" style="float: left; margin-left: 125px;" href='{{URL::to('disconnectstripe');}}'>Disconnect With Stripe</a></span>
								</form>
					</div>
            </div>
                @else 
                <span class="stripe-connect-span">
                    <a class="pro-btn stripe-connect" style="" href='{{$stripeauthorizeurl;}}'>{{trans('messages2.connectwithstripe')}}</a>
                </span>
                @endif
                @else 
                @if($userdetail->live_stripe_access_token!='')
             <div class="sucfulycnted">
               <span><i class="fa fa-thumbs-o-up"></i> {{trans('messages2.successfullyconnectedwithstripe')}}</span> 

            </div>
                @else 
                <span class="stripe-connect-span">
                    <a class="pro-btn stripe-connect" href='{{$stripeauthorizeurl;}}'>{{trans('messages2.connectwithstripe')}}</a>
                </span>
                @endif
                @endif
            </div>
        </div>
    </div>
</section>
@stop