<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specialite;

class SpecialiteContoller extends Controller
{
	//
    public function create(Request $request){
       return Specialite::create($request->all());
       

    	}

    

   public function update(Request $request){
        $s= Specialite::find($request->input('id'));
        $s->update($request->all());
        return $s;
    }

     public function getAll(){

       return Specialite::all();

    }

     public function getById($id){
       return Specialite::find($id);
 
    }


     public function delete($id){

      return Specialite::where('id',$id)->delete();
    }

}
