<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;

class BrandController extends Controller
{
    public function index()
    {
        $data = brand::paginate(10);
        // $categories = Category::all()->pluck('name','id');
        return view('admin.oprations.brands.brand', ['members' => $data]);
    }

    public function store(Request $request)
    {
        $errors = $request->validate([
            'name' => 'required',
        ]);

       
        $data = new brand;

        $data->name = $request->input('name');

        $done = $data->save();

        if ($done) {
            return redirect()->back()->with('message', 'A new Brand added successfully');
        } else {
            return redirect()->back()->with('worng', 'Something went wrong or data not sent');
        }
    }
    public function del(Request $request)
    {

        $id = $request->id;
        $del = brand::find($id)->delete();
        if ($del) {

            return redirect()->back()->with('message', 'Brand deleted successfully');
        } else {
            return redirect()->back()->with('wrong', 'Something went wrong or brand not deleted');
        }
    }
    public function edit(Request $request)
    {
        $id  = $request->id;
        $data = brand::find($id);
        return view('admin.oprations.brands.brandUpdate', ['data' => $data]);
    }
    public function update(Request $request)
    {
        $errors = $request->validate([
            'name' => 'required',
        ]);
        $data = brand::find($request->id);
        $data->name = $request->name;

        $com = $data->save();

        if ($com) {
            return redirect('/admin/brand')->with('message', 'brand updated succesfully');
        } else {
            return redirect()->back()->with('wrong', 'something went wrong or not brand updated');
        }
    }
}
