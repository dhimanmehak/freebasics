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
                    <h6>Subscribers List</h6>    
                    <form id="display_tbl" action="{{URL::to('sendnewsletter')}}" method="post">
                        <input type="hidden" id="tempvar" name="buttonval">
                        <div class="btn_30_blue" style="float: right;">
                            <a href="#" onclick="return SelectValidationAdmin('SendMailAll');"><span class="icon email_co"></span><span class="btn_link">Send to All</span></a>
                        </div>
                        <div class="btn_30_blue" style="float: right;">
                            <a href="#"  onclick="return checkBoxWithSelectValidationAdmin('SendMail');"><span class="icon email_co"></span><span class="btn_link">Send</span></a>
                        </div>
                        <div class="form_grid_12"  style="float: right;margin-top: 0.6%;">
                            <div class="form_input">
                                <select data-placeholder="Select a Template" style=" width:300px" class="chzn-select" tabindex="13" name="templateid"  id="mail_contents">
                                    <option value=""></option>
                                    @foreach($templates as $template)  
                                    <option value="{{$template->id}}">{{$template->templatename}}</option>
                                    @endforeach
                                </select>
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
                                            Email Address
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Createdon
                                        </th>
                                        <th>
                                            Action
                                        </th>                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subscriptions as $subscription)
                                    <tr>
                                        <td  class="center tr_select">
                                            <input name="checkbox[]" type="checkbox" value="{{$subscription->id}}" tabindex="9" @if($subscription->status=="inactive") disabled @endif>
                                        </td>
                                        <td  class="center">
                                            {{$subscription->email}}
                                        </td>                                    
                                        <td class="center">
                                            @if($subscription->status=='active')
                                            <a title="Click to inactive" class="tip_top" href="javascript:confirm_status('subscriptionstatus/{{$subscription->id}}/{{$subscription->status}}');">
                                                <span class="badge_style b_done">{{$subscription->status}}</span></a>
                                            @else
                                            <a title="Click to active" class="tip_top" href="javascript:confirm_status('subscriptionstatus/{{$subscription->id}}/{{$subscription->status}}');">
                                                <span class="badge_style b_pending">{{$subscription->status}}</span></a>
                                            @endif
                                        </td>   
                                        <td class="center">
                                            {{$subscription->createdon}}
                                        </td>   
                                        <td class="center">
                                            @if ($priv == 'all' || in_array('2', $Subscription))
                                            <span><a class="action-icons c-edit" href="{{URL::to('editsubscription?id=')}}{{$subscription->id}}" title="Edit">Edit</a></span>
                                            @endif
                                            @if ($priv == 'all' || in_array('3', $Subscription))
                                            <?php $name = Session::get('adminname'); ?>
                                            @if($name=="demo")
                                            <span><a class="inline cboxElement action-icons c-delete" href="#inline_content">Delete</a></span>
                                            @else
                                            <span><a class="action-icons c-delete" href="#" onclick="confirmation('{{$subscription->id}}');" title="delete">Delete</a></span>
                                            @endif
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>
                                            <input type="checkbox" class="checkall" tabindex="9">
                                        </th>
                                        <th>
                                            Email Address
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Createdon
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
                        location.href = 'deletesubscription?id=' + id;
                        }
                        else {
                        return false;
                        }
                        }
    </script>

    <script language="JavaScript" type="text/javascript">
                function SelectValidationAdmin(req) {
                var templat = $('#mail_contents').val();
                 if (templat == ''){
                	alert("Please select the mail template");
                 return false;
                }
                	bulk_logs_action(req);
                }

                function checkBoxWithSelectValidationAdmin(req) {
	                var templat = $('#mail_contents').val();
	                if (templat == ''){
						alert("Please select the mail template");
						 return false;
	                }
	                 var tot = 0;
	                 var chkVal = 'on';
	                 var frm = $('#display_tbl input');
	                for (var i = 0; i < frm.length; i++){
		               	 if (frm[i].type == 'checkbox') {
		               	 	if (frm[i].checked) {
		                		tot = 1;
			                 	if (frm[i].value != 'on'){
			               			chkVal = frm[i].value;
			                	}
		                	}
		                }
		             }
	                if (tot == 0) {
		                alert("Please Select the CheckBox");
		                return false;
	                } else if (chkVal == 'on') {
	                	alert("No records found ");
	                    return false;
	                } else {
	                	bulk_logs_action(req);
	                }
                }
                function bulk_logs_action(req){
                	$("#tempvar").val(req);
                    $('#display_tbl').submit();
                }
    </script>
    @stop