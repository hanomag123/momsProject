<?php

namespace App\Http\Middleware;

use App\Models\User;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthenticate
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next, $guard = null): Response
  {

    if (Auth::guard($guard)->guest()) {

      if ($request->ajax() || $request->wantsJson()) {
        return response('Unauthorized.', 403);
      } else {
        return redirect()->guest('login');
      }
    }

    if (empty(auth()->user()->role)) {
      abort(403, 'Access dinied');
    } else {
      return $next($request);
    }
  }
}
