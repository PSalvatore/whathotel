<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Hotel;
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
        $findRes;

        $userMatch = User::where('username', 'LIKE', '%' + $find + '%')->get();
        $hotelMatch = Hotel::where('hotel_name', 'LIKE', '%' + $find + '%')->get();
        $resrvationMatch;

        $data = array(
            'userMatch'  => compact('userMatch'),
            'hotelMatch'   => compact('hotelMatch'),
            'reservationMatch' => null
        );

        var_dump($userMatch);

        return view('search.results')->with($data);
    }

}
