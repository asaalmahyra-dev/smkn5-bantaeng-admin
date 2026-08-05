<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AchievementResource\Pages;
use App\Models\Achievement;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Actions;
use Filament\Schemas\Components\Section;
use Filament\Tables;
use Filament\Tables\Table;

class AchievementResource extends Resource
{
    protected static ?string $model = Achievement::class;

protected static ?int $navigationSort = 4;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-trophy';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Konten';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Informasi Prestasi')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Prestasi')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('category')
                            ->label('Kategori')
                            ->options([
                                'Competition' => 'Competition',
                                'Academic' => 'Academic',
                                'Non-academic' => 'Non-academic',
                                'Award' => 'Award',
                            ]),
                        Forms\Components\Select::make('level')
                            ->label('Tingkat')
                            ->options([
                                'District' => 'District',
                                'Province' => 'Province',
                                'National' => 'National',
                                'International' => 'International',
                            ]),
                        Forms\Components\TextInput::make('year')
                            ->label('Tahun')
                            ->maxLength(10),
                    ])->columns(2),

                Section::make('Detail')
                    ->schema([
                        Forms\Components\RichEditor::make('description')
                            ->label('Deskripsi')
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('image')
                            ->label('Gambar')
                            ->image()
                            ->directory('achievements'),
                        Forms\Components\TagsInput::make('participants')
                            ->label('Partisipan')
                            ->placeholder('Tambahkan nama partisipan'),
                        Forms\Components\Toggle::make('featured')
                            ->label('Unggulan'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul Prestasi')
                    ->searchable()
                    ->sortable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('category')
                    ->label('Kategori')
                    ->badge(),
                Tables\Columns\TextColumn::make('level')
                    ->label('Tingkat')
                    ->badge(),
                Tables\Columns\TextColumn::make('year')
                    ->label('Tahun')
                    ->sortable(),
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
                        'Competition' => 'Competition',
                        'Academic' => 'Academic',
                        'Non-academic' => 'Non-academic',
                        'Award' => 'Award',
                    ]),
                Tables\Filters\SelectFilter::make('level')
                    ->label('Tingkat')
                    ->options([
                        'District' => 'District',
                        'Province' => 'Province',
                        'National' => 'National',
                        'International' => 'International',
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
            'index' => Pages\ListAchievements::route('/'),
            'create' => Pages\CreateAchievement::route('/create'),
            'edit' => Pages\EditAchievement::route('/{record}/edit'),
        ];
    }
}
