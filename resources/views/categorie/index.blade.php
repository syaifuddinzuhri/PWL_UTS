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
                        category</a>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <form action="{{ route('categorie.index') }}" method="GET">
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
    <section class="mb-5 mt-3">
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
                            <table class="table table-bordered" id="categories-table">
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th width="280px">Action</th>
                                </tr>
                                @if ($categories->isEmpty())
                                    <th colspan="4" class="text-center">Data is empty</th>
                                @else
                                    @foreach ($categories as $categorie)
                                        <tr>
                                            <td>{{ ($categories->currentpage() - 1) * $categories->perpage() + $loop->index + 1 }}
                                            </td>
                                            <td>{{ $categorie->name }}</td>
                                            <td>{{ $categorie->description }}</td>
                                            <td>

                                                <a class="btn btn-sm btn-info"
                                                    href="{{ route('categorie.show', $categorie->id) }}">Show</a>
                                                <a class="btn btn-sm btn-primary"
                                                    href="{{ route('categorie.edit', $categorie->id) }}">Edit</a>
                                                <button type="button" class="btn btn-sm btn-danger btn-delete"
                                                    data-attr="{{ route('categorie.destroy', $categorie->id) }}"
                                                    data-toggle="modal" data-target="#deleteModal">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

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

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you, want to delete??</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="submit-delete" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script>
        $(document).ready(function() {
            $('#categories-table .btn-delete').on('click', function() {
                let url = $(this).data('attr')
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $('#submit-delete').on('click', function() {
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {
                            _token: CSRF_TOKEN,
                            _method: "DELETE"
                        },
                        success: function(response) {
                            $('#deleteModal').modal('hide')
                            location.reload();
                        }
                    });
                })
            })
        });

    </script>

@endsection
