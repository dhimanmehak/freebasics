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
            @if(Session::has('failed'))
            <div class="login_invalid">
                <span class="icon"></span> {{Session::get('failed');}}
            </div>
            @endif
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon blocks_images"></span>
                    <h6>Transfer Fund</h6>
                </div>

                <div class="widget_content">

                    <table class="display data_tbl">
                        <thead>                         
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Project Name
                                </th>
                                <th>
                                    Creator
                                </th>
                                <th>
                                    Funding Goal
                                </th>
                                <th>
                                    Funded Amount
                                </th>
                                <th>
                                    End Date
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>                                 
                            @foreach($fundedprojects as $key=>$fundedproject)
                            @if($fundedproject->selected=="yes")
                            <tr>                                
                                <td class="center">
                                    {{$key+1}}
                                </td>
                                <td class="center">
                                    {{$fundedproject->title}}
                                </td>
                                <td class="center">
                                    {{$fundedproject->firstname}}
                                </td>
                                <td class="center">
                                    {{round($fundedproject->fundinggoal)}}
                                </td>
                                <td class="center">
                                    {{round($fundedproject->totalpledgeamount)}}
                                </td>
                                <td class="center">
                                    {{$fundedproject->endingon}}
                                </td>
                                <td class="center">
                                    <?php $name = Session::get('adminname'); ?>
                                    @if ($priv == 'all' || in_array('2', $Transfer_fund))                                    
                                    @if($fundedproject->selected=="yes")                                   
                                    @if($name=="demo")
                                    <a class="inline cboxElement action-icons c-delete" href="#inline_content"><span class="badge_style b_success">Transfer</span></a>
                                    @else
                                    <a href="{{URL::to('stripecharge')}}/{{$fundedproject->id}}"><span class="badge_style b_success">Transfer</span></a>
                                    @endif
                                    @else
                                    @if($name=="demo")
                                    <a class="inline cboxElement action-icons c-delete" href="#inline_content"><span class="badge_style b_pending">Refund</span></a>
                                    @else
                                    <a href="#"><span class="badge_style b_pending">Failed</span></a>
                                    @endif
                                    @endif
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Project Name
                                </th>
                                <th>
                                    Creator
                                </th>
                                <th>
                                    Funding Goal
                                </th>
                                <th>
                                    Funded Amount
                                </th>
                                <th>
                                    End Date
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