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
            @if(Session::has('failed'))
            <div class="login_invalid">
                <span class="icon"></span> {{Session::get('failed');}}
            </div>
            @endif
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon blocks_images"></span>
                    <h6>Prefooter List</h6>
                </div>
                <div class="widget_content">

                    <table class="display data_tbl">
                        <thead>
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Prefooter Title
                                </th>
                                <th>
                                    Prefooter Link
                                </th>
                                <th>
                                    Prefooter Image
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
                            @foreach($prefooters as $prefooter)
                            <tr>
                                <td class="center">
                                    {{$prefooter->id}}
                                </td>
                                <td class="center">
                                    {{$prefooter->title}}
                                </td>
                                <td class="center">
                                    {{$prefooter->footerlink}}
                                </td>    
                                <td class="center">
                                    <img src="{{$prefooter->image}}" width="56" height="56" alt="prefooter" >
                                </td>   
                                <td class="center">
                                    @if($prefooter->status=='active')
                                    <a title="Click to inactive" class="tip_top" href="javascript:confirm_status('prefooterstatus/{{$prefooter->id}}/{{$prefooter->status}}');">
                                        <span class="badge_style b_done">{{$prefooter->status}}</span></a>
                                    @else
                                    <a title="Click to active" class="tip_top" href="javascript:confirm_status('prefooterstatus/{{$prefooter->id}}/{{$prefooter->status}}');">
                                        <span class="badge_style b_pending">{{$prefooter->status}}</span></a>
                                    @endif
                                </td>
                                <td class="center">
                                    @if ($priv == 'all' || in_array('2', $Prefooter))
                                    <span><a class="action-icons c-edit" href="{{URL::to('editprefooter?id=')}}{{$prefooter->id}}" title="Edit">Edit</a></span>
                                    @endif
                                    <?php $name = Session::get('adminname'); ?>                                    
                                    @if ($priv == 'all' || in_array('3', $Prefooter))                                    
                                    @if($name=="demo")
                                    <span><a class="inline cboxElement action-icons c-delete" href="#inline_content">Delete</a></span>
                                    @else
                                    <span><a class="action-icons c-delete" href="#" onclick="confirmation('{{$prefooter->id}}')" title="delete">Delete</a></span>
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
                                    Prefooter Title
                                </th>
                                <th>
                                    Prefooter Link
                                </th>
                                <th>
                                    Prefooter Image
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
            location.href = 'deleteprefooter?id=' + id;
            }
            else {
            return false;
            }
            }
</script>
@stop