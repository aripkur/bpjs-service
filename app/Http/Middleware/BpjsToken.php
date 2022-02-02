<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Traits\ApiResponse;
use Closure;
use Illuminate\Http\Request;

class BpjsToken
{
    use ApiResponse;
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
        $reqToken = $request->header('x-token');

        $timeToken = User::where(['username' => $username])->value("token_updated");
        $key = env('HMAC_KEY', '<- [ ubah saya di dot env ] ->');
        $hash = hash_hmac('sha256', $username . $timeToken, $key, true);
        $token = base64_encode($hash);

        if ($token !== $reqToken) {
            return $this->bpjsResponse([], ['message' => 'Token expired', 'code' => 201]);
        }

        return $next($request);
    }
}
