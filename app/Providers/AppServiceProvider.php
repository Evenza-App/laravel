<?php

namespace App\Providers;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\Fieldset;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
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

        TextInput::configureUsing(function (TextInput $textColumn) {
            $textColumn
                ->label(__($textColumn->getName()));
        });

        FileUpload::configureUsing(function (FileUpload $textColumn) {
            $textColumn
                ->label(__($textColumn->getName()));
        });
        Textarea::configureUsing(function (Textarea $textColumn) {
            $textColumn
                ->label(__($textColumn->getName()));
        });
        DatePicker::configureUsing(function (DatePicker $textColumn) {
            $textColumn
                ->label(__($textColumn->getName()));
        });
        Select::configureUsing(function (Select $textColumn) {
            $textColumn
                ->label(__($textColumn->getName()));
        });
        Fieldset::configureUsing(function (Fieldset $textColumn) {
            $textColumn
                ->label(__($textColumn->getName()));
        });
        Repeater::configureUsing(function (Repeater $textColumn) {
            $textColumn
                ->label(__($textColumn->getName()));
        });
        Toggle::configureUsing(function (Toggle $textColumn) {
            $textColumn
                ->label(__($textColumn->getName()));
        });
        MarkdownEditor::configureUsing(function (MarkdownEditor $textColumn) {
            $textColumn
                ->label(__($textColumn->getName()));
        });

        TextEntry::configureUsing(function (TextEntry $textColumn) {
            $textColumn
                ->label(__($textColumn->getName()));
        });
        RepeatableEntry::configureUsing(function (RepeatableEntry $textColumn) {
            $textColumn
                ->label(__($textColumn->getName()));
        });
    }
}
