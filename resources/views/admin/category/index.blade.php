@extends('layouts.app')

@section('content')
<div class="container">
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
                            @foreach ($ctg_data as $key=>$cat_item)
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
                    {{-- <form action="{{route('students.destroy',$sData->id)}}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
