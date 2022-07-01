@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Quick Example</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="category">Select Category</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="0" selected disabled>Select One</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="subcategory">Select SubCategory</label>
                                <select name="subcategory" id="subcategory" class="form-control">
                                    <option value="0" selected disabled>Select One</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="post_date">Post Date</label>
                                <input type="date" class="form-control" name="post_date" id="post_date">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description"  class="form-control" id="description" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="image">
                                        <label class="custom-file-label" for="image">Choose Photo</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="status" id="status">
                                <label class="form-check-label" for="status">Publish Now</label>
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
