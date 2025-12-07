<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Services\AdminService;
use App\Services\UserService;
use Illuminate\Http\Request;

    class AuthController extends Controller {

        private $userService;
        private $adminService;

        function __construct(AdminService $adminService, UserService $userService) {
            $this->userService = $userService;
            $this->adminService = $adminService;
        }
        
        // Page routes for login
        function userLoginPage(){
            return view('auth.login');
        }

        function userRegistrationPage() {
            return view('auth.register');
        }

        function adminLoginPage(){
            return view('admin.login');
        }

        function adminRegistrationPage() {
            return view('admin.register');
        }

        
        // POST routes for login
        function userLogin(Request $request){

            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            $this->userService->login($credentials['email'], $credentials['password']);

            // TODO: Add redirect to home page
            return redirect()->to('home');
        }

        function userRegistration(Request $request) {

            $credentials = $request->validate([
                'name' => ['required', 'string'],
                'email' => ['required', 'email'],
                'password' => ['required', 'string'] 
            ]);

            $this->userService->register($credentials);

            // TODO: Add redirect to home page
            return redirect()->to('home');
        }

        function adminLogin(Request $request){

            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required', 'password'] 
            ]);

            $this->adminService->login($credentials['email'], $credentials['password']);

            // TODO: Add redirect to admin page
            return redirect()->to('home');
        }

        function adminRegistration($request) {

            $credentials = $request->validate([
                'name' => ['required', 'string'],
                'email' => ['required', 'email'],
                'password' => ['required', 'password'] 
            ]);

            $this->adminService->register($request->data);
            // TODO: Add redirect to admin page
            return redirect()->to('home');
        }

    }

?>