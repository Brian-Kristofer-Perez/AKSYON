<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AKSYON - Admin Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        .auth-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 100vh;
        }

        /* Left Side Styling */
        .left-side {
            background: linear-gradient(135deg, #2c5f8d 0%, #1e4163 100%);
            padding: 80px 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .left-side::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: 
                radial-gradient(circle, rgba(255,255,255,0.05) 1px, transparent 1px),
                radial-gradient(circle, rgba(255,255,255,0.05) 1px, transparent 1px);
            background-size: 50px 50px;
            background-position: 0 0, 25px 25px;
            animation: drift 20s linear infinite;
        }

        @keyframes drift {
            0% { transform: translate(0, 0); }
            100% { transform: translate(50px, 50px); }
        }

        .left-content {
            position: relative;
            z-index: 1;
            text-align: center;
        }

        .logo-section {
            margin-bottom: 40px;
        }

        .logo-section h1 {
            color: white;
            font-size: 2.5rem;
            font-weight: 300;
            margin-bottom: 10px;
        }

        .logo-icon {
            width: 60px;
            height: 60px;
            margin-bottom: 20px;
            stroke: white;
            stroke-width: 2;
        }

        .welcome-text h2 {
            color: white;
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 30px;
        }

        .welcome-text p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.1rem;
            line-height: 1.6;
            max-width: 400px;
            margin: 0 auto 50px;
        }
        /* Right Side Styling */
        .right-side {
            background: #f5f7fa;
            padding: 80px 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .right-side::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: 
                radial-gradient(circle, rgba(44,95,141,0.03) 1px, transparent 1px),
                radial-gradient(circle, rgba(44,95,141,0.03) 1px, transparent 1px);
            background-size: 40px 40px;
            background-position: 0 0, 20px 20px;
        }

        .right-content {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 400px;
        }

        .form-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .form-header .logo-icon {
            width: 50px;
            height: 50px;
            margin-bottom: 20px;
            stroke: #2c5f8d;
        }

        .form-header h2 {
            color: #2c5f8d;
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .form-header p {
            color: #6b7280;
            font-size: 1rem;
        }

        /* Form Styling */
        .auth-form {
            width: 100%;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .input-wrapper:focus-within {
            box-shadow: 0 4px 12px rgba(44, 95, 141, 0.15);
            transform: translateY(-2px);
        }

        .input-icon {
            padding: 20px;
            color: #9ca3af;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .input-icon svg {
            width: 20px;
            height: 20px;
        }

        .form-input {
            flex: 1;
            padding: 20px 20px 20px 0;
            border: none;
            outline: none;
            font-size: 1rem;
            color: #374151;
        }

        .form-input::placeholder {
            color: #d1d5db;
        }

        .toggle-password {
            padding: 4px;
            background: none;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 4px;
            transition: all 0.3s ease;
        }
        
        .toggle-password svg {
            width: 20px;
            height: 20px;
            color: #6b7280;
            display: block;
        }

        .toggle-password:hover {
            color: #2c5f8d;
        }

        /* Button Styling */
        .btn {
            width: 100%;
            padding: 18px;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-primary {
            background: white;
            color: #2c5f8d;
            box-shadow: 0 4px 12px rgba(255, 255, 255, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 16px rgba(255, 255, 255, 0.4);
        }

        .btn-secondary {
            background: #2c5f8d;
            color: white;
            box-shadow: 0 4px 12px rgba(44, 95, 141, 0.3);
        }

        .btn-secondary:hover {
            background: #1e4163;
            transform: translateY(-3px);
            box-shadow: 0 6px 16px rgba(44, 95, 141, 0.4);
        }

        .btn-outline {
            background: transparent;
            color: white;
            border: 2px solid white;
        }

        .btn-outline:hover {
            background: white;
            color: #2c5f8d;
            transform: translateY(-3px);
        }

        .forgot-password {
            text-align: center;
            margin-top: 20px;
        }

        .forgot-password a {
            color: #2c5f8d;
            text-decoration: none;
            font-weight: 500;
            border-bottom: 2px solid #2c5f8d;
            padding-bottom: 2px;
            transition: all 0.3s ease;
        }

        .forgot-password a:hover {
            color: #1e4163;
            border-bottom-color: #1e4163;
        }

        /* Responsive */
        @media (max-width: 968px) {
            .auth-container {
                grid-template-columns: 1fr;
            }

            .left-side {
                min-height: 40vh;
                padding: 40px 30px;
            }

            .right-side {
                padding: 40px 30px;
            }

            .welcome-text h2 {
                font-size: 2rem;
            }

            .form-header h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <!-- Left Side -->
        <div class="left-side">
            <div class="left-content">
                <div class="logo-section">
                    <svg class="logo-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2L2 7L12 12L22 7L12 2Z"></path>
                        <path d="M2 17L12 22L22 17"></path>
                        <path d="M2 12L12 17L22 12"></path>
                    </svg>
                    <h1>A.K.S.Y.O.N</h1>
                </div>
                <div class="welcome-text">
                    <h2>Administer</h2>
                    <p>Welcome back to the admin panel. Please sign in to continue managing the platform.</p>
                </div>
            </div>
        </div>

        <!-- Right Side -->
        <div class="right-side">
            <div class="right-content">
                <div class="form-header">
                    <svg class="logo-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2L2 7L12 12L22 7L12 2Z"></path>
                        <path d="M2 17L12 22L22 17"></path>
                        <path d="M2 12L12 17L22 12"></path>
                    </svg>
                    <h2>Admin Login</h2>
                    <p>Sign in to access the admin dashboard</p>
                </div>

                <form class="auth-form" method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <div class="form-group">
                        <div class="input-wrapper">
                            <span class="input-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </span>
                            <input id="email" type="email" class="form-input @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus 
                                   placeholder="Email Address">
                        </div>
                        @error('email')
                            <span class="error-message" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="input-wrapper">
                            <span class="input-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                            </span>
                            <input id="password" type="password" 
                                   class="form-input @error('password') is-invalid @enderror" 
                                   name="password" required autocomplete="current-password" 
                                   placeholder="Password">
                            <button type="button" class="toggle-password" onclick="togglePassword('password')">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <span class="error-message" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="remember-me">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">Remember me</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary">Sign In</button>
                    </div>

                    <div class="forgot-password">
                        @if (Route::has('admin.password.request'))
                            <a href="{{ route('admin.password.request') }}">
                                Forgot Your Password?
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const icon = document.querySelector(`[onclick="togglePassword('${inputId}')"] svg`);
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.innerHTML = `
                    <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                    <line x1="1" y1="1" x2="23" y2="23"></line>
                `;
            } else {
                input.type = 'password';
                icon.innerHTML = `
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                `;
            }
        }

        // Add error class to input wrappers with errors
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.form-input');
            inputs.forEach(input => {
                if (input.classList.contains('is-invalid')) {
                    input.closest('.input-wrapper').classList.add('error');
                }
                
                input.addEventListener('input', function() {
                    if (this.value.trim() !== '') {
                        this.closest('.input-wrapper').classList.remove('error');
                    }
                });
            });
        });
    </script>
</body>
</html>
        }

        .left-content {
            max-width: 500px;
            z-index: 1;
            color: white;
            text-align: center;
        }

        .logo-section {
            margin-bottom: 2rem;
        }

        .logo-icon {
            width: 60px;
            height: 60px;
            margin-bottom: 1rem;
        }

        .left-content h1 {
            font-size: 2.25rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .left-content p {
            font-size: 1.125rem;
            opacity: 0.9;
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        .right-side {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            background-color: white;
        }

        .right-content {
            max-width: 400px;
            width: 100%;
        }

        .form-header {
            margin-bottom: 2.5rem;
            text-align: center;
        }

        .form-header h2 {
            font-size: 1.875rem;
            color: #1e3a8a;
            margin-bottom: 0.75rem;
            font-weight: 700;
        }

        .form-header p {
            color: #64748b;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .input-group {
            position: relative;
            display: flex;
            align-items: center;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.3s ease;
            background-color: #f8fafc;
        }

        .input-group:focus-within {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }

        .input-group.error {
            border-color: #ef4444;
        }

        .input-icon {
            width: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #64748b;
        }

        .form-input {
            flex: 1;
            padding: 20px 20px 20px 0;
            border: none;
            outline: none;
            font-size: 1rem;
            background: transparent;
        }

        .password-toggle {
            padding: 0 15px;
            color: #64748b;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: #1e40af;
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 1.5rem 0;
            font-size: 0.875rem;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #475569;
        }

        .remember-me input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: #1e40af;
            cursor: pointer;
        }

        .forgot-password {
            color: #1e40af;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .forgot-password:hover {
            color: #1e3a8a;
            text-decoration: underline;
        }

        .btn {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: #1e40af;
            color: white;
        }

        .btn-primary:hover {
            background-color: #1e3a8a;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(30, 64, 175, 0.2);
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 2rem 0;
            color: #94a3b8;
            font-size: 0.875rem;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e2e8f0;
        }

        .divider::before {
            margin-right: 1rem;
        }

        .divider::after {
            margin-left: 1rem;
        }

        .social-login {
            text-align: center;
            margin-top: 1.5rem;
        }

        .social-text {
            color: #64748b;
            margin-bottom: 1rem;
            font-size: 0.875rem;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .social-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .back-to-home {
            display: inline-block;
            margin-top: 1.5rem;
            color: #64748b;
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.3s ease;
        }

        .back-to-home:hover {
            color: #1e40af;
            text-decoration: underline;
        }

        .error-message {
            color: #ef4444;
            font-size: 0.875rem;
            margin-top: 0.5rem;
            display: none;
        }

        .input-group.error .error-message {
            display: block;
        }

        @media (max-width: 1024px) {
            .auth-container {
                flex-direction: column;
            }
            
            .left-side, .right-side {
                padding: 3rem 1.5rem;
            }
            
            .left-content {
                max-width: 100%;
            }
        }

        @media (max-width: 640px) {
            .left-side, .right-side {
                padding: 2rem 1rem;
            }
            
            .form-header h2 {
                font-size: 1.5rem;
            }
            
            .left-content h1 {
                font-size: 1.75rem;
            }
            
            .left-content p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="left-side">
            <div class="left-content">
                <div class="logo-section">
                    <svg class="logo-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L2 7L12 12L22 7L12 2Z" fill="white"/>
                        <path d="M2 17L12 22L22 17" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2 12L12 17L22 12" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h1>Welcome Back, Admin</h1>
                <p>Securely access your admin dashboard to manage users, content, and system settings with ease.</p>
            </div>
        </div>
        <div class="right-side">
            <div class="right-content">
                <div class="form-header">
                    <h2>Admin Login</h2>
                    <p>Enter your credentials to access the admin dashboard</p>
                </div>
                
                <form method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf
                    
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" fill="#64748b"/>
                                    <path d="M12 14.5C6.99 14.5 3 18.49 3 23.5C3 23.78 3.22 24 3.5 24H20.5C20.78 24 21 23.78 21 23.5C21 18.49 17.01 14.5 12 14.5Z" fill="#64748b"/>
                                </svg>
                            </div>
                            <input id="email" type="email" class="form-input @error('email') error @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                            @error('email')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19 10H20C21.1 10 22 10.9 22 12V20C22 21.1 21.1 22 20 22H4C2.9 22 2 21.1 2 20V12C2 10.9 2.9 10 4 10H5V8C5 4.14 8.14 1 12 1C15.86 1 19 4.14 19 8V10ZM12 3C9.24 3 7 5.24 7 8V10H17V8C17 5.24 14.76 3 12 3ZM14 15C14 16.1 13.1 17 12 17C10.9 17 10 16.1 10 15C10 13.9 10.9 13 12 13C13.1 13 14 13.9 14 15Z" fill="#64748b"/>
                                </svg>
                            </div>
                            <input id="password" type="password" class="form-input @error('password') error @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                            <span class="password-toggle" onclick="togglePassword('password')">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 5C5.63636 5 1 12 1 12C1 12 5.63636 19 12 19C18.3636 19 23 12 23 12C23 12 18.3636 5 12 5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" fill="currentColor"/>
                                </svg>
                            </span>
                            @error('password')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="remember-forgot">
                        <label class="remember-me">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span>Remember me</span>
                        </label>
                        @if (Route::has('admin.password.request'))
                            <a href="{{ route('admin.password.request') }}" class="forgot-password">
                                Forgot Password?
                            </a>
                        @endif
                    </div>
                    
                    <button type="submit" class="btn btn-primary">
                        Sign In
                    </button>
                </form>
                
                <div class="divider">or</div>
                
                <div class="social-login">
                    <p class="social-text">Sign in with</p>
                    <div class="social-icons">
                        <a href="#" class="social-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="#4285F4">
                                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                            </svg>
                        </a>
                        <a href="#" class="social-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="#1877F2">
                                <path d="M22 12.06c0-5.52-4.48-10-10-10s-10 4.48-10 10c0 4.99 3.65 9.13 8.44 9.88v-6.99h-2.54v-2.89h2.54V9.85c0-2.51 1.49-3.89 3.78-3.89 1.09 0 2.24.19 2.24.19v2.47h-1.26c-1.24 0-1.63.77-1.63 1.56v1.88h2.78l-.45 2.89h-2.33v6.99c4.79-.75 8.44-4.89 8.44-9.88z" fill="#1877F2"/>
                            </svg>
                        </a>
                        <a href="#" class="social-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="#1DA1F2">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" fill="#1DA1F2"/>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <a href="{{ url('/') }}" class="back-to-home">
                    &larr; Back to Home
                </a>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const icon = document.querySelector(`[onclick="togglePassword('${inputId}')"] svg`);
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.innerHTML = `
                    <path d="M12 5C5.63636 5 1 12 1 12C1 12 5.63636 19 12 19C18.3636 19 23 12 23 12C23 12 18.3636 5 12 5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" fill="currentColor"/>
                    <line x1="2" y1="2" x2="22" y2="22" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                `;
            } else {
                input.type = 'password';
                icon.innerHTML = `
                    <path d="M12 5C5.63636 5 1 12 1 12C1 12 5.63636 19 12 19C18.3636 19 23 12 23 12C23 12 18.3636 5 12 5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" fill="currentColor"/>
                `;
            }
        }

        // Add error class to input groups with errors
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.form-input');
            inputs.forEach(input => {
                if (input.classList.contains('error')) {
                    input.closest('.input-group').classList.add('error');
                }
                
                input.addEventListener('input', function() {
                    if (this.value.trim() !== '') {
                        this.closest('.input-group').classList.remove('error');
                    }
                });
            });
        });
    </script>
</body>
</html>
