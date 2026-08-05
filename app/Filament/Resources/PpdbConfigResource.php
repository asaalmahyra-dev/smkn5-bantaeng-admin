<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PpdbConfigResource\Pages;
use App\Models\PpdbConfig;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Actions;
use Filament\Schemas\Components\Section;
use Filament\Tables;
use Filament\Tables\Table;

class PpdbConfigResource extends Resource
{
    protected static ?string $model = PpdbConfig::class;

    protected static ?int $navigationSort = 10;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-cog-6-tooth';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'PPDB';
    }

    public static function getNavigationLabel(): string
    {
        return 'Konfigurasi PPDB';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Informasi Umum')
                    ->schema([
                        Forms\Components\TextInput::make('tahun_ajaran')
                            ->label('Tahun Ajaran')
                            ->required()
                            ->placeholder('contoh: 2025/2026')
                            ->maxLength(20),
                        Forms\Components\Select::make('gelombang')
                            ->label('Gelombang')
                            ->options([
                                '1' => 'Gelombang 1',
                                '2' => 'Gelombang 2',
                                '3' => 'Gelombang 3',
                            ])
                            ->default('1'),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(false),
                        Forms\Components\RichEditor::make('pengumuman')
                            ->label('Pengumuman PPDB')
                            ->helperText('Pengumuman yang muncul di portal pendaftaran')
                            ->columnSpanFull(),
                    ])->columns(3),

                Section::make('Jadwal PPDB')
                    ->schema([
                        Forms\Components\DateTimePicker::make('pendaftaran_mulai')
                            ->label('Pendaftaran Mulai')
                            ->required()
                            ->seconds(false),
                        Forms\Components\DateTimePicker::make('pendaftaran_selesai')
                            ->label('Pendaftaran Selesai')
                            ->required()
                            ->seconds(false),
                        Forms\Components\DateTimePicker::make('pengumuman_mulai')
                            ->label('Pengumuman Mulai')
                            ->seconds(false),
                        Forms\Components\DateTimePicker::make('daftar_ulang_mulai')
                            ->label('Daftar Ulang Mulai')
                            ->seconds(false),
                        Forms\Components\DateTimePicker::make('daftar_ulang_selesai')
                            ->label('Daftar Ulang Selesai')
                            ->seconds(false),
                    ])->columns(3),

                Section::make('Daya Tampung & Kuota Jalur')
                    ->schema([
                        Forms\Components\TextInput::make('daya_tampung_total')
                            ->label('Daya Tampung Total')
                            ->numeric()
                            ->required()
                            ->default(0)
                            ->helperText('Total siswa baru yang diterima'),
                        Forms\Components\TextInput::make('persen_zonasi')
                            ->label('Kuota Zonasi (%)')
                            ->numeric()
                            ->required()
                            ->default(50)
                            ->suffix('%'),
                        Forms\Components\TextInput::make('persen_afirmasi')
                            ->label('Kuota Afirmasi (%)')
                            ->numeric()
                            ->required()
                            ->default(15)
                            ->suffix('%'),
                        Forms\Components\TextInput::make('persen_perpindahan')
                            ->label('Kuota Perpindahan (%)')
                            ->numeric()
                            ->required()
                            ->default(5)
                            ->suffix('%'),
                        Forms\Components\TextInput::make('persen_prestasi')
                            ->label('Kuota Prestasi (%)')
                            ->numeric()
                            ->required()
                            ->default(30)
                            ->suffix('%'),
                        Forms\Components\TextInput::make('usia_maksimal_tahun')
                            ->label('Usia Maksimal (Tahun)')
                            ->numeric()
                            ->default(21),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tahun_ajaran')
                    ->label('Tahun Ajaran')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gelombang')
                    ->label('Gelombang')
                    ->badge(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
                Tables\Columns\TextColumn::make('pendaftaran_mulai')
                    ->label('Pendaftaran')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pendaftaran_selesai')
                    ->label('Selesai')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('daya_tampung_total')
                    ->label('Daya Tampung')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Aktif'),
            ])
            ->actions([
                Actions\EditAction::make(),
                Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Actions\BulkActionGroup::make([
                    Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPpdbConfigs::route('/'),
            'create' => Pages\CreatePpdbConfig::route('/create'),
            'edit' => Pages\EditPpdbConfig::route('/{record}/edit'),
        ];
    }
}

