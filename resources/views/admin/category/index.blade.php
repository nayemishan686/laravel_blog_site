@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Category') }}
                    <a href="" class="btn btn-info float-end">Add Category</a>
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
                            @foreach ($ctg_data as $key=>$cat_item)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$cat_item->category_name}}</td>
                                    <td>{{$cat_item->category_slug}}</td>
                                    <td>
                                        <a href="" class="btn btn-primary">Edit</a>
                                        <a href="" class="btn btn-danger">Delete</a>
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
@endsection
