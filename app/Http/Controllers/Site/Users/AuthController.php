<?php

namespace App\Http\Controllers\Site\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if(auth()->attempt(['email' => $request->log_email, 'password' => $request->log_password], $request->has('remember'))) {
            return redirect('/');
        }
        return back()->withErrors();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        auth()->logout();

        return redirect('/');
    }
}
