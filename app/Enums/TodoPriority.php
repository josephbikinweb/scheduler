<?php
namespace App\Enums;

enum TodoPriority: int {
    case LOW    = 0;
    case MEDIUM = 1;
    case HIGH   = 2;
    case URGENT = 3;

    public function label(): string
    {
        return match ($this) {
            self::LOW    => 'Low',
            self::MEDIUM => 'Medium',
            self::HIGH   => 'High',
            self::URGENT => 'Urgent',
        };
    }
}
