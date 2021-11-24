@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{ $subTitle }}</h3>
                <form action="{{ route('admin.attributes.update') }}" method="POST" role="form">
                    @csrf
                    <div class="tile-body">
                    <div class="form-group">
                        <label class="control-label" for="name">Name</label>
                            <input
                                        class="form-control @error('name') is-invalid @enderror"
                                        type="text"
                                        placeholder="Enter attribute name"
                                        id="name"
                                        name="name"
                                        value="{{ old('name', $attribute->name) }}"
                                    />
                                    <input type="hidden" name="attribute_id" value="{{ $attribute->id }}">
                                    <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('name') <span>{{ $message }}</span> @enderror
                                    </div>
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
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Attribute</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.attributes.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection