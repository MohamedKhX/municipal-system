<?php

namespace App\Enums;

use Filament\Support\Colors\Color;

enum RequestStatus: string
{
    use Enum;

    case Pending = "Pending";
    case Approved = "Approved";
    case Rejected = "Rejected";

    public function getIcon(): string
    {
        return match ($this->value) {
            'Pending' => 'tabler-clock',
            'Approved' => 'tabler-topology-complex',
            'Rejected' => 'tabler-xbox-x',
        };
    }

    public function getColor(): array
    {
        return match ($this->value) {
            'Pending' =>  Color::Amber,
            'Approved' => Color::Green,
            'Rejected' => Color::Red,
        };
    }
}
