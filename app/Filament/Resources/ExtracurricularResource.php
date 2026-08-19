<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExtracurricularResource\Pages;
use App\Models\Extracurricular;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Actions;
use Filament\Schemas\Components\Section;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ExtracurricularResource extends Resource
{
    protected static ?string $model = Extracurricular::class;

protected static ?int $navigationSort = 5;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-star';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Konten';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Informasi Ekstrakurikuler')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Ekstrakurikuler')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, \Filament\Schemas\Components\Utilities\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                        Forms\Components\TextInput::make('short_name')
                            ->label('Nama Singkat')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                        Forms\Components\Select::make('category')
                            ->label('Kategori')
                            ->options([
                                'Organisasi & Kepemimpinan' => 'Organisasi & Kepemimpinan',
                                'Karakter & Keterampilan' => 'Karakter & Keterampilan',
                                'Kesehatan & Kemanusiaan' => 'Kesehatan & Kemanusiaan',
                                'Pengembangan Diri' => 'Pengembangan Diri',
                            ]),
                        Forms\Components\Select::make('teacher_id')
                            ->label('Pembina')
                            ->relationship('teacher', 'name')
                            ->searchable()
                            ->preload(),
Forms\Components\Select::make('color')
                            ->label('Warna Tema')
                            ->options([
                                'brand' => 'Brand (Hijau)',
                                'blue' => 'Biru',
                                'yellow' => 'Kuning',
                                'red' => 'Merah',
                            ]),
                    ])->columns(3),

                Section::make('Jadwal & Lokasi')
                    ->schema([
                        Forms\Components\TextInput::make('schedule')
                            ->label('Jadwal')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('location')
                            ->label('Lokasi')
                            ->maxLength(255),
                    ])->columns(2),

Section::make('Konten')
                    ->schema([
Forms\Components\Select::make('icon')
                            ->label('Ikon')
                            ->options([
                                'users' => 'Users',
                                'compass' => 'Compass',
                                'landmark' => 'Landmark',
                                'heart-handshake' => 'Heart Handshake',
                                'heart-pulse' => 'Heart Pulse',
                                'sparkles' => 'Sparkles',
                                'target' => 'Target',
                                'handshake' => 'Handshake',
                                'trophy' => 'Trophy',
                            ])
                            ->searchable(),
                        Forms\Components\FileUpload::make('image')
                            ->label('Gambar')
                            ->image()
                            ->disk('public')
                            ->directory('extracurriculars')
                            ->visibility('public')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('image_alt')
                            ->label('Alt Text Gambar')
                            ->maxLength(255),
                        Forms\Components\Textarea::make('short_description')
                            ->label('Deskripsi Pendek')
                            ->rows(2)
                            ->columnSpanFull(),
                        Forms\Components\RichEditor::make('description')
                            ->label('Deskripsi Lengkap')
                            ->columnSpanFull(),
                        Forms\Components\Repeater::make('highlights')
                            ->label('Keunggulan / Aktivitas Utama')
                            ->schema([
                                Forms\Components\TextInput::make('item')->label('Item')->required(),
                            ]),
                        Forms\Components\Toggle::make('featured')
                            ->label('Unggulan'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Ekstrakurikuler')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category')
                    ->label('Kategori')
                    ->badge(),
                Tables\Columns\TextColumn::make('teacher.name')
                    ->label('Pembina')
                    ->searchable(),
                Tables\Columns\TextColumn::make('schedule')
                    ->label('Jadwal'),
                Tables\Columns\IconColumn::make('featured')
                    ->label('Unggulan')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->label('Kategori')
                    ->options([
                        'Organisasi & Kepemimpinan' => 'Organisasi & Kepemimpinan',
                        'Karakter & Keterampilan' => 'Karakter & Keterampilan',
                        'Kesehatan & Kemanusiaan' => 'Kesehatan & Kemanusiaan',
                        'Pengembangan Diri' => 'Pengembangan Diri',
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
            'index' => Pages\ListExtracurriculars::route('/'),
            'create' => Pages\CreateExtracurricular::route('/create'),
            'edit' => Pages\EditExtracurricular::route('/{record}/edit'),
        ];
    }
}
