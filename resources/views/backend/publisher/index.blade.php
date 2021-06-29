@extends('backend.layouts.master')

@section('customStyle')

@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Manage Publishers</h1>
            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal"
                data-bs-target="#addModal"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Add Publisher</button>
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
                        <h6 class="m-0 font-weight-bold text-primary">Publisher Lists</h6>
                    </div>
                    <div class="card-body">
                        <table id="example" class="table " style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    {{-- <th>Link</th> --}}
                                    <th>Address</th>
                                    <th>Outlet</th>
                                    <th>Description</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($publishers as $key => $publisher)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $publisher->name }}</td>
                                        {{-- <td>{{ $publisher->link }}</td> --}}
                                        <td>{{ $publisher->outlet }}</td>
                                        <td>{{ $publisher->address }}</td>
                                        <td>{{ $publisher->description }}</td>
                                        <td>
                                            <a href="#editModal{{ $publisher->id }}" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $publisher->id }}" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i>edit</a>
                                            <a href="#deleteModal{{ $publisher->id }}" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $publisher->id }}" class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i>Delete</a>
                                        </td>
                                        <!-- edit Modal -->
                                        <div class="modal fade" id="editModal{{ $publisher->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit publisher</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{ route('Publisher.update',$publisher->id) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="exampleFormControlInput1" class="form-label">publisher Name :</label>
                                                                    <input type="text" name="name" class="form-control" id="authonName" value="{{ $publisher->name }}" placeholder="publisher name">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="exampleFormControlInput1" class="form-label">Link :</label>
                                                                    <input type="text" name="link" class="form-control" id="authonName" value="{{ $publisher->link }}" placeholder="link">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="exampleFormControlInput1" class="form-label">Address :</label>
                                                                    <input type="text" name="address" class="form-control" id="authonName" value="{{ $publisher->address }}" placeholder="Address">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="exampleFormControlInput1" class="form-label">Outlet :</label>
                                                                    <input type="text" name="outlet" class="form-control" id="authonName" value="{{ $publisher->outlet }}" placeholder="Outlet">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleFormControlTextarea1" class="form-label">Description :</label>
                                                                <textarea name="description" class="form-control" id="description" rows="3"
                                                                    placeholder="Description">{{ $publisher->description }}</textarea>
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
                                        <div class="modal fade" id="deleteModal{{ $publisher->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete ??</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{ route('Publisher.destroy',$publisher->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div>
                                                                {{ $publisher->name }} will be delete!!
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
                    <h5 class="modal-title" id="exampleModalLabel">Add New publisher</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('Publisher.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleFormControlInput1" class="form-label">publisher Name :</label>
                                <input type="text" name="name" class="form-control" id="authonName" placeholder=" name">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleFormControlInput1" class="form-label">Link :</label>
                                <input type="text" name="link" class="form-control" id="authonName" placeholder=" Link">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleFormControlInput1" class="form-label">Address :</label>
                                <input type="text" name="address" class="form-control" id="authonName" placeholder=" address">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleFormControlInput1" class="form-label">Outlet :</label>
                                <input type="text" name="outlet" class="form-control" id="authonName" placeholder=" Outlet">
                            </div>
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
