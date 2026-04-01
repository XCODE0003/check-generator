<?php

namespace App\Filament\Resources\PaymentChecks\Pages;

use App\Filament\Resources\PaymentChecks\PaymentCheckResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPaymentCheck extends EditRecord
{
    protected static string $resource = PaymentCheckResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
