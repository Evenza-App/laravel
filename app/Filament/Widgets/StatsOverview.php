<?php

namespace App\Filament\Widgets;

use App\Models\Customer;
use App\Models\Reservation;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    //  use InteractsWithPageFilters;

    //  protected static ?int $sort = 0;

    protected static ?string $pollingInterval = '15s';

    protected static bool $isLazy = true;

    protected function getStats(): array
    {
        // return [
        //     Stat::make('Unique views', '192.1k'),
        //     Stat::make('Bounce rate', '21%'),
        //     Stat::make('Average time on page', '3:12'),
        // ];

        // return [
        //     Stat::make('Unique views', '192.1k')
        //         ->description('32k increase')
        //         ->descriptionIcon('heroicon-m-arrow-trending-up'),
        //     Stat::make('Bounce rate', '21%')
        //         ->description('7% increase')
        //         ->descriptionIcon('heroicon-m-arrow-trending-down'),
        //     Stat::make('Average time on page', '3:12')
        //         ->description('3% increase')
        //         ->descriptionIcon('heroicon-m-arrow-trending-up'),
        // ];

        return [
            Stat::make('الزبائن  ', Customer::count())
                //Stat::make('الزبائن الجدد ', '21%')
                ->description(' بازدياد')
                ->descriptionIcon('heroicon-m-user-group')
                ->chart([15, 4, 10, 2, 12, 4, 12])
                ->color('purple'),
            // Stat::make('New Customers', '21%')
            // ->description('13% increase')
            // ->descriptionIcon('heroicon-m-arrow-trending-up')
            // ->chart([15, 4, 10, 2, 12, 4, 12])
            // ->color('success'),
            Stat::make('الحجوزات  ', Reservation::count())
                ->description(' بازدياد')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('orange'),
            // Stat::make('الحجوزات التي قيد المعالجة ', Reservation::where('status', 'قيد المعالجة')->count())
            Stat::make('الحجوزات التي تم قبولها ', Reservation::where('status', 'Accepted')->count())
                ->description(' بازدياد')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 6, 10, 8, 15, 25, 17])
                ->color('success'),
            // Stat::make('New Orders', '98.1k')
            // ->description('32k increase')
            // ->descriptionIcon('heroicon-m-arrow-trending-up')
            // ->chart([7, 2, 10, 3, 15, 4, 17])
            // ->color('success'),
            // Stat::make(' متوسط الوقت في الصفحة', '11:11')
            //     ->description('3% increase')
            //     ->descriptionIcon('heroicon-m-arrow-trending-down')
            //     ->chart([17, 16, 14, 15, 14, 13, 12])
            //     ->color('danger'),
            // Stat::make('Average time on page', '11:11')
            // ->description('3% increase')
            // ->descriptionIcon('heroicon-m-arrow-trending-down')
            // ->chart([17, 16, 14, 15, 14, 13, 12])
            // ->color('danger'),
        ];
    }
}
