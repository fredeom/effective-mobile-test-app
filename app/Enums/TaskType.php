<?php

namespace App\Enums;

enum TaskType: string
{
    case Pending = 'pending';
    case Completed = 'completed';
}
