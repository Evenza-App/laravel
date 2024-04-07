<?php

namespace App\Filament\Resources;

// use function;
use Filament\Forms;
use Filament\Tables;
use App\Models\Customer;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CustomerResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Traits\Filament\HasTranslations;
use Filament\Forms\Components\Fieldset;

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
                        Forms\Components\DatePicker::make('birthDate')
                            ->required(),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('address')
                            ->required(),
                        //->columnSpanFull(),
                        // Forms\Components\Select::make('user_id')
                        //     ->relationship('user', 'id')
                        //     ->required(),
                    ])->columns(2),

                Fieldset::make('المستخدم')
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    // ->searchable(isIndividual: true),
                    ->searchable(),
                Tables\Columns\TextColumn::make('birthDate')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address'),
                Tables\Columns\TextColumn::make('user.email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.password')
                    ->label('Password')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ]) //->defaultSort('name' , 'desc')
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
            'create' => Pages\CreateCustomer::route('/create'),
            // 'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
