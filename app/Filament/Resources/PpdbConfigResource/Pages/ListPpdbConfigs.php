<?php

namespace App\Filament\Resources\PpdbConfigResource\Pages;

use App\Filament\Resources\PpdbConfigResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPpdbConfigs extends ListRecords
{
    protected static string $resource = PpdbConfigResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

