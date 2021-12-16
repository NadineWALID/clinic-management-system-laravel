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
              <table id="myTable2">
                  <tr style="background-color:rgb(138, 235, 135);">
                      <th onclick="sortTable(0)" style="padding:10px; color:black; cursor: pointer;">Patient Name</th>
                      <th style="padding:10px; color:black;">Email</th>
                      <th style="padding:10px; color:black;">Phone Number</th>
                      <th style="padding:10px; color:black;">Mobile</th>
                      <th onclick="sortTable(4)" style="padding:10px; color:black; cursor: pointer;">Doctor Name</th>
                      <th onclick="sortTable(5)" style="padding:10px; color:black; cursor: pointer;">Date</th>
                      <th style="padding:10px; color:black;">History</th>
                      <th style="padding:10px; color:black;">Medicine</th>
                      <th onclick="sortTable(8)" style="padding:10px; color:black; cursor: pointer;">Status</th>
                      <th style="padding:10px; color:black;">Approve Appointment</th>
                      <th style="padding:10px; color:black;">Cancel Appointment</th>
                      <th style="padding:10px; color:black;">Delete Appointment</th>
                  </tr>

                  @foreach($data as $appoint)
                  <tr align="center" style="background-color:rgb(23, 73, 29);">
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
                      <td>
                          <a class="btn btn-danger" href="{{url('delete_app',$appoint->id)}}" onclick="return confirm('Are you sure you want to cancel this appointment')">Delete</a>
                      </td>
                  </tr>
                  @endforeach
                  <script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable2");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc";
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>
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