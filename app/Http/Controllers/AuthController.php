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
            $response = [];
            $metadata = [
                'message' => 'Akun tidak terdaftar',
                'code' => 201,
            ];
            return $this->response($response, $metadata);
        }

        $token = Hash::make($username . $password . Carbon::now()->timestamp);

        User::where('username', $username)->update(['token' => $token, 'token_updated' => Carbon::now()]);

        $response = ['token' => $token];
        $metadata = [
            'message' => 'Ok',
            'code' => 200,
        ];
        return $this->response($response, $metadata);
    }
}