<?php

namespace App\Filament\Resources\PaymentChecks\Pages;

use App\Enums\CheckPageTemplate;
use App\Filament\Resources\PaymentChecks\PaymentCheckResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPaymentCheck extends EditRecord
{
    protected static string $resource = PaymentCheckResource::class;

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (($data['template'] ?? '') === CheckPageTemplate::DarkMexc->value) {
            $data['document_number'] = $this->record->document_number;
            $data['amount_display'] = $this->record->amount_display;
            $data['amount_hint'] = $this->record->amount_hint;
            $data['status_label'] = $this->record->status_label;
        }

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
