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
                    <h6>Category List</h6>
                </div>
                <div class="widget_content">                    
                    <table class="display data_tbl">
                        <thead>                          
                            <tr>
                                <th>
                                    S.No
                                </th>
                                <th>
                                    Category Name
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
                            @foreach($allcategories as $allcategory)
                            <tr>                               
                                <td class="sdate center">
                                    {{$allcategory->id}}
                                </td>
                                <td class="center">
                                    {{$allcategory->categoryname}}
                                </td>                               
                                <td class="center">
                                    @if($allcategory->status=='active')
                                    <a title="Click to inactive" class="tip_top" href="javascript:confirm_status('categorystatus/{{$allcategory->id}}/{{$allcategory->status}}');">
                                        <span class="badge_style b_done">{{$allcategory->status}}</span></a>
                                    @else
                                    <a title="Click to active" class="tip_top" href="javascript:confirm_status('categorystatus/{{$allcategory->id}}/{{$allcategory->status}}');">
                                        <span class="badge_style b_pending">{{$allcategory->status}}</span></a>
                                    @endif
                                </td>
                                <td class="center">
                                    @if ($priv == 'all' || in_array('2', $Category))
                                    <span><a class="action-icons c-edit" href="{{URL::to('editcategory?id=')}}{{$allcategory->id}}" title="Edit">Edit</a></span>
                                    @endif
                                    @if ($priv == 'all' || in_array('3', $Category))
                                    <?php $name = Session::get('adminname'); ?>
                                    @if($name=="demo")
                                    <span><a class="inline cboxElement action-icons c-delete" href="#inline_content">Delete</a></span>
                                    @else
                                    <span><a class="action-icons c-delete" onclick="confirmation('{{$allcategory->id}}');" href="#" title="delete">Delete</a></span>
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
                                    Category Name
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
             if (answer){
            		location.href = 'deletecategory?id=' + id;
            }
            else{
            return false;
            }
            }
</script>
@stop