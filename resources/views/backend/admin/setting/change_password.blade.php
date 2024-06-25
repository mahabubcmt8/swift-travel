@extends('layouts.backend')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Change Password</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('update.password') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Current Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="border: 1px solid rgb(78, 72, 72);">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="new_password" class="col-md-4 col-form-label text-md-end">New Password</label>

                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required autocomplete="new-password" style="border: 1px solid rgb(78, 72, 72);">

                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        @error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

@error('new_password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
