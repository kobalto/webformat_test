<?php

namespace App\Enums;

enum TaskStatus : int 
{
    case TODO = 0;
    case IN_PROGRESS = 1;
    case IN_TEST = 2;
    case DONE = 3;

    public static function all()
    {
        return [
            self::TODO,
            self::IN_PROGRESS,
            self::IN_TEST,
            self::DONE 
        ];
    }
}