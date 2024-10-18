<?php

namespace App\Providers\Filament;

use App\Filament\Municipality\Reports;
use EightyNine\Reports\ReportsPlugin;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\View\View;
class MunicipalityPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('municipality')
            ->path('municipality')
            ->login()
            ->plugins([
                ReportsPlugin::make(),
                \BezhanSalleh\FilamentShield\FilamentShieldPlugin::make()
            ])
            ->colors([
                'primary' => Color::Green,
            ])
            ->navigationGroups([
                NavigationGroup::make()
                    ->label('التقارير'),
                NavigationGroup::make()
                    ->label('إدارة الوصول'),
            ])
            ->discoverResources(in: app_path('Filament/Municipality/Resources'), for: 'App\\Filament\\Municipality\\Resources')
            ->discoverPages(in: app_path('Filament/Municipality/Pages'), for: 'App\\Filament\\Municipality\\Pages')
            ->pages([
                Reports::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Municipality/Widgets'), for: 'App\\Filament\\Municipality\\Widgets')
            ->widgets([
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->renderHook(
                PanelsRenderHook::TOPBAR_START,
                fn(): View => view('filament.municipality.municipality-name')
            )
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
