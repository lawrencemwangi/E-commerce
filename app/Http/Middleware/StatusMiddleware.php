<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class StatusMiddleware
{
    protected int $alert_message_duration = 5000;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next):  \Symfony\Component\HttpFoundation\Response
    {
        $user = Auth::user();
        
        if ($user && $user->status == 0){
            $email = $user->email; 
            Auth::logout();

            return redirect()->route('status')->with('error',[
                'email' => $email,
                'message' =>'Your account has been suspended',
                'duration' =>$this->alert_message_duration,
            ]);
        }
        return $next($request);
    }
}
