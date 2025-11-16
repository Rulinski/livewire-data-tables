<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Number;

class Order extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => Status::class,
        'ordered_at' => 'datetime',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function getAvatarAttribute(): string
    {
        return 'https://i.pravatar.cc/300?img='.((string) crc32($this->email))[0];
    }

    public function dateForHumans(): string
    {
        return $this->ordered_at->format(
            $this->ordered_at->year === now()->year
                ? 'M d, g:i A'
                : 'M d, Y, g:i A'
        );
    }

    public function amountForHumans(): false|string
    {
        return Number::currency($this->amount);
    }

    public function refund(): void
    {
        $this->status = Status::Refunded;

        $this->save();
    }

    public function archive(): void
    {
        $this->delete();
    }
}
