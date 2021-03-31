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
       'id', 'appointment_date','appointment_time','patient_id','doctor_id','sector_id'
    ];

    public function users(){
        return $this->belongsToMany(user::class ,'users');
    }

    public function sectors(){
        return $this->belongsToMany(sector::class ,'sectors');
    }
}
