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
        $option = $option."<option value ='$value->name'> </option>";
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

    if($request->type != 'None' && $request->brand== null && $request->color=='None'){
    $data['product'] = Product::with('category', 'brand')
            ->join('image_tables', 'products.id', '=', 'image_tables.use_id')
            ->where('status', 'published')
            ->join('galleries', 'image_tables.image_id', '=', 'galleries.id')
            ->where('use_type', 'Main_product_image')
            ->select('products.*', 'galleries.location')->where('products.cat_id' ,$request->type)->get();
        }
    if($request->type != 'None' && $request->brand != null && $request->color=='None'){
        // get brand_id
            $brand = Brand::all()->pluck('id','name');
            $data['product'] = Product::with('category', 'brand')
            ->join('image_tables', 'products.id', '=', 'image_tables.use_id')
            ->where('status', 'published')
            ->join('galleries', 'image_tables.image_id', '=', 'galleries.id')
            ->where('use_type', 'Main_product_image')
            ->select('products.*', 'galleries.location')->where('products.cat_id' ,$request->type)
            ->where('products.brand_id' ,$brand[$request->brand])
            ->get();
    }
    if($request->type != 'None' && isset($request->brand) && $request->brand != null && $request->color !='None'){
            $data['product'] = Product::with('category', 'brand')
            ->join('image_tables', 'products.id', '=', 'image_tables.use_id')
            ->where('status', 'published')
            ->join('galleries', 'image_tables.image_id', '=', 'galleries.id')
            ->where('use_type', 'Main_product_image')
            ->select('products.*', 'galleries.location')->where('products.cat_id' ,$request->type)
            ->where('products.brand_id' , $request->brand)->join('variations' , 'products.id' , '=' , 'variations.product_id')
            ->where('variations.color' , $request->color)
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
    public function all_filter_ajax(Request $request)
    {
            $products['product'] = Product::with('category', 'brand')
            ->join('image_tables', 'products.id', '=', 'image_tables.use_id')
            ->where('status', 'published')
            ->join('galleries', 'image_tables.image_id', '=', 'galleries.id')
            ->where('use_type', 'Main_product_image')
            ->select('products.*', 'galleries.location')->whereIn('products.cat_id',$request->cat)->whereIn('products.brand_id',$request->brand)->get();
      

           $result='';
           $base_path = 'uploads/gallery/';
		foreach($products['product'] as $product){
			$result = $result.'<div class="col-sm-6 col-lg-3">
                        <div class="product-item">
                        <ul class="product-icon-top">
                                <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                            </ul>
                            <a href="'.$base_path.$product->location.'" class="product-img"><img class="lazy" src="'.$base_path.$product->location.'" alt="product"></a>
                            <div class="product-item-cover">
                                <div class="price-cover">
                                    <div class="new-price"><i class="fa fa-inr" aria-hidden="true"> </i>'.$product->price.'</div>
                                    <!-- <div class="old-price">$1.799</div> -->
                                </div>
                                <h6 class="prod-title"><a href="asset($product->id)}}">'.$product->name.'</a></h6>
                                            <a href="'."shopNow/".$product->id.'class="btn"><span>buy now</span></a>
                            </div>
                        
                        </div>
                    </div>';
        }

return $result;
		
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
