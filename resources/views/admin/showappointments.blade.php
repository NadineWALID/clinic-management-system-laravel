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
                      <th style="padding:10px; color:black;">Patient Name</th>
                      <th style="padding:10px; color:black;">Email</th>
                      <th style="padding:10px; color:black;">Phone Number</th>
                      <th style="padding:10px; color:black;">Mobile</th>
                      <th style="padding:10px; color:black;">Doctor Name</th>
                      <th style="padding:10px; color:black;">Date</th>
                      <th style="padding:10px; color:black;">History</th>
                      <th style="padding:10px; color:black;">Medicine</th>
                      <th style="padding:10px; color:black;">Status</th>
                      <th style="padding:10px; color:black;">Approve Appointment</th>
                      <th style="padding:10px; color:black;">Cancel Appointment</th>
                  </tr>

                  @foreach($data as $appoint)
                  <tr align="center" style="background-color:teal;">
                      <td>{{$appoint->name}}</td>
                      <td>{{$appoint->email}}</td>
                      <td>{{$appoint->phone}}</td>
                      <td>{{$appoint->mobile}}</td>
                      <td>{{$appoint->doctor}}</td>
                      <td>{{$appoint->date}}</td>
                      <td>{{$appoint->history}}</td>
                      <td>{{$appoint->medicine}}</td>
                      <td>{{$appoint->status}}</td>
                      <td>
                          <a class="btn btn-success" href="{{url('approved',$appoint->id)}}">Approve</a>
                      </td>
                      <td>
                          <a class="btn btn-danger" href="{{url('canceled',$appoint->id)}}">Cancel</a>
                      </td>
                  </tr>
                  @endforeach
              </table>
          </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            
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