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
<style>
    .message-desc{
        width: 60%;
        text-overflow: ellipsis;
    }
</style>

<section>
    @if(Session::has('success'))
    <div class="alert-message success">
        {{Session::get('success');}}
    </div>
    @endif

    <div class="meassages-bx">
        <div class="container">
            <div class="top-rowss" >
                <span class="mes-tile">{{trans('messages.messages')}}</span>
            </div>      
            @if($recievedmsgs=='[]')
            <center><span class="cret-sub-til2" style='width:100%'>{{trans('messages.oopsmessage')}}</span></center>
            @else
            
<!--            <div class="mesg-area">
                <input type="text" placeholder="{{trans('messages.searchmessage')}}">
                <input value="{{trans('messages.search')}}" type="submit" class="src-btn">
            </div>-->
            <div  id="inbox">
                <table class="table-bordered table-striped table-condensed" id='tableID'> 
                    <tr><td style="padding: 15px; font-weight: bold;">{{trans('messages.sno')}}</td>
                        <td style="padding: 15px; font-weight: bold;">{{trans('messages.sendername')}}</td>
                        <td style="padding: 15px; font-weight: bold;">{{trans('messages.message')}}</td> 
                        <td style="padding: 15px; font-weight: bold;">{{trans('messages.sent')}}</td>
                        <td style="padding: 15px; font-weight: bold;">{{trans('messages.action')}}</td></tr>
                    @foreach($recievedmsgs as $key=>$recievedmsg)
					<?php $inboxmsg	= Inboxmsg::where('senderid','=',$recievedmsg->senderid)->where('recieverid','=',$recievedmsg->recieverid)->where('status', '=', 0)->where('recieverstatus', '=', 'available')->count(); 
					if($inboxmsg == 1) {?>
					<tr style="color:#1db95c; ">
                         <td style='display:none'><input type='text' value='{{$recievedmsg->id}}' name='id'></td>
                        <td>{{$key+1}}</td>
                        <td>{{$recievedmsg->firstname}} {{$recievedmsg->lastname}}</td>
                        <td class="message-desc">{{$recievedmsg->message}}</td> 
                        <td>{{$recievedmsg->date}}</td>                        
                        <td><a href="{{URL::to('viewmessages')}}/{{$recievedmsg->senderid}}">{{trans('messages.view')}}</a>
                            <!--<a href="{{URL::to('messages/inbox/delete')}}/{{$recievedmsg->id}}">{{trans('messages.delete')}}</a></td>-->
                    </tr> 
					<?php } else { ?> 
					<tr>
                         <td style='display:none'><input type='text' value='{{$recievedmsg->id}}' name='id'></td>
                        <td>{{$key+1}}</td>
                        <td>{{$recievedmsg->firstname}} {{$recievedmsg->lastname}}</td>
                        <td class="message-desc">{{$recievedmsg->message}}</td> 
                        <td>{{$recievedmsg->date}}</td>                        
                        <td><a href="{{URL::to('viewmessages')}}/{{$recievedmsg->senderid}}">{{trans('messages.view')}}</a>
                            <!--<a href="{{URL::to('messages/inbox/delete')}}/{{$recievedmsg->id}}">{{trans('messages.delete')}}</a></td>-->
                    </tr> 
					 <?php }?>                  
                    @endforeach
                </table>
            </div>          
            @endif
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