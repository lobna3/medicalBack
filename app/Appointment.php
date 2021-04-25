<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id','phone' ,'note','appointment_date','appointment_time','patient_id','doctor_id'
    ];

    public function doctor(){
        return $this->belongsTo(doctor::class );
    }

    public function patient(){
        return $this->belongsTo(user::class ,'patient_id');
    }
}
