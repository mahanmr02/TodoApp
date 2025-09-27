<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\TodoList;
use Morilog\Jalali\Jalalian;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ListServiceProvider extends ServiceProvider
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
        View::composer('app.*', function ($view) {
            $todayLists = collect();
            $thisWeekLists = collect();
            $thisMonthLists = collect();

            if (auth()->check()) {
                $listsQuery = TodoList::where('user_id', auth()->id());

                // امروز
                $today = now()->startOfDay();
                $tomorrow = now()->endOfDay();
                $todayLists = (clone $listsQuery)
                    ->whereBetween('created_at', [$today, $tomorrow])
                    ->get();


                    $startOfWeek = now()->startOfWeek(Carbon::SATURDAY);
                $thisWeekLists = (clone $listsQuery)
                    ->whereBetween('created_at', [$startOfWeek, now()])
                    ->whereNotIn('id', $todayLists->pluck('id'))
                    ->get();


                $startOfMonth = Jalalian::now()->getFirstDayOfMonth()->toCarbon();
                $thisMonthLists = (clone $listsQuery)
                    ->whereBetween('created_at', [$startOfMonth, now()])
                    ->whereNotIn('id', $todayLists->pluck('id'))
                    ->whereNotIn('id', $thisWeekLists->pluck('id'))
                    ->get();
            }

            $view->with([
                'todayLists' => $todayLists,
                'thisWeekLists' => $thisWeekLists,
                'thisMonthLists' => $thisMonthLists,
            ]);
        });
    }
}
