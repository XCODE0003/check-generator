<?php

namespace App\Providers;

use App\Http\Controllers\PaymentCheckPageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

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
        $this->app->booted(function (): void {
            $reserved = collect(config('payment_check.reserved_public_slugs', []))
                ->map(fn (string $segment): string => preg_quote($segment, '/'))
                ->filter()
                ->implode('|');

            $segmentPattern = $reserved !== ''
                ? '^(?!'.$reserved.'$)[a-zA-Z0-9_\-\.]{1,128}$'
                : '^[a-zA-Z0-9_\-\.]{1,128}$';

            Route::middleware('web')
                ->get('/{slug}', [PaymentCheckPageController::class, 'show'])
                ->where('slug', $segmentPattern)
                ->name('payment-checks.show');
        });
    }
}
