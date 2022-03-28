<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;

class BrandController extends Controller
{
    public function index()
    {

        if (Auth::guard('admin')->user()->role == 'seller' || Auth::guard('admin')->user()->role == 'Seller'){
        $seller_id = Auth::guard('admin')->user()->id;
        $data = brand::where('seller_id' ,   $seller_id)->paginate(10);

    }
    else{
        $data = brand::paginate(10);

    }
        return view('admin.oprations.brands.brand', ['members' => $data]);
    }

    public function store(Request $request)
    {
        $errors = $request->validate([
            'name' => 'required',
        ]);

        if (Auth::guard('admin')->user()->role == 'seller' || Auth::guard('admin')->user()->role == 'Seller'){
            $seller_id = Auth::guard('admin')->user()->id;
        }
        else {
            $seller_id = 0;
        }
       
        $data = new brand;

        $data->name = $request->input('name');
        $data->seller_id = $seller_id;


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
