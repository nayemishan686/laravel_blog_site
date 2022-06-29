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
                                            <th>SubCategory Slug</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sub_cat as $key => $subcat_item)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $subcat_item->category->category_name }}</td>
                                                <td>{{ $subcat_item->subcategory_name }}</td>
                                                <td>{{ $subcat_item->subcategory_slug }}</td>
                                                <td>
                                                    <a href="{{route('subcategory.edit',$subcat_item->id)}}" class="btn btn-primary" style="float: left"><i class="fa fa-edit"></i></a>
                                                    <div>
                                                        <form action="{{route('subcategory.destroy',$subcat_item->id)}}" method="POST">
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
