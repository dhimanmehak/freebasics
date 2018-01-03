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
    <h3>User Dashboard</h3>   
</div>
<div id="content">
    <div class="grid_container">    
        <div class="social_activities">
            <a href="{{URL::to('userlist?user=new')}}"><div class="activities_s thems1">
                <div class="block_label">
                    New Users<span>{{count($newusers)}}</span>
                </div>
                <span class="badge_icon user_sl"></span>
            </div>
            <a href="{{URL::to('referral')}}"><div class="activities_s thems6">
                    <div class="block_label">
                        Referral Users<span>{{count($referredusers)}}</span>
                    </div>
                    <span class="badge_icon communication_sl"></span>
                </div></a>
            <a href="{{URL::to('userlist?user=active')}}"><div class="activities_s thems2">
                    <div class="block_label">
                        Active Users<span>{{$activeusers}}</span>
                    </div>
                    <span class="badge_icon lightbulb_sl"></span>
                </div></a>

            <a href="{{URL::to('userlist?user=inactive')}}"><div class="activities_s thems3" >
                    <div class="block_label">
                        Inactive Users<span>{{$inactiveusers}}</span>
                    </div>
                    <span class="badge_icon administrative_docs_sl"></span>
                </div></a>
            <a href="{{URL::to('userlist')}}"><div class="activities_s thems4">
                    <div class="block_label">
                        Total Users<span>{{$usercount}}</span>
                    </div>
                    <span class="badge_icon customers_sl"></span>
                </div></a>

        </div>        
        <div class="grid_12">
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon blocks_images"></span>
                    <h6>User Engagement</h6>
                </div>
                <div class="widget_content">
                    <div class="stat_chart">
                        <div class="pie_chart" style="width:25%">
                            <span class="inner_circle">{{$idlecount}}/{{$usercount}}</span>
                            <span class="pie"><span style="display: none;">{{$idlecount}}/{{$usercount}}</span><canvas width="150" height="150"></canvas></span>
                            <span>Idle Users</span>
                        </div>
                        
                         <div class="pie_chart" style="width:25%">
                            <span class="inner_circle">{{$backerscount}}/{{$usercount}}</span>
                            <span class="pie"><span style="display: none;">{{$backerscount}}/{{$usercount}}</span><canvas width="150" height="150"></canvas></span>
                            <span>Backers</span>
                         </div>
                        
                         <div class="pie_chart" style="width:25%">
                            <span class="inner_circle">{{$creatorscount}}/{{$usercount}}</span>
                            <span class="pie"><span style="display: none;">{{$creatorscount}}/{{$usercount}}</span><canvas width="150" height="150"></canvas></span>
                            <span>Creators</span>
                         </div>
                        
                        <div class="pie_chart" style="width:25%">
                            <span class="inner_circle">{{$inactiveusers}}/{{$usercount}}</span>
                            <span class="pie"><span style="display: none;">{{$inactiveusers}}/{{$usercount}}</span><canvas width="150" height="150"></canvas></span>
                            <span>Inactive Users</span>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="grid_12">
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon blocks_images"></span>
                    <h6>Recent users</h6>
                </div>
                <div class="widget_content">

                    <table class="display data_tbl">
                        <thead>

                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>                                                            
                                <th>
                                    Last Login IP
                                </th>
                                <th>
                                    Last Login On
                                </th>
                                <th>
                                    Email Status
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
                            @foreach($recents as $key=>$recent)
                            <tr>
                                <td>
                                    {{$key+1}}
                                </td>
                                <td>
                                    {{$recent->firstname}}
                                    {{$recent->lastname}}
                                </td>
                                <td class="sdate center">
                                    {{$recent->email}}
                                </td>                                
                                <td class="center sdate">
                                    {{$recent->lastloginip}}
                                </td>
                                <td class="center sdate">
                                    {{ substr($recent->lastlogindate, 0,10) }}
                                   
                                </td>
                                <td class="sdate center">
                                    @if($recent->emailstatus=='1')
                                    <span class="badge_style b_done">active</span>
                                    @else
                                    <span class="badge_style b_pending">inactive</span>
                                    @endif
                                </td>
                                <td class="center sdate">
                                    @if($recent->status=='active')
                                    <span class="badge_style b_done">{{$recent->status}}</span>
                                    @else
                                    <span class="badge_style b_pending">{{$recent->status}}</span>
                                    @endif
                                </td>
                                <td class="center"> 
                                    @if ($priv == 'all' || in_array('0', $User))
                                    <span><a class="action-icons c-approve" href="{{URL::to('viewuser?id=')}}{{$recent->id}}" title="View">View</a></span>
                                    @endif
                                    @if ($priv == 'all' || in_array('2', $User))
                                    <span><a class="action-icons c-edit" href="{{URL::to('edituser?id=')}}{{$recent->id}}" target="_blank" title="Edit">Edit</a></span>
                                    @endif
                                    <?php $name = Session::get('adminname'); ?>
                                    @if($name=="demo")
                                    <span><a class="inline cboxElement action-icons c-delete" href="#inline_content">Delete</a></span>
                                    @else 
                                    @if ($priv == 'all' || in_array('3', $User))
                                    <span><a class="action-icons c-delete" onclick="confirmation('{{$recent->id}}');" href="#" title="delete">Delete</a></span>
                                    @endif
                                    @endif
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
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>                                                             
                                <th>
                                    Last Login IP
                                </th>
                                <th>
                                    Last Login On
                                </th>
                                <th>
                                    Email Status
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

        <div class="grid_12">
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon blocks_images"></span>
                    <h6>New users</h6>
                </div>
                <div class="widget_content">

                    <table class="display data_tbl">
                        <thead>

                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>                                                            
                                <th>
                                    Last Login IP
                                </th>
                                <th>
                                    Created On
                                </th>
                                <th>
                                    Email Status
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
                            @foreach($newusers as $key=>$newuser)
                            <tr>
                                <td>
                                    {{$key+1}}
                                </td>
                                <td>
                                    {{$newuser->firstname}}
                                    {{$newuser->lastname}}
                                </td>
                                <td class="sdate center">
                                    {{$newuser->email}}
                                </td>                                
                                <td class="center sdate">
                                    {{$newuser->lastloginip}}
                                </td>
                                <td class="center sdate">
                                    {{$newuser->createdon}}
                                </td>
                                <td class="sdate center">
                                    @if($newuser->emailstatus=='1')
                                    <span class="badge_style b_done">active</span>
                                    @else
                                    <span class="badge_style b_pending">inactive</span>
                                    @endif
                                </td>
                                <td class="center sdate">
                                    @if($newuser->status=='active')
                                    <span class="badge_style b_done">{{$newuser->status}}</span>
                                    @else
                                    <span class="badge_style b_pending">{{$newuser->status}}</span>
                                    @endif
                                </td>
                                <td class="center">
                                    @if ($priv == 'all' || in_array('0', $User))
                                    <span><a class="action-icons c-approve" href="{{URL::to('viewuser?id=')}}{{$newuser->id}}" title="View">View</a></span>
                                    @endif
                                    @if ($priv == 'all' || in_array('2', $User))
                                    <span><a class="action-icons c-edit" href="{{URL::to('edituser?id=')}}{{$newuser->id}}" target="_blank" title="Edit">Edit</a></span>
                                    @endif
                                    @if($name=="demo")                                    
                                    <span><a class="inline cboxElement action-icons c-delete" href="#inline_content">Delete</a></span>
                                    @else
                                    @if ($priv == 'all' || in_array('3', $User))
                                    <span><a class="action-icons c-delete" onclick="confirmation('{{$newuser->id}}');" href="#" title="delete">Delete</a></span>
                                    @endif
                                    @endif
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
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>                                                             
                                <th>
                                    Last Login IP
                                </th>
                                <th>
                                    Created On
                                </th>
                                <th>
                                    Email Status
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

        <div class="grid_12">
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon blocks_images"></span>
                    <h6>Referral users</h6>
                </div>
                <div class="widget_content">

                    <table class="display data_tbl">
                        <thead>

                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>                                                            
                                <th>
                                    Last Login IP
                                </th>
                                <th>
                                    Last Login On
                                </th>
                                <th>
                                    Email Status
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
                            @foreach($referredusers as $key=>$refer)
                            <tr>
                                <td>
                                    {{$key+1}}
                                </td>
                                <td>
                                    {{$refer->firstname}}
                                    {{$refer->lastname}}
                                </td>
                                <td class="sdate center">
                                    {{$refer->email}}
                                </td>                                
                                <td class="center sdate">
                                    {{$refer->lastloginip}}
                                </td>
                                <td class="center sdate">
                                    {{$refer->lastlogindate}}
                                </td>
                                <td class="sdate center">
                                    @if($refer->emailstatus=='1')
                                    <span class="badge_style b_done">active</span>
                                    @else
                                    <span class="badge_style b_pending">inactive</span>
                                    @endif
                                </td>
                                <td class="center sdate">
                                    @if($refer->status=='active')
                                    <span class="badge_style b_done">{{$refer->status}}</span>
                                    @else
                                    <span class="badge_style b_pending">{{$refer->status}}</span>
                                    @endif
                                </td>
                                <td class="center">
                                    @if ($priv == 'all' || in_array('0', $User))
                                    <span><a class="action-icons c-approve" href="{{URL::to('viewuser?id=')}}{{$refer->id}}" title="View">View</a></span>
                                    @endif
                                    @if ($priv == 'all' || in_array('2', $User))
                                    <span><a class="action-icons c-edit" href="{{URL::to('edituser?id=')}}{{$refer->id}}" target="_blank" title="Edit">Edit</a></span>
                                    @endif
                                    @if($name=="demo")
                                    <span><a class="inline cboxElement action-icons c-delete" href="#inline_content">Delete</a></span>
                                    @else
                                    @if ($priv == 'all' || in_array('3', $User))
                                    <span><a class="action-icons c-delete" onclick="confirmation('{{$refer->id}}');" href="#" title="delete">Delete</a></span>
                                    @endif
                                    @endif
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
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>                                                             
                                <th>
                                    Last Login IP
                                </th>
                                <th>
                                    Last Login On
                                </th>
                                <th>
                                    Email Status
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
    <span class="clear"></span>
