@extends('layouts.main')
@section('title' . 'Point of Sale')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Select Categories</h5>
                        <div align="right" class="mt-2">
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                        </div>
                        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="col-form-label">Category Name</label>
                                <select class="form-control" name="category_id" id="category_id" required>
                                    <option value="">Select One</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="col-form-label">Product Name</label>
                                <select name="" id="product_id" class="form-control">
                                    <option value="">Select One</option>
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-success add-row" type="button">Add To Cart</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order Basket</h5>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Produk</th>
                                    <th>Qty</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2">Subtotal</td>
                                    <td colspan="2">
                                        <input type="number" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Grand Total</td>
                                    <td colspan="2">
                                        <input type="number" class="form-control">
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
