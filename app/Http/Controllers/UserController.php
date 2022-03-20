<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register (RegisterRequest $request) {
        $user = new User($request->safe(["name", "email", "password"]));
        $user->save();
        $user->fresh();

        Auth::login($user, $request->has('remember'));

        return redirect()->intended(route('user.dashboard'));
    }

    public function login (LoginRequest $request) {
        $auth = Auth::attempt($request->safe(["email", 'password']), $request->has('remember'));

        if ($auth) {
            return redirect()->intended(route('user.dashboard'));
        }

        return redirect(route('user.login'));
    }

    public function logout (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function settings (Request $request) {
        $tokens = $request->user()->tokens;

        return view('user.settings', compact('tokens'));
    }

    public function dashboard (Request $request)
    {
        $todoLists = $request->user()->TodoLists()->with("TodoItems")->get();
        return view('user.dashboard', compact('todoLists'));
    }

    public function show (Request $request)
    {
        if ($request->expectsJson()) {
            return new UserResource(Auth::user());
        }
    }
}
