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
                <span class="h3">Create Testimonial</span>
                <a href="{{ route('testimonial.index') }}" class="btn btn-primary float-right">All Testimonials</a>
            </div>
            <div class="card-body">
                <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="client_name">Client Name</label>
                        <input type="text" class="form-control" id="client_name" placeholder="Enter client name"
                            name="client_name">
                    </div>
                    <div class="form-group">
                        <label for="testimonial_text">Testimonial Text</label>
                        <input type="text" class="form-control" id="testimonial_text"
                            placeholder="Enter testimonial text" name="testimonial_text">
                    </div>
                    <div class="form-group">
                        <label for="client_designation">Client Designation</label>
                        <input type="text" class="form-control" id="client_designation" placeholder="Enter client designation" name="client_designation">
                    </div>
                    <div class="form-group">
                        <label for="added_date">Added Date</label>
                        <input type="date" class="form-control" id="added_date" name="added_date" placeholder="Enter added date">
                    </div>
                    <div class="form-group">
                        <label for="priority">Priority</label>
                        <input type="number" class="form-control" id="priority" name="priority" placeholder="Enter priority">
                    </div>
                    <div class="form-group">
                        <label for="client_image">Client Image</label>
                        <input type="file" class="form-control-file" id="client_image" name="client_image">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
