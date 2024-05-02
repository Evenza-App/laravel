<?php

namespace App\Filament\Resources\ReservationResource\Pages;

use App\Filament\Resources\ReservationResource;
use App\Models\Reservation;
use Filament\Actions;
use Filament\Forms\Components\Builder;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

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
            // 'الحجوزات المؤرشفة' => Tab::make()
            //     ->badge(Reservation::query()->where('status',  'مقبول')->count())
            //     //->badge(Reservation::query()->orderBy('created_at', 'asc')->first->count())
            //     // $oldestReservation = $this->reservations()->orderBy('created_at', 'asc')->first
            //     ->query(fn ($query) => $query->where('created_at', 'asc')->first),
            'الحجوزات المؤرشفة' => Tab::make()
                ->modifyQueryUsing(fn ($query) => $query->where('created_at'), '=', now()->subYear())
                ->badge(Reservation::query()->where(('created_at'), '=', now()->subYear())->count()),
            //->badge(Reservation::query()->where(('created_at'), '>', now()->subYear())->count()),
            // ->badge(Reservation::query()->orderBy('created_at', 'asc')->count())

        ];

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

    }
}
