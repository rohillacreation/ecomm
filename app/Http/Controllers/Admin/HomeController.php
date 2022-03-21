<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Brand;
use Modules\Order\Entities\Order;

class HomeController extends Controller
{
    public function index()
    {
        $data=[];
        $data['user_count'] = User::get()->count();
        $data['order_count'] = Order::get()->count();
        $data['category_count'] = Category::get()->count();
        $data['brand_count'] = Category::get()->count();
        $data['brand_count'] = Category::get()->count();
        $data['category'] = Category::get();
        $data['canvas_color'] = ['0'=>'canvas-pink' , '1'=>'canvas-green' , '2'=>'canvas-blue' , '3'=>'canvas-gray' , '4'=>'canvasred' , '5'=>'none', '6'=>'none' , '7'=>'none', '8'=>'none'];
        return view('admin.dashboard' , compact('data'));
    }
}
