<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\Attribute_value;
use App\Models\Color;
use App\Models\Gallery;
use App\Models\Variations;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\tag;
use App\Models\Meta;
use Illuminate\Support\Facades\Auth;

use App\Models\Image_table;


class ProductController extends Controller
{
    public function List_product()
    {
        if(Auth::guard('admin')->user()->role == 'seller' || Auth::guard('admin')->user()->role == 'Seller' ){
            $seller_id = Auth::guard('admin')->user()->id;
            $product = Product::with('variant')
            ->where('seller_id' , $seller_id)
            ->join('image_tables', 'products.id', '=', 'image_tables.use_id')
            ->where('use_type', 'Main_product_image')
            ->join('galleries', 'image_tables.image_id', '=', 'galleries.id')
            ->select('products.*', 'galleries.location')
            ->paginate();
    }
        else{
            $product = Product::with('variant')
            ->join('image_tables', 'products.id', '=', 'image_tables.use_id')
            ->where('use_type', 'Main_product_image')
            ->join('galleries', 'image_tables.image_id', '=', 'galleries.id')
            ->select('products.*', 'galleries.location')
            ->paginate();
    }

        return view('admin.oprations.products.All_Product', [
            'products' => $product
        ]);
    }

    public function index()
    {
        $category = category::all();
        $brand = brand::all();
        $color = color::all();
        $attribute = attribute::all();
        $images = Gallery::paginate(5);
        return view('admin.oprations.products.AddProduct', [
            'categories' => $category,
            'brands' => $brand,
            'colors' => $color,
            'attributes' => $attribute,
            'images' => $images,
        ]);
    }

    public function delete(Request $request)
    {

        $id = $request->id;

        $data = product::find($id);

        $data->status = 'deleted';

        $done = $data->update();

        if ($done) {

            return redirect()->back()->with('message', 'product deleted successfully');
        } else {

            return redirect()->back()->with('wrong', 'product not deleted or something went wrong');
        }
    }

    public function edit(Request $request)
    {
        $id = $request->id;

        $edit_product = Product::with('category', 'brand', 'variant')->get()->find($id);

        $main_ex_image = Image_table::with('gallery')->where([
            ['use_id', '=', $id],
            ['use_type', '=', 'Main_product_image']
        ])->get();

        $ex_videos = Image_table::with('gallery')->where([
            ['use_id', '=', $id],
            ['use_type', '=', 'product_video']
        ])->get();

        $ex_images = Image_table::with('gallery')->where([
            ['use_id', '=', $id],
            ['use_type', '=', 'Additional_product_images']
        ])->get();

        $variants = Variations::where('product_id', $id)->get();

        $tags = tag::where([
            ['product_id', '=', $id]
        ])->get();

        $category = category::all();
        $brand = brand::all();
        $color = color::all();
        $attribute = attribute::all();
        $images = Gallery::paginate(10);



        return view('admin.oprations.products.UpdateProduct', [
            'product' => $edit_product,
            'categories' => $category,
            'brands' => $brand,
            'colors' => $color,
            'attributes' => $attribute,
            'images' => $images,
            'main_ex_images' => $main_ex_image,
            'ex_images' => $ex_images,
            'ex_videos' => $ex_videos,
            'variants' => $variants,
            'tags' => $tags,
        ]);
    }

