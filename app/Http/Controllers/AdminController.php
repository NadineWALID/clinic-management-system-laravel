<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Appointment;

class AdminController extends Controller
{
    public function addview()
    {

       return view('admin.add_doctor');
    }

    public function upload(Request $request)
    {
       $doctor= new doctor;
       $user= new user;
       $image=$request->file;
       $imagename=time().'.'.$image->getClientoriginalExtension();
       $request->file->move('doctorimage',$imagename);
       $doctor->image=$imagename;
       $doctor->name=$request->name;
       $doctor->phone_number=$request->number;
       $doctor->speciality=$request->speciality;
       $doctor->save();
       $user->email=$request->email;
       $user->password=Hash::make($request->password);
       $user->phone_no=$request->number;
       $user->name=$request->name;
       $user->role_id=1;
       $user->save();
       return redirect()->back()->with('message','Doctor Is Added Successfully');
    }

    public function showappointments()
    {
       $data=appointment::all();
       return view('admin.showappointments',compact('data'));
    }

    public function approved($id)
    {
      $data=appointment::find($id);
      $data->status='Approved';
      $data->save();
      return redirect()->back();
    }

    public function canceled($id)
    {
      $data=appointment::find($id);
      $data->status='Canceled';
      $data->save();
      return redirect()->back();
    }
}
