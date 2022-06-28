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
                                <h3 class="card-title">All Categories Data-Table</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Category Name</th>
                                            <th>Category Slug</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ctg_data as $key => $cat_item)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $cat_item->category_name }}</td>
                                                <td>{{ $cat_item->category_slug }}</td>
                                                <td>
                                                    <a href="{{ route('category.edit', $cat_item->id) }}"
                                                        class="btn btn-primary" style="float: left"><i class="fa fa-edit"></i></a>
                                                    <div class="forms" style="display: inline;">
                                                        <form action="{{ route('category.destroy', $cat_item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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











{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Category') }}
                    <a href="{{route('category.create')}}" class="btn btn-info float-end">Add Category</a>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Category Name</th>
                                <th>Category Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ctg_data as $key => $cat_item)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$cat_item->category_name}}</td>
                                    <td>{{$cat_item->category_slug}}</td>
                                    <td>
                                        <a href="{{route('category.edit',$cat_item->id)}}" class="btn btn-primary float-start">Edit</a>
                                        <div class="forms" style="display: inline;">
                                            <form action="{{route('category.destroy',$cat_item->id)}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="submit" value="Delete" class="btn btn-danger">
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
</div> --}}
