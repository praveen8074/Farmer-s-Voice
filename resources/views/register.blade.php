@extends('layouts.nav')
@section('navcontent')
<style>
    .input-container {
        position: relative;
    }
    .input-container input {
        padding-right: 40px; /* Space for the icon */
    }
    .input-container .toggle-password {
        position: absolute;
        right: 10px; /* Adjust as needed */
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        z-index: 2; /* Ensure the icon is above the input field */
    }
    .error-message {
        color: red;
        display: none; 
    }
</style>
<div class="container mt-5">
    @if (session()->has('success'))
    <div class="alert alert-success mt-3">
        {{ session()->get('success') }}
    </div>
    @endif
    @if (session()->has('error'))
    <div class="alert alert-danger mt-3">
        {{ session()->get('error') }}
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0 text-center">Registration Page</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('register.post') }}" method="POST" id="registrationForm">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name">
                            <div class="error-message" id="name-error">Please enter a valid Name.</div>
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group mt-3">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
                            <div class="error-message" id="email-error">Please enter a valid Email.</div>
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="form-group mt-3">
                            <label for="password">Password</label>
                            <div class="input-container">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
                                <i id="togglePassword" class="fa fa-eye-slash toggle-password"></i>
                            </div>
                            <div class="error-message" id="password-error">Please enter a valid Password.</div>
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="form-group mt-3">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-control">
                                <option value="" selected disabled>Select Your Role</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                            <div class="error-message" id="role-error">Please select your role</div>
                            @if ($errors->has('role'))
                            <span class="text-danger">{{ $errors->first('role') }}</span>
                            @endif
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary w-100">Register</button>
                        </div>
                        <div class="form-group mt-3 text-center">
                            <a href="{{ route('login') }}" class="text-muted">Already registered? Click here to login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {

        function isValidName(name) {
            return /^[a-zA-Z\s]+$/.test(name);
        }

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
            isValid = validateInput($('#name'), isValidName, '#name-error') && isValid;
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

        $('#registrationForm').on('submit', function(e) {
            if (!validateForm()) {
                e.preventDefault();
            }
        });

        $('#email, #password, #name, #role').on('input change', function() {
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
