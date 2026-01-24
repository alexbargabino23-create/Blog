<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Blog Website</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        /* 🔥 SAME DESIGN — UNCHANGED */
        * { margin:0; padding:0; box-sizing:border-box; }
        body {
            font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;
            background:linear-gradient(135deg,#1e3a8a 0%,#3b82f6 100%);
            min-height:100vh; display:flex; align-items:center; justify-content:center; padding:20px;
        }
        .reset-container {
            background:white; border-radius:20px; box-shadow:0 20px 60px rgba(0,0,0,.3);
            overflow:hidden; width:100%; max-width:450px; animation:slideUp .5s ease-out;
        }
        @keyframes slideUp {
            from{opacity:0;transform:translateY(30px)} to{opacity:1;transform:translateY(0)}
        }
        .reset-header {
            background:linear-gradient(135deg,#1e3a8a 0%,#3b82f6 100%);
            padding:40px 30px; text-align:center; color:white;
        }
        .reset-header .logo-icon {
            width:80px;height:80px;background:white;border-radius:50%;
            display:flex;align-items:center;justify-content:center;
            margin:0 auto 20px;box-shadow:0 8px 20px rgba(0,0,0,.2);
        }
        .reset-header .logo-icon i {font-size:40px;color:#1e3a8a;}
        .reset-header h1 {font-size:28px;font-weight:600;margin-bottom:8px;}
        .reset-header p {font-size:14px;opacity:.9;}
        .reset-body {padding:40px 30px;}
        .form-group {margin-bottom:20px;}
        .form-group label {display:block;margin-bottom:8px;color:#333;font-weight:500;font-size:14px;}
        .input-wrapper {position:relative;}
        .input-wrapper i {
            position:absolute;left:15px;top:50%;transform:translateY(-50%);
            color:#3b82f6;font-size:16px;
        }
        .form-control {
            width:100%;padding:14px 15px 14px 45px;border:2px solid #e5e7eb;
            border-radius:10px;font-size:15px;transition:.3s;outline:none;background:#f9fafb;
        }
        .form-control:focus {
            border-color:#3b82f6;box-shadow:0 0 0 3px rgba(59,130,246,.1);background:white;
        }
        .btn-reset {
            width:100%;padding:15px;background:linear-gradient(135deg,#1e3a8a 0%,#3b82f6 100%);
            color:white;border:none;border-radius:10px;font-size:16px;font-weight:600;
            cursor:pointer;transition:.3s;box-shadow:0 4px 15px rgba(59,130,246,.4);margin-top:10px;
        }
        .btn-reset:hover {transform:translateY(-2px);box-shadow:0 6px 20px rgba(59,130,246,.6);}
        .info-box {
            background:#eff6ff;border-left:4px solid #3b82f6;padding:12px 15px;
            border-radius:8px;margin-bottom:25px;font-size:14px;color:#1e3a8a;
        }
        .info-box i {margin-right:8px;color:#3b82f6;}
        .error-message {color:#ef4444;font-size:12px;margin-top:5px;}
    </style>
</head>
<body>

<div class="reset-container">
    <div class="reset-header">
        <div class="logo-icon">
            <i class="fas fa-key"></i>
        </div>
        <h1>Reset Password</h1>
        <p>Enter your new password below</p>
    </div>

    <div class="reset-body">
        <div class="info-box">
            <i class="fas fa-info-circle"></i>
            Create a strong password with at least 8 characters.
        </div>

        <!-- ✅ REAL LARAVEL FORM -->
        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email -->
            <div class="form-group">
                <label>Email Address</label>
                <div class="input-wrapper">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" class="form-control"
                        value="{{ old('email', $request->email) }}" required autofocus>
                </div>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-group">
                <label>New Password</label>
                <div class="input-wrapper">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" class="form-control" required>
                </div>
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label>Confirm Password</label>
                <div class="input-wrapper">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
                @error('password_confirmation')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-reset">Reset Password</button>
        </form>
    </div>
</div>

</body>
</html>
