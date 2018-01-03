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
                    <h6>Payment Gateway</h6>
                </div>
                <div class="widget_content">

                    <table class="display data_tbl">
                        <thead>                         
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Gateway Name
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
                            @foreach($paymentgateways as $paymentgateway)
                            <tr>
                                <td class="center">
                                    {{$paymentgateway->id}}
                                </td>
                                <td class="center">
                                    {{$paymentgateway->gatewayname}}
                                </td>

                                <td class="center">
                                    @if($paymentgateway->status=='active')
                                    <a title="Click to inactive" class="tip_top" href="javascript:confirm_status('paymentgatewaystatus/{{$paymentgateway->id}}/{{$paymentgateway->status}}');">
                                        <span class="badge_style b_done">{{$paymentgateway->status}}</span></a>
                                    @else
                                    <a title="Click to active" class="tip_top" href="javascript:confirm_status('paymentgatewaystatus/{{$paymentgateway->id}}/{{$paymentgateway->status}}');">
                                        <span class="badge_style b_pending">{{$paymentgateway->status}}</span></a>
                                    @endif
                                </td>

                                <td class="center">
                                    @if ($priv == 'all' || in_array('0', $Payment_gateway))<span><a class="action-icons c-edit" href="{{URL::to('editpaymentgateway?id=')}}{{$paymentgateway->id}}" title="Edit">Edit</a></span> @endif
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
                                    Gateway Name
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
@stop