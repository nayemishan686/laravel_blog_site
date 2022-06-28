@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Category') }}
                    </div>

                    <div class="card-body">
                        @if (session()->has('success'))
                            <strong class="text-success">{{ session()->get('success') }}</strong>
                        @endif
                        @if (session()->has('error'))
                            <strong class="text-danger">{{ session()->get('error') }}</strong>
                        @endif
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <div>
                                <label for="category_name">Category Name:</label>
                                <input type="text" name="category_name" placeholder="Category Name"
                                    class="form-control @error('category_name') is-invalid @enderror"
                                    value="{{ old('category_name') }}">
                                @error('category_name')
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
