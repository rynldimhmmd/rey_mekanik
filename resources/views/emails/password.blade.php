<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h1>Reset Password</h1>
    <p>Click the button below to reset your password.</p>
    <a href="{{ url('password/reset', $token) }}">Reset Password</a>
</body>
</html>