    public function create_product(Request $request)
    {
        $errors = $request->validate([
            'name' => 'required',
            'cat_id' => 'required',
            'tags' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'unit_price' => 'required',
            'product_thum_img' => 'required',
            'ProductPdf' => 'mimes:pdf',
        ]);

         if(Auth::guard('admin')->user()->role == 'seller' || Auth::guard('admin')->user()->role == 'Seller' )
        $seller_id = Auth::guard('admin')->user()->id;
        else $seller_id = 0;
       
        $data = new Product;
        $data->name = $request->name;
        $data->cat_id = $request->cat_id;
        $data->price = $request->unit_price;
        $data->description = $request->description;
        $data->quantity = $request->quantity;
        $data->seller_id = $seller_id;

       
        $brand_id = $request->brand_id;

        if (isset($brand_id)) {

            $data->brand_id = $brand_id;
        }

        if (isset($request->get_status)) {

            $data->status = 'published';
        } else {

            $data->status = 'unpublished';
        }

        $unit_type = $request->unit_type;

        if (isset($unit_tpye)) {

            $data->unit_type = $unit_type;
        }

        $barcode = $request->barcode;

        if (isset($barcode)) {

            $data->barcode = $barcode;
        }

        $sku = $request->sku;

        if (isset($sku)) {

            $data->sku = $sku;
        }

        if ($request->hasfile('ProductPdf')) {

            $file = $request->file('ProductPdf');
            $orgname = $file->getClientOriginalName();
            $exploded_name = explode('.', $orgname)[0];
            $extension = $file->extension();
            $filename = 'pdf' . time() . '_' . $exploded_name . '.' . $extension;
            $file->move('uploads/gallery', $filename);
            $data->pdf = $filename;
        }

        $done = $data->save();

    
        if ($done) {

            $pro_id = Product::select('id')->max('id');

            $tags = $request->tags;

            if (isset($tags)) {

                $tag_arr = [];

                foreach ($tags as $key => $tag) {
                    $tag_arr = explode(',', $tag);
                }

                foreach ($tag_arr as $tag) {

                    $tag_save = new Tag;

                    $tag_save->name = $tag;
                    $tag_save->product_id = $pro_id;

                    $tag_save->save();
                }
            }

            $video_url = $request->video_url;

            if (isset($video_url)) {

                $video_save = new Image_table;

                $video_save->use_id = $pro_id;
                $video_save->url = $video_url;
                $video_save->use_type = 'product_video';

                $video_save->save();
            }

            $pro_images = $request->product_img;

            if (isset($pro_images)) {

                foreach ($pro_images as $value) {

                    $pro_img_save = new Image_table;

                    $pro_img_save->image_id = $value;
                    $pro_img_save->use_id = $pro_id;
                    $pro_img_save->use_type = 'Additional_product_images';

                    $pro_img_save->save();
                }
            }

            $Thum_img = $request->product_thum_img;

            if (isset($Thum_img)) {

                $main_img_save = new Image_table;

                $main_img_save->image_id = $Thum_img;
                $main_img_save->use_id = $pro_id;
                $main_img_save->use_type = 'Main_product_image';

                $main_img_save->save();
            }


            $variants = $request->variant;

            if (isset($variants)) {

                $variants_arr = [];

                $var_price = $request->var_price;
                $var_qty = $request->var_qty;
                $var_sku = $request->var_sku;

                $vartion_selected_images = $request->vartion_selected_images;

                foreach ($variants as $key => $variant) {

                    $variants_arr[$key] =  array(
                        $variant, $var_price[$key], $var_qty[$key],
                        $var_sku[$key], $pro_id, $vartion_selected_images[$key]
                    );
                }

                $i=0;
                foreach ($variants_arr as $value) {

                    $var_save = new Variations;

                    $var_save->name = $value[0];
                    $var_save->price = $value[1];
                    $var_save->quantity = $value[2];
                    $var_save->sku = $value[3];
                    $var_save->product_id = $value[4];
                    $var_save->image_id = $value[5];

                    if(isset($request->color[$i])){
                        $var_save->color = $request->color[$i];
                    }
                    $i++;
                    $var_save->save();
                }
            }

            $meta_name = $request->Meta_titel;

            if (isset($meta_name)) {

                $errors = $request->validate([

                    'Meta_description' => 'required',
                    'meta_image' => 'required',

                ]);

                $meta_description = $request->Meta_description;

                $meta_image = $request->meta_image;

                $meta_name = $request->Meta_titel;


                $meta_save = new Meta;

                $meta_save->meta_titel = $meta_name;
                $meta_save->description = $meta_description;

                $meta_save->save();

                $meta_id = Meta::select('id')->max('id');

                $meta_img_save = new Image_table;

                $meta_img_save->image_id = $meta_image;
                $meta_img_save->use_id = $meta_id;
                $meta_img_save->use_type = 'Meta_product_image';

                $meta_img_save->save();
            }

            return redirect()->back()->with('message', 'product added successfully');
        } else {
            // $errors = 'Something went wrong';
            return redirect()->back()->with('wrong', 'Something went wrong');
        }
    }


