<?php

namespace App\Models;

use App\Enums\CheckPageTemplate;
use Database\Factories\PaymentCheckFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PaymentCheck extends Model
{
    /** @use HasFactory<PaymentCheckFactory> */
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'public_slug',
        'template',
        'document_number',
        'bank_name',
        'card_number',
        'receiver_name',
        'amount_hint',
        'amount_display',
        'status_label',
        'receipt_button_url',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'public_slug' => 'string',
            'template' => CheckPageTemplate::class,
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'public_slug';
    }

    public function publicUrl(): string
    {
        return route('payment-checks.show', ['slug' => $this->public_slug]);
    }

    protected static function booted(): void
    {
        static::creating(function (PaymentCheck $check): void {
            $raw = $check->public_slug;
            if (is_string($raw)) {
                $raw = trim($raw);
            }
            $check->public_slug = filled($raw) ? $raw : (string) Str::uuid();
        });

        static::updating(function (PaymentCheck $check): void {
            if (! $check->isDirty('public_slug')) {
                return;
            }
            $raw = $check->public_slug;
            if (is_string($raw)) {
                $raw = trim($raw);
            }
            if (filled($raw)) {
                $check->public_slug = $raw;

                return;
            }
            $check->public_slug = $check->getOriginal('public_slug');
        });
    }
}
