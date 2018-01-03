@extends('layouts.adminlayout')
@section('content')
<div id="content">
    <div class="grid_container">
        <div class="grid_12">
            @if(Session::has('failed'))
            <div class="login_invalid">
                <span class="icon"></span> {{Session::get('failed');}}
            </div>
            @endif
            <div class="widget_wrap">
                <div class="widget_top">
                    <span class="h_icon list"></span>
                    <h6>Edit language</h6>
                    <div class="form_input">
                        <select id="language_select" data-placeholder="Select a Template" style="width: 100px;margin-top: -33px;float: right; margin-right: 10%; padding: 3px;" tabindex="13" name="templateid" >
                            @for($i=1;$i<=$count;$i++)
                            <option value="{{$i}}" @if($pageno==$i) selected="selected" @endif>Page {{$i}}</option>
                            @endfor
                        </select>
                        <button type="button" class="btn_small btn_blue" style="float:right !important;    margin-top: -35px; margin-right: 30px;" onclick="javascript:change_the_another_file('<?php echo $selectedLanguage; ?>');"><span>Submit</span></button>
                    </div>
                </div>
                <div class="widget_content">
                    <form id="form103" autocomplete="off" method="post" action="{{URL::to('posteditlanguage')}}" class="form_container left_label">
                        <input type="hidden" value="{{$pageno}}" name="page">
                        <input type="hidden" value="<?php echo $selectedLanguage; ?>" name="selectedLanguage"/>
                        <ul>  

                            <?php
                            if($pageno==1){
                                $page='';
                            }else{
                                $page=$pageno;
                            }                            
                            
                            for ($i = 1; $i < count($file); $i++) {
                                $temp = str_replace(');', '', $file[$i]);
                                $key = explode('=>', $temp);
                                ?>

                                <li>
                                    <div class="form_grid_12">
                                        <label class="field_title" style="width:50%;text-transform: none;" for="language_vals<?php echo $i; ?>"><?php echo str_replace("'", '', $key[1]); ?> <span class="req">*</span></label>
                                        <div class="form_input"> 
                                            <?php $keyval = str_replace("'", '', $key[0]); ?>
                                            <input name="language_vals[]" style="width:50%;" id="language_vals<?php echo $i; ?>" value="{{stripslashes(htmlspecialchars(trans('messages'.$page.'.'.trim($keyval))))}}"  type="text" tabindex="1" class="required large tipTop" title="Please enter the language"/>
                                            <input name="languageKeys[]" value="<?php echo str_replace("'", '', $key[0]); ?>" id="smtp_host" type="hidden" tabindex="1" class="required large tipTop" title="Please enter the language"/>                                          
                                        </div>
                                    </div>
                                </li>

                                <?php
                            }
                            ?>

                            <li>
                                <div class="form_grid_12">
                                    <div class="form_input">

                                        <button type="submit" class="btn_small btn_blue"><span>Save</span></button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <span class="clear"></span>
</div>
<script type="text/javascript">
    function change_the_another_file(fileName) {
        filenameId = $('#language_select').val();
        if (fileName != '' && filenameId != '') {
            location.href = "editlanguage?code=" + fileName + "&&page=" + filenameId;
        }
    }
</script>
@stop