    public function update_product(Request $request)
    {
        // return $request;

        $errors = $request->validate([
            'name' => 'required',
            'cat_id' => 'required',
            'tags' => 'required',
            'description' => 'required',
            'unit_price' => 'required',
            'quantity' => 'required',
            'product_thum_img' => 'required',
            'ProductPdf' => 'mimes:pdf',
            'get_status' => 'required'
        ]);

        $pro_id = $request->product_id;

        $data = product::find($pro_id);

        $data->name = $request->name;
        $data->cat_id = $request->cat_id;
        $data->price = $request->unit_price;
        $data->description = $request->description;
        $data->quantity = $request->quantity;


//$data->status = $request->get_status;
if (isset($request->get_status)) {

    $data->status = 'published';
} else {

    $data->status = 'unpublished';
}


        $data->unit_type = $request->unit_type;
        $data->barcode = $request->barcode;
        $data->sku = $request->sku;

        $brand_id = $request->brand_id;

        if (isset($brand_id)) {

            $data->brand_id = $brand_id;
        }

        if ($request->hasfile('pdf')) {

            $file = $request->file('pdf');
            $orgname = $file->getClientOriginalName();
            $exploded_name = explode('.', $orgname)[0];
            $extension = $file->extension();
            $filename = 'pdf' . time() . '_' . $exploded_name . '.' . $extension;
            $file->move('uploads/gallery', $filename);
            $data->pdf = $filename;
        }

        $done = $data->save();

        if ($done) {

            $video_url = $request->video_url;

            if (isset($video_url)) {

                $video_del_check = Image_table::where([
                    ['use_id', '=', $pro_id],
                    ['use_type', '=', 'product_video']
                ])->delete();

                $video_save = new Image_table;

                $video_save->use_id = $pro_id;
                $video_save->url = $video_url;
                $video_save->use_type = 'product_video';

                $video_save->save();
            }


            $pro_images = $request->product_img;

            if (isset($pro_images)) {

                $del_check = Image_table::where([
                    ['use_id', '=', $pro_id],
                    ['use_type', '=', 'Additional_product_images']
                ])->delete();



                foreach ($pro_images as $value) {

                    $pro_img_save = new Image_table;

                    $pro_img_save->image_id = $value;
                    $pro_img_save->use_id = $pro_id;
                    $pro_img_save->use_type = 'Additional_product_images';

                    $pro_img_save->save();
                }
            }

            $Thum_img = $request->product_thum_img;

            if (isset($Thum_img)) {

                $main_del_check = Image_table::where([
                    ['use_id', '=', $pro_id],
                    ['use_type', '=', 'Main_product_image']
                ])->delete();

                $main_img_save = new Image_table;

                $main_img_save->image_id = $Thum_img;
                $main_img_save->use_id = $pro_id;
                $main_img_save->use_type = 'Main_product_image';

                $main_img_save->save();
            }


            $variants = $request->variant;

            if (isset($variants)) {

                $var_del_check = Variations::where([
                    ['product_id', '=', $pro_id],
                ])->delete();



                $variants_arr = [];

                $var_price = $request->var_price;
                $var_qty = $request->var_qty;
                $var_sku = $request->var_sku;

                $vartion_selected_images = $request->vartion_selected_images;

                foreach ($variants as $key => $variant) {

                    $variants_arr[$key] =  array(
                        $variant, $var_price[$key], $var_qty[$key],
                        $var_sku[$key], $pro_id, $vartion_selected_images[$key]
                    );
                }

                foreach ($variants_arr as $value) {

                    $var_save = new Variations;

                    $var_save->name = $value[0];
                    $var_save->price = $value[1];
                    $var_save->quantity = $value[2];
                    $var_save->sku = $value[3];
                    $var_save->product_id = $value[4];
                    $var_save->image_id = $value[5];


                    $var_save->save();
                }
            }

            $tags = $request->tags;

            if (isset($tags)) {

                $tag_del_check = tag::where([
                    ['product_id', '=', $pro_id],
                ])->delete();

                $tag_arr = [];

                foreach ($tags as $key => $tag) {

                    $tag_arr = explode(',', $tag);
                }

                foreach ($tag_arr as $tag) {

                    $tag_save = new Tag;

                    $tag_save->name = $tag;
                    $tag_save->product_id = $pro_id;

                    $tag_save->save();
                }
            }

            return redirect()->back()->with('message', 'product Updated successfully');
        } else {

            return redirect()->back()->with('wrong', 'Something went wrong or product not Updated');
        }
    }

