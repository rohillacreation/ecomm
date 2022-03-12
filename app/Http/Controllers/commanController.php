<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Color;

class commanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function brand_ajax(Request $request)
    {

        $data = Brand::all();
        $option='<option value ="None">All</option>';
        foreach($data as $value){
        $option = $option."<option value ='$value->id'> $value->name</option>";
        }
        return $option;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function color_ajax(Request $request)
    {
        $data = Color::all();
        $option='<option selected="selected" value="None">All</option>';
        foreach($data as $value){
        $option = $option."<option value ='$value->id'> $value->name</option> ";
        }
        return $option;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function home_search(Request $request)
    {

     //   dd($request);
    if($request->type != 'None' && $request->brand== 'None' && $request->color=='None'){
    $data['product'] = Product::with('category', 'brand')
            ->join('image_tables', 'products.id', '=', 'image_tables.use_id')
            ->where('status', 'published')
            ->join('galleries', 'image_tables.image_id', '=', 'galleries.id')
            ->where('use_type', 'Main_product_image')
            ->select('products.*', 'galleries.location')->where('products.cat_id' ,$request->type)->get();
        }
    if($request->type != 'None' && $request->brand != 'None' && $request->color=='None'){
            $data['product'] = Product::with('category', 'brand')
            ->join('image_tables', 'products.id', '=', 'image_tables.use_id')
            ->where('status', 'published')
            ->join('galleries', 'image_tables.image_id', '=', 'galleries.id')
            ->where('use_type', 'Main_product_image')
            ->select('products.*', 'galleries.location')->where('products.cat_id' ,$request->type)->get();
    }
    if($request->type != 'None' && isset($request->brand) && $request->brand != 'None' && $request->color !='None'){
            $data['product'] = Product::with('category', 'brand')
            ->join('image_tables', 'products.id', '=', 'image_tables.use_id')
            ->where('status', 'published')
            ->join('galleries', 'image_tables.image_id', '=', 'galleries.id')
            ->where('use_type', 'Main_product_image')
            ->select('products.*', 'galleries.location')->where('products.cat_id' ,$request->type)
            ->where('products.brand_id' , $request->brand)->whereRaw("find_in_set('products.color_id', $request->color)")
            ->get();
    }
    if(isset($request->cat_id)){
        $data['product'] = Product::with('category', 'brand')
        ->join('image_tables', 'products.id', '=', 'image_tables.use_id')
        ->where('status', 'published')
        ->join('galleries', 'image_tables.image_id', '=', 'galleries.id')
        ->where('use_type', 'Main_product_image')
        ->select('products.*', 'galleries.location')->where('products.cat_id' ,$request->cat_id)
        ->get();
    }

    return view('website.shop' ,compact('data'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
