<x-app-layout>
<!DOCTYPE html>
  <html lang="en">
  <style>
            label
            {
               display: inline-block;
            }
            #formid
            {
              outline-style: inset;
              }
              #doctorspec{
                position: relative;
                left: 10px;
              }
        </style>
    <head>
      <!-- Required meta tags -->
      @include('admin.adminmaster')
    </head>
    <body>
      <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
        <!-- partial -->
        
        @include('admin.navbar') 
          <!-- partial -->
         <div class="container-fluid page-body-wrapper">
               

             <div class="container" Align="center" style="padding-top: 100px;">
             @if(session()->has('message'))
 
                   <div class="alert alert-success">
                   <button type="button" class="close" data-dismiss="alert">
                        x
                   </button>
                  {{session()->get('message')}}
                   </div>

 @endif
                 <form action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data" id="formid">
                   @csrf
                  <div style="padding:20px; position: relative;">
                   <label>Doctor Name</label>
                   <input type="text" style="color:black;" name="name" placeholder="Write Doctor's name" required="">
                  </div>
                  
                  <div style="padding:20px;">
                   <label>Phone Number</label>
                   <input type="text" style="color:black;" name="number" placeholder="Write phone number" required="">
                  </div>

                  <div style="padding:20px; position: relative; left:-20px;">
                   <label>Speciality</label>
                   <select id="doctorspec" name="speciality" style="color:black; width: 200px;" required="">
                       <option value="Pediatrician">Pediatrician</option>
                       <option value="Dermatologist">Dermatologist</option>
                       <option value="Cardiologist">Cardiologist</option>
                       <option value="Endocrinologist">Endocrinologist</option>
                   </select>
                  </div>

                  <div style="padding:20px; position: relative; left:50px;">
                   <label>Doctor Image</label>
                   <input type="file" name="file" required="">
                  </div>

                  <div style="padding:20px; position: relative; left:10px;">
                   <input type="submit" class="btn btn-success">
                  </div>

                 </form>

             </div>
          </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"></span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">  <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank"></a></span>
              </div>
            </footer>
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