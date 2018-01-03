<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta property="fb:app_id" content="{{Config::get('adminconfig.facebookappid')}}"/>
    @if(isset($ogimage))
    <meta property="og:image" content="{{URL::to($ogimage)}}" />
    @else 
    <meta property="og:image" content="{{URL::to('uploads/images/fbshare.jpg')}}" />
    @endif
    @if(isset($ogtitle))
    <meta property="og:title" content="{{$ogtitle}}" />
    @else 
    <meta property="og:title" content="{{Config::get('adminconfig.sitetitle')}}" />
    @endif
    @if(isset($ogdescription))
    <meta property="og:description" content="{{$ogdescription}}" />
    @else 
    <meta property="og:description" content="{{Config::get('adminconfig.metadescription')}}" />
    @endif
    
    @if(isset($metatitle) && $metatitle!='')
    <title>{{$metatitle.'-fundstarter'}}</title>   
    @else
    <title>{{Config::get('adminconfig.sitetitle');}}</title>
    @endif
    <link href="{{URL::to('')}}/{{Config::get('adminconfig.favicon');}}" rel="icon" type="image/x-icon">
    @if(isset($metatitle))
    <meta name="Title" content="{{$metatitle}}"/>
    @else 
    <meta name="Title" content="{{Config::get('adminconfig.metatitle');}}" />
    @endif    
    @if(isset($metakeyword))
    <meta name="keywords" content="{{$metakeyword}}" />
    @else
    <meta name="keywords" content="{{Config::get('adminconfig.metakeyword');}}" />
    @endif
    @if(isset($metadescription))
    <meta name="description" content="{{$metadescription}}"/>
    @else
    <meta name="description" content="{{Config::get('adminconfig.metadescription');}}" />
    @endif
    <link rel="stylesheet" type="text/css" href="{{URL::asset('main/css/twitter-bootstrap.css');}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('main/css/bootstrap-min.css');}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('main/css/content.css');}}">
    <link rel="stylesheet" media="all" href="{{URL::asset('main/css/font-awesome.css');}}" type="text/css" />
    <!-- <link rel="stylesheet" type="text/css" href="{{URL::asset('main/css/jquery-ui-1.8.18.custom.css');}}"> -->


    <link rel="stylesheet" media="all" href="{{URL::asset('main/css/main.css');}}" type="text/css" />
    <link href="{{URL::asset('main/css/bootstrap-datetimepicker.min.css');}}" rel="stylesheet" media="screen">
    <link rel="stylesheet" media="all" href="{{URL::asset('main/css/style.css');}}" type="text/css" />
    <link rel="stylesheet" media="all" href="{{URL::asset('main/css/style-responsive.css');}}" type="text/css" />
    <link rel="stylesheet" media="all" href="{{URL::asset('main/css/date/datepicker.css');}}" type="text/css" />
    <link rel="stylesheet" media="all" href="{{URL::asset('main/css/cssCharts.css');}}" type="text/css" />

    <script type="text/javascript" src="{{URL::asset('main/js/1.10.min.js');}}"></script>
    <script type="text/javascript" src="{{URL::asset('main/js/bootstrap.min.js');}}"></script>
    <script type="text/javascript" src="{{URL::asset('main/js/bootstrap.js');}}"></script>    

    <script type="text/javascript" src="{{URL::asset('main/js/bootstrap-datetimepicker.js');}}"></script>
    <script type="text/javascript" src="{{URL::asset('main/js/locales/bootstrap-datetimepicker.uk.js');}}"></script> 
    <script type="text/javascript" src="{{URL::asset('main/js/date/bootstrap-datepicker.js');}}"></script>
    <script type="text/javascript" src="{{URL::asset('main/js/jquery.chart.js');}}"></script>
    <script type="text/javascript" src="{{URL::asset('main/js/commonscript.js');}}"></script>
    <script type="text/javascript" src="{{URL::asset('main/js/jquery.validate.min.js');}}"></script>


</head>
