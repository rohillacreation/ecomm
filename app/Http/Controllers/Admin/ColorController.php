<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Color;

class ColorController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->user()->role == 'seller' || Auth::guard('admin')->user()->role == 'Seller'){
            $seller_id = Auth::guard('admin')->user()->id;
            $data = color::where('seller_id' , $seller_id)->paginate(5);
        }
        else{
            $data = color::paginate(5);
        }
        return view('admin.oprations.colors.color', ['members' => $data]);
    }
    public function store(Request $request)
    {
        $errors = $request->validate([
            'name' => 'required',
        ]);

        $data = new color;
        if (Auth::guard('admin')->user()->role == 'seller' || Auth::guard('admin')->user()->role == 'Seller'){
            $seller_id = Auth::guard('admin')->user()->id;}
        else{
                $seller_id = 0;
        }
        $data->name = $request->input('name');
        $data->seller_id = $seller_id;
        $done = $data->save();

        if ($done) {
            return redirect()->back()->with('message', 'A new color added successfully');
        } else {
            return redirect()->back()->with('worng', 'Something went wrong or data not sent');
        }
    }
    public function del(Request $request)
    {

        $id = $request->id;

        $del = color::find($id)->delete();

        if ($del) {

            return redirect()->back()->with('message', 'color deleted successfully');
        } else {
            return redirect()->back()->with('wrong', 'Something went wrong or color not deleted');
        }
    }
    public function edit(Request $request)
    {
        $id  = $request->id;
        $data = color::find($id);
        return view('admin.oprations.colors.colorUpdate', ['data' => $data]);
    }
    public function update(Request $request)
    {
        $errors = $request->validate([
            'name' => 'required',
        ]);

        $data = color::find($request->id);
        $data->name = $request->name;

        $com = $data->save();

        if ($com) {
            return redirect()->back()->with('message', 'color updated succesfully');
        } else {
            return redirect()->back()->with('wrong', 'something went wrong or not updated');
        }
    }
}
