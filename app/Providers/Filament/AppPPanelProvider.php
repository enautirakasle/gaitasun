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
use Illuminate\Http\Request;
use Closure;

class AppPPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('app-p')
            ->path('app-p')
            ->login()
            ->profile(isSimple: false)
            ->colors([
                'danger' => Color::Rose,  // Un rojo rosado, similar pero un poco más suave
                'gray' => Color::Zinc,       // Un gris con un toque más cálido y moderno
                'info' => Color::Sky,        // Un azul celeste suave
                'primary' => Color::Fuchsia, // Un color morado intenso y llamativo
                'success' => Color::Lime,    // Un verde más brillante y energizante
                'warning' => Color::Yellow,  // Amarillo brillante para llamar la atención
            ])
            ->discoverResources(in: app_path('Filament/AppP/Resources'), for: 'App\\Filament\\AppP\\Resources')
            ->discoverPages(in: app_path('Filament/AppP/Pages'), for: 'App\\Filament\\AppP\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/AppP/Widgets'), for: 'App\\Filament\\AppP\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
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
                'check.role:admin,profesor',
            ]);
    }
}
