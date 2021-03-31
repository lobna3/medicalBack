<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    //

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id', 'institution','subject','starting_date','complete_date','Degree','grade','doctor_id'
    ];
}
