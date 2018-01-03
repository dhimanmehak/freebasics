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
<style>
    textarea[name=remarks] {resize: none;}    
</style>
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
                    <h6>Comments List</h6>
                </div>
                <div class="widget_content">                   
                    <table class="display data_tbl" id="projecttable">
                        <thead>
                            <tr>
                                <th>
                                    S.No
                                </th>
                                <th>
                                    Comments
                                </th>                                
                                <th>
                                    User Name
                                </th>                                
                                <th>
                                    Created on
                                </th>
                                <th>
                                    Action
                                </th>                            
                            </tr> 
                        </thead>
                        <tbody>
                            @foreach($comments as $key=>$comment)
                            <tr>
                                <td class="center">
                                    {{$key+1}}
                                </td>
                                <td class="center"> 
                                    {{{$comment->comment}}}
                                </td>
                                <td class="sdate center">
                                    {{$comment->username}}
                                </td>                                
                                <td class="center sdate">
                                    {{$comment->postedon}}
                                </td>                                
                                <td class="center">
                                    @if ($priv == 'all' || in_array('0', $Comment))
                                    <span><a class="action-icons c-approve" href="{{URL::to('viewcomment?id=')}}{{$comment->id}}" original-title="View" >View</a></span>
                                    @endif
                                    @if ($priv == 'all' || in_array('2', $Comment))
                                    <span><a class="action-icons c-edit" href="{{URL::to('editcomment?id=')}}{{$comment->id}}" title="Edit">Edit</a></span>
                                    @endif
                                    @if ($priv == 'all' || in_array('3', $Comment))
                                    <?php $name = Session::get('adminname'); ?>
                                    @if($name=="demo")
                                    <span><a class="inline cboxElement action-icons c-delete" href="#inline_content">Delete</a></span>
                                    @else
                                    <span><a class="action-icons c-delete" href="#" onclick="confirmation('{{$comment->id}}')" title="delete">Delete</a></span>
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
                                    Comments
                                </th>                                
                                <th>
                                    User Name
                                </th>                                
                                <th>
                                    Created on
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
            location.href = 'deletecomment?id=' + id;
        }
        else {
            return false;
        }
    }
</script>

@stop