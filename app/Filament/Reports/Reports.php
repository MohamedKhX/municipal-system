<?php

namespace App\Filament\Reports;

use App\Enums\ReportStatus;
use EightyNine\Reports\Components\Text;
use EightyNine\Reports\Report;
use EightyNine\Reports\Components\Body;
use EightyNine\Reports\Components\Footer;
use EightyNine\Reports\Components\Header;
use Filament\Forms\Form;

class Reports extends Report
{
    public ?string $heading = "تقرير عن البلاغات";

    // public ?string $subHeading = "A great report";

    public function header(Header $header): Header
    {
        return $header
            ->schema([
                // ...
            ]);
    }


    public function body(Body $body): Body
    {
        return $body
            ->schema([
                Text::make("الطلبات")
                    ->fontXl()
                    ->fontBold()
                    ->primary(),

                Body\Layout\BodyColumn::make()
                    ->schema([
                        Body\Table::make()
                            ->columns([
                                Body\TextColumn::make("title")
                                    ->label("Title")
                                    ->translateLabel(),

                                Body\TextColumn::make("street")
                                    ->label("Street")
                                    ->translateLabel(),

                                Body\TextColumn::make("reportType")
                                    ->label("Type")
                                    ->translateLabel()
                                    ->badge(),

                                Body\TextColumn::make("status")
                                    ->label("Status")
                                    ->translateLabel()
                                    ->formatStateUsing(fn($state) => ReportStatus::tryFrom($state)->translate())
                                    ->badge()
                                    ->color(fn($state) => ReportStatus::tryFrom($state)->getColor())
                                    ->icon(fn($state) => ReportStatus::tryFrom($state)->getIcon()),
                            ])
                            ->data(
                                function () {
                                    $query = \App\Models\Report::query();

                                    return $query
                                        ->select("title", 'street', 'type', 'status')
                                        ->take(10)
                                        ->get();
                                }
                            ),
                    ])
            ]);
    }

    public function footer(Footer $footer): Footer
    {
        return $footer
            ->schema([
                // ...
            ]);
    }

    public function filterForm(Form $form): Form
    {
        return $form
            ->schema([
                // ...
            ]);
    }

    public static function getNavigationLabel(): string
    {
        return __('Reports');
    }
}
