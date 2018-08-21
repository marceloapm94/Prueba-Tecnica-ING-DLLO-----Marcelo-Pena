<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Corcel\Laravel\Auth\ResetsPasswords as CorcelResetsPasswords;

class PasswordController extends Controller
{
    use ResetsPasswords, CorcelResetsPasswords {
        CorcelResetsPasswords::resetPassword insteadof ResetsPasswords;
    }

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}
