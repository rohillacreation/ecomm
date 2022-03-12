<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attribute;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AttributeController extends Controller
{
    public function index()
    {
        $data = attribute::with('attribute_value')
            ->paginate(5);

        return view('admin.oprations.attributes.attribute', ['members' => $data]);
    }

    public function store(Request $request)
    {
        $errors = $request->validate([
            'name' => 'required',
        ]);

        $data = new attribute;

        $data->name = $request->input('name');

        $done = $data->save();

        if ($done) {
            return redirect()->back()->with('message', 'A new attribute added successfully');
        } else {
            $errors = 'Something went wrong or File not uploaded';
            return redirect()->back()->with($errors);
        }
    }
    public function del(Request $request)
    {

        $id = $request->id;
        $del = attribute::find($id)->delete();

        if ($del) {

            return redirect()->back()->with('message', 'Attribute deleted successfully');
        } else {
            $errors = ['Sorry Something went worng'];
            return redirect()->back()->with($errors);
        }
    }

    public function edit(Request $request)
    {
        $id  = $request->id;
        $data = Attribute::find($id);
        return view('admin.oprations.attributes.attributeUpdate', ['data' => $data]);
    }
    public function update(Request $request)
    {
        $errors = $request->validate([
            'name' => 'required',
        ]);

        $data = Attribute::find($request->id);
        $data->name = $request->name;

        $com = $data->update();

        if ($com) {
            return redirect()->back()->with('message', 'Attribute updated succesfully');
        } else {
            return redirect()->back()->with('wrong', 'something went wrong or not updated');
        }
    }
}
