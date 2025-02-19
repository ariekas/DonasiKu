<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentationDonationResource\Pages;
use App\Filament\Resources\DocumentationDonationResource\RelationManagers;
use App\Models\DocumentationDonation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use App\Models\donations;

class DocumentationDonationResource extends Resource
{
    protected static ?string $model = DocumentationDonation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('donation_id')
                    ->label('Donasi')
                    ->options(donations::pluck('judul', 'id'))
                    ->required(),
                TextInput::make('judul')->required()->maxLength(255),
                Textarea::make('deskripsi')->required(),
                FileUpload::make('image')->image()->disk('public') // Menyimpan gambar di disk 'public'
                ->directory('image')->required(),
                TextInput::make('jumlah_donasi')->numeric()->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('donation.judul')->label('Judul Donasi'),
                TextColumn::make('judul')->sortable()->searchable(),
                ImageColumn::make('image'),
                TextColumn::make('jumlah_donasi')->money('IDR'),
                TextColumn::make('created_at')->dateTime('d M Y'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListDocumentationDonations::route('/'),
            'create' => Pages\CreateDocumentationDonation::route('/create'),
            'edit' => Pages\EditDocumentationDonation::route('/{record}/edit'),
        ];
    }
}
