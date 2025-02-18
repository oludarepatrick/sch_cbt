@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Sign Up</h2>
    <form method="POST" action="{{ route('signup.store') }}">
    @csrf
        <div class="mb-3">
            <label for="firstname" class="form-label">FullName</label>
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
            <label for="username" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" id="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
@endsection
