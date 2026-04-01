<?php

namespace App\Filament\Resources\PaymentChecks\Pages;

use App\Filament\Resources\PaymentChecks\PaymentCheckResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPaymentChecks extends ListRecords
{
    protected static string $resource = PaymentCheckResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
