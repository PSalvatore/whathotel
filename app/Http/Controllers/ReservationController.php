<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Reservation;
use \DB;
use App\Hotel;
use Request;
use Auth;

class ReservationController extends Controller
{
    public function show(){

        $reservations = Reservation::all();

        return view('reservations.index', compact('reservations'));
    }

    public function create($id = null){

        $hotels = Hotel::lists('hotel_name', 'hotel_id');

        return view('reservations.create', compact('hotels', 'id')); 
    }

    public function store(){

        $input = Request::all();
        $input['user_id'] = Auth::id();

        Reservation::create($input);

        return redirect('reservations');
    }

    public function delete($id){

        DB::table('reservations')->where('reservation_id', '=', $id)->delete();

        return redirect('reservations');
    }

    public function update($id, $col){

        $inputs = Request::all();
        $row = DB::table('reservations')->where('reservation_id', '=', $id)->update([$col => $inputs[$col]]);
        
        return redirect('reservations');
    }

}
