<?php

namespace App\Filament\Resources\DonationTransactionResource\Pages;

use App\Filament\Resources\DonationTransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDonationTransaction extends CreateRecord
{
    protected static string $resource = DonationTransactionResource::class;
}
