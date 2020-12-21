<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

class AdminMiddleware
{

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $roleArray = $this->auth->getUser()->roles()->get()->pluck('id')->toArray();
        $role = head($roleArray);
        if ($role != 3)
        {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
