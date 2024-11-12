<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Include Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card shadow-lg border-0 rounded-4" style="width: 22rem;">
        <div class="card-body p-5">
            <h3 class="card-title mb-4 text-center fw-bold text-primary">Login</h3>
            
            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" id="email" class="form-control form-control-lg rounded-pill" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div class="text-danger mt-1 small">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <input type="password" name="password" id="password" class="form-control form-control-lg rounded-pill" required>
                    @error('password')
                        <div class="text-danger mt-1 small">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100 rounded-pill btn-lg">Login</button>
            </form>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS from CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
