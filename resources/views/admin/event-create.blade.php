@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid p-0">
        <div class="card">
            @if (session('sucess'))
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
                <span class="h3">Create Events</span>
                <a href="{{ route('event.index') }}" class="btn btn-primary float-right">All Events</a>
            </div>
            <div class="card-body">
                <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="event_title">Event Title</label>
                        <input type="text" class="form-control" id="event_title" placeholder="Enter event title"
                            name="event_title">
                    </div>
                    <div class="form-group">
                        <label for="event_short_desc">Shor Description</label>
                        <input type="text" class="form-control" id="event_short_desc"
                            placeholder="Enter short description" name="event_short_desc">
                    </div>
                    <div class="form-group">
                        <label for="event_long_desc">Long Description</label>
                        <textarea id="event_long_desc" cols="30" rows="10" class="form-control editor" name="event_long_desc"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="event_date">Event Date</label>
                        <input type="date" class="form-control" id="event_date" name="event_date">
                    </div>
                    <div class="form-group">
                        <label for="added_by">Added By</label>
                        <input type="text" name="added_by" placeholder="Enter adding person" id="added_by" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="added_date">Added Date</label>
                        <input type="date" class="form-control" id="added_date" name="added_date">
                    </div>
                    <div class="form-group">
                        <label for="event_image">Event Image</label>
                        <input type="file" class="form-control-file" id="event_image" name="event_image">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
