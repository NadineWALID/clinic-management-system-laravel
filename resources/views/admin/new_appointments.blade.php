<x-app-layout>
<!DOCTYPE html>
<html>
<head>
    @include('admin.adminmaster')
    <title>Appointments</title>
    
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <style>
 .modal-content{
  
  width: 50%;
  padding: 50px;
  margin-left: auto;
  margin-right: auto;
}
</style>
</head>
<body>
<div class="container-scroller">
@include('admin.sidebar')
@include('admin.navbar') 
<div class="container">
    <br />
    
    
    <h1 class="text-center text-primary" style="font-size:5vw">Appointments</h1>
    <br />
    Please Choose The Doctor:
    <select  name="doctor" id="doctor" onchange="doctorChosen()" class="custom-select">
    @foreach($doctors as $doctors)
        <option value="{{$doctors->id}}">{{$doctors->name}} {{$doctors->lname}}</option>
    @endforeach
    </select><button class="btn btn-success button" id="button" type="button">done</button>
    <div id="myModal" class="modal">
    <div class="modal-content" style="overflow:scroll;height:80%;">
        <span class="close" id="close">&times;</span>
       
        <form class="main-form" id="formid" action="{{url('calendar_add_appointment')}}" method="POST">
          @csrf
          <h1 class="header" >Make an Appointment on <input type="text" name="date" id="date" readonly="readonly" class="form-control" ></h1>
          <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
          <label class="label" for="html">First Name</label>
            <input type="text" name="fname" class="form-control" placeholder="First name">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
          <label class="label" for="html">Last Name</label>
            <input type="text" name="lname" class="form-control" placeholder="Last name">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <label class="label" for="html">Email</label>
          <input type="text" name="email" class="form-control" placeholder="Email address..">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <label class="label" for="html">Phone Number</label>
            <input type="text" name="phone"class="form-control" placeholder="Phone Number....">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <label class="label" for="html">Address</label>
            <textarea name="address" id="address" class="form-control" rows="6" placeholder="Address....."></textarea>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label class="label" for="html">Gender :</label>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select  name="gender" id="departement" placeholder="Gender"class="custom-select">
              <option value="female">Female</option>
              <option value="male">Male</option>
            </select>
          </div>
         
            
          <input type="text" name="doctor_id"  style=" visibility: hidden;position: absolute;" id="doctor_id"class="form-control" >
            
            <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
             <label class="label" for="html">Time : </label>
            </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
          <select  name="time" id="time" placeholder="time"class="custom-select">
          <?php 
            for($hours=10; $hours<22; $hours++) // the interval for hours is '1'
            for($mins=0; $mins<60; $mins+=15) // the interval for mins is '30'
                //echo 
               
                echo '<option value="'.str_pad($hours,2,'0',STR_PAD_LEFT).':'
                .str_pad($mins,2,'0',STR_PAD_LEFT).'">'.str_pad($hours,2,'0',STR_PAD_LEFT).':'
                .str_pad($mins,2,'0',STR_PAD_LEFT).'</option>'
         ?>

           
          
          </select>
          </div>
          
           <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
          </div>
        </form>
    </div>
    </div>
    <div id="appointment-requests" style="padding-bottom: 100px;"><div>
    <div id="appointments"><div> 
    <div id="calendar"></div>

</div>
</div>  
<script>

var modalObject = document.getElementById("myModal");
var spanObject = document.getElementById("close");

spanObject.onclick =function(){
    modalObject.style.display="none";
}

var doctor = $('#doctor').val();
function doctorChosen(){
    doctor = $('#doctor').val();
}
function getDoctor(){
    return doctor;
}

$(document).ready(function () {

$('#button').click(function(e) {
    console.log(getDoctor());
    $('#calendar').fullCalendar('refetchEvents');
})


$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
});



var calendar = $('#calendar').fullCalendar({
    eventDataTransform: function(event) {
     //event.user_name = event.user_name;
     event.f_name = event.f_name;
     event.phone_no=event.phone_no;
     return event;
    },
    editable:true,
    header:{
        left:'prev,next today',
        center:'title',
        right:'month,agendaWeek,agendaDay'
    },
    selectable:true,
    selectHelper: true,
    select:function(start, end, allDay)
    {
       // $('#spanId').text(doctor);
       document.getElementById("doctor_id").value = doctor;
       var start_date = $.fullCalendar.formatDate(start, 'Y-MM-DD');
       document.getElementById("date").value = start_date;
       // $('#dateId').text(start_date);
        modalObject.style.display="block";
        var date = new Date(start);
        var start_dateTime = $.fullCalendar.formatDate(start,'Y-MM-DD HH:mm:ss');
        document.getElementById("date_time").value = start_dateTime;
       
      /*  var title = prompt('Name:');
        if(title)
        {
        var ph_no = prompt('Phone Number :');
        

        if(ph_no)
        {
            var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');
            var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');
            var doctor = $('#doctor').val();

            $.ajax({
                url:"/full-calender/action",
                type:"POST",
                data:{
                    user_name: title,
                    start: start,
                    phone_no: ph_no,
                    end: end,
                    doctor: doctor,
                    type: 'add'
                },
                success:function(data)
                {
                    calendar.fullCalendar('refetchEvents');
                    alert("Event Created Successfully");
                }
            })
        }
    }*/
    },
    
    events: function(start,end,timezone,callback) {
      
      $.ajax({
        url: "/new_appointments",
        dataType: 'json',
        data: {
          doctor: getDoctor(),
        },
        success: function(doc) {
            var events = [];
            for (var i=0;i<doc.length;i++){
              events.push({
                //title: doc[i].f_name,
                //f_name:doc[i].f_name,
                title: doc[i].f_name.concat(" ", doc[i].l_name),
                start: doc[i].start,
                id:doc[i].id,
               
              })//this is displaying!!!
            }
            callback(events);
        },
      });
    },
    selectable:true,
    selectHelper: true,
    eventClick:function(event)
    {
        
        if(confirm("Are you sure you want to remove this appointment?"))
        {
            var id = event.id;
            //console.log(id);
            $.ajax({
                url:"/full-calender/action",
                type:"POST",
                data:{
                    id:id,
                    type:"delete"
                },
                success:function(response)
                {
                    calendar.fullCalendar('refetchEvents');
                    alert("Appointment Deleted Successfully");
                }
            })
        }
    },
    eventResize: function(event, delta)
    {
        var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
        var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
        var title = event.user_name;
        var id = event.id;
        $.ajax({
            url:"/full-calender/action",
            type:"POST",
            data:{
                title: title,
                start: start,
                end: end,
                id: id,
                type: 'update'
            },
            success:function(response)
            {
                calendar.fullCalendar('refetchEvents');
                alert("Event Updated Successfully");
            }
        })
    },
    eventDrop: function(event, delta)
    {
        var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
        var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
        var title = event.title;
        var id = event.id;
        $.ajax({
            url:"/full-calender/action",
            type:"POST",
            data:{
                title: title,
                start: start,
                end: end,
                id: id,
                type: 'update'
            },
            success:function(response)
            {
                calendar.fullCalendar('refetchEvents');
                alert("Event Updated Successfully");
            }
        })
    },

    
  
});

});



  
</script>
</body>
</html>
</x-app-layout>