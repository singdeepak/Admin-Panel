@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-header">
                <span class="h3">All news</span>
                <a href="{{ route('news.create') }}" class="btn btn-primary float-right">Create News</a>
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
                @if ($news->count() > 0)
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Priority</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($news as $news)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('images/news/' . $news->news_image) }}"
                                            alt="{{ $news->news_title }}" style="max-width: 70px; max-height: 70px;">
                                    </td>
                                    <td>{{ $news->news_title }}</td>
                                    <td>{{ $news->news_short_desc }}</td>
                                    <td>{{ $news->priority }}</td>
                                    <td>
                                        <div class="d-flex justify-content-start">
                                            <a href="{{ route('news.edit', $news->id) }}"
                                                class="btn btn-primary btn-sm mr-1">Edit</a>
                                            <form action="{{ route('news.delete', $news->id) }}" method="POST">
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
                    <span><b>No data found in news..!</b></span>
                @endif
            </div>
        </div>
    </div>

@endsection
