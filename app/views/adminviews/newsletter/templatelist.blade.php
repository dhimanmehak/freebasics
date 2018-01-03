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
                    <h6>Email Template List</h6>
                </div>
                <div class="widget_content">                       
                    <table class="display data_tbl">
                        <thead>
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Template Name
                                </th>
                                <th>
                                    Email Subject
                                </th>     
                                <th>
                                    Sender Email
                                </th>  
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($newsletters as $newsletter)
                            <tr>
                                <td class="center sdate">
                                    {{$newsletter->id}}
                                </td>                                
                                <td class="center sdate">
                                    {{$newsletter->templatename}}
                                </td>
                                <td class="center sdate">
                                    {{$newsletter->subject}}
                                </td>
                                <td class="center sdate">
                                    {{$newsletter->senderemail}}
                                </td>
                                <td class="center">
                                    @if ($priv == 'all' || in_array('2', $Newsletter))
                                    <span><a class="action-icons c-edit" href="{{URL::to('edittemplate?id=')}}{{$newsletter->id}}" title="Edit">Edit</a></span>
                                    @endif
                                    @if ($priv == 'all' || in_array('3', $Newsletter))
                                    <?php $name = Session::get('adminname'); ?>
                                    @if($name=="demo")
                                    <span><a class="inline cboxElement action-icons c-delete" href="#inline_content">Delete</a></span>
                                    @else
                                    <span><a class="action-icons c-delete" href="#" onclick="confirmation('{{$newsletter->id}}');"  title="delete">Delete</a></span>
                                    @endif
                                     @endif
                                    @if ($priv == 'all' || in_array('0', $Newsletter))
                                    <span><a class="action-icons c-approve" href="{{URL::to('viewtemplate?id=')}}{{$newsletter->id}}" title="View">View</a></span>
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
                                    Template Name
                                </th>
                                <th>
                                    Email Subject
                                </th>     
                                <th>
                                    Sender Email
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
            location.href = 'deletetemplate?id=' + id;
        }
        else {
            return false;
        }
    }
</script>
@stop