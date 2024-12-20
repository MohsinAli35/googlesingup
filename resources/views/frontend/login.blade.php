<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
      <h3 class="text-center mb-4">Login</h3>
      <form action="{{ route('users.index') }}" method="POST">
        <!-- Email Input -->
        <div class="mb-3">
          <label for="email" name="email"class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
        </div>
        <!-- Password Input -->
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name = "password"
          class="form-control" id="password" placeholder="Enter your password" required>
        </div>
        <!-- Login Button -->
        <div class="d-grid mb-3">
          <button type="submit" class="btn btn-primary">Login</button>
        </div>
      </form>
      <!-- OR Divider -->
      <div class="text-center mb-3">
        <span>OR</span>
      </div>
      <!-- Google Sign-Up Button -->
      <div class="d-grid">
        {{-- <button type="button" class="btn btn-danger">
            Sign Up with Google
        </button> --}}
        <a href="{{ url('login/google') }}" class="btn btn-info">
            <img src="https://img.icons8.com/color/16/000000/google-logo.png" alt="Google Icon" class="me-2">
            Sign Up with Google
        </a>
      </div>
      <!-- Additional Links -->
      <div class="text-center mt-3">
        <p>Don't have an account? <a href="#">Sign up here</a></p>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
