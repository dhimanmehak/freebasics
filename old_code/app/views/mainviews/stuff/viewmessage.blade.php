@extends('layouts.mainlayout')
@section('content')  
<section>
    <div class="message-section">
        <div class="container">

            <div class="top-rowss">
                <span></span>
            </div>

        </div>
    </div>
</section>
<style type="text/css">
    .chat-panel{
        border: 1px solid #ccc;
        float: left;
        margin: 40px 0 20px;
        width: 100%;
    }
    .img-circle{
        width:50px;
        height:50px;
    }

    .chat
    {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .chat li
    {
        margin-bottom: 10px;
        padding-bottom: 5px;
        border-bottom: 1px dotted #B3A9A9;
    }

    .chat li.left .chat-body
    {
        margin-left: 60px;
    }

    .chat li.right .chat-body
    {
        margin-right: 60px;
    }


    .chat li .chat-body p{
        color: #777777;
        font-size: 14px;
        line-height: 19px;
        margin: 0;
    }

    .chat .text-muted {
        color: #999;
        font-size: 14px;
    }

    .chat-body strong {
        color: #606060;
        font-size: 16px;
        font-weight: normal;
    }

    .chat-header {
        float: left;
        margin: 8px 0 10px;
        width: 100%;
    }

    .chat .left.clearfix {
        float: left;
        padding: 0 0 20px;
        width: 100%;
    }

    .chat .right.clearfix {
        float: left;
        padding: 0 0 20px;
        width: 100%;
    }

    #btn-chat{
        background: #2bde73 none repeat scroll 0 0;
        color: #fff;
        text-shadow: 0 0 0 #fff;
        height: 52px;

    }
    .msg-bx{color: #9c9c9c;   border-radius: 4px 0 0 4px;}
</style>
<section>
    @if(Session::has('success'))
    <div class="alert-message success">
        {{Session::get('success');}}
    </div>
    @endif

    <div class="meassages-bx">
        <div class="login-container col-md-8">
            <div class="top-rowss" style='margin-bottom:10px;'>
                <span class="mes-tile">{{trans('messages.messages')}} {{trans('messages.from')}} {{$name->firstname}} {{$name->lastname}} </span>
                <span class="input-group-btn pull-right">
                    <a href="{{URL::to('messages')}}" class="btn btn-warning btn-sm" style="right: 65px;border-radius: 5px;">
                        <i class="fa fa-backward"></i> {{trans('messages2.back')}}</a>
                </span>
            </div> 
            <div class="panel panel-primary chat-panel">
                <div class="panel-collapse" >
                    <div class="panel-body">
                        <ul class="chat">
                            @foreach($msgs as $msg)   
                            @if($id==$msg->senderid)
                            <?php $date1 = date_create($msg->date); ?>
                            <li class="right clearfix"><span class="chat-img pull-right">
                                    <img src="{{URL::to($msg->image)}}" alt="User Avatar" class="img-circle" onerror="this.src='{{URL::to('main/images/default.png');}}'" />
                                </span>
                                <div class="chat-body clearfix">
                                    <div class="chat-header">
                                        <small class=" text-muted"><span class="glyphicon glyphicon-time"></span> {{date_format($date1,"d M Y")}}</small>
                                        <a href="{{URL::to('')}}/profile/{{$msg->username}}"><strong class="pull-right primary-font">{{$msg->firstname}} {{$msg->lastname}}</strong></a>
                                    </div>
                                    <p class="pull-right">
                                        {{$msg->message}}
                                    </p>
                                </div>
                            </li>
                            @else
                            <?php $date2 = date_create($msg->date); ?>
                            <li class="left clearfix"><span class="chat-img pull-left">
                                    <img src="{{URL::to($msg->image)}}" alt="User Avatar" class="img-circle" onerror="this.src='{{URL::to('main/images/default.png');}}'"/>
                                </span>
                                <div class="chat-body clearfix">
                                    <div class="chat-header">
                                        <a href="{{URL::to('')}}/profile/{{$msg->username}}"> <strong class="primary-font">{{$msg->firstname}} {{$msg->lastname}}</strong> <small class="pull-right text-muted"></a>
                                            <span class="glyphicon glyphicon-time"></span> {{date_format($date2,"d M Y")}}</small>
                                    </div>
                                    <p>
                                        {{$msg->message}}
                                    </p>
                                </div>
                            </li>
                            @endif
                            @endforeach

                        </ul>
                    </div>
                    <div class="panel-footer">
                        <div class="input-group">
                            <form method="post" action="{{URL::to('postmessage')}}">
                                <input type="hidden" name="recieverid" value="{{$name->id}}">
                                <textarea class="msg-bx" name="message" placeholder="{{trans('messages2.typeyourmessagehere')}}..." required style="margin-right: 10px;width: 87%;"></textarea>
                                <span class="input-group-btn">
                                    <input type="submit" value="{{trans('messages2.send')}}" class="btn btn-warning btn-sm" id="btn-chat"/>
                                </span>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
        $(".view").click(function () {
            var $closestTr = $(this).closest('tr');
            var x = $closestTr.find('td:eq(0)').find(':input').val();
            var base = $(location).attr('href');
            $.ajax({url: base + "/view/" + x, success: function (data) {
                }});
        });
        $('.close').click(function () {
            location.reload(true);
        });
    });
</script>

@stop