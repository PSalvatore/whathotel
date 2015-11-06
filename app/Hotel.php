<?php namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Hotel extends Model{

        protected $table = 'hotels';

        protected $fillable = [
            'hotel_name',
            'nightly_price',
            'valet',
            'image_name'
        ];

    }
