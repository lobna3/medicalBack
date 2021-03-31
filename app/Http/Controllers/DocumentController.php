<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
class DocumentController extends Controller
{
    //
   public function upload(request $request){
      $path = $request->file('file')->store('shared');
      return ['path' =>$path];

    }


      public function create(Request $request){
       
      return Document::create($request->all());
     

    }

   public function update(Request $request){
        $s= Document::find($request->input('id'));
        $s->update($request->all());
        return $s;
    }

     public function getAll(){

       return Document::all();

    }

     public function getById($id){
       return Document::find($id);
 
    }


     public function delete($id){

      return Document::where('id',$id)->delete();
    }
}
