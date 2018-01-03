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
                    <h6>View Referral by {{$referrer->firstname}} {{$referrer->lastname}}</h6>
                </div>
                <div class="widget_content">

                    <table class="display data_tbl">
                        <thead>
                            <tr>
                                <th>
                                    S.No
                                </th>
                                <th>
                                    Referral Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Email status
                                </th>
                                <th>
                                    Referred by
                                </th>
                                <th>
                                    Login IP
                                </th>
                                <th>
                                    Created on
                                </th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key=>$user)
                            <tr>
                                <td class="center">
                                    {{$key+1}}
                                </td>
                                <td class="center">
                                    {{$user->firstname}} {{$user->lastname}}
                                </td>
                                <td class="center">
                                    {{$user->email}}
                                </td>
                                <td class="center sdate">
                                    @if($user->emailstatus=='1')
                                    <span class="badge_style b_done">active</span>
                                    @else
                                    <span class="badge_style b_pending">inactive</span>
                                    @endif
                                </td>
                                <td class="sdate center">
                                    {{$referrer->firstname}} {{$referrer->lastname}}
                                </td>  
                                <td class="center">
                                    {{$user->lastloginip}}
                                </td>
                                <td class="center">
                                    {{$referrer->createdon}}
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
                                    Referral Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Email status
                                </th>
                                <th>
                                    Referred by
                                </th>
                                <th>
                                    Login IP
                                </th>
                                <th>
                                    Created on
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