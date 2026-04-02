<?php

namespace App\Filament\Resources\PaymentChecks\Schemas;

use App\Enums\CheckPageTemplate;
use App\Models\PaymentCheck;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PaymentCheckInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('public_link')
                    ->label('Публичная ссылка')
                    ->state(fn (PaymentCheck $record): string => $record->publicUrl())
                    ->copyable()
                    ->copyMessage('Ссылка скопирована')
                    ->url(fn (PaymentCheck $record): string => $record->publicUrl())
                    ->openUrlInNewTab(),
                TextEntry::make('public_slug')
                    ->label('Адрес в URL'),
                TextEntry::make('template')
                    ->label('Дизайн страницы')
                    ->formatStateUsing(function (mixed $state): string {
                        if ($state instanceof CheckPageTemplate) {
                            return $state->label();
                        }

                        $enum = CheckPageTemplate::tryFrom((string) $state);

                        return $enum?->label() ?? '—';
                    }),
                TextEntry::make('document_number')
                    ->label('Ҳужжат')
                    ->visible(fn (PaymentCheck $record): bool => $record->template !== CheckPageTemplate::DarkMexc),
                TextEntry::make('bank_name')
                    ->label('Банк номи'),
                TextEntry::make('card_number')
                    ->label('Карта рақами'),
                TextEntry::make('receiver_name')
                    ->label('Олувчи'),
                TextEntry::make('amount_hint')
                    ->label('Матн устида')
                    ->placeholder('—')
                    ->visible(fn (PaymentCheck $record): bool => $record->template !== CheckPageTemplate::DarkMexc),
                TextEntry::make('amount_display')
                    ->label('Асосий қатор')
                    ->visible(fn (PaymentCheck $record): bool => $record->template !== CheckPageTemplate::DarkMexc),
                TextEntry::make('status_label')
                    ->label('Статус')
                    ->visible(fn (PaymentCheck $record): bool => $record->template !== CheckPageTemplate::DarkMexc),
                TextEntry::make('receipt_button_url')
                    ->label('URL тугма')
                    ->placeholder('—')
                    ->url(fn (?string $state): ?string => filled($state) ? $state : null)
                    ->openUrlInNewTab()
                    ->visible(fn (PaymentCheck $record): bool => $record->template !== CheckPageTemplate::DarkMexc),
                TextEntry::make('created_at')
                    ->label('Создан')
                    ->dateTime()
                    ->placeholder('—'),
                TextEntry::make('updated_at')
                    ->label('Обновлён')
                    ->dateTime()
                    ->placeholder('—'),
            ]);
    }
}
