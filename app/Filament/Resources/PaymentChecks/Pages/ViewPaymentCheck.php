<?php

namespace App\Filament\Resources\PaymentChecks\Pages;

use App\Filament\Resources\PaymentChecks\PaymentCheckResource;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Icons\Heroicon;

class ViewPaymentCheck extends ViewRecord
{
    protected static string $resource = PaymentCheckResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('openPublic')
                ->label('Открыть страницу чека')
                ->icon(Heroicon::OutlinedArrowTopRightOnSquare)
                ->url(fn (): string => $this->record->publicUrl())
                ->openUrlInNewTab(),
            EditAction::make(),
        ];
    }
}
