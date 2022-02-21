<x-app-layout>
    <!DOCTYPE html>
      <html lang="en">
      <style>
                 label
            {
              width: 100%;
              display: inline-block;
            }
            input
            {
              width: 60%;
              padding: 12px 20px;
              margin: 8px 0;
              box-sizing: border-box;

            }
            input[type=submit] {
            width: 40%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
             }
            #formid
            {
              display:inline-block;
              width:800px;
              height:740px;
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

                 <div class="container" Align="center" style="padding-top: 100px;">
                 @if(session()->has('message'))

                       <div class="alert alert-success">
                       <button type="button" class="close" data-dismiss="alert">
                            x
                       </button>
                      {{session()->get('message')}}
                       </div>

                @endif
                     <form action="{{url('upload_admin')}}" method="POST" enctype="multipart/form-data" id="formid">
                       @csrf
                      <div style="padding:20px; position: relative;">
                       <label>Receptionist First Name</label>
                       <input type="text" style="color:black;" name="name" placeholder="Write receptionist's first name" required="">
                      </div>
                      <div style="padding:20px; position: relative;">
                       <label> Last Name</label>
                       <input type="text" style="color:black;" name="lname" placeholder="Write receptionist's last name" required="">
                      </div>

                      <div style="padding:20px;">
                       <label>Phone Number</label>
                       <input type="number" style="color:black;" name="number" placeholder="Write phone number" required="">
                      </div>

                      <div style="padding:20px;">
                        <label>date of birth</label>
                        <input type="date" style="color:black;" name="date_of_birth" required="" min="1900-01-01" max="2023-01-01">
                       </div>


                      <div style="padding:20px;">
                       <label>Email</label>
                       <input type="email" style="color:black;" name="email" required="">
                      </div>

                      <div style="padding:20px;">
                       <label>Password</label>
                       <input type="password" style="color:black;" name="password"  required autocomplete="new-password">
                      </div>


                      <div style="padding:20px; position: relative; left:10px;">
                       <input type="submit" class="btn btn-success">
                      </div>

                     </form>

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