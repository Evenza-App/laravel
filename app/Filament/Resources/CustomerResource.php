<?php

namespace App\Filament\Resources;

// use function;
use App\Filament\Resources\CustomerResource\Pages;
use App\Models\Customer;
use App\Traits\Filament\HasTranslations;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\IconPosition;
use Filament\Tables;
use Filament\Tables\Table;

class CustomerResource extends Resource
{
    use HasTranslations;

    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'Customer';

    protected static ?string $modelLabel = 'Evenza Customer';

    protected static ?string $slug = 'evenza-Customers';

    protected static ?string $navigationGroup = 'Customer Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(' معلومات الزبون')
                    ->description('معلومات الزبون الشخصية هنا')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            //->type('color')
                            ->maxLength(255),
                        // Forms\Components\DatePicker::make('birthDate')
                        //     ->required()
                        //     ->maxDate('today'),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('address')
                            ->required()
                            ->columnSpanFull(),
                        // Forms\Components\Select::make('user_id')
                        //     ->relationship('user', 'id')
                        //     ->required(),
                    ])->columns(2),

                Fieldset::make('حساب الزبون')
                    ->relationship('user')
                    ->schema([
                        Forms\Components\TextInput::make('email')
                            //->label('Email')
                            ->hiddenOn('edit')
                            ->required(),
                        Forms\Components\TextInput::make('password')
                            // ->label('Password')
                            ->hiddenOn('edit')
                            ->password()
                            ->required(),
                    ]),
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label('أنشئ  ')
                            ->content(fn (Customer $record): ?string => $record->created_at?->diffForHumans()),

                        Forms\Components\Placeholder::make('updated_at')
                            ->label('عدل ')
                            ->content(fn (Customer $record): ?string => $record->updated_at?->diffForHumans()),
                    ])
                    ->columnSpan(['lg' => 1])
                    ->hidden(fn (?Customer $record) => $record === null),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            // ->columns([
            //     Tables\Columns\TextColumn::make('name')
            //         // ->searchable(isIndividual: true),
            //         ->searchable(),
            //     Tables\Columns\TextColumn::make('birthDate')
            //         ->date()
            //         ->sortable(),
            //     Tables\Columns\TextColumn::make('phone')
            //         ->searchable(),
            //     Tables\Columns\TextColumn::make('address'),
            //     Tables\Columns\TextColumn::make('user.email')
            //         ->searchable(),
            //     Tables\Columns\TextColumn::make('user.password')
            //         ->label('Password')
            //         ->numeric()
            //         ->sortable()
            //         ->toggleable(isToggledHiddenByDefault: true),
            //     Tables\Columns\TextColumn::make('created_at')
            //         ->dateTime()
            //         ->sortable()
            //         ->toggleable(isToggledHiddenByDefault: true),
            //     Tables\Columns\TextColumn::make('updated_at')
            //         ->dateTime()
            //         ->sortable()
            //         ->toggleable(isToggledHiddenByDefault: true),
            // ]) //->defaultSort('name' , 'desc')

            ->columns([
                Tables\Columns\Layout\Split::make([
                    Tables\Columns\Layout\Stack::make([
                        Tables\Columns\TextColumn::make('name')
                            ->searchable()
                            ->sortable()
                            ->icon('heroicon-m-user')
                            //  ->iconPosition(IconPosition::After)
                            ->iconColor('primary')
                            ->weight('medium')
                            ->alignLeft(),

                        Tables\Columns\TextColumn::make('user.email')
                            ->label('البريد الإلكتروني ')
                            ->icon('heroicon-m-envelope')
                            //  ->iconPosition(IconPosition::After)
                            ->iconColor('info')
                            ->searchable()
                            ->sortable()
                            ->color('gray')
                            ->alignLeft(),
                    ])->space(),

                    // Tables\Columns\Layout\Stack::make([
                    //     Tables\Columns\TextColumn::make('birthDate')
                    //         ->icon('heroicon-m-calendar-days')
                    //         // ->iconPosition(IconPosition::After)
                    //         ->iconColor('warning')
                    //         ->label('عيدالميلاد')
                    //         ->date()
                    //         ->alignLeft(),
                    // ])->space(3),

                    Tables\Columns\Layout\Stack::make([
                        Tables\Columns\TextColumn::make('phone')
                            ->icon('heroicon-m-phone')
                            // ->iconPosition(IconPosition::After)
                            ->iconColor('success')
                            ->label('الهاتف')
                            ->alignLeft(),

                        Tables\Columns\TextColumn::make('address')
                            ->icon('heroicon-m-map-pin')
                            // ->iconPosition(IconPosition::After)
                            ->iconColor('danger')
                            ->label('العنوان')
                            ->alignLeft(),
                    ])->space(3),

                ])->from('md'),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\ActionGroup::make([
                //   Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
                //  ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    // use Filament\Infolists\Infolist;
    // use Filament\Infolists\Components\TextEntry;

    // public static function infolist(Infolist $infolist): Infolist
    // {
    //     return $infolist
    //         ->schema([
    //    section::make('')
    //    ->schema([
    //     TextEntry::make('')->label(''),
    //     TextEntry::make('')->label(''),
    //    ])->columns(2)
    //
    //         ]);
    // }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomers::route('/'),
            // 'create' => Pages\CreateCustomer::route('/create'),
            // 'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
