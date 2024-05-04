<?php

namespace App\Filament\Resources\BuffetResource\Pages;

use App\Filament\Resources\BuffetResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBuffet extends EditRecord
{
    protected static string $resource = BuffetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
