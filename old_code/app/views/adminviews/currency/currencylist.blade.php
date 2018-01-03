@extends('layouts.adminlayout')
@section('content')
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
                    <h6>Currency List</h6>
                </div>
                <div class="widget_content">

                    <table class="display data_tbl">
                        <thead>
                            <tr>
                                <th>
                                    S.No
                                </th>
                                <th>
                                    Currency Type
                                </th>
                                <th>
                                    Country Name
                                </th>
                                <th>
                                    Currency Symbol
                                </th>
                                <th>
                                    Currency Rate
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
                            @foreach($currencies as $currency)
                            <tr>
                                <td class="center">
                                    {{$currency->id}}
                                </td> 
                                <td class="center">
                                    {{$currency->currencytype}}
                                </td>
                                <td class="center">
                                    {{$currency->countryname}}
                                </td>
                                <td class="sdate center">
                                    {{$currency->currencysymbol}}
                                </td>
                                <td class="sdate center">
                                    {{$currency->currencyrate}}
                                </td>
                                <td class="center">
                                    @if($currency->status=='active')
                                     <a title="Click to inactive" class="tip_top" href="javascript:confirm_status('currencystatus/{{$currency->id}}/{{$currency->status}}');">
                                    <span class="badge_style b_done">{{$currency->status}}</span>
                                     </a>
                                    @else
                                    <a title="Click to active" class="tip_top" href="javascript:confirm_status('currencystatus/{{$currency->id}}/{{$currency->status}}');">
                                    <span class="badge_style b_pending">{{$currency->status}}</span>
                                    </a>
                                    @endif
                                </td> 
                                <td class="center">
                                    <span><a class="action-icons c-edit" href="{{URL::to('editcurrency?id=')}}{{$currency->id}}" title="Edit">Edit</a></span><span><a class="action-icons c-delete" onclick="confirmation('{{$currency->id}}')" href="#" title="delete">Delete</a></span>
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
                                    Currency Type
                                </th>
                                <th>
                                    Country Name
                                </th>
                                <th>
                                    Currency Symbol
                                </th>
                                <th>
                                    Currency Rate
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
            location.href = 'deletecurrency?id=' + id;
            }
            else {
            return false;
            }
            }
</script>
@stop