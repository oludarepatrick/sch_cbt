@extends('layouts.app')

@section('content')
<style>
    /* Centering and Compact Form Styles */
    .container {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card {
        width: 100%;
        max-width: 400px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        padding: 20px;
    }

    .card h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-control {
        font-size: 0.9em;
        padding: 8px;
    }

    #passwordHint {
        display: block;
        margin-top: 5px;
        font-size: 0.8em;
    }

    #passwordMatch {
        display: block;
        margin-top: 5px;
        font-size: 0.8em;
        font-weight: bold;
    }
</style>

<div class="container">
    <div class="card">
        <h2>Sign Up</h2>
        <form method="POST" action="{{ route('signup.store') }}" id="signupForm">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" name="dob" id="dob">
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-control" name="gender" id="gender" required>
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" id="phone">
            </div>
            <div class="mb-3">
                <label for="class" class="form-label">Class</label>
                <input type="text" class="form-control" name="class" id="class" required>
            </div>
            <div class="mb-3">
                <label for="class_arm" class="form-label">Class Arm</label>
                <input type="text" class="form-control" name="class_arm" id="class_arm">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
                <small class="text-muted" id="passwordHint">Password must be at least 8 characters.</small>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                <small id="passwordMatch" class="form-text"></small>
            </div>
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const password = document.getElementById('password');
        const passwordConfirm = document.getElementById('password_confirmation');
        const passwordMatch = document.getElementById('passwordMatch');
        const passwordHint = document.getElementById('passwordHint');

        function checkPasswordMatch() {
            // Check for password length
            if (password.value.length < 8) {
                passwordHint.style.color = 'red';
            } else {
                passwordHint.style.color = 'green';
            }

            // Check for password confirmation match
            if (passwordConfirm.value !== '') {
                if (password.value === passwordConfirm.value) {
                    passwordMatch.textContent = 'Passwords Match';
                    passwordMatch.style.color = 'green';
                } else {
                    passwordMatch.textContent = 'Passwords Do Not Match';
                    passwordMatch.style.color = 'red';
                }
            } else {
                passwordMatch.textContent = '';
            }
        }

        password.addEventListener('input', checkPasswordMatch);
        passwordConfirm.addEventListener('input', checkPasswordMatch);
    });
</script>
@endsection
