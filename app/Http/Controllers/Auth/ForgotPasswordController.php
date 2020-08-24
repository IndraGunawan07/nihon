<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Log;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function index()
    {
        return view('auth.secret');
    }

    public function checkSecretAnswer(Request $request)
    {
        //dd($request->all());
        $userAnswer = $request->secretanswer;
        $username = $request->username;
        $user = new User;
        if(($username === $user->getUser($username)->username) && ($userAnswer === $user->getUser($username)->secret_answer))
        {
            Log::info('berhasil');
        }
    }
}
