<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    //

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id', 'campany_name','job_position','location','period_form','period_to','doctor_id'
    ];
}
