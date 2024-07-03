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
                <span class="h3">Update Business</span>
                <a href="{{ route('business.index') }}" class="btn btn-primary float-right">All Business</a>
            </div>
            <div class="card-body">
                <form action="{{ route('business.update', $business->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="business_name">Business Name</label>
                        <input type="text" class="form-control" id="business_name" placeholder="Enter business name"
                            name="business_name" value="{{ $business->business_name }}">
                    </div>
                    <div class="form-group">
                        <label for="about_info">About Info</label>
                        <textarea class="form-control editor" id="about_info" placeholder="Enter information about the business" name="about_info">{{ $business->about_info }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact</label>
                        <input type="text" class="form-control" id="contact" placeholder="Enter contact information"
                        name="contact" value="{{ $business->contact }}">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="Enter address"
                            name="address" value="{{ $business->address }}">
                    </div>
                    <div class="form-group">
                        <label for="email_id">Email ID</label>
                        <input type="email" class="form-control" id="email_id" placeholder="Enter email address"
                            name="email_id" value="{{ $business->email_id }}">
                    </div>
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input type="url" class="form-control" id="website" placeholder="Enter website URL"
                            name="website" value="{{ $business->website }}">
                    </div>
                    <div class="form-group">
                        <label for="anchor">Anchor</label>
                        <input type="text" class="form-control" id="anchor" placeholder="Enter anchor text"
                            name="anchor" value="{{ $business->anchor }}">
                    </div>
                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input type="url" class="form-control" id="facebook" placeholder="Enter Facebook URL"
                            name="facebook" value="{{ $business->facebook }}">
                    </div>
                    <div class="form-group">
                        <label for="youtube">YouTube</label>
                        <input type="url" class="form-control" id="youtube" placeholder="Enter YouTube URL"
                            name="youtube" value="{{ $business->youtube }}">
                    </div>
                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input type="url" class="form-control" id="instagram" placeholder="Enter Instagram URL"
                            name="instagram" value="{{ $business->instagram }}">
                    </div>
                    <div class="form-group">
                        <label for="logo">Logo</label><br>
                        @if ($business->logo)
                            <img src="{{ asset('images/logo/' . $business->logo) }}" alt="logo"
                                style="max-width: 70px; max-height: 70px;"><br>
                            <span>{{ $business->logo }}</span><br><br>
                        @else
                            <span>No image uploaded</span><br><br>
                        @endif
                        <label for="logo">Logo</label>
                        <input type="file" class="form-control-file" id="logo" name="logo">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection
