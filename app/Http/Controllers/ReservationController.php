<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();

        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        return view('reservations.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'status' => 'nullable|string',
            'source' => 'required|string',
            'segment' => 'required|string',
            'start' => 'required|date_format:Y-m-d\TH:i:s\Z',
            'end' => 'required|date_format:Y-m-d\TH:i:s\Z',
            'cancelled_at' => 'nullable|date_format:Y-m-d\TH:i:s\Z',
            'created_at_in_pms' => 'required|date_format:Y-m-d\TH:i:s\Z',
            'user_id' => 'required|integer',
            'room_id' => 'required|integer',
            'requested_category_id' => 'required|string',
            'rate_id' => 'required|string',
        ]);

        $reservation = new Reservation();
        $reservation->status = $validatedData['status'];
        $reservation->source = $validatedData['source'];
        $reservation->segment = $validatedData['segment'];
        $reservation->start = Carbon::createFromFormat('Y-m-d\TH:i:s\Z', $validatedData['start'])->setTimezone('UTC');
        $reservation->end = Carbon::createFromFormat('Y-m-d\TH:i:s\Z', $validatedData['end'])->setTimezone('UTC');
        $reservation->cancelled_at = $validatedData['cancelled_at'] ? Carbon::createFromFormat('Y-m-d\TH:i:s\Z', $validatedData['cancelled_at'])->setTimezone('UTC') : null;
        $reservation->created_at_in_pms = Carbon::createFromFormat('Y-m-d\TH:i:s\Z', $validatedData['created_at_in_pms'])->setTimezone('UTC');
        $reservation->user_id = $validatedData['user_id'];
        $reservation->room_id = $validatedData['room_id'];

        $reservation->save();

        return redirect()->route('reservations.show', ['reservation' => $reservation->id]);
    }

    public function show(Reservation $reservation)
    {
        return view('reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        return view('reservations.edit', compact('reservation'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'status' => 'required|string',
            'source' => 'required|string',
            'segment' => 'required|string',
            'start' => 'required|date',
            'end' => 'required|date',
            'cancelled_at' => 'nullable|date',
            'created_at_in_pms' => 'required|date',
            'user_id' => 'required|integer',
            'room_id' => 'required|integer',
            'requested_category_id' => 'required|string',
            'rate_id' => 'required|string',
        ]);

        // Update the reservation
        $reservation->update($validatedData);

        return redirect()->route('reservations.show', ['reservation' => $reservation->id]);
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservations.index');
    }
}
