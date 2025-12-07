<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AKSYON - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }

        body {
            overflow-x: hidden;
            background-color: #f5f7fa;
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
            fill: none;
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
            max-width: 500px;
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
            line-height: 1.6;
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
            background: transparent;
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
            border: none;
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
            padding: 12px 30px;
            font-size: 1rem;
            border-radius: 50px;
            margin-top: 20px;
            transition: all 0.3s ease;
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
            font-size: 0.95rem;
        }

        .forgot-password a:hover {
            color: #1e4163;
            border-bottom-color: #1e4163;
        }

        /* Error Messages */
        .invalid-feedback {
            display: block;
            margin-top: 8px;
            color: #ef4444;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .is-invalid {
            border-color: #ef4444 !important;
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
                padding: 60px 30px;
            }

            .welcome-text h2 {
                font-size: 2rem;
            }

            .form-header h2 {
                font-size: 1.75rem;
            }
        }

        @media (max-width: 480px) {
            .left-side, .right-side {
                padding: 40px 20px;
            }

            .logo-section h1 {
                font-size: 2rem;
            }

            .welcome-text h2 {
                font-size: 1.75rem;
                margin-bottom: 20px;
            }

            .form-header h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="left-side">
            <div class="left-content">
                <div class="logo-section">
                    <svg class="logo-icon" viewBox="0 0 24 24">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    <h1>A.K.S.Y.O.N</h1>
                </div>
                <div class="welcome-text">
                    <h2>Login to</h2>
                </div>
            </div>
        </div>
        <div class="right-side">
            <div class="right-content">
                <div class="form-header">
                    <h2>Hello, User!</h2>
                    <p>Don't have an account?<br>Enter your personal details<br>and let's get some action done!</p>
                </div>
                <form method="POST" action="{{ route('user.auth.login') }}" class="auth-form">
                    @csrf
                    <div class="form-group">
                        <div class="input-wrapper @error('email') is-invalid @enderror">
                            <span class="input-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </span>
                            <input id="email" type="email" class="form-input" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-wrapper @error('password') is-invalid @enderror">
                            <span class="input-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                            </span>
                            <input id="password" type="password" class="form-input" name="password" placeholder="Password" required autocomplete="current-password">
                            <button type="button" class="toggle-password" onclick="togglePassword('password')">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="remember-me" style="display: flex; align-items: center; margin-bottom: 20px;">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="margin-right: 10px; width: 18px; height: 18px; cursor: pointer;">
                            <label for="remember" style="color: #4b5563; font-size: 0.95rem; cursor: pointer;">{{ __('Remember Me') }}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary">{{ __('Login') }}</button>
                    </div>
                    @if (Route::has('password.request'))
                        <div class="forgot-password">
                            <a href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                    @endif
                </form>
                <div style="text-align: center; margin-top: 30px;">
                    <p style="color: #6b7280; margin-bottom: 15px;">Or sign in with</p>
                    <div style="display: flex; justify-content: center; gap: 15px;">
                        <a href="#" style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 50%; background: white; box-shadow: 0 2px 8px rgba(0,0,0,0.1); transition: all 0.3s ease;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="#4285F4">
                                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/>
                                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                            </svg>
                        </a>
                        <a href="#" style="display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 50%; background: white; box-shadow: 0 2px 8px rgba(0,0,0,0.1); transition: all 0.3s ease;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="#1877F2">
                                <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const icon = event.currentTarget.querySelector('svg');
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.style.stroke = '#2c5f8d';
            } else {
                input.type = 'password';
                icon.style.stroke = 'currentColor';
            }
        }

        // Add focus styles for better accessibility
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.closest('.input-wrapper').style.boxShadow = '0 4px 12px rgba(44, 95, 141, 0.15)';
                this.closest('.input-wrapper').style.transform = 'translateY(-2px)';
            });

            input.addEventListener('blur', function() {
                const wrapper = this.closest('.input-wrapper');
                if (!wrapper.classList.contains('is-invalid')) {
                    wrapper.style.boxShadow = '0 2px 8px rgba(0, 0, 0, 0.08)';
                    wrapper.style.transform = 'translateY(0)';
                }
            });
        });
    </script>
</body>
</html>
