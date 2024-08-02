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
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-lg border-light rounded-lg">
                    <div class="card-header bg-primary text-white text-center py-4">
                        <h2 class="mb-0">Reset Password</h2>
                    </div>
                    <div class="card-body p-4">
                        <p class="text-muted mb-4 text-center">We will send a link to your email. Use that link to reset your password.</p>

                        <form action="{{ route('forget.password.post') }}" method="POST" id="resetPasswordForm">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Enter your email" required>
                                @if ($errors->has('email'))
                                <div class="text-danger mt-1">{{ $errors->first('email') }}</div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary btn-lg w-100 ">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
