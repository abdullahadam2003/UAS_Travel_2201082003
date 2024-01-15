@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow">
        <div class="card-header">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">{{ __('Edit Destination') }}</h1>
                <a href="{{ route('admin.destinations.index') }}" class="btn btn-success btn-sm shadow-sm">{{ __('Go Back') }}</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.destinations.update', $destination->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="city">{{ __('City') }}</label>
                    <input type="text" class="form-control" id="city" placeholder="{{ __('Enter City') }}" name="city" value="{{ old('city', $destination->city) }}" />
                </div>
                <div class="form-group">
                    <label for="province">{{ __('Province') }}</label>
                    <input type="text" class="form-control" id="province" placeholder="{{ __('Enter Province') }}" name="province" value="{{ old('province', $destination->province) }}" />
                </div>
                <div class="form-group">
                    <label for="price">{{ __('Price') }}</label>
                    <input type="number" class="form-control" id="price" placeholder="{{ __('Enter Price') }}" name="price" value="{{ old('price', $destination->price) }}" />
                </div>
                <div class="form-group">
                    <label for="duration">{{ __('Duration') }}</label>
                    <input type="text" class="form-control" id="duration" placeholder="{{ __('Enter Duration') }}" name="duration" value="{{ old('duration', $destination->duration) }}" />
                </div>
                <div class="form-group">
                    <label for="number">{{ __('Number') }}</label>
                    <input type="number" class="form-control" id="number" placeholder="{{ __('Enter Number') }}" name="number" value="{{ old('number', $destination->number) }}" />
                </div>
                <div class="form-group">
                    <label for="image">{{ __('Image') }}</label>
                    <input type="file" class="form-control" id="image" name="image" />
                </div>
                <div class="form-group">
                    <label for="description">{{ __('Description') }}</label>
                    <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{ old('description', $destination->description) }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">{{ __('Save')}}</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('style-alt')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('script-alt')
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    // Add your custom scripts here if needed
</script>
@endpush
