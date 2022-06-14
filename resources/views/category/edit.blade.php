@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit category</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="/category/{{ $category->id }}" method="post">
                            @csrf
                            @method('PUT')
                            <p>
                                <input placeholder="category name" class="form-control" type="text" name="name" required
                                    value="{{ $category->name }}">
                            </p>
                            <input type="submit" value="Edit" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
