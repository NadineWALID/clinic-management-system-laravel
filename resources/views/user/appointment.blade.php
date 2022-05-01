 <style>
            label
            {
              width: 100%;
              margin: 8px 0;
              display: inline-block;
              
            }
            input
            {
              width: 60%;
              padding: 12px 18px;
              margin: 8px 0;
              box-sizing: border-box;
              display: inline-block;
            }
            input[type=submit] {
            width: 60%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
             }
             .header {
           text-align: center;
           color: black;
           font-size: 40px;
           font-family:Arial;
            }
            #formid
            {
              display:inline-block;
              width:800px;
              height:800px; 
              position: relative;
              left: 30%;
            }
        </style>
<div class="page-section" id="appointment">
    <div class="container">
    @if(session()->has('message'))
     
     <div class="alert alert-success">
     <button type="button" class="close" data-dismiss="alert">
          x
     </button>
    {{session()->get('message')}}
     </div>

@endif
      <h1 class="header" >Make an Appointment</h1>

      <form class="main-form" id="formid" action="{{url('appointment')}}" method="POST">
          @csrf
        <div class="row mt-5 ">
        @if(Route::has('login'))
            @auth
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
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label class="label" for="html">Please Choose Your Doctor :</label>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select  name="doctor" id="departement" class="custom-select">
            @foreach($user as $users)
             @foreach($doctor as $doctors)
             @if ($doctors->id == $users->id)
              <option value="{{$doctors->id}}">{{$users->name}} {{$users->lname}}
            -->  speciality *{{$doctors->speciality}}*</option>
             @endif
             @endforeach
                @endforeach
            </select>
          </div>
          
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label class="label" for="html">Date of birth :</label>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">  
              <input type="date" style="color:black;" name="date_of_birth" required="" min="1900-01-01" max="{{$date}}">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <label class="label" for="html">Date</label>
            <input type="date" min="{{$date}}" name="date" class="form-control">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Time :</label>
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
          </div>
        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
      </form>
      
      @else
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
          <label class="label" for="html">First Name</label>
            <input type="text" name="fname" class="form-control" required="" placeholder="First name" >
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
          <label class="label" for="html">Last Name</label>
            <input type="text" name="lname" class="form-control"  required="" placeholder="Last name">
          </div>
         
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <label class="label" for="html">Email</label>
          <input type="text" name="email" class="form-control" pattern="[^ @]*@[^ @]*"  required="" placeholder="Email address..">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <label class="label" for="html">Phone Number</label>
            <input type="text" name="phone"class="form-control" pattern="0[0-9]{3}[0-9]{3}[0-9]{4}" placeholder="Phone Number....">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <label class="label" for="html">Address</label>
            <textarea name="address" id="address" class="form-control" required="" rows="6" placeholder="Address....."></textarea>
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
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label class="label" for="html">Please Choose Your Doctor :</label>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select  name="doctor" id="departement" class="custom-select">
            @foreach($user as $users)
             @foreach($doctor as $doctors)
             @if ($doctors->id == $users->id)
              <option value="{{$doctors->id}}">{{$users->name}} {{$users->lname}}
            -->  speciality *{{$doctors->speciality}}*</option>
             @endif
             @endforeach
                @endforeach
            </select>
          </div>
          
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label class="label" for="html">Date of birth :</label>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">  
              <input type="date" style="color:black;" name="date_of_birth" required="" min="1900-01-01" max="{{$date}}">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <label class="label" for="html">Date</label>
            <input type="date" min="{{$date}}" name="date" class="form-control">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Time :</label>
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
      </div>
        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
      </form>
    </div>
  </div> <!-- .page-section -->
  @endauth
  @endif