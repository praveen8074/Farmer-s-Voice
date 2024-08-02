<h1>Reset Password</h1>
<p>click below to reset the password for your account.</p>
<a href="{{ route('reset.password', ['token' => $token, 'email' => $email]) }}">Reset Password</a>
