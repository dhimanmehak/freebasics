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
                    <h6>Referrals</h6>
                </div>
                <div class="widget_content">                  
                    <table class="display data_tbl">
                        <thead>
                            <tr>
                                <th>
                                    S.No
                                </th>
                                <th>
                                    Referrer Name
                                </th>
                                <th>
                                    Referrer Email
                                </th>
                                <th>
                                    Credits
                                </th>                                
                                <th>
                                    Referrals
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
                                <td class="sdate center">
                                    {{$user->referrercredit}}
                                </td>                                                  
                                <td class="center">
                                    <span><a class="action-icons c-approve" href="{{URL::to('viewreferral?id=')}}{{$user->id}}" title="View users"></a></span>
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
                                    Referrer Name
                                </th>
                                <th>
                                    Referrer Email
                                </th>
                                <th>
                                    Credits
                                </th>                                
                                <th>
                                    Referrals
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