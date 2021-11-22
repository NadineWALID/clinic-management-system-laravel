<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
class HomeController extends Controller
{
      public function redirect(){
          if (Auth::id())
          {
              if(Auth::user()->role_id==1){

                return view('doctor.home');

              }elseif(Auth::user()->role_id==2){

                return view('admin.home');

              }else{
                $doctor = doctor::all();
                return view('user.home',compact('doctor'));

              }

          }
          else{
              return redirect()->back;
              }
      }

      public function index()
      {  
        if (Auth::id())
        {
          return redirect('home');
        }
        else
        {
          $doctor = doctor::all();
         return view ('user.home',compact('doctor'));
        }
      }

      public function appointment(Request $request)
      {
          $data = new appointment;
          $data->name=$request->name;
          $data->email=$request->email;
          $data->mobile=$request->mobile;
          $data->phone=$request->phone;
          $data->doctor=$request->doctor;
          $data->date=$request->date;
          $data->history=$request->history;
          $data->medicine=$request->medicine;
          $data->status='In Progress';
          if(Auth::id())
          {
          $data->user_id=Auth::user()->id;
          }

          $data->save();
          return redirect()->back()->with('message','Appointment Request Successful . We will contact you soon');
      }

}
