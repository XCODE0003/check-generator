<?php

namespace App\Filament\Resources\PaymentChecks;

use App\Filament\Resources\PaymentChecks\Pages\CreatePaymentCheck;
use App\Filament\Resources\PaymentChecks\Pages\EditPaymentCheck;
use App\Filament\Resources\PaymentChecks\Pages\ListPaymentChecks;
use App\Filament\Resources\PaymentChecks\Pages\ViewPaymentCheck;
use App\Filament\Resources\PaymentChecks\Schemas\PaymentCheckForm;
use App\Filament\Resources\PaymentChecks\Schemas\PaymentCheckInfolist;
use App\Filament\Resources\PaymentChecks\Tables\PaymentChecksTable;
use App\Models\PaymentCheck;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PaymentCheckResource extends Resource
{
    protected static ?string $model = PaymentCheck::class;

    protected static ?string $navigationLabel = 'Чеки на оплату';

    protected static ?string $modelLabel = 'Чек';

    protected static ?string $pluralModelLabel = 'Чеки';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'document_number';

    public static function form(Schema $schema): Schema
    {
        return PaymentCheckForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PaymentCheckInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PaymentChecksTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPaymentChecks::route('/'),
            'create' => CreatePaymentCheck::route('/create'),
            'view' => ViewPaymentCheck::route('/{record}'),
            'edit' => EditPaymentCheck::route('/{record}/edit'),
        ];
    }
}
