<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Traits\BpjsResponse;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BpjsToken
{
    use BpjsResponse;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $username = $request->header('x-username');
        $token = $request->header('x-token');

        if (!User::where(['username' => $username, 'token' => $token])->count()) {
            $response = [];
            $metadata = [
                'message' => 'Akun tidak terdaftar',
                'code' => 201,
            ];
            return $this->response($response, $metadata);
        }
        User::where('username', $username)->update(['ip' => $request->ip, 'last_activity' => Carbon::now()]);
        return $next($request);
    }
}
