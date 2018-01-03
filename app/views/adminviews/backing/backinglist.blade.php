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
                <form method="post" id="display_tbl" action="{{URL::to('backingmultipledelete')}}">
                    <div class="widget_top">
                        <span class="h_icon blocks_images"></span>
                        <h6>Backing List</h6>
                        <div class="btn_30_blue" style="float: right;margin-right: 15px;">
                            <button type="button" onclick="deletemultiple();"><span class="icon cross_co"></span><span class="btn_link" style="line-height: 2.2;color:#333;">Delete</span></button>
                        </div>
                    </div>                
                    <div class="widget_content">
                        <table class="display data_tbl">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" class="checkall" tabindex="9">
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
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($getdetails as $key=>$detail)
                                <tr>
                                    <td class="sdate center tr_select">
                                        <input name="checkbox[]" type="checkbox" id="selectmultiple" value="{{$detail->id}}" tabindex="9">
                                    </td>                                
                                    <td class="sdate center">
                                        {{{$detail->title}}}
                                    </td>
                                    <td class="center">
                                        {{{$detail->firstname}}}
                                    </td>
                                    <td class="center">
                                        {{round($detail->pledgeamount)}}
                                    </td> 
                                    <td class="center sdate">
                                        {{round($detail->fundinggoal)}}
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
                                        <input type="checkbox"  class="checkall" tabindex="9">
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
                                        Action
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </form>
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

<script language="JavaScript" type="text/javascript">
       
</script>
@stop