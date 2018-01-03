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
                    <h6>Verify accounts</h6>
                </div>
                <div class="widget_content">                   
                    <table class="display data_tbl">
                        <thead>
                            <tr>
                                <th>
                                    S.No
                                </th>
                                <th>
                                    User Name
                                </th>                                
                                <th>
                                    Email
                                </th>
                                <th>
                                    Mobile
                                </th>
                                <th>
                                    Created count
                                </th>
                                <th>
                                    Backed count
                                </th>
				<th>
                                    Submitted on
                                </th>
                                <th>
                                    Action
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
                                    {{{$user->firstname}}} {{{$user->lastname}}}
                                </td>
                                <td class="sdate center">
                                    {{{$user->email}}}
                                </td>
                                <td class="center">
                                    {{{$user->mobile}}}
                                </td>
                                <td class="center">
                                    {{{$user->createdcount}}}
                                </td>
                                <td class="center">
                                    {{{$user->backedcount}}}
                                </td>
								<td class="center">
                                    {{{$user->modifiedon}}}
                                </td>
                                <td class="center sdate">
                                    @if ($priv == 'all' || in_array('2', $Account_verification))
                                    @if($user->accountverified==2)                                
                                    <a href="{{URL::to('viewverifyaccount')}}?id={{$user->id}}"><span class="badge_style b_success">Verification success</span></a>                                

                                    @elseif($user->accountverified==1)
                                    <a href="{{URL::to('viewverifyaccount')}}?id={{$user->id}}"><span class="badge_style b_high">Verify</span></a>                                

                                    @else
                                    <a href="{{URL::to('viewverifyaccount')}}?id={{$user->id}}"><span class="badge_style b_suspend">Not Verified</span></a>                                

                                    @endif
                                    @endif                                
                            </tr>   
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>
                                    S.No
                                </th>
                                <th>
                                    User Name
                                </th>                                
                                <th>
                                    Email
                                </th>
                                <th>
                                    Mobile
                                </th>
                                <th>
                                    Created count
                                </th>
                                <th>
                                    Backed count
                                </th>
                                <th>
                                    Submitted on
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
            location.href = 'deleteverification?id=' + id;
        }
        else {
            return false;
        }
    }
</script>
@stop