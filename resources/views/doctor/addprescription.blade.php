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
      <h1 class="text-center wow fadeInUp" style="font: size 200px;">New Prescription</h1>

      <form class="main-form" action="{{url('appointment')}}" method="POST">
          @csrf
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" name="name" class="form-control" placeholder="Name">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" name="name" class="form-control" placeholder="Date">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="history" id="history" class="form-control" rows="6" placeholder="Condition"></textarea>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="medicine" id="medicine" class="form-control" rows="6" placeholder="Medication"></textarea>
          </div>
      </div>
        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Save</button>
        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Print</button>
      </form>
    </div>
  </div> <!-- .page-section -->

@stop