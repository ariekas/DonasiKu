<?php

namespace App\Filament\Resources\DonationTransactionResource\Pages;

use App\Filament\Resources\DonationTransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDonationTransaction extends EditRecord
{
    protected static string $resource = DonationTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
