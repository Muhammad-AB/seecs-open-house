<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    // protected function redirectTo(Request $request): ?string
    // {
    //     return $request->expectsJson() ? null : route('login');
    // }
    protected function redirectTo($request)
    {
        if ($request->expectsJson()) {
            echo "Hello";
            // return response()->json(['message' => 'JSON Response'], 200);
        }

        // Continue processing for non-JSON requests
        // return $next($request);
        if (!$request->expectsJson()) {
            // Check the user's role and redirect accordingly
            if (auth()->check()) {
                $role = auth()->user()->role;

                switch ($role) {
                    case 'S':
                        return view('layouts.student_dashboard'); // Adjust the route name
                    case 'E':
                        return route('evaluator.dashboard'); // Adjust the route name
                    case 'A':
                        return route('admin.dashboard'); // Adjust the route name
                    default:
                        return route('login');
                }
            }

            return route('login');
        }
    }
}
