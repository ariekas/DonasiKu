<?php

namespace App\Filament\Resources\DocumentationDonationResource\Pages;

use App\Filament\Resources\DocumentationDonationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDocumentationDonations extends ListRecords
{
    protected static string $resource = DocumentationDonationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
