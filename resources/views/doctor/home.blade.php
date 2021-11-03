@extends('frontend.master2')
@section('itemsInNavBar')
            <li class="nav-item active">
              <a class="nav-link" href="#" >Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#aboutus">See Patient History</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#doctors">Write A Prescription</a>
            </li>
            
@stop
@section('content')
<x-app-layout>
    <h1>This is doctor</h1>
</x-app-layout>
@stop