@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}
                    <a href="{{route('category.index')}}" class="btn btn-info float-end">All Category</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
 
                   Hey {{Auth::user()->name; }}, Welcome to your profile.
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
