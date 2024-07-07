@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<section class="section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <!-- Grouped Section -->
        <div class="boxed-group mb-5">
          <!-- Profile Information -->
          <div class="mb-5">
            <h5 class="mb-4">Profile Information</h5>

            @if(session('status') && session('status') == 'profile-updated')
              <div class="alert alert-success">
                Profile updated successfully.
              </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
              @csrf
              @method('PATCH')

              <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
              </div>

              <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
              </div>

              <div class="mb-3">
                <label for="image" class="form-label">Profile Image</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
                  <label class="custom-file-label" for="image">Choose file</label>
                </div>
              </div>

              <div class="d-grid">
                <button type="submit" class="btn btn-primary">Update Profile</button>
              </div>
            </form>
          </div>

          <hr>

          <!-- Update Password -->
          <div class="mb-5">
            <h5 class="mb-4">Update Password</h5>

            @if(session('status') && session('status') == 'password-updated')
              <div class="alert alert-success">
                Password updated successfully.
              </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}">
              @csrf
              @method('PUT')

              <div class="mb-3">
                <label for="current_password" class="form-label">Current Password</label>
                <input type="password" class="form-control" id="current_password" name="current_password" required>
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>

              <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm New Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
              </div>

              <div class="d-grid">
                <button type="submit" class="btn btn-primary">Update Password</button>
              </div>
            </form>
          </div>

          <hr>

          <!-- Delete Account -->
          <div>
            <h5 class="mb-4">Delete Account</h5>

            @if(session('status') && session('status') == 'account-deleted')
              <div class="alert alert-success">
                Account deleted successfully.
              </div>
            @endif

            <form method="POST" action="{{ route('profile.destroy') }}">
              @csrf
              @method('DELETE')

              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>

              <div class="d-grid">
                <button type="submit" class="btn btn-danger">Delete Account</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

<style>
    .section {
        padding: 6rem 0;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    .btn-primary:hover, .btn-primary:focus {
        background-color: #0056b3;
        border-color: #0056b3;
    }
    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
    .btn-danger:hover, .btn-danger:focus {
        background-color: #c82333;
        border-color: #bd2130;
    }
    .custom-file-input ~ .custom-file-label::after {
        content: "Browse";
    }
    .custom-file-label::after {
        padding-left: 10px;
        padding-right: 10px;
        color: #fff;
        background-color: #007bff;
        border-left: none;
        border-radius: 0 50px 50px 0;
    }
    .d-grid button {
        padding: 10px 20px;
        font-size: 1rem;
        border-radius: 5px;
    }
    .boxed-group {
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        background-color: #f9f9f9;
    }
</style>
