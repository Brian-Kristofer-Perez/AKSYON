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

            Auth::guard('admin')->login($admin);

            return $admin;
        }

        public function login(string $email, string $password)
        {
            if (! Auth::guard('admin')->attempt(['email' => $email, 'password' => $password])) {
                throw ValidationException::withMessages([
                    'email' => ['Invalid credentials.'],
                ]);
            }

            request()->session()->regenerate();

            return Auth::guard('admin')->user();
        }

        public function logout()
        {
            Auth::guard('admin')->logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();
        }

    }

?>