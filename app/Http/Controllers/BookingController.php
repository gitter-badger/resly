<?php

namespace Resly\Http\Controllers;

use Illuminate\Http\Request;
use Resly\Booking;
use Resly\Table;
use Resly\Slots;

class BookingController extends Controller
{
    /**
     * Show the form for creating a new booking.
     *
     * @return \Illuminate\Http\Response
     */
    public function postBegin(Request $request)
    {
        // Receives restaurant Id, number of tables
        $validator = Validator::make(
            $request->all(),
            [
                'restaurant_id' => 'required|numeric',
                'number_of_people' => 'required|numeric',
                'booking_date' => 'required|date',
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
        }
        
        $seats_number = $request->input('number_of_people');
        $booking_date = $request->input('booking_date');
        $restaurant_id = $request->input('restaurant_id');

        $match = [
                    'seats_number' => $seats_number,
                    'restaurant_id' => $restaurant_id
                ];

        $table = Table::where($match)
                        ->first();
        $restaurant = Restaurant::findOrFail($restaurant_id);

        if (empty($table)) {
            return redirect()
                ->back()
                ->with('msg', 'No table available on that day.');
        }

        $match = [
            'table_id' => $table->table_id,
            'booking_date' => $booking_date,
        ];
        $bookings = Booking::where($match)
                    ->orderBy('booking_time')
                    ->get();
        $bookings = self::transformBooking($bookings);

        $opening_time = $restaurant->opening_time;
        $closing_time = $restaurant->closing_time;

        $slots = Slots::make(
            $opening_time,
            $closing_time,
            $bookings
        );

        return view('bookings.create', [
            'slots' => $slots,
            'booking_date' => $booking_date,
            'number_of_people' => $seats_number,
            'table_id' => $table->table_id,
        ]);
    }

    /**
     *  Print out validation errors, if ever.
     */
    public function getCreate()
    {
        return 'Could not create booking';
    }

    /**
     * Create and store a new booking from the provided
     * information.
     */
    public function postCreate(Request $request)
    {
        $validator = \Validator::make(
            $request->all(),
            [
                'table_id' => 'required|numeric',
                'booking_date' => 'required',
                'booking_time' => 'required',
                'number_of_people' => 'required|required',
            ]
        );

        if ($validator->fails()) {
            return redirect('/bookings/create')
                ->withErrors($validator);
        }

        $diner_id = \Auth::diner()->get()->id;

        $booking = $request->all();
        $booking['diner_id'] = $diner_id;

        $created_booking = Booking::create($booking);

        // Return success view here
        return dd($created_booking);
    }

    /**
     *  Take the bookings returned from an eloquent querry
     *  and passed in, and return an array of times.
     */
    private static function transformBooking($bookings = null)
    {
        if (empty($bookings)) {
            return false;
        }
        $final_bookings = [];
        foreach ($bookings as $booking) {
            $final_bookings[] = $booking->time;
        }

        return $final_bookings;
    }
}
