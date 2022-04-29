@extends('user.master')
@section('content')
<div class="page-section" id="appointment">
    <div class="container">
      <h1 class="text-center wow fadeInUp" style="font: size 200px;">Make an Appointment</h1>

      <form class="main-form" action="{{url('edit_appoint',$data->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
         <div class="row mt-5">
         <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" name="fname" class="form-control" placeholder="First name" value="{{$data->f_name}}" readonly="readonly">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text" name="lname" class="form-control" placeholder="Last name" value="{{$data->l_name}}"readonly="readonly">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <input type="text" name="email" class="form-control" placeholder="Email address.." value="{{$data->email}}"readonly="readonly">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="text" name="phone"class="form-control" placeholder="Phone Number...." value="{{$data->phone}}"readonly="readonly">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <input type="address" name="address"class="form-control" placeholder="Phone Number...." value="{{$data->address}}"readonly="readonly">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Gender :</label>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
          <input type="text" name="gender" id="address"class="form-control"  value="{{$data->gender}}"readonly="readonly">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Please Choose Your Doctor :</label>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select  name="doctor" id="departement" class="custom-select">
                
                @foreach($doctor as $doctors)
              <option value="{{$doctors->id}}">{{$doctors->name}}
            -->  speciality *{{$doctors->speciality}}*</option>
                @endforeach
            </select>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="date" min="{{$date}}" name="date" class="form-control">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Time :</label>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select  name="time" id="time" class="custom-select">
            <option value="11">11</option>
            </select>
          </div>
          
         
      </div>
        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
      </form>
    </div>
  </div> <!-- .page-section -->
  @stop