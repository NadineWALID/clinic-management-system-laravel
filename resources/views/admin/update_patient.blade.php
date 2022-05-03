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

                <form action="{{url('editpatient',[$Pdata->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="padding:20px; position: relative;">
                    <div style="padding:20px; position: relative; width:200px;">
                       <label>Blood Type</label>
                       <select  name="blood_type" placeholder="Blood Type"class="custom-select" value="{{$Pdata2->blood_type}}">
                       <option value="O+">O+</option>
                       <option value="O-">O-</option>
                       <option value="A+">A+</option>
                       <option value="A-">A-</option>
                       <option value="B+">B+</option>
                       <option value="B-">B-</option>
                       <option value="AB+">AB+</option>
                       <option value="AB-">AB-</option>
                       </select>
                      </div>

                      <div style="padding:20px;">
                       <label>Height(cm)</label>
                       <input type="number" style="color:grey;" name="height" placeholder="Write height(cm)" required="" value="{{$Pdata2->height}}">
                      </div>

                      <div style="padding:20px;">
                       <label>Weight(kg)</label>
                       <input type="number" style="color:grey;" name="weight" placeholder="Write weight(kg)" required="" value="{{$Pdata2->weight}}">
                      </div>

                      <div style="padding:20px;">
                        <label>date of birth</label>
                        <input type="date" style="color:grey;" name="date_of_birth" required="" min="1900-01-01" max="2023-01-01" value="{{$Pdata->date_of_birth}}">
                       </div>


                      <div style="padding:20px;">
                        <label>address</label>
                        <input type="text" style="color:grey;" name="address" required="" value="{{$Pdata->address}}">
                       </div>


                      <div style="padding:20px; width:200px;">
                       <label>Gender</label>
                       <select  name="gender" placeholder="Gender"class="custom-select">
                       <option value="female">Female</option>
                       <option value="male">Male</option>
                       </select>
                      </div>
                    <div style="padding:15px;">
                        <input type="submit" class="btn btn-success">
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
