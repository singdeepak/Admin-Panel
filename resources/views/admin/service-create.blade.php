@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid p-0">
        <div class="card">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
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
                <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="choose_category">Choose Category</label><br>
                        <select class="form-control" name="choose_category">
                            <option disabled selected="true">Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('choose_category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="service_title">Service Title</label>
                        <input type="text" class="form-control"
                            id="service_title" placeholder="Enter service title" name="service_title" value={{ old('service_title') }}>
                    </div>
                    <div class="form-group">
                        <label for="service_short_description">Service Short Description</label>
                        <input type="text" class="form-control"
                            id="service short description" placeholder="Enter service short description"
                            name="service_short_desc">
                    </div>
                    <div class="form-group">
                        <label for="service_long_desc">Service Long Description</label>
                        <textarea class="form-control editor" id="service_long_desc"
                            placeholder="Enter service long description" name="service_long_desc" cols="30" rows="10">{{ old('service_long_desc') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="service-image">Service Image</label>
                        <input type="file" class="form-control-file"
                            id="service-image" name="service_image">
                    </div>

                    <div class="form-group">
                        <label for="priority">Priority</label>
                        <input type="number" class="form-control" id="priority" name="priority" placeholder="Enter priority">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
