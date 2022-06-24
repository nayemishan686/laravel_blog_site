@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        @if (session()->has('success'))
                            <strong class="text-success">{{session()->get('success')}}</strong>
                        @endif
                        @if (session()->has('error'))
                            <strong class="text-danger">{{session()->get('error')}}</strong>
                        @endif
                        <form action="{{ route('update.password') }}" method="POST">
                            @csrf
                            <div>
                                <label for="current_password">Current Password</label>
                                <input type="password" name="current_password" placeholder="Current Password"
                                    class="form-control @error('current_password') is-invalid @enderror" value="{{ old('current_password') }}">
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>
                            <div>
                                <label for="new_password">New Password</label>
                                <input type="password" name="new_password" placeholder="New Password"
                                    class="form-control @error('new_password') is-invalid @enderror">
                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>
                            <div>
                                <label for="conf_password">Confirm Password</label>
                                <input type="password" name="conf_password" placeholder="Confirm Password"
                                    class="form-control @error('conf_password') is-invalid @enderror">
                                @error('conf_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
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
