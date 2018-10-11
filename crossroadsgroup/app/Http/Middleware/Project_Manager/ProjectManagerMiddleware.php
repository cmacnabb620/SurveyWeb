<?php

namespace App\Http\Middleware\Project_Manager;

use Closure;
use App\User;
use App\Models\UserType;
use Illuminate\Support\Facades\Auth;

class ProjectManagerMiddleware
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
           $user = Auth::check();
            if($user)
            {
                $user_type_id=Auth::user()->user_type_id;
                $user_role=UserType::where('user_type_id',$user_type_id)->first();
                if($user_role['user_type_id'] == 2)
                {  
                      return $next($request);  
                }
                else
                {
                    return redirect()->to('/')->with('after-logout-access-dashboard', 'Sorry, you can not access dashboard with out Login.');
                }    
            }
            else
            {
               return redirect()->to('/')->with('after-logout-access-dashboard', 'Sorry, you can not access dashboard with out Login.');
            }
    }
}
