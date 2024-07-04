@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-header">
                <span class="h3">All Events</span>
                <a href="{{ route('event.create') }}" class="btn btn-primary float-right">Create Event</a>
            </div>
            <div class="card-body">
                @if (session('message'))
                    <div id="session-alert" class="alert alert-{{ session('message.type') }}">
                        {{ session('message.content') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if ($events->count() > 0)
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Short Description</th>
                                <th>Event Date</th>
                                <th>Added By</th>
                                <th>Added Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('images/events/' . $event->event_image) }}"
                                            alt="{{ $event->event_title }}" style="max-width: 70px; max-height: 70px;">
                                    </td>
                                    <td>{{ $event->event_title }}</td>
                                    <td>{{ $event->event_short_desc }}</td>
                                    <td>{{ $event->event_date }}</td>
                                    <td>{{ $event->added_by }}</td>
                                    <td>{{ $event->added_date }}</td>
                                    <td>
                                        <div class="d-flex justify-content-start">
                                            <a href="{{ route('event.edit', $event->id) }}"
                                                class="btn btn-primary btn-sm mr-1">Edit</a>
                                            <form action="{{ route('event.delete', $event->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <span><b>No data found in event..!</b></span>
                @endif
            </div>
        </div>
    </div>

@endsection
