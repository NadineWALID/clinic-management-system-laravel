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

                <form action="{{url('editadmin',$Adata->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="padding:20px; position: relative;">
                    <label>Receptionist's first name</label>
                       <input size="23" type="text" style="color:black;" name="name" placeholder="Write receptionist's first name" required="">
                      </div>

                      <div style="padding:20px; position: relative;">
                       <label>Last name</label>
                       <input size="23" type="text" style="color:black;" name="lname" placeholder="Write receptionist's last name" required="">
                      </div>

                    <div style="padding:15px; position: relative;">
                        <label>Phone Number</label>
                        <input size="23" style="color:grey;" type="text" name="phone_number" value="{{$Adata->phone_number}}">
                    </div>

                    <div style="padding:20px; position: relative;">
                        <label>Date of birth</label>
                        <input size="30" type="date" style="color:black;" name="date_of_birth" required="" min="1900-01-01" max="2023-01-01"value="{{$Adata->date_of_birth}}">
                       </div>

                    <div style="padding:15px; position: relative;">
                        <input width="70px" height="30px" type="submit" class="btn btn-success">
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
