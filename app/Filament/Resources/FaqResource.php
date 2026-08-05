<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FaqResource\Pages;
use App\Models\Faq;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Actions;
use Filament\Schemas\Components\Section;
use Filament\Tables;
use Filament\Tables\Table;

class FaqResource extends Resource
{
    protected static ?string $model = Faq::class;

    protected static ?int $navigationSort = 7;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-question-mark-circle';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Konten';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Informasi FAQ')
                    ->schema([
                        Forms\Components\Select::make('category')
                            ->label('Kategori')
                            ->options([
                                'pendaftaran' => 'Pendaftaran',
                                'akademik' => 'Akademik',
                                'administrasi' => 'Administrasi',
                                'fasilitas' => 'Fasilitas',
                                'umum' => 'Umum',
                            ]),
                        Forms\Components\Textarea::make('question')
                            ->label('Pertanyaan')
                            ->required()
                            ->rows(3)
                            ->columnSpanFull(),
                        Forms\Components\RichEditor::make('answer')
                            ->label('Jawaban')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('sort_order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category')
                    ->label('Kategori')
                    ->badge()
                    ->sortable(),
                Tables\Columns\TextColumn::make('question')
                    ->label('Pertanyaan')
                    ->searchable()
                    ->limit(60),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable(),
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
                        'pendaftaran' => 'Pendaftaran',
                        'akademik' => 'Akademik',
                        'administrasi' => 'Administrasi',
                        'fasilitas' => 'Fasilitas',
                        'umum' => 'Umum',
                    ]),
            ])
            ->actions([
                Actions\EditAction::make(),
                Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Actions\BulkActionGroup::make([
                    Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort_order');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFaqs::route('/'),
            'create' => Pages\CreateFaq::route('/create'),
            'edit' => Pages\EditFaq::route('/{record}/edit'),
        ];
    }
}
