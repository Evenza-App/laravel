<?php

namespace App\Filament\Resources\ReservationResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use PHPUnit\TextUI\Configuration\Builder;
use Filament\Resources\Components\Tab;
use App\Filament\Resources\ReservationResource;
use App\Models\Reservation;

class ListReservations extends ListRecords
{
    protected static string $resource = ReservationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //  Actions\CreateAction::make(),

        ];
    }
    public function getTabs(): array
    {
        return [
            'الكل' => Tab::make(),
            // ->badge(Reservation::query()->where('status', 'الكل')->count()),
            'قيد المعالجة' => Tab::make()
                ->badge(Reservation::query()->where('status', 'قيد المعالجة')->count())
                ->query(fn ($query) => $query->where('status', 'قيد المعالجة')),
            'مقبول' => Tab::make()
                ->badge(Reservation::query()->where('status', 'مقبول')->count())
                ->query(fn ($query) => $query->where('status', 'مقبول')),
            'مرفوض' => Tab::make()
                ->badge(Reservation::query()->where('status', 'مرفوض')->count())
                ->query(fn ($query) => $query->where('status', 'مرفوض')),
            'بحالة الدفع' => Tab::make()
                ->badge(Reservation::query()->where('status', 'بحالة الدفع')->count())
                ->query(fn ($query) => $query->where('status', 'بحالة الدفع')),
        ];
    }
}
