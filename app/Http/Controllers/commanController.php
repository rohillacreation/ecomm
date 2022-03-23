<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use App\Models\Variations;
use Modules\Order\Entities\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;



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
        $option = '<option value ="None">All</option>';
        foreach ($data as $value) {
            $option = $option . "<option value ='$value->name'> </option>";
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
        $option = '<option selected="selected" value="None">All</option>';
        foreach ($data as $value) {
            $option = $option . "<option value ='$value->id'> $value->name</option> ";
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

        $data['cetegory'] = Category::all()->where('status', 'publish');
        $data['brand'] = Brand::all();
        $data['colors'] = Color::all();
        if ($request->type != 'None' && $request->brand == null && $request->color == 'None') {
            $data['product'] = Product::with('category', 'brand')
                ->join('image_tables', 'products.id', '=', 'image_tables.use_id')
                ->where('status', 'published')
                ->join('galleries', 'image_tables.image_id', '=', 'galleries.id')
                ->where('use_type', 'Main_product_image')
                ->select('products.*', 'galleries.location')->where('products.cat_id', $request->type)->paginate(8);
        }
        if ($request->type != 'None' && $request->brand != null && $request->color == 'None') {
            // get brand_id
            $brand = Brand::all()->pluck('id', 'name');
            $data['product'] = Product::with('category', 'brand')
                ->join('image_tables', 'products.id', '=', 'image_tables.use_id')
                ->where('status', 'published')
                ->join('galleries', 'image_tables.image_id', '=', 'galleries.id')
                ->where('use_type', 'Main_product_image')
                ->select('products.*', 'galleries.location')->where('products.cat_id', $request->type)
                ->where('products.brand_id', $brand[$request->brand])
                ->paginate(8);
              
        }
        if ($request->type != 'None' && isset($request->brand) && $request->brand != null && $request->color != 'None') {
            $brand = Brand::all()->pluck('id', 'name');
            $data['product'] = Product::with('category', 'brand')
                ->join('image_tables', 'products.id', '=', 'image_tables.use_id')
                ->where('status', 'published')
                ->join('galleries', 'image_tables.image_id', '=', 'galleries.id')
                ->where('use_type', 'Main_product_image')
                ->select('products.*', 'galleries.location')->where('products.cat_id', $request->type)
                ->where('products.brand_id', $brand[$request->brand])->join('variations', 'products.id', '=', 'variations.product_id')
                ->where('variations.color', $request->color)
                ->paginate(8);
        }
        if (isset($request->cat_id)) {
            $data['product'] = Product::with('category', 'brand')
                ->join('image_tables', 'products.id', '=', 'image_tables.use_id')
                ->where('status', 'published')
                ->join('galleries', 'image_tables.image_id', '=', 'galleries.id')
                ->where('use_type', 'Main_product_image')
                ->select('products.*', 'galleries.location')->where('products.cat_id', $request->cat_id)
                ->paginate(8);
        }
        return view('website.shop', compact('data'));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function all_filter_ajax(Request $request)
    {

        
        $limit_per_page = 5;

        $page = "";
        if(isset($request->page_no)){
          $page = $request->page_no;
        }else{
          $page = 1;
        }
      
        $offset = ($page - 1) * $limit_per_page;

        if (isset($request->cat) && isset($request->brand)) {
            $products['product'] = Product::with('category', 'brand')
                ->join('image_tables', 'products.id', '=', 'image_tables.use_id')
                ->where('status', 'published')
                ->join('galleries', 'image_tables.image_id', '=', 'galleries.id')
                ->where('use_type', 'Main_product_image')
                ->select('products.*', 'galleries.location')->whereIn('products.cat_id', $request->cat)->whereIn('products.brand_id', $request->brand) ;
        }
        if (isset($request->cat) && !isset($request->brand)) {
            $products['product'] = Product::with('category', 'brand')
                ->join('image_tables', 'products.id', '=', 'image_tables.use_id')
                ->where('status', 'published')
                ->join('galleries', 'image_tables.image_id', '=', 'galleries.id')
                ->where('use_type', 'Main_product_image')
                ->select('products.*', 'galleries.location')->whereIn('products.cat_id', $request->cat) ;
        }

        if (!isset($request->cat) && isset($request->brand)) {

            $products['product'] = Product::with('category', 'brand')
                ->join('image_tables', 'products.id', '=', 'image_tables.use_id')
                ->where('status', 'published')
                ->join('galleries', 'image_tables.image_id', '=', 'galleries.id')
                ->where('use_type', 'Main_product_image')
                ->select('products.*', 'galleries.location')->whereIn('products.brand_id', $request->brand) ;
        } 
        if (!isset($request->cat) && !isset($request->brand)) {
            $products['product'] = Product::with('category', 'brand')
            ->join('image_tables', 'products.id', '=', 'image_tables.use_id')
            ->where('status', 'published')
            ->join('galleries', 'image_tables.image_id', '=', 'galleries.id')
            ->where('use_type', 'Main_product_image')
            ->select('products.*', 'galleries.location');
                }

        $total_count = count($products['product']->get());
        $found_data = count($products['product']->get());
        $products['product'] = $products['product']->offset($offset)->take(4)->get();

        $result = '';
        $uri = $_SERVER['HTTP_HOST'];

        $base_path ='/'.'uploads/gallery/';
        foreach ($products['product'] as $product) {
            if (isset($request->amount_min) && $request->amount_min != null) {
                $total_count = 0;
                if ($product->price < $request->amount_min) continue;
            }
            if (isset($request->amount_max) && $request->amount_max != null) {
                $total_count=0;
                if ($product->price < $request->amount_max) {
                } else continue;
            }
            $result = $result . '<div class="col-sm-6 col-lg-3">
                        <div class="product-item">
                        <ul class="product-icon-top">
                                <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
							<li><i class="fa fa-heart" aria-hidden="true" id="'.$product->id.'" onclick="wish(this.id)"></i></li>
                            </ul>
                            <a href="' . $base_path . $product->location . '" class="product-img"><img class="lazy" src="' . $base_path . $product->location . '" alt="product"></a>
                            <div class="product-item-cover">
                                <div class="price-cover">
                                    <div class="new-price"><i class="fa fa-inr" aria-hidden="true"> </i>' . $product->price . '</div>
                                    <!-- <div class="old-price">$1.799</div> -->
                                </div>
                                <h6 class="prod-title"><a href="asset($product->id)}}">' . $product->name . '</a></h6>
                                            <a href="' . "shopNow/" . $product->id . 'class="btn"><span>buy now</span></a>
                            </div>
                        
                        </div>
                    </div>';
         
        }



        $result .='<div id="pagination" class="col-sm-6">';

        for($i=1; $i <= $total_count/4; $i++){
          if($i == $page){
            $class_name = "active";
          }else{
            $class_name = "";
          }
          $result .= "<a class='{$class_name}' id='{$i}' href=''>{$i}</a>";
        }
        $result .='</div>';
        $result.='<input type="hidden" id="result_found" value="';
        $result.=$found_data.'"/>';
        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_all_counts()
    {
        $data = [];
        $data['total_product'] = Product::all()->count();
        $data['published_product'] = Product::where('status', 'published')->count();
        $data['unpublished_product'] = Product::where('status', 'unpublished')->count();
        // product count by category
        $categories = Category::pluck('name', 'id');
        foreach ($categories as $key => $categry) {
            $data['category_product'][$categry] = Product::where('cat_id', $key)->count();
        }
        // orders data
        $data['created_orders'] = Order::where('status', 'created')->count();
        $data['paid_orders'] = Order::where('status', 'paid')->count();
        // top orders data
        $final_date = Carbon::now('UTC')->addDay(-30)->format('Y-m-d H:i:s');
        $top_orders = DB::select('select * from orderdetails where created_at >=?', [$final_date]);


        $arr_count = count($top_orders);
        $numbers = array_column($top_orders, 'product_id');
        $new_arr = [];

        for ($i = 0; $i < $arr_count; $i++) {
            $new_arr[$numbers[$i]] = 1;
        }

        for ($j = 0; $j < $arr_count; $j++) {
            $count = 0;
            for ($k = 0; $k < $arr_count; $k++) {
                if ($numbers[$j] == $numbers[$k]) $count++;
            }
            $new_arr[$numbers[$j]] = $count;
        }

        arsort($new_arr);

        $categories = Category::pluck('name', 'id');
        $end = 0;
        foreach ($new_arr as $key => $value) {
            if (isset($categories[$key])) {
                $data['top_category'][$categories[$key]] = $value;
            }
            $end++;

            if ($end > 3) break;
        }


        return $data;
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
