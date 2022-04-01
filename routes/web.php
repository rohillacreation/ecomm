<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Admin\CkeditorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\AttvalController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\commanController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Live_searchController;
use App\Http\Controllers\WishlistController;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image_table;
use App\Models\Variations;
use App\Models\Color;
use App\Models\User;
use Modules\Blog\Http\Controllers\BlogController;

use Modules\BuyNow\Http\Controllers\BuyNowController;
use Modules\Payment\Http\Controllers\PaymentController;
use Modules\Order\Http\Controllers\OrderController;
use Modules\Cart\Http\Controllers\CartController;



Route::get('/', function () {
    return view('welcome');
});


// webiste rout

function all_product_data($cat_id = null)
{

    if ($cat_id) {
        $products_list = Product::with('category', 'brand')
            ->join('image_tables', 'products.id', '=', 'image_tables.use_id')
            ->where('status', 'published')
            ->join('galleries', 'image_tables.image_id', '=', 'galleries.id')
            ->where('use_type', 'Main_product_image')
            ->select('products.*', 'galleries.location')->where('products.cat_id', $cat_id)->paginate(8);
        return $products_list;
    } else {
        $products_list = Product::with('category', 'brand')
            ->join('image_tables', 'products.id', '=', 'image_tables.use_id')
            ->where('status', 'published')
            ->join('galleries', 'image_tables.image_id', '=', 'galleries.id')
            ->where('use_type', 'Main_product_image')
            ->select('products.*', 'galleries.location')->paginate(8);
        return $products_list;
    }
}

function Gallery_images($product_id)
{
    $image_data = Image_table::where('use_id', $product_id)->join('galleries', 'galleries.id', '=', 'image_tables.image_id')->get();
    return $image_data;
}



Route::get('website', function () {
    $data['product'] = all_product_data();
    $data['cetegory'] = Category::all()->where('status', 'publish');
    $data_by_category = [];
    foreach ($data['cetegory'] as $key => $category) {
        array_push($data_by_category, all_product_data($category->id));
    }
    $data['data_by_category'] = $data_by_category;
    $data['color'] = Color::all();
    return view('website.index', compact('data'));
});

Route::get('service', function () {
    $data['product'] = Product::with('category', 'brand')
        ->join('image_tables', 'products.id', '=', 'image_tables.use_id')
        ->where('status', 'published')
        ->join('galleries', 'image_tables.image_id', '=', 'galleries.id')
        ->where('use_type', 'Main_product_image')
        ->select('products.*', 'galleries.location')->orderBy('products.id', 'desc')->get();
    $data['cetegory'] = Category::all()->where('status', 'publish');

    return view('website.services', compact('data'));
});

Route::get('shop', function () {
    $data['product'] = all_product_data();
    $data['cetegory'] = Category::all()->where('status', 'publish');
    $data['brand'] = Brand::all();
    $data['colors'] = Color::all();
    return view('website.shop', compact('data'));
});

Route::get('about', function () {
    $data['product'] = all_product_data();
    return view('website.about', compact('data'));
});

Route::get('contact', function () {
    $data['product'] = all_product_data();
    return view('website.contacts', compact('data'));
});

Route::get('gallery', function () {
    $data['product'] = all_product_data();
    return view('website.gallery', compact('data'));
});

Route::get('shopNow/{id}', function ($id) {
    $data['product'] = Product::with('category', 'brand')
        ->join('image_tables',  'image_tables.use_id', '=', 'products.id')
        ->where('status', 'published')
        ->join('galleries', 'image_tables.image_id', '=', 'galleries.id')
        ->where('use_type', 'Main_product_image')
        ->select('products.*', 'galleries.location')->where('products.id', $id)->get();

    $data['images'] = Gallery_images($id);
    $data['colors'] = Variations::select('color')->where('product_id', $id)->get();
    // suggested products
    $data['suggested_product'] = all_product_data($data['product'][0]->cat_id);
    return view('website.shopNow', compact('data'));
});


// ajax functions 
Route::post('brand_ajax', [commanController::class, 'brand_ajax']);
Route::post('color_ajax', [commanController::class, 'color_ajax']);
Route::post('all_filter_ajax', [commanController::class, 'all_filter_ajax']);
Route::post('shop/all_filter_ajax', [commanController::class, 'all_filter_ajax']);