    public function getValue(Request $request)
    {
        $aids = $request->id;

        $output = '';

        foreach ($aids as $aid) {

            $labels = attribute::select('name', 'id')
                ->where('id', $aid)
                ->get();


            $values = attribute_value::select('name', 'id')
                ->where('attributes_id', $aid)
                ->get();


            $output .= '<div class="form-group row mb-3">';

            foreach ($labels as $label) {
                $output .= '<input type="text" class="form-control col-sm-3 col-form-label" value="' . $label['name'] . '" disabled>
                <input type="hidden" value="' . $label['name'] . '" name="vartion_selected[]" class="vartion_selected">
                <div class="col-sm-7"><select name="' . $label['name'] . '[]" class="form-control select2 varitons-val" multiple data-live-search="true">';
            }

            foreach ($values as $value) {

                $output .= '<option value="' . $value->name . '">' . $value->name . '</option>';
            }

            $output .= '</select>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>';
        }

        echo $output;
    }


    public function getColor(Request $request)
    {
        $cids = $request->id;

        $output = '';

        foreach ($cids as $cid) {

            $colors = color::select('name', 'id')
                ->where('id', $cid)
                ->get();

            foreach ($colors as $color) {

                $output .= '<input type="hidden" value="' . $color->name . '" name="allColors[]">';
            }
        }

        echo $output;
    }

    public function images_preview(Request $request)
    {
        $images  = $request->id;

        // return $images;

        $output = '';

        foreach ($images as $image) {

            $values = Gallery::select('location', 'id')
                ->where('id', $image)
                ->get();

            foreach ($values as $value) {

                $output .= '<div class="remove_pro_img">
                <img  width="100px" height="100px" src="' . asset('uploads/gallery/' . $value['location']) . '">
                <input type="hidden" name="product_img[]" value="' . $value->id . '">
                </div>';
            }
        }

        echo $output;
    }
    public function thum_image_preview(Request $request)
    {
        $image_thum  = $request->id;

        $values = Gallery::select('location', 'id')
            ->where('id', $image_thum)
            ->get();

        foreach ($values as $value) {

            $output = '<div class="remove_thum_img">
            <input type="hidden" name="product_thum_img" value="' . $value->id . '">
            <img width="100px" height="100px" src="' . asset('uploads/gallery/' . $value['location']) . '">
            </div>';
        }

        echo $output;
    }


    public function meta_image_preview(Request $request)
    {
        $meta_thum  = $request->id;


        $values = Gallery::select('location', 'id')
            ->where('id', $meta_thum)
            ->get();

        foreach ($values as $value) {

            $output = '<div class="remove_meta_img">
            <input type="hidden" name="meta_image" value="' . $value->id . '">
            <img width="100px" height="100px" src="' . asset('uploads/gallery/' . $value['location']) . '">
            </div>';
        }

        echo $output;
    }


    public function variant_image_preview(Request $request)
    {
        $image_thum  = $request->id;

        $values = Gallery::select('location', 'id')
            ->where('id', $image_thum)
            ->get();

        foreach ($values as $value) {

            $output = '<div class="remove_variant_preview"><img  width="100px" height="100px" src="' . asset('uploads/gallery/' . $value['location']) . '">
            <input type="hidden" name="vartion_selected_images[]" value="' . $value->id . '"></div>';
        }

        echo $output;
    }

    function thum_img(Request $request)
    {
        if ($request->ajax()) {
            $images = Gallery::paginate(10);

            return view('admin.oprations.products.choose_thum_img', ['images' => $images,]);
        }
    }


    function variant_img(Request $request)
    {
        if ($request->ajax()) {
            $images = Gallery::paginate(5);

            return view('admin.oprations.products.choose_variant_img', ['images' => $images,]);
        }
    }

