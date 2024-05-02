<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\ReservationResource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestReservation extends BaseWidget
{
    protected static ?string $heading = ' الحجوزات الأخيرة';

    protected static ?int $sort = 3;

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(ReservationResource::getEloquentQuery())
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')

            ->columns([

                Tables\Columns\TextColumn::make('user.email')
                    ->label('الزبون')
                    ->icon('heroicon-m-envelope')
                    ->iconColor('info')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('event.name')
                    ->label('نوع المناسبة')
                    ->icons([
                        'heroicon-m-cake' => 'عيد ميلاد',
                        'heroicon-m-gift' => ' افتتاح ',
                        'heroicon-m-user-group' => 'حفل زفاف',
                        'heroicon-m-users' => 'حفلة خطوبة',
                        'heroicon-m-user-plus' => 'حفلة تحديد جنس المولود',
                        'heroicon-m-academic-cap' => 'حفلة تخرج',

                    ])
                    ->iconColor('primary')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->icons([
                        'heroicon-m-face-smile' => 'مقبول',
                        'heroicon-m-face-frown' => 'مرفوض',
                        'heroicon-m-arrow-left-start-on-rectangle' => 'قيد المعالجة',
                        'heroicon-m-banknotes' => 'بحالة الدفع',
                        'heroicon-m-check-circle' => 'اكتمل الحجز',
                    ])
                    ->colors([
                        'success' => 'مقبول',
                        'danger' => 'مرفوض',
                        'warning' => 'قيد المعالجة',
                        'pink' => 'بحالة الدفع',
                    ])
                    ->label('حالة الحجز')
                    ->searchable(),
                //  ->icon('heroicon-m-arrow-left-start-on-rectangle')

                //  ->iconColor('success'),
                // ->searchable()
                // ->sortable(),
                Tables\Columns\TextColumn::make('date')
                    ->label(' تاريخ الحجز')
                    ->searchable()
                    ->icon('heroicon-m-calendar-days')
                    ->iconColor('pink')
                    ->date(),

            ]);
    }
}
