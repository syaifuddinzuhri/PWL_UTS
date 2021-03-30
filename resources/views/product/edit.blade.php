@extends('layout.layout')

@section('title', 'Products')

@section('content')
    <section>
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-8">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">All Products</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit product</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-4 text-right">
                    <a href="{{ route('product.index') }}" class="btn btn-secondary"> Back</a>
                </div>
            </div>
        </div>
    </section>
    <section class="mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <h5 class="card-title font-weight-bold m-0">Edit data Product</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('product.update', ['product' => $product->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Product Name<sup class="text-danger">*</sup></label>
                                    <input type="name" class="form-control" id="name" name="name"
                                        value="{{ $product->name }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="price">Product Price<sup class="text-danger">*</sup></label>
                                    <input type="number" class="form-control" id="price" name="price"
                                        value="{{ $product->price }}">
                                    @error('price')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="qty">Product QTY<sup class="text-danger">*</sup></label>
                                    <input type="number" class="form-control" id="qty" name="qty"
                                        value="{{ $product->qty }}">
                                    @error('qty')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="categorie_id">Choose category<sup class="text-danger">*</sup></label>
                                    <select class="form-control" name="categorie_id" id="categorie_id">
                                        <option selected disabled>--- Choose category ---</option>
                                        @foreach ($categories as $categorie)
                                            <option value="{{ $categorie->id }}"
                                                {{ $product->categorie_id === $categorie->id ? 'selected' : '' }}>
                                                {{ $categorie->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('categorie_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
