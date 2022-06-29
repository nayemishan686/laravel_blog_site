@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Category') }}
                        <a href="{{ route('category.index') }}" class="btn btn-info float-end">All Category</a>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('subcategory.update',$sub_cat->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div>
                                <label for="category_id">Choose Category:</label>
                                <select name="category_id" id="" class="form-control  @error('category_id') is-invalid @enderror" >
                                    <option value="0" disabled selected>Select One</option>
                                    @foreach ($category as $item)
                                        <option value="{{$item->id}}" @if ($item->id == $sub_cat->category_id) selected  @endif>{{$item->category_name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>
                            <div>
                                <label for="subcategory_name">SubCategory Name:</label>
                                <input type="text" name="subcategory_name" placeholder="SubCategory Name"
                                    class="form-control @error('subcategory_name') is-invalid @enderror"
                                    value="{{ $sub_cat->subcategory_name }}">
                                @error('subcategory_name')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>
                            <input type="submit" value="Submit" class="btn btn-success">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
