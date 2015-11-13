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

        $reservations = DB::table('reservations')
            ->join('hotels', 'reservations.hotel_id', '=', 'hotels.hotel_id')
            ->join('users', 'reservations.user_id', '=', 'users.id')
            ->select('reservations.reservation_id', 'users.username', 'hotels.hotel_name', 'reservations.nights_qty',
                     'reservations.start_date', 'reservations.room_number', 'reservations.suite',
                     'users.id as user_id', 'hotels.hotel_id')
            ->orderBy('reservation_id', 'asc')
            ->get();

        return view('reservations.index', compact('reservations'));
    }

    public function create($id = null){

        $hotels = Hotel::lists('hotel_name', 'hotel_id');

        return view('reservations.create', compact('hotels', 'id')); 
    }

    public function store(){

        $input = Request::all();
        $input['user_id'] = Auth::id();
        $input['start_date'] = date("Y-m-d", strtotime($input['start_date']));
       
        Reservation::create($input);

        return redirect('reservations');
    }

    public function delete($id){

        DB::table('reservations')->where('reservation_id', '=', $id)->delete();

        return redirect('reservations');
    }

    public function update($id, $col){

        $inputs = Request::all();
        // var_dump($inputs);
        // die();

        if($col === 'start_date'){
            $row = DB::table('reservations')->where('reservation_id', '=', $id)->update([$col => date("Y-m-d", strtotime($inputs[$col]))]);
        }
        else{
            $row = DB::table('reservations')->where('reservation_id', '=', $id)->update([$col => $inputs[$col]]);
        }
        
        
        return redirect('reservations');
    }

}
