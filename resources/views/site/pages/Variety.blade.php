@extends('site.app')
@section('title', 'Variety')
@section('content')
    <div class="container ">
        <!-- Div title is here title starts here -->
        <div class="container">
            <div class="row title">
                <div class="col-md-12 text-center py-2 my-3" style="background-color:#ACBD6C; border-radius:10px;">
                    <h1> {{$variety->name}}</h1>
                </div>
            </div>
        </div>
        
         <!-- Main container with variety information starts here -->
         <div class="container">
            <div class="row main-container mb-5" style="background-color:#f8f8f8;border-radius:10px;">
              <!-- Variety text information is here -->
                <div class="col-md-2">
                    <div>
                        <ul class="list-group text-success">
                            <a href="#"><li class="list-group-item my-2">Cras justo odio</li></a>
                            <a href="#"><li class="list-group-item my-2">Dapibus ac facilisis in</li></a>
                            <a href="#"><li class="list-group-item my-2">Porta ac consectetur ac</li></a>
                            <a href="#"><li class="list-group-item my-2">Vestibulum at eros</li></a>
                        </ul>
                    </div>
                </div>
                    <div class="attributes col-md-5">
                        <table class="table table-hover table-bordered " id="sampleTable">
                                <thead>
                                    <tr>
                                        <th>Attribute</th> <th>Attribute Value</th>
                                        <tbody>
                                    @forelse ($variety->attributes as $attribute)
                                    <tr>  
                                        <td><h5>{{$attribute->name}}</h5></td>
                                        @if(!$attribute->values->isEmpty())
                                        <td> <a href="{{ route('site.attributevalue.show', $attribute->values->first()->id) }}">{{ $attribute->values->first()->value}}</a></td>
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
                    <div class="col-md-5 variety-image justify-content-center" id="attributeimage">
                        <img class="img-responsive" src="{{ asset('storage/'.$variety->image) }}" alt="{{<?php echo $variety->name;?>}}" style="max-width:95%;max-height:95%;border-radius:12px;" >
                    </div>         
            </div>
         </div>          
    </div>
@stop