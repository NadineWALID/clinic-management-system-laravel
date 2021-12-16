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
       $user->email=$request->email;
       $user->password=Hash::make($request->password);
       $user->phone_no=$request->number;
       $user->name=$request->name;
       $user->role_id=1;
       $user->save();
       $image=$request->file;
       $imagename=time().'.'.$image->getClientOriginalExtension();
       $request->file->move('doctorimage',$imagename);
       $doctor->image=$imagename;
       $doctor->name=$request->name;
       $doctor->phone_number=$request->number;
       $doctor->speciality=$request->speciality;
       $doctor->id=$user->id;
       $doctor->save();
       
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

    public function showdoctors()
    {
       $data=doctor::all();
       return view('admin.showdoctors',compact('data'));
    }

    public function deletedoctor($id)
    {
       $data=doctor::find($id);
       $data->delete();
       return redirect()->back();
    }

    public function updatedoctor($id)
    {
       $data=doctor::find($id);
       return view('admin.update_doctor',compact('data'));
    }

    public function editdoctor(Request $request, $id)
    {
       $doctor=doctor::find($id);
       $doctor->name=$request->name;
       $doctor->phone_number=$request->phone_number;
       $doctor->speciality=$request->speciality;

       $image=$request->file;
       if($image)
       {
         $imagename=time().'.'.$image->getClientOriginalExtension();
         $request->file->move('doctorimage',$imagename);
         $doctor->image=$imagename;
       }
       
       $doctor->save();
       return redirect()->back()->with('message','Doctor Updated Successfully');
    }
}
