@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">List of All Blogs</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <tr>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Username</th>
                                <th>Delete</th>
                            </tr>
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td>{{ $blog->title }}</td>
                                    <td>
                                        <img height=100 width=100 src="/images/{{ $blog->image }}" alt="">
                                    </td>
                                    <td>
                                        {{ $blog->category->name }}
                                    </td>
                                    <td>{{ $blog->user->email }}</td>
                                    <td>
                                        @if (auth()->user()->id == $blog->user_id)
                                            <form action="/blog/{{ $blog->id }}" method="post">
                                                @csrf

                                                <input type="submit" value="Delete" class="btn btn-danger">
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{ $blogs->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
