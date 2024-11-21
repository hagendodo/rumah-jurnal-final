<?php

namespace App\Providers;

use App\Models\User;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\ServiceProvider;
use Opcodes\LogViewer\Facades\LogViewer;
use function Laravel\Prompts\error;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        LogViewer::auth(function ($request) {
            $user = User::with('roles')->where('id', auth()->id())->first();

            return $user->roles->contains('name', 'Super Admin');
        });

        Filament::serving(function () {
            $filamentMenus = [
                NavigationItem::make('Open Website')
                    ->url('/', shouldOpenInNewTab: true)
                    ->icon('heroicon-o-globe-alt')
                    ->sort(1),
            ];

            $user = User::with('roles')->where('id', auth()->id())->first();

            // Check roles and register navigation item
            if ($user && $user->roles->contains('name', 'Super Admin')) {
                $filamentMenus[] = NavigationItem::make('Log System')
                        ->url('/log-viewer')
                        ->icon('heroicon-o-document-chart-bar')
                        ->sort(1);

            }

            Filament::registerNavigationItems($filamentMenus);
        });
    }
}
