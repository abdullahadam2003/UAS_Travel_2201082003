@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow">
        <div class="card-header">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">{{ __('Create testimonial') }}</h1>
                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-success btn-sm shadow-sm">{{ __('Go Back') }}</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">{{ __('Title') }}</label>
                    <input type="text" class="form-control" id="title" placeholder="{{ __('Title') }}" name="title" value="{{ old('title') }}" />
                </div>
                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <input type="text" class="form-control" id="name" placeholder="{{ __('Name') }}" name="name" value="{{ old('name') }}" />
                </div>
                <div class="form-group">
                    <label for="photo">{{ __('Photo') }}</label>
                    <input type="file" class="form-control" id="photo" name="photo" accept="image/*" />
                </div>

                <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
