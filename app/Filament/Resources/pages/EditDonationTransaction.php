<?php
namespace App\Filament\Resources\Pages;

use App\Filament\Resources\DonationTransactionResource;
use Filament\Resources\Pages\EditRecord;

class EditDonationTransaction extends EditRecord
{
    protected static string $resource = DonationTransactionResource::class;
}
