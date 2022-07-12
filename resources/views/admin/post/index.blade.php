@extends('layouts.app')


@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DataTables</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All SubCategories Data-Table</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Category Name</th>
                                            <th>SubCategory Name</th>
                                            <th>User Name</th>
                                            <th>Title</th>
                                            <th>Post Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($post as $key => $post_item)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $post_item->category->category_name }}</td>
                                                <td>{{ $post_item->subcategory->subcategory_name }}</td>
                                                <td>{{ $post_item->user->name }}</td>
                                                <td>{{ $post_item->title }}</td>
                                                <td>{{ $post_item->post_date }}</td>
                                                <td>
                                                    @if ($post_item->status == "1")
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="" class="btn btn-primary" style="float: left"><i class="fa fa-edit"></i></a>
                                                    <div>
                                                        <form action="" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title="delete">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
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
        </section>
    </div>
@endsection
