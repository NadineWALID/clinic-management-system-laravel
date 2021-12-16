@extends('frontend.master2')
@section('itemsInNavBar')
            <li class="nav-item active">
              <a class="nav-link" href="#" >Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('view_patients')}}" >See Patient History</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="{{url('addprescription')}}" >Add Prescription </a>
            </li>
            
            
            
@stop
@section('content')
<x-app-layout>
 @include('frontend.homecontent')
</x-app-layout>
@stop