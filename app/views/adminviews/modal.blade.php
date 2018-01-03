@extends('layouts.adminlayout')
@section('content')

<div id="basic-modal-content">
    vino..:)
</div>
<a href="#" class="basic-modal" onclick="return popup();" data-detail-id="4">Modal Two</a>

<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->

<script>
//    $(".basic-modal").on("click", function (e) {
//        var detailId;
//        detailId = $(this).data("detail-id");
//        $('<div></div>').load('editreward.blade.php?id='+detailId).modal();
//    });
    
    function popup() {      
        $('<div></div>').load('editreward.blade.php?id=4').modal();
    }


</script>
@stop