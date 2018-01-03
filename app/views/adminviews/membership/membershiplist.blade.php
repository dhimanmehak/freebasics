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
                    <h6>Membership List</h6>
                </div>
                <div class="widget_content">

                    <table class="display data_tbl">
                        <thead>
                            <tr>
                                <th>
                                    S.No
                                </th>
                                <th>
                                   Package Name
                                </th>
                                <th>
                                    Duration
                                </th>
                                <th>
                                    Features
                                </th>
                                <th>
                                    Price
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
                            @foreach($memberships as $key=>$membership)
                            <tr>
                                <td class="center">
                                    {{$key+1}}
                                </td>
                                <td class="center">
                                    {{$membership->packagename}}
                                </td>
                                <td class="center">
                                    {{$membership->duration}}
                                </td>    
                                <td class="center">
                                     {{$membership->features}}
                                </td>  
                                <td class="center">
                                     {{$membership->price}}
                                </td>  
                                <td class="center">
                                    @if($membership->status=='1')
                                    <a title="Click to inactive" class="tip_top" href="javascript:confirm_status('membershipstatus/{{$membership->id}}/{{$membership->status}}');">
                                        <span class="badge_style b_done">active</span></a>
                                    @else
                                    <a title="Click to active" class="tip_top" href="javascript:confirm_status('membershipstatus/{{$membership->id}}/{{$membership->status}}');">
                                        <span class="badge_style b_pending">inactive</span></a>
                                    @endif
                                </td>
                                <td class="center">
                                    @if ($priv == 'all' || in_array('2', $Membership))
                                    <span><a class="action-icons c-edit" href="{{URL::to('editmembership?id=')}}{{$membership->id}}" title="Edit">Edit</a></span>
                                    @endif
                                    @if ($priv == 'all' || in_array('3', $Membership))
                                    <?php $name = Session::get('adminname'); ?>
                                    @if($name=="demo")
                                    <span><a class="inline cboxElement action-icons c-delete" href="#inline_content">Delete</a></span>
                                    @else
                                    <span><a class="action-icons c-delete" href="#" onclick="confirmation('{{$membership->id}}')" title="delete">Delete</a></span>
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
                                   Package Name
                                </th>
                                <th>
                                    Duration
                                </th>
                                <th>
                                    Features
                                </th>
                                <th>
                                    Price
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
<script type="text/javascript">
            function confirmation(id) {
            var answer = confirm("Are you sure to delete this record?")
                    if (answer) {
            location.href = 'deletemembership?id=' + id;
            }
            else {
            return false;
            }
            }
</script>
@stop