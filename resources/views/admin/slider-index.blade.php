@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid p-0">
        <div class="card">
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
                <span class="h3">All Sliders</span>
                <a href="{{ route('slider.create') }}" class="btn btn-primary float-right">Create Slider</a>
            </div>
            <div class="card-body">
                @if ($sliders->count() > 0)
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Heading</th>
                                <th>Sub-heading</th>
                                <th>Link</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $slider)
                                <tr>
                                    <td>{{ $slider->id }}</td>
                                    <td>
                                        <img src="{{ asset('images/sliders/' . $slider->slider_image) }}"
                                            alt="{{ $slider->slider_heading }}" style="max-width: 70px; max-height: 70px;">
                                    </td>
                                    <td>{{ $slider->slider_heading }}</td>
                                    <td>{{ $slider->slider_sub_heading }}</td>
                                    <td>{{ $slider->slider_link }}</td>
                                    <td>
                                        <div class="d-flex justify-content-start">
                                            <a href="{{ route('slider.edit', $slider->id) }}"
                                                class="btn btn-primary btn-sm mr-1">Edit</a>
                                            <form action="{{ route('slider.delete', $slider->id) }}" method="POST">
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
                    <span><b>No data found in slider..!</b></span>
                @endif
            </div>
        </div>
    </div>

@endsection
