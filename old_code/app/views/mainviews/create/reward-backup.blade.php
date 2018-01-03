@extends('layouts.mainlayout')
@section('content')

<link href="http://eternicode.github.io/bootstrap-datepicker/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" media="screen">
<section>
    <style>
        .addMoreFields{
            border-radius: 2px;
            color: #fff;
            font-size: 14px;
            height: auto;
            line-height: 60px;
            min-height: 60px;
            padding: 7px 7px;
            background: #2bde73;
            line-height: 0px;
            min-height: 45px;
        }
        .removeFields{
            border-radius: 2px;
            color: #fff;
            font-size: 14px;
            height: auto;
            line-height: 60px;
            min-height: 60px;
            padding: 7px 7px;
            background: #999;
            line-height: 0px;
            min-height: 45px;
            margin-left: 40%;
        }

        .middle-lefts{
            float: left;
            width: 74%;
        }


        .elem_extend .middle-left {
            float: left;
            width: 100%;
        }
        .txtarea{
            width: 77%;
        }
    </style>
    <div class="steps">
        <div class="container">
            <div class="step-head">
                <ol id="" class="steps-navgiaton">
                    <li  class="stp1 ">
                        <a class="a" href="{{URL::to('project/basic')}}/{{$projectdetails->id}}" @if($basicstatus==1)style=" color:#020;font-weight: bold;"@endif><i class="fa fa-check-circle" @if($basicstatus==1)style="color:#2bde73;"@endif></i> {{trans('messages.basics')}} </a>
                    </li>
                    <li class="stp1 ">
                        <a class="a" href="{{URL::to('project/reward')}}/{{$projectdetails->id}}" @if($rewardstatus==1)style="color:#020;font-weight: bold;"@endif><i class="fa fa-check-circle" @if($rewardstatus==1)style="color:#2bde73;"@endif></i> {{trans('messages.rewards')}} </a>
                    </li>
                    <li class="stp1">
                        <a class="a" href="{{URL::to('project/story')}}/{{$projectdetails->id}}" @if($storystatus==1)style="color:#020;font-weight: bold;"@endif><i class="fa fa-check-circle" @if($storystatus==1)style="color:#2bde73;"@endif></i> {{trans('messages.story')}} </a>
                    </li>
                    <li class="stp1">
                        <a class="a" href="{{URL::to('project/about')}}/{{$projectdetails->id}}" @if($aboutstatus==1)style="color:#020;font-weight: bold;"@endif><i class="fa fa-check-circle" @if($aboutstatus==1)style="color:#2bde73;"@endif></i> {{trans('messages.aboutyou')}} </a>
                    </li>
                    <li class="stp1">
                        <a class="a" href="{{URL::to('project/account')}}/{{$projectdetails->id}}" @if($accountstatus==1)style="color:#020;font-weight: bold;"@endif><i class="fa fa-check-circle" @if($accountstatus==1)style="color:#2bde73;"@elseif($accountstatus==2)style="color:#ffffc9;" @elseif($accountstatus==3)style="color:#fc875f;" @endif></i> {{trans('messages.account')}} </a>
                    </li>
                </ol>

                <ol id="" class="steps-navgiaton">
                    <li class="stp1">
                        <a class="a" href="{{URL::to('project/preview')}}/{{$projectdetails->id}}"> {{trans('messages.preview')}} </a>
                    </li>
                </ol>


                <ol id="" class="steps-navgiaton">
                    <li class="stp1">
                        <a class="a" href="{{URL::to('project/updates')}}/{{$projectdetails->id}}"> {{trans('messages.updates')}} </a>
                    </li>
                </ol>

                <ol id="" class="steps-navgiaton">
                    <li class="stp1">
                        <a class="a" href="{{URL::to('project/backers')}}/{{$projectdetails->id}}"> {{trans('messages.capsbackers')}} </a>
                    </li>
                </ol>

                <ol id="" class="steps-navgiaton">
                    <li class="stp1">
                        <a class="a" href="{{URL::to('project/faq')}}/{{$projectdetails->id}}"> {{trans('messages.faq')}} </a>
                    </li>
                </ol>

            </div>

            <div class="title-lined">
                @if(Session::has('success'))
                <div class="alert-message success">
                    {{Session::get('success');}}
                </div>
                @endif
                <span>{{trans('messages.thankpeople')}}?</span>
                <p>{{trans('messages.thankpeopleinfo')}} </p>
            </div>

            <div class="middle-containers" >
                <form id="form" class="coltrolg-form" method="post" action="{{URL::to('project/postreward');}}">
                    <?php $rewardcount = count($rewards); ?>
                    <input type="hidden" name="rcount" id="rcount" value="<?php echo $rewardcount; ?>">
                    <ul class="middle-left full-width" >
                        @foreach($rewards as $key=>$reward)
                        <li>
                            <label class="titl-left-side col-md-3" >{{trans('messages.reward')}} #{{$key+1}}</label>
                            <div class="col-md-9">
                                <ul class="amont-bar">
                                    <li>
                                        <h3 class="mb0" style="margin-left:2%;width: 68%; float: left;"> 
                                            {{trans('messages.pledge')}} {{$projectdetails->currencysymbol}}{{$reward->pledgeamount}} {{trans('messages.ormore')}}
                                        </h3>
                                        @if($reward->backerscount==0)
                                        <a class="delete" style="float: left;" onclick="popup('{{$reward->id}}');" title="Edit this reward">
                                            <span class="fa fa-edit"></span>
                                            {{trans('messages.edit')}}
                                        </a>
                                        <a class="delete" style="float: left; margin-left: 10px;" onclick="confirmation('{{$reward->id}}')" title="Delete this update">
                                            <span class="fa fa-close"></span>
                                            {{trans('messages.delete')}}
                                        </a>
                                        @endif
                                        <div class="pldg-titl" style="width:100%;">
                                            <span class="num-backers">
                                                {{$reward->backerscount}} {{trans('messages.backers')}}
                                            </span>                                       
                                            @if($reward->islimited==1)
                                            @if($reward->quantity==$reward->backerscount)
                                            <span style='font-size: 13px; padding: 5px;  background: #000; color: #fff;'>
                                                <span class="limited-number">{{trans('messages.allgone')}}!</span>
                                            </span>                                            
                                            @else
                                            <span class="bg-yellow " style='font-size: 13px; padding: 5px;'>
                                                <span class="limited-number">{{trans('messages.limited')}} ({{$reward->quantity-$reward->backerscount}} {{trans('messages.leftof')}} {{$reward->quantity}})</span>
                                            </span>
                                            @endif
                                            @endif
                                        </div>
                                        <div class="pldg-titl" style="width:100%;">
                                            <p>{{$reward->description}}</p>
                                        </div>
                                        <div class="pldg-titl" style="width:100%;">
                                            <?php
                                            $date = explode('-', $reward->estimateddelivery);
                                            $delivery = date("M", mktime(0, 0, 0, $date[0])) . ' ' . $date[1];
                                            ?>
                                            <p><b>{{trans('messages.estimateddelivery')}}:</b> {{$delivery}}</p>
                                        </div>                                    
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="middle-lefts full-width">     <div uniqueid="addMoreFields0.26436613842351553" fieldcount="0" maxcountreached="false" totalfieldsadded="0" class="elem_extend" id="reward" style='height: 330px;'>
                            <ul class="middle-left">

                                <input type='hidden' name='id' value='{{$id}}' >
                                <li>
                                    <label class="titl-left-side col-md-3" >{{trans('messages.reward')}}</label>
                                    <div class="col-md-9">
                                        <ul class="amont-bar">
                                            <li>
                                                <span class="pldg-titl">{{trans('messages.pledgeamount')}}</span>
                                                <span style="  position: absolute;margin-top: 12px;margin-left: 7px;">{{$projectdetails->currencysymbol}}</span><input style=" padding-left: 20px;"  name="pledgeamount" onkeypress="return numbersonly(event)" type="text" id="pledgeamount" class="pledge-texct" >  

                                            </li>
                                            <li>
                                                <span class="pldg-titl">{{trans('messages.description')}}</span>
                                                <textarea name="description" id="description" class="hide-br txtarea" ></textarea>
                                            </li>
                                            <li>

                                                <span class="pldg-titl">{{trans('messages.estimateddelivery')}}</span>
                                                <div class="select-left">
                                                    <input placeholder="mm-yyyy" type="text" class="datepicker " id="estimateddelivery" name="estimateddelivery"/>
                                                </div>
                                            </li>
                                            <li>
                                                <span class="pldg-titl">{{trans('messages.limitquantity')}}</span>  
                                                <input class="limit_checkbox" name="limit" id="limit" type="checkbox" onclick="checkedcheckbox();" style="float: left;margin-left: 27px; margin-right: 20px;height: 36px;">
                                                <input name="limitcount" type="text" id="limitcount" onkeypress="return numbersonly(event)" class="pledge-texct " style="display:none;">
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <div>    <a href="#" class="addMoreFields">Add More</a></div>
                            </ul>   

                        </div>

                        <input type="hidden" name="rewardCount" id="rewardCount" value="0" >
                        <ul class='middle-left' style="width: 100%;">
                            <li class='banner-section'>
                                <input type="submit" class='btns-green' onclick="return supportvalidate();" style='line-height: 0px; min-height: 45px;  margin-left: 42%;' value="Update & Continue">
                            </li>
                        </ul> </div>
                </form>
                <div class="middle-right">
                    <li id="step-2-sidebar-help" class="panel" style="display: list-item;">
                        <a class="school-tout" target="_blank" href="/help/handbook/rewards">
                            <span>{{trans('messages.howto')}}:</span>
                            {{trans('messages.createrewards')}}
                        </a>
                        <h5>{{trans('messages.whattooffer')}}</h5>
                        <p> {{trans('messages.whattoofferinfo')}} </p>
                        <h5>{{trans('messages.howtoprice')}}</h5>
                        <ul>
                            <li>{{trans('messages.howtopriceinfo1')}}</li>
                            <li>{{trans('messages.howtopriceinfo2')}}</li>
                            <li>{{trans('messages.howtopriceinfo3')}}</li>
                            <li>{{trans('messages.howtopriceinfo4')}}</li>
                        </ul>
                        <h5 class="dont">{{trans('messages.whatsprohibited')}}</h5>
                        <ul>
                            <li>{{trans('messages.whatsprohibitedinfo1')}}</li>
                            <li>{{trans('messages.whatsprohibitedinfo2')}}</li>
                            <li>{{trans('messages.whatsprohibitedinfo3')}}</li>
                            <li>{{trans('messages.whatsprohibitedinfo4')}}</li>
                            <li>{{trans('messages.whatsprohibitedinfo5')}}</li>
                            <li>
                                {{trans('messages.formorereview')}}
                                <a class="link_to_prohibited_projects_dialog" href="#">{{trans('messages.prohibitedlist')}}</a>
                            </li>
                        </ul>
                    </li>


                </div>

            </div>
            <ul class="alt-tools right list-inline ml1 mt2">
                <li class="mr2">
                    <i class="fa fa-close"></i>
                    <a class="inline-block py1 delete-project grey-dark h5" href="{{URL::to('project/delete');}}/{{$projectdetails->id}}" title="Delete this project">
                        {{trans('messages.deleteproject')}}
                    </a></li>
            </ul>
        </div>
