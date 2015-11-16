<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Hotel;
use App\Reservation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Request;
use Hash;

class SearchController extends Controller
{
    public function show(){

        return view('search.index');
    }

    public function find(){

        $find = Input::get('searchForm');

        $userMatch = User::where('username', 'LIKE', '%'.$find.'%')->get();
        $hotelMatch = Hotel::where('hotel_name', 'LIKE', '%'.$find.'%')->get();

        if($hotelMatch->isEmpty() === false){
            foreach ($hotelMatch as $hotel) {
                $reservationMatch = Reservation::join('hotels', 'reservations.hotel_id', '=', 'hotels.hotel_id')
                                                ->join('users', 'reservations.user_id', '=', 'users.id')
                                                ->select('reservations.reservation_id', 'users.username', 'hotels.hotel_name', 
                                                    'reservations.nights_qty', 'reservations.start_date as start_date', 
                                                    'reservations.room_number', 'reservations.suite',
                                                    'users.id as user_id', 'hotels.hotel_id as hotel_id')
                                                ->where('hotels.hotel_id', 'LIKE', '%'.$hotel->hotel_id.'%')->get();
            }
        }
        elseif($userMatch->isEmpty() === false){
            foreach ($userMatch as $user) {
                $reservationMatch = Reservation::join('hotels', 'reservations.hotel_id', '=', 'hotels.hotel_id')
                                                ->join('users', 'reservations.user_id', '=', 'users.id')
                                                ->select('reservations.reservation_id', 'users.username', 'hotels.hotel_name', 
                                                    'reservations.nights_qty', 'reservations.start_date as start_date', 
                                                    'reservations.room_number', 'reservations.suite',
                                                    'users.id as user_id', 'hotels.hotel_id as hotel_id')
                                                ->where('user_id', 'LIKE', '%'.$user->id.'%')->get();
            }
        }        

        $hotels = Hotel::lists('hotel_name', 'hotel_id');

        $users = User::lists('username', 'id');

        $data = array(
            'hotels' => $hotels,
            'users' => $users,
            'userMatch' => $userMatch,
            'hotelMatch' => $hotelMatch,
            'reservationMatch' => $reservationMatch
        );

        return view('search.results')->with($data);
    }
}
