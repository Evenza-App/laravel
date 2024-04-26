<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->profile()
            // ->colors([
            //     'primary' => Color::Purple,
            // ])
            ->colors([
                'danger' => Color::Rose,
                'gray' => Color::Gray,
                'info' => Color::Blue,
                'pink' => '#E99FB6',
                'blue' => '#A18EFF',
                'orange' => '#FFB183',
                'purple' => '#E99FB6',
                //'primary' => '#E99FB6',
                'date' => '#FFB183',
                'yellow' => '#ffee32',
                'primary' => '#AF75B2',
                'success' => Color::Emerald,
                'warning' => Color::Orange,
                'green' => '#38B82D',
            ])
            ->font('Roboto Mono')
            //->font('Tauri')
            //->font('Noto Serif ')
            //->font(' Poppins')
            // ->font(' Ubuntu')
            //->font('Kanit')
            ->discoverClusters(in: app_path('Filament/Clusters'), for: 'App\\Filament\\Clusters')
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->brandName('Evenza')
            ->brandLogo(asset('images/evenza-logo-Light-mode.png'),)
            ->brandLogoHeight('2.50rem')
            ->darkModeBrandLogo(asset('images/evenza-Logo-dark-mode.png'))
            ->favicon(asset('images/Evenza-logo-favicon.png'))
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                //  Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
            ])

            //->unsavedChangesAlerts()

            ->navigationGroups([
                'System Management',
                'Customer Management',
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
            ->databaseNotifications()
            ->authMiddleware([
                Authenticate::class,
            ])->spa();
    }
}
