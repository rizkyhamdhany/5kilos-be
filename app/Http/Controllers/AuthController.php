<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


/**
 * Class AuthController
 * @group Auth
 * @package App\Http\Controllers
 */
class AuthController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users'
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        $name = $request->input('name');
        $user = User::createFromValues($name, $email, $password)->assignRole('customer');

        //        Mail::to($user)->send(new Welcome($user));

        return response()->json(['data' => ['message' => 'Account created. Please verify via email.']]);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['message' => trans('messages.login_failed')], 401);
        }
        

        return response()->json(['data' => ['user' => Auth::user(), 'token' => $token]]);
    }

    public function me(Request $request){
        return response()->json([
            'data' => ['user' => Auth::user(), 'message' => 'Password has been changed !']
        ]);
    }
}
