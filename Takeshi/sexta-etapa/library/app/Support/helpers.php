<?php

if (!function_exists('current_user'))
{     
    function current_user(): Illuminate\Contracts\Auth\Authenticatable
    {         
        return auth()->user();
    }
}