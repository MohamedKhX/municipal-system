<?php

namespace App\Enums;

enum ReportType: string
{
    use Enum;
    case Road = 'Road';
    case Accident = 'Accident';
    case Sanitation = 'Sanitation';
    case Electrical = 'Electrical';
    case Water = 'Water';
    case Sewage = 'Sewage';
    case PublicSafety = 'Public_safety';
    case Environmental = 'Environmental';
    case Infrastructure = 'Infrastructure';
    case TrafficSignal = 'Traffic_signal';
    case StreetLighting = 'Street_lighting';
    case PublicFacility = 'Public_facility';
    case Noise = 'Noise';
    case IllegalDumping = 'Illegal_dumping';
    case Vandalism = 'Vandalism';
    case AnimalControl = 'Animal_control';
    case Others = 'Others';
}
