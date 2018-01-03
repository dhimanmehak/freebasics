@extends('layouts.mainlayout')
@section('content')
<section>
    <div class="list_inner_right">
        <div class="col-lg-8">
            <fieldset>     
                <table width="100%" class="inner_table" border="0"  align="center" cellpadding="0" cellspacing="0" id="tbNames">
                    <tr>
                        <td width="30%"><strong>Ships to</strong></td>
                        <td width="30%"><strong>Cost</strong></td>
                    </tr>                   
                    <tr>

                        <td width="30%">Everywhere Else

                            <input type="hidden" name="shipping_to[]" id="shipping_to_2" value="Everywhere Else" />

                            <input type="hidden" id="shipping_to_2_id" name="ship_to_id[]" value="232">

                                    <!--<select name="shipping_to[]" id="shipping_to_2" style="display:none;" class="shipping_to">

                                        <option value="Everywhere Else">Everywhere Else</option>                                    	

                                        </select>-->

                        </td>

                        <td width="20%" style="margin: 0px 0px 0px 50px;">

                            <p style="width:auto; margin:2px 4px 0 0px;">$</p>

                            <input type="text" value="" class="shipping_txt_box" name="shipping_cost[]" />

                        </td>

                    </tr>

                    <tr>

                        <td width="30%"> 

                            <p id="shipping_to_3_lab" ></p>

                            <select id="shipping_to_3" class="shipping_to form-control" onchange="display_sel_val(this);
                                    toggleDisability(this);
                                    " name="shipping_to[]" style="width: 200px; box-shadow: none; border: 1px solid rgb(205, 205, 205);">

                                <option value="">Select a location</option>
                                @foreach($countries as $country)
                                <option value="{{$country->countryname}}">{{$country->countryname}}</option> 
                                @endforeach

                            </select>

                            <input type="hidden" name="ship_to_id[]" id="shipping_to_3_id" />

                        </td>

                        <td width="20%" style="margin: 0px 0px 0px 50px;">

                            <p style="width:auto; margin:2px 4px 0 0px;">$</p>

                            <input type="text" value="" class="shipping_txt_box" name="shipping_cost[]" />

                        </td>
                    </tr>

                </table>

                <p id="selected_country" style="display:none;"></p>

                <input type="button" value="Add location" class="btn btn-primary" style="width:100px; float: left;" id="btnAdd"/>

                <img src="images/ajax-loader/ajax-loader(1).gif" alt="Loading" style="display:none;width:20px;height:20px;background:none;border:none;" class="search_btn" id="stimg" />
            </fieldset>
        </div>
    </div>
</section>
@stop

