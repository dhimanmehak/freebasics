@extends('layouts.adminlayout')
@section('content')
<?php
$admintype = Session::get('admintype');
$previleges = Session::get('previleges');
if ($previleges == "all") {
    $priv = "all";
} else {
    $priv = unserialize($previleges);
    extract($priv);
}
?>
<div id="content">
    <div class="grid_container">
        <div class="social_activities">
            <a href="{{URL::to('userlist?user=new')}}"><div class="activities_s thems7">
                    <div class="block_label">
                        New Users<span>{{$newusercount}}</span>
                    </div>
                    <span class="badge_icon user_sl"></span>
                </div></a>
            <a href="{{URL::to('referral')}}"><div class="activities_s thems6">
                    <div class="block_label">
                        Referral Users<span>{{count($referredusers)}}</span>
                    </div>
                    <span class="badge_icon communication_sl"></span>
                </div></a>
            <a href="{{URL::to('userlist?user=active')}}"><div class="activities_s thems3">
                    <div class="block_label">
                        Active Users<span>{{$activeusers}}</span>
                    </div>
                    <span class="badge_icon lightbulb_sl"></span>
                </div></a>

            <a href="{{URL::to('userlist?user=inactive')}}"><div class="activities_s thems2" >
                    <div class="block_label" >
                        Inactive Users<span>{{$inactiveusers}}</span>
                    </div>
                    <span class="badge_icon administrative_docs_sl"></span>
                </div></a>
            <a href="{{URL::to('userlist')}}"><div class="activities_s thems1">
                    <div class="block_label">
                        Total Users<span>{{count($users)}}</span>
                    </div>
                    <span class="badge_icon customers_sl"></span>
                </div></a>

        </div>
        <div class="grid_12">
            @if(Session::has('success'))
            <div class="login_success">
                <span class="icon"></span> {{Session::get('success');}}
            </div>
            @endif
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon blocks_images"></span>
                    <h6>{{$usertype}} Users List</h6>

                </div>
                <div class="widget_content">      
                    <div id="tab1">
                        <table class="display data_tbl" id="usertable">
                            <thead>
                                <tr>
                                    <th>
                                        Id
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Mobile
                                    </th>
                                    <th>
                                        Email status
                                    </th>
                                    <th>
                                        Login Type
                                    </th>
                                    <th>
                                        Last Login Date
                                    </th>
                                    <th>
                                        Last Login IP
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td class='center'>
                                        {{$user->id}}
                                    </td>
                                    <td class='center'>
                                        {{$user->firstname}}
                                        {{$user->lastname}}
                                    </td>
                                    <td class="sdate center">
                                        {{$user->email}}
                                    </td>
                                    <td class="center sdate">
                                        {{$user->mobile}}
                                    </td>
                                    <td class="center sdate">
                                        @if($user->emailstatus==1)
                                        <a title="Click to unverify" class="tip_top" href="javascript:confirm_status('useremailstatus/{{$user->id}}/{{$user->emailstatus}}');">
                                            <span class="badge_style b_done">Verified</span></a>
                                        @else
                                        <a title="Click to verify" class="tip_top" href="javascript:confirm_status('useremailstatus/{{$user->id}}/{{$user->emailstatus}}');">
                                            <span class="badge_style b_pending">Not verified</span></a>
                                        @endif
                                    </td>
                                    <td class="center">
                                        {{$user->logintype}}
                                    </td>
                                    <td class="center">
                                         {{ substr($user->lastlogindate, 0,10) }}
                                    </td>
                                    <td class="center">
                                        {{$user->lastloginip}}
                                    </td>
                                    <td class="center sdate">
                                        @if($user->status=='active')
                                        <a title="Click to inactive" class="tip_top" href="javascript:confirm_status('userstatus/{{$user->id}}/{{$user->status}}');">
                                            <span class="badge_style b_done">{{$user->status}}</span></a>
                                        @else
                                        <a title="Click to inactive" class="tip_top" href="javascript:confirm_status('userstatus/{{$user->id}}/{{$user->status}}');">
                                            <span class="badge_style b_pending">{{$user->status}}</span></a>
                                        @endif
                                    </td>                                
                                    <td class="center">
                                        @if ($priv == 'all' || in_array('0', $User))
                                        <span><a class="action-icons c-approve" href="{{URL::to('viewuser?id=')}}{{$user->id}}" title="View">View</a></span>
                                        @endif
                                        @if ($priv == 'all' || in_array('2', $User))
                                        <span><a class="action-icons c-edit" href="{{URL::to('edituser?id=')}}{{$user->id}}" target="_blank" title="Edit">Edit</a></span>
                                        @endif
                                        @if ($priv == 'all' || in_array('3', $User))
                                        <?php $name = Session::get('adminname'); ?>
                                        @if($name=="demo")
                                        <span><a class="inline cboxElement action-icons c-delete" href="#inline_content">Delete</a></span>
                                        @else
                                        <span><a class="action-icons c-delete" href="#" onclick="confirmation('{{$user->id}}');" title="delete">Delete</a></span>
                                        @endif
                                        @endif
                                    </td>
                                </tr>
                                @endforeach                         
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>
                                        Id
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Mobile
                                    </th>
                                    <th>
                                        Email status
                                    </th>
                                    <th>
                                        Login Type
                                    </th>
                                    <th>
                                        Last Login Date
                                    </th>
                                    <th>
                                        Last Login IP
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </tfoot>
                        </table>

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
            function confirmation(id) {
            var answer = confirm("Are you sure to delete this record?")
                    if (answer){
            location.href = 'deleteuser?id=' + id;
            }
            else{
            return false;
            }
            }
</script>
@stop