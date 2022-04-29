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
	
	  public function store(Request $request)
      {
<<<<<<< HEAD
        
		$time = $request->date.' '.$request->time.':00';
=======
       
        $request->validate([
            
            'email'         => 'required|email',
            'fname'          => 'required',
			'lname'          => 'required',
			'phone'        => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11',
        ]);
        $time = $request->date.' '.$request->time.':00';
>>>>>>> fc7c1d7b1885f81f314731874a3f1b8cf3eaebc8
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
        $data->time=$request->date;
        $data->start=$time;
        $data->end=$time;
<<<<<<< HEAD
		$data->status='Approved';
        $user->save();
        $patient->id = $user->id ;
=======
		$data->address=$request->address;
        $data->gender=$request->gender;
        $data->status='Approved';

>>>>>>> fc7c1d7b1885f81f314731874a3f1b8cf3eaebc8
        $data->save();
        $patient->save();
          return redirect()->back()->with('message','Appointment Request Successful');
        //return response()->json($data);
<<<<<<< HEAD
=======
        return response()->json(['success'=>'Successfully']);
      }
	  public function edit(Request $request)
      {
       
		$appointment = appointment::find($request->id);
     
        $time = $request->date.' '.$request->time.':00';
		$appointment->start=$time;
        $appointment->end=$time;
        $appointment->save();
        
  
        return response()->json(['success'=>'Successfully']);
>>>>>>> fc7c1d7b1885f81f314731874a3f1b8cf3eaebc8
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
