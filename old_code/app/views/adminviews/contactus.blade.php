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
                    <h6>Contact Us</h6>
                </div>
                <div class="widget_content">

                    <table class="display data_tbl">
                        <thead>
                            <tr>
                                <th>
                                    S.No
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Project
                                </th>
                                <th>
                                    Subject
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
                            @foreach($contacts as $contact)
                            <tr>
                                <td class="center">
                                    {{$contact->id}}
                                </td>
                                <td class="center">
                                    {{$contact->firstname}}
                                </td>
                                <td class="sdate center">
                                    {{$contact->email}}
                                </td>
                                <td class="sdate center">
                                    <a href="{{URL::to('viewproject?id=')}}{{$contact->mobile}}" target="_blank">{{$contact->title}}</a>
                                </td>
                                <td class="center">
                                    {{$contact->subject}}
                                </td>
                                <td class="center">
                                    {{$contact->createdon}}
                                </td>

                                <td class="center">
                                    @if ($priv == 'all' || in_array('0', $Contact_us))
                                    <span><a class="action-icons c-approve" href="{{URL::to('viewcontact?id=')}}{{$contact->id}}" title="View">View</a></span>
                                    @endif
                                     @if ($priv == 'all' || in_array('3', $Contact_us))
                                     <?php $name = Session::get('adminname'); ?>
                                    @if($name=="demo")
                                    <span><a class="inline cboxElement action-icons c-delete" href="#inline_content">Delete</a></span>
                                    @else
                                    <span><a class="action-icons c-delete" onclick="confirmation('{{$contact->id}}')" href="#" title="Delete">Delete</a></span>
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
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Project
                                </th>
                                <th>
                                    Subject
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
            location.href = 'deletecontact?id=' + id;
            }
            else {
            return false;
            }
            }
</script>
@stop