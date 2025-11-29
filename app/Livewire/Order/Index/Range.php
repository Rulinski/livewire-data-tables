<?php

namespace App\Livewire\Order\Index;

use Illuminate\Support\Carbon;

enum Range: string
{
    case All_Time = 'all';
    case Year = 'year';
    case Last_30 = 'last30';
    case Last_7 = 'last7';
    case Today = 'today';
    case Custom = 'custom';

    public function label($start = null, $end = null): string
    {
        return match ($this) {
            self::All_Time => 'All Time',
            self::Year => 'This Year',
            self::Last_30 => 'Last 30 Days',
            self::Last_7 => 'Last 7 Days',
            self::Today => 'Today',
            self::Custom => ($start !== null && $end !== null)
                ? str($start)->replace('-', '/') . ' - ' . str($end)->replace('-', '/')
                : 'Custom Range',
        };
    }

    public function dates(): array
    {
        return match ($this) {
            self::Today => [Carbon::today(), now()],
            self::Last_7 => [Carbon::today()->subDays(6), now()],
            self::Last_30 => [Carbon::today()->subDays(29), now()],
            self::Year => [Carbon::now()->startOfYear(), now()],
        };
    }
}
