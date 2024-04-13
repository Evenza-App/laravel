<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BuffetResource\Pages;
use App\Filament\Resources\BuffetResource\RelationManagers;
use App\Models\Buffet;
use App\Traits\Filament\HasTranslations;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BuffetResource extends Resource
{
    use HasTranslations;
    protected static ?string $model = Buffet::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-pie';

    protected static ?string $navigationLabel = 'Buffet';

    protected static ?string $modelLabel = 'Evenza Buffet';

    protected static ?string $slug = 'evenza-buffets';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationGroup = 'System Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(' معلومات البوفيه')
                    // ->description('معلومات الحجز المدخلة من قبل الزبون هنا')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->imageEditor()
                            ->required(),
                        Forms\Components\Textarea::make('ingredients')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('type')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('SYR'),
                        Forms\Components\Select::make('category_id')
                            ->relationship('category', 'name')
                            ->required(),

                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ingredients')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                //->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('price')
                    ->money('SYR')
                    ->sortable(),
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
                SelectFilter::make('Category')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->label(' البحث بواسطة الصنف ')
                    ->indicator('Buffet Category'),
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
            'index' => Pages\ListBuffets::route('/'),
            'create' => Pages\CreateBuffet::route('/create'),
            'edit' => Pages\EditBuffet::route('/{record}/edit'),
        ];
    }
}
