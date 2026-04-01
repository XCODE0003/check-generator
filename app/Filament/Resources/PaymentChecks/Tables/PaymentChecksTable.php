<?php

namespace App\Filament\Resources\PaymentChecks\Tables;

use App\Models\PaymentCheck;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PaymentChecksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('public_url')
                    ->label('Публичная ссылка')
                    ->state(fn (PaymentCheck $record): string => $record->publicUrl())
                    ->copyable()
                    ->copyMessage('Ссылка скопирована')
                    ->url(fn (PaymentCheck $record): string => $record->publicUrl())
                    ->openUrlInNewTab()
                    ->limit(40),
                TextColumn::make('document_number')
                    ->label('Ҳужжат')
                    ->searchable(),
                TextColumn::make('bank_name')
                    ->label('Банк')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('receiver_name')
                    ->label('Олувчи')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->label('Создан')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                Action::make('openPublic')
                    ->label('Страница чека')
                    ->icon(Heroicon::OutlinedArrowTopRightOnSquare)
                    ->url(fn (PaymentCheck $record): string => $record->publicUrl())
                    ->openUrlInNewTab(),
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
