<?php

namespace App\Filament\Resources\PaymentChecks\Pages;

use App\Filament\Resources\PaymentChecks\PaymentCheckResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePaymentCheck extends CreateRecord
{
    protected static string $resource = PaymentCheckResource::class;
}
