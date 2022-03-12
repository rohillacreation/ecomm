<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Variations;
use Illuminate\Http\Request;
use App\Models\Cart;


class Live_searchController extends Controller
{
    function action(Request $request)
    {
        if ($request->ajax()) {

            $search = $request->search;

            $products = Product::Where('name', 'like', '%' . $search . '%')->get();
            $catgories = Category::Where('name', 'like', '%' . $search . '%')->get();
            $tags = Tag::with('product')->Where('name', 'like', '%' . $search . '%')->get();
            $Brands = Brand::Where('name', 'like', '%' . $search . '%')->get();

            $output = '';

            if (count($tags) > 0) {

                foreach ($tags as $value) {
                    if ($value->product->status == 'published') {

                        $output .= '<div class="flex justify-between py-1 px-2 cursor-pointer" onclick="product_id(' . $value->product->id . ')"><h3>' . $value->product->name . '</h3><h3>$' . $value->product->unit_price . '</h3></div><hr>';
                    }
                }
            }


            if (count($catgories) > 0) {

                $output .= '<p class="text-right text-sm bg-gray-200">Simmilar Categories</P><br>';

                foreach ($catgories as $value) {

                    $output .= '<h3 class="py-1 px-3 text-base cursor-pointer" onclick="cat_id(' . $value->id . ')">' . $value->name . '</h3><hr>';
                }
            }

            if (count($Brands) > 0) {

                $output .= '<p class="text-right text-sm bg-gray-200">Brands</P><br>';

                foreach ($Brands as $value) {

                    $output .= '<h3 class="py-1 px-3 text-base cursor-pointer" onclick="brand_id(' . $value->id . ')">' . $value->name . '</h3><hr>';
                }
            }

            if (count($products) > 0) {

                $output .= '<p class="text-right text-sm bg-gray-200">Simmilar Products</P><br>';

                foreach ($products as $value) {

                    if ($value->status == 'published') {

                        $output .= '<div class="flex justify-between py-1 px-2 cursor-pointer" onclick="product_id(' . $value->id . ')"><h3>' . $value->name . '</h3><h3>$' . $value->unit_price . '</h3></div><hr>';
                    }
                }
            }

            if (empty($output)) {

                $output .= '<h1>WOoops... nothing found. Try somthing else</h1>';
            }


            return $output;
        }
    }

    function test()
    {
        $add = Address::where('user_id', 1)->find(1);
        if ($add) {
            return $add;
        }
    }




    function brand(Request $request)
    {
        $id = $request->id;

        $products = Product::join('image_tables', 'products.id', '=', 'image_tables.use_id')
            ->where('status', 'published')
            ->where('brand_id', $id)
            ->join('galleries', 'image_tables.image_id', '=', 'galleries.id')
            ->where('use_type', 'Main_product_image')
            ->select('products.*', 'galleries.location')
            ->paginate(10);

        return view('result_products', ['products' => $products]);
    }



    function category(Request $request)
    {
        $id = $request->id;

        $products = Product::join('image_tables', 'products.id', '=', 'image_tables.use_id')
            ->where('status', 'published')
            ->where('cat_id', $id)
            ->join('galleries', 'image_tables.image_id', '=', 'galleries.id')
            ->where('use_type', 'Main_product_image')
            ->select('products.*', 'galleries.location')
            ->paginate(10);

        return view('result_products', ['products' => $products]);
    }


