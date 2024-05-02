<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\ReservationResource;
use App\Models\Reservation;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class OrderChart extends ChartWidget
{
    // protected static ?string $heading = 'Orders per month';
    protected static ?string $heading = '    عدد الحجوزات في كل شهر';

    protected static ?int $sort = 2;

    protected static string $color = 'info';

    protected function getData(): array
    {
        $data = $this->getProductsPerMonth();

        return [
            'datasets' => [
                [
                    'label' => 'الحجوزات في كل شهر  ',
                    'data' => $data['reservationsPerMonth'],
                ],
            ],
            'labels' => $data['months'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    private function getProductsPerMonth(): array
    {
        $now = Carbon::now();

        $reservationsPerMonth = [];
        $months = collect(range(1, 12))->map(function ($month) use ($now, &$reservationsPerMonth) {
            $count = Reservation::whereMonth('created_at', Carbon::parse($now->month($month)->format('Y-m')))->count();
            $reservationsPerMonth[] = $count;

            return $now->month($month)->format('M');
        })->toArray();

        return [
            'reservationsPerMonth' => $reservationsPerMonth,
            'months' => $months,
        ];
    }

    // protected function getData(): array
    // {
    //     return [
    //         'datasets' => [
    //             [
    //                 'label' => 'Orders',
    //                 'data' => [2433, 3454, 4566, 3300, 5545, 5765, 6787, 8767, 7565, 8576, 9686, 8996],
    //                 // 'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
    //                 'fill' => 'start',
    //             ],
    //         ],
    //         'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    //     ];
    // }

    // protected function getData(): array
    // {
    //     $data = $this->getReservationsPerMonth();
    //     return [
    //         'datastets' => [
    //             [
    //                 'lable' => 'الحجوزات',
    //                 'data' => $data[' reservationsPerMonth']
    //             ]
    //         ],
    //         'labels' => $data['months']
    //     ];
    // }

    // protected function getType(): string
    // {
    //     return 'line';
    // }

    // private function getReservationsPerMonth(): array
    // {
    //     $now = Carbon::now();
    //     $reservationsPerMonth = [];
    //     $months = collect(range(1, 12))->map(function ($month) use ($now,  $reservationsPerMonth) {
    //         $count = Reservation::whereMonth('created_at', Carbon::parse($now->month($month)->format('Y-m-d')))->count();
    //         $reservationsPerMonth[] = $count;
    //         return $now->month($month)->format('M');
    //     })->toArray();
    //     return [
    //         ' reservationsPerMonth' =>  $reservationsPerMonth,
    //         'months' => $months
    //     ];

    // }

    // protected function getData(): array
    // {
    //     return [
    //         'datasets' => [
    //             [
    //                 'label' => 'Orders',
    //                 'data' => [2433, 3454, 4566, 3300, 5545, 5765, 6787, 8767, 7565, 8576, 9686, 8996],
    //                 // 'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
    //                 'fill' => 'start',
    //             ],
    //         ],
    //         'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    //     ];
    // }

    // protected function getType(): string
    // {
    //     return 'pie';
    // }

    // protected function getData(): array
    // {
    //     $data = Reservation::select('status', DB::raw('count(*) as count'))
    //         ->groupBy('status')
    //         ->pluck('count', 'status')
    //         ->toArray();

    //     return [
    //         'datasets' => [
    //             [
    //                 'label' => 'الحجوزات',
    //                 'data' => array_values($data)
    //             ]
    //         ],
    //         // 'labels' => ReservationResource::cases()
    //     ];
    // }

    // protected function getType(): string
    // {
    //     return 'pie';
    // }
}
