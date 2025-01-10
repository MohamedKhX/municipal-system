<?php

namespace App\Reports;

use EightyNine\Reports\ReportsPlugin;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Panel;

class ReportPlugin extends ReportsPlugin
{
    public function boot(Panel $panel): void
    {
        if (! reports()->getUseReportListPage()) {
            // get reports with
            $panel->navigationGroups([
                NavigationGroup::make()
                    ->label(
                        reports()->getNavigationLabel() ??
                        __('filament-reports::menu-page.nav.group')
                    )
                    ->icon(reports()->getNavigationIcon()),
            ]);
            $panel->navigationItems(
                collect(reports()->getReports())
                    ->map(function ($report) {
                        $report = app($report);


                        return NavigationItem::make($report->getHeading())
                            ->hidden(function() use($report) {
                                if($report->getHeading() == 'تقرير عن البلاغات' && auth()->user()->can('view_report')) {
                                    return false;
                                }

                                if($report->getHeading() == 'تقرير عن الطلبات' && auth()->user()->can('view_request')) {
                                    return false;
                                }

                                return true;
                            })
                            ->url(function () use ($report) {
                                return $report->getUrl();
                            })
                            ->parentItem(
                                get_class($report)::getNavigationParentItem() ??
                                reports()->getNavigationParentItem()
                            )
                            ->label(
                                get_class($report)::getNavigationLabel() ??
                                $report->getHeading()
                            )
                            ->sort(
                                get_class($report)::getNavigationSort() ??
                                ($report->getSort() ?? 0)
                            )
                            ->badge(
                                get_class($report)::getNavigationBadge(),
                                get_class($report)::getNavigationBadgeColor()
                            )
                            ->icon(
                                get_class($report)::getNavigationIcon() ??
                                ($report->getIcon() ??
                                    'heroicon-o-document-text')
                            )
                            ->group(
                                get_class($report)::getNavigationGroup() ??
                                (reports()->getNavigationGroup() ??
                                    __(
                                        'filament-reports::menu-page.nav.group'
                                    ))
                            );
                    })
                    ->toArray()
            );
        }
    }
}
