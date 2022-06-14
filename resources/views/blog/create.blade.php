@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create new blog</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form enctype="multipart/form-data" action="/blog" method="post">
                            @csrf
                            <p>
                                <input placeholder="BLOG TITLE" class="form-control" type="text" name="title" required
                                    id="">
                            </p>
                            <p>
                                <textarea placeholder="BLOG description" class="form-control" name="description" required id=""></textarea>
                            </p>
                            <p>
                                Image : <input type="file" name="image" id="">
                            </p>
                            <p>
                                Category :
                                <select name="category_id" id="">
                                    @foreach (App\Models\Category::all() as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </p>
                            <input type="submit" value="Add" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
