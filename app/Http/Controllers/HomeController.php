<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Posts;
use App\Models\Records;
use App\Models\Patient;
use DB;
class HomeController extends Controller
{
  public function redirect(){
    
    $date = date('Y-m-d',time());
    if (Auth::id())
    {
        if(Auth::user()->role_id==1)
        {
         return view('doctor.home',compact('date'));

        }

        elseif(Auth::user()->role_id==2)
        {
          $doctor = doctor::all();
          $post  = posts::all();
          return view('admin.home',compact('doctor','date'),compact('post'));
        }
        else
        { 
          $data=Records::find(Auth::id());
          if($data === null)
          {
            $doctor = doctor::all();
            $post  = posts::all();
            $user =user::all();
            $patient=patient::all();
            return view('user.add_medical_record',compact('doctor','date','post','user','patient'));
          }
          else{
            $doctor = doctor::all();
            $post  = posts::all();
            $user =user::all();
            $patient=patient::all();
            return view('user.home',compact('doctor','date','post','user','patient'));
          }
         
        }
    }
    else{
        return redirect()->back;
        }
}

      public function index()
      {  
        $date = date('Y-m-d',time());
        if (Auth::id())
        {
          if(Auth::user()->role_id==1)
          {
            return view ('doctor.home',compact('data'));
          }
          elseif(Auth::user()->role_id==2)
          {
            $doctor=doctor::all();
            $post=posts::all();
            return view ('admin.home',compact('doctor','date'),compact('post'));
          }
          else{
            $doctor =doctor::all();
            $post =posts::all();
            $user=users::all();
            $patient=patient::find(Auth::id());
            return view ('user.home',compact('doctor','date','post','user','patient'));
          }
        }
        else
        {
          $doctor = doctor::all(); 
          $post  = posts::all();
          $user =user::all();
          $patient=patient::all();
          return view('user.home',compact('doctor','date','post','user','patient'));
        }
      }
     
      public function appointment(Request $request)
      {
        
        if(Auth::id()){
          $id_user=Auth::id();
          $patient =new patient;
          $patient->address=$request->address;
          $patient->gender=$request->gender;
          $patient->date_of_birth = $request->date_of_birth;
          if($patient->id !== $id_user){
          $patient->id = $id_user;
          $patient->save();
         }
         else
          $patient->save();
          $old_patient=patient::find($id_user);
          if ( $old_patient === null){///not registered as patient
            $patient =new patient;
            $patient->address=$request->address;
            $patient->gender=$request->gender;
            $patient->date_of_birth = $request->date_of_birth;
            $patient->save();
          } 
        }
        else{
          $user = User::where('email', '=', $request->email)->orwhere('phone_no', '=', $request->phone)->first(); 

          if ($user === null){
            $user = new user;
            $patient =new patient;
            $user->name=$request->fname;
            $user->lname=$request->lname;
            $user->email=$request->email;
            $user->phone_no=$request->phone;
            $user->password=NULL;
            $user->role_id = 3;
            $user->save();
            $patient->address=$request->address;
            $patient->gender=$request->gender;
            $patient->date_of_birth = $request->date_of_birth;
            $patient->id = $user->id ;
            $patient->save();
            $id_user= $user->id ;

          }
          else{
            $id_user=$user->id;
          }

        }

        $time = $request->date.' '.$request->time.':00';
        $existing_app = Appointment::where('start', '=', $time)->where('doctor_id', '=',$request->doctor )->first();
        if ($existing_app === null){
          $data = new appointment; 
          $data->doctor_id=$request->doctor;
          $data->user_id=$id_user;
          $data->date=$request->date;
          $data->time=$request->time;
          $data->start=$time;
          $data->end=$time;
          $data->status='In Progress';
          $data->save();
          return redirect()->back()->with('message','Appointment Request Successful');
        }
        else{
          return redirect()->back()->with('message','Please Choose Another Time');
        }
        
      }

      public function my_appointment()
      {
        if(Auth::id())
        {
          $userid=Auth::user()->id;
          $appoint=new appointment;                 
         $appoint= DB::table('appointments')
                 ->select('*')
                 ->where('user_id','=',$userid)
                 ->get();


         $data = User :: join('appointments', 'users.id', '=', 'appointments.doctor_id')
                 ->where ('appointments.user_id','like',$userid)
                 ->get();
          
        
          return view('user.my_appointment',compact('data'));
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
        $doctor = User :: join('doctors', 'users.id', '=', 'doctors.id')
                 ->get();
        $date = date('Y-m-d',time());
        
        return view('user.update_appoint',compact('data','doctor','date'));   
      }
      public function edit_appoint(Request $request,$id)
      {
        $data=appointment::find($id);
        $data->date=$request->date;
        $data->doctor_id=$request->doctor;
        $data->time=$request->time;
        $data->save();
        return redirect()->back()->with('message', 'Appointment Updated Successfully');  
      }
      public function diagnosis(){
        return view ('diagnosis.index');
      }
      public function skip(){
        $date = date('Y-m-d',time());
        $doctor = doctor::all();
        $post  = posts::all();
        $user =user::all();
        $patient=patient::all();
        return view('user.home',compact('doctor','date','post','user','patient'));
      }
}





