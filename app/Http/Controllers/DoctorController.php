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
                           ->orwhere ('users.lname','like','%'.$request->search.'%')
                           ->orwhere ('users.email','like','%'.$request->search.'%')
                           ->get();
    
        }
        $output='';
        if(count($data)>0){
           
            foreach($data as $row){
                $output .= '
                 
                 <tr>
                 <td>'.$row->id.'</td>
                 <td>'.$row->name.'</td>
                 <td>'.$row->email.'</td>
                 <td>'.$row->phone_no.'</td>
                 <td>
                    <a class="btn btn-success" href="">View History</a>
                </td>
                <td>
                     
                    <a class="btn btn-success" href="'.url('write_prescription','.$user->id.').'">Write a Prescription</a>
                </td>
                 </tr>
                  ';
            }

            

        }else{
            $output .='No output';

        }

        return $output;
        
        
    }

    public function search2(Request $request){
        
        if($request->ajax()){
            $data = 'yalahwyy';
    
        }
        $output='';
        if(($data)!= null){
           
            
                $output .= '
                 
                <div class="row">
                <!-- .col -->
                <div class="col-md-12 col-lg-8 col-sm-12">
                    <div class="card white-box p-0">
                        <div class="card-body">
                            <h3 class="box-title mb-0">Medical Record</h3>
                        </div>
                        <div class="comment-widgets">
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row p-3 mt-0">
                                <div class="p-2"><img src="doctor/plugins/images/users/varun.jpg" alt="user" width="50" class="rounded-circle"></div>
                                <div class="comment-text ps-2 ps-md-3 w-100">
                                    <h5 class="font-medium">James Anderson</h5>
                                    <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry.It has survived not only five centuries. </span>
                                    <div class="comment-footer d-md-flex align-items-center">
                                         <span class="badge bg-primary rounded">Pending</span>
                                         
                                        <div class="text-muted fs-2 ms-auto mt-2 mt-md-0">April 14, 2021</div>
                                        <button class="btn btn-success text-white btn-circle btn" type="button">
                                            <i class="fas fa-phone"></i>
                                    </button>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row p-3">
                                <div class="p-2"><img src="doctor/plugins/images/users/genu.jpg" alt="user" width="50" class="rounded-circle"></div>
                                <div class="comment-text ps-2 ps-md-3 active w-100">
                                    <h5 class="font-medium">Michael Jorden</h5>
                                    <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry.It has survived not only five centuries. </span>
                                    <div class="comment-footer d-md-flex align-items-center">

                                        <span class="badge bg-success rounded">Approved</span>
                                        
                                        <div class="text-muted fs-2 ms-auto mt-2 mt-md-0">April 14, 2021</div>
                                    </div>
                                </div>
                            </div>
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row p-3">
                                <div class="p-2"><img src="doctor/plugins/images/users/ritesh.jpg" alt="user" width="50" class="rounded-circle"></div>
                                <div class="comment-text ps-2 ps-md-3 w-100">
                                    <h5 class="font-medium">Johnathan Doeting</h5>
                                    <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry.It has survived not only five centuries. </span>
                                    <div class="comment-footer d-md-flex align-items-center">

                                        <span class="badge rounded bg-danger">Rejected</span>
                                        
                                        <div class="text-muted fs-2 ms-auto mt-2 mt-md-0">April 14, 2021</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="card white-box p-0">
                        <div class="card-heading">
                            <h3 class="box-title mb-0">Information</h3>
                        </div>
                        <div class="card-body">
                            <ul class="chatonline">
                                <li>
                                    <div class="call-chat">
                                        <button class="btn btn-success text-white btn-circle btn" type="button">
                                            <i class="fas fa-phone"></i>
                                        </button>
                                        <button class="btn btn-info btn-circle btn" type="button">
                                            <i class="far fa-comments text-white"></i>
                                        </button>
                                    </div>
                                    <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                            src="doctor/plugins/images/users/varun.jpg" alt="user-img" class="img-circle">
                                        <div class="ms-2">
                                            <span class="text-dark">Varun Dhavan <small
                                                    class="d-block text-success d-block">online</small></span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="call-chat">
                                        <button class="btn btn-success text-white btn-circle btn" type="button">
                                            <i class="fas fa-phone"></i>
                                        </button>
                                        <button class="btn btn-info btn-circle btn" type="button">
                                            <i class="far fa-comments text-white"></i>
                                        </button>
                                    </div>
                                    <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                            src="doctor/plugins/images/users/genu.jpg" alt="user-img" class="img-circle">
                                        <div class="ms-2">
                                            <span class="text-dark">Genelia
                                                Deshmukh <small class="d-block text-warning">Away</small></span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="call-chat">
                                        <button class="btn btn-success text-white btn-circle btn" type="button">
                                            <i class="fas fa-phone"></i>
                                        </button>
                                        <button class="btn btn-info btn-circle btn" type="button">
                                            <i class="far fa-comments text-white"></i>
                                        </button>
                                    </div>
                                    <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                            src="doctor/plugins/images/users/ritesh.jpg" alt="user-img" class="img-circle">
                                        <div class="ms-2">
                                            <span class="text-dark">Ritesh
                                                Deshmukh <small class="d-block text-danger">Busy</small></span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="call-chat">
                                        <button class="btn btn-success text-white btn-circle btn" type="button">
                                            <i class="fas fa-phone"></i>
                                        </button>
                                        <button class="btn btn-info btn-circle btn" type="button">
                                            <i class="far fa-comments text-white"></i>
                                        </button>
                                    </div>
                                    <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                            src="doctor/plugins/images/users/arijit.jpg" alt="user-img" class="img-circle">
                                        <div class="ms-2">
                                            <span class="text-dark">Arijit
                                                Sinh <small class="d-block text-muted">Offline</small></span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="call-chat">
                                        <button class="btn btn-success text-white btn-circle btn" type="button">
                                            <i class="fas fa-phone"></i>
                                        </button>
                                        <button class="btn btn-info btn-circle btn" type="button">
                                            <i class="far fa-comments text-white"></i>
                                        </button>
                                    </div>
                                    <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                            src="doctor/plugins/images/users/govinda.jpg" alt="user-img"
                                            class="img-circle">
                                        <div class="ms-2">
                                            <span class="text-dark">Govinda
                                                Star <small class="d-block text-success">online</small></span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="call-chat">
                                        <button class="btn btn-success text-white btn-circle btn" type="button">
                                            <i class="fas fa-phone"></i>
                                        </button>
                                        <button class="btn btn-info btn-circle btn" type="button">
                                            <i class="far fa-comments text-white"></i>
                                        </button>
                                    </div>
                                    <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                            src="doctor/plugins/images/users/hritik.jpg" alt="user-img" class="img-circle">
                                        <div class="ms-2">
                                            <span class="text-dark">John
                                                Abraham<small class="d-block text-success">online</small></span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
                  ';
           

            

        }else{
            $output .='No output';

        }

        return $output;
        
       
       

        return $output;
        
        
    }

    public function homedoctor(){
        return view('doctor.home');
    }
    public function addprescription(){
        $date = date('d/m/Y',time());
        $doctor=Auth::id();
        $data2 = User::find($doctor);


        return view('doctor.addprescription',compact('date','data2'));
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

    
    
    public function write_prescription($id)
      {
        $data=appointment::find($id);
        $doctor=Auth::id();
        $data2 = User::find($doctor);
       
        $date = date('d/m/Y',time());
        return view('doctor.write_prescription',compact('data','date','data2'));   
      }

    


   
}