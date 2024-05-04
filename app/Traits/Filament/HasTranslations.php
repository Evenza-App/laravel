<?php

namespace App\Traits\Filament;

trait HasTranslations
{
    public static function getModelLabel(): string
    {
        return __(static::$modelLabel);
    }

    public static function getPluralModelLabel(): string
    {
        return __(str(static::$modelLabel)->plural()->value());
    }

    public static function getNavigationLabel(): string
    {
        return __(str(static::$modelLabel)->plural()->value());
    }

    public static function getNavigationGroup(): ?string
    {
        return __(static::$navigationGroup);
    }
}
