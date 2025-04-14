@extends('admin.layouts.app')
@section('title', 'Add Product')
@section('sidebar_content')
    <div class="box no-shadow box-bordered border-light" id="image">

        <h5 class="pro-img-head">Product Image</h5>


        <div class="form-group box-footer">
            <input type="file" class="dropify" name="image" id="main_image"
                {{ $data != null ? 'data-default-file = ' . asset($data->image) : '' }}>
            <span id="imageerror" class="d-none error-span "></span>
        </div>

    </div>
    <div class="box no-shadow box-bordered border-light">
        <h5 class="pro-img-head">Product Gallery</h5>
        <input type="hidden" id="productimages" value="{{ $data ? ($data->images ? json_encode($data->images) : '') : '' }}">
        <div class="file-loading">
            <input id="image-file" name="input-ficons-5[]" multiple type="file">
        </div>

    </div>
@endsection
@section('content')
    <div class="container-full">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">{{ $data == null ? 'Add' : 'Update ' }} Product
                        {{ $data == null ? '' : '#' . $data->id }}</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#"><i class="mdi mdi-home-outline">Product Management</i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ $data == null ? 'Add' : 'Update ' }} Product</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">{{ $data == null ? 'Upload' : 'Update ' }} Product Details</h4>
                        </div>
                        <div class="box-body">

                            <!-- /.box-header -->
                            <form class="form" method="post"
                                action="{{ $data == null ? route('product.store') : route('product.update', $data->id) }}"
                                enctype="multipart/form-data" id="productform" id="file-upload">
                                @csrf
                                {{ $data != null ? method_field('PUT') : method_field('POST') }}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="font-weight-700 font-size-16">Product Title</label>

                                                <input type="text" id="name" name="name"
                                                    value="{{ $data == null ? old('name') : $data->name }}"
                                                    class="form-control" placeholder="Product Title" required>
                                                <span id="nameerror" class="d-none error-span "></span>
                                            </div>
                                        </div>
                                        @php
                                            $category = App\Models\Category::all();
                                        @endphp
                                        <!--/span-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-700 font-size-16">Category</label>
                                                <select class="form-control" id="category_id" name="category_id"
                                                    data-placeholder="Choose a Category" tabindex="1">
                                                    @foreach ($category as $item)
                                                        <option
                                                            {{ $data != null ? ($data->category_id == $item->id ? 'selected' : '') : '' }}
                                                            value="{{ $item->id }}">{!! $item->getParentsNames() !!}</option>
                                                    @endforeach

                                                </select>
                                                <span id="categoryerror" class="d-none error-span "></span>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="font-weight-700 font-size-16">SKU</label>

                                                <input type="text" id="sku" name="sku"
                                                    value="{{ $data == null ? old('sku') : $data->sku }}"
                                                    class="form-control" placeholder="Product SKU">
                                                <span id="sku" class="d-none error-span "></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="font-weight-700 font-size-16">Price</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-money"></i></div>

                                                    <input type="number" id="price" name="price" step="0.01"
                                                        value="{{ $data == null ? old('price') : $data->price }}"
                                                        class="form-control" placeholder="270.00">
                                                    <span id="priceerror" class="d-none error-span "></span>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="font-weight-700 font-size-16">Cut Price</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-money"></i></div>

                                                    <input type="number" id="cut_price" name="cut_price" step="0.01"
                                                        value="{{ $data == null ? old('cut_price') : $data->cut_price }}"
                                                        class="form-control" placeholder="270.00">
                                                    <span id="priceerror" class="d-none error-span "></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="font-weight-700 font-size-16">Discount</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-cut"></i></div>
                                                    <input type="number" id="discount" name="discount" step="0.01"
                                                        value="{{ $data == null ? old('discount') : $data->discount }}"
                                                        class="form-control" placeholder="Type '50' for 50%" max="100"
                                                        min="0">
                                                    <span id="discounterror" class="d-none error-span "></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="font-weight-700 font-size-16">Stock (in units)</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-cut"></i></div>
                                                    <input type="number" id="stock" name="stock" step="0.01"
                                                        value="{{ $data == null ? old('discount') : $data->stock }}"
                                                        class="form-control" placeholder="10">
                                                    <span id="stockerror" class="d-none error-span "></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-700 font-size-16">Trending Product</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-cut"></i></div>
                                                    <select name="trending" class="form-control" id="trending">
                                                        <option value="1"
                                                            {{ $data != null ? ($data->trending == 1 ? 'selected' : '') : '' }}>
                                                            Yes</option>
                                                        <option value="0"
                                                            {{ $data != null ? ($data->trending == 0 ? 'selected' : '') : '' }}>
                                                            No</option>
                                                    </select>
                                                    <span id="trendingerror" class="d-none error-span "></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-700 font-size-16">Deal</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-cut"></i></div>
                                                    <select name="deals" class="form-control" id="deal">
                                                        <option value="1"
                                                            {{ $data != null ? ($data->deals == 1 ? 'selected' : '') : '' }}>
                                                            Yes</option>
                                                        <option value="0"
                                                            {{ $data != null ? ($data->deals == 0 ? 'selected' : '') : '' }}>
                                                            No</option>
                                                    </select>
                                                    <span id="dealerror" class="d-none error-span "></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-700 font-size-16">Default Color</label>
                                                <select class="form-control" id="default_color" name="default_color" tabindex="1">
                                                    <option value="">Select Default Color</option>
                                                    @foreach($attribute_value as $key => $value)
                                                    <option value="{{ $value->name }}"
                                                        {{ $data != null ? (strtoupper($data->default_color) == $value->name ? 'selected' : '') : '' }}
                                                    >{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-700 font-size-16">Featured Product</label>
                                                <div class="radio-list">
                                                    <label class="radio-inline p-0 mr-10">
                                                        <div class="radio radio-info">
                                                            <input type="radio" name="featured" id="featured_yes"
                                                                value="1"
                                                                {{ $data != null ? ($data->featured == 1 ? 'checked' : '') : '' }}>
                                                            <label for="featured_yes">Yes</label>
                                                        </div>
                                                    </label>
                                                    <label class="radio-inline">
                                                        <div class="radio radio-info">
                                                            <input type="radio" name="featured" id="featured_no"
                                                                value="0"
                                                                {{ $data != null ? ($data->featured == 0 ? 'checked' : '') : '' }}>
                                                            <label for="featured_no">No</label>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-700 font-size-16">Status</label>
                                                <div class="radio-list">
                                                    <label class="radio-inline p-0 mr-10">
                                                        <div class="radio radio-info">
                                                            <input type="radio" name="status" id="radio1"
                                                                value="1"
                                                                {{ $data != null ? ($data->status == 1 ? 'checked' : '') : '' }}>
                                                            <label for="radio1">Published</label>

                                                        </div>
                                                    </label>
                                                    <label class="radio-inline">
                                                        <div class="radio radio-info">
                                                            <input type="radio" name="status" id="radio2"
                                                                value="0"
                                                                {{ $data != null ? ($data->status == 0 ? 'checked' : '') : '' }}>
                                                            <label for="radio2">Draft</label>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-700 font-size-16">New Product</label>
                                                <div class="radio-list">
                                                    <label class="radio-inline p-0 mr-10">
                                                        <div class="radio radio-info">
                                                            <input type="radio" name="new_product" id="new_product_yes"
                                                                value="1"
                                                                {{ $data != null ? ($data->new_product == 1 ? 'checked' : '') : '' }}>
                                                            <label for="new_product_yes">Yes</label>
                                                        </div>
                                                    </label>
                                                    <label class="radio-inline">
                                                        <div class="radio radio-info">
                                                            <input type="radio" name="new_product" id="new_product_no"
                                                                value="0"
                                                                {{ $data != null ? ($data->new_product == 0 ? 'checked' : '') : '' }}>
                                                            <label for="new_product_no">No</label>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="font-weight-700 font-size-16">Product Short Description</label>
                                                <textarea value={{ $data == null ? old('short_desc') : $data->short_desc }} id="short_desc" name="short_desc"
                                                    class="editor" required>{{ $data == null ? old('short_desc') : $data->short_desc }}</textarea>
                                                <span id="short_descerror" class="d-none error-span"></span>

                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="font-weight-700 font-size-16">Product
                                                    Short Description</label>
                                                <textarea value={{ $data == null ? old('description') : $data->description }} id="description" name="description"
                                                    class="editor" required>{{ $data == null ? old('description') : $data->description }}</textarea>
                                                <span id="descriptionerror" class="d-none error-span"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Product Link</label>
                                                <input type="text" disabled value="{{ $data == null ? old('product_link') : $data->product_link }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="variation-repeater" class="repeater">
                                                <h5>Variation</h5>
                                                <hr>
                                                <div class="items" data-group="variation">
                                                    @if ($data)
                                                        @if ($data->variation->isNotEmpty())
                                                            @foreach ($data->variation as $variation)
                                                                @php
                                                                    $attr = App\Models\AttributeValue::find(
                                                                        $variation->pivot->attribute_value_id,
                                                                    );
                                                                
                                                                @endphp
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-3 mb-3">
                                                                            <label for="attrbuite">Attribute</label>
                                                                            <input type="text" value="{{ $attr->attribute->name }}"
                                                                                class="form-control" disabled>
                                                                        </div>
                                                                        <div class="col-md-3 mb-3">
                                                                            <label for="attrbuite">Attribute Value</label>
                                                                            <input type="text" value="{{ $attr->name }}"
                                                                                class="form-control" disabled>
                                                                        </div>

                                                                        <div class="col-md-3 mb-3">
                                                                            <label for="price">Addon</label>
                                                                            <input type="number" step="0.01"
                                                                                name="old_variation[addon][{{$variation->pivot->id}}]"
                                                                                value="{{ $variation->pivot->addon }}"
                                                                                class="form-control">
                                                                        </div>
                                                                        <div class="col-md-3 mb-3">
                                                                            <label for="stock">Stock</label>
                                                                            <input type="number"
                                                                                name="old_variation[stock][{{$variation->pivot->id}}]"
                                                                                value="{{ $variation->pivot->stock }}"
                                                                                class="form-control">
                                                                        </div>
                                                                        @if($attr->attribute->is_image == 1)
                                                                        <div class="col-md-4">
                                                                            <label for="image">Image</label>
                                                                            <input type="file" name="old_variation[image][]"
                                                                                value="{{ $variation->pivot->image }}"
                                                                                class="dropify"
                                                                                data-default-file="{{ asset($variation->pivot->image) }}"
                                                                                disabled>

                                                                        </div>
                                                                        <div class="col-md-8 mb-3 variation-file-loading-col">
                                                                            <label for="image">Gallery Images</label>
                                                                            <div class="">
                                                                                <input name="old_variation[gallery][{{$variation->pivot->id}}][]" data-images="{{ $variation->pivot->images }}" class="old-variation-image-file" data-id="{{ $variation->pivot->id }}" multiple type="file">
                                                                            </div>
                                                                        </div>
                                                                        @endif

                                                                        <div class="col-md-12">
                                                                            <div
                                                                                class="d-flex justify-content-end align-items-center h-full">
                                                                                <button type="button"
                                                                                    class="waves-effect waves-light btn btn-sm btn-rounded btn-primary-light mb-5 del"
                                                                                    onclick="deleteVariation($(this).parent().parent().parent().parent(),{{ $variation->pivot->id }})">
                                                                                    <i class="ti-trash"></i>
                                                                                    Delete</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <hr>
                                                            @endforeach
                                                        @endif

                                                    @endif
                                                    <div class="repeater">
                                                        <div class="items">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-3 mb-3">
                                                                        <label for="attrbuite">Attribute</label>
                                                                        <select name="variation[attrbuite][]"
                                                                            class="attr form-control select2"
                                                                            onchange="attributeChange(this)" required>
                                                                            <option value=null hidden selected>Select Attribute
                                                                            </option>
                                                                            @foreach ($attributes as $attribute)
                                                                                <option value="{{ $attribute->id }}">
                                                                                    {{ $attribute->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-3 mb-3">
                                                                        <label for="price">Attribute Value</label>
                                                                        <select name="variation[attrbuite_values][]"
                                                                            class="form-control select2">
                                                                            <option value=null hidden>Select Attribute Value
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-3 mb-3">
                                                                        <label for="price">Addon</label>
                                                                        <input type="number" name="variation[addon][]"
                                                                            step="0.01" value="0" class="form-control" required>
                                                                    </div>
                                                                    <div class="col-md-3 mb-3">
                                                                            <label for="stock">Stock</label>
                                                                            <input type="number"
                                                                                name="variation[stock][]"
                                                                                class="form-control" value="0">
                                                                        </div>
                                                                    <div class="col-md-4 dropify-wrapper-section">
                                                                        <label for="image">Image</label>
                                                                        <input type="file" name="variation[image][]"
                                                                            class="dropify">
                                                                    </div>
                                                                    <div class="col-md-8 mb-3 variation-file-loading-col">
                                                                        <label for="image">Gallery Images</label>
                                                                        <div class="file-loading variation-file-loading">
                                                                            <input id="variation-image-file" name="variation[gallery][0][]" class="variation-image-file" multiple type="file">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="d-flex justify-content-center align-items-center h-full">
                                                                            <button type="button"
                                                                                class="waves-effect waves-light btn btn-sm btn-rounded btn-primary-light mb-5 del"
                                                                                onclick="deleteRepeatVariation($(this))">
                                                                                <i class="ti-trash"></i> Delete
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <button type="button" class="btn btn-primary repeater-add-btn">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions mt-10">
                                    <button type="button" id="saveSubmit" class="btn btn-primary">
                                        <i class="fa fa-check"></i> Save /
                                        Add</button>
                                    <button type="button" class="btn btn-danger">Cancel</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@push('css')

    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all"
        rel="stylesheet" type="text/css" />

    <style>
        .file-caption .input-group {
            display: none;
        }

        .dropzone {
            background: white;
            border-radius: 5px;
            border: 2px dashed #fd683e;
            border-image: none;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        h5.pro-img-head {
            padding: 10px 10px;
            margin: 0;
        }
    </style>
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css"
        crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/fileinput.min.js"></script>
    <script>
        var productImages = $('#productimages').val().length > 0 ? JSON.parse($('#productimages').val()) : []
        var urls = [],
            initialPreviewConfig = [],
            initialPreviewAsData = false;
        if (Object.keys(productImages).length > 0) {
            productImages.forEach(function(obj, index) {

                urls.push(window.location.origin + obj);

                initialPreviewConfig.push({
                    caption: obj.split('/').slice(-1)[0],
                    downloadUrl: window.location.origin + obj,
                    url: "{{ route('product.delete_img') }}",
                    key: '{{ $data ? $data->id : '0' }}',
                    extra: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        path: obj
                    }
                })
            });

            initialPreviewAsData = true

        }



        var formData = new FormData();
        $("#image-file").fileinput({
            showUpload: false,
            uploadUrl: "{{ $data == null ? route('product.store') : route('product.update', $data->id) }}",
            theme: 'fa',
            initialPreview: urls,
            initialPreviewAsData: initialPreviewAsData,
            initialPreviewConfig: initialPreviewConfig,
            uploadAsync: false,
            browseOnZoneClick: true,
            initialPreviewShowDelete: true,
            dropZoneEnabled: true,
            overwriteInitial: false,
            maxFileSize: 20000000,
            maxFilesNum: 20,
            uploadExtraData: function() {
                return {
                    created_at: $('.created_at').val()
                };
            }
        }).on('filebatchselected', function(event, files) {
            $.each(files, function(index, value) {
                formData.append('productgalleries[]', value['file'])
            });
        });

        $(".variation-image-file").fileinput();
    </script>
    <script>
        $(document).ready(function() {

            $('#saveSubmit').click(function(e) {
                removeAllErrors();
                var productForm = new FormData($('#productform').get(0));
                formData.forEach(function(value, key) {
                    productForm.append('gallery[]', value)
                });

                if ($('#main_image')[0].files[0]) {
                    productForm.append('image', $('#main_image')[0].files[0])
                }

                console.log(productForm);
                
                $.ajax({

                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(evt) {
                            loaderShow()
                        }, false);
                        return xhr;
                    },
                    method: 'post',
                    processData: false,
                    contentType: false,
                    cache: false,

                    data: productForm,
                    enctype: 'multipart/form-data',
                    url: $('#productform').attr('action'),
                }).done(function(response) {
                    loaderHide()
                    if ($('input[name="_method"]').val() == 'POST') {
                        $('#image-file').fileinput('clear');
                        $(".dropify").trigger("click");
                    }
                    swal("SUCCESS!", "Product Added Successfully", "success");


                }).fail(function(jqxhr, textStatus, error) {

                    $.each(jqxhr.responseJSON.errors, function(key, value) {
                        $('#' + key).addClass('error-control');
                        $("#" + key + 'error').text(value[0]);
                        $("#" + key + 'error').removeClass('d-none');
                    });
                    loaderHide()
                    swal("ERROR!", jqxhr.responseJSON.message, "error");
                });



            });

            var gallery_counter = 0;

            $('.repeater .repeater-add-btn').click(function() {
                gallery_counter++;
                var entryClone = $(this).siblings('.items').first().children().last().clone();

                $(entryClone).find('.dropify-wrapper').remove();
                var newFileInput = $('<input>', {
                    type: 'file',
                    class: 'dropify',
                    name: 'variation[image][]'
                });
                $(entryClone).find('.dropify-wrapper-section').append(newFileInput);


                $(this).siblings('.items').first().append(entryClone);

                newFileInput.dropify({
                    messages: {
                        default: 'Drag and drop a file here or click',
                        replace: 'Drag and drop or click to replace',
                        remove: 'Remove',
                        error: 'Ooops, something wrong happened.'
                    }
                });

                $(entryClone).find('.select2-container').remove();
                $(entryClone).find('.select2').removeClass('select2-hidden-accessible');
                $('.select2').select2();

                $(entryClone).find('.file-input').remove();
                var newGalleryInput = $('<input>', {
                    type: 'file',
                    class: 'variation-image-file',
                    name: 'variation[gallery]['+gallery_counter+'][]',
                    multiple: 'multiple'
                });
                $(entryClone).find('.variation-file-loading-col').append(newGalleryInput);
                newGalleryInput.fileinput();

            });

        });

        function attributeChange(elem) {
            let value = $(elem).find(':selected').val();
            let attr = $(elem).parent().next().find('select[name="variation[attrbuite_values][]"]');
            $.ajax({
                url: "{{ route('get.attributes') }}",
                method: 'GET',
                data: {
                    value: value
                },
                success: function(response) {

                    if (response.status) {
                        attr.html('');
                        response.data.forEach(item => {
                            let option = new Option(item.name, item.id);
                            attr.append(option);
                        });
                    } else {
                        swal("ERROR!", "This attribute does not have attribute values", "error");
                    }
                },
                error: function(xhr) {
                    console.error('AJAX Error Response:', xhr.responseJSON);
                    swal("ERROR!", "An error occurred while fetching attribute values", "error");
                }
            });
        }

        function deleteRepeatVariation(a){
            $(a).parent().parent().parent().remove();
            $('.variation-image-file').each(function(a, b){
                console.log($(this).attr('name', 'variation[gallery]['+a+'][]'));
            });
            gallery_counter = $('.variation-image-file').length - 1;
        }

        if($('.old-variation-image-file').length != 0){
            $('.old-variation-image-file').each(function(){
                var get_images = $(this).data('images');
                console.log(get_images);
                var get_id = $(this).data('id');
                var urls = [],
                initialPreviewConfig = [],
                initialPreviewAsData = false;
                if (Object.keys(get_images).length > 0) {
                    get_images.forEach(function(obj, index) {
                        urls.push(window.location.origin + obj);
                        initialPreviewConfig.push({
                            caption: obj.split('/').slice(-1)[0],
                            downloadUrl: window.location.origin + '/' + obj,
                            url: "{{ route('product_attribute.delete_img') }}",
                            key: get_id,
                            extra: {
                                _token: $('meta[name="csrf-token"]').attr('content'),
                                path: obj
                            }
                        });
                    });
                    initialPreviewAsData = true
                }

                var store_url = '{{ route("product.attribute_image.update", ":id") }}';
                store_url = store_url.replace(':id', get_id);

                $(this).fileinput({
                    uploadUrl: store_url,
                    showUpload: false,
                    theme: 'fa',
                    initialPreview: urls,
                    initialPreviewAsData: initialPreviewAsData,
                    initialPreviewConfig: initialPreviewConfig,
                    uploadAsync: false,
                    browseOnZoneClick: true,
                    initialPreviewShowDelete: true,
                    dropZoneEnabled: true,
                    overwriteInitial: false,
                    maxFileSize: 20000000,
                    maxFilesNum: 20,
                    uploadExtraData: function() {
                        return {
                            created_at: $('.created_at').val(),
                            _token: $('meta[name="csrf-token"]').attr('content'),
                        };
                    }
                })
            });
        }
    </script>
@endpush
