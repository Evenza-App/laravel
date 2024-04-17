<?php

namespace App\Filament\Widgets;

use App\Models\Customer;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class CustomerChart extends ChartWidget
{
    // protected static ?string $heading = 'Total customers';

    protected static ?string $heading = 'إجمالي الزبائن ';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    // 'label' => 'Blog posts created',
                    // 'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                    'label' => 'Customers',
                    // 'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                    'data' => [4344, 5676, 6798, 7890, 8987, 9388, 10343, 10524, 13664, 14345, 15753, 17332],
                    'fill' => 'start',
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    // protected function getData(): array
    // {
    //     $data = $this->getCustomersPerMonth();
    //     return [
    //         'datastets' => [
    //             [
    //                 'lable' => 'الحجوزات',
    //                 'data' => $data[' customersPerMonth'],
    //                 //'fill' => 'start',
    //             ],
    //         ],
    //         'labels' => $data['months']
    //     ];
    // }


    // protected function getType(): string
    // {
    //     return 'line';
    // }

    // private function getCustomersPerMonth(): array
    // {
    //     $now = Carbon::now();
    //     $customersPerMonth = [];
    //     $months = collect(range(1, 12))->map(function ($month) use ($now,  $customersPerMonth) {
    //         $count = Customer::whereMonth('created_at', Carbon::parse($now->month($month)->format('Y-m-d')))->count();
    //         $customersPerMonth[] = $count;
    //         return $now->month($month)->format('M');
    //     })->toArray();
    //     return [
    //         ' customersPerMonth' =>  $customersPerMonth,
    //         'months' => $months
    //     ];
    // }

    // protected function getData(): array
    // {
    //     return [
    //         'datasets' => [
    //             [
    //                 // 'label' => 'Blog posts created',
    //                 // 'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
    //                 'label' => 'Customers',
    //                 // 'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
    //                 'data' => [4344, 5676, 6798, 7890, 8987, 9388, 10343, 10524, 13664, 14345, 15753, 17332],
    //                 'fill' => 'start',
    //             ],
    //         ],
    //         'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    //     ];
    // }


}
