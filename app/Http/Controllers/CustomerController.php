<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required|unique:users',
            'name'=>'required',
            'phone'=>'required',
            'password' => 'required |min:6',
            'conform_password' => 'required_with:password|same:password|min:6'
        ]);

        $request->session()->put('auth.password_confirmed_at', time());

        $user=DB::table('users');

        $data=[
            'name'=> $request->name ,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'phone'=> $request->phone
        ];

        $user->insert($data);
        return redirect()->back()->with('success', 'Customer successfully Added');   

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('users')->where('id' , $id)->get();
        return view('admin.oprations.costumers.edit_customer' ,compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $validated = $request->validate([
            'email' => 'required',
            'name'=>'required',
            'phone'=>'required',
            'password' => 'required |min:6',
            'conform_password' => 'required_with:password|same:password|min:6'
        ]);

        $request->session()->put('auth.password_confirmed_at', time());

        $user=User::where('id' , $id);

        $data=[
            'name'=> $request->name ,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'phone'=> $request->phone
        ];

        $user->update($data);
        return redirect()->back()->with('success', 'Customer successfully Edited');   

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=DB::table('users');
        $user->delete($id);
        return redirect()->back()->with('success', 'Customer Deleted');   

    }
}
