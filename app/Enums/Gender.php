<?php

namespace App\Enums;

enum Gender: string
{
    use Enum;

    case Male   = "Male";
    case Female = "Female";

}
