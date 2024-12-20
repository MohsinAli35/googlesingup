<!DOCTYPE html>
<html lang="en">
<head>
    <title>Feedback</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3>Welcome, {{ session('google_name') }}</h3>
    <img src="{{ session('google_avatar') }}" alt="Avatar" class="rounded-circle" width="80">
    <p>{{ session('google_email') }}</p>
    
    <form action="{{ url('submit-feedback') }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="feedback" class="form-control" rows="5" placeholder="Your feedback" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Feedback</button>
    </form>
</div>
</body>
</html>
