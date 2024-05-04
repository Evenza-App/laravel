<?php

namespace App\Filament\Resources\BuffetResource\Pages;

use App\Filament\Resources\BuffetResource;
use App\Models\Buffet;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListBuffets extends ListRecords
{
    protected static string $resource = BuffetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    // public function getTabs(): array
    // {
    //     return ([
    //         'All' => Tab::make(),
    //         'This Week' => Tab::make()
    //             ->modifyQueryUsing(fn (Builder $query) => $query->where('created_at'), '=', now()->subWeek())
    //             ->badge(Buffet::query()->where(('created_at'), '>', now()->subWeek())->count()),
    //         'This Month' => Tab::make()
    //             ->modifyQueryUsing(fn (Builder $query) => $query->where('created_at'), '=', now()->subMonth())
    //             ->badge(Buffet::query()->where(('created_at'), '>', now()->subMonth())->count()),
    //         'This Year' => Tab::make()
    //             ->modifyQueryUsing(fn (Builder $query) => $query->where('created_at'), '=', now()->subYear())
    //             ->badge(Buffet::query()->where(('created_at'), '>', now()->subYear())->count()),
    //     ]);
    // }
}
