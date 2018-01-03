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
                    <h6>Countries List</h6>
                </div>
                <div class="widget_content">
                    <table class="display data_tbl">
                        <thead>
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Country Name
                                </th>
                                <th>
                                    Country Code
                                </th>
                                <th>
                                    Mobile Code
                                </th>
<!--                                <th>
                                    States 
                                </th>-->
                                <th>
                                    Status
                                </th>                                
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($countries as $country)
                            <tr>
                                <td  class="center">
                                    {{$country->id}}
                                </td>
                                <td  class="center">
                                    {{$country->countryname}}
                                </td>
                                <td  class="center">
                                    {{$country->countrycode}}
                                </td>
                                <td  class="center">
                                    {{$country->countrymobilecode}}
                                </td>
<!--                                <td class="center">
                                    <a href="{{URL::to('statelist?id=')}}{{$country->id}}">View States</a>
                                </td>-->
                                <td class="center">
                                    @if($country->status=='active')
                                    <a title="Click to inactive" class="tip_top" href="javascript:confirm_status('countrystatus/{{$country->id}}/{{$country->status}}');">
                                        <span class="badge_style b_done">{{$country->status}}</span></a>
                                    @else
                                    <a title="Click to active" class="tip_top" href="javascript:confirm_status('countrystatus/{{$country->id}}/{{$country->status}}');">
                                        <span class="badge_style b_pending">{{$country->status}}</span></a>
                                    @endif
                                </td>
                                <td class="center">
                                    @if ($priv == 'all' || in_array('2', $Country))
                                    <span><a class="action-icons c-edit" href="{{URL::to('editcountry?id=')}}{{$country->id}}" title="Edit">Edit</a></span>
                                    @endif
                                    @if ($priv == 'all' || in_array('3', $Country))
                                    <?php $name = Session::get('adminname'); ?>
                                    @if($name=="demo")
                                    <span><a class="inline cboxElement action-icons c-delete" href="#inline_content">Delete</a></span>
                                    @else
                                    <span><a class="action-icons c-delete" href="#"  onclick="confirmation('{{$country->id}}');" title="delete">Delete</a></span><span><a class="action-icons c-approve" href="{{URL::to('viewcountry?id=')}}{{$country->id}}" title="view">View</a></span>
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
                                    Country Name
                                </th>
                                <th>
                                    Country Code
                                </th>
                                <th>
                                    Mobile Code
                                </th>
<!--                                <th>
                                    States 
                                </th>-->
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
            location.href = 'deletecountry?id=' + id;
            }
            else {
            return false;
            }
            }
</script>
@stop