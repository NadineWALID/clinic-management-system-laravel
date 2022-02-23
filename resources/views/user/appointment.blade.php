
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
      <h1 class="text-center wow fadeInUp" style="font: size 200px;">Make an Appointment</h1>

      <form class="main-form" action="{{url('appointment')}}" method="POST">
          @csrf
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" name="fname" class="form-control" placeholder="First name">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text" name="lname" class="form-control" placeholder="Last name">
          </div>
         
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <input type="text" name="email" class="form-control" placeholder="Email address..">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="text" name="phone"class="form-control" placeholder="Phone Number....">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="address" id="address" class="form-control" rows="6" placeholder="Address....."></textarea>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Gender :</label>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select  name="gender" id="departement" placeholder="Gender"class="custom-select">
              <option value="female">Female</option>
              <option value="male">Male</option>
            </select>
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
            <input type="date" name="date" class="form-control">
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