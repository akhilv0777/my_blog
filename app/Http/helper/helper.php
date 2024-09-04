<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;

function profile()
{
    return User::find(Auth::User()->id);
}


if (! function_exists('greetingMessage')) {
    function greetingMessage()
    {
        $currentHour = now()->hour;
        if ($currentHour >= 5 && $currentHour < 12) {
            return 'Good Morning';
        } elseif ($currentHour >= 12 && $currentHour < 17) {
            return 'Good Afternoon';
        } elseif ($currentHour >= 17 && $currentHour < 20) {
            return 'Good Evening';
        } else {
            return 'Good Night';
        }
    }
}
