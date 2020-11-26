<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if (!$user->isAdmin()) {
            session()->flash('warning', 'Ви повинні бути адміністратором, щоб переглядати цю сторінку');
            return redirect()->route('index');
        }

        return $next($request);
    }
}
