<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Patient;

class FullCalenderController extends Controller
{
   /* public function index(Request $request)
    {
		
        $doctors = Doctor::join('users', 'users.id', '=', 'doctors.id')
               ->get();
		
    	if($request->ajax())
    	{
			$doctor = $request->doctor;
    		$data = Event::whereDate('start', '>=', $request->start )
                       ->whereDate('end',   '<=', $request->end)
					   //->where('doctor_id', '=', $request->doctor)
                       ->get();
            return response()->json($data);
    	}
    	return view('admin.full-calender',compact('doctors'));
    }*/
	public function appointment(Request $request)
      {
        
		$time = $request->date.' '.$request->time.':00';
        $data = new appointment;
        $user = new user;
        $patient =new patient;

        $user->name=$request->fname;
        $user->lname=$request->lname;
        $user->email=$request->email;
        $user->phone_no=$request->phone;
        $user->password=NULL;
        $user->role_id = 3;
		$patient->address=$request->address;
        $patient->gender=$request->gender;
        $patient->weight = $request->weight;
        $patient->height = $request->height;
        $patient->blood_type = $request->blood_type;
        $patient->date_of_birth = $request->date_of_birth;
        $data->doctor_id=$request->doctor_id;
        $data->date=$request->date;
        $data->time=$request->time;
        $data->start=$time;
        $data->end=$time;
		$data->status='Approved';
        $user->save();
        $patient->id = $user->id ;
        $data->save();
        $patient->save();
          return redirect()->back()->with('message','Appointment Request Successful');
        //return response()->json($data);
      }
	public function newindex(Request $request)
    {
        $doctors = Doctor::join('users', 'users.id', '=', 'doctors.id')
               ->get();
		if($request->ajax())
			{
				   $doctor = $request->doctor;
			
				   /*$data= DB::table('appointments')
                         ->select('*')
                         ->where('doctor_id', '=', $doctor)
							->get();*/
					/*$data = Event::whereDate('start', '>=', "2022-04-01 00:00:00" )
					    ->whereDate('end',   '<=', "2022-05-01 00:00:00")
						->where('doctor_id', '=', $request->doctor)
						->get();*/

                    $data = Appointment::whereDate('start', '>=', "2022-04-01 00:00:00" )
					    ->whereDate('end',   '<=', "2022-05-01 00:00:00")
						->where('doctor_id', '=', $request->doctor)
						->get();
                    
				   return response()->json($data);
			
			
		}
    	
    	return view('admin.new_appointments',compact('doctors'));
    }
	

    public function action(Request $request)
    {
    	if($request->ajax())
    	{
    		/*if($request->type == 'add')
    		{
    			$event = Event::create([
    				'user_name'		=>	$request->user_name,
                    'doctor_id'		=>	$request->doctor,
                    'phone_no'		=>	$request->phone_no,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end
    			]);

    			return response()->json($event);
    		}*/

    		if($request->type == 'update')
    		{
    			$event = Appointment::find($request->id)->update([
    				
    				'start'		=>	$request->start,
    				'end'		=>	$request->end
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'delete')
    		{
    			$event = Appointment::find($request->id)->delete();
                return response()->json($event);
    		}
    	}
    }
}
