@extends('site.app')
@section('title', '$variety->name')
@section('content')
    <div class="container ">
        <!-- Div title is here title starts here -->
        <div class="row title">
            <div class="col-md-12 text-center py-2 my-3">
                <h1 class="text-primary"> {{$variety->name}}</h1>
            </div>
        </div>
         <!-- Main container with variety information starts here -->
        <div class="row main-container mb-5">
              <!-- Variety text information is here -->
            <div class="col-md-8 variety-infor d-flex">
                <div style="flex-grow: 1;margin-right:10px;">
                    <ul class="list-group text-success">
                        <a href="#"><li class="list-group-item my-2">Cras justo odio</li></a>
                        <a href="#"><li class="list-group-item my-2">Dapibus ac facilisis in</li></a>
                        <a href="#"><li class="list-group-item my-2">Porta ac consectetur ac</li></a>
                        <a href="#"><li class="list-group-item my-2">Vestibulum at eros</li></a>
                    </ul>
                </div>
                <!-- Use flex box here  -->
                    <div style="flex-grow: 6; border:1px solid;border-radius:10px;margin-right:5px;">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>Attribute</th> <th>Attribute Value</th>
                                    <tbody>
                                @forelse ($variety->attributes as $attribute)
                                <tr>  
                                    <td><h5>{{$attribute->name}}</h5></td>
                                    @if(!$attribute->values->isEmpty())
                                    <td>{{ $attribute->values->first()->value}}</td>
                                    @else
                                    <td>No attribute values found</td>
                                    @endif
                                @empty
                                <div>
                                    <p>Variety has no attributes yet</p>
                                </div>
                            @endforelse
                                </tr>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                
            </div>
            <!-- Variety image is here -->    
            <div class="col-md-4 variety-image pr-2" >
                <img class="img-responsive rounded" src="{{ asset('storage/'.$variety->image) }}" alt="{{<?php echo $variety->name;?>}}" style="margin-right:5px;" >
            </div>
        </div>           
    </div>
@stop