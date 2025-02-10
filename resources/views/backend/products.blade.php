@extends('backend.layouts.app')


@section('content')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Products</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.additems') }}" class="btn btn-primary">New Product</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <div class="input-group input-group" style="width: 250px;">
                            {{-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search"> --}}

                            {{-- <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">

                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th width="60">ID</th>
                                <th width="80"></th>
                                <th>Product</th>
                                <th>Price Per Kg</th>
                                <th>Qty Per Kg</th>
                                {{-- <th>SKU</th> --}}
                                <th width="150">Update</th>
                                <th width="100">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->pid }}</td>
                                    <td><img src="{{ asset('adminassets/' . $product->img) }}" class="img-thumbnail"
                                            width="50"></td>
                                    <td>{{ $product->name }}</td>
                                    <td>${{ $product->price_per_kg }}</td>
                                    <td>{{ $product->quantity_per_kg }}</td>


                                    <td>

                                        <form action=" {{ route('admin.edit', ['product_id' => $product->pid]) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">
                                                <svg class="filament-link-icon w-4 h-4 mr-1"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>

                                            </button>
                                        </form>
                                    </td>
                                    {{-- <td>

                                        <td>

                                        <form action=" {{ route('delete', ['product_id' => $product->pid]) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">
                                                <svg class="filament-link-icon w-4 h-4 mr-1"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>

                                            </button>
                                        </form>
                                    </td> --}}
                                    <td>


                                        <form action="{{ route('admin.delete', ['product_id' => $product->pid]) }}"
                                            method="POST">

                                            @csrf
                                            <button type="submit" class="btn btn-danger" style="color: white;">
                                                <svg wire:loading.remove.delay="" wire:target=""
                                                    class="filament-link-icon w-4 h-4 mr-1"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>

                                            </button>
                                        </form>


                                        {{-- {{ $product->pid }} --}}





                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>


                </div>
                {{-- <div class="card-footer clearfix">
                    <ul class="pagination pagination m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">«</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">»</a></li>
                    </ul>
                </div> --}}
                <div class="card-footer clearfix">
                    <ul class="pagination pagination m-0 float-right">
                        {{-- Previous Page Link --}}
                        <li class="page-item{{ $products->onFirstPage() ? ' disabled' : '' }}">
                            <a class="page-link" href="{{ $products->previousPageUrl() }}" aria-label="Previous">
                                «
                            </a>
                        </li>

                        {{-- Pagination Elements --}}
                        @for ($i = 1; $i <= $products->lastPage(); $i++)
                            <li class="page-item{{ $i == $products->currentPage() ? ' active' : '' }}">
                                <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        {{-- Next Page Link --}}
                        <li class="page-item{{ $products->currentPage() == $products->lastPage() ? ' disabled' : '' }}">
                            <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                                »
                            </a>
                        </li>
                    </ul>
                </div>


            </div>
        </div>
        <!-- /.card -->
    </section>
@endsection

@section('customJs')
    <script>
        console.log("hello")
    </script>
@endsection
