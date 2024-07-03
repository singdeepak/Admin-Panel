@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-header">
                <span class="h3">All Testimonials</span>
                <a href="{{ route('testimonial.create') }}" class="btn btn-primary float-right">Create Testimonial</a>
            </div>
            <div class="card-body">
                @if ($testimonials->count() > 0)
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Client Name</th>
                                <th>Text</th>
                                <th>Designation</th>
                                <th>Added Date</th>
                                <th>Priority</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testimonials as $testimonial)
                                <tr>
                                    <tr>{{ $testimonial->id }}</tr>
                                    <td>
                                        <img src="{{ asset('images/testimonials/' . $testimonial->client_image) }}"
                                            alt="{{ $testimonial->client_name }}" style="max-width: 70px; max-height: 70px;">
                                    </td>
                                    <td>{{ $testimonial->client_name }}</td>
                                    <td>{{ $testimonial->testimonial_text }}</td>
                                    <td>{{ $testimonial->client_designation }}</td>
                                    <td>{{ $testimonial->added_date }}</td>
                                    <td>{{ $testimonial->priority }}</td>
                                    <td>
                                        <div class="d-flex justify-content-start">
                                            <a href="{{ route('testimonial.edit', $testimonial->id) }}"
                                                class="btn btn-primary btn-sm mr-1">Edit</a>
                                            <form action="{{ route('testimonial.delete', $testimonial->id) }}" method="POST">
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
                    <span><b>No data found in testimonial..!</b></span>
                @endif
            </div>
        </div>
    </div>

@endsection
