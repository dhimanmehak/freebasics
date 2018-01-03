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
<style>
    textarea[name=remarks] {resize: none;}    
</style>
<div id="content">
    <div class="grid_container">
        <div class="social_activities">
            <a href="{{URL::to('projectlist?project=new')}}"><div class="activities_s thems1" >
                    <div class="block_label">
                        New projects<span>{{$newcount}}</span>
                    </div>
                    <span class="badge_icon user_sl"></span>
                </div></a>
            <a href="{{URL::to('projectlist?project=live')}}"><div class="activities_s thems2" >
                    <div class="block_label">
                        Live projects<span>{{$livecount}}</span>
                    </div>
                    <span class="badge_icon lightbulb_sl"></span>
                </div></a>
            <a href="{{URL::to('projectlist?project=funded')}}"><div class="comments_s  activities_s thems3" >
                    <div class="block_label">
                        Funded projects<span>{{$fundedcount}}</span>
                    </div>
                    <span class="badge_icon communication_sl"></span>
                </div></a>

            <a href="{{URL::to('projectlist?project=failed')}}"><div class="comments_s activities_s thems4" >
                    <div class="block_label" style="width:150px;">
                        Failed projects<span>{{$failedcount}}</span>
                    </div>
                    <span class="badge_icon administrative_docs_sl"></span>
                </div></a>
            <a href="{{URL::to('projectlist')}}"><div class="comments_s activities_s thems5" >
                    <div class="block_label">
                        Total Projects<span>{{$totalcount}}</span>
                    </div>
                    <span class="badge_icon customers_sl"></span>
                </div></a>
            <a href="{{URL::to('projectlist?project=pending')}}"><div class="comments_s activities_s thems6" >
                    <div class="block_label">
                        Pending Projects<span>{{$pendingcount}}</span>
                    </div>
                    <span class="badge_icon customers_sl"></span>
                </div></a>

        </div>
        <div class="grid_12">
            @if(Session::has('success'))
            <div class="login_success">
                <span class="icon"></span> {{Session::get('success');}}
            </div>
            @endif
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon blocks_images"></span>
                    <h6>{{$projecttype}} Projects List</h6>
                </div>
                <div class="widget_content">                   
                    <table class="display data_tbl" id="projecttable">
                        <thead>
                            <tr>
                                <th>
                                    S.No
                                </th>
                                <th>
                                    Project Name
                                </th>
                                <th>
                                    Category 
                                </th>
                                <th>
                                    Creator Name
                                </th>
                                <th>
                                    Funding Goal
                                </th>
                                <th>
                                    Total Backings
                                </th>
                                <th>
                                    Pledge Amount
                                </th>
                                <th>
                                    Expires In
                                </th>
                                <th>
                                    Isfunded
                                </th>
                                <th>Status</th>
                                <th>
                                    Action
                                </th>
                            </tr> 
                        </thead>
                        <tbody>
                            @foreach($projects as $key=>$project)
                            <tr>
                                <td class="center">
                                    {{$key+1}}
                                </td>
                                <td class="center"> 
                                    {{{$project->title}}}
                                </td>
                                <td class="sdate center">
                                    {{{$project->categoryname}}}
                                </td>
                                <td class="center">
                                    {{{$project->firstname}}}
                                </td>
                                <td class="center">
                                    {{{round($project->fundinggoal)}}}
                                </td>
                                <td class="center sdate">
                                    {{{$project->totalbacking}}}
                                </td>
                                <td class="center sdate">
                                    {{{round($project->totalpledgeamount)}}}
                                </td>
                                <td class="center sdate">
                                    @if($project->dayscount < 0)
                                    <span class="badge_style b_pending">Expired</span> 
                                    @else
                                    {{$project->dayscount}} days
                                    @endif
                                </td>
                                <td class="center sdate">
                                    {{$project->isfunded}}
                                </td>
                                <td>
                                    @if($project->projectverified ==0)
                                    <button type="button" class="badge_style b_offline">Draft</button>
                                    @elseif($project->projectverified ==1)
                                    <a href="{{URL::to('viewproject?id=')}}{{$project->id}}" class="badge_style b_medium" >Pending</a>
                                    @elseif($project->projectverified ==2)
                                    <a href="{{URL::to('viewproject?id=')}}{{$project->id}}" class="badge_style b_done" >Approved</a>
                                    @else 
                                    <a href="{{URL::to('viewproject?id=')}}{{$project->id}}" class="badge_style b_suspend" >Suspended</a>
                                    @endif

                                </td>
                                <td class="center">
                                    @if ($priv == 'all' || in_array('0', $Project))
                                    <span><a class="action-icons c-approve" href="{{URL::to('viewproject?id=')}}{{$project->id}}" original-title="View" >View</a></span>
                                    @endif
                                    @if ($priv == 'all' || in_array('2', $Project))
                                    <span><a class="action-icons c-edit" href="{{URL::to('addprojectdetails?id=')}}{{$project->id}}" title="Edit">Edit</a></span>
                                    @endif
                                    @if ($priv == 'all' || in_array('3', $Project))
                                    <?php $name = Session::get('adminname'); ?>
                                    @if($name=="demo")
                                    <span><a class="inline cboxElement action-icons c-delete" href="#inline_content">Delete</a></span>
                                    @else
                                    <span><a class="action-icons c-delete" href="#" onclick="confirmation('{{$project->id}}')" title="delete">Delete</a></span>
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
                                    Project Name
                                </th>
                                <th>
                                    Category 
                                </th>
                                <th>
                                    Creator Name
                                </th>
                                <th>
                                    Funding Goal
                                </th>
                                <th>
                                    Total Backings
                                </th>
                                <th>
                                    Pledge Amount
                                </th>
                                <th>
                                    Expires In
                                </th>
                                <th>
                                    Isfunded
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
            location.href = 'deleteproject?id=' + id;
            }
            else {
            return false;
            }
            }
</script>

@stop