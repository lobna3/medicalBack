<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
class DocumentController extends Controller
{
    //
   public function upload(request $request){
    if($request->hasfile('file')){
      $path = $request->file('file')->store('shared');
      return ['path' =>$path];

    }else{
      return ['tt'=>'rr'];
    }

    }


      public function create(Request $request){
       
      return Document::create($request->all());
     

    }

   public function update(Request $request){
        $s= Document::find($request->input('id'));
        $s->update($request->all());
        return $s;
    }

     public function getAll($id){
        
       return Document::where('doctor_id',$id)->with('doctor')->with('patient.user')->with('sector')->get();

    }
      public function getAllPatient($id){
        if($id != 0){
           return Document::where('patient_id',$id)->with('doctor')->with('patient')->with('sector')->get();
         }else{
           return Document::where('patient_id',NULL)->with('doctor')->with('patient')->with('sector')->get();;
         }
      

    }

     public function getById($id){
       return Document::find($id);
 
    }


     public function delete($id){

      return Document::where('id',$id)->delete();
    }
}
