<?php

namespace App\Providers;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        TextColumn::configureUsing(function (TextColumn $textColumn) {
            $textColumn
                ->label(__($textColumn->getName()));
        });

        ImageColumn::configureUsing(function (ImageColumn $textColumn) {
            $textColumn
                ->label(__($textColumn->getName()));
        });

        TextInput::configureUsing(function (ImageColumn $textColumn) {
            $textColumn
                ->label(__($textColumn->getName()));
        });

        FileUpload::configureUsing(function (ImageColumn $textColumn) {
            $textColumn
                ->label(__($textColumn->getName()));
        });
    }
}
