@extends('admin.layouts.app')

@section('main-content')
    <!-- Main Wrapper -->
    <div class="main-wrapper">

        @include('admin.layouts.header')

        @include('admin.layouts.menu')

        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Welcome {{ Auth::user() -> name }}!</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">Category</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-sm btn-primary" data-toggle="modal" href="#add_category_modal">Add New Category</a>
                        @include('validate')
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Category</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category Name</th>
                                            <th>Category Slug</th>
                                            <th>Published On</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($all_data as $data)
                                                <tr>
                                                    <td>{{ $loop-> index+1 }}</td>
                                                    <td>{{ $data -> name }}</td>
                                                    <td>{{ $data -> slug }}</td>
{{--                                                    <td>{{ $data -> created_at -> diffForhumans() }}</td>--}}
                                                    <td>{{ date('F d, Y', strtotime($data -> created_at)) }}</td>
                                                    <td>
                                                        <div class="status-toggle">
                                                            <input type="checkbox" status_id="{{ $data -> id }}"  {{ ( $data -> status == true ? 'checked="checked"' : '' ) }} id="cat_status_{{ $loop -> index + 1 }}" class="check cat_check" >
                                                            <label for="cat_status_{{ $loop -> index + 1 }}" class="checktoggle">checkbox</label>
                                                        </div>
                                                    </td>
                                                    <td>
{{--                                                        <a class="btn btn-sm btn-info" href="#"><i class="fa fa-eye-slash" aria-hidden="true"></i>--}}
{{--                                                        </a>--}}
                                                        <a  edit_id="{{ $data -> id }}" class=" edit_cat btn btn-sm btn-warning" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        <form class="d-inline" action="{{ route('category.destroy', $data -> id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm delete-btn"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->

    <div id="add_category_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h2>Add New Category</h2>
                    <hr>
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input name="name" type="text" class="form-control" placeholder="category-name">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-sm btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

{{--    edit-category--}}
    <div id="update_category_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h2>Update Category</h2>
                    <hr>
                    <form action="{{ route('category.update', $data -> id ) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Name</label>
                            <input name="name" type="text" class="form-control" placeholder="category-name">
                            <input name="edit_id" type="hidden" class="form-control" placeholder="edit_id">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-sm btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
