<?php

namespace App\Http\Controllers;

use App\Http\Requests\IssueTokenRequest;
use App\Http\Requests\RevokeTokenRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{
    public function issue (IssueTokenRequest $request)
    {
        $comment = $request->safe()->comment;
        $token = $request->user()->createToken($comment);
        $token = $token->plainTextToken;


        return view('token.issued', compact('token', 'comment'));
    }

    public function revoke (RevokeTokenRequest $request)
    {
        $token = $request->safe()->token;
        $request->user()->tokens()->where('token', $token)->delete();

        return redirect(route('user.settings'));
    }
}
