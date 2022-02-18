<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use DB;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function addview(Request $request){
        $doctor=Auth::id();
        $date = date('Y-m-d',time());
        $date2 = date('d/m/Y',time());
        $data= DB::table('appointments')
              ->select('*')
              ->where('doctor_id', '=', $doctor)
              ->where('date','=',$date)
              ->get();
        $search_text= $request->get('search');
        $data2 = DB::table('users')
              ->select('*')
              ->where('name','LIKE',$search_text)
              ->orWhere('email', 'LIKE', $search_text)
              ->orWhere('phone_no', 'LIKE', $search_text)
              ->get();
       
        $appointmentsToday =$data->count();
       
        $data->appointmentsToday=$appointmentsToday;
        $data->data2=$data2;
        $data->date2=$date2;
        return view('doctor.view_patients',compact('data'));
    }


    

    /*public function search(Request $request){
        $pat=null;
        $search_text=$request->input('search');
        echo "<h2>" .$search_text. "</h2>";
        $pat = DB::table('users')
              ->select('*')
              ->where('name','=',$search_text)
              ->orWhere('email', '=', $search_text)
              ->orWhere('phone_no', '=', $search_text)
              ->get();
        return redirect()->back()->with('message', 'Search Successful');
        
    }*/

    public function search(Request $request){
        
        $doctor=Auth::id();
        
        
        if($request->ajax()){
            $data = User :: join('tokens', 'users.id', '=', 'tokens.user_id')
                           ->where ('doctor_id','like',$doctor)
                           ->where ('users.phone_no','like','%'.$request->search.'%')
                           ->orwhere ('users.name','like','%'.$request->search.'%')
                           ->orwhere ('users.email','like','%'.$request->search.'%')
                           ->get();
    
        }
        $output='';
        if(count($data)>0){
           ;
            foreach($data as $row){
                $output .= '
                 
                 <tr>
                 <td>'.$row->name.'</td>
                 <td>'.$row->email.'</td>
                 <td>'.$row->phone_no.'</td>
                 <td>
                    <a class="btn btn-success" href="">View History</a>
                </td>
                <td>
                    <a class="btn btn-success" href="">Write a Prescription</a>
                </td>
                 </tr>
                  ';
            }

            

        }else{
            $output .='No output';

        }

        return $output;
        
        
    }

    public function homedoctor(){
        return view('doctor.home');
    }
    public function addprescription(){
        return view('doctor.addprescription');
    }
    public function mypatients(){
        $doctor=Auth::id();
        $date = date('Y-m-d',time());
        
        $data = User::join('tokens', 'users.id', '=', 'tokens.user_id')
                ->get(['users.*']);
                
        return view('doctor.mypatients',compact('data'));
    }
  
    function index()
    {
        $data = DB:: table('users')->orderBy('name')->cursorPaginate(15);
     return view('doctor.mypatients',[
         'data'=> $data
     ]);
    }

    
    


    


   
}