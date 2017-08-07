<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmailVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $record = DB::table('users')
            ->where('email', Auth::user()->email)
            ->first();

        if (count($record)) {
            if ($record->verified == false) {
                if (Auth::check()) {
                    Auth::logout();
                }
                return redirect('/login')
                    ->with("message", "Please verify your email address before login...!");
            }
        }

        return $next($request);
    }
}
