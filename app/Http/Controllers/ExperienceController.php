<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Experience;
class ExperienceController extends Controller
{
    //

     public function create(Request $request){
       
      return Experience::create($request->all());
     

    }

   public function update(Request $request){
        $s= Experience::find($request->input('id'));
        $s->update($request->all());
        return $s;
    }

     public function getAll(){

       return Experience::all();

    }

     public function getById($id){
       return Experience::find($id);
 
    }


     public function delete($id){

      return Experience::where('id',$id)->delete();
    }
}
