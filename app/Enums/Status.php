<?php

namespace App\Enums;

enum Status: string
{
    case Paid = 'paid';
    case Pending = 'pending';
    case Failed = 'failed';
    case Refunded = 'refunded';

    public function label(): string
    {
        return (string) str($this->name)->replace('_', ' ');
    }

    public function icon(): string
    {
        return match ($this) {
            self::Paid => 'icon.check',
            self::Pending => 'icon.clock',
            self::Failed => 'icon.x-mark',
            self::Refunded => 'icon.arrow-uturn-left',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Paid => 'green',
            self::Pending => 'gray',
            self::Failed => 'red',
            self::Refunded => 'purple',
        };
    }
}
