<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Patient;


class AdminController extends Controller
{
    public function addview()
    {

       return view('admin.add_doctor');
    }

    public function add_patient_view()
    {

       return view('admin.add_patient_view');
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

    public function uploadPatient(Request $request)
    {
       $patient= new patient;
       $user= new user;
       $user->email=$request->email;
       $user->password=Hash::make($request->password);
       $user->phone_no=$request->number;
       $user->name=$request->name;
       $user->role_id=3;
       $user->save();
       $patient->name=$request->name;
       $patient->phone_number=$request->number;
       $patient->age=$request->age;
       $patient->id=$user->id;
       $patient->save();
       
       return redirect()->back()->with('message','Patient Is Added Successfully');
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

    public function delete_app($id)
    {
      $data=appointment::find($id);
      $data->delete();
      return redirect()->back();
    }

    public function showdoctors()
    {
       $data=doctor::all();
       return view('admin.showdoctors',compact('data'));
    }

    public function showpatients()
    {
       $Pdata=patient::all();
       return view('admin.show_patients',compact('Pdata'));
    }


    public function deletedoctor($id)
    {
       $data=doctor::find($id);
       $data2=user::find($id);
       $data->delete();
       $data2->delete();
       return redirect()->back();
    }

    public function deletepatient($id)
    {
       $Pdata=patient::find($id);
       $Pdata2=user::find($id);
       $Pdata->delete();
       $Pdata2->delete();
       return redirect()->back();
    }


    public function updatedoctor($id)
    {
       $data=patient::find($id);
       $user=user::find($id);
       $user->name=$data->name;
       $user->phone_no=$data->phone_number;
       $user->save();
       return view('admin.update_doctor',compact('data'));
    }

    public function updatepatient($id)
    {
       $Pdata=patient::find($id);
       $user=user::find($id);
       $user->name=$Pdata->name;
       $user->phone_no=$Pdata->phone_number;
       $user->age=$Pdata->age;
       $user->save();
       return view('admin.update_patient',compact('Pdata'));
    }


    public function editdoctor(Request $request, $id)
    {
       $doctor=doctor::find($id);
      // $doctor2=user::find($id);
       $doctor->name=$request->name;
      // $doctor2->name=$request->name;
       $doctor->phone_number=$request->phone_number;
      // $doctor2->phone_no=$request->phone_no;
       $doctor->speciality=$request->speciality;

       $image=$request->file;
       if($image)
       {
         $imagename=time().'.'.$image->getClientOriginalExtension();
         $request->file->move('doctorimage',$imagename);
         $doctor->image=$imagename;
       }
       
       $doctor->save();
       //$doctor2->save();
       return redirect()->back()->with('message','Doctor Updated Successfully');
    }

    public function editpatient(Request $request, $id)
    {
       $patient=patient::find($id);
      // $patient2=user::find($id);
       $patient->name=$request->name;
      // $patient2->name=$request->name;
       $patient->phone_number=$request->phone_number;
      // $patient2->phone_no=$request->phone_no;
       $patient->age=$request->age;
       
       $patient->save();
       //$patient2->save();
       return redirect()->back()->with('message','Patient Updated Successfully');
    }

}
