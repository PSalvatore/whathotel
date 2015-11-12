<?php namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Reservation extends Model{

        protected $table = 'reservations';

        protected $dates = ['start_date'];

        protected $fillable = [
            'nights_qty',
            'start_date',
            'room_number',
            'suite',
            'hotel_id',
            'user_id'
        ];

        public function setStartDateAttribute($start_date) {
            if ($start_date) {
                $this->attributes['start_date'] = date('Y-m-d',(strtotime($start_date)));
            } else {
                $this->attributes['start_date'] = '';
            }
        }

        public function getStartDateAttribute() {
            $tmpdate = $this->attributes['start_date'];
            if ($tmpdate == "0000-00-00" || $tmpdate == "") {
                return "";
            } else {
                return date('m/d/Y',strtotime($tmpdate));
            }
        }

    }
