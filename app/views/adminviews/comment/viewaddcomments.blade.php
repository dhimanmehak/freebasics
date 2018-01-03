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
        <div class="grid_12">
            @if(Session::has('success'))
            <div class="login_success">
                <span class="icon"></span> {{Session::get('success');}}
            </div>
            @endif
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon blocks_images"></span>
                    <h6>View/Add Comments</h6>
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
                                    Add Comment
                                </th>
                                <th>
                                    Comments List
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
                                    {{{round($project->totalpledgeamount)}}}
                                </td>                                
                                <td>  
                                    @if ($priv == 'all' || in_array('0', $Comment))
                                    <a href="{{URL::to('addcomment?projectid=')}}{{$project->id}}" class="badge_style b_offline" >Add</a>
                                    @endif
                                </td>                                
                                <td>  
                                    @if ($priv == 'all' || in_array('0', $Comment))
                                    <a href="{{URL::to('commentlist?projectid=')}}{{$project->id}}" class="badge_style b_success" >View</a>
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
                                    Add Comment
                                </th>
                                <th>
                                    Comments List
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
            location.href = 'deletecomment?id=' + id;
        }
        else {
            return false;
        }
    }
</script>

@stop