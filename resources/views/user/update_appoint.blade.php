<<<<<<< HEAD
@extends('user.master')
=======
@extends('frontend.master')
>>>>>>> 7632d0d0c2b607afd05250f5a85dd2b55fdd67f5
@section('content')
<div class="page-section" id="appointment">
    <div class="container">
      <h1 class="text-center wow fadeInUp" style="font: size 200px;">Make an Appointment</h1>

<<<<<<< HEAD
      <form class="main-form" action="{{url('edit_appoint',$data->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="row mt-5">
=======
      <form class="main-form" action="{{url('edit_appoint',$data->id)}}" method="POST">
          @csrf
        <div class="row mt-5 ">
>>>>>>> 7632d0d0c2b607afd05250f5a85dd2b55fdd67f5
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" name="name" class="form-control" placeholder="Full name" value="{{$data->name}}" readonly="readonly">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text" name="email" class="form-control" placeholder="Email address.." value="{{$data->email}}"readonly="readonly">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input type="date" name="date" class="form-control" value="{{$data->date}}">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <input  name="doctor" id="departement" class="custom-select" value="{{$data->doctor}}" readonly="readonly">

          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="text" name="mobile"class="form-control" placeholder="Mobile Number...." value="{{$data->mobile}}"readonly="readonly">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="text" name="phone"class="form-control" placeholder="Phone Number...." value="{{$data->phone}}"readonly="readonly">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="history" id="history" class="form-control" rows="6" placeholder="Your/Your family medical history....." value="{{$data->history}}"></textarea>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="medicine" id="medicine" class="form-control" rows="6" placeholder="Enter the current medicine you take...."value="{{$data->history}}"></textarea>
          </div>
      </div>
        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
      </form>
    </div>
  </div> <!-- .page-section -->
<<<<<<< HEAD
  @stop
=======
  @stop
>>>>>>> 7632d0d0c2b607afd05250f5a85dd2b55fdd67f5
