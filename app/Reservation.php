<?php namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Reservation extends Model{

        protected $table = 'reservations';

        protected $fillable = [
            'nights_qty',
            'start_date',
            'room_number',
            'suite',
            'hotel_id',
            'user_id'
        ];

    }
