<?php

namespace App\Http\Middleware;

use App\Models\Scrumboard;
use Closure;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\NoActivity;
use Symfony\Component\HttpFoundation\Response;

class ActivityCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        foreach(User::get() as $user){
            if(!$user->Scrumboard->isEmpty()){
                if(Carbon::parse($user->last_activity)->diffInDays(Carbon::now()) >= 3){
                    if($user->ActivityEmailLog()->get()->isEmpty() || $user->ActivityEmailLog()->first()->last_sent === null){
                        $user->notify(new NoActivity("Last activity: " . $user->last_activity));
                        $user->ActivityEmailLog()->updateOrInsert(
                            ['user_id' => $user->id],
                            ['last_sent' => Carbon::now()],
                        );
                    }
                    $lastSent = Carbon::parse($user->ActivityEmailLog()->first()->last_sent)->diffInDays(Carbon::now());
                    if($lastSent % 3 === 0 && $lastSent !== 0){
                        $user->notify(new NoActivity("Last activity: " . $user->last_activity));
                        $user->ActivityEmailLog()->updateOrInsert(
                            ['user_id' => $user->id],
                            ['last_sent' => Carbon::now()],
                        );
                    }
                }else{
                    $user->ActivityEmailLog()->updateOrInsert(
                        ['user_id' => $user->id],
                        ['last_sent' => null],
                    );
                }
            }
        }  
        return $next($request);
    }
}
