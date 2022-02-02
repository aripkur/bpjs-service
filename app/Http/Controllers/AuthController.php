<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function createToken(Request $request)
    {
        $username = $request->header('x-username');
        $password = $request->header('x-password');

        if (!User::where(['username' => $username, 'password' => Hash::check('plain-text', $password)])->count()) {
            return $this->bpjsResponse([], [
                'message' => 'Akun tidak terdaftar',
                'code' => 201,
            ]);
        }

        $key = env('HMAC_KEY', '<- [ R 4 H 4 S 1 4 ] ->');
        $time = Carbon::now();
        $hash = hash_hmac('sha256', $username . $time, $key, true);
        $token = base64_encode($hash);
        User::where('username', $username)->update(['token_updated' => $time]);

        return $this->bpjsResponse([
            'token' => $token,
        ], [
            'message' => 'Ok',
            'code' => 200,
        ]);
    }
}