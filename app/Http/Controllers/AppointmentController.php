<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;

class AppointmentController extends Controller
{
      public function create(Request $request){
       
      return Appointment::create($request->all());
     

    }

   public function update(Request $request){
        $s= Appointment::find($request->input('id'));
        $s->update($request->all());
        return $s;
    }

     public function getAll(){

       return Appointment::all();

    }

     public function getById($id){
       return Appointment::find($id);
 
    }


     public function delete($id){

      return Appointment::where('id',$id)->delete();
    }
}
