<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','n_cnss'
    ];

      public function user(){
        return $this->belongsTo(User::class ,'id' ,'id' );
    }
}
