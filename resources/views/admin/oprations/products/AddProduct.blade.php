@include('admin.layouts.app')

<div class="main-container multivendors" id="container">

        @include('admin.layouts.sidebar')

        <div id="content" class="main-content">

            <div class="d-flex justify-content-between mb-10 mt-30">
                
                <div class="page-heading">

                    <h6>Products <span>/ Add Product </span></h6>

                </div>

            </div>

            <div class="allstd-page addblog" id="navbarscroll">

            @if(session('wrong'))
            
                <span>{{session('wrong')}}</span>
            
            @endif


            @if(session('message'))

                <span>{{session('message')}}</span>

            @endif


            @if(count($errors) > 0)
    
                @foreach ($errors->all() as $error)

                    <span>{{$error}}</span>

                @endforeach

            @endif
                
                <form class="row" id="create_product_form" action="{{ route('admin.AddProduct') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="col-md-8">
    
                        <div class="pdt-infor">

                            <h4 class="pb-2">Product Information</h4>

                            <div class="form-group row mb-3">
                                <label for="title" class="col-sm-3 col-form-label">Product Name<span>*</span></label>
                                <div class="col-sm-9">
                                    <input name="name" value="" type="text" class="form-control" placeholder="Product Name">
                                </div>
                            </div>
                            
                            <div class="form-group row mb-3">
                                <label for="title" class="col-sm-3 col-form-label">Category<span>*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" name="cat_id" required>

                                        <option value="" disabled selected>--Select Cateory--</option>

                                        @foreach($categories as $category)

                                            <option value="{{$category->id}}">{{$category->name}}</option>

                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row mb-3">
                                <label for="title" class="col-sm-3 col-form-label">Brand</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" name="brand_id">

                                        <option value="" disabled selected>--Select Brand--</option>

                                        @foreach($brands as $brand)
                    
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                    
                                        @endforeach                    

                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row mb-3">
                                <label for="title" class="col-sm-3 col-form-label">Tags<span>*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="tags[]" data-role="tagsinput" class="form-control" required>
                                    <small id="tag" class="form-text text-muted"> This is used for search. Input
                                            those words by which cutomer can find this product.</small>
                                </div>
                            </div>
                            
                            <div class="form-group row mb-3">
                                <label for="title" class="col-sm-3 col-form-label">Barcode</label>
                                <div class="col-sm-9">
                                    <input type="text" name="barcode" class="form-control" value=""/>
                                </div>
                            </div>
                            
                            <div class="form-group row mb-3">
                                <label for="slug" class="col-sm-3 col-form-label">Publish</label>
                                    <div class="col-sm-9">
                                        <label class="switch">
                                            <input name="get_status" type="checkbox" value="1" checked="">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                            </div>
                            
                        </div>

                        <div class="pdt-image">

                            <h4 class="pb-2">Product Images</h4>

                            <div class="form-group row">
                                
                                <label for="banner" class="col-sm-3 col-form-label">Thumbnail Image<span>*</span><small>(600x600)</small></label>
                                
                                <div class="col-sm-9">
                                    
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Thumbnail_Image_Modal">Browse</button>

                                </div>
                                
                            
                            </div>

                            <div class="thum_image_previwe row">

                            </div>
                            
                            <div class="form-group row">

                                <label for="banner" class="col-sm-3 col-form-label">Gallery Images</label>
                                
                                <div class="col-sm-9">
                                    
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Product_Image_Modal">Browse</button>

                                </div>

                            </div>

                            <div class="pro_image_previwe row">

                            </div>

                        </div>

                        <div class="pdt-video">
                            <h4 class="pb-2">Product Videos</h4>
                            <div class="form-group row mb-3">
                                <label for="title" class="col-sm-3 col-form-label">Video Url</label>
                                <div class="col-sm-9">
                                    <input name="video_url" value="" type="text" class="form-control">
                                </div>
                            </div>
                            
                        </div>

                        <div class="pdt-variation">

                            <h4 class="pb-2">Product Variation</h4>

                            <div class="form-group row mb-3">

                                <input type="text" class="form-control col-sm-3 col-form-label" value="Colors" disabled="">
                                
                                <div class="col-sm-7">

                                    <select name="color[]" id="color" class="form-control select2" multiple>

                                        @foreach($colors as $color)

                                            <option value="{{$color->name}}">{{$color->name}}</option>

                                        @endforeach

                                    </select>

                                </div>

                                <div class="col-sm-2"></div>

                            </div>

                            <div class="form-group row mb-3">

                                <input type="text" class="form-control col-sm-3 col-form-label" value="Attributes" disabled="">
                                
                                <div class="col-sm-7">

                                    <select name="attributes[]" id="attributes" class="form-control select2" multiple>

                                        @foreach($attributes as $attribute)

                                            <option value="{{$attribute->id}}">{{$attribute->name}} </option>

                                        @endforeach

                                    </select>

                                </div>

                                <div class="col-sm-2"></div>

                            </div>

                            <small>Choose the attributes of this product and then input values of each attribute</small>

                            <div id="attValue">

                            </div>

                            <div class="form-group row mb-3">

                                <input type="text" class="form-control col-sm-3 col-form-label" value="Custom variant" disabled="">
                                
                                <div class="col-sm-7">

                                    <input type="text" class="custom_attValue form-control" value="">

                                </div>

                                <div class="col-sm-2"></div>

                            </div>

                        </div>

                        <div class="pdt-price">

                            <h4 class="pb-2">Product price + stock</h4>

                            <div class="form-group row mb-3">

                                <label for="banner" class="col-sm-3 col-form-label">Price<span>*</span></label>
                                
                                <div class="col-sm-9">
                                    <input type="number" name="unit_price" step="0.01" value="0.01" min="0.01" class="form-control" id="un_price">
                                </div>
                            
                            </div>

                            <div class="form-group row mb-3">

                                <label for="slug" class="col-sm-3 col-form-label">Unit Type<span>*</span></label>

                                <div class="col-sm-9">
                                    <input type="text" name="unit_type" class="form-control" id="slug" placeholder="Unit (e.g. KG, Pc etc)">
                                </div>

                            </div>

                            <div class="form-group row mb-3">

                                <label for="banner" class="col-sm-3 col-form-label">Quantity<span>*</span></label>

                                <div class="col-sm-9">
                                    <input type="number" type="number" name="quantity" step="1" value="0" min="0" class="form-control">
                                </div>

                            </div>

                            <div class="form-group row mb-3">
                                <label for="banner" class="col-sm-3 col-form-label"> SKU </label>
                                <div class="col-sm-9">
                                    <input type="text" name="sku" class="form-control" id="slug" placeholder="SKU">
                                </div>
                            </div>

                            <div id="show_list_variant">

                            </div>
                            
                            <div id="show_custom_variant">

                            </div>

                            
                        </div>

                        <div class="pdt-desc">
                            <h4 class="pb-2">Product Description</h4>
                            <div class="form-group row mb-3">
                                <label for="desc" class="col-form-label">Description <span>*</span></label>
                            </div>
                            <div class="form-group row mb-3">
                                <textarea id="description" name="description" require>
                    
                                </textarea>
                            </div>
                        </div>

                        <div class="pdt-spec">
                            <h4 class="pb-2">PDF Specification</h4>
                            <h4 class="pb-2">PDF Specification</h4>
                            <div class="form-group row mb-3">
                                <label for="title" class="col-sm-3 col-form-label">Product PDF</label>
                                <div class="col-sm-9">
                                    <input name="pdf" value="" type="file" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="pdt-spec">

                            <h4 class="pb-2">SEO Meta Tags</h4>

                            <div class="form-group row mb-3">
                                <label for="title" class="col-sm-3 col-form-label">Mata Titel</label>
                                <div class="col-sm-9">
                                    <input name="Meta_titel" class="form-control" value="">
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="title" class="col-sm-3 col-form-label">Mata Description</label>
                                <div class="col-sm-9">
                                    <textarea name="Meta_description" class="form-control">...</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                
                                <label for="banner" class="col-sm-3 col-form-label">Meta Image</label>
                                
                                <div class="col-sm-9">
                                    
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Meta_Image_Modal">Browse</button>

                                </div>
                                
                            
                            </div>

                            <div class="meta_image_preview row">

                            </div>

                        </div>
                        
                        <button type="button" id="Submit_form" class="btn btn-warning">Save</button>
                    
                    </div>

                    
                </form>
                
                    <div class="modal fade" id="Thumbnail_Image_Modal" tabindex="-1" role="dialog" aria-labelledby="Thumbnail_Image_Modal" aria-hidden="true" style="padding:0;">

                        @include('admin.oprations.products.choose_thum_img')
    
                    </div>

                    <div class="modal fade" id="Product_Image_Modal" tabindex="-1" role="dialog" aria-labelledby="Product_Image_Modal" aria-hidden="true" style="padding:0;">

                        @include('admin.oprations.products.choose_product_img')
    
                    </div>
                    
                    <div class="modal fade" id="Meta_Image_Modal" tabindex="-1" role="dialog" aria-labelledby="Meta_Image_Modal" aria-hidden="true" style="padding:0;">

                        @include('admin.oprations.products.choose_meta_img')
    
                    </div>
                    
                    <div class="modal fade" id="Variant_Image_Modal" tabindex="-1" role="dialog" aria-labelledby="Variant_Image_Modal" aria-hidden="true" style="padding:0;">

                        @include('admin.oprations.products.choose_variant_img')
    
                    </div>
                
            </div>

        </div>

