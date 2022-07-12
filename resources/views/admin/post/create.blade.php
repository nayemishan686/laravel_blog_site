@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Post</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Enter Title">
                                @error('title')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="subcategory_id">Select SubCategory</label>
                                <select name="subcategory_id" id="subcategory_id" class="form-control @error('subcategory_id') is-invalid @enderror">
                                    <option value="0" selected disabled>Select One</option>
                                    @foreach ($category as $cat)
                                    @php
                                        $subcategory = DB::table('sub_categories')->where('category_id',$cat->id)->get();
                                    @endphp
                                        <option disabled class="text-info">{{$cat->category_name}}</option>
                                        @foreach ($subcategory as $subcat)
                                            <option value="{{$subcat->id}}">--{{$subcat->subcategory_name}}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                                @error('subcategory_id')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label for="subcategory_id">Select SubCategory</label>
                                <select name="subcategory_id" id="subcategory_id" class="form-control">
                                    <option value="0" selected disabled>Select One</option>
                                </select>
                            </div> --}}
                            <div class="form-group">
                                <label for="post_date">Post Date</label>
                                <input type="date" class="form-control @error ('post_date') is_invalid @enderror" name="post_date" id="post_date">
                                @error('post_date')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description"  class="form-control summernote @error ('description') is_invalid @enderror" id="description" cols="30" rows="20"></textarea>
                                @error('description')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error ('image') is_invalid @enderror" name="image" id="image">
                                        <label class="custom-file-label" for="image">Choose Photo</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                @error('image')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input @error ('status') is_invalid @enderror" name="status" id="status">
                                <label class="form-check-label" for="status">Publish Now</label>
                                @error('status')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
