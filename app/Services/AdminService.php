<?php

    namespace App\Services;
    use App\Models\Admin;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Validation\ValidationException;

    class AdminService
    {
        public function register(array $data)
        {
            $admin = admin::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            // Optional: Automatically log them in after registration
            Auth::guard('admin')->login($admin);

            return $admin;
        }

        public function login(string $email, string $password)
        {
            // 1. Attempt login (Handles Hash check + Session creation)
            if (! Auth::guard('admin')->attempt(['email' => $email, 'password' => $password])) {
                throw ValidationException::withMessages([
                    'email' => ['Invalid credentials.'],
                ]);
            }

            // 2. Regenerate session to prevent "session fixation" attacks
            request()->session()->regenerate();

            return Auth::guard('admin')->admin();
        }

        public function logout()
        {
            Auth::guard('admin')->logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();
        }

    }

?>