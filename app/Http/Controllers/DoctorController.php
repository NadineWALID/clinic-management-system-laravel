<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use DB;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function addview(Request $request){
        $doctor=Auth::id();
        $date = date('Y-n-j',time());
        echo "<h2>" . $date . "</h2>";
        $data= DB::table('appointments')
              ->select('*')
              ->where('doctor', '=', $doctor)
              ->where('date','=',$date)
              ->get();
        $search_text= $request->get('search');
        $data2 = DB::table('users')
              ->select('*')
              ->where('name','LIKE',$search_text)
              ->orWhere('email', 'LIKE', $search_text)
              ->orWhere('phone_no', 'LIKE', $search_text)
              ->get();
       
        $appointmentsToday =$data->count();
       
        $data->appointmentsToday=$appointmentsToday;
        $data->data2=$data2;
        return view('doctor.view_patients',compact('data'));
    }


    

    public function search(Request $request){
        $pat=null;
        $search_text=$request->input('search');
        echo "<h2>" .$search_text. "</h2>";
        $pat = DB::table('users')
              ->select('*')
              ->where('name','=',$search_text)
              ->orWhere('email', '=', $search_text)
              ->orWhere('phone_no', '=', $search_text)
              ->get();
        return redirect()->back()->with('message', 'Search Successful');
        
    }

    public function homedoctor(){
        return view('doctor.home');
    }
    public function addprescription(){
        return view('doctor.addprescription');
    }
   
}