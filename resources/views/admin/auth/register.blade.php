<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AKSYON - Admin Registration</title>
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
            margin-bottom: 30px;
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
            margin-bottom: 20px;
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
            padding: 15px 20px 15px 0;
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

        .file-input-wrapper {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .file-label {
            display: flex;
            align-items: center;
            padding: 15px;
            background: white;
            border: 2px dashed #d1d5db;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            color: #9ca3af;
        }

        .file-label:hover {
            border-color: #2c5f8d;
            color: #2c5f8d;
        }

        .file-label svg {
            margin-right: 10px;
            width: 20px;
            height: 20px;
        }

        .file-name {
            font-size: 0.9rem;
            color: #2c5f8d;
            margin-top: 5px;
            display: none;
        }

        /* Button Styling */
        .btn {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            margin-top: 10px;
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
            padding: 12px 25px;
            width: auto;
            margin-top: 20px;
        }

        .btn-outline:hover {
            background: white;
            color: #2c5f8d;
            transform: translateY(-3px);
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #6b7280;
            font-size: 0.9rem;
        }

        .login-link a {
            color: #2c5f8d;
            text-decoration: none;
            font-weight: 600;
            margin-left: 5px;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: #ef4444;
            font-size: 0.85rem;
            margin-top: 5px;
            display: block;
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
                    <h2>Admin Registration</h2>
                    <p>Create your admin account to access the admin dashboard and manage the platform.</p>
                    <a href="{{ route('admin.login') }}" class="btn btn-outline">Back to Login</a>
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
                    <h2>Create Admin Account</h2>
                    <p>Fill in your details to register as an admin</p>
                </div>

                <form class="auth-form" method="POST" action="{{ route('admin.auth.register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="input-wrapper">
                            <span class="input-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </span>
                            <input id="name" type="text" class="form-input @error('name') is-invalid @enderror" 
                                   name="name" value="{{ old('name') }}" required autocomplete="name" autofocus 
                                   placeholder="Full Name">
                        </div>
                        @error('name')
                            <span class="error-message" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="input-wrapper">
                            <span class="input-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </span>
                            <input id="email" type="email" class="form-input @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" required autocomplete="email" 
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
                                   name="password" required autocomplete="new-password" 
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
                        <div class="input-wrapper">
                            <span class="input-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                            </span>
                            <input id="password-confirm" type="password" class="form-input" 
                                   name="password_confirmation" required autocomplete="new-password" 
                                   placeholder="Confirm Password">
                            <button type="button" class="toggle-password" onclick="togglePassword('password-confirm')">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-wrapper">
                            <span class="input-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                </svg>
                            </span>
                            <input id="admin_code" type="password" class="form-input @error('admin_code') is-invalid @enderror" 
                                   name="admin_code" required placeholder="Admin Registration Code">
                        </div>
                        @error('admin_code')
                            <span class="error-message" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="file-input-wrapper">
                            <label for="signature" class="file-label">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                    <polyline points="17 8 12 3 7 8"></polyline>
                                    <line x1="12" y1="3" x2="12" y2="15"></line>
                                </svg>
                                <span>Upload Signature</span>
                                <input id="signature" type="file" name="signature" style="display: none;" onchange="updateFileName(this)">
                            </label>
                            <span id="file-name" class="file-name"></span>
                            @error('signature')
                                <span class="error-message" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary">Register</button>
                    </div>

                    <div class="login-link" style="margin-bottom: 15px;">
                        Already have an account? <a href="{{ route('admin.login') }}">Sign in</a>
                    </div>
                    
                    <div style="text-align: center; margin: 20px 0;">
                        <a href="{{ route('user.register') }}" style="color: #2c5f8d; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            Register as Regular User
                        </a>
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

        function updateFileName(input) {
            const fileName = input.files[0] ? input.files[0].name : 'No file selected';
            const fileNameElement = document.getElementById('file-name');
            fileNameElement.textContent = fileName;
            fileNameElement.style.display = 'block';
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
