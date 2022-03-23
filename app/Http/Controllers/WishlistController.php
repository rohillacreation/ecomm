<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $array=[];
        
        if (Auth::check()) {
            $wishlist = new Wishlist();
            $user = Auth::user();
            $user_id = $user->id;
            $array = Wishlist::where('user_id', $user_id)->pluck('product_id');
        }
     
              return $array;
        

            return redirect()->back();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product_id)
    {

        if (Auth::check()) {
            $wishlist = new Wishlist();
            $user = Auth::user();
            $user_id = $user->id;
            $wishlist_delet = Wishlist::where('user_id', $user_id)->where('product_id', $product_id)->delete();
            if ($wishlist_delet == true) {
            } else {
                $wishlist->user_id = $user_id;
                $wishlist->product_id = $product_id;
                $wishlist->save();
            }

            return redirect()->back();
        } else
            return redirect('login')->with('wrong', 'Please login first');
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
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wishlist $wishlist)
    {
        //
    }
}
