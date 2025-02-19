<?php

namespace App\Filament\Resources\DocumentationDonationResource\Pages;

use App\Filament\Resources\DocumentationDonationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDocumentationDonation extends EditRecord
{
    protected static string $resource = DocumentationDonationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
