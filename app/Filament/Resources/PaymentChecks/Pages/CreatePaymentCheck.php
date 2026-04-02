<?php

namespace App\Filament\Resources\PaymentChecks\Pages;

use App\Enums\CheckPageTemplate;
use App\Filament\Resources\PaymentChecks\PaymentCheckResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePaymentCheck extends CreateRecord
{
    protected static string $resource = PaymentCheckResource::class;

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (($data['template'] ?? '') === CheckPageTemplate::DarkMexc->value) {
            $data['document_number'] = '—';
            $data['amount_display'] = '—';
            $data['status_label'] = 'Тўловга тайёр';
            $data['amount_hint'] = null;
            $data['receipt_button_url'] = null;
        }

        return $data;
    }
}
