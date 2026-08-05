<?php

namespace App\Filament\Resources\PpdbApplicantResource\Pages;

use App\Filament\Resources\PpdbApplicantResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPpdbApplicant extends ViewRecord
{
    protected static string $resource = PpdbApplicantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

