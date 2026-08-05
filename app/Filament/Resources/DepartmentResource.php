<?php

namespace App\Filament\Resources;
use Filament\Schemas\Components\Section;

use App\Filament\Resources\DepartmentResource\Pages;
use App\Models\Department;
use Filament\Actions;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class DepartmentResource extends Resource
{
    protected static ?string $model = Department::class;

    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-building-office';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Master Data';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Informasi Dasar')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Jurusan')
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
                                'Teknologi & Rekayasa' => 'Teknologi & Rekayasa',
                                'Kesehatan & Pekerjaan Sosial' => 'Kesehatan & Pekerjaan Sosial',
                                'Agribisnis & Agroteknologi' => 'Agribisnis & Agroteknologi',
                            ])
                            ->searchable(),
                        Forms\Components\TextInput::make('headline')
                            ->label('Headline')
                            ->maxLength(255),
                    ])->columns(2),

                Section::make('Media & Pengaturan')
                    ->schema([
                        Forms\Components\FileUpload::make('cover_image')
                            ->label('Gambar Sampul')
                            ->image()
                            ->directory('departments')
                            ->columnSpanFull(),
                        Forms\Components\Toggle::make('featured')
                            ->label('Unggulan'),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),
                        Forms\Components\TextInput::make('sort_order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0),
                    ])->columns(3),

                Section::make('Konten')
                    ->schema([
                        Forms\Components\RichEditor::make('description')
                            ->label('Deskripsi')
                            ->columnSpanFull(),
                        Forms\Components\RichEditor::make('vision')
                            ->label('Visi')
                            ->columnSpanFull(),
                        Forms\Components\TagsInput::make('mission')
                            ->label('Misi')
                            ->placeholder('Tambah misi')
                            ->columnSpanFull(),
                        Forms\Components\TagsInput::make('competencies')
                            ->label('Kompetensi')
                            ->placeholder('Tambah kompetensi')
                            ->columnSpanFull(),
                        Forms\Components\TagsInput::make('career_paths')
                            ->label('Prospek Karir')
                            ->placeholder('Tambah prospek karir')
                            ->columnSpanFull(),
                        Forms\Components\Repeater::make('gallery')
                            ->label('Galeri Gambar')
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->label('Gambar')
                                    ->image()
                                    ->directory('departments/gallery'),
                            ])
                            ->defaultItems(0),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover_image')
                    ->label('Gambar')
                    ->circular()
                    ->defaultImageUrl(fn ($record): string => 'https://ui-avatars.com/api/?name=' . urlencode($record->name)),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Jurusan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('short_name')
                    ->label('Nama Singkat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category')
                    ->label('Kategori')
                    ->badge(),
                Tables\Columns\IconColumn::make('featured')
                    ->label('Unggulan')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->label('Kategori')
                    ->options([
                        'Teknologi & Rekayasa' => 'Teknologi & Rekayasa',
                        'Kesehatan & Pekerjaan Sosial' => 'Kesehatan & Pekerjaan Sosial',
                        'Agribisnis & Agroteknologi' => 'Agribisnis & Agroteknologi',
                    ]),
                Tables\Filters\TernaryFilter::make('featured')
                    ->label('Unggulan'),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Aktif'),
            ])
            ->defaultSort('sort_order')
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
            'index' => Pages\ListDepartments::route('/'),
            'create' => Pages\CreateDepartment::route('/create'),
            'edit' => Pages\EditDepartment::route('/{record}/edit'),
        ];
    }
}
