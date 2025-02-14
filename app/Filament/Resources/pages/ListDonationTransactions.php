<?php
namespace App\Filament\Resources\Pages;

use App\Filament\Resources\DonationTransactionResource;
use Filament\Resources\Pages\ListRecords;

class ListDonationTransactions extends ListRecords
{
    protected static string $resource = DonationTransactionResource::class;
}
