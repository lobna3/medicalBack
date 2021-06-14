<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Patient;
use App\Doctor;
use App\Sector;
use App\DoctorSpecialite;
use App\Appointment;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    //
    public function register(Request $request){
    	$user=User::where('email',$request->input('email'))->first();
    	if(!empty($user)){
           return  response()->json(["msg"=>"Already have an account"] ,403);
    	}
    	else {
    		$user= User::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'phone' => $request->input('phone'),
            'genre' => $request->input('genre'),
            'adress' => $request->input('adress'),
            'datenaissance' => $request->input('datenaissance'),
           'email' => $request->input('email'),
           'role' => $request->input('role'),
            'password' => Hash::make($request->input('password'))
        ]);


        return Patient::create([
          'id'=>$user->id,
          'n_cnss'=>$request->input('n_cnss') ? $request->input('n_cnss') : ' ' ,
        ]);
    	}
    	
    }

     public function login(Request $request){
    	$user=User::where('email',$request->input('email'))->with('doctor')->with('patient')->first();
    	if(!empty($user)){
           if(Hash::check($request->input('password') , $user->password)){
           return $user;
           }
           else{
                return response()->json(["msg"=>"Password invalid"] ,403);
           }
    	}
    	else {
    		
         return response()->json(["msg"=>"email invalid!"],403);
    	}
    	
    }


//Doctors

    public function create(Request $request){
        $user=User::where('email',$request->input('email'))->first();
      if(!empty($user)){
           return  response()->json(["msg"=>"Doctors exits"] ,403);
      }
      else {
        $user= User::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'phone' => $request->input('phone'),
            'genre' => $request->input('genre'),
            'adress' => $request->input('adress'),
            'datenaissance' => $request->input('datenaissance'),
           'email' => $request->input('email'),
           'role' => $request->input('role'),
            'image' =>$request->input('image'),
            'password' => Hash::make($request->input('password'))
        ]);


         Doctor::create([
          'id'=>$user->id,
         'shortBiography'=> $request->input('shortBiography'),
         'codePostal'=> $request->input('codePostal'),
         'country'=> $request->input('country'),
         'city'=> $request->input('city'),
         'secretary_id'=> $request->input('secretary_id'),
          
        ]);

        



     
         

         $specialites=$request->input('specialites');
         foreach ($specialites as $s ) {
           $pivot=  DoctorSpecialite::create([
            'doctor_id' => $user->id,
            'specialite_id' => $s

           ]);
         }

         return $user;
      }

    }

   public function update(Request $request){
        $s= User::find($request->input('id'));
        $s->firstname = $request->input('firstname') ; 
        $s->lastname = $request->input('lastname') ;
        $s->datenaissance = $request->input('datenaissance') ;
        $s->genre = $request->input('genre') ;
        $s->adress = $request->input('adress') ;
        $s->save();

        $d=Doctor::find($request->input('id'));
        $d->state  = $request->input('doctor')['state '];
        $d->country = $request->input('doctor')['country'];
        $d->city = $request->input('doctor')['city'];
        $d->codePostal = $request->input('doctor')['codePostal'];
        $d->save();
        $data = User::where('id' , $request->input('id'))->with('doctor')->first();
        return $data;


    }

     public function getAll(){

       return User::where('role','doctor')->with('doctor')->with('doctor.specialites')->get();

    }

     public function getById($id){
       User::where('role','doctor')->get();
       return User::find($id);
 
    }


     public function delete($id){
      Doctor::where('id',$id)->delete();

      return User::where('id',$id)->delete();
    }
 

 //Patients

     public function createP(Request $request){
     $user=User::where('email',$request->input('email'))->first();
      if(!empty($user)){
           return  response()->json(["msg"=>"vous avez déja un compte"] ,403);
      }
      else {
        $user= User::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'phone' => $request->input('phone'),
            'genre' => $request->input('genre'),
            'adress' => $request->input('adress'),
            'image' =>$request->input('image'),
            'datenaissance' => $request->input('datenaissance'),
           'email' => $request->input('email'),
           'role' => $request->input('role'),
            'password' => Hash::make($request->input('password'))
        ]);


        return Patient::create([
          'id'=>$user->id,
          'n_cnss'=>$request->input('n_cnss'),
        ]);
      }

    }

   public function updateP(Request $request){
        $s= User::find($request->input('id'));
        $s->update($request->all());
        return $s;
    }

     public function getAllP(){

       return User::where('role','patient')->get();

    }

    public function getDoctorAllP($id_d){

$patients = Appointment::where('doctor_id' , $id_d)->select('patient_id')->get();

       return User::whereIn('id',$patients)->get();

    }

     public function getByIdP($id){
       User::where('role','patient')->get();
       return User::find($id);
 
 
    }


     public function deleteP($id){
       Patient::where('id',$id)->delete();
      return User::where('id',$id)->delete();
    }



    //Laboratorist
     public function getAllL(){

       return User::where('role','laboratorist')->get();

    }


       public function createL(Request $request){
      $user=User::where('email',$request->input('email'))->first();
      if(!empty($user)){
           return  response()->json(["msg"=>"vous avez déja un compte"] ,403);
      }
      else {
        $user= User::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'phone' => $request->input('phone'),
            'genre' => $request->input('genre'),
            'adress' => $request->input('adress'),
              'image' =>$request->input('image'),
            'datenaissance' => $request->input('datenaissance'),
           'email' => $request->input('email'),
           'role' => $request->input('role'),
            'password' => Hash::make($request->input('password'))
        ]);


     
      }
    }
     public function getByIdL($id){
       User::where('role','laboratorist')->get();
       return User::find($id);
 
    }

      //Secretary
     public function getAllS(){

       return User::where('role','scretary')->get();

    }


       public function createS(Request $request){
      $user=User::where('email',$request->input('email'))->first();
      if(!empty($user)){
           return  response()->json(["msg"=>"email exists !!!"] ,403);
      }
      else {
        $user= User::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'phone' => $request->input('phone'),
            'genre' => $request->input('genre'),
            'adress' => $request->input('adress'),
            'datenaissance' => $request->input('datenaissance'),
             'image' =>$request->input('image'),
           'email' => $request->input('email'),
           'role' => $request->input('role'),
            'password' => Hash::make($request->input('password'))
        ]);


     
      }
      
    }
     public function getByIdS($id){
       User::where('role','scretary')->get();
       return User::find($id);
 
    }

      public function deleteS($id){
    

      return User::where('id',$id)->delete();
    }

     public function updateS(Request $request){
        $s= User::find($request->input('id'));
        $s->update($request->all());
        return $s;
    }



    public function upload(request $request){
      $path = $request->file('avatar')->store('user');
      return ['path' =>$path];

    }


}
 