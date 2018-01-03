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
                <div class="widget_top">
                    <span class="h_icon blocks_images"></span>
                    <h6>Languages List</h6>
                </div>
                <div class="widget_content">
                    <table class="display data_tbl">
                        <thead>
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Language Name
                                </th>
                                <th>
                                    Language Code
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
                            @foreach($languages as $key=>$language)
                            <tr>
                                <td  class="center">
                                    {{$key+1}}
                                </td>
                                <td  class="center">
                                    {{$language->languagename}}
                                </td>
                                <td  class="center">
                                    {{$language->languagecode}}
                                </td>                                
                                <td class="center">
                                    @if($language->status==1)
                                    <a title="Click to inactive" class="tip_top" href="javascript:confirm_status('languagestatus/{{$language->id}}/{{$language->status}}');">
                                        <span class="badge_style b_done">active</span></a>
                                    @else
                                    <a title="Click to active" class="tip_top" href="javascript:confirm_status('languagestatus/{{$language->id}}/{{$language->status}}');">
                                        <span class="badge_style b_pending">inactive</span></a>
                                    @endif
                                </td>
                                <td class="center">
                                    @if ($priv == 'all' || in_array('2', $Language))
                                    <span><a class="action-icons c-edit" href="{{URL::to('editlanguage?code=')}}{{$language->languagecode}}&&page=1" title="Edit" @if($language->languagecode=="en") style="display:none;" @endif>Edit</a></span>
                                    @endif
                                    @if ($priv == 'all' || in_array('3', $Language))
                                    <?php $name = Session::get('adminname'); ?>
                                    @if($name=="demo")
                                    <span><a class="inline cboxElement action-icons c-delete" href="#inline_content">Delete</a></span>
                                    @else
                                    <span><a class="action-icons c-delete" href="#"  onclick="confirmation('{{$language->id}}');" title="delete" @if($language->languagecode=="en") style="display:none;" @endif>Delete</a></span>
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
                                    Language Name
                                </th>
                                <th>
                                    Language Code
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
</div>
<script type="text/javascript">
            function confirmation(id) {
            var answer = confirm("Are you sure to delete this record?")
                    if (answer) {
            location.href = 'deletelanguage?id=' + id;
            }
            else {
            return false;
            }
            }
</script>
@stop