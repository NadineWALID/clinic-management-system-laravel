@extends('frontend.master2')
@section('itemsInNavBar')
            <li class="nav-item active">
              <a class="nav-link" href="#" >Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#aboutus">Make An Appointment</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#doctors">See my Appoinments</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#doctors">View History and Past Prescriptions</a>
            </li>
            
@stop
@section('content')
<x-app-layout>
    <h1>This is Patient</h1>
</x-app-layout>
@stop