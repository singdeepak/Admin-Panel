@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-header">
                <span class="h3">All Services</span>
                <a href="{{ route('service.create') }}" class="btn btn-primary float-right">Create Service</a>
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

                @if ($services->count() > 0)
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Short Desc</th>
                                <th>Priority</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('images/services/' . $service->service_image) }}"
                                            alt="{{ $service->service_image }}" style="max-width: 70px; max-height: 70px;">
                                    </td>
                                    <td>{{ $service->category->category_name }}</td>
                                    <td>{{ $service->service_title }}</td>
                                    <td>{{ $service->service_short_desc }}</td>
                                    <td>{{ $service->priority }}</td>
                                    <td>
                                        <div class="d-flex justify-content-start">
                                            <a href="{{ route('service.edit', $service->id) }}"
                                                class="btn btn-primary btn-sm mr-1">Edit</a>
                                            <form action="{{ route('service.delete', $service->id) }}" method="POST">
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
                    <span><b>No data found in service..!</b></span>
                @endif
            </div>
        </div>
    </div>

@endsection
