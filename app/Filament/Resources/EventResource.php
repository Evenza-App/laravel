<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Models\Event;
use App\Traits\Filament\HasTranslations;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class EventResource extends Resource
{
    use HasTranslations;

    protected static ?string $model = Event::class;

    //protected static ?string $navigationIcon = 'heroicon-o-cake';

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationLabel = 'Event';

    protected static ?string $modelLabel = 'Event';

    protected static ?string $slug = 'events';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'System Management';

    public static function canViewAny(): bool
    {
        //return auth()->user()->id != 1;
        return true;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Section::make(' معلومات المناسبة')
                    // ->description('')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->imageEditor()
                            ->required(),
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                    ])->columns(2),
                Forms\Components\Repeater::make('details')
                    ->label(' التفاصيل الخاصة في ديكور المناسبة')
                    ->relationship('details')
                    ->minItems(1)
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required(),
                        Forms\Components\Select::make('type')
                            ->options([
                                'string' => 'مربع نصي',
                                'number' => 'رقم',
                                'select' => 'سؤال و خياراته',
                            ])
                            ->live()
                            ->required(),
                        Forms\Components\Toggle::make('is_required')
                            ->required(),
                        Forms\Components\Repeater::make('options')
                            ->hidden(fn (Forms\Get $get) => $get('type') != 'select')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required(),
                            ]),
                    ])
                    // ->columns(2),
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name')
                    ->icons([
                        'heroicon-m-cake' => 'عيد ميلاد',
                        'heroicon-m-gift' => ' افتتاح ',
                        'heroicon-m-user-group' => 'حفل زفاف',
                        'heroicon-m-users' => 'حفلة خطوبة',
                        'heroicon-m-user-plus' => 'حفلة تحديد جنس المولود',
                        'heroicon-m-academic-cap' => 'حفلة تخرج',

                    ])
                    ->iconColor('primary')
                    ->searchable(),
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
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