Route::post('admin/order_by_date_ajax', [commanController::class, 'order_by_date_ajax']);
Route::get('admin/user_data_ajax/{uid}', [commanController::class, 'user_data_ajax']);
Route::get('admin/varient_data_ajax/{pid}', [commanController::class, 'auto_fill_varient']);
Route::post('admin/add_address', [commanController::class, 'add_address']);





// home search

Route::post('home_search', [commanController::class, 'home_search']);
Route::post('shop/{cat_id}', [commanController::class, 'home_search']);






require __DIR__ . '/auth.php';

Route::post('/live_search', [Live_searchController::class, 'action'])->name('live_search');
Route::get('category/{id}', [Live_searchController::class, 'category'])->name('category');
Route::get('brand/{id}', [Live_searchController::class, 'brand'])->name('brand');
Route::get('/product/{id}', [Live_searchController::class, 'products'])->name('products');
Route::post('/variant_change', [Live_searchController::class, 'variant_change'])->name('variant_change');

Route::get('/addWishList/{product_id}' ,[WishlistController::class, 'create']);
Route::get('/getWhishList' ,[WishlistController::class, 'index']);





//Test route

Route::get('test', [Live_searchController::class, 'test'])->name('test');

// Admin routes
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::namespace('Auth')->middleware('guest:admin')->group(function () {
        Route::get('login', 'AuthenticatedSessionController@index')->name('login');
        Route::post('login', 'AuthenticatedSessionController@store')->name('adimnlogin');
    });
    Route::middleware('admin')->group(function () {

        Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
        // dashboard counts 
        Route::get('get_all_counts', [CommanController::class, 'get_all_counts']);
        Route::get('logout', 'Auth\AuthenticatedSessionController@destroy')->name('logout');



    //custumers route
        Route::get('all_costumers', function () {
            $data=User::paginate(12);
            return view('admin.oprations.costumers.all_costumers' , compact('data'));
        });
        Route::get('add_costumers', function () {
            return view('admin.oprations.costumers.add_costumer');
        });
        Route::post('add_costumer', [CustomerController::class, 'create']);
        Route::get('customer/delete/{id}', [CustomerController::class, 'destroy']);
        Route::get('customer/edit/{id}', [CustomerController::class, 'edit']);
        Route::post('customer/update/{id}', [CustomerController::class, 'update']);






        //Staff routes
        Route::get('staff', 'StaffController@index')->name('staff');
        Route::get('staff_add', function () {
            return view('admin.oprations.staffUpdate');
        });


        Route::post('staff', 'StaffController@create')->name('StaffCreate');
        Route::get('staffDelete/{id?}', 'StaffController@del')->name('StaffDelete');
        Route::get('staffEdit/{id?}', 'StaffController@edit')->name('StaffDelete');
        Route::post('/staffupdate', 'StaffController@update')->name('StaffUpdate');

        //Attribute routes

        Route::get('attribute', [AttributeController::class, 'index'])->name('attribute');
        Route::post('attribute', [AttributeController::class, 'store'])->name('attributestore');
        Route::get('attributeDelete/{id?}', [AttributeController::class, 'del'])->name('attributeDelete');
        Route::get('attributeEdit/{id?}', [AttributeController::class, 'edit'])->name('attributeEdit');
        Route::post('attributeUpdate', [AttributeController::class, 'update'])->name('attributeUpdate');


        //gallery routes

        Route::get('gallery', [GalleryController::class, 'index'])->name('gallery');
        Route::get('gallery_sort', [GalleryController::class, 'sort'])->name('gallery_sort');
        Route::get('gallery_new', [GalleryController::class, 'new'])->name('gallery_new');
        Route::post('gallery_store', [GalleryController::class, 'store'])->name('gallerystore');
        Route::get('gallerydelete/{id?}', [GalleryController::class, 'del'])->name('gallerydelete');


        //categories routes

        Route::get('/category', [CategoryController::class, 'index'])->name('category');
        Route::get('/category_new', [CategoryController::class, 'create'])->name('category_new');
        Route::post('/category_new', [CategoryController::class, 'store'])->name('catgory_store');
        Route::get('/category_del/{id?}', [CategoryController::class, 'del'])->name('category_del');
        Route::get('/category_edit/{id?}', [CategoryController::class, 'edit'])->name('category_edit');
        Route::post('/category_update', [CategoryController::class, 'update'])->name('category_update');


        //brand routes

        Route::get('/brand', [BrandController::class, 'index'])->name('brand');
        Route::post('/brand', [BrandController::class, 'store'])->name('brandstore');
        Route::get('brandDelete/{id?}', [BrandController::class, 'del'])->name('branddelete');
        Route::get('brandEdit/{id?}', [BrandController::class, 'edit'])->name('brandedit');
        Route::post('brandUpdate', [BrandController::class, 'update'])->name('brandupdate');


        //color routes

        Route::get('colors', [ColorController::class, 'index'])->name('colors');
        Route::post('colors', [ColorController::class, 'store'])->name('colorstore');
        Route::get('colorDelete/{id?}', [ColorController::class, 'del'])->name('colordelete');
        Route::get('colorEdit/{id?}', [ColorController::class, 'edit'])->name('coloredit');
        Route::post('colorUpdate', [ColorController::class, 'update'])->name('colorupdate');


        //Attributes values routes

        Route::get('att_value/{id}', [AttvalController::class, 'index'])->name('attribute_value');
        Route::post('att_valueAdd', [AttvalController::class, 'store'])->name('attribute_valueStore');
        Route::get('attt_valueDelete/{id?}', [AttvalController::class, 'del'])->name('attribute_value_delete');
        Route::get('attt_valueEdit/{id?}', [AttvalController::class, 'edit'])->name('attribute_value_edit');
        Route::post('attt_valueUpdate', [AttvalController::class, 'update'])->name('attribute_value_update');


        //Products routes

        Route::get('new_product', 'ProductController@index')->name('new_product');
        Route::get('find_product', 'ProductController@find_product')->name('find_product');
        Route::get('All_product', 'ProductController@List_product')->name('All_product');
        Route::post('addproduct', 'ProductController@create_product')->name('AddProduct');

        Route::post('update_product', 'ProductController@update_product')->name('update_product');
        Route::get('product_edit/{id?}', 'ProductController@edit')->name('product_edit');
        Route::get('product_delete/{id?}', 'ProductController@delete')->name('product_delete');
        Route::post('product/getValue', 'ProductController@getValue')->name('getValue');
        Route::post('product/getColor', 'ProductController@getColor')->name('getColor');
        Route::post('product/images_preview', 'ProductController@images_preview');
        Route::post('product/thum_image_preview', 'ProductController@thum_image_preview');
        Route::post('product/variant_image_preview', 'ProductController@variant_image_preview');
        Route::post('product/get_meta_img', 'ProductController@meta_image_preview');
        Route::get('product/get_thum_img', 'ProductController@thum_img');
        Route::get('product/get_variant_img', 'ProductController@variant_img');
        Route::get('product/get_pro_img', 'ProductController@product_img');
        Route::post('product/getVariant', 'ProductController@variant')->name('getVariant');

        // orders
        Route::get('all_orders', function () {
            $data['orders'] = DB::table("orders")->orderBy('id', 'DESC')->paginate(50);
            $address = DB::table('addresses')->get();
            $data['address'] =[];
            foreach($address as $addres){
                $data['address'][$addres->id] = $addres;
                }
            return view('admin.oprations.order.index', compact('data'));
        });
        Route::get('new_order', function () {
            $data=[];
            $data['users'] = User::all();
            $data['products'] = Product::all();
            $data['categories'] = Category::pluck('name','id');
            return view('admin.oprations.order.create', compact('data'));
        });
        
        Route::post('order_create', [commanController::class, 'order_create'])->name('image_upload');


        // Products Blog

        Route::post('ckeditor_upload', [CkeditorController::class, 'upload'])->name('image_upload');
        Route::get('blog', [BlogController::class, 'index'])->name('blog');
        Route::get('create_blog', [BlogController::class, 'create'])->name('create_blog');
        Route::post('create_blog', [BlogController::class, 'store']);
        Route::get('blogDelete/{id}', [BlogController::class, 'destroy']);
        Route::get('blogEdit/{id}', [BlogController::class, 'edit']);
        Route::post('blogUpdate', [BlogController::class, 'update'])->name('update_blog');
    });

        // wish list routs

});
