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
                            <li class="breadcrumb-item"><a href="{{ route('categorie.index') }}">All Categories</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit categorie</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-4 text-right">
                    <a href="{{ route('categorie.index') }}" class="btn btn-secondary"> Back</a>
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
                            <h5 class="card-title font-weight-bold m-0">Edit Data Categories</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('categorie.update', ['categorie' => $categorie->id]) }}" method="POST">
                                {{ csrf_field() }}
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Categorie Name<sup class="text-danger">*</sup></label>
                                    <input type="name" class="form-control" id="name" name="name"
                                        value="{{ $categorie->name }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description"
                                        rows="3">{{ $categorie->description }}"</textarea>
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