</div>
<script type="text/javascript">
                            function confirmation(id) {
                            var answer = confirm("Are you sure to delete this record?")
                                    if (answer){
                            location.href = 'deleteuser?id=' + id;
                            }
                            else{
                            return false;
                            }
                            }
</script>
<script>

                    /*=================
                     CHART 8
                     ===================*/
                    $(function(){
                    var plot2 = $.jqplot ('chart8', [[3, 7, 9, 1, 5, 3, 8, 2, 5]], {
                    // Give the plot a title.
                    title: 'Plot With Options',
                            // You can specify options for all axes on the plot at once with
                            // the axesDefaults object.  Here, we're using a canvas renderer
                            // to draw the axis label which allows rotated text.
                            axesDefaults: {
                            labelRenderer: $.jqplot.CanvasAxisLabelRenderer
                            },
                            // Likewise, seriesDefaults specifies default options for all
                            // series in a plot.  Options specified in seriesDefaults or
                            // axesDefaults can be overridden by individual series or
                            // axes options.
                            // Here we turn on smoothing for the line.
                            seriesDefaults: {
                            shadow: false, // show shadow or not.
                                    rendererOptions: {
                                    smooth: true
                                    }
                            },
                            // An axes object holds options for all axes.
                            // Allowable axes are xaxis, x2axis, yaxis, y2axis, y3axis, ...
                            // Up to 9 y axes are supported.
                            axes: {
                            // options for each axis are specified in seperate option objects.
                            xaxis: {
                            label: "X Axis",
                                    // Turn off "padding".  This will allow data point to lie on the
                                    // edges of the grid.  Default padding is 1.2 and will keep all
                                    // points inside the bounds of the grid.
                                    pad: 0
                            },
                                    yaxis: {
                                    label: "Y Axis"
                                    }
                            },
                            grid: {
                            borderColor: '#ccc', // CSS color spec for border around grid.
                                    borderWidth: 2.0, // pixel width of border around grid.
                                    shadow: false               // draw a shadow for grid.
                            }
                    });
                    });
</script>
@stop