</section>


<!--<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js" charset="UTF-8"></script>-->
<script type="text/javascript" src="http://eternicode.github.io/bootstrap-datepicker/bootstrap-datepicker/js/bootstrap-datepicker.js" charset="UTF-8"></script>
<script type="text/javascript">
                                                    var today = new Date();
                                                    var lastDate = new Date(today.getFullYear(), today.getMonth() + 1, 0);
                                                    $(document).ready(function() {
                                            $(".datepicker").datepicker({
                                            startDate: "+0d",
                                                    format: "mm-yyyy",
                                                    viewMode: "months",
                                                    minViewMode: "months"

                                            });
                                            });</script>

<script src="{{URL::to('admin/js/jquery.multiFieldExtender.min.js');}}"></script>
<script src="{{URL::to('admin/js/jquery.validate.min.js');}}"></script>
<script src="{{URL::to('admin/js/jquery.colorbox-min.js');}}"></script>
<link href="{{URL::to('admin/css/ui-elements.css');}}" rel="stylesheet" type="text/css">
<script>

                                                    $(document).on('focus', '.datepicker', function(){
                                            $(this).datepicker({
                                            startDate: "+0d",
                                                    format: "mm-yyyy",
                                                    viewMode: "months",
                                                    minViewMode: "months"
                                            });
                                            });
                                                    $(".elem_extend").EnableMultiField({
                                            linkText: 'Add More',
                                                    linkClass: 'addMoreFields',
                                                    removeLinkText: 'Remove',
                                                    removeLinkClass: 'removeFields',
                                            });
                                                    $('.item .delete').click(function () {

                                            var elem = $(this).closest('.item');
                                                    $.confirm({
                                                    'title': 'Delete Confirmation',
                                                            'message': 'You are about to delete this item. <br />It cannot be restored at a later time! Continue?',
                                                            'buttons': {
                                                            'Yes': {
                                                            'class': 'btn_30_blue',
                                                                    'action': function () {
                                                                    elem.slideUp();
                                                                    }
                                                            },
                                                                    'No': {
                                                                    'class': 'btn_30_blue',
                                                                            'action': function () {
                                                                            }	// Nothing to do in this case. You can as well omit the action property.
                                                                    }
                                                            }
                                                    });
                                            });</script>
