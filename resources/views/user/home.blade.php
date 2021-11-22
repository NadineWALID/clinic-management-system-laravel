@extends('frontend.master')
@section('content')
  <div class="page-hero bg-image " style="background-image: url(../assets/img/doc.jpg); ">
    <div class="hero-section">
      <div class="container text-center wow zoomIn">
        <span class="subhead" style="color:black" >Let's make your life happier</span>
        <h1 class="display-4" style="color:black" >Healthy Living</h1>
      </div>
    </div>
  </div>


  <!-- .page-section -->

    <div class="page-section pb-0" id="aboutus">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 py-3 wow fadeInUp">
            <h1>Welcome to Your Health <br> Center</h1>
            <p class="text-grey mb-4">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Accusantium aperiam earum ipsa eius, inventore nemo labore eaque porro consequatur ex aspernatur. Explicabo, excepturi accusantium! Placeat voluptates esse ut optio facilis!</p>
            <a href="about.html" class="btn btn-primary">Learn More</a>
          </div>
          <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
            <div class="img-place custom-img-1">
              <img src="../assets/img/bg-doctor.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .bg-light -->
  </div> <!-- .bg-light -->

  @include('user.doctor')

  @include ('user.latestnews')
 
  @include('user.appointment')
   <!-- .banner-home -->
  @stop