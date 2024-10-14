<?php

namespace App\Enums;

use Filament\Support\Colors\Color;

enum ReportStatus: string
{
    use Enum;

    case Open = "Open";
    case In_progress = "In Progress";
    case Completed = "Completed";
    case False_report = "False Report";


    public function getIcon(): string
    {
        return match ($this->value) {
            'Open' => 'tabler-brand-open-source',
            'In Progress' => 'tabler-clock',
            'Completed' => 'heroicon-o-document-check',
            'False Report' => 'tabler-face-id-error',
        };
    }

    public function getColor(): array
    {
        return match ($this->value) {
            'Open' => Color::Cyan,
            'In Progress' => Color::Amber,
            'Completed' => Color::Green,
            'False Report' => Color::Red,
        };
    }

}
