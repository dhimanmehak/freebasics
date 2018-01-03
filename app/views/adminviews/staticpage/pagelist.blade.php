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
                    <h6>Static Page List</h6>
                </div>
                <div class="widget_content">                    
                    <table class="display data_tbl">
                        <thead>
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Page Name
                                </th>
                                <th>
                                    SEO Url
                                </th>
                                <th>
                                    Page Type
                                </th>
                                <th>
                                    Hidden Page
                                </th> 
                                <th>
                                    Header
                                </th> 
                                <th>
                                    Footer
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
                            @foreach($pages as $page)
                            <tr>
                                <td class="center">
                                    {{$page->id}}
                                </td>
                                <td class="center">
                                    {{$page->pagename}}
                                </td>
                                <td class="center">
                                    {{$page->seourl}}
                                </td>
                                <td class="center">
                                    {{$page->category}}
                                </td>
                                <td class="center">
                                    {{$page->hidden}}
                                </td>
                                <td class="center">
                                    {{$page->header}}
                                </td>
                                <td class="center">
                                    {{$page->footer}}
                                </td>
                                <td class="center sdate">
                                    @if($page->status=='active')
                                    <a title="Click to inactive" class="tip_top" href="javascript:confirm_status('staticpagestatus/{{$page->id}}/{{$page->status}}');">
                                        <span class="badge_style b_done">{{$page->status}}</span></a>
                                    @else
                                    <a title="Click to active" class="tip_top" href="javascript:confirm_status('staticpagestatus/{{$page->id}}/{{$page->status}}');">
                                        <span class="badge_style b_pending">{{$page->status}}</span></a>
                                    @endif
                                </td>
                                <td class="center">
                                    @if ($priv == 'all' || in_array('2', $Staticpage))
                                    <span><a class="action-icons c-edit" href="{{URL::to('editmainpage?id=')}}{{$page->id}}" title="Edit">Edit</a></span>
                                    @endif
                                    @if ($priv == 'all' || in_array('2', $Staticpage))
                                    <?php $name = Session::get('adminname'); ?>
                                    @if($name=="demo")
                                    <span><a class="inline cboxElement action-icons c-delete" href="#inline_content">Delete</a></span>
                                    @else
                                    <span><a class="action-icons c-delete" href="#"  onclick="confirmation('{{$page->id}}');" title="delete">Delete</a></span><span><a class="action-icons c-approve" href="{{URL::to('viewmainpage?id=')}}{{$page->id}}" title="View">View</a></span>
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
                                    Page Name
                                </th>
                                <th>
                                    Page Url
                                </th>
                                <th>
                                    Page Type
                                </th>
                                <th>
                                    Hidden Page
                                </th>  
                                <th>
                                    Header
                                </th> 
                                <th>
                                    Footer
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
            location.href = 'deletepage?id=' + id;
            }
            else {
            return false;
            }
            }
</script>
@stop