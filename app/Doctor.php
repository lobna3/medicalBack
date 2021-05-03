<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       
    'id','shortBiography','state','status','codePostal','country','city','secretary_id',
    ];

      public function specialites(){
        return $this->belongsToMany(specialite::class ,'doctor_specialites');
    }
    public function user(){
        return $this->belongsTo(user::class ,'id' ,'id');
    }

}

