<?php

namespace App\Filament\Resources\PpdbConfigResource\Pages;

use App\Filament\Resources\PpdbConfigResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPpdbConfig extends EditRecord
{
    protected static string $resource = PpdbConfigResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

