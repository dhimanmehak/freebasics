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
                    <h6>Slider List</h6>
                </div>
                <div class="widget_content">

                    <table class="display data_tbl">
                        <thead>
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Slider Name
                                </th>
                                <th>
                                    Slider Title
                                </th>
                                <th>
                                    Slider Image
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
                            @foreach($sliders as $slider)
                            <tr>
                                <td class="sdate center">
                                    {{$slider->id}}
                                </td>
                                <td class="sdate center">
                                    {{$slider->slidername}}
                                </td>
                                <td class="sdate center">
                                    {{$slider->slidertitle}}
                                </td>
                                <td class="center">
                                    <img src="{{$slider->sliderimage}}" width="56" height="56" alt="slider" >
                                </td>
                                <td class="center">
                                    @if($slider->status=='active')
                                    <a title="Click to inactive" class="tip_top" href="javascript:confirm_status('sliderstatus/{{$slider->id}}/{{$slider->status}}');">
                                        <span class="badge_style b_done">{{$slider->status}}</span></a>
                                    @else
                                    <a title="Click to active" class="tip_top" href="javascript:confirm_status('sliderstatus/{{$slider->id}}/{{$slider->status}}');">
                                        <span class="badge_style b_pending">{{$slider->status}}</span></a>
                                    @endif
                                </td>
                                <td class="center">
                                    @if ($priv == 'all' || in_array('2', $Slider))
                                    <span><a class="action-icons c-edit" href="{{URL::to('editslider?id=')}}{{$slider->id}}" title="Edit">Edit</a></span>
                                    @endif
                                    @if ($priv == 'all' || in_array('3', $Slider))
                                    <?php $name = Session::get('adminname'); ?>
                                    @if($name=="demo")
                                    <span><a class="inline cboxElement action-icons c-delete" href="#inline_content">Delete</a></span>
                                    @else
                                    <span><a class="action-icons c-delete" href="#" onclick="confirmation('{{$slider->id}}')" title="delete">Delete</a></span>
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
                                    Slider Name
                                </th>
                                <th>
                                    Slider Title
                                </th>
                                <th>
                                    Slider Image
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
            location.href = 'deleteslider?id=' + id;
            }
            else {
            return false;
            }
            }
</script>
@stop