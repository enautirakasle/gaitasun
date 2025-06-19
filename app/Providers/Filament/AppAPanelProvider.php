<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
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
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AppAPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('app-a')
            ->path('app-a')
            ->login()
            ->profile(isSimple: false)
            ->colors([
                'danger' => Color::Red, // Cambio a un rojo más clásico y vibrante
                'gray' => Color::Slate, // Un tono más frío de gris
                'info' => Color::Cyan, // Un azul más claro y fresco
                'primary' => Color::Blue, // Cambiado a un azul clásico
                'success' => Color::Teal, // Verde azulado que da un toque suave
                'warning' => Color::Amber, // Un tono amarillo-anaranjado más suave
            ])
            ->discoverResources(in: app_path('Filament/AppA/Resources'), for: 'App\\Filament\\AppA\\Resources')
            ->discoverPages(in: app_path('Filament/AppA/Pages'), for: 'App\\Filament\\AppA\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/AppA/Widgets'), for: 'App\\Filament\\AppA\\Widgets')
            ->widgets([
                // Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
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
            ->authMiddleware([
                Authenticate::class,
                'check.role:alumno,profesor,admin',
            ]);
    }
}
