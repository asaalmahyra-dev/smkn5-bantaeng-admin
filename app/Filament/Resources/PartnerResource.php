<?php

namespace App\Filament\Resources;
use Filament\Schemas\Components\Section;

use App\Filament\Resources\PartnerResource\Pages;
use App\Models\Partner;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Actions;
use Filament\Tables;
use Filament\Tables\Table;

class PartnerResource extends Resource
{
    protected static ?string $model = Partner::class;

    protected static ?int $navigationSort = 4;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationIcon(): ?string
    {
return 'heroicon-o-user-group';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Master Data';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Informasi Mitra')
                    ->schema([
                        Forms\Components\Select::make('departments')
                            ->label('Jurusan Terkait')
                            ->relationship('departments', 'name')
                            ->multiple()
                            ->searchable()
                            ->preload(),
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Mitra')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('industry')
                            ->label('Industri')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('website')
                            ->label('Website')
                            ->url()
                            ->maxLength(255),
                        Forms\Components\Select::make('collaboration_type')
                            ->label('Jenis Kerjasama')
                            ->options([
                                'Internship' => 'Internship',
                                'Curriculum Development' => 'Curriculum Development',
                                'Recruitment' => 'Recruitment',
                                'Guest Lecturer' => 'Guest Lecturer',
                            ]),
                    ])->columns(2),

                Section::make('Konten')
                    ->schema([
                        Forms\Components\FileUpload::make('logo')
                            ->label('Logo')
                            ->image()
                            ->disk('public')
                            ->directory('partners')
                            ->visibility('public'),
                        Forms\Components\RichEditor::make('description')
                            ->label('Deskripsi')
                            ->columnSpanFull(),
                        Forms\Components\Toggle::make('featured')
                            ->label('Unggulan'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
->columns([
                Tables\Columns\ImageColumn::make('logo')
                    ->label('Logo')
                    ->circular()
                    ->defaultImageUrl(fn ($record): string => 'https://ui-avatars.com/api/?name=' . urlencode($record->name)),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Mitra')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('industry')
                    ->label('Industri')
                    ->searchable(),
                Tables\Columns\TextColumn::make('collaboration_type')
                    ->label('Jenis Kerjasama')
                    ->badge(),
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
                Tables\Filters\SelectFilter::make('collaboration_type')
                    ->label('Jenis Kerjasama')
                    ->options([
                        'Internship' => 'Internship',
                        'Curriculum Development' => 'Curriculum Development',
                        'Recruitment' => 'Recruitment',
                        'Guest Lecturer' => 'Guest Lecturer',
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
            'index' => Pages\ListPartners::route('/'),
            'create' => Pages\CreatePartner::route('/create'),
            'edit' => Pages\EditPartner::route('/{record}/edit'),
        ];
    }
}

