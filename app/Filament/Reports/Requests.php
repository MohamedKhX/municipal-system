<?php

namespace App\Filament\Reports;

use App\Enums\RequestStatus;
use App\Models\Request;
use EightyNine\Reports\Components\Text;
use EightyNine\Reports\Report;
use EightyNine\Reports\Components\Body;
use EightyNine\Reports\Components\Footer;
use EightyNine\Reports\Components\Header;
use Filament\Forms\Form;

class Requests extends Report
{
    public ?string $heading = "تقرير عن الطلبات";

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
                                Body\TextColumn::make("first_name")
                                    ->label("First Name")
                                    ->translateLabel(),

                                Body\TextColumn::make("last_name")
                                    ->label("Last Name")
                                    ->translateLabel(),

                                Body\TextColumn::make("subject")
                                    ->label("Subject")
                                    ->translateLabel(),

                                Body\TextColumn::make("status")
                                    ->label("Status")
                                    ->translateLabel()
                                    ->formatStateUsing(fn($state) => RequestStatus::tryFrom($state)->translate())
                                    ->badge()
                                    ->color(fn($state) => RequestStatus::tryFrom($state)->getColor())
                                    ->icon(fn($state) => RequestStatus::tryFrom($state)->getIcon()),
                            ])
                            ->data(
                                function () {
                                    $query = Request::query();

                                    return $query
                                        ->select("first_name", 'last_name', 'subject', 'status')
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
        return __('Requests');
    }
}
