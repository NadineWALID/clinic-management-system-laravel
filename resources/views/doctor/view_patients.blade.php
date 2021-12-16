@extends('frontend.master2')
@section('itemsInNavBar')
            <li class="nav-item active">
              <a class="nav-link" href="{{url('home')}}" >Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Today's Patients</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="{{url('addprescription')}}" >Add Prescription </a>
            </li>
            
            
@stop
@section('content')
<x-app-layout>
    <table>
      <tr>
        <th>Name</th>
        <th>History</th>
        <th>Medicine</th>
        <th>Previous Prescriptions</th>
        <th>Add a Prescription</th>
       
      </tr>
      @foreach($data as $user)
                  <tr align="center" width="100%" ">
                      <td>{{$user->name}}</td>
                      <td>{{$user->history}}</td>
                      <td>{{$user->medicine}}</td>
                      <td>
                          <a class="btn btn-success" href="{{url('addprescription')}}">Write A Prescription</a>
                      </td>
                      
                  </tr>
        @endforeach

     </table>
</x-app-layout>
@stop