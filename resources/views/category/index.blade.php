@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">List of categories</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>
                                        <a href="/category/{{ $category->id }}/blog">
                                            {{ $category->name }}
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="/category/{{ $category->id }}">
                                            Edit
                                        </a>
                                    </td>
                                    <td>
                                        <form action="/category/{{ $category->id }}" method="post">
                                            @csrf
                                            <input type="submit" value="Delete" class="btn btn-danger">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
