<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sector;
use App\User;

class SectorsController extends Controller
{
    //

     public function createS(Request $request){
       
      
       $sector=Sector::create($request->all());

      

       
     
        return $sector;
    }

   public function updateS(Request $request){
        $s= Sector::find($request->input('id'));
        $s->update($request->all());
        return $s;
    }

     public function getAllS(){

       return Sector::all();

    }

     public function getByIdS($id){
       return Sector::find($id);
 
    }


     public function deleteS($id){

      return Sector::where('id',$id)->delete();
    }

}
