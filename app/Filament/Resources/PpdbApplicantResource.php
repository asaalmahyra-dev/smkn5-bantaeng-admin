<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PpdbApplicantResource\Pages;
use App\Models\PpdbApplicant;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Actions;
use Filament\Schemas\Components\Section;
use Filament\Tables;
use Filament\Tables\Table;

class PpdbApplicantResource extends Resource
{
    protected static ?string $model = PpdbApplicant::class;

    protected static ?int $navigationSort = 11;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-users';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'PPDB';
    }

    public static function getNavigationLabel(): string
    {
        return 'Pendaftar PPDB';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Data Pribadi')
                    ->schema([
                        Forms\Components\TextInput::make('nisn')
                            ->label('NISN')
                            ->required()
                            ->maxLength(20)
                            ->unique(ignoreRecord: true),
                        Forms\Components\TextInput::make('nama_lengkap')
                            ->label('Nama Lengkap')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('tempat_lahir')
                            ->label('Tempat Lahir')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('tanggal_lahir')
                            ->label('Tanggal Lahir')
                            ->required(),
                        Forms\Components\Select::make('jenis_kelamin')
                            ->label('Jenis Kelamin')
                            ->required()
                            ->options([
                                'L' => 'Laki-laki',
                                'P' => 'Perempuan',
                            ]),
                        Forms\Components\Select::make('agama')
                            ->label('Agama')
                            ->options([
                                'Islam' => 'Islam',
                                'Kristen' => 'Kristen',
                                'Katolik' => 'Katolik',
                                'Hindu' => 'Hindu',
                                'Buddha' => 'Buddha',
                                'Konghucu' => 'Konghucu',
                            ]),
                    ])->columns(3),

                Section::make('Alamat')
                    ->schema([
                        Forms\Components\Textarea::make('alamat')
                            ->label('Alamat')
                            ->required()
                            ->rows(2)
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('rt_rw')
                            ->label('RT/RW')
                            ->maxLength(20),
                        Forms\Components\TextInput::make('kelurahan')
                            ->label('Kelurahan')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('kecamatan')
                            ->label('Kecamatan')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('kota')
                            ->label('Kota/Kabupaten')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('provinsi')
                            ->label('Provinsi')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('kode_pos')
                            ->label('Kode Pos')
                            ->maxLength(10),
                    ])->columns(3),

                Section::make('Pendaftaran')
                    ->schema([
                        Forms\Components\Select::make('jalur')
                            ->label('Jalur Pendaftaran')
                            ->required()
                            ->options([
                                'zonasi' => 'Zonasi',
                                'afirmasi' => 'Afirmasi',
                                'perpindahan' => 'Perpindahan',
                                'prestasi' => 'Prestasi',
                            ]),
                        Forms\Components\Select::make('ppdb_config_id')
                            ->label('Gelombang PPDB')
                            ->relationship('ppdbConfig', 'tahun_ajaran')
                            ->required()
                            ->searchable()
                            ->preload(),
                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->required()
                            ->options([
                                'menunggu' => 'Menunggu',
                                'diterima' => 'Diterima',
                                'ditolak' => 'Ditolak',
                                'daftar_ulang' => 'Daftar Ulang',
                                'mengundurkan_diri' => 'Mengundurkan Diri',
                            ])
                            ->default('menunggu'),
                    ])->columns(3),

                Section::make('Sekolah Asal')
                    ->schema([
                        Forms\Components\TextInput::make('asal_sekolah')
                            ->label('Asal Sekolah')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('npsn_sekolah')
                            ->label('NPSN Sekolah')
                            ->maxLength(20),
                        Forms\Components\TextInput::make('rata_rata_rapor')
                            ->label('Rata-rata Rapor')
                            ->numeric()
                            ->step(0.01)
                            ->helperText('Diisi untuk jalur prestasi'),
                    ])->columns(3),

                Section::make('Prestasi (Jalur Prestasi)')
                    ->schema([
                        Forms\Components\Repeater::make('prestasi')
                            ->label('Prestasi yang pernah diraih')
                            ->schema([
                                Forms\Components\TextInput::make('nama')
                                    ->label('Nama Prestasi')
                                    ->required(),
                                Forms\Components\Select::make('tingkat')
                                    ->label('Tingkat')
                                    ->options([
                                        'sekolah' => 'Sekolah',
                                        'kecamatan' => 'Kecamatan',
                                        'kota' => 'Kota/Kabupaten',
                                        'provinsi' => 'Provinsi',
                                        'nasional' => 'Nasional',
                                        'internasional' => 'Internasional',
                                    ])
                                    ->required(),
                                Forms\Components\TextInput::make('juara')
                                    ->label('Juara ke-')
                                    ->numeric(),
                            ])
                            ->columns(3)
                            ->defaultItems(0),
                    ]),

                Section::make('Pilihan Jurusan')
                    ->schema([
                        Forms\Components\Select::make('jurusan_1')
                            ->label('Pilihan 1')
                            ->relationship('jurusanPertama', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),
                        Forms\Components\Select::make('jurusan_2')
                            ->label('Pilihan 2')
                            ->relationship('jurusanKedua', 'name')
                            ->searchable()
                            ->preload(),
                        Forms\Components\Select::make('jurusan_3')
                            ->label('Pilihan 3')
                            ->relationship('jurusanKetiga', 'name')
                            ->searchable()
                            ->preload(),
                    ])->columns(3),

                Section::make('Data Orang Tua / Wali')
                    ->schema([
                        Forms\Components\TextInput::make('nama_ayah')
                            ->label('Nama Ayah')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('nama_ibu')
                            ->label('Nama Ibu')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('nama_wali')
                            ->label('Nama Wali')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('pekerjaan_ortu')
                            ->label('Pekerjaan Orang Tua')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('penghasilan_ortu')
                            ->label('Penghasilan Orang Tua (per bulan)')
                            ->numeric()
                            ->prefix('Rp'),
                        Forms\Components\TextInput::make('no_hp_ortu')
                            ->label('No. HP Orang Tua')
                            ->required()
                            ->tel()
                            ->maxLength(20),
                    ])->columns(3),

                Section::make('Catatan')
                    ->schema([
                        Forms\Components\Textarea::make('catatan')
                            ->label('Catatan Admin')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nisn')
                    ->label('NISN')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_lengkap')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jalur')
                    ->label('Jalur')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'zonasi' => 'info',
                        'afirmasi' => 'success',
                        'perpindahan' => 'warning',
                        'prestasi' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('jurusanPertama.name')
                    ->label('Pilihan 1')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'menunggu' => 'warning',
                        'diterima' => 'success',
                        'ditolak' => 'danger',
                        'daftar_ulang' => 'info',
                        'mengundurkan_diri' => 'gray',
                    }),
                Tables\Columns\TextColumn::make('asal_sekolah')
                    ->label('Asal Sekolah')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('no_hp_ortu')
                    ->label('No. HP')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Daftar')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('jalur')
                    ->label('Jalur')
                    ->options([
                        'zonasi' => 'Zonasi',
                        'afirmasi' => 'Afirmasi',
                        'perpindahan' => 'Perpindahan',
                        'prestasi' => 'Prestasi',
                    ]),
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'menunggu' => 'Menunggu',
                        'diterima' => 'Diterima',
                        'ditolak' => 'Ditolak',
                        'daftar_ulang' => 'Daftar Ulang',
                        'mengundurkan_diri' => 'Mengundurkan Diri',
                    ]),
                Tables\Filters\SelectFilter::make('jurusan_1')
                    ->label('Jurusan')
                    ->relationship('jurusanPertama', 'name')
                    ->searchable()
                    ->preload(),
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
            'index' => Pages\ListPpdbApplicants::route('/'),
            'create' => Pages\CreatePpdbApplicant::route('/create'),
            'edit' => Pages\EditPpdbApplicant::route('/{record}/edit'),
            'view' => Pages\ViewPpdbApplicant::route('/{record}'),
        ];
    }
}

