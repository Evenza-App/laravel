<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReservationResource\Pages;
use App\Filament\Resources\ReservationResource\RelationManagers;
use App\Models\Reservation;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReservationResource extends Resource
{
    protected static ?string $model = Reservation::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-arrow-down';

    protected static ?string $navigationLabel = 'Reservation';

    protected static ?string $modelLabel = 'Reservation';

    protected static ?string $slug = 'reservations';

    protected static ?string $navigationGroup = 'Customer Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('date')
                    ->required(),
                Forms\Components\TextInput::make('time')
                    ->required(),
                Forms\Components\Textarea::make('location')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('numberOfPeople')
                    ->required()
                    ->numeric(),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required(),
                Forms\Components\TextInput::make('status')
                    ->required()
                    // ->badge()
                    ->maxLength(255),
                Forms\Components\Select::make('event_id')
                    ->relationship('event', 'name')
                    ->required(),
                Forms\Components\Select::make('photographer_id')
                    ->relationship('photographer', 'name')
                    ->required(),
                // Forms\Components\Select::make('user_id')
                //     ->relationship('user', 'id')
                //     ->required(),
                Fieldset::make('User')
                    ->relationship('user')
                    ->schema([
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->hiddenOn('edit')
                            ->required(),

                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('time'),
                Tables\Columns\TextColumn::make('location'),
                Tables\Columns\TextColumn::make('numberOfPeople')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    //->getStateUsing(fn (Reservation $record): string => $record->status?->'مقبول' ? 'مرفوض' : 'مقبول')
                    ->getStateUsing(function (Reservation $record) {
                        if ($record->status == ' مقبول ') {
                            return ' مقبول ';
                        } elseif ($record->status == 'مرفوض') {
                            return 'مرفوض';
                        } elseif ($record->status == 'قيد المعالجة') {
                            return 'قيد المعالجة';
                        }
                    })
                    ->colors([
                        'success' => ' مقبول ',
                        'danger' => 'مرفوض',
                        'warning' => 'قيد المعالجة',
                    ])
                    ->searchable(),
                Tables\Columns\TextColumn::make('event.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('photographer.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.email')
                    ->label('Email')
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
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\Action::make('مرفوض')
                        ->label(function (Reservation $record) {
                            if ($record->status == ' مقبول ') {
                                return 'رفض';
                            } elseif ($record->status == 'مرفوض') {
                                return ' قبول ';
                            } elseif ($record->status == 'قيد المعالجة') {
                                return 'قيد المعالجة';
                            }
                        })
                        ->color(function (Reservation $record) {
                            if ($record->status == ' مقبول ') {
                                return 'danger';
                            } elseif ($record->status == 'مرفوض') {
                                return 'success';
                            } elseif ($record->status == 'قيد المعالجة') {
                                return 'warning';
                            }
                        })
                        ->icon(function (Reservation $record) {
                            if ($record->status == ' مقبول ') {
                                return 'heroicon-c-face-frown';
                            } elseif ($record->status == 'مرفوض') {
                                return 'heroicon-c-face-smile';
                            } elseif ($record->status == 'قيد المعالجة') {
                                return 'heroicon-c-arrow-path';
                            }
                        })
                        ->requiresConfirmation(fn (Reservation $record) => $record->status == ' مقبول ')
                        ->action(function (Reservation $record) {
                            // $record->status =  !$record->status;
                            // $record->save();
                            $record->refresh();
                            if ($record->status == ' مقبول ') {
                                $record->status = 'مرفوض';
                                $record->save();
                                Notification::make('مرفوض')
                                    ->title('تم رفض الحجز')
                                    ->body("حجز يوم{$record->date} تم رفضه")
                                    ->success()
                                    ->send();
                                $record->refresh();
                            } elseif ($record->status == 'مرفوض') {
                                $record->status = ' مقبول ';
                                $record->save();
                                Notification::make(' مقبول ')
                                    ->title('تم قبول الحجز')
                                    ->body("حجز يوم{$record->date} تم قبول")
                                    ->success()
                                    ->send();
                                $record->refresh();
                            } else {
                                $record->status =  'قيد المعالجة';
                                $record->save();
                                Notification::make('قيد المعالجة')
                                    ->title('قيد المعالجة')
                                    ->body("حجز يوم{$record->date} يتم معالجة")
                                    ->success()
                                    ->send();
                                $record->refresh();
                            }
                        })

                    //         Tables\Actions\Action::make('رفض')
                    //             ->label('رفض')
                    //             ->color('danger')
                    //             ->icon('heroicon-c-face-frown')
                    //             ->requiresConfirmation()
                    //             ->action(function (Reservation $record) {
                    //                 $record->status = 'مرفوض';
                    //                 $record->save();
                    //                 Notification::make('رفض')
                    //                     ->title('تم رفض الحجز')
                    //                     ->body("حجز يوم{$record->date} تم رفضه")
                    //                     ->success()
                    //                     ->send();
                    //             }),
                    //         Tables\Actions\Action::make('قبول')
                    //             ->label('قبول')
                    //             ->color('success')
                    //             ->icon('heroicon-c-face-smile')
                    //             ->requiresConfirmation()
                    //             ->action(function (Reservation $record) {
                    //                 $record->status = 'مقبول';
                    //                 $record->save();
                    //                 Notification::make('قبول')
                    //                     ->title('تم قبول الحجز')
                    //                     ->body("حجز يوم{$record->date} تم قبوله")
                    //                     ->success()
                    //                     ->send();
                    //             }), Tables\Actions\Action::make('قيد المعالجة')
                    //             ->label('قيد المعالجة')
                    //             ->color('warning')
                    //             ->icon('heroicon-c-arrow-path')
                    //             ->requiresConfirmation()
                    //             ->action(function (Reservation $record) {
                    //                 $record->status = 'قيد المعالجة';
                    //                 $record->save();
                    //                 Notification::make('قيد المعالجة')
                    //                     ->title('يتم معالجة الحجز')
                    //                     ->body("حجز يوم{$record->date} يتم المعالجة")
                    //                     ->success()
                    //                     ->send();
                    //             }),
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
            'index' => Pages\ListReservations::route('/'),
            'create' => Pages\CreateReservation::route('/create'),
            'edit' => Pages\EditReservation::route('/{record}/edit'),
        ];
    }
}
