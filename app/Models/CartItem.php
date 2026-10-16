<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>|bool
     */
    protected $guarded = ['id'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'quantity' => 'integer',
            'is_selected' => 'boolean',
        ];
    }

    /**
     * Product relationship.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * User relationship.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Calculate item subtotal.
     */
    public function getSubtotalAttribute(): int
    {
        return (int) (($this->product?->price ?? 0) * $this->quantity);
    }

    /**
     * Formatted subtotal in IDR.
     */
    public function getFormattedSubtotalAttribute(): string
    {
        return 'Rp '.number_format($this->subtotal, 0, ',', '.');
    }
}
