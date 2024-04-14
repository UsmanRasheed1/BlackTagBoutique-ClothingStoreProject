<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    public function show()
    {
        return view('auth.verify-email');
    }

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        Auth::user()->update(['is_verified' => true]);

        return redirect('/home')->with('verified', true);
    }

    public function resend()
    {
        if (Auth::user()->hasVerifiedEmail()) {
            return redirect('/');
        }

        Auth::user()->sendEmailVerificationNotification();

        return back()->with('resent', true);
    }
}
