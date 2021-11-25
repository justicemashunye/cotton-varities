@extends('site.app')
@section('title', 'Attribute Value')
@section('content')
    <div class="container">
        <div class="row main-container my-5 py-3 text-center" style=" border:5px solid #ccc;border-radius:10px;background-color:#f8f8f8;">
                    <!-- Variety text information is here -->
                        <div class="col-sm-12">
                            <div class="mb-5">
                                <h2><span  style="background-color:#ACBD6C;">Variety name: {{$attributevalue->variety->name}} </span></h2>
                            </div>
                            <div class="mb-5">
                                <h2><span style="background-color:#ACBD6C;">Attribute name: {{$attributevalue->attribute->name}} </span></h2>
                            </div>
                            <div class="mb-5 col-sm-10 justify-content-start">
                                <h2><span style="background-color:#ACBD6C;">Attribute value name: {{$attributevalue->value}} </span></h2> 
                            </div>
                            <div>
                                <img class="img-responsive" src="{{ asset('storage/'.$attributevalue->image) }}" alt="{{<?php echo $attributevalue->value;?>}}" style="border-radius:30px;max-width:95%;max-height:95%;">
                            </div>
                        </div>
                    <!-- Variety image is here -->    
                
        </div>
    </div>
        
    @stop