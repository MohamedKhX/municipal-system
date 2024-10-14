<?php

namespace App\Enums;

enum UserType: string
{
    use Enum;

    case Admin = "Admin";
    case Employee = "Employee";
    case Citizen = "Citizen";
}
