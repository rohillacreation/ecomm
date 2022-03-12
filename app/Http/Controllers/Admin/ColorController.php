<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    public function index()
    {
        $data = color::paginate(5);

        return view('admin.oprations.colors.color', ['members' => $data]);
    }
    public function store(Request $request)
    {
        $errors = $request->validate([
            'name' => 'required',
        ]);

        $data = new color;

        $data->name = $request->input('name');

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
