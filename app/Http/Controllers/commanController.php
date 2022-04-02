<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use App\Models\Variations;
use Modules\Order\Entities\Order;
use Carbon\Carbon;
use Illuminate\Database\Schema\ForeignKeyDefinition;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Stmt\Foreach_;

class commanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function add_address(Request $request)
    {

        $addres = DB::table('addresses');
        $addres_detail = '' . $request->name . '' . $request->lame . ',' . $request->hno . ', pin(' . $request->pincode . '), ' . $request->state . ' , India';
        $data = [
            'name' => $request->name,
            'lname' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'pincode' => $request->pincode,
            'state' => $request->state,
            'country' => 'india',
            'user_id' => $request->user,
            'address' => $addres_detail
        ];
        $addres->insert($data);
        return redirect()->back()->with('success', 'Address successfully Added');
    }

    public function order_create(Request $request)
    {
        $order = new Order();
        if ($request->varient > 0) {
            $varient = DB::table('variations')->where('id', $request->varient)->get();
            $request->varient = null;
        } else {
            $varient = Product::where('id', $request->product_id)->get();
        }
        $order_dateail = [
            'order_id'  => 'order__adminOrder',
            'user_id'   => $request->user,
            'method'    => 'COD',
            'amount'    => $varient[0]->price,
            'status'    => 'paid',
            'address_id' => $request->address,
            'created_at' => $request->date
        ];
        $order->insert($order_dateail);
        $id = DB::getPdo()->lastInsertId();
        $order_datail = DB::table('orderdetails');

        if ($request->varient > 0) {
            $detail_data = [
                'order_id' => $id,
                'product_id' => $request->product_id,
                'variant_id' => $request->varient,
                'quantity' => $request->quantity,
                'created_at' => $request->date
            ];
        } else {
            $detail_data = [
                'order_id' => $id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'created_at' => $request->date
            ];
        }

        $order_datail->insert($detail_data);
        return redirect()->back()->with('success', 'Order successfully Added');
    }

    public function auto_fill_varient($pid)
    {
        $data = [];
        $product_qty_data = Product::where('id', $pid)->get();
        $product_qty = $product_qty_data[0]->quantity;
        $varients = DB::table('variations')->where('product_id', $pid)->get();
        $result = '<label for="varients">varients</label>
        <select  placeholder="Select varient"  name="varient" class="form-control">';
        if (isset($varients[0])) {
            foreach ($varients as $varient) {
                $result = $result . '<option selected value="' . $varient->id . '">' . $varient->name . '- Rs.' . $varient->price . '</option>';
            }
        } else {
            $result = $result . '<option selected  value ="0">' . $product_qty_data[0]->name . '- Rs.' . $product_qty_data[0]->price . '</option>';
        }

        $result = $result . '</select>';
        $data['varient'] = $result;

        $quantity = '<label for="quantity">Quantity</label>
        <select  placeholder="Select quantity"  name="quantity" class="form-control">';
        for ($i = 1; $i < $product_qty; $i++) {
            $quantity = $quantity . '<option  value="' . $i . '">' . $i . '</option>';
        }
        $quantity = $quantity . '</select>';
        $data['quantity'] = $quantity;
        return $data;
    }

    public function user_data_ajax($uid)
    {
        $address = DB::table('addresses')->where('user_id', $uid)->get();
        $address_id = 0;
        $result = '<label for="address">Address</label>
         <select  placeholder="Select address"  name="address" class="form-control" onchange="open_form()" id ="address_select">';
        $result = $result . '<option value="0"> Add New</option>';

        foreach ($address as $addres) {
            $address_id = $address[0]->id;
            $result = $result . '<option selected value="' . $addres->id . '">' . $addres->address . '</option>';
        }
        $result = $result . '</select>';
        $data = [];
        $data['result'] = $result;
        $data['id'] = $address_id;
        return $data;
    }
    public function order_by_date_ajax(Request $request)
    {

        if ($request['from'] != null && $request['to'] != null) {
            $orders = Order::whereBetween('created_at', [$request['to'], $request['from']])->get();
        }
        if ($request['from'] == null && $request['to'] != null) {
            $date = $request['to'];
            $orders = Order::where('created_at', '>', $date)->get();
        }
        if ($request['from'] != null && $request['to'] == null) {
            $date = $request['from'];
            $orders = Order::where('created_at', '<', $date)->get();
        }
        $result = '';
        $i = 1;
        $data['address'] = DB::table('addresses')->orderBy('id', 'DESC')->paginate(50);

        foreach ($orders as $order) {
            $result = $result .
                '<tr><td class="border">' . $i++ . '</td>
            <td  class="border">' . $order->order_id . '</td>
            <td class="border">' . $order->razorpay_payment_id . '</td>
            <td class="border">' . $order->amount . '</td>
            <td class="border"><textarea>' . $data['address'][0]->name . ',' . $data['address'][0]->address . '<br>
             (' . $data['address'][0]->pincode . ') , ' . $data['address'][0]->state . ' </textarea></td>
            <td class="border">' . $order->status . '</td>
            <td class="border"  >' . $order->created_at . '</td></tr>';
        }
        return $result;
    }
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
        if (isset($request->page_no)) {
            $page = $request->page_no;
        } else {
            $page = 1;
        }

        $offset = ($page - 1) * $limit_per_page;

        if (isset($request->cat) && isset($request->brand)) {
            $products['product'] = Product::with('category', 'brand')
                ->join('image_tables', 'products.id', '=', 'image_tables.use_id')
                ->where('status', 'published')
                ->join('galleries', 'image_tables.image_id', '=', 'galleries.id')
                ->where('use_type', 'Main_product_image')
                ->select('products.*', 'galleries.location')->whereIn('products.cat_id', $request->cat)->whereIn('products.brand_id', $request->brand);
        }
        if (isset($request->cat) && !isset($request->brand)) {
            $products['product'] = Product::with('category', 'brand')
                ->join('image_tables', 'products.id', '=', 'image_tables.use_id')
                ->where('status', 'published')
                ->join('galleries', 'image_tables.image_id', '=', 'galleries.id')
                ->where('use_type', 'Main_product_image')
                ->select('products.*', 'galleries.location')->whereIn('products.cat_id', $request->cat);
        }

        if (!isset($request->cat) && isset($request->brand)) {

            $products['product'] = Product::with('category', 'brand')
                ->join('image_tables', 'products.id', '=', 'image_tables.use_id')
                ->where('status', 'published')
                ->join('galleries', 'image_tables.image_id', '=', 'galleries.id')
                ->where('use_type', 'Main_product_image')
                ->select('products.*', 'galleries.location')->whereIn('products.brand_id', $request->brand);
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

        $base_path = '/' . 'uploads/gallery/';
        foreach ($products['product'] as $product) {
            if (isset($request->amount_min) && $request->amount_min != null) {
                $total_count = 0;
                if ($product->price < $request->amount_min) continue;
            }
            if (isset($request->amount_max) && $request->amount_max != null) {
                $total_count = 0;
                if ($product->price < $request->amount_max) {
                } else continue;
            }
            $result = $result . '<div class="col-sm-6 col-lg-3">
                        <div class="product-item">
                        <ul class="product-icon-top">
                                <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
							<li><i class="fa fa-heart" aria-hidden="true" id="' . $product->id . '" onclick="wish(this.id)"></i></li>
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



        $result .= '<div id="pagination" class="col-sm-6">';

        for ($i = 1; $i <= $total_count / 4; $i++) {
            if ($i == $page) {
                $class_name = "active";
            } else {
                $class_name = "";
            }
            $result .= "<a class='{$class_name}' id='{$i}' href=''>{$i}</a>";
        }
        $result .= '</div>';
        $result .= '<input type="hidden" id="result_found" value="';
        $result .= $found_data . '"/>';
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
        $role = Auth::guard('admin')->user()->role;
        $seller_id = Auth::guard('admin')->user()->id;

        if ($role == 'Seller' || $role == 'seller') {
            $data['total_product'] = Product::where('seller_id', $seller_id)->count();
            $data['published_product'] = Product::where('seller_id', $seller_id)->where('status', 'published')->count();
            $data['unpublished_product'] = Product::where('seller_id', $seller_id)->where('status', 'unpublished')->count();
            // product count by category
            $categories = Category::where('seller_id', $seller_id)->pluck('name', 'id');
            foreach ($categories as $key => $categry) {
                $data['category_product'][$categry] = Product::where('seller_id', $seller_id)->where('cat_id', $key)->count();
            }
            // orders data
            $data['created_orders'] = Order::where('status', 'created')->count();
            $data['paid_orders'] = Order::where('status', 'paid')->count();
            // top orders data
            $product_ids = Product::where('seller_id', $seller_id)->where('status', 'published')->pluck('id', 'id');
            $final_date = Carbon::now('UTC')->addDay(-30)->format('Y-m-d H:i:s');

            $numbers = DB::table('orderdetails')->where('created_at', '>=', $final_date)
                ->whereIn('product_id', $product_ids)->pluck('product_id');
            $arr_count = count($numbers);
            // $numbers = array_column($top_orders, 'product_id');
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
            $my_cat_ids = [];

            foreach ($new_arr as $key => $value) {
                Array_push($my_cat_ids, $key);
            }
            $categories = Product::whereIn('id', $my_cat_ids)->pluck('cat_id', 'id');
            $category_name =  Category::pluck('name', 'id');

            foreach ($new_arr as $key => $value) {
                if (isset($categories[$key])) {
                    $data['top_category'][$category_name[$categories[$key]]] = $value;
                }
            }
        } else {
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

                // if ($end > 3) break;
            }
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
