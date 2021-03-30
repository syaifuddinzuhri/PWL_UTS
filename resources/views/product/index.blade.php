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
                            <li class="breadcrumb-item active" aria-current="page">All Products</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-4 text-right">
                    <a href="{{ route('product.create') }}" class="btn btn-success"> Create new
                        product</a>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <form action="{{ route('product.index') }}" method="GET">
                        <div class="row">
                            <div class="col-lg-8">
                                <input type="text" name="keywords" class="form-control" id="keywords"
                                    aria-describedby="keywords" placeholder="Enter a keywords">
                            </div>
                            <div class="col-lg-4 pl-0">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                </div>
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <h5 class="card-title font-weight-bold m-0">Data products</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Categorie</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th width="280px">Action</th>
                                </tr>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ ($products->currentpage() - 1) * $products->perpage() + $loop->index + 1 }}
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->categorie->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->qty }}</td>
                                        <td>
                                            <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                                <a class="btn btn-info"
                                                    href="{{ route('product.show', $product->id) }}">Show</a>
                                                <a class="btn btn-primary"
                                                    href="{{ route('product.edit', $product->id) }}">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="card-footer">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
