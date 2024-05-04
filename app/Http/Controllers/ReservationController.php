<?php

namespace App\Http\Controllers;

use App\Filament\Resources\ReservationResource as ResourcesReservationResource;
use App\Http\Requests\ReservationRequest;
use App\Http\Resources\MyEventDetailsResource;
use App\Http\Resources\ReservationResource;
use App\Models\Reservation;
use App\Models\User;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::paginate();

        return ReservationResource::collection($reservations);
        // $reservations = Reservation::all();

        // return response()->json($reservations);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationRequest $request)
    {

        $data = $request->validated() + ['user_id' => auth()->id()];
        // $file = $request->file('image');
        // $data['image'] = Str::random() . ".{$file->extension()}";
        // $file->storeAs('public', $data['image']);
        $reservation = Reservation::create($data);
        $reservation->buffets()->attach($request->buffet_ids);
        foreach ($request->details as $detail) {
            $reservation->details()->create($detail);
        }

        Notification::make('reservation_created')
            ->title('حجز جديد')
            ->body('لدينا حجز جديد الرجاء الاطلاع ')
            ->actions([
                Action::make('go_to')
                    ->label('الذهاب إلى الحجوزات')
                    ->url(ResourcesReservationResource::getUrl()),
            ])
            ->sendToDatabase(User::find(1));

        return $reservation;
        // $reservation = Reservation::find(5);
        // $reservation->buffets()->sync(array(1, 2, 3));

        // $reservation = Reservation::find($reservation_id);
        // $reservation->buffets()->attach($buffet_id);

    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {

        return MyEventDetailsResource::make($reservation);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
