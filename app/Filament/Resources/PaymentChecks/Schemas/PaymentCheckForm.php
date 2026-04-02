<?php

namespace App\Filament\Resources\PaymentChecks\Schemas;

use App\Enums\CheckPageTemplate;
use App\Models\PaymentCheck;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Illuminate\Validation\ClosureValidationRule;

class PaymentCheckForm
{
    public static function isClassicTemplate(mixed $template): bool
    {
        $value = $template instanceof CheckPageTemplate ? $template->value : (string) ($template ?? '');

        return $value === '' || $value === CheckPageTemplate::Classic->value;
    }

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('public_slug')
                    ->label('Адрес в URL')
                    ->helperText('Латиница, цифры, «_», «-», «.» (например: test). Пусто при создании — подставится случайный UUID. Нельзя использовать зарезервированные слова (admin, up и т.д.).')
                    ->maxLength(128)
                    ->nullable()
                    ->rules(['nullable', 'regex:/^[a-zA-Z0-9_\-\.]{1,128}$/'])
                    ->rule(new ClosureValidationRule(function (string $attribute, mixed $value, \Closure $fail): void {
                        if (! is_string($value) || $value === '') {
                            return;
                        }
                        $lower = strtolower(trim($value));
                        foreach (config('payment_check.reserved_public_slugs', []) as $reserved) {
                            if ($lower === strtolower((string) $reserved)) {
                                $fail('Этот адрес зарезервирован системой — выберите другое значение.');
                            }
                        }
                    }))
                    ->validationAttribute('адрес в URL')
                    ->validationMessages([
                        'regex' => 'Допустимы латинские буквы, цифры, символы _ - . (до 128 символов).',
                        'unique' => 'Такой адрес уже занят другим чеком.',
                    ])
                    ->required(fn (string $operation): bool => $operation === 'edit')
                    ->unique(PaymentCheck::class, 'public_slug', ignoreRecord: true),
                Select::make('template')
                    ->label('Дизайн страницы')
                    ->options(CheckPageTemplate::options())
                    ->required()
                    ->default(CheckPageTemplate::Classic->value)
                    ->live(),
                TextInput::make('document_number')
                    ->label('Номер ҳужжат (пилюля)')
                    ->visible(fn (Get $get): bool => self::isClassicTemplate($get('template')))
                    ->required(fn (Get $get): bool => self::isClassicTemplate($get('template')))
                    ->maxLength(255),
                TextInput::make('bank_name')
                    ->label('Банк номи')
                    ->required()
                    ->maxLength(255),
                TextInput::make('card_number')
                    ->label('Карта рақами')
                    ->required()
                    ->maxLength(255),
                TextInput::make('receiver_name')
                    ->label('Олувчи')
                    ->required()
                    ->maxLength(255),
                TextInput::make('amount_hint')
                    ->label('Матн устида (kichik, ихтиёрий)')
                    ->visible(fn (Get $get): bool => self::isClassicTemplate($get('template')))
                    ->default('Тўланадиган суммани менеджердан аниқлаштиринг')
                    ->maxLength(500),
                TextInput::make('amount_display')
                    ->label('Асосий қатор (қалин матн)')
                    ->visible(fn (Get $get): bool => self::isClassicTemplate($get('template')))
                    ->required(fn (Get $get): bool => self::isClassicTemplate($get('template')))
                    ->maxLength(255),
                TextInput::make('status_label')
                    ->label('Статус')
                    ->visible(fn (Get $get): bool => self::isClassicTemplate($get('template')))
                    ->required(fn (Get $get): bool => self::isClassicTemplate($get('template')))
                    ->default('Тўловга тайёр')
                    ->maxLength(255),
                TextInput::make('receipt_button_url')
                    ->label('URL тугма «Чекни бухгалтерияга юбориш»')
                    ->visible(fn (Get $get): bool => self::isClassicTemplate($get('template')))
                    ->url()
                    ->maxLength(2048),
            ]);
    }
}
