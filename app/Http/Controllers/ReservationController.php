<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Reservation;
use App\Hotel;
use Request;
use Auth;

class ReservationController extends Controller
{
    public function show(){

        $reservations = Reservation::all();

        return view('reservations.index', compact('reservations'));
    }

    public function create(){

        $hotels = Hotel::lists('hotel_name', 'hotel_id');

        return view('reservations.create', compact('hotels'));
    }

    public function store(){

        $input = Request::all();
        $input['user_id'] = Auth::id();

        Reservation::create($input);

        return redirect('reservations');
    }
}
