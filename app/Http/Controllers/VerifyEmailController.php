<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Auth\Events\Verified;


class VerifyEmailController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('auth.verification-email', ['user' => $user]);
    }

    public function notificationEmail()
    {
        Auth::user()->sendEmailVerificationNotification();
        return redirect()->route('verification')->with('warning', ' Verify Your Email First, Check Your Email !');

    }

    public function verify($id)
    {
        $user = User::findOrFail($id);

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
            event(new Verified($user));
            return redirect()->route('portal')->with('success', ' Sukses Login');
        }

        return redirect()->route('portal')->with('success', ' Sukses Login');
    }

    public function resend()
    {
        Auth::user()->sendEmailVerificationNotification();
        return redirect()->route('verification')->with('info', ' Re-send The Verification Email Has Been Successful, Please Recheck Your Email !');
    }
}
