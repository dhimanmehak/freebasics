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

<div class="page_title">
    <span class="title_icon"><span class="computer_imac"></span></span>
    <h3>Dashboard</h3>   
</div>

<div id="content">
    <div class="grid_container">

        <div class="social_activities">
            <a @if($admintype=="super") href="{{URL::to('userlist')}}" @else @if(isset($User))href="{{URL::to('userlist')}}" @else href="javascript:void(0);" @endif @endif><div class="activities_s thems1">
                    <div class="block_label">
                        Total Users<span>{{$usercount}}</span>
                    </div>
                    <span class="badge_icon customers_sl"></span>

                </div></a>
            <a @if($admintype=="super") href="{{URL::to('projectlist')}}" @else @if(isset($Project)) href="{{URL::to('projectlist')}}" @else href="javascript:void(0);" @endif @endif><div class="activities_s thems2">
                    <div class="block_label">
                        Total Projects<span>{{$projectcount}}</span>
                    </div>
                    <span class="badge_icon archives_sl"></span>
                </div></a>
            <a @if($admintype=="super")  href="{{URL::to('userlist?user=new')}}"  @else @if(isset($User)) href="{{URL::to('userlist?user=new')}}" @else href="javascript:void(0);" @endif @endif><div class="activities_s thems3">
                    <div class="block_label">
                        New Users<span>{{$newusercount}}</span>
                    </div>
                    <span class="badge_icon user_sl"></span>
                </div></a>
            <div class="activities_s thems8">
                <div class="block_label">
                    Total Fund<span>{{round($totalfund)}}</span>
                </div>
                <span class="badge_icon bank_sl"></span>
            </div>

        </div>
        <a @if($admintype=="super") href="{{URL::to('verifyaccount')}}" @else @if(isset($Account_verification))href="{{URL::to('verifyaccount')}}" @else href="javascript:void(0);" @endif @endif> <div class="social_activities">
                <div class="activities_s thems7">
                    <div class="block_label" style="width:127px;">
                        Pending Approvals<span>{{$approvals}}</span>
                    </div>
                    <span class="badge_icon finished_work_sl"></span>
                </div> </a>
        <a  @if($admintype=="super")href="{{URL::to('transferfund')}}" @else @if(isset($Transfer_fund)) href="{{URL::to('transferfund')}}" @else href="javascript:void(0);" @endif @endif><div class="activities_s thems4">
                <div class="block_label" style="width:127px;">
                    Pending Transfers<span>{{$transfers}}</span>
                </div>
                <span class="badge_icon communication_sl"></span>
            </div></a>
        <a @if($admintype=="super")  href="{{URL::to('backinglist')}}"  @else @if(isset($Backing)) href="{{URL::to('backinglist')}}" @else href="javascript:void(0);" @endif @endif><div class="activities_s thems5">
                <div class="block_label" style="width:127px;">
                    Total Backings<span>{{$backingcount}}</span>
                </div>
                <span class="badge_icon administrative_docs_sl"></span>
            </div></a>
        <a @if($admintype=="super") href="{{URL::to('requestlist')}}" @else @if(isset($Change_request)) href="{{URL::to('requestlist')}}" @else href="javascript:void(0);" @endif @endif><div class="activities_s thems6">
                <div class="block_label" style=" width: 150px;">
                    Change Requests<span>{{$requestcount}}</span>
                </div>
                <span class="badge_icon attibutes_sl"></span>
            </div></a>

    </div>

    <div class="grid_6">
        <div class="widget_wrap">
            <div class="widget_top">
                <span class="h_icon graph"></span>
                <h6>Statistics</h6>
            </div>
            <div class="widget_content">
                <div class="stat_block">
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    Total Backers
                                </td>
                                <td>
                                    {{$backercount}}
                                </td>
                                <td class="min_chart">
                                    <span class="bar">20,30,50,200,250,280,350</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Total Creators
                                </td>
                                <td>
                                    {{$creatorcount}}
                                </td>
                                <td class="min_chart">
                                    <span class="line">20,30,50,200,250,280,350</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Total Backings
                                </td>
                                <td>
                                    {{$backingcount}}
                                </td>
                                <td class="min_chart">
                                    <span class="line">20,30,50,200,250,280,350</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="stat_chart">
                        <div class="pie_chart">
                            <span class="inner_circle">{{$newusercount}}/{{$usercount}}</span>
                            <span class="pie">{{$newusercount}}/{{$usercount}}</span>
                        </div>
                        <div class="chart_label">
                            <ul>
                                <li><span class="new_visits"></span>New Users: {{$newusercount}}</li>
                                <li><span class="unique_visits"></span>Total Users: {{$usercount}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid_6">
        <div class="widget_wrap">
            <div class="widget_top">
                <span class="h_icon users"></span>
                <h6>Recent Users</h6>
            </div>
            <div class="widget_content">
                <div class="user_list">
                    @foreach($recentusers as $recentuser)
                    <div class="user_block">
                        <div class="info_block">
                            <div class="widget_thumb">
                                <img src="{{$recentuser->image}}" width="40" height="40" alt="user" onerror="this.src='{{URL::To('main/images/default.png');}}'">
                            </div>
                            <ul class="list_info">
                                <li><span><b>Name:</b> <i><a @if($admintype=="super") href="{{URL::to('viewuser?id=')}}{{$recentuser->id}}" @else @if(isset($User))href="{{URL::to('viewuser?id=')}}{{$recentuser->id}}" @else href="javascript:void(0);"  @endif  @endif>{{$recentuser->firstname}} {{$recentuser->lastname}}</a></i></span></li>
                                <li><span><b>Email: </b>{{$recentuser->email}}</span> <span><b>IP:</b> {{$recentuser->lastloginip}}</span></li>
                                <li><span><b>Last Login:</b> {{$recentuser->lastlogindate}}</span> <span><b>Login Hit:</b> {{$recentuser->loginhit}}</span></li>
                                <li><span><b>Location:</b> {{$recentuser->city}},{{$recentuser->state}},{{$recentuser->country}}</span></li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <span class="clear"></span>

    @if((($admintype=="sub")&&isset($Project))||($admintype=="super"))
    <div class="grid_12">
        <div class="widget_wrap">
            <div class="widget_top">
                <span class="h_icon documents"></span>
                <h6>Recent Projects</h6>
            </div>
            <div class="widget_content">						
                <table class="display">
                    <thead>
                        <tr>
                            <th>
                                S.No
                            </th>
                            <th>
                                Project Title
                            </th>
                            <th>
                                Category
                            </th>
                            <th>
                                Creator
                            </th>
                            <th>
                                Funding Goal
                            </th>
                            <th>
                                Total Backing
                            </th>
                            <th>
                                Pledge Amount
                            </th>
                            <th>
                                Funding Duration
                            </th>
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
                                {{$project->totalbacking}}
                            </td>
                            <td class="center sdate">
                                {{round($project->totalpledgeamount)}}
                            </td>
                            <td class="center sdate">
                                {{$project->fundingduration}}
                            </td>  
                            <td class="center">
                                @if ($priv == 'all' || in_array('0', $Project))
                                <span><a class="action-icons c-approve" href="{{URL::to('viewproject?id=')}}{{$project->id}}" original-title="View" >View</a></span>
                                @endif
                                @if ($priv == 'all' || in_array('2', $Project))
                                <span><a class="action-icons c-edit"  href="{{URL::to('addprojectdetails?id=')}}{{$project->id}}" title="Edit">Edit</a></span>
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
                                Project Title
                            </th>
                            <th>
                                Category
                            </th>
                            <th>
                                Creator
                            </th>
                            <th>
                                Funding Goal
                            </th>
                            <th>
                                Total Backing
                            </th>
                            <th>
                                Pledge Amount
                            </th>
                            <th>
                                Funding Duration
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
    @endif
    <span class="clear"></span>
    @if((($admintype=="sub")&&isset($Backing))||($admintype=="super")) 
    <div class="grid_12">
        <div class="widget_wrap">
            <div class="widget_top">
                <span class="h_icon documents"></span>
                <h6>Recent Backings</h6>
            </div>
            <div class="widget_content">
                <table class="display">
                    <thead>
                        <tr>
                            <th>
                                S.No
                            </th>
                            <th>
                                Project Title
                            </th>                                
                            <th>
                                Backer Name
                            </th>  
                            <th>
                                Pledge Amount
                            </th>
                            <th>
                                Funding Goal
                            </th>
                            <th>
                                Backed On
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentbackings as $key=>$detail)
                        <tr>
                            <td class="sdate center">
                                {{$key+1}}
                            </td>                                
                            <td class="sdate center">
                                {{{$detail->title}}}
                            </td>
                            <td class="center">
                                {{{$detail->firstname}}}
                            </td>
                            <td class="center">
                                {{{round($detail->pledgeamount)}}}
                            </td>                               
                            <td class="center sdate">
                                {{{round($detail->fundinggoal)}}}
                            </td>
                            <td class="center sdate">
                                {{$detail->createdon}}
                            </td>
                            <td class="center">
                                @if ($priv == 'all' || in_array('3', $Backing))
                                <?php $name = Session::get('adminname'); ?>
                                @if($name=="demo")
                                <span><a class="inline cboxElement action-icons c-delete" href="#inline_content">Delete</a></span>
                                @else
                                <span><a class="action-icons c-delete" onclick="confirmationbacking('{{$detail->id}}')" href="#" title="delete">Delete</a></span>
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
                                Project Title
                            </th>                               
                            <th>
                                Backer Name
                            </th>  
                            <th>
                                Pledge Amount
                            </th>
                            <th>
                                Funding Goal
                            </th>
                            <th>
                                Backed On
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
    @endif
</div>
<span class="clear"></span>
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

            function confirmationbacking(id) {
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