    function meta_img(Request $request)
    {
        if ($request->ajax()) {
            $images = Gallery::paginate(10);

            return view('admin.oprations.products.choose_meta_img', ['images' => $images,]);
        }
    }

    function product_img(Request $request)
    {
        if ($request->ajax()) {
            $images = Gallery::paginate(5);

            return view('admin.oprations.products.choose_product_img', ['images' => $images,]);
        }
    }

    function variant(Request $request)
    {
        $values = $request->values;
        $custom_value = $request->custom_value;
        $colors = $request->colors;
        $price = $request->un_price;


        function combinations($values)
        {
            $result = [];
            $lenghtValue = count($values);
            if ($lenghtValue > 1) {

                $result = $values[0];
                $run = [];
                $tmp = [];


                for ($i = 1; $i < $lenghtValue; $i++) {

                    $j = 0;

                    $run = $values[$i];


                    foreach ($run as $entity) {

                        foreach ($result as $key => $first) {
                            $tmp[$j] = $first . '-' . $entity;
                            $j++;
                        }
                    }
                    $result = $tmp;
                }
                return $result;
            } else {
                $result = [];
                $j = 0;

                foreach ($values as $row) {

                    foreach ($row as $entity) {

                        $tmp[$j] = $entity;
                        $j++;
                    }

                    $result = $tmp;
                }

                return $result;
            }
        }


        function colorCombo($array, $colors)
        {
            $lenght = count($colors);
            $j = 0;
            $colorcombo = [];

            foreach ($array as  $att) {

                foreach ($colors as  $value) {

                    $colorcombo[$j] = $value . '-' . $att;

                    $j++;
                }
            }
            return $colorcombo;
        }


        function output($fileds, $price)
        {
            $arr = $fileds;

            $rate = $price;
            $output = '';
            $output .= '<table class="table table-bordered custab mt-5">';

            $output .= '<thead>
                            <tr>
                                <th class="text-left">Variant</th>
                                <th class="text-left">Variant Price</th>
                    
                            </tr>
                        </thead><tbody>';

            foreach ($arr as $filed) {

                $output .= '<tr>
                                <td class="text-left" style="cursor:pointer;" class="clk-rw collapsed" id="item-id" data-toggle="collapse" href="#' . $filed . '" aria-expanded="false" aria-controls="collapseExample">' . $filed . '<input name= "variant[]" type="hidden" value="' . $filed . '"/></div></td>
                                <td class="text-left"><input name= "var_price[]" type="number" value="0.01" min="0.01" value="" required class="form-control" /></td>
                            </tr>';

                $output .= ' <tr>
                <td colspan="3" class="collapse-table collapse" id="' . $filed . '" >
                    <table class="table custab">
                        <tbody>
                            <tr>
                                <th style="width: 100px;">SKU</th>
                                <td colspan="5" style="text-align: left;"><input name= "var_sku[]" type="text" value="" class="form-control"/></th>
    
                            </tr>
                            <tr>
                                <th style="width: 100px;">Quantity</td>
                                <td colspan="5" style="text-align: left;"><input name= "var_qty[]" type="number" step="1" min="0" value="0" class="form-control" required/></td>
    
                            </tr>
                            <tr>
                                <th style="width: 100px;">Image</td>
                                <td colspan="5" style="text-align: left;">
                                    <button type="button" value="' . $filed . '" name="picture_' . $filed . '" class="btn btn-warning btn-sm my-1 Variant_choosen" data-target="#Variant_Image_Modal" data-toggle="modal">Borwse</button>
                                    <div id="' . $filed . '"><input type="hidden" name="vartion_selected_images[]" value=""></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>';
            }

            $output .= '</table>';

            return $output;
        }



        if (!empty($values) && !empty($colors)) {

            $combo = combinations($values);

            $colorCombo = colorCombo($combo, $colors);

            $output = output($colorCombo, $price);

            return $output;
        } elseif (!empty($values)) {

            $combo = combinations($values);

            $output = output($combo, $price);

            return $output;
        } elseif (!empty($colors)) {

            $output = output($colors, $price);
            return $output;
        }

        if (!empty($custom_value)) {
            $output = output($custom_value, $price);
            return $output;
        }
    }
}
