<?php

namespace App\Filament\Resources;

use App\Enums\ReservationStatusEnum;
use App\Filament\Resources\ReservationResource\Pages;
use App\Jobs\SendFcmWhenChangeReservationStatusJob;
use App\Models\Payment;
use App\Models\Reservation;
use App\Traits\Filament\HasTranslations;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ReservationResource extends Resource
{
    use HasTranslations;

    protected static ?string $model = Reservation::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-arrow-down';

    protected static ?string $navigationLabel = 'Reservation';

    protected static ?string $modelLabel = 'Reservation';

    protected static ?string $slug = 'reservations';

    protected static ?string $navigationGroup = 'Customer Management';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function canViewAny(): bool
    {
        return true;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(' معلومات الحجز')
                    ->description('معلومات الحجز المدخلة من قبل الزبون هنا')
                    ->schema([
                        Forms\Components\TextInput::make('start_time')
                            ->required(),
                        Forms\Components\TextInput::make('end_time')
                            ->required(),
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->required(),
                        Forms\Components\DatePicker::make('date')
                            ->required(),
                        Forms\Components\Textarea::make('location')
                            ->required(),
                        //->columnSpanFull(),
                        Forms\Components\TextInput::make('number_of_people')
                            ->required()
                            ->numeric(),
                    ])->columns(2),
                Forms\Components\Repeater::make('buffets')
                    ->relationship('buffets')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required(),
                    ])

                    ->columns(2),
                // Forms\Components\Repeater::make('decoration answer')
                //     ->relationship('details')
                //     ->schema([
                //         Forms\Components\Repeater::make('eventdetail ')
                //             ->relationship('eventdetail'),

                //         Forms\Components\TextInput::make('value')
                //             ->required(),
                //     ])

                //     ->columns(2),

                Forms\Components\Section::make(' تفاصيل الحجز')
                    //->description('معلومات الحجز المدخلة من قبل الزبون هنا')
                    ->schema([

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

                    ])->columns(2),
                // Forms\Components\Select::make('user_id')
                //     ->relationship('user', 'id')
                //     ->required(),
                Fieldset::make('حساب الزبون')
                    ->relationship('user')
                    ->schema([
                        Forms\Components\TextInput::make('email')
                            //->label('Email')
                            ->hiddenOn('edit')
                            ->required(),

                    ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([

                Section::make('الصورة')
                    // ->description(' حساب الزبون ')
                    ->schema([
                        ImageEntry::make('image'),
                    ])->collapsible(),
                Section::make('حساب الزبون')
                    // ->description(' حساب الزبون ')
                    ->schema([
                        TextEntry::make('user.email'),
                    ])->collapsible(),
                Section::make(' المناسبة  ')
                    ->description(' المناسبة التي قام الزبون باختيارها ')
                    ->schema([
                        TextEntry::make('event.name'),
                    ])->collapsible(),
                Section::make(' معلومات الحجز')
                    ->schema([
                        TextEntry::make('start_time'),
                        TextEntry::make('end_time'),
                        TextEntry::make('date'),
                        TextEntry::make('location'),
                        TextEntry::make('number_of_people'),
                    ])->columns(2)
                    ->collapsible(),
                Section::make(' المصور ')
                    ->description(' المصور التي قام الزبون باختياره ')
                    ->schema([
                        TextEntry::make('photographer.name'),
                    ])->columns(2)
                    ->collapsible(),
                Section::make(' البوفيهات ')
                    ->description(' البوفيهات التي قام الزبون باختيارها ')
                    ->schema([
                        RepeatableEntry::make('Buffets')
                            ->schema([
                                TextEntry::make('name')->label('اسم البوفيه'),
                            ])->columnSpan(2)->columns(2),
                    ])->collapsible(),
                Section::make(' معلومات الديكور     ')
                    ->description(' المعلومات التي قام الزبون ب تعبئتها ')
                    ->schema([
                        RepeatableEntry::make('details')
                            ->schema([
                                TextEntry::make('name')->label('السؤال'),
                                TextEntry::make('value')->label('الجواب'),
                            ])->columns(2),
                    ])->collapsible(),
                Section::make(' معلومات الدفع ')
                    //->hidden()->when('status', 'بحالة الدفع')
                    //  ->hidden(fn (Forms\Get $get) => $get('status') != 'بحالة الدفع')
                    ->hidden(fn (Reservation $record) => $record->status !== 'NeedPayment')
                    //  ->description('')
                    ->schema([
                        TextEntry::make('payment.total_price'),
                        TextEntry::make('payment.message'),
                    ])->collapsible(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('date')
                    ->icon('heroicon-o-calendar-days')
                    ->iconColor('warning')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_time')
                    ->icon('heroicon-o-clock')
                    ->iconColor('sucess')
                    ->time(),
                Tables\Columns\TextColumn::make('end_time')
                    ->icon('heroicon-o-clock')
                    ->iconColor('success')
                    ->time(),
                Tables\Columns\TextColumn::make('location')
                    ->icon('heroicon-o-map-pin')
                    // ->iconPosition(IconPosition::After)
                    ->iconColor('danger'),
                Tables\Columns\TextColumn::make('number_of_people')
                    ->icon('heroicon-o-user-plus')
                    ->iconColor('info')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->formatStateUsing(fn ($state) => __($state))
                    //->getStateUsing(fn (Reservation $record): string => $record->status?->'مقبول' ? 'مرفوض' : 'مقبول')
                    ->getStateUsing(function (Reservation $record) {
                        if ($record->status == 'Accepted') {
                            return 'Accepted';
                        } elseif ($record->status == 'Rejected') {
                            return 'Rejected';
                        } elseif ($record->status == 'Pending') {
                            return 'Pending';
                        } elseif ($record->status == 'NeedPayment') {
                            return 'NeedPayment';
                        }
                    })
                    ->icons([
                        'heroicon-m-face-smile' => 'Accepted',
                        'heroicon-m-face-frown' => 'Rejected',
                        'heroicon-m-arrow-left-start-on-rectangle' => 'Pending',
                        'heroicon-m-banknotes' => 'NeedPayment',
                        // 'heroicon-m-banknotes'   => 'مكتمل'
                    ])
                    ->colors([
                        'success' => 'Accepted',
                        'danger' => 'Rejected',
                        'warning' => 'Pending',
                        'pink' => 'NeedPayment',
                        //'success' => 'مكتمل',
                    ])
                    ->searchable(),
                Tables\Columns\TextColumn::make('event.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('photographer.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.email')
                    //->label('Email')
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
                    // Tables\Actions\Action::make('مرفوض')
                    //     ->label(function (Reservation $record) {
                    //         if ($record->status == ' مقبول ') {
                    //             return 'رفض';
                    //         } elseif ($record->status == 'مرفوض') {
                    //             return ' قبول ';
                    //         } elseif ($record->status == 'قيد المعالجة') {
                    //             return 'قيد المعالجة';
                    //         }
                    //     })
                    //     ->color(function (Reservation $record) {
                    //         if ($record->status == ' مقبول ') {
                    //             return 'danger';
                    //         } elseif ($record->status == 'مرفوض') {
                    //             return 'success';
                    //         } elseif ($record->status == 'قيد المعالجة') {
                    //             return 'warning';
                    //         }
                    //     })
                    //     ->icon(function (Reservation $record) {
                    //         if ($record->status == ' مقبول ') {
                    //             return 'heroicon-c-face-frown';
                    //         } elseif ($record->status == 'مرفوض') {
                    //             return 'heroicon-c-face-smile';
                    //         } elseif ($record->status == 'قيد المعالجة') {
                    //             return 'heroicon-c-arrow-path';
                    //         }
                    //     })
                    //     ->requiresConfirmation(fn (Reservation $record) => $record->status == ' مقبول ')
                    //     ->action(function (Reservation $record) {
                    //         // $record->status =  !$record->status;
                    //         // $record->save();
                    //         $record->refresh();
                    //         if ($record->status == ' مقبول ') {
                    //             $record->status = 'مرفوض';
                    //             $record->save();
                    //             Notification::make('مرفوض')
                    //                 ->title('تم رفض الحجز')
                    //                 ->body("حجز يوم{$record->date} تم رفضه")
                    //                 ->success()
                    //                 ->send();
                    //             $record->refresh();
                    //         } elseif ($record->status == 'مرفوض') {
                    //             $record->status = ' مقبول ';
                    //             $record->save();
                    //             Notification::make(' مقبول ')
                    //                 ->title('تم قبول الحجز')
                    //                 ->body("حجز يوم{$record->date} تم قبول")
                    //                 ->success()
                    //                 ->send();
                    //             $record->refresh();
                    //         } else {
                    //             $record->status =  'قيد المعالجة';
                    //             $record->save();
                    //             Notification::make('قيد المعالجة')
                    //                 ->title('قيد المعالجة')
                    //                 ->body("حجز يوم{$record->date} يتم معالجة")
                    //                 ->success()
                    //                 ->send();
                    //             $record->refresh();
                    //         }
                    //     }),

                    Tables\Actions\Action::make('رفض')
                        ->label('رفض')
                        ->color('danger')
                        ->icon('heroicon-c-face-frown')
                        ->requiresConfirmation()
                        ->hidden(fn (Reservation $record) => $record->status !== 'Pending')
                        ->action(function (Reservation $record) {
                            $record->status = 'Rejected';
                            $record->save();
                            SendFcmWhenChangeReservationStatusJob::dispatch(ReservationStatusEnum::Rejected, $record->user_id);
                            Notification::make('رفض')
                                ->title('تم رفض الحجز')
                                ->body("حجز يوم {$record->date} تم رفضه")
                                ->success()
                                ->send();
                        }),
                    Tables\Actions\Action::make(' تم القبول')
                        ->label(' تم القبول')
                        ->color('success')
                        ->icon('heroicon-c-check-circle')
                        ->requiresConfirmation()
                        ->hidden(fn (Reservation $record) => $record->status !== 'NeedPayment')
                        ->action(function (Reservation $record) {
                            $record->status = 'Accepted';
                            $record->save();
                            SendFcmWhenChangeReservationStatusJob::dispatch(ReservationStatusEnum::Accepted, $record->user_id);
                            Notification::make('الدفع')
                                ->title('تم الدفع للحجز')
                                ->body("لهذا الحجز {$record->date} تم الدفع")
                                ->success()
                                ->send();
                        }),

                    // Tables\Actions\Action::make('مقبول')
                    //     ->label(' تم القبول')
                    //     ->color('success')
                    //     ->icon('heroicon-c-check-circle')
                    //     ->requiresConfirmation()
                    //     ->hidden(fn (Reservation $record) => $record->status !== 'بحالة الدفع')
                    //     ->action(function (Reservation $record) {
                    //         $record->status = 'مقبول';
                    //         $record->save();
                    //         Notification::make('الدفع')
                    //             ->title('تم الدفع للحجز')
                    //             ->body("لهذا الحجز {$record->date} تم الدفع")
                    //             ->success()
                    //             ->send();
                    //     }),
                    Tables\Actions\Action::make(' قبول')
                        ->label('قبول ')
                        ->color('success')
                        ->icon('heroicon-c-face-smile')
                        ->requiresConfirmation()
                        ->modalHeading(' التكلفة')
                        ->modalDescription('تكلفة هذا الحجز')
                        ->form([
                            TextInput::make('total_price')
                                ->required()
                                ->numeric()
                                ->prefix('$'),
                            TextInput::make('message'),
                        ])
                        // ->modalContent(view(''))
                        //->modalSubmitAction()
                        ->modalSubmitActionLabel('إرسال ')
                        ->hidden(fn (Reservation $record) => $record->status !== 'Pending')
                        ->action(function (array $data, Reservation $record): void {
                            $record->status = 'NeedPayment';
                            $record->save();
                            SendFcmWhenChangeReservationStatusJob::dispatch(ReservationStatusEnum::NeedPayment, $record->user_id);
                            $record->total_price = 'total_price';
                            $record->message = 'message';
                            $record->Payment()->create($data);
                            Notification::make('قبول')
                                ->title('تم قبول الحجز')
                                ->body("حجز يوم {$record->date} تم قبوله")
                                //->body(" تم قبول حجز {$record->date}الرجاء الدفع ")
                                ->success()
                                ->send();
                            // $record->save();
                        }),
                    //->hidden(fn (Reservation $record) => $record->status !== 'قيد المعالجة'),
                    // ->action(fn ($records) => $records->each->delete())
                    // ->action(function (Reservation $record) {
                    //     $record->status = 'مقبول';
                    //     $record->save();

                    // })

                    // ->action(function (array $data, Reservation $record): void {
                    //     $payment = new Payment();
                    //     $payment->total_price = $data['total_price'];
                    //     $payment->message = $data['message'];

                    //     $record->Payment()->create($data);
                    //     $record->save();
                    // })
                    // ->action(function (array $data, Reservation $record): void {
                    //     $data = [
                    //         'total_price' => $data['total_price'],
                    //         'message' => $data['message'],
                    //     ];

                    //     $record->Payment()->create($data);
                    //     $record->save();
                    // })

                    //  $record->payment()->create($data['total_price']);
                    // $record->payment()->create($data['message']);
                    //$record->total_price = $data['total_price'];
                    //$record->message = $data['message'];
                    //   $record = Payment::create($data['message']);
                    //   $record->payment()->create('');
                    // $record->total_price = $data['total_price'];
                    // $record->message = $data['message'];
                    // $record->Payment()->associate($data['total_price']);
                    // $record->Payment()->associate($data['message']);

                    // $this->record->modal_value = $data['modal_value'];

                    // ->action(function (Payment $record) {
                    //     $record->total_price = total_price;
                    //     $record->message = 'message';
                    //     $record->save();
                    // })

                    // ->action(function (Payment $record): void {
                    //     $record->total_price->associate($record['التكلفة']);
                    //     $record->message->associate($record['ملاحظة']);
                    //     $record->save();
                    //     //$record->sendToDatabase(Payment::class);
                    // })

                    // Tables\Actions\Action::make('قيد المعالجة')
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
            //  'edit' => Pages\EditReservation::route('/{record}/edit'),
        ];
    }
}
