<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id', 'designation','date','sector_id','patient_id','doctor_id','file','type','size'
    ];


    public function doctor(){
        return $this->belongsTo(Doctor::class );
    }
    public function patient(){
        return $this->belongsTo(Patient::class );
    }
    public function sector(){
        return $this->belongsTo(Sector::class );
    }
}
