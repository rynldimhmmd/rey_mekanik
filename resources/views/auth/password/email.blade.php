<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>
    <h1>Forgot Password</h1>
    @if (session('status'))
        <div>{{ session('status') }}</div>
    @endif
    <form action="{{ route('pw.email') }}" method="POST">
        @csrf
        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
        @error('email')
            <div>{{ $message }}</div>
        @enderror
        <button type="submit">Send Password Reset Link</button>
    </form>
</body>
</html>
