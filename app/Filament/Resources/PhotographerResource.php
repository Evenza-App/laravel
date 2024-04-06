<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PhotographerResource\Pages;
use App\Filament\Resources\PhotographerResource\RelationManagers;
use App\Models\Photographer;
use App\Traits\Filament\HasTranslations;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PhotographerResource extends Resource
{
    use HasTranslations;

    protected static ?string $model = Photographer::class;

    protected static ?string $navigationIcon = 'heroicon-o-camera';

    protected static ?string $navigationLabel = 'Photographer';

    protected static ?string $modelLabel = 'Photographer';

    protected static ?int $navigationSort = 4;

    protected static ?string $slug = 'photographers';

    protected static ?string $navigationGroup = 'System Management';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required(),
                Forms\Components\Textarea::make('bio')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('numOfhours')
                    ->required()
                    ->numeric(),
                Forms\Components\FileUpload::make('images')
                    //->required()
                    ->multiple()
                    ->imageEditor()
                    ->directory('images')
                //->columnSpanFull(),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('bio'),
                Tables\Columns\TextColumn::make('numOfhours')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('images'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPhotographers::route('/'),
            'create' => Pages\CreatePhotographer::route('/create'),
            'edit' => Pages\EditPhotographer::route('/{record}/edit'),
        ];
    }
}
