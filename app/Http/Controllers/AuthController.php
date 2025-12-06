<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

    class AuthController extends Controller {
        
        // Page routes for login
        function userLoginPage(){
            return view('auth.login');
        }

        function userRegistrationPage() {
            return view('auth.register');
        }

        function adminLoginPage(){
            return view('admin.auth.login');
        }

        function adminRegistrationPage() {
            return view('admin.auth.register');
        }

        
        // POST routes for login
        function userLogin(){

        }

        function userRegistration() {

        }

        function adminLogin(){

        }

        function adminRegistration() {

        }

    }

?>