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
        <div class="grid_12">
            @if(Session::has('success'))
            <div class="login_success">
                <span class="icon"></span> {{Session::get('success');}}
            </div>
            @endif
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon blocks_images"></span>
                    <h6>Change Requests</h6>
                </div>
                <div class="widget_content">

                    <table class="display data_tbl">
                        <thead>
                            <tr>
                                <th>
                                    S.No
                                </th>
                                <th>
                                    Project title
                                </th>
                                <th>
                                    Funding goal
                                </th>
                                <th>
                                    Funding Duration
                                </th>
                                <th>
                                    Message
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Createdon
                                </th>                               
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requests as $key=>$request)
                            <tr>
                                <td class="center">
                                    {{$key+1}}
                                </td>
                                <td class="center">
                                    {{$request->projecttitle}}
                                </td>
                                <td class="sdate center">
                                    {{$request->fundinggoal}}
                                </td>
                                <td class="sdate center">
                                    {{$request->fundingduration}}
                                </td>
                                <td class="center">
                                    {{$request->message}}
                                </td>
                                <td class="center">
                                     @if($request->status == 1)
                                     <a  href="{{URL::to('requeststatus?id=')}}{{$request->id}}" title="View"><span class="badge_style b_success">Accepted</span> </a>
                                    @elseif($request->status == 2)
                                    <a href="{{URL::to('requeststatus?id=')}}{{$request->id}}" title="View"><span class="badge_style b_pending">Denied</span> </a>
                                    @else
                                    <a href="{{URL::to('requeststatus?id=')}}{{$request->id}}" title="View"><span class="badge_style b_notDone">Waiting</span> </a>
                                    @endif
                                </td>
                                <td class="center">
                                    {{$request->createdon}}
                                </td>

                                <td class="center">
                                    @if ($priv == 'all' || in_array('0', $Change_request))
                                    <span><a class="action-icons c-approve" href="{{URL::to('viewrequest?id=')}}{{$request->id}}" title="View">View</a></span>
                                    @endif
                                    @if ($priv == 'all' || in_array('3', $Change_request))
                                    <?php $name = Session::get('adminname'); ?>
                                    @if($name=="demo")
                                    <span><a class="inline cboxElement action-icons c-delete" href="#inline_content">Delete</a></span>
                                    @else
                                    <span><a class="action-icons c-delete" onclick="confirmation('{{$request->id}}')" href="#" title="Delete">Delete</a></span>
                                    @endif
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>
                                    S.No
                                </th>
                                <th>
                                    Project title
                                </th>
                                <th>
                                    Funding goal
                                </th>
                                <th>
                                    Funding Duration
                                </th>
                                <th>
                                    Message
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Createdon
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

<script type="text/javascript">
            function confirmation(id) {
            var answer = confirm("Are you sure to delete this record?")
                    if (answer) {
            location.href = 'deleterequest?id=' + id;
            }
            else {
            return false;
            }
            }
</script>
@stop