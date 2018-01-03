@extends('layouts.adminlayout')
@section('content')
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
                    <h6>Subadmin List</h6>
                </div>
                <div class="widget_content">

                    <table class="display data_tbl">
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
                            @foreach($subadmins as $subadmin)
                            <tr>
                                <td class="center">
                                    {{$subadmin->id}}
                                </td>
                                <td class="center">
                                    {{$subadmin->name}} 
                                </td > 
                                <td class="center">
                                    {{$subadmin->email}} 
                                </td > 
                                <td class="center">
                                    {{$subadmin->lastlogindate}}
                                </td>
                                <td class="center">
                                    {{$subadmin->lastloginip}}                                    
                                </td>
                                <td class="center sdate">
                                    @if($subadmin->status=='active')
                                    <a title="Click to inactive" class="tip_top" href="javascript:confirm_status('subadminstatus/{{$subadmin->id}}/{{$subadmin->status}}');">
                                        <span class="badge_style b_done">{{$subadmin->status}}</span></a>
                                    @else
                                    <a title="Click to active" class="tip_top" href="javascript:confirm_status('subadminstatus/{{$subadmin->id}}/{{$subadmin->status}}');">
                                        <span class="badge_style b_pending">{{$subadmin->status}}</span></a>
                                    @endif
                                </td>                               
                                <td class="center">
                                    <span><a class="action-icons c-approve" href="{{URL::to('viewsubadmin?id=')}}{{$subadmin->id}}" title="View">View</a></span>
                                    <span><a class="action-icons c-edit" href="{{URL::to('editsubadmin?id=')}}{{$subadmin->id}}" title="Edit">Edit</a></span>
                                    <?php $name = Session::get('adminname'); ?>
                                    @if($name=="demo")
                                    <span><a class="inline cboxElement action-icons c-delete" href="#inline_content">Delete</a></span>
                                    @else
                                    <span><a class="action-icons c-delete" onclick="confirmation('{{$subadmin->id}}');" href="#" title="delete">Delete</a></span>
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

<script type="text/javascript">
            function confirmation(id) {
            var answer = confirm("Are you sure to delete this record?")
                    if (answer){
            location.href = 'deletesubadmin?id=' + id;
            }
            else{
            return false;
            }
            }
</script>
@stop