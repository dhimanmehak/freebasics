<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta property="fb:app_id" content="{{Config::get('adminconfig.facebookappid')}}"/>
	
    @if(isset($ogimage))
    <meta property="og:image" content="{{URL::to($ogimage)}}" />

    @else 
    
<meta property="og:image" content="{{URL::to('uploads/images/fbsharenew.jpg')}}" />
 <meta property="og:url" content="{{URL::to('/align/goal')}}" />
 <meta property="og:type" content="website" />
 
 
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
    <link rel="stylesheet" type="text/css" href="{{URL::asset('main/css/bootstrap.css');}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('main/css/icomoon.css');}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('main/css/magnific-popup.css');}}">
    <link rel="stylesheet" media="all" href="{{URL::asset('main/css/animate.css');}}" type="text/css" />
    <!-- <link rel="stylesheet" type="text/css" href="{{URL::asset('main/css/jquery-ui-1.8.18.custom.css');}}"> -->
     <link rel="stylesheet" media="all" href="{{URL::asset('main/css/jquery-ui.structure.css');}}" type="text/css" />
    <link href="{{URL::asset('main/css/jquery-ui.theme.css');}}" rel="stylesheet" media="screen">
    <link rel="stylesheet" media="all" href="{{URL::asset('main/css/fb-styles.css');}}" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600" rel="stylesheet">
	

<link rel="manifest" href="{{URL::asset('main/images/manifest.json');}}">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="{{URL::asset('main/images/ms-icon-144x144.png');}}">
<meta name="theme-color" content="#ef244d">

    

</head>