<script>
                    function checkedcheckbox() {
                    var x = document.getElementById("reward").getAttribute("totalfieldsadded");
                            var temp = document.getElementById("limit").checked;
                            if (temp == true) {
                    var userslist = document.getElementById("limitcount");
                            userslist.style.display = "block";
                            $('#limitcount').addClass('required');
                    } else {
                    var userslist = document.getElementById("limitcount"); userslist.style.display = "none";
                            $('#limitcount').removeClass('required');
                    }
                    for (var i = 0; i < x; i++) {
                    var temp = document.getElementById("limit_" + i).checked;
                            if (temp == true) {
                    var userslist = document.getElementById("limitcount_" + i);
                            userslist.style.display = "block";
                            $("#limitcount_" + i).addClass('required');
                    } else {
                    var userslist = document.getElementById("limitcount_" + i);
                            userslist.style.display = "none";
                            $("#limitcount_" + i).removeClass('required');
                    }
                    }
                    }

</script>
<script type="text/javascript">

            function confirmation(id) {
            var answer = confirm("Are you sure to delete this reward?")
                    if (answer) {
            location.href = 'delete/' + id;
            } else {
            return false;
            }
            }


            function popup(valID) {
            $.colorbox({href:"edit/" + valID});
            }


</script>
<script type="text/javascript">
            function numbersonly(e){
            var unicode = e.charCode? e.charCode : e.keyCode
                    if (unicode != 8){ //if the key isn't the backspace key (which we should allow)
            if (unicode < 48 || unicode > 57) //if not a number
                    return false //disable key press
            }
            }
