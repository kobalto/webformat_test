<?php

namespace App\Enums;

enum Role : int 
{
    case CEO = 0;
    case PM = 1;
    case DEV = 2;
    
    public static function roles()
    {
        return [
            self::CEO,
            self::PM,
            self::DEV,
        ];
    }
}