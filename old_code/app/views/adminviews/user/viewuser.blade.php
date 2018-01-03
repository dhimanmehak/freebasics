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
        <div class="grid_12 full_block">

            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon list"></span>
                    <h6> View User</h6>   
                    <div id="widget_tab">
                        <ul>
                            <li><a href="#tab1" class="active_tab">Profile</a></li>
                            <li><a href="#tab2">Created</a></li>
                            <li><a href="#tab3">Backed</a></li>
                        </ul>
                    </div>
                </div>
                <div class="widget_content">
                    <div id="tab1">
                        <form method="post" action="{{URL::to('posteditbasic')}}" class="form_container left_label" enctype='multipart/form-data'>
                            @foreach($users as $user)                            
                            <ul>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Image<span class="req">*</span></label>
                                        <div class="form_input">
                                            <img src="{{$user->image}}" width="100" height="100" alt="profile" style='margin-left:75px;' onerror="this.src='{{URL::to('main/images/default.png');}}'"/><br>
                                        </div>
                                    </div>
                                </li> 
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title" >First Name<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input  name="firstname" type="text" value="{{$user->firstname}}" maxlength="100" class="large" disabled/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title" id="llastname" for="lastname">Last Name<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="lastname" type="text" value="{{$user->lastname}}" maxlength="100" class="large required" disabled>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">User Name<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="username" type="text" value="{{$user->username}}" maxlength="150" class="large required" disabled/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Email Address<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="email" type="text" value="{{$user->email}}" maxlength="150" class="large required" disabled/>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Mobile<span class="req">*</span></label>
                                        <div class="form_input">
                                            <?php $mobilecode = strstr($user->mobile, '-', true); ?>
                                            <select data-placeholder="Select country code" name="mobilecode" style=" width:200px" class="chzn-select required" tabindex="13" disabled>
                                                <option value=""></option>
                                                @foreach($countries as $country)                                            
                                                <option value="{{$country->countrymobilecode}}" <?php if ($country->countrymobilecode == $mobilecode) { ?> selected='selected'<?php } ?> >{{$country->countryname}} ({{$country->countrymobilecode}})</option>
                                                @endforeach 
                                            </select>
                                            <?php $mobilestr = strstr($user->mobile, '-', false); ?>
                                            <input name="mobile" type="text" maxlength="50" value='{{str_replace('-','',$mobilestr);}}' style="width: 230px !important; margin-left:10px; !important"  class="required" disabled/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Country<span class="req">*</span></label>
                                        <div class="form_input">
                                            <select data-placeholder="Select Country" name="country" style=" width:350px" class="chzn-select required" tabindex="13" disabled>
                                                <option value=""></option>
                                                @foreach($countries as $country)                                            
                                                <option value="{{$country->countryname}}" <?php if ($country->countryname == $user->country) { ?> selected='selected' <?php } ?> >{{$country->countryname}}</option>
                                                @endforeach 
                                            </select>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Address<span class="req">*</span></label>
                                        <div class="form_input">
                                            <textarea name="address" cols="50" rows="5" class="required" disabled>{{$user->address}}</textarea>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Postal Code<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="postalcode" type="text" maxlength="50" value="{{$user->postalcode}}" class="large required" disabled/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Web Url<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="weburl" type="text" maxlength="50" value="{{$user->weburl}}" class="large required" disabled/>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Gender<span class="req">*</span></label>
                                        <div class="form_input">
                                            <select data-placeholder="Select Gender" name="gender" style=" width:350px" class="chzn-select required" tabindex="13" disabled>
                                                @if($user->gender=='male')
                                                <option value="male" selected='selected'>Male</option>
                                                <option value="female">Female</option>
                                                @else
                                                <option value="male">Male</option>
                                                <option value="female" selected='selected'>Female</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </li>    
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Biography<span class="req">*</span></label>
                                        <div class="form_input">
                                            <textarea name="biography" cols="50" rows="8" class="required" disabled>{{$user->biography}}</textarea>
                                        </div>
                                    </div>
                                </li>                                
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title" >Facebook Link<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input  name="facebooklink" type="text" value="{{$user->facebook}}" maxlength="100" class="large" disabled/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Googleplus Link<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="googlepluslink" type="text" value="{{$user->google}}" maxlength="100" class="large" disabled>
                                        </div>
                                    </div>
                                </li>                               
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Twitter Link<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input name="twitterlink" type="text" maxlength="50" value="{{$user->twitter}}" class="large" disabled/>
                                        </div>
                                    </div>
                                </li> 
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title" >Logintype<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input  name="logintype" type="text" value="{{$user->logintype}}" maxlength="100" class="large" disabled/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title" id="llastname" for="lastname">Mobile Status<span class="req">*</span></label>
                                        <div class="form_input">
                                            <select data-placeholder="Select Gender" name="mobilestatus" style=" width:350px" class="chzn-select required" tabindex="13" disabled>
                                                @if($user->mobilestatus==0)
                                                <option value="0" selected='selected'>Not Verified</option>
                                                <option value="1">Verified</option>
                                                @else
                                                <option value="0">Not Verified</option>
                                                <option value="1"  selected='selected'>Verified</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Email Status<span class="req">*</span></label>
                                        <div class="form_input">
                                            <select data-placeholder="Select Gender" name="emailstatus" style=" width:350px" class="chzn-select required" tabindex="13" disabled>
                                                @if($user->emailstatus==0)
                                                <option value="0" selected='selected'>Not Verified</option>
                                                <option value="1">Verified</option>
                                                @else
                                                <option value="0">Not Verified</option>
                                                <option value="1"  selected='selected'>Verified</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Last Login Date</label>
                                        <div class="form_input">
                                            <input name="lastlogindate" type="text" value="{{$user->lastlogindate}}" maxlength="150" class="large " disabled/>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Login IP</label>
                                        <div class="form_input">
                                            <input name="loginip" type="text" value="{{$user->lastloginip}}" maxlength="150" class="large " disabled/>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">State<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input type='text' class="large required" name='state' value='{{$user->state}}' disabled>
                                        </div>
                                    </div>
                                </li> 

                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">City<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input type='text' class="large required" name='city' value='{{$user->city}}' disabled>
                                        </div>
                                    </div>
                                </li> 
                                <li class="li1" style='margin:20px 0 20px 0;'>
                                    <div class="form_grid_12">
                                        <label class="field_title">Secuirty Question<span class="req">*</span></label>
                                        <div class="form_input">
                                            <?php $selected = $user->question; ?>
                                            <select name="question" class="large required" disabled>
                                                <option value=''>-- {{trans('messages.selectsecurityquestion')}} --</option>
                                                <option value="What was your childhood nickname?" <?php if ($selected == 'What was your childhood nickname?') echo ' selected="selected"' ?>>{{trans('messages.securityquestion1')}}</option>
                                                <option value="What is the name of your favorite childhood friend?" <?php if ($selected == 'What is the name of your favorite childhood friend?') echo ' selected="selected"' ?>>{{trans('messages.securityquestion2')}}</option>
                                                <option value="What is your favorite team?" <?php if ($selected == 'What is your favorite team?') echo ' selected="selected"' ?>>{{trans('messages.securityquestion3')}}</option>
                                                <option value="What is the name of person you first kissed?" <?php if ($selected == 'What is the name of person you first kissed?') echo ' selected="selected"' ?>>{{trans('messages.securityquestion4')}}</option>
                                                <option value="What was the name of your elementary / primary school?" <?php if ($selected == 'What was the name of your elementary / primary school?') echo ' selected="selected"' ?>>{{trans('messages.securityquestion5')}}</option>
                                                <option value="What is your pet's name?" <?php if ($selected == "What is your pet's name?") echo ' selected="selected"' ?>>{{trans('messages.securityquestion6')}}</option>
                                                <option value="In what year was your father born?" <?php if ($selected == 'In what year was your father born?') echo ' selected="selected"' ?>>{{trans('messages.securityquestion7')}}</option>
                                                <option value="What was the name of the first company you worked?" <?php if ($selected == 'What was the name of the first company you worked?') echo ' selected="selected"' ?>>{{trans('messages.securityquestion8')}}</option>
                                                <option value="In which city did you get married?" <?php if ($selected == 'In which city did you get married?') echo ' selected="selected"' ?>>{{trans('messages.securityquestion9')}}</option>
                                                <option value="What is your best friend's first name?" <?php if ($selected == "What is your best friend's first name?") echo ' selected="selected"' ?>>{{trans('messages.securityquestion10')}}</option>
                                            </select>
                                            @if ($errors->has('question')) <p class="help-block">{{ $errors->first('question') }}</p> @endif
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Answer<span class="req">*</span></label>
                                        <div class="form_input">
                                            <input type='text' class="large required" name='answer' value='{{$user->answer}}' disabled>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Login Hit</label>
                                        <div class="form_input">
                                            <input type='text' class="large" name='loginhit' value='{{$user->loginhit}}' disabled>
                                        </div>
                                    </div>
                                </li>   

                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Backed projects count</label>
                                        <div class="form_input">
                                            <input type='text' class="large" value="{{$backingscount}}" name='backed' disabled>
                                        </div>
                                    </div>
                                </li>   
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Created projects count</label>
                                        <div class="form_input">
                                            <input type='text' value="{{$projectscount}}" class="large" name='created' disabled>
                                        </div>
                                    </div>
                                </li>   
                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title">Admin Remarks</label>
                                        <div class="form_input">
                                            <textarea  class="large" rows="5" name='adminremarks' disabled>{{$user->adminremarks}}</textarea>
                                        </div>
                                    </div>
                                </li>   

                            </ul>
                            @endforeach
                        </form>
                    </div>
                    <div id="tab2">
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
                                            Funding Goal
                                        </th>
                                        <th>
                                            Total Backings
                                        </th>
                                        <th>
                                            Pledge Amount
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Isfunded
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
                                            <a target="_blank" href="{{URL::to('viewproject?id=')}}{{$project->id}}">{{$project->title}}</a>
                                        </td>
                                        <td class="sdate center">
                                            {{$project->categoryname}}
                                        </td>
                                        <td class="center">
                                            {{$project->fundinggoal}}
                                        </td>
                                        <td class="center sdate">
                                            {{$project->totalbacking}}
                                        </td>
                                        <td class="center sdate">
                                            {{$project->totalpledgeamount}}
                                        </td>
                                        <td class="center">
                                            @if($project->projectverified ==0)
                                            <button type="button" class="badge_style b_offline">Draft</button>
                                            @elseif($project->projectverified ==1)
                                            <button type="button" class="badge_style b_medium" >Pending</button>
                                            @elseif($project->projectverified ==2)
                                            <button type="button" class="badge_style b_done" >Approved</button>
                                            @else 
                                            <button type="button" class="badge_style b_suspend" >Suspended</button>
                                            @endif
                                        </td>                                       
                                        <td class="center sdate">
                                            {{$project->isfunded}}
                                        </td>
                                        <td class="center">
                                            @if ($priv == 'all' || in_array('0', $Project))
                                            <span><a class="action-icons c-approve" href="{{URL::to('viewproject?id=')}}{{$project->id}}" original-title="View">View</a></span>
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
                                            Funding Goal
                                        </th>
                                        <th>
                                            Total Backings
                                        </th>
                                        <th>
                                            Pledge Amount
                                        </th>
                                        <th>
                                            Status
                                        </th>                                        
                                        <th>
                                            Isfunded
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr> 
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div id="tab3">
                        <div class="widget_content">    
                            <table class="display data_tbl">
                                <thead>
                                    <tr>
                                        <th>
                                            S.No
                                        </th>
                                        <th>
                                            Project Title
                                        </th> 
                                        <th>
                                            Pledge Amount
                                        </th>
                                        <th>
                                            Funding Goal
                                        </th>
                                        <th>
                                            Pledge on
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($getdetails as $key=>$detail)
                                    <tr>
                                        <td class="sdate center">
                                            {{$key+1}}
                                        </td>                                
                                        <td class="sdate center">
                                            {{$detail->title}}
                                        </td>
                                        <td class="center">
                                            {{$detail->pledgeamount}}
                                        </td> 
                                        <td class="center sdate">
                                            {{$detail->fundinggoal}}
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
                                            S.No
                                        </th>
                                        <th>
                                            Project Title
                                        </th> 
                                        <th>
                                            Pledge Amount
                                        </th>
                                        <th>
                                            Funding Goal
                                        </th>
                                        <th>
                                            Pledge on
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
    </div>
    <span class="clear"></span>
    <span class="clear"></span>
    @stop