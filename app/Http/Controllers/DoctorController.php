<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use DB;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function addview(){
        $doctor=Auth::id();
        $date = date('Y-m-d',time());
        $data = DB::table('appointments')
              ->select('*')
              ->where('doctor', '=', $doctor)
              ->where('date','=',$date)
              ->get();
            
        
       
        $appointmentsToday =$data->count();
        
        
        return view('doctor.view_patients',compact('data'),compact('appointmentsToday'));
    }


   

    public function homedoctor(){
        return view('doctor.home');
    }
    public function addprescription(){
        return view('doctor.addprescription');
    }
   
}