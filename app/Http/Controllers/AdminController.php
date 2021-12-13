<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Validation\Rule;
use App\Http\Controllers\OtherController;


class AdminController extends Controller
{

   
    public function addview()
    {

       return view('admin.add_doctor');
    }

    public function upload(Request $request)
    {

     
     app('App\Actions\Fortify\CreateNewUser')->create2($request); 
      
       $doctor= new doctor;
       $image=$request['file'];
       $imagename=time().'.'.$image->getClientoriginalExtension();
       $request['file']->move('doctorimage',$imagename);
       $doctor->image=$imagename;
       $doctor->name=$request->name;
       $doctor->phone_number=$request->phone_no;
       $doctor->speciality=$request->speciality;
       $doctor->save();
       return redirect()->back()->with('message','Doctor Is Added Successfully');
    }
}
