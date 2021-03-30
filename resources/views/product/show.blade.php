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
                            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
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
                            <h5 class="card-title font-weight-bold m-0">Detail products</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-lg-2"> <strong>Name </strong></div>
                                        <div class="col-lg-10"> {{ $product->name }}</div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-lg-2"> <strong>Category </strong></div>
                                        <div class="col-lg-10"> {{ $product->categorie->name }}</div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-lg-2"> <strong>Price </strong></div>
                                        <div class="col-lg-10"> {{ $product->price }}</div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-lg-2"> <strong>QTY </strong></div>
                                        <div class="col-lg-10"> {{ $product->qty }}</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
