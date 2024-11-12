<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <!-- Include Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow-lg border-0 rounded-4" style="width: 24rem;">
            <div class="card-body text-center p-5">
                <h3 class="card-title mb-4 fw-bold text-primary">Welcome Back!</h3>
                <p class="card-text text-muted mb-4">Please choose an option to continue</p>
                
                <a href="{{ route('login') }}" class="btn btn-primary mb-3 w-100 rounded-pill">Login</a>

                <a href="{{ route('register') }}" class="btn btn-outline-primary w-100 rounded-pill">Register</a>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
