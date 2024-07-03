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
                <span class="h3">Edit Testimonial</span>
                <a href="{{ route('testimonial.index') }}" class="btn btn-primary float-right">All Testimonials</a>
            </div>
            <div class="card-body">
                <form action="{{ route('testimonial.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="client_name">Client Name</label>
                        <input type="text" class="form-control" id="client_name" placeholder="Enter client name"
                        name="client_name" value="{{ $testimonial->client_name }}">
                    </div>
                    <div class="form-group">
                        <label for="testimonial_text">Testimonial Text</label>
                        <input type="text" class="form-control" id="testimonial_text"
                            placeholder="Enter testimonial text" name="testimonial_text"  value="{{ $testimonial->testimonial_text }}">
                    </div>
                    <div class="form-group">
                        <label for="client_designation">Client Designation</label>
                        <input type="text" class="form-control" id="client_designation" placeholder="Enter client designation" name="client_designation" value="{{ $testimonial->client_designation }}">
                    </div>
                    <div class="form-group">
                        <label for="added_date">Added Date</label>
                        <input type="date" class="form-control" id="added_date" name="added_date" placeholder="Enter added date" value="{{ $testimonial->added_date }}">
                    </div>
                    <div class="form-group">
                        <label for="priority">Priority</label>
                        <input type="number" class="form-control" id="priority" name="priority" placeholder="Enter priority" value="{{ $testimonial->priority }}">
                    </div>
                    <div class="form-group">
                        <label for="current-Testimonial-image">Current Testimonial Image</label><br>
                        @if ($testimonial->client_image)
                            <img src="{{ asset('images/testimonials/' . $testimonial->client_image) }}" alt="Current Testimonial Image" style="max-width: 70px; max-height: 70px;"><br>
                            <span>{{ $testimonial->client_image }}</span><br><br>
                        @else
                            <span>No image uploaded</span><br><br>
                        @endif
                        <label for="client_image">Upload New Testimonial Image</label>
                        <input type="file" class="form-control-file" id="client_image" name="client_image">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
