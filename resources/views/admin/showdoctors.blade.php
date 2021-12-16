<x-app-layout>
<!DOCTYPE html>
  <html lang="en">
    
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
          <div align="center" style="padding:100px;">
          <table>
                  <tr style="background-color:skyblue;">
                      <th style="padding:10px; color:black;">Name</th>
                      <th style="padding:10px; color:black;">Phone Number</th>
                      <th style="padding:10px; color:black;">Speciality</th>
                      <th style="padding:10px; color:black;">Photo</th>
                      <th style="padding:10px; color:black;">Update</th>
                      <th style="padding:10px; color:black;">Delete</th>
                  </tr>

                  @foreach($data as $doctor)
                  <tr align="center" style="background-color:teal;">
                      <td>{{$doctor->name}}</td>
                      <td>{{$doctor->phone_number}}</td>
                      <td>{{$doctor->speciality}}</td>
                      <td><img height="100" width="100" src="doctorimage/{{$doctor->image}}"></td>
                      <td>
                          <a class="btn btn-primary" href="{{url('')}}">Update</a>
                      </td>
                      <td>
                          <a class="btn btn-danger" href="{{url('deletedoctor',$doctor->id)}}" onclick="return confirm('Are you sure you want to cancel this doctor')">Delete</a>
                      </td>
                  </tr>
                  @endforeach
            </table>
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