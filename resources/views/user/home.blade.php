@extends('frontend.master')
@section('content')
<style>
  #google_translate_element
  {
    position: relative;
  left: 100px;
  }
</style>
<body>
<h1 >Select your language</h1>
<div id="google_translate_element"></div>
  <div class="page-hero bg-image " style="background-image: url(../assets/img/doc.jpg); ">
    <div class="hero-section">
      <div class="container text-center wow zoomIn">
        <span class="header" style="color:#696969" >Let's make your life happier</span>
        <h1 class="header" style="color:#696969" >Healthy Living</h1>
      </div>
    </div>
  </div>


  <!-- .page-section -->
    <div class="page-section pb-0" id="aboutus">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 py-3 wow fadeInUp">
            <h1>Welcome to Your Health <br> Center</h1>
            <p class="text-grey mb-4">We offer you great services that would ease your boring routine of managing the health clincs appointments,news and work</p>
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
   <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL}
  , 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
  @stop