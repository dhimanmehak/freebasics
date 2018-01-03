<html>
    <link rel="stylesheet" media="all" href="{{URL::to('main/css/main.css');}}" type="text/css" />
    <body>
        <div style="width:500px;" >
            <form autocomplete="off" method="post" id="form103" action="{{URL::to('project/posteditreward')}}" class="form_container left_label>"

                  <fieldset>
                    <h2>{{trans('messages2.editreward')}}</h2>
                    <ul>
                        <input type='hidden' name='id' value="{{$reward->id}}">
                        <li>
                            <div class="form_grid_12">
                                <label class="field_title">{{trans('messages.pledgeamount')}}</label>
                                <div class="form_input">
                                    <div class="form_grid_8 alpha bortderholder">
                                        <span>{{$reward->currencysymbol}}</span>
                                        <input name="pledgeamount" type="text" id="pledgeamount" value="{{round($reward->pledgeamount)}}" onkeypress="return numbersonly(event)" required>                                                               
                                    </div>
                                    <span class="clear"></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form_grid_12">
                                <label class="field_title">{{trans('messages.description')}}</label>
                                <div class="form_input">
                                    <div class="form_grid_8 alpha">
                                        <textarea name="description" id="description" required>{{{$reward->description}}}</textarea>
                                    </div>
                                    <span class="clear"></span>
                                </div>
                            </div>
                        </li>
                        
                        <li>
                            <div class="form_grid_12">
                                <label class="field_title">{{trans('messages.estimateddelivery')}}</label>
                                <div class="form_input">
                                    <div class="form_grid_8 alpha">
                                        <input type="text" name="estimateddelivery" class="required estimateddelivery" value="{{$reward->estimateddelivery}}" required>
                                    </div>
                                    <span class="clear"></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form_grid_12 multiline">
                                <label class="field_title">{{trans('messages2.setlimit')}}</label>
                                <div class="form_input">
                                    <div class="form_grid_1 alpha">
                                        <input name="limit" id="limit1" type="checkbox" onclick="checkedcheckbox1();" @if($reward->islimited==1)checked @endif>
                                    </div>
                                    <div class="form_grid_4">
                                        <input name="limitcount" type="text" value="{{$reward->quantity}}" id="limitcount1" style="display:none;">
                                    </div>
                                    <span class="clear"></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form_grid_12">
                                <div class="form_input">
                                    <button name="submit" type="submit" class="btn_small btn_blue" id="submitreward"  onclick="return supportvalidate();"><span>{{trans('messages.submit')}}</span></button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </fieldset>
            </form>
        </div>

        <!--<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js" charset="UTF-8"></script>-->
        <script type="text/javascript" src="http://eternicode.github.io/bootstrap-datepicker/bootstrap-datepicker/js/bootstrap-datepicker.js" charset="UTF-8"></script>
       <!-- <script type="text/javascript">
                                            var today = new Date();

                                            var lastDate = new Date(today.getFullYear(), today.getMonth() + 1, 0);

                                            $(".datepicker").datepicker({
                                                startDate: "+0d",
                                                format: "mm-yyyy",
                                                viewMode: "months",
                                                minViewMode: "months"

                                            });
        </script>-->
		<script type="text/javascript">
    $('.estimateddelivery').datetimepicker({
        startDate: '+1d',
        language: 'en',
        //endDate: "+60d",
        weekStart: 1,  
        format: "yyyy-mm-dd",		
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,         
        startView: 2,
        minView: 2,
        forceParse: 0
    });
</script>
        <script>

            function checkedcheckbox1() {
                var temp = document.getElementById("limit1").checked;
                if (temp == true) {
                    var userslist = document.getElementById("limitcount1");
                    userslist.style.display = "block";
                    $('#limitcount1').addClass('required');
                } else {
                    var userslist = document.getElementById("limitcount1");
                    userslist.style.display = "none";
                    $('#limitcount1').removeClass('required');
                }
            }

            function checkboxonload() {
                var temp = document.getElementById("limit1").checked;
                if (temp == true) {
                    var userslist = document.getElementById("limitcount1");
                    userslist.style.display = "block";
                    $('#limitcount1').addClass('required');
                } else {
                    var userslist = document.getElementById("limitcount1");
                    userslist.style.display = "none";
                    $('#limitcount1').removeClass('required');
                }
            }
            window.onload = checkboxonload();
        </script>
    </body>
</html>

<style type="text/css">
#form103 li input


    #form103 li {
        float: left;
        padding: 4px 0;
        width: 100%;
    }

    #form103 li input{
        float: left; width: 100%; border-radius: 0px;
        margin: 8px 0 10px;
    }

#form103 li input#pledgeamount {
    border: medium none;
    box-shadow: none;
    float: left;
    width: 90%;
}
    #form103 li textarea{
        float: left; width: 100%; border-radius: 0px;
        margin: 8px 0 10px;
    }

    #form103 li select{
        float: left; width: 100%; border-radius: 0px;
        margin: 8px 0 10px;
        width: 100% !important;
    }

    #form103 li .form_grid_12.multiline label {
        float: left;
    }

    #form103 li .form_grid_12.multiline input{
        float: left;
        width: 100%;
    }

    #form103 li input#limit1{width: auto; float: left;  margin: 2px 0 0 10px;   }

    #form103 .btn_small.btn_blue {
        background: #2fde76 none repeat scroll 0 0;
        border: medium none;
        border-radius: 3px;
        color: #fff;
        float: right;
        padding: 6px 20px;
    }

    #cboxClose{bottom: auto; top: 0}

    #cboxClose{border: none; box-shadow: none;}

 .bortderholder span {
    float: left;
    font-size: 20px;
    padding: 1px 2px;
}.bortderholder {
    border: 1px solid #ccc;
    box-shadow: 0 0 2px 0 #ccc inset;
    float: left;
    margin: 6px 0;
    padding: 4px 0;
    width: 100%;
}
</style>
<style>
    .error {
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
        $("#form103").validate({
            onsubmit: true,
            rules: {
                limitcount: {greaterThan: 0}
            },
        });
    }
</script>

<style type="text/css">
 #cboxLoadedContent{  overflow: visible !important;}   

</style>