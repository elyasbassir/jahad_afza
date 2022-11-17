<?php

namespace App\Enums;

enum UserLevelEnum: int
{
    case client = 0;
    case user = 1;
    case ownerAdmin = 2;
}
