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
     public function getAllByDoctorId($id){
        
       return Appointment::where('doctor_id',$id)->with('doctor.user')->with('doctor.specialites')->get()

       ;

    }

     public function getAllByPatientId($id){
        
       return Appointment::where('patient_id',$id)->with('patient.user')->get()

       ;

    }

     public function getById($id){
       return Appointment::find($id);
 
    }


     public function delete($id){

      return Appointment::where('id',$id)->delete();
    }
}
