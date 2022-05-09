@extends('frontend.master2')
@section('itemsInNavBar')
            <li class="nav-item active">
            <a class="nav-link" href="{{url('home')}}" >Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('view_patients')}}" >Today's Appointments</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" >Add Prescription</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('mypatients')}}">My Patients</a>
            </li>
            <li class="nav-item active">
            <x-app-layout></x-app-layout>
            </li>          
            
@stop
@section('content')

<div class="page-section">

    <div class="container" >
    <input type="text" name="search" id="search" class="form-control"  placeholder="Search Medications to Add to Prescription" />
    </br>
    <div class="prescription" style="border:double; width:60%;  margin: auto; align-items: center;"id="print-content">
    </br></br>
      <h1 class="text-center wow fadeInUp" style="font: size 200px;">Medica Health Center</h1>
      <h1 class="text-center wow fadeInUp" style="font: size 200px;">Dr {{$data2->name}} {{$data2->lname}}</h1>
      <form class="main-form" action="{{url('save_prescription')}}" method="POST" style="  margin-left: 5%;  margin-right: 5%; " >
          @csrf
        <div class="row mt-5 ">
        
        <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Date : </label>
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInRight">
        <input type="text" name="date_of_examination" value="{{$data2->date}}" class="form-control" readonly="readonly">
            
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Name :</label>
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text" name="name" class="form-control" >
          </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Diagnosis :</label>
        </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="diagnosis" id="diagnosis" class="form-control" rows="6" ></textarea>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Medication :</label>
        </div>
        
       
        
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" name="medicine" class="form-control" placeholder="Medicine">
          </div>
       
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <input type="text" name="dosage" class="form-control" placeholder="Dosage">
          </div>

        
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Next Appointment :</label>
        </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="date" name="next_appointment_date" class="form-control">
          </div>
         
      </div>
     
      </br></br>
     </div>
    </form>
    </div>
  </div> <!-- .page-section -->
  <div  >
        <button type="submit" class="btn btn-primary"  style=" width:60%;  margin-left:20%;">Save</button>
        </br></br>
        <button class="btn btn-primary"  style=" width:60%;  margin-left:20%;" onclick="printDiv('print-content')">Print</button>
     </div>
     </br></br>
  <script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        w=window.open();
        w.document.write(printContents);
        w.print();
        w.close();
    }
</script>
@stop

