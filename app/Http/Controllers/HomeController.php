<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use DB;
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
        if(Auth::id()){
          $data->user_id=Auth::id();
        }else{
          $user = User::where('email', '=', $request->email)->first();
          if ($user === null) {
            $user = User::where('phone_no', '=', $request->mobile)->first(); 
          }

          if ($user === null){

          }else{
            $data->user_id=$user->id;
          }

        }
        
         

        
          
        
        
        $data->name=$request->name;
        $data->email=$request->email;
        $data->mobile=$request->mobile;
        $data->phone=$request->phone;
        $data->doctor=$request->doctor;
        $data->date=$request->date;
        $data->history=$request->history;
        $data->medicine=$request->medicine;
        $data->status='In Progress';
        $data->save();
        
         /* if(Auth::id())
          {
          $data->user_id=Auth::user()->id;
          }*/

          $data->save();
          return redirect()->back()->with('message','Appointment Request Successful . We will contact you soon');
      }

      public function my_appointment()
      {
        if(Auth::id())
        {
          $userid=Auth::user()->id;
          $appoint=new appointment;
        // $appoint=appointment::where('user_id',$userid)->get();
         $appoint= DB::table('appointments')
                 ->select('*')
                 ->where('user_id','=',$userid)
                 ->get();
          //$doctor_id = $appoint->doctor;
          foreach ($appoint as  $app) {
            $doctor_id=$app->doctor;
            $data2=new doctor;
            $data2 = DB::table('doctors')
                ->select('name')
                ->where('id','LIKE', $doctor_id)
                ->get();
            foreach ( $data2 as  $app) {
              $data=$app->name;
            }
            // process element here
        }
          return view('user.my_appointment',compact('appoint'));
        }
        else
        {
          return redirect()->back();
        }
      }

      public function cancel_appoint($id)
      {
          $data=appointment::find($id);
          $data->delete();
          return redirect()->back();
      }
      public function update_appoint($id)
      {
        $data=appointment::find($id);
        return view('user.update_appoint',compact('data'));   
      }
      public function edit_appoint(Request $request,$id)
      {
        $data=appointment::find($id);
        $data->date=$request->date;
        $data->history=$request->history;
        $data->medicine=$request->medicine;
        $data->save();
        return redirect()->back()->with('message', 'Appointment Updated Successfully');  
      }

}
