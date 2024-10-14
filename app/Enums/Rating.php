<?php

namespace App\Enums;

enum Rating: string
{
    use Enum;

    case Bad = "Bad";
    case Good = "Good";
    case Excellent = "Excellent";
}
