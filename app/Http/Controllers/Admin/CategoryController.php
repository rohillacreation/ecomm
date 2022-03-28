<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{

    public function index()
    {

        if (Auth::guard('admin')->user()->role == 'seller' || Auth::guard('admin')->user()->role == 'Seller') {
            $seller_id = Auth::guard('admin')->user()->id;
            $data = Category::where('seller_id' , $seller_id)->paginate(5);
        } else {
            $data = Category::paginate(5);
        }
        return view('admin.oprations.categories.category', ['members' => $data]);
    }
    public function create()
    {
        return view('admin.oprations.categories.newCategory');
    }

    public function store(Request $request)
    {
        $errors = $request->validate([
            'name' => 'required',
            'main_id' => 'numeric',
            'status' => 'required',
        ]);

        if (Auth::guard('admin')->user()->role == 'seller' || Auth::guard('admin')->user()->role == 'Seller') 
            $seller_id = Auth::guard('admin')->user()->id;
            else  $seller_id ='0';
        $data = new category;

        $data->name = $request->input('name');
        $data->main_id = $request->input('main_id');
        $data->status = $request->input('status');
        $data->seller_id = $seller_id;


        $done = $data->save();

        if ($done) {
            return redirect()->back()->with('message', 'A new category added successfully');
        } else {
            return redirect()->back()->with('worng', 'Something went wrong or data not sent');
        }
    }
    public function del(Request $request)
    {

        $id = $request->id;
        $del = category::find($id)->delete();
        if ($del) {

            return redirect()->back()->with('message', 'Category deleted successfully');
        } else {
            return redirect()->back()->with('wrong', 'Something went wrong');
        }
    }
    public function edit(Request $request)
    {
        $id  = $request->id;
        $data = Category::find($id);
        return view('admin.oprations.categories.categoryUpdate', ['data' => $data]);
    }

    public function update(Request $request)
    {
        $errors = $request->validate([
            'name' => 'required',
            'main_id' => 'required|min:6|numeric',
            'status' => 'required',
        ]);
        $data = category::find($request->id);
        $data->name = $request->name;
        $data->main_id = $request->main_id;
        $data->status = $request->status;


        $com = $data->save();

        if ($com) {
            return redirect('/admin/category')->with('message', 'Category updated succesfully');
        } else {
            return redirect()->back()->with('wrong', 'something went wrong');
        }
    }
}
