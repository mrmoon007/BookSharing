@extends('backend.layouts.master')

@section('customStyle')

@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Manage Category</h1>
            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal"
                data-bs-target="#addModal"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Add Category</button>
        </div>
        <div>
            @include('backend.layouts.partials.message')
        </div>
        <!-- Content Row -->
        <div class="row">
            <div class="col-12">
                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Category Lists</h6>
                    </div>
                    <div class="card-body">
                        <table id="example" class="table " style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Description</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td>
                                            <a href="#editModal{{ $category->id }}" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $category->id }}" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i>edit</a>
                                            <a href="#deleteModal{{ $category->id }}" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $category->id }}" class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i>Delete</a>
                                        </td>
                                        <!-- edit Modal -->
                                        <div class="modal fade" id="editModal{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit category</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{ route('categories.update',$category->id) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="exampleFormControlInput1" class="form-label">Category Name :</label>
                                                                    <input type="text" name="name" value="{{ $category->name }}" class="form-control" id="authonName" placeholder="category name">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="exampleFormControlInput1" class="form-label">Parent Category:</label>
                                                                    <select name="parent_id" class="form-control">
                                                                        <option value="">Select a Category</option>
                                                                        @foreach ($pCategories as $pCategory)
                                                                            <option {{ $pCategory->id?'selected':'' }} value="{{ $pCategory->id }}">{{ $pCategory->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleFormControlInput1" class="form-label">Category URL Text :</label>
                                                                <input type="text" name="slug" value="{{ $pCategory->slug}}" class="form-control" id="authonName" placeholder="Category Slug e.g, c-programming">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleFormControlTextarea1" class="form-label">Description :</label>
                                                                <textarea name="description" class="form-control" id="description" rows="3"
                                                                    placeholder="Description">{{ $category->description }}</textarea>
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
                                        <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete ??</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{ route('categories.destroy',$category->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div>
                                                                {{ $category->name }} will be delete!!
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
                    <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('categories.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleFormControlInput1" class="form-label">Category Name :</label>
                                <input type="text" name="name" class="form-control" id="authonName" placeholder="category name">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleFormControlInput1" class="form-label">Parent Category:</label>
                                <select name="parent_id" class="form-control">
                                    <option value="">Select a Category</option>
                                    @foreach ($pCategories as $pCategory)
                                        <option value="{{ $pCategory->id }}">{{ $pCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Category URL Text :</label>
                            <input type="text" name="slug" class="form-control" id="authonName" placeholder="Category Slug e.g, c-programming">
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
