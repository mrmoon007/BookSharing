@extends('backend.layouts.master')

@section('customStyle')

@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Manage Authors</h1>
            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal"
                data-bs-target="#addModal"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Add Author</button>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-12">
                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Author Lists</h6>
                    </div>
                    <div class="card-body">
                        <table id="example" class="table " style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Link</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($authors as $key => $author)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $author->name }}</td>
                                        <td>{{ $author->link }}</td>
                                        <td>
                                            <a href="#editModal{{ $author->id }}" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $author->id }}" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i>edit</a>
                                            <a href="#deleteModal{{ $author->id }}" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $author->id }}" class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i>Delete</a>
                                        </td>
                                        <!-- edit Modal -->
                                        <div class="modal fade" id="editModal{{ $author->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Author</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{ route('Author.update',$author->id) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mb-3">
                                                                <label for="exampleFormControlInput1" class="form-label">Author Name :</label>
                                                                <input type="text" name="name" class="form-control" id="authonName" value="{{ $author->name }}" placeholder="Author name">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleFormControlTextarea1" class="form-label">Description :</label>
                                                                <textarea name="description" class="form-control" id="description" rows="3"
                                                                    placeholder="Description">{{ $author->description }}</textarea>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- edit Modal -->

                                        <!-- delete Modal -->
                                        <div class="modal fade" id="deleteModal{{ $author->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete ??</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{ route('Author.destroy',$author->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div>
                                                                {{ $author->name }} will be delete!!
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Conform</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- delete Modal -->
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->



    <!-- Insert Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Author</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('Author.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Author Name :</label>
                            <input type="text" name="name" class="form-control" id="authonName" placeholder="Author name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description :</label>
                            <textarea name="description" class="form-control" id="description" rows="3"
                                placeholder="Description"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- edit Modal -->

@endsection

@section('customScript')
    $(document).ready(function() {
    $('#example').DataTable();
    } );
@endsection
