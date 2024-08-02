@extends('layouts.frontend')

@section('content')
<style>
    .error-message {
        color: red;
        display: none; 
    }
    .input-container {
        position: relative;
    }
    .input-container input {
        padding-right: 50px; 
    }
    .input-container .toggle-password {
        position: absolute;
        right: 10px; 
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        z-index: 2;
    }
</style>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
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
            <div class="card shadow-lg border-0 rounded-lg overflow-hidden">
                <div class="card-header bg-primary text-white text-center py-4">
                    <h3 class="mb-0">Login</h3>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('login.post') }}" method="POST" id="loginForm">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Enter your email">
                            <div class="error-message" id="email-error">Please enter a valid Email.</div>
                        </div>
                        
                        <div class="mb-3 input-container">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Enter your password">
                            <i class="fa fa-eye-slash toggle-password" id="togglePassword"></i>
                            <div class="error-message" id="password-error">Please enter a valid password.</div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" id="role" class="form-select form-select-lg">
                                <option value="" selected disabled>Select Your Role</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                            <div class="error-message" id="role-error">Please select your role</div>
                        </div>
                        
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary btn-lg w-100">Sign In</button>
                        </div>
                        
                        <div class="text-center mt-3">
                            <a href="{{ route('forget.password') }}" class="text-muted">Forgot your password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>
<script>
   $(document).ready(function() {
        function isValidEmail(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }

        function isValidPassword(password) {
            return /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,15}$/.test(password);
        }

        function validateInput(input, validationFn, errorElementId) {
            if (!validationFn(input.val())) {
                $(errorElementId).show();
                return false;
            } else {
                $(errorElementId).hide();
                return true;
            }
        }

        function validateForm() {
            var isValid = true;
            
            isValid = validateInput($('#email'), isValidEmail, '#email-error') && isValid;
            isValid = validateInput($('#password'), isValidPassword, '#password-error') && isValid;
            
            var role = $('#role').val();
            if (!role) {
                $('#role-error').show();
                isValid = false;
            } else {
                $('#role-error').hide();
            }

            return isValid;
        }

        $('#loginForm').on('submit', function(e) {
            if (!validateForm()) {
                e.preventDefault(); 
            }
        });

        $('#email, #password, #role').on('input change', function() {
            validateForm();
        });

        $('#togglePassword').on('click', function() {
            var passwordInput = $('#password');
            var type = passwordInput.attr('type') === 'password' ? 'text' : 'password';
            passwordInput.attr('type', type);
            $(this).toggleClass('fa-eye-slash fa-eye');
        });
    });
</script>
@endsection
