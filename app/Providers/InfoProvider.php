<?php

namespace App\Providers;

use App\Models\Expense;
use App\Models\Head;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class InfoProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('layouts.navigation', function ($view) {
            $view->with('heads', Head::orderBy('name')->get());
            $heads = Expense::withCount('head')
                ->get();
            $totalExpensesCount = $heads->sum('expenses_count');
            $view->with('headsCount', $totalExpensesCount);
        });
    }
}
