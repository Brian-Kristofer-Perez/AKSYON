<?php

    namespace App\Services;
    use App\Models\User;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Validation\ValidationException;

    class UserService
    {

        public function register(array $data)
        {
            //TODO: add validation for existing email
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            Auth::guard('web')->login($user);
            return $user;
        }

        public function login(string $email, string $password)
        {
            if (! Auth::guard('web')->attempt(['email' => $email, 'password' => $password])) {
                throw ValidationException::withMessages([
                    'email' => ['Invalid credentials.'],
                ]);
            }

            request()->session()->regenerate();
            return Auth::guard('web')->user();
        }

        public function logout()
        {
            Auth::guard('web')->logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();
        }

    }
?>