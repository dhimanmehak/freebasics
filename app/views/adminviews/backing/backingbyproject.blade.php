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
                    <h6>{{$getdetails[0]['title']}}</h6>
                    <a href="{{URL::to('exportbackers?id=');}}{{$projectid}}" class="badge_style b_medium" style="float: right;margin-top: -3.4%;margin-right: 36px;padding: 10px;">Export backers</a>
                </div>
                <div class="widget_content">
                    <table class="display data_tbl">
                        <thead>
                            <tr>
                                <th>
                                    S.No
                                </th>                             
                                <th>
                                    Backer Name
                                </th>  
                                <th>
                                    Email
                                </th>  
                                <th>
                                    Contact
                                </th>  
                                <th>
                                    Pledge Amount
                                </th>
                                <th>
                                    Reward
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($getdetails as $key=>$detail)
                            <tr>
                                <td class="sdate center">
                                    {{$key+1}}
                                </td> 
                                <td class="center">
                                    {{{$detail->firstname}}}
                                </td>
                                <td class="center">
                                    {{{$detail->email}}}
                                </td>
                                <td class="center">
                                     @if($detail->mobile=='')
                                     -
                                    @else
                                    {{$detail->mobile}}
                                    @endif
                                </td>                               
                                <td class="center">
                                    {{$detail->pledgeamount}}
                                </td> 
                                <td class="center">
                                    @if($detail->description=='')
                                    No Reward
                                    @else
                                    {{{$detail->description}}}
                                    @endif
                                </td>
                                <td class="center">
                                    @if ($priv == 'all' || in_array('3', $Backing))
                                    <?php $name = Session::get('adminname'); ?>
                                    @if($name=="demo")
                                    <span><a class="inline cboxElement action-icons c-delete" href="#inline_content">Delete</a></span>
                                    @else
                                    <span><a class="action-icons c-delete" onclick="confirmation('{{$detail->id}}')" href="#" title="delete">Delete</a></span>
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
                                    Backer Name
                                </th>  
                                <th>
                                    Email
                                </th>  
                                <th>
                                    Contact
                                </th>  
                                <th>
                                    Pledge Amount
                                </th>
                                <th>
                                    Reward
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
            location.href = 'deletebacking?id=' + id;
            }
            else {
            return false;
            }
            }
</script>
@stop