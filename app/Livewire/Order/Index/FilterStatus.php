<?php

namespace App\Livewire\Order\Index;

use App\Enums\Status;

enum FilterStatus: string
{
    case All = 'all';
    case Paid = Status::Paid->value;
    case Failed = Status::Failed->value;
    case Refunded = Status::Refunded->value;

    public function label(): string
    {
        return match ($this) {
            self::All => 'All',
            self::Paid => Status::Paid->label(),
            self::Failed => Status::Failed->label(),
            self::Refunded => Status::Refunded->label(),
        };
    }
}
