@extends('frontend.master')
@section('content')
<div align="center" style="padding:70px;">
    <table>
        <tr style="background-color:teal;">
            <th style="padding:10px; font-size:20px; color:black;">Doctor Name</th>
            <th style="padding:10px; font-size:20px; color:black;">Date</th>
            <th style="padding:10px; font-size:20px; color:black;">Status</th>
            <th style="padding:10px; font-size:20px; color:darkred;">Cancel Appointment</th>
        </tr>

        @foreach($appoint as $appoints)
        <tr style="background-color:greenyellow;" align="center">
            <td style="padding:10px; color:black;">{{$appoints->doctor}}</td>
            <td style="padding:10px; color:black;">{{$appoints->date}}</td>
            <td style="padding:10px; color:black;">{{$appoints->status}}</td>
            <td><a href="{{url('cancel_appoint',$appoints->id)}}"onclick="return confirm('Are you sure you want to cancel this appointment')" class="btn btn-danger">Cancel</a></td>
        </tr>
        @endforeach
    </table>
</div>
@stop