<?php
namespace App\Enums;

enum VersionStatus: int {
    case DRAFT      = 0;
    case BETA       = 1;
    case STABLE     = 2;
    case DEPRECATED = 3;

    public function label(): string
    {
        return match ($this) {
            self::DRAFT      => 'Draft',
            self::BETA       => 'Beta',
            self::STABLE     => 'Stable',
            self::DEPRECATED => 'Deprecated',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::DRAFT      => 'gray',
            self::BETA       => 'yellow',
            self::STABLE     => 'green',
            self::DEPRECATED => 'red',
        };
    }
}
