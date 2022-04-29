<x-app-layout>
<!DOCTYPE html>
  <html lang="en">
    
    <head>
      <!-- Required meta tags -->
      <base href="/public">
        <style>
            label
            {
                display:inline-block;
                width:200px;
            }
        </style>

      @include('admin.adminmaster')
    </head>
    <body>
      <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
        <!-- partial -->
        
        @include('admin.navbar') 
          <!-- partial -->
        <div class="container" align="center" style="padding:100px;">

        @if(session()->has('message'))
 
                   <div class="alert alert-success">
                   <button type="button" class="close" data-dismiss="alert">
                        x
                   </button>
                  {{session()->get('message')}}
                   </div>

            @endif

            <form action="{{url('editdoctor',$data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="padding:20px; position: relative;">
                   <label>Doctor First Name</label>
                   <input type="text" style="color:black;" name="name" placeholder="Write Doctor's first name" required="">
                  </div>
                  
                  <div style="padding:20px; position: relative;">
                   <label>Doctor Last Name</label>
                   <input type="text" style="color:black;" name="lname" placeholder="Write Doctor's last name" required="">
                  </div>

                <div style="padding:15px;">
                    <label>Phone Number</label>
                    <input style="color:grey;" type="text" name="phone_number" pattern="0[0-9]{3}[0-9]{3}[0-9]{4}" value="{{$data->phone_number}}">
                </div>

                <div style="padding:15px;">
                    <label>Speciality</label>
                    <select id="doctorspec" name="speciality" style="color:black; width: 200px;" required="">
                       <option value="Pediatrician">Pediatrician</option>
                       <option value="Dermatologist">Dermatologist</option>
                       <option value="Cardiologist">Cardiologist</option>
                       <option value="Endocrinologist">Endocrinologist</option>
                       <option value="Allergists/Immunologists">Allergists/Immunologists</option>
                       <option value="Neurologists">Neurologists</option>
                       <option value="Gastroenterologists">Gastroenterologists</option>
                       <option value="Hematologists">Hematologists</option>
                       <option value="Medical Geneticists">Medical Geneticists</option>
                       <option value="Nephrologists">Nephrologists</option>
                       <option value="Obstetricians and Gynecologists">Obstetricians and Gynecologists</option>
                       <option value="Oncologists">Oncologists</option>
                       <option value="Ophthalmologists">Ophthalmologists</option>
                       <option value="Otolaryngologists">Otolaryngologists</option>
                       <option value="Physiatrists">Physiatrists</option>
                       <option value="Pulmonologists">Pulmonologists</option>
                   </select>
                </div>

                <div style="padding:15px;">
                    <label>Old Photo</label>
                    <img height="150" width="150" src="doctorimage/{{$data->image}}">
                </div>

                <div style="padding:15px;">
                    <label>Change Photo</label>
                    <input type="file" name="file">
                </div>

                <div style="padding:15px;">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
            <!-- partial -->
          </div>
          <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->
      <!-- plugins:js -->
      <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
      <!-- endinject -->
      <!-- Plugin js for this page -->
      <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
      <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
      <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
      <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
      <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
      <!-- End plugin js for this page -->
      <!-- inject:js -->
      <script src="admin/assets/js/off-canvas.js"></script>
      <script src="admin/assets/js/hoverable-collapse.js"></script>
      <script src="admin/assets/js/misc.js"></script>
      <script src="admin/assets/js/settings.js"></script>
      <script src="admin/assets/js/todolist.js"></script>
      <!-- endinject -->
      <!-- Custom js for this page -->
      <script src="admin/assets/js/dashboard.js"></script>
      <!-- End custom js for this page -->
    </body>
    </html>
  </x-app-layout>