<?php
namespace App\Enums;

enum ProjectStatus: int {
    case PLANNING  = 0;
    case ACTIVE    = 1;
    case ON_HOLD   = 2;
    case COMPLETED = 3;
    case CANCELLED = 4;

    public function label(): string
    {
        return match ($this) {
            self::PLANNING  => 'Planning',
            self::ACTIVE    => 'Active',
            self::ON_HOLD   => 'On Hold',
            self::COMPLETED => 'Completed',
            self::CANCELLED => 'Cancelled',
        };
    }
}
