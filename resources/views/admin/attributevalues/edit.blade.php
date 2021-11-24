@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-briefcase"></i> {{ $pageTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{ $subTitle }}</h3>
                <form action="{{ route('admin.attributevalues.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="value">Value <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('value') is-invalid @enderror" type="text" name="value" id="value" value="{{ old('value', $attributevalue->value) }}"/>
                            <input type="hidden" name="id" value="{{ $attributevalue->id }}">
                            @error('name') {{ $message }} @enderror
                        </div>

                        <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="variety_id">Variety</label>
                                            <select name="variety_id" id="variety_id" class="form-control @error('variety_id') is-invalid @enderror">
                                                <option value="0">Select a variety</option>
                                                @foreach($varieties as $variety)
                                                    <option value="{{ $variety->id }}">{{ $variety->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('variety_id') <span>{{ $message }}</span> @enderror
                                            </div>
                            </div>
                    </div>
                    
                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="attribute">Attribute</label>
                                            <select name="attribute_id" id="attribute_id" class="form-control @error('attribute_id') is-invalid @enderror">
                                                <option value="0">Select a Attribute</option>
                                                @foreach($attributes as $attribute)
                                                    <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('attribute_id') <span>{{ $message }}</span> @enderror
                                            </div>
                            </div>
                    </div>
                        <div class="form-group">
                            <div class="row">
                                    @if ($attributevalue->image != null)
                                    <div class="col-md-2">
                                        <figure class="mt-2" style="width: 80px; height: auto;">
                                                <img src="{{ asset('storage/'.$attributevalue->image) }}" id="attributevalueImage" class="img-fluid" alt="img">
                                        </figure>
                                    </div>
                                @endif
                                <div class="col-md-10">
                                    <label class="control-label">Attributevalue Image</label>
                                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                                    @error('image') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Attributevalue</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.attributevalues.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection