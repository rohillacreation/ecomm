<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Modules\Order\Entities\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class HomeController extends Controller
{
    public function index()
    {
        $role= Auth::guard('admin')->user()->role;
        $id= Auth::guard('admin')->user()->id;

        $data=[];
        $data['canvas_color'] = ['0'=>'canvas-pink' , '1'=>'canvas-green' , '2'=>'canvas-blue' , '3'=>'canvas-yellow' , '4'=>'canvas-yellow' , '5'=>'canvas-orange', '6'=>'canvas-gray' , '7'=>'canvas-megenta' ,'8'=>'canvas-purple', '9'=>'canvas-black',  '10'=>'canvas-cyne'];
        if($role == 'Admin' || $role == 'admin'){
            $data['user_count'] = User::get()->count();
            $data['order_count'] = Order::get()->count();
            $data['category_count'] = Category::get()->count();
            $data['brand_count'] = Brand::get()->count();
            $data['category'] = Category::get();
            return view('admin.dashboard' , compact('data' , 'role'));
        }
        if($role == 'Seller' || $role == 'Seller'){
            $seller_id = Auth::guard('admin')->user()->id;
            $data['user_count'] = 1;
            $product_count = Product::where('seller_id' , $id)->pluck('id');
            $data['order_count'] = DB::table('orderdetails')->whereIn('product_id' , $product_count)->count();  
            $data['category_count'] = Category::where('seller_id' , $seller_id)->get()->count();
            $data['brand_count'] = Brand::where('seller_id' , $seller_id)->get()->count();
            $data['category'] = Category::where('seller_id' , $seller_id)->get();
            return view('staff.dashboard' , compact('data'));
        }
      
    }
}
