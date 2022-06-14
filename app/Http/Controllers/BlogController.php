<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // $blogs = Blog::all();
        $blogs = Blog::paginate(2);
        return view('blog/index', compact('blogs'));
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->user_id = auth()->user()->id;
        $blog->category_id = $request->category_id;
        $blog->image = $imageName;
        $blog->save();
        return redirect('/blog')->with('status', 'Blog saved');
    }

    public function delete($id)
    {
        $blog = Blog::find($id);

        if (auth()->user()->id == $blog->user_id) {
            $blog->delete();
            return redirect('/blog')->with('status', 'Blog deleted');

        } else {
            abort(403);
        }
    }
}
