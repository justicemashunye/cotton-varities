@extends('site.app')
@section('title', 'Homepage')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <img class="img-responsive img-fluid max-width: 100%;" src="{{ asset('images/Zimcotton3.png') }}" alt="Zim cotton banner"/>
        </div>
        <div class="col-md-4" style="background-color:#154c79; border-radius:9px;margin-top:15px;">
            <div class="" style=";height: 267px; margin-top:25px;">
            <ul class="list-group text-success" style="font-size:18px;">
                <a href="#"><li class="list-group-item my-2" style="color:#0FDB8D;">MOA website</li></a>
                <a href="#"><li class="list-group-item my-2" style="color:#0FDB8D;">Drss Website</li></a>
                <a href="#"><li class="list-group-item my-2" style="color:#0FDB8D;">Cotton Research Institute Website</li></a>
                <a href="#"><li class="list-group-item my-2" style="color:#0FDB8D;">Cotton Diseases Diagnostic System</li></a>
            </ul>
            </div>
        </div>
    </div>
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 style="font-size:50px; color:#0FDB8D;font-family: 'BioRhyme', serif;font-weight:400;">Zimbabwe Cotton Varieties</h1>
      <p class="lead" style="color:#0E800F; font-weight:500;font-family: 'BioRhyme', serif;font-size:25px;">These are the main varities from the Cotton Research Institute.....xxxxxxxxxxxxxxxxxxxxxx.</p>
    </div>
        @foreach ($varieties->chunk(3) as $chunk)
        <div class="card-deck mb-5 text-center">
                @foreach ($chunk as $variety)
                <div class="card mb-4 box-shadow">
                    <div class="card-header round text-primary" style="font-weight:800;font-size:40px !important;">
                    <a href="{{ route('variety.show', $variety->slug) }}"><h4 class="my-0 font-weight-normal">{{$variety->name}}</h4></a>
                    </div>
                    <div class="card-body" style="padding-left:0px! important;padding-right:0px !important;height:500px;position: relative;">
                    <a href="{{ route('variety.show', $variety->slug) }}"><img class="img-responsive" src="{{ asset('storage/'.$variety->image) }}" alt="{{<?php echo $variety->name;?>}}" style=" border-radius:10px;max-width: 100%; min-width:98%; min-height:80%; max-height:85%;margin-botton:15px !important;display:block;"></a>
                        <a  class="btn btn-lg btn-block btn-primary" href="{{ route('variety.show', $variety->slug) }}" style="position: absolute;bottom: 0;">Learn More</a>
                        <a class="nav-link" href="{{ route('variety.show', $variety->slug) }}">{{ $variety->name }}</a>
                    </div>
                </div>
                @endforeach
        </div>
        @endforeach
</div> 
@stop