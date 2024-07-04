@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-header">
                <span class="h3">All Businesss</span>
                <a href="{{ route('business.create') }}" class="btn btn-primary float-right">Create Business</a>
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
                @if ($businesses->count() > 0)
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Logo</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Website</th>
                                <th>Anchor</th>
                                <th>Facebook</th>
                                <th>Youtube</th>
                                <th>Instagram</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($businesses as $business)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('images/logo/' . $business->logo) }}"
                                            alt="{{ $business->business_name }}" style="max-width: 70px; max-height: 70px;">
                                    </td>
                                    <td>{{ $business->business_name }}</td>
                                    <td>{{ $business->contact }}</td>
                                    <td>{{ $business->email_id }}</td>
                                    <td>{{ $business->address }}</td>
                                    <td>{{ $business->website }}</td>
                                    <td>{{ $business->anchor }}</td>
                                    <td>{{ $business->facebook }}</td>
                                    <td>{{ $business->youtube }}</td>
                                    <td>{{ $business->instagram }}</td>
                                    <td>
                                        <div class="d-flex justify-content-start">
                                            <a href="{{ route('business.edit', $business->id) }}"
                                                class="btn btn-primary btn-sm mr-1">Edit</a>
                                            <form action="{{ route('business.delete', $business->id) }}" method="POST">
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
                    <span><b>No data found in business..!</b></span>
                @endif
            </div>
        </div>
    </div>

@endsection