</div>

<script defer>




        CKEDITOR.replace( 'description' ,{
            filebrowserUploadUrl:"{{route('admin.image_upload',['_token'=>csrf_token()])}}",
            filebrowserUploadMethod:"form"
        });

        let variant_img = '';

    $(document).ready(function() {

        $('.select2').select2();

        var Attri = [];

        $('body').on('change','#attributes',function(){
            
            var atts_id = $(this).val()
            
            if (atts_id.length === 0) {
                
                $('#attValue').html('&nbsp;')
                
            }
            else{
               
                $.ajax({

                    url: '/admin/product/getValue',

                    type: 'post',

                    data: {

                        " _token": '{{csrf_token()}}',
                        "id": atts_id,

                    },
                    success: function(result) {

                        $('#attValue').html(result)
                        $(' .select2').select2()

                    }

                })
            }

            var selected = $("#attributes :selected").text();

                Attri = selected.split(" ");

                Attri.pop();

        })


        $(' #Submit_form').click(function() {
            $('#create_product_form').submit();
        });

            $('body').on('change','.varitons-val',function() {

                var values = [];

                var un_price = $('#un_price').val();

                if (un_price === "") {

                    un_price = 0;
                }

                Attri.forEach(element => {


                    var jump = [];

                    $('select[name="' + element + '[]"] option:selected').each(function() {

                    jump.push($(this).val());

                    });

                    values.push(jump);

                })

                values = values.filter(value => value.length != 0);

                var colors = $('#color').val();

                if (colors === "") {

                    $.ajax({

                        url: '/admin/product/getVariant',

                        type: 'post',

                        data: {

                                " _token": '{{csrf_token()}}',
                                "values": values,
                                "un_price": un_price,

                            },
                
                        success: function(result) {

                            $('#show_list_variant').html(result);

                            }

                        })

                    } else 
                    {

                        $.ajax({

                                url: '/admin/product/getVariant',

                                type: 'post',

                                data: {

                                        " _token": '{{csrf_token()}}',
                                        "values": values,
                                        "colors": colors,
                                        "un_price": un_price,

                                    },
                                success: function(result) {

                                    $('#show_list_variant').html(result);

                                }
                        })

                    }


                })


            $(' body').on('click','.Variant_choosen', function() {
                    let variant_name = $(this).val()
                    variant_img = variant_name
            })



            // $('#color').select2();

            $('#color').change(function() {


                var cid = $('#color').val();

                var colors = $('#color').val();

                var un_price = $('#un_price').val();

                if (un_price === '') {

                    un_price = 0;

                }

                $.ajax({

                    url: '/admin/product/getVariant',

                    type: 'post',

                    data: {

                        " _token": '{{csrf_token()}}',
                        "colors": colors,
                        "un_price": un_price,

                    },
                    success: function(result) {

                        $('#show_list_variant').html(result);

                    }
                })

            })

            $(document).on('click', ' .product_links .pagination a', function(event) {

                event.preventDefault();

                var page = $(this).attr('href').split('page=')[1];

                pro_fetch_data(page);

            });


            function pro_fetch_data(page) {

                $.ajax({

                    url: "/admin/product/get_pro_img?page=" + page,
                    success: function(result) {

                        $('#Product_Image_Modal').html(result);
                    }

                });
            }



            $(document).on('click', '.thum_links .pagination a', function(event) {

                event.preventDefault();

                var page = $(this).attr('href').split('page=')[1];

                thum_fetch_data(page);

            });

            function thum_fetch_data(page) {
                $.ajax({

                    url: "/admin/product/get_thum_img?page=" + page,
                    success: function(result) {

                        $('#Thumbnail_Image_Modal').html(result);
                    }

                });
            }

            $(document).on('click', '.variant_links .pagination a', function(event) {

                event.preventDefault()

                var page = $(this).attr('href').split('page=')[1];

                variant_fetch_data(page);

            })

            function variant_fetch_data(page) {
                $.ajax({

                    url: "/admin/product/get_variant_img?page=" + page,
                    success: function(result) {

                        $('#Variant_Image_Modal').html(result);
                    }

                })
            }

            $(document).on('click', '.meta_links .pagination a', function(event) {

                event.preventDefault();

                var page = $(this).attr('href').split('page=')[1];

                meta_fetch_data(page);

            });

            function meta_fetch_data(page) {

                $.ajax({

                    url: "/admin/product/get_meta_img?page=" + page,
                    success: function(result) {

                        $('#Meta_Image_Modal').html(result);
                    }

                })

            }

        $('.done').click(function() {

            $('.pro_img').load(' .pro_img');
        });

        $('.custom_attValue').change(function() {

            custom_values = $(this).val();

            var custom_arrValues = custom_values.split(',')

            console.log(custom_arrValues);

            var un_price = $('#un_price').val();

            if (un_price === "") {

                un_price = 0;
            }

            console.log(un_price);


            $.ajax({

                url: '/admin/product/getVariant',

                type: 'post',

                data: {
                    " _token": '{{csrf_token()}}',

                    "custom_value": custom_arrValues,
                    "un_price": un_price,
                },

                success: function(result) {

                    console.log(result);

                    $('#show_custom_variant').html(result);
                    

                }

            });

        });

    })

    var add_image = [];

        function Product_Image(id) {

            var Add_id = id;

            let isCheck = add_image.includes(Add_id);

            if (isCheck) {

                alert('You selected this image already');

            } else {

                add_image.push(Add_id);

            }


            $.ajax({

                url: '/admin/product/images_preview',

                type: 'post',

                data: {
                    " _token": '{{csrf_token()}}',

                    "id": add_image,
                },

                success: function(result) {

                    $(' .pro_image_previwe').html(result);

                    $('.pro_image_previwe').click(function() {

                        $(this).remove();

                    });

                }

            });

        }

    function Thumbnail_Image(id) {

            console.log(id)

            var thum_id = id;

            $.ajax({

                url: '/admin/product/thum_image_preview',

                type: 'post',

                data: {
                    " _token": '{{csrf_token()}}',

                    "id": thum_id,
                },

                success: function(result) {

                    $(' .thum_image_previwe').html(result);

                    $('.remove_thum_img').click(function() {

                        $(this).remove();
                        $('.thum_image_previwe').html('<input type="hidden" name="product_thum_img" value="">');

                    });

                }

            });


    }

    function Meta_Image(id) {

            var Meta_id = id;

            $.ajax({ 

                url: '/admin/product/get_meta_img',

                type: 'post',

                data: {
                    " _token": '{{csrf_token()}}',

                    "id": Meta_id,
                },

                success: function(result) {

                    $(' .meta_image_preview').html(result)

                    $('.remove_meta_img').click(function() {

                        $(this).remove();
                        $('.meta_image_preview').html('<input type="hidden" name="meta_image" value="">');
                        

                    })

                }

            })


        }


    function Variant_Image(id) {

            var fetch = variant_img;

            console.log(id);

            $.ajax({

                url: '/admin/product/variant_image_preview',

                type: 'post',

                data: {
                    " _token": '{{csrf_token()}}',

                    "id": id,
                },

                success: function(result) {

                    $('#' + fetch).html(result);
                    console.log(result);

                    $('.remove_variant_preview').click(function() {

                        $(this).remove();
                        $('#' + fetch).html('<input type="hidden" name="vartion_selected_images[]" value="">');

                    });

                }

            });


        }


</script>
<script>
Dropzone.options.uploadForm = { 

    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 100,
    maxFiles: 10,
    maxFilesize: 5,
    acceptedFiles: ".jpeg,.jpg,.png",
    
    }
</script>