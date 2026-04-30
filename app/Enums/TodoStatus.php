<?php
namespace App\Enums;

enum TodoStatus {
    case TODO           = 0;
    case IN_PROGRESS    = 1;
    case DONE           = 2;
    case CANCELLED      = 3;
    case NEEDS_REVISION = 4;
    public function label(): string
    {
        return match ($this) {
            self::TODO           => 'Todo',
            self::IN_PROGRESS    => 'In Progress',
            self::DONE           => 'Done',
            self::CANCELLED      => 'Cancelled',
            self::NEEDS_REVISION => 'Needs Revision',
        };
    }
    public function color(): string
    {
        return match ($this) {
            self::TODO           => 'gray',
            self::IN_PROGRESS    => 'blue',
            self::DONE           => 'green',
            self::CANCELLED      => 'red',
            self::NEEDS_REVISION => 'yellow',
        };
    }
}
