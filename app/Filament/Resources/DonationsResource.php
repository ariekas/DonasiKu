<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DonationsResource\Pages;
use App\Filament\Resources\DonationsResource\RelationManagers;
use App\Models\donations;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;

class DonationsResource extends Resource
{
    protected static ?string $model = donations::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->label('Judul')
                    ->required(),
                Forms\Components\Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->required(),
                Forms\Components\TextInput::make('target_donasi')
                    ->label('Target Donasi')
                    ->numeric()
                    ->required(),
                    Forms\Components\Textarea::make('nama_bank')
                    ->label('Nama Bank')
                    ->required(),
                    Forms\Components\TextInput::make('nomer_bank')
                    ->label('Nomer Bank')
                    ->numeric()
                    ->required(),
                    FileUpload::make('image')
                    ->label('Gambar Donasi')
                    ->disk('public') // Menyimpan gambar di disk 'public'
                    ->directory('image') // Menyimpan di folder 'donations'
                    ->image() // Pastikan ini hanya menerima file gambar
                    ->maxSize(2048), // Maksimal ukuran file 2MB
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                ->label('Judul'),
            Tables\Columns\TextColumn::make('deskripsi')
                ->label('Deskripsi')
                ->limit(50),
            Tables\Columns\TextColumn::make('target_donasi')
                ->label('Target jumlah Donasi'),
            Tables\Columns\TextColumn::make('jumlah_terkumpul')
                ->label('Jumlah Terkumpul')
                ->limit(50),
                Tables\Columns\TextColumn::make('nama_bank')
                    ->label('Nama Bank'),
                Tables\Columns\TextColumn::make('nomer_bank')
                    ->label('Nomer Bank'),
                
            Tables\Columns\TextColumn::make('created_at')
                ->label('Created At')
                ->dateTime(),
                ImageColumn::make('image')
                ->label('Image')
                ->disk('public')  // Memastikan Filament membaca file dari disk 'public'
                ->url(fn ($record) => asset('storage/' . $record->image)) // Menunjukkan URL gambar
                ->size(100), // Ukuran gambar yang ditampilkan
            
                
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
            'index' => Pages\ListDonations::route('/'),
        ];
    }
}