    function products(Request $request)
    {
        $id = $request->id;

        $product = Product::with('category', 'brand')
            ->join('image_tables', 'products.id', '=', 'image_tables.use_id')
            ->where('status', 'published')
            ->join('galleries', 'image_tables.image_id', '=', 'galleries.id')
            ->where('use_type', 'Main_product_image')
            ->select('products.*', 'galleries.location')->find($id);
        $cat_id = $product->cat_id;


        if (isset($product->brand_id)) {

            $brand_id = $product->brand_id;


            if (isset($product->variant)) {
                $variants = Variations::where('product_id', $id)->with('images')->get();
            }

            $product_cats = Product::limit(10)
                ->join('image_tables', 'products.id', '=', 'image_tables.use_id')
                ->where('status', 'published')
                ->where('cat_id', $cat_id)
                ->join('galleries', 'image_tables.image_id', '=', 'galleries.id')
                ->where('use_type', 'Main_product_image')
                ->select('products.*', 'galleries.location')
                ->get();

            $product_brands = Product::limit(10)
                ->join('image_tables', 'products.id', '=', 'image_tables.use_id')
                ->where('status', 'published')
                ->where('cat_id', $brand_id)
                ->join('galleries', 'image_tables.image_id', '=', 'galleries.id')
                ->where('use_type', 'Main_product_image')
                ->select('products.*', 'galleries.location')
                ->get();

            if (isset($variants)) {

                return view('single_product', [
                    'product' => $product,
                    'variants' => $variants,
                    'product_cats' => $product_cats,
                    'product_brands' => $product_brands
                ]);
            } else {

                return view('single_product', [
                    'product' => $product,
                    'product_cats' => $product_cats,
                    'product_brands' => $product_brands

                ]);
            }
        } else {

            if (isset($product->variant)) {
                $variants = Variations::where('product_id', $id)->with('images')->get();
            }

            $product_cats = Product::limit(10)
                ->join('image_tables', 'products.id', '=', 'image_tables.use_id')
                ->where('status', 'published')
                ->where('cat_id', $cat_id)
                ->join('galleries', 'image_tables.image_id', '=', 'galleries.id')
                ->where('use_type', 'Main_product_image')
                ->select('products.*', 'galleries.location')
                ->get();

            if (isset($variants)) {

                return view('single_product', [
                    'product' => $product,
                    'variants' => $variants,
                    'product_cats' => $product_cats
                ]);
            } else {

                return view('single_product', [
                    'product' => $product,
                    'product_cats' => $product_cats

                ]);
            }
        }
    }



    function variant_change(Request $request)
    {
        if ($request->ajax()) {

            $var_id = $request->var_id;
            $pro_id = $request->pro_id;


            if ($var_id) {

                $product = Product::join('image_tables', 'products.id', '=', 'image_tables.use_id')
                    ->join('galleries', 'image_tables.image_id', '=', 'galleries.id')
                    ->where('use_type', 'Main_product_image')
                    ->select('products.*', 'galleries.location')->find($pro_id);


                $variants = Variations::where('id', $var_id)->with('images')->get();

                $print = '';

                foreach ($variants as $value) {

                    $print .= ' <div class="col-span-2">';

                    if (!empty($value->image_id)) {

                        $print .= '<img class="border-2 border-gray-300" src="' . asset('uploads/gallery/' . $value->images[0]->location) .  '" alt="var_image"></div>';
                    } else {
                        $print .= '<img class="border-2 border-gray-300" src="' . asset('uploads/gallery/' . $product->location) .  '" alt="pro_image"></div>';
                    }

                    $print .= '<div class="col-span-2">
                            <div class="grid justify-items-center">
                                <h3 class="text-xl">' . $product->name . '</h3>';

                    if (!empty($value->sku)) {

                        $print .= '<h3 class="text-sm">' . $value->sku . '</h3>';
                    }

                    if ($value->quantity > 2) {

                        $print .= '<h3 class="text-xl text-red-600">₹.  ' . $value->price . '</h3>

                        <div class="flex justify-around p-5">
                            
                            <label for="quantity">Quantity:</label>';

                        if ($product->qty < 5) {

                            $print .= '<select id="value_qty" value="1" class="rounded">
                                    <option selected value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>';
                        } elseif ($value->quantity <= 10) {
                            $print .= '<select id="value_qty" class="rounded" value="1">
                                    <option selected value="1" selected>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>';
                        } elseif ($value->quantity > 10) {
                            $print .= '<select value="1" id="value_qty" class="rounded">

                                    <option selected value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="14">15</option>

                                </select>';
                        }

                        $print .= '</div>

                                <div class="flex justify-around p-5">

                                    <button style="height:40px;width:120px;" class="text-white text-base bg-blue-500 w-full px-10 mx-5 border border-blue-900 rounded-sm" onclick="add_cart(' . $product->id . ',' . $value->id . ')">+Cart</button>
                                    <button style="height:40px;width:120px;" class="text-white text-base bg-blue-500 w-full px-10 mx-5 border border-blue-900 rounded-sm" onclick="buy_now(' . $product->id . ',' . $value->id . ')">Buy_now</button>
                                
                                </div>';
                    } else {
                        $print .= '<h3 class="text-sm text-red-600">Sorry product not available yet.</h3>';
                    }
                }

                echo $print;
            }
        }
    }
}
