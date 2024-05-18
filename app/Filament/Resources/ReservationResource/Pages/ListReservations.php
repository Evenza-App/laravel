<?php

namespace App\Filament\Resources\ReservationResource\Pages;

use App\Filament\Resources\ReservationResource;
use App\Models\Reservation;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

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
                ->badge(Reservation::query()->where('status', 'Pending')
                ->whereNot('date', '<', now())
                ->count())
                ->query(fn ($query) => $query->where('status', 'Pending')
                ->whereNot('date', '<', now())
            ),
            'مقبول' => Tab::make()
                ->badge(Reservation::query()->where('status', 'Accepted')->count())
                ->query(fn ($query) => $query->where('status', 'Accepted')),
            'مرفوض' => Tab::make()
                ->badge(Reservation::query()->where('status', 'Rejected')->count())
                ->query(fn ($query) => $query->where('status', 'Rejected')),
            'بحالة الدفع' => Tab::make()
                ->badge(Reservation::query()->where('status', 'NeedPayment')->count())
                ->query(fn ($query) => $query->where('status', 'NeedPayment')),

            'الحجوزات المؤرشفة' => Tab::make()
                ->modifyQueryUsing(fn ($query) => $query->whereDate('date', '<', now()))
                ->badge(Reservation::query()->whereDate('date', '<', now())->count()),
        ];













        // 'الحجوزات المؤرشفة' => Tab::make()
        //     ->badge(Reservation::query()->where('status',  'مقبول')->count())
        //     //->badge(Reservation::query()->orderBy('created_at', 'asc')->first->count())
        //     // $oldestReservation = $this->reservations()->orderBy('created_at', 'asc')->first
        //     ->query(fn ($query) => $query->where('created_at', 'asc')->first),




        //     '1الحجوزات المؤرشفة' => Tab::make()
        //         ->modifyQueryUsing(fn (Builder $query) => $query->where('created_at'), 'before', now())
        //         ->badge(Reservation::query()->where(('created_at'), 'before', now())->count()),
        //     // ->modifyQueryUsing(fn (Builder $query) => $query->where('date_hired', '>=', now()->subWeek()))
        //     // ->badge(Employee::query()->where('date_hired', '>=', now()->subWeek())->count()),


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
