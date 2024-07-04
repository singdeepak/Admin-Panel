@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid p-0">
        <div class="card">
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }} <!-- Corrected to session('error') -->
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-header">
                <span class="h3">Edit Slider</span>
                <a href="{{ route('slider.index') }}" class="btn btn-primary float-right">All Sliders</a>
            </div>
            <div class="card-body">
                <form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="slider-heading">Slider Heading</label>
                        <input type="text" class="form-control" id="slider-heading" placeholder="Enter slider heading"
                            name="slider-heading" value="{{ old('slider-heading', $slider->slider_heading) }}">
                        <!-- Use old('field_name', default_value) to repopulate with previous input or default value -->
                    </div>
                    <div class="form-group">
                        <label for="slider-sub-heading">Slider Sub-Heading</label>
                        <input type="text" class="form-control" id="slider-sub-heading"
                            placeholder="Enter slider sub-heading" name="slider-sub-heading"
                            value="{{ old('slider-sub-heading', $slider->slider_sub_heading) }}">
                    </div>
                    <div class="form-group">
                        <label for="slider-link">Slider Link</label>
                        <input type="text" class="form-control" id="slider-link" placeholder="Enter slider link"
                            name="slider-link" value="{{ old('slider-link', $slider->slider_link) }}">
                    </div>
                    <div class="form-group">
                        <label for="current-slider-image">Current Slider Image</label><br>
                        @if ($slider->slider_image)
                            <img src="{{ asset('images/sliders/' . $slider->slider_image) }}" alt="Current Slider Image"
                                style="max-width: 70px; max-height: 70px;"><br>
                            <span>{{ $slider->slider_image }}</span><br><br>
                        @else
                            <span>No image uploaded</span><br><br>
                        @endif
                        <label for="slider-image">Upload New Slider Image</label>
                        <input type="file" class="form-control-file" id="slider-image" name="slider-image">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
