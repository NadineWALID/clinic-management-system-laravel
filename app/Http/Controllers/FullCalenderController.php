<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;

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
        $data->f_name=$request->fname;
        $data->l_name=$request->lname;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->doctor_id=$request->doctor_id;
        $data->date=$request->date;
        $data->time=$request->time;
        $data->start=$time;
        $data->end=$time;

		
        $data->address=$request->address;
        $data->gender=$request->gender;
        $data->status='Approved';
        $data->save();
        

        //return response()->json($data);
        return redirect()->back()->with('message','Appointment Request Successful');
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
