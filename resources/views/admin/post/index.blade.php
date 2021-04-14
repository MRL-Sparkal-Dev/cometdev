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
                                <li class="breadcrumb-item active">Post</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-sm btn-primary" href="{{ route('post.create') }}">Add New Post</a>
                        @include('validate')
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Posts</h4>
                                <br>
                                <a class="badge badge-primary" href="{{ route('post.index') }}">Published{{ ($published == 0 ? '' : $published ) }}</a>
                                <a class="badge badge-danger" href="{{ route('post.trash') }}">Trash {{ ( $trash == 0 ? '' : $trash ) }}</a>
                                <br><br>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Post Title</th>
                                            <th>Author</th>
                                            <th>Post Category</th>
                                            <th>Post Tag</th>
                                            <th>Post Type</th>
                                            <th>Published</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($all_data as $data)

                                                @php
                                                    $featured_data = json_decode( $data -> featured );
                                                @endphp

                                                <tr>
                                                    <td>{{ $loop-> index+1 }}</td>
                                                    <td>{{ $data -> title }}</td>
                                                    <td>{{ $data -> user -> name }}</td>
                                                    <td>
                                                        @foreach($data -> categories as $cat)
                                                            <li>{{ $cat -> name }}</li>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach($data -> tags as $tag)
                                                            <li>{{ $tag -> name }}</li>
                                                        @endforeach
                                                    </td>
                                                    <td>{{ $featured_data -> post_type }}</td>
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
                                                        <a  edit_id="{{ $data -> id }}" class="edit_tag btn btn-sm btn-warning" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        <a class="btn btn-sm btn-danger" href="{{ route('post.trash.update', $data -> id ) }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
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

@endsection
