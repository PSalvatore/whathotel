<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \DB;
use App\Hotel;
use Request;

class HotelController extends Controller
{
    public function show(){

        $hotels = Hotel::all();

        return view('hotels.index', compact('hotels'));
    }

    public function create(){

        return view('hotels.create');
    }

    public function store(){

        $input = Request::all();

        Hotel::create($input);

        return redirect('hotels');
    }

    public function delete($id){

        DB::table('hotels')->where('hotel_id', '=', $id)->delete();

        return redirect('hotels');
    }

    public function update($id, $col){

        $inputs = Request::all();
        $row = DB::table('hotels')->where('hotel_id', '=', $id)->update([$col => $inputs[$col]]);
        
        return redirect('hotels');
    }


}
