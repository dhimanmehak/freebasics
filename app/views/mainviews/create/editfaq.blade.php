<html>
    <body>
        <div style="width:500px;" >
            <form autocomplete="off" method="post" name="myForm" action="{{URL::to('project/posteditfaq')}}" class="form_container left_label">
                <style>
                    .none{
                        display:none;
                    }
                </style>
                <fieldset>
                    <h2>{{trans('messages.edit')}} {{trans('messages.faq')}}</h2>
                    <ul>
                        <input type='hidden' name='id' value="{{$faq->id}}">
                        <input type='hidden' name='projectid' value="{{$faq->projectid}}">
                        <li>
                            <div class="form_grid_12">
                                <label class="field_title">{{trans('messages.question')}}</label>
                                <div class="form_input">
                                    <div class="form_grid_8 alpha">
                                        <input name="question" type="text" id="title" value="{{{$faq->question}}}" class="required" style="width: 100%;">                                                               
                                    </div>
                                    <p class="help-block none" id="titleerror">Question field is required!</p>
                                    <span class="clear"></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form_grid_12">
                                <label class="field_title">{{trans('messages.answer')}}</label>
                                <div class="form_input">
                                    <div class="form_grid_8 alpha">
                                        <textarea name="answer" id="updateeditor">{{{$faq->answer}}}</textarea>
                                    </div>
                                    <p class="help-block none" id="descriptionerror">Answer field is required!</p>
                                    <span class="clear"></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form_grid_12">
                                <div class="form_input">
                                    <button name="submit" type="submit" class="btn_small btn_blue" id="submitreward"><span>{{trans('messages.submit')}}</span></button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </fieldset>
            </form>
        </div>
        <script type="text/javascript">
            jQuery(function ($) {
                $('#updateeditor').raptor({
                    autoEnable: true,
                    enableUi: false,
                    unloadWarning: false,
                    classes: 'raptor-editing-inline',
                    "plugins": {
                        textBold: true,
                        textItalic: true,
                        textUnderline: true,
                        textStrike: true,
                        embed: true,
                        insertFile: true,
                        linkCreate: true,
                        linkRemove: true,
                        dock: {
                            docked: true,
                            dockToElement: true
                        },
                        unsavedEditWarning: false,
                    }
                });
            });</script>

        <script>
            $("#submitreward").click(function () {
                var textarea = $("#updateeditor").val();
                var textinput = $("#title").val();
                if ($(textarea).text() == '' && textinput == '') {
                    $("#titleerror").css('display', 'block');
                    $("#descriptionerror").css('display', 'block');
                    return false;
                } else {
                    if ($(textarea).text() == '') {
                        $("#descriptionerror").css('display', 'block');
                        return false;
                    } else if (textinput == '') {
                        $("#titleerror").css('display', 'block');
                        return false;
                    } else {
                        return true;
                    }
                }

            });

        </script>
    </body>
</html>

<style type="text/css">
 #cboxLoadedContent{  overflow: visible !important;}   

</style>