<?php

namespace App\Enums;

use Filament\Support\Colors\Color;

enum RequestType: string
{
    use Enum;

    case License = "License";
    case Permit = "Permit";

    public function getIcon(): string
    {
        return match ($this->value) {
            'License' => 'tabler-license',
            'Permit' => 'tabler-file-check',
        };
    }

    public function getColor(): array
    {
        return match ($this->value) {
            'License' => Color::Cyan,
            'Permit' => Color::Amber,
        };
    }
}
