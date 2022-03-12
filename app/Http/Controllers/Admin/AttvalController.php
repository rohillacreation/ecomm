<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\Attribute_value;

class AttvalController extends Controller
{
    public function index(Request $req)
    {
        $id = $req->id;

        $data = Attribute_value::where('attributes_id', $id)
            ->get();

        $attribute = Attribute::where('id', $id)
            ->get();

        return view('admin.oprations.attributes.attribute_value', compact('data', 'attribute'));
    }
    public function add()
    {
        $data = Attribute::all();
        return view('admin.oprations.attributes.attribute_valueAdd', ['members' => $data]);
    }
    public function store(Request $request)
    {
        $errors = $request->validate([
            'name' => 'required',
            'attribute_id' => 'required',
        ]);

        $data = new Attribute_value;

        $data->name = $request->name;
        $data->attributes_id = $request->attribute_id;

        $done = $data->save();
        if ($done) {
            return redirect()->back()->with('message', 'Attribute value added succesfully');
        } else {
            return redirect()->back()->with('wrong', 'Attribute value added succesfully or Attribute Value not added');
        }
    }
    public function del(Request $request)
    {
        $id = $request->id;
        $done = Attribute_value::find($id)->delete();

        if ($done) {
            return redirect()->back()->with('message', 'Attribute value deleted succesfully');
        } else {
            return redirect()->back()->with('wrong', 'Attribute value deleted succesfully or Attribute Value not deleted');
        }
    }
    public function edit(Request $request)
    {
        $id = $request->id;
        $data = Attribute_value::find($id);

        return view('admin.oprations.attributes.attribute_valueUpdate', compact('data'));
    }
    public function update(Request $req)
    {
        $errors = $req->validate([
            'name' => 'required',
            'id' => 'required',
        ]);

        $data = Attribute_value::find($req->id);

        $data->name = $req->name;

        $done = $data->update();

        if ($done) {
            return redirect()->back()->with('message', 'Attribute value added succesfully');
        } else {
            return redirect()->back()->with('wrong', 'Attribute value added succesfully or Attribute Value not added');
        }
    }
}
