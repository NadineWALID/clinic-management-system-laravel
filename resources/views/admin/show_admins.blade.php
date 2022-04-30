<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        @include('admin.adminmaster')
        <style>
            table {
                border-collapse: separate;
                border-spacing: 0 15px;
            }


            th,
            td {
                width: 150px;
                text-align: center;
                border: 1px solid rgba(26, 27, 26, 0.904);
                padding: 5px;
            }

        </style>
    </head>

    <body>
        <div class="container-scroller">
            <!-- partial:partials/_sidebar.html -->
            @include('admin.sidebar')
            <!-- partial -->

            @include('admin.navbar')
            <!-- partial -->
            <div align="center" style="padding:100px;">
                <table style=" width:1000px;">
                    <tr style="background-color:rgb(138, 235, 135);">
                        <th style="color:black;">No</th>
                        <th style="padding:10px; color:black; margin-left:500px;">Receptionist's Name</th>
                      <!--  <th style="padding:10px; color:black; margin-left:500px;">last name</th> -->
                        <th style="padding:10px; color:black;">Phone Number</th>
                     <!--   <th style="padding:10px; color:black;">date of birth</th>  -->
                        <th style="padding:10px; color:black;">Update</th>
                        <th style="padding:10px; color:black;">Delete</th>
                    </tr>

                    @foreach ($Adata as $admin)
                        <tr align="center" style="background-color:rgb(23, 73, 29);">
                            <td>{{ ++$i }}</td>
                            <td>{{ $admin->name }} {{ $admin->lname }}</td>
                            <td>{{ $admin->phone_no }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ url('updateadmin', $admin->id) }}">Update</a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="{{ url('deleteadmin', $admin->id) }}"
                                    onclick="return confirm('Are you sure you want to cancel this admin')">Delete</a>
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
