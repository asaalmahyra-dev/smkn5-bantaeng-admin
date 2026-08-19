<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Models\Gallery;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Actions;
use Filament\Schemas\Components\Section;
use Filament\Tables;
use Filament\Tables\Table;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?int $navigationSort = 3;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-photo';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Konten';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Informasi Galeri')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('department_id')
                            ->label('Jurusan Terkait')
                            ->relationship('department', 'name')
                            ->nullable()
                            ->searchable()
                            ->preload(),
                        Forms\Components\Select::make('category')
                            ->label('Kategori')
                            ->options([
                                'Pembelajaran' => 'Pembelajaran',
                                'Kegiatan Sekolah' => 'Kegiatan Sekolah',
                                'Profil Sekolah' => 'Profil Sekolah',
                                'Prestasi' => 'Prestasi',
                                'Kunjungan' => 'Kunjungan',
                                'Lainnya' => 'Lainnya',
                            ]),
                        Forms\Components\Select::make('type')
                            ->label('Tipe')
                            ->options([
                                'image' => 'Gambar',
                                'video' => 'Video',
                            ])
                            ->default('image')
                            ->required()
                            ->live(),
                        Forms\Components\FileUpload::make('thumbnail')
                            ->label('Thumbnail')
                            ->image()
                            ->directory('gallery/thumbnails'),
                        Forms\Components\FileUpload::make('image')
                            ->label('Gambar')
                            ->image()
                            ->disk('public')
                            ->directory('gallery')
                            ->visibility('public')
                            ->visible(fn (Forms\Get $get): bool => $get('type') === 'image'),
                        Forms\Components\TextInput::make('video')
                            ->label('URL Video (YouTube/Vimeo)')
                            ->url()
                            ->maxLength(255)
                            ->visible(fn (Forms\Get $get): bool => $get('type') === 'video'),
                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi')
                            ->rows(3)
                            ->columnSpanFull(),
                        Forms\Components\DateTimePicker::make('taken_at')
                            ->label('Tanggal Pengambilan'),
                        Forms\Components\Toggle::make('featured')
                            ->label('Unggulan'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->circular()
                    ->defaultImageUrl(fn ($record): string => 'https://ui-avatars.com/api/?name=' . urlencode($record->title)),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category')
                    ->label('Kategori')
                    ->badge(),
                Tables\Columns\TextColumn::make('type')
                    ->label('Tipe')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'image' => 'success',
                        'video' => 'warning',
                    }),
                Tables\Columns\IconColumn::make('featured')
                    ->label('Unggulan')
                    ->boolean(),
                Tables\Columns\TextColumn::make('taken_at')
                    ->label('Tanggal')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->label('Kategori')
                    ->options([
                        'Pembelajaran' => 'Pembelajaran',
                        'Kegiatan Sekolah' => 'Kegiatan Sekolah',
                        'Profil Sekolah' => 'Profil Sekolah',
                        'Prestasi' => 'Prestasi',
                        'Kunjungan' => 'Kunjungan',
                        'Lainnya' => 'Lainnya',
                    ]),
                Tables\Filters\SelectFilter::make('type')
                    ->label('Tipe')
                    ->options([
                        'image' => 'Gambar',
                        'video' => 'Video',
                    ]),
                Tables\Filters\TernaryFilter::make('featured')
                    ->label('Unggulan'),
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
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