</script>

<script>
            /*   $('#form').data('serialize', $('#form').serialize()); // On load save form current state
             var confirmationMessage = 'It looks like you have been editing something.';
             confirmationMessage += 'If you leave before saving, your changes will be lost.';
             $(window).bind('beforeunload', function (e) {
             if ($('#form').serialize() != $('#form').data('serialize'))
             return confirmationMessage;
             else
             e = null; // i.e; if form state change show warning box, else don't show it.
             });*/
</script>
<script>
            $(document).ready(function() {
            var formdata = $('#form').serialize();
                    $('.a').on('click', function()  {
            if (formdata != $('#form').serialize()) {
            if (window.onbeforeunload = function() {
            var confirmationMessage = 'It looks like you have been editing something.';
                    confirmationMessage += 'If you leave before saving, your changes will be lost.';
                    return confirmationMessage;
            });
            }
            });
            });
                    $('form').submit(function () {
            window.onbeforeunload = null;
            });</script>
<style>
    .pledge-texct.error {
        border: 1px solid red !important;
    }
    label.error  { 
        display:none !important; 
    }
    .ast {
        color: red !important;
        padding:5px;
    }
</style>
<script>
                    function supportvalidate() {
                    var rcount = $('#rcount').val();
                            if (rcount != 0) {
                    return true;
                    } else {
                    var amountvalue = $('#pledgeamount').val();
                            var descriptionval = $('#description').val();
                            if (amountvalue == '') {
                    $('html, body').animate({
                    scrollTop: $("#pledgeamount").offset().top
                    }, 2000);
                    } else if (descriptionval == '') {
                    $('html, body').animate({
                    scrollTop: $("#description").offset().top
                    }, 2000);
                    } else {
                    $("#form").validate({
                    //onsubmit: true,
                    rules: {
                    "pledgeamount":	{
                    required:true,
                    },
                            "description":	{
                            required:true,
                            },
                            "limitcount":	{
                            required:true,
                            },
                    }
                    });
                    }
                    return false;
                    }
                    }
</script>

@stop

