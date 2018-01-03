@extends('layouts.mainlayout')
@section('content')<html>
    <head>
        <title></title>
    </head>
    <body>
        <p><img alt="" src="{{URL::to('main/images/404.png')}}" style="width: 534px; height: 328px;margin-left: 30%;" /></p>
        <h1 style="  margin-left: 32%;  font-size: 40px; margin-bottom: 8%;">{{trans('messages.pagenotfound')}}</h1>
    </body>
</html>
@stop