<?php

namespace App\Http\Middleware\Surveyor;

use Closure;
use App\User;
use App\Models\UserType;
use App\Models\SurveyorAdditionalInfo;
use Illuminate\Support\Facades\Auth;

class CheckSurveyorInfoMiddleware
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
                $user_id   = Auth::user()->user_id;
                $surveyor_language = SurveyorAdditionalInfo::where('surveyor_id', $user_id)->first();
                if(!empty($surveyor_language))
                {  
                      return $next($request);  
                }else
                {
                    return redirect()->to('surveyor/settings')->with('error', 'Please Complete Your Profile Details');
                }    
            }else
            {
               return redirect()->to('/')->with('after-logout-access-dashboard', 'Sorry, you can not access dashboard with out Login.');
            }
    }
}
