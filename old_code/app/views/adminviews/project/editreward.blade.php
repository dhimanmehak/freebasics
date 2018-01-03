<html>
    <body>
        <div style="width:500px;" >
            <form autocomplete="off" method="post" id="form103" action="{{URL::to('posteditreward')}}" class="form_container left_label>"
               
                <fieldset>
                    <h2>Edit Reward</h2>
                    <ul>
                         <input type='hidden' name='id' value="{{$reward->id}}">
                        <li>
                            <div class="form_grid_12">
                                <label class="field_title">Pledge Amount</label>
                                <div class="form_input">
                                    <div class="form_grid_8 alpha">
                                        <span>{{{$reward->currencysymbol}}}</span>
                                        <input name="pledgeamount" type="text" id="pledgeamount" value="{{{$reward->pledgeamount}}}" class="required">                                                               
                                    </div>
                                    <span class="clear"></span>
                                </div>
                            </div>
                        </li>
						
                        <li>
                            <div class="form_grid_12">
                                <label class="field_title">Description</label>
                                <div class="form_input">
                                    <div class="form_grid_8 alpha">
                                        <textarea name="description" id="description" class="required">{{{$reward->description}}}</textarea>
                                    </div>
                                    <span class="clear"></span>
                                </div>
                            </div>
                        </li>
						<li>
                            <div class="form_grid_12">
                                <label class="field_title">Estimated Delivery</label>
                                <div class="form_input">
                                    <div class="form_grid_8 alpha">
                                        <input type="text" name="estimateddelivery" id="estimateddelivery" value="{{{$reward->estimateddelivery}}}" class="date-block required datepicker" >
                                    </div>
                                    <span class="clear"></span>
                                </div>
                            </div>
                        </li>
                        
                            <div class="form_grid_12 multiline">
                                <label class="field_title">Set Limit</label>
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
                                    <button name="submit" type="submit" class="btn_small btn_blue"><span>Submit</span></button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </fieldset>
            </form>
        </div>
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

          /*  function shippinginvolved1() {
                var temp = document.getElementById("shipping1").value;
                if (temp == 1) {
                    var userslist = document.getElementById("shiptodiv1");
                    userslist.style.display = "block";
                    $('#shipto1').addClass('required');
                } else {
                    var userslist = document.getElementById("shiptodiv1");
                    userslist.style.display = "none";
                    $('#shipto1').removeClass('required');
                }
            }
            
            function dropdownonload() {
                var temp = document.getElementById("shipping1").value;
                if (temp == 1) {
                    var userslist = document.getElementById("shiptodiv1");
                    userslist.style.display = "block";
                    $('#shipto1').addClass('required');
                } else {
                    var userslist = document.getElementById("shiptodiv1");
                    userslist.style.display = "none";
                    $('#shipto1').removeClass('required');
                }
            }*/
            
           //  window.onload = dropdownonload();
       </script>
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
		 });
</script>
<script>
    $(document).on('focus', '.datepicker', function(){
            $(this).datepicker({
            startDate: "+0d",
                    format: "mm-yyyy",
                    viewMode: "months",
                    minViewMode: "months"
            });
   });
 </script>
 <link href="http://eternicode.github.io/bootstrap-datepicker/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" media="screen">
    
    </body>
</html>