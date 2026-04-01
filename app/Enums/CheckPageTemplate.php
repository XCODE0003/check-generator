<?php

namespace App\Enums;

enum CheckPageTemplate: string
{
    case Classic = 'classic';

    case DarkMexc = 'dark_mexc';

    public function viewName(): string
    {
        return match ($this) {
            self::Classic => 'check',
            self::DarkMexc => 'check1',
        };
    }

    public function label(): string
    {
        return match ($this) {
            self::Classic => 'Дизайн 1 — банк (светлая страница)',
            self::DarkMexc => 'Дизайн 2 — тёмный (MEXC-стиль)',
        };
    }

    /**
     * @return array<string, string>
     */
    public static function options(): array
    {
        $out = [];
        foreach (self::cases() as $case) {
            $out[$case->value] = $case->label();
        }

        return $out;
    }
}
