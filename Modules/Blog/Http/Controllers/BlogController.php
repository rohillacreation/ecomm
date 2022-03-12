<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Blog;
use phpDocumentor\Reflection\Types\Null_;

class BlogController extends Controller
{

    public function index()
    {
        $data =  Blog::paginate(5);

        return view('blog::blog', ['members' => $data]);
    }


    public function create()
    {
        return view('blog::create-blog');
    }


    public function store(Request $request)
    {
        $errors = $request->validate([
            'blog_name' => 'required',
            'status' => 'required',
            'body' => 'required',
        ]);

        $data = new Blog;

        $data->blog_name = $request->blog_name;
        $data->body = $request->body;
        $data->status = $request->status;
        $data->date_created = date('Y-m-d');


        $done = $data->save();

        if ($done) {
            return redirect('admin/blog')->with('message', 'A new Blog added successfully');
        } else {
            return redirect()->back()->with('worng', 'Something went wrong or Blog data not sent');
        }
    }


    public function show($id)
    {
        return view('blog::show');
    }


    public function edit($id)
    {
        $value = Blog::find($id);
        return view('blog::update-blog', ['value' => $value]);
    }


    public function update(Request $request)
    {
        $errors = $request->validate([
            'blog_name' => 'required',
            'status' => 'required',
            'body' => 'required',
        ]);

        $data = Blog::find($request->id);

        $data->blog_name = $request->blog_name;
        $data->body = $request->body;
        $data->status = $request->status;
        $data->date_updated = date('Y-m-d');


        $com = $data->save();

        if ($com) {
            return redirect('/admin/blog')->with('message', 'Blog updated succesfully');
        } else {
            return redirect()->back()->with('wrong', 'something went wrong or Blog not updated');
        }
    }


    public function destroy($id)
    {
        $del = Blog::find($id)->delete();
        if ($del) {

            return redirect()->back()->with('message', 'Blog deleted successfully');
        } else {
            return redirect()->back()->with('wrong', 'Something went wrong or blog not deleted');
        }
    }
}
