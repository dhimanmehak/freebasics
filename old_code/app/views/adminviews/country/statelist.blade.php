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
                    <h6>State List</h6>
                </div>
                <div class="widget_content">
                    <table class="display data_tbl">
                        <thead>
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    State Name 
                                </th>
                                <th>
                                    State Code 
                                </th>
                                <th>
                                    Country Name
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
                            @foreach($states as $state)
                            <tr>
                                <td class="center">
                                    {{$state->id}}
                                </td>
                                <td class="center">
                                    {{$state->statename}}
                                </td>
                                <td class="center">
                                    {{$state->statecode}}
                                </td>
                                <td class="center">
                                    {{$state->countryname}}
                                </td>
                                <td class="center">
                                     @if($state->status=='active')
                                     <a title="Click to inactive" class="tip_top" href="javascript:confirm_status('statestatus/{{$state->id}}/{{$state->status}}');">
                                         <span class="badge_style b_done">{{$state->status}}</span> </a>
                                    @else
                                    <a title="Click to active" class="tip_top" href="javascript:confirm_status('statestatus/{{$state->id}}/{{$state->status}}');">
                                        <span class="badge_style b_pending">{{$state->status}}</span></a>
                                    @endif
                                </td>

                                <td class="center">
                                    <span><a class="action-icons c-edit" href="{{URL::to('editstate?id=')}}{{$state->id}}" title="Edit">Edit</a></span>
                                    <?php $name = Session::get('adminname'); ?>
                                    @if($name=="demo")
                                    <span><a class="inline cboxElement action-icons c-delete" href="#inline_content">Delete</a></span>
                                    @else
                                    <span><a class="action-icons c-delete" href="#"  onclick="confirmation('{{$state->id}}');" title="delete">Delete</a></span>
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
                                    State Name 
                                </th>
                                <th>
                                    State Code 
                                </th>
                                <th>
                                    Country Name
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
                location.href = 'deletestate?id=' + id;
            }
            else {
                return false;
            }
        }
    </script>
@stop