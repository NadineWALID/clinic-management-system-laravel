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

<div class="page-section" id="appointment">
    <div class="container">
      <h1 class="text-center wow fadeInUp" style="font: size 200px;">Medica Health Center</h1>
      <h1 class="text-center wow fadeInUp" style="font: size 200px;">Dr {{$data2->name}} {{$data2->lname}}</h1>
      <form class="main-form" action="{{url('save_prescription',[$data->id])}}" method="POST">
          @csrf
        <div class="row mt-5 ">
        
        <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Date :</label>
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInRight">
        <input type="text" name="date_of_examination" class="form-control" value="{{$date}}" readonly="readonly" placeholder="Medicine">
            
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Name :</label>
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInRight">
        <label for="html">{{$data->name}} {{$data->lname}}</label>
            
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Diagnosis :</label>
        </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="diagnosis" id="diagnosis" required=""  placeholder="Diagnosis" class="form-control" rows="6" ></textarea>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" name="medicine" required="" class="form-control" placeholder="Medicine">
          </div>
       
         
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <input type="text" name="dosage" required="" class="form-control" placeholder="Dosage">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Next Appointment :</label>
        </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <input type="date" name="next_appointment_date" required="" class="form-control">
          </div>
      </div>
        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Save and Print</button>
        
      </form>
    </div>
  </div> <!-- .page-section -->

@stop