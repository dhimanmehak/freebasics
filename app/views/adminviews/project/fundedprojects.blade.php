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
                    <h6>Projects List</h6>
                </div>

                <div class="widget_content">                   
                    <table class="display data_tbl">
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
                                    Action
                                </th>                               
                            </tr> 
                        </thead>
                        <tbody>
                            @foreach($projects as $key=>$project)
                            @if(($project->totalpledgeamount >= $project->fundinggoal))
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
                                    {{{$project->totalbacking}}}
                                </td>
                                <td class="center sdate">
                                    {{{$project->totalpledgeamount}}}
                                </td>
                                <td class="center sdate">
                                    @if($project->dayscount < 0)
                                    <span class="badge_style b_done">Transfer fund</span> 
                                    @else
                                    {{$project->dayscount}} days
                                    @endif
                                </td>
                                                              
                            </tr>  
                            @endif
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