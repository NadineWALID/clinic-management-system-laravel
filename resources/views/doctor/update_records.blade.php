@extends('frontend.master2')
        <style>
            label
            {
                display:inline-block;
                width:200px;
            }
        </style>
      <div class="container-scroller">
        <div class="container" align="center" style="padding:100px;">

        @if(session()->has('message'))
 
                   <div class="alert alert-success">
                   <button type="button" class="close" data-dismiss="alert">
                        x
                   </button>
                  {{session()->get('message')}}
                   </div>

            @endif

            <form action="{{url('edit_record',$data->id)}}" method="POST"  enctype="multipart/form-data">
                @csrf
                <div style="padding:20px; position: relative;">
                   <label>Diagnosis</label>
                   <input type="text" style="color:black;" name="diagnosis" value="{{$data->diagnosis}}" required="">
                  </div>
                  

                <div style="padding:15px;">
                    <label>Blood_type</label>
                    <input style="color:grey;" type="text" name="blood_type" value="{{$data->blood_type}}">
                </div>

                <div style="padding:15px;">
                    <label>Medicine</label>
                    <input style="color:grey;" type="text" name="medicine" value="{{$data->medicine}}">
                </div>

                <div style="padding:15px;">
                    <label>Allergies</label>
                    <input style="color:grey;" type="text" name="allergies" value="{{$data->allergies}}">
                </div>

                <div style="padding:15px;">
                    <label>Chronic Diseases</label>
                    <input style="color:grey;" type="text" name="chronic_diseases" value="{{$data->chronic_diseases}}">
                </div>

                <div style="padding:15px;">
                    <label>Gender</label>
                    <select  name="gender" style="color:black; width: 200px;" required="">
                       <option value="male">Male</option>
                       <option value="female">Female</option>
                </div>

                <div style="padding:15px;">
                    <label>Last Lab  Results</label>
                    <img height="150" width="150" src="labs/{{$data->lab_results}}">
                </div>

                <div style="padding:15px;">
                    <label>Change Labs Results</label>
                    <input type="file" name="lab_file">
                </div>
                
                <div style="padding:15px;">
                    <label>Radiology Images</label>
                    <img height="150" width="150" src="labs/{{$data->lab_results}}">
                </div>

                <div style="padding:15px;">
                    <label>Change Radiology Images</label>
                    <input type="file" name="rd_file">
                </div>
                <div style="padding:15px;">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
            <!-- partial -->
          </div>
          <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>

