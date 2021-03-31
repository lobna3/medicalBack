<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Information;

class InformationController extends Controller
{
     public function create(Request $request){
       
      return Information::create($request->all());
     

    }

   public function update(Request $request){
        $s= Information::find($request->input('id'));
        $s->update($request->all());
        return $s;
    }

     public function getAll(){

       return Information::all();

    }

     public function getById($id){
       return Information::find($id);
 
    }


     public function delete($id){

      return Information::where('id',$id)->delete();
    }
}
