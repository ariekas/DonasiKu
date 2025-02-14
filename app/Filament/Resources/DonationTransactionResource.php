<?php

namespace App\Filament\Resources;

use App\Models\donations_transaksi;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Actions\Action;

class DonationTransactionResource extends Resource
{
    protected static ?string $model = donations_transaksi::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // Menonaktifkan fitur Create dan hanya membolehkan Edit
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDonationTransactions::route('/'),
            // Menghilangkan halaman create
            // 'create' => Pages\CreateDonationTransaction::route('/create'),
        ];
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('nama')->required()->disabled(), // Nama tidak bisa diubah
                TextInput::make('jumlah_donasi')->required()->numeric()->disabled(), // Jumlah donasi tidak bisa diubah
                FileUpload::make('image')->disk('public')->required()->disabled(), // Gambar tidak bisa diubah
                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'canceled' => 'Canceled',
                    ])
                    ->default('pending')
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->sortable()->searchable(),
                TextColumn::make('donation.judul')->sortable(),
                TextColumn::make('jumlah_donasi')->sortable(),
                ImageColumn::make('image')
                ->disk('public')
                ->url(fn ($record) => asset('storage/' . $record->image)) // Membuat gambar clickable
                ->openUrlInNewTab(), // Membuka gambar di tab baru
            
            
                

                BadgeColumn::make('status')
                ->formatStateUsing(fn (string $state): string => match ($state) {
                    'pending' => 'Pending',
                    'confirmed' => 'Confirmed',
                    'canceled' => 'Canceled',
                    default => 'Unknown',
                })
                ->colors([
                    'secondary' => 'pending',
                    'success' => 'confirmed',
                    'danger' => 'canceled',
                ]),
            
                TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'canceled' => 'Canceled',
                    ]),
            ])
            ->actions([
                // Hanya memungkinkan mengedit status, bukan membuat data baru
                Action::make('Edit Status')
                    ->action(function ($record) {
                        // Aksi untuk mengedit status
                        $record->update(['status' => 'confirmed']);
                    })
                    ->label('Confirm')
                    ->icon('heroicon-o-check')
                    ->color('success'),
            ])
            ->bulkActions([
                Tables\Actions\BulkAction::make('confirmSelected')
                    ->action(function ($records) {
                        foreach ($records as $record) {
                            $record->update(['status' => 'confirmed']);
                        }
                    })
                    ->label('Confirm Selected'),
            ]);
    }
}

