@extends('layouts.frontend')

@section('content')
<main>
    <div class="container mt-5">
        <div class="alert-container mb-4">
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session()->get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg border-light rounded-lg">
                    <div class="card-header bg-primary text-white text-center py-4">
                        <h3 class="mb-0">Reset Password</h3>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('reset.password.post') }}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="hidden" name="email" value="{{ $email }}">
                            
                            <div class="mb-3">
                                <label for="password" class="form-label">Enter New Password</label>
                                <input type="password" name="password" id="password" class="form-control form-control-lg " placeholder="Enter your new password" required>
                                @if ($errors->has('password'))
                                <div class="text-danger mt-1">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                            
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-lg " placeholder="Re-enter your new password" required>
                                @if ($errors->has('password_confirmation'))
                                <div class="text-danger mt-1">{{ $errors->first('password_confirmation') }}</div>
                                @endif
                            </div>
                            
                            <div class="mb-4">
                                <button type="submit" class="btn btn-primary btn-lg w-100">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
