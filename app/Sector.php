<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    //
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id', 'designation','description','user_id'
    ];

     public function users(){
        return $this->ManyToOne(user::class ,'user_id');
    }
}
