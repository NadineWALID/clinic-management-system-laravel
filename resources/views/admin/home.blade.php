@extends('frontend.master2')
@section('itemsInNavBar')
            <li class="nav-item active">
              <a class="nav-link" href="#" >Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#aboutus">Add A User</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#doctors">Edit A User</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"  href="#news">See Turns</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#appointment">Make An Appointment</a>
            </li>
@stop
@section('content')
<x-app-layout>
    <h1>This is receptionist</h1>
</x-app-layout>
@stop