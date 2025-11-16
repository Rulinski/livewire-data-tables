<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
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
        auth()->login(User::first());

        Builder::macro('toCsv', function ($name = null) {
            $query = $this;

            return response()->streamDownload(function () use ($query) {
                $results = $query->get();

                if ($results->count() < 1) return;

                $titles = implode(',', array_keys((array) $results->first()->getAttributes()));

                $values = $results->map(function ($result) {
                    return implode(',', collect($result->getAttributes())->map(function ($thing) {
                        return '"'.$thing.'"';
                    })->toArray());
                });

                $values->prepend($titles);

                echo $values->implode("\n");
            }, $name ?? 'export.csv');
        });
    }
}
