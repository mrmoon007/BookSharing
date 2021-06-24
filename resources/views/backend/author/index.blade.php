@extends('backend.layouts.master')

@section('customStyle')

@endsection

@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Authors</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12" >
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
                            <tr>
                                <td>1</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>
                                    <a href="" class="btn btn-sm btn-info" > <i class="fa fa-edit"></i>edit</a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection

@section('customScript')
$(document).ready(function() {
    $('#example').DataTable();
} );
@endsection
