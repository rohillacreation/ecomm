<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function index()
    {
        $data = Admin::paginate(12);

        return view('admin.oprations.staff', ['members' => $data]);
    }

    public function create(Request $request)
    {
        $errors = $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:admins,email',
            'phone' => 'required|min:11|numeric',
            'password' => 'required|min:8',
            'role' => 'required',
        ]);

        $data = new admin;

        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $password = $request->input('password');
        $data->password = Hash::make($password);
        $data->role = $request->input('role');

        $done = $data->save();

        if ($done) {
            return redirect()->back()->with('message', 'Staff added successfully');
        } else {
            return redirect()->back()->with('worng', 'Something went wrong or File not uploaded');
        }
    }
    public function del(Request $request)
    {

        $id = $request->id;
        $del = admin::find($id)->delete();
        if ($del) {

            return redirect()->back()->with('message', 'Staff entry Deleted successfully');
        } else {
            return redirect()->back()->with('wrong', 'Sorry Something went worng');
        }
    }

    public function edit(Request $request)
    {
        $id  = $request->id;
        $data = Admin::find($id);
        return view('admin.oprations.staffUpdate', ['data' => $data]);
    }


    public function update(Request $request)
    {
        $errors = $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:admins,email',
            'phone' => 'required|min:11|numeric',
            'password' => 'required|min:8',
            'role' => 'required',
        ]);
        $data = admin::find($request->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $password = $request->password;
        $data->password = Hash::make($password);
        $data->role = $request->role;

        $com = $data->save();

        if ($com) {
            return redirect('/admin/staff')->with('message', 'Staff details updated succesfully');
        } else {
            return redirect('/admin/staff')->with('wrong', 'something went wrong');
        }
    }
}
