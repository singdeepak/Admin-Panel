@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid p-0">
        <div class="card">
            @if (session('success'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
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
                <span class="h3">Create Service</span>
                <a href="{{ route('service.index') }}" class="btn btn-primary float-right">All Services</a>
            </div>
            <div class="card-body">
                <form action="{{ route('service.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="choose_category">Choose Category</label>
                        <select name="choose_category" id="choose_category" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $service->service_category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="service_title">Service Title</label>
                        <input type="text" class="form-control" id="service_title" placeholder="Enter service title"
                            name="service_title" value="{{ $service->service_title }}">
                        <input type="hidden" name="id" value="{{ $service->id }}">
                    </div>
                    <div class="form-group">
                        <label for="service_short_description">Service Short Description</label>
                        <input type="text" class="form-control" id="service short description"
                            placeholder="Enter service short description" name="service_short_desc" value="{{ $service->service_short_desc }}">
                    </div>
                    <div class="form-group">
                        <label for="service_long_desc">Service Long Description</label>
                        <textarea class="form-control editor" id="service_long_desc" placeholder="Enter service long description" name="service_long_desc" id="" cols="30" rows="10">{{ $service->service_long_desc }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="current-slider-image">Current Service Image</label><br>
                        @if ($service->service_image)
                            <img src="{{ asset('images/services/' . $service->service_image) }}" alt="Current Service Image"
                                style="max-width: 70px; max-height: 70px;"><br>
                            <span>{{ $service->service_image }}</span><br><br>
                        @else
                            <span>No image uploaded</span><br><br>
                        @endif
                        <label for="service-image">Upload New Slider Image</label>
                        <input type="file" class="form-control-file" id="service-image" name="service-image">
                    </div>
                    <div class="form-group">
                        <label for="priority">Priority</label>
                        <input type="number" class="form-control" id="priority" name="priority" value="{{ $service->priority }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
