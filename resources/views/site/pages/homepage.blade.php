@extends('site.app')
@section('title', 'Homepage')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <img class="img-responsive img-fluid max-width: 100%;" src="{{ asset('images/Zimcotton3.png') }}" alt="Zim cotton banner"/>
        </div>
        <div class="col-md-4">
            <div class="" style="height: 267px; margin-top:25px;">
            <ul class="list-group text-success">
                <a href="#"><li class="list-group-item my-2">Cras justo odio</li></a>
                <a href="#"><li class="list-group-item my-2">Dapibus ac facilisis in</li></a>
                <a href="#"><li class="list-group-item my-2">Porta ac consectetur ac</li></a>
                <a href="#"><li class="list-group-item my-2">Vestibulum at eros</li></a>
            </ul>
            </div>
        </div>
    </div>
    <div class="row" id="majortasks">
        <div class="col-md-6" style="color:#333">
            <div style="background-color:#ACBD6C;border-radius:10px;margin:20px 10px 10px 0px;padding:5px">
                <h2 class="pane-title"  >Major Varieties  quick start</h2>
            </div>
        </div>
        <div class="col-md-6" style="color:#333">
            <div style="background-color:#ACBD6C;border-radius:10px;margin:20px 10px 10px 0px;padding:5px">
                    <h2 class="pane-title"  >Major Varieties  quick start</h2>
            </div>
        </div>
    </div>





</div>
    
@stop