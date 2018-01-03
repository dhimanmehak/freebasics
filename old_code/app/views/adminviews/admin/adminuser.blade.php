@extends('layouts.adminlayout')
@section('content')
<?php $name=Session::get('adminname'); ?>
<div id="content">
    <div class="grid_container">
        <div class="grid_12">
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon blocks_images"></span>
                    <h6>Admin User</h6>
                </div>
                <div class="widget_content">                  
                    <table class="display data_tbl">
                        <thead>
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Admin Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Admin Type
                                </th>
                                <th>
                                    Last Login
                                </th>                               
                                <th>
                                    Last Login IP
                                </th>                               
                                <th>
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="center">
                                    {{$adminuser->id}}
                                </td>
                                <td class="center">
                                    {{$adminuser->name}}
                                </td>
                                <td class="sdate center">
                                    {{$adminuser->email}}
                                </td>
                                <td class="center">
                                    {{$adminuser->admintype}}
                                </td>                               
                                <td class="center sdate">
                                    {{$adminuser->lastlogindate}}
                                </td>
                                <td class="center sdate">
                                    {{$adminuser->lastloginip}}
                                </td>
                                <td class="center">
                                    @if($adminuser->status=='active')
                                    <span class="badge_style b_done">{{$adminuser->status}}</span>
                                    @else
                                    <span class="badge_style b_pending">{{$adminuser->status}}</span>
                                    @endif
                                </td> 
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Admin Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Admin Type
                                </th>
                                <th>
                                    Last Login
                                </th>                               
                                <th>
                                    Last Login IP
                                </th>

                                <th>
                                    Status
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop