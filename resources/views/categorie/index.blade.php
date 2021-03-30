@extends('layout.layout')

@section('title', 'Categories')

@section('content')
    <section>
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-8">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">All Categories</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-4 text-right">
                    <a href="{{ route('categorie.create') }}" class="btn btn-success"> Create new
                        categorie</a>
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
                            <h5 class="card-title font-weight-bold m-0">Data Categories</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th width="280px">Action</th>
                                </tr>
                                @foreach ($categories as $categorie)
                                    <tr>
                                        <td>{{ ($categories->currentpage() - 1) * $categories->perpage() + $loop->index + 1 }}
                                        </td>
                                        <td>{{ $categorie->name }}</td>
                                        <td>{{ $categorie->description }}</td>
                                        <td>
                                            <form action="{{ route('categorie.destroy', $categorie->id) }}" method="POST">
                                                <a class="btn btn-info"
                                                    href="{{ route('categorie.show', $categorie->id) }}">Show</a>
                                                <a class="btn btn-primary"
                                                    href="{{ route('categorie.edit', $categorie->id) }}">Edit</a>
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
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
