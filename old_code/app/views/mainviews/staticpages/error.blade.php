@extends('layouts.mainlayout')
@section('content')<html>
    <head>
        <title></title>
    </head>
    <body>
        <p><img alt="" src="{{URL::to('main/images/error.jpg')}}" style="  width: auto; height: auto; margin-left: 31%; padding: 8%;padding-bottom:3%;" /></p>
        <h5 style="  margin-left: 30%;  font-size: 18px; margin-bottom: 8%;">OOPS! Something went wrong.Sorry for the inconvenience..</h5>
    </body>
</html>
@stop