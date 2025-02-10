@extends('backend.layouts.app')


@section('content')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Product</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.products') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <form action="{{ route('admin.update', ['product_id' => $product->pid]) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="title">Name</label>
                                            <input type="text" name="name" id="title" class="form-control"
                                                placeholder="{{ $product->name }}">
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" cols="30" rows="10" class="summernote"
                                            placeholder="Description"></textarea>
                                    </div>
                                </div> --}}
                                </div>
                            </div>
                        </div>


                        {{-- forimagepath --}}
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            {{-- assets/img/products/product-img-6.jpg --}}
                                            <label for="title">Image</label>
                                            <input type="text" name="img" id="title" class="form-control"
                                                placeholder="Enter path for your image">
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" cols="30" rows="10" class="summernote"
                                            placeholder="Description"></textarea>
                                    </div>
                                </div> --}}
                                </div>
                            </div>
                        </div>





                        <div class="card mb-3">

                            {{-- <div class="mb-3">
                                <label for="image">Media</label>
                                <input type="text" name="img" id="image" class="form-control"
                                    placeholder="{{ $product->name }}">
                            </div> --}}
                            <div class="card-body">
                                <h2 class="h4 mb-3">Media</h2>
                                <div id="image" class="dropzone dz-clickable">
                                    <div class="dz-message needsclick">
                                        <br>Drop new image or click to upload.<br><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Pricing</h2>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="price">Price per Kg</label>
                                            <input type="text" name="price" id="price_per_kg" class="form-control"
                                                placeholder="{{ $product->price_per_kg }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        {{-- <div class="mb-3">
                                        <label for="compare_price">Compare at Price</label>
                                        <input type="text" name="compare_price" id="compare_price" class="form-control"
                                            placeholder="Compare Price">
                                        <p class="text-muted mt-3">
                                            To show a reduced price, move the product's original price into Compare at
                                            price. Enter a lower value into Price.
                                        </p>
                                    </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Quantity</h2>
                                <div class="row">
                                    {{-- <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="sku">SKU (Stock Keeping Unit)</label>
                                        <input type="text" name="sku" id="sku" class="form-control"
                                            placeholder="sku">
                                    </div>
                                </div> --}}
                                    {{-- <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="barcode">Barcode</label>
                                        <input type="text" name="barcode" id="barcode" class="form-control"
                                            placeholder="Barcode">
                                    </div>
                                </div> --}}
                                    <div class="col-md-12">
                                        {{-- <div class="mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="track_qty"
                                                name="track_qty" checked>
                                            <label for="track_qty" class="custom-control-label">Track Quantity</label>
                                        </div>
                                    </div> --}}
                                        <div class="mb-3">
                                            <input type="number" min="0" name="quantity_per_kg" id="qty"
                                                class="form-control" placeholder="Qty">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            {{-- <div class="card-body">
                                <h2 class="h4 mb-3">Product status</h2>
                                <div class="mb-3">
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Block</option>
                                    </select>
                                </div>
                            </div> --}}
                        </div>
                        {{-- <div class="card"> --}}
                        {{-- <div class="card-body">
                            <h2 class="h4  mb-3">Product category</h2>
                            <div class="mb-3">
                                <label for="category">Category</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="">Electronics</option>
                                    <option value="">Clothes</option>
                                    <option value="">Furniture</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="category">Sub category</label>
                                <select name="sub_category" id="sub_category" class="form-control">
                                    <option value="">Mobile</option>
                                    <option value="">Home Theater</option>
                                    <option value="">Headphones</option>
                                </select>
                            </div>
                        </div> --}}


                        {{-- </div> --}}


                        {{-- <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="h4 mb-3">Product brand</h2>
                            <div class="mb-3">
                                <select name="status" id="status" class="form-control">
                                    <option value="">Apple</option>
                                    <option value="">Vivo</option>
                                    <option value="">HP</option>
                                    <option value="">Samsung</option>
                                    <option value="">DELL</option>
                                </select>
                            </div>
                        </div>
                    </div> --}}
                        <div class="card mb-3">
                            {{-- <div class="card-body">
                                <h2 class="h4 mb-3">Featured product</h2>
                                <div class="mb-3">
                                    <select name="feature" id="status" class="form-control">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>

                <a href="{{ route('admin.products') }}" class="btn btn-outline-dark ml-3">Cancel</a>
            </form>

            {{-- <div class="pb-5 pt-3">
                <button class="btn btn-primary">Update</button>
                <a href="{{ route('admin.products') }}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div> --}}
        </div>
        <!-- /.card -->
    </section>
@endsection

@section('customJs')
    <script>
        console.log("hello")
    </script>
@endsection
