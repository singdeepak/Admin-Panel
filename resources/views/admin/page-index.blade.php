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
                <span class="h3">Pages</span>
                <a href="{{ route('page.create') }}" class="btn btn-primary float-right">Create Page</a>
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
                @if ($pages->count() > 0)
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Text</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pages as $page)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('images/pages/' . $page->banner_image) }}"
                                            alt="{{ $page->page_title }}" style="max-width: 70px; max-height: 70px;">
                                    </td>
                                    <td>{{ $page->page_title }}</td>
                                    <td>{{ $page->page_desc }}</td>
                                    <td>{{ $page->banner_image }}</td>
                                    <td>
                                        <div class="d-flex justify-content-start">
                                            <a href="{{ route('page.edit', $page->id) }}"
                                                class="btn btn-primary btn-sm mr-1">Edit</a>
                                            <form action="{{ route('page.delete', $page->id) }}" method="POST">
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
                    <span><b>No data found in page..!</b></span>
                @endif
            </div>
        </div>
    </div>
@endsection
