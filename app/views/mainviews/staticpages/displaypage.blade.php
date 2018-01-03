@extends('layouts.mainlayout')
@section('content')
<section class="cms-container">
    <div class="steps">
        <div class="container">
            <h2>{{$page->pagetitle}}</h2>
            {{$page->description}}
        </div>
    </div>
</section>
@stop