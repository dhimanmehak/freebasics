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
             @if(Session::has('error'))
            <div class="login_invalid">
                <span class="icon"></span> {{Session::get('error');}}
            </div>
            @endif
            
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon blocks_images"></span>
                    <h6>Project of the day (Maximum 1 project allowed)</h6>
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
                                    Pledge Amount
                                </th>
                                <th>
                                    Expires In
                                </th>
                                <th>
                                    View
                                </th>
                                <th>
                                    Project of the day
                                </th>
                            </tr> 
                        </thead>
                        <tbody>
                            @foreach($projectoftheday as $key=>$project)
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
                                    {{{$project->fundinggoal}}}
                                </td>
                                <td class="center sdate">
                                    {{{$project->totalpledgeamount}}}
                                </td>
                                <td class="center sdate">
                                    @if($project->dayscount < 0)
                                    <span class="badge_style b_pending">Expired</span> 
                                    @else
                                    {{$project->dayscount}} days
                                    @endif
                                </td>
                                <td>
                                    <span><a target="_blank" class="badge_style b_low" href="{{URL::to('viewproject?id=')}}{{$project->id}}" original-title="View">View</a></span>
                                </td>
                                 <td class="center">
                                    @if($project->projectoftheday==1)
                                    <a title="Click to remove" class="tip_top" href="javascript:confirmation('{{$project->id}}','{{$project->projectoftheday}}','projectoftheday');">
                                        <span class="badge_style b_done">Yes</span></a>
                                    @else
                                    <a title="Click to add" class="tip_top" href="javascript:confirmation('{{$project->id}}','{{$project->projectoftheday}}','projectoftheday');">
                                        <span class="badge_style b_pending">No</span></a>
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
                                    Pledge Amount
                                </th>
                                <th>
                                    Expires In
                                </th>
                                <th>
                                    View
                                </th>
                                <th>
                                    Project of the day
                                </th>
                            </tr> 
                        </tfoot>
                    </table>
                </div>
            </div>    
            
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon blocks_images"></span>
                    <h6>Popular Projects (Maximum 3 project allowed)</h6>
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
                                    Pledge Amount
                                </th>
                                <th>
                                    Expires In
                                </th>
                                <th>View</th>
                                <th>
                                    Popular
                                </th>
                            </tr> 
                        </thead>
                       
                        <tbody>
                            @foreach($popularprojects as $key=>$project)
                            <tr>
                                <td class="center">
                                    {{$key+1}}
                                </td>
                                <td class="center"> 
                                    {{$project->title}}
                                </td>
                                <td class="sdate center">
                                    {{$project->categoryname}}
                                </td>
                                <td class="center">
                                    {{$project->firstname}}
                                </td>
                                <td class="center">
                                    {{$project->fundinggoal}}
                                </td>
                                <td class="center sdate">
                                    {{$project->totalpledgeamount}}
                                </td>
                                <td class="center sdate">
                                    @if($project->dayscount < 0)
                                    <span class="badge_style b_pending">Expired</span> 
                                    @else
                                    {{$project->dayscount}} days
                                    @endif
                                </td>
                                <td class="center sdate">
                                  <span><a target="_blank" class="badge_style b_low" href="{{URL::to('viewproject?id=')}}{{$project->id}}" original-title="View">View</a></span>
                                </td>
                                 <td class="center">
                                    @if($project->popular==1)
                                    <a title="Click to remove" class="tip_top" href="javascript:confirmation('{{$project->id}}','{{$project->popular}}','popular');">
                                        <span class="badge_style b_done">Yes</span></a>
                                    @else
                                    <a title="Click to add" class="tip_top" href="javascript:confirmation('{{$project->id}}','{{$project->popular}}','popular');">
                                        <span class="badge_style b_pending">No</span></a>
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
                                    Pledge Amount
                                </th>
                                <th>
                                    Expires In
                                </th>
                                <th>
                                    View
                                </th>
                                <th>
                                    Popular
                                </th>
                            </tr> 
                        </tfoot>
                    </table>
                </div>
            </div>
            
                         <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon blocks_images"></span>
                    <h6>New and Noteworthy (Maximum 3 project allowed)</h6>
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
                                    Pledge Amount
                                </th>
                                <th>
                                    Expires In
                                </th>
                                <th>View</th>
                                <th>
                                    New and Noteworthy
                                </th>
                            </tr> 
                        </thead>
                        <tbody>
                            @foreach($newandnoteworthyprojects as $key=>$project)
                            <tr>
                                <td class="center">
                                    {{$key+1}}
                                </td>
                                <td class="center"> 
                                    {{$project->title}}
                                </td>
                                <td class="sdate center">
                                    {{$project->categoryname}}
                                </td>
                                <td class="center">
                                    {{$project->firstname}}
                                </td>
                                <td class="center">
                                    {{$project->fundinggoal}}
                                </td>
                                <td class="center sdate">
                                    {{$project->totalpledgeamount}}
                                </td>
                                <td class="center sdate">
                                    @if($project->dayscount < 0)
                                    <span class="badge_style b_pending">Expired</span> 
                                    @else
                                    {{$project->dayscount}} days
                                    @endif
                                </td>
                                  <td class="center sdate">
                                  <span><a target="_blank" class="badge_style b_low" href="{{URL::to('viewproject?id=')}}{{$project->id}}" original-title="View">View</a></span>
                                </td>
                                 <td class="center">
                                    @if($project->newandnoteworthy==1)
                                    <a title="Click to remove" class="tip_top" href="javascript:confirmation('{{$project->id}}','{{$project->newandnoteworthy}}','newandnoteworthy');">
                                        <span class="badge_style b_done">Yes</span></a>
                                    @else
                                    <a title="Click to add" class="tip_top" href="javascript:confirmation('{{$project->id}}','{{$project->newandnoteworthy}}','newandnoteworthy');">
                                        <span class="badge_style b_pending">No</span></a>
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
                                    Pledge Amount
                                </th>
                                <th>
                                    Expires In
                                </th>
                                <th>
                                    View
                                </th>
                                <th>
                                    New and Noteworthy
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
    function confirmation(id,status,featured) {
        var answer = confirm("Are you sure to change the status of the project?")
        if (answer) {
            location.href = 'updatefeatured?id=' + id+'&&status='+status+'&&feature='+featured;
        }
    }
</script>
@stop