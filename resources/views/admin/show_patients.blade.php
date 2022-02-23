<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        @include('admin.adminmaster')
        <style>
            #searchinput{
                padding: 25px;
                margin-bottom: 5px;
                background: rgb(211, 240, 208);
            }
            #searchbutton{
                padding: 10px;
            }
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

            <form action="">
                <div class="form-group">
                    <input id="searchinput" type="search" name="search" class="form-control" value="{{$search}}" placeholder="Search patients">
                    <button id="searchbutton" class="btn btn-success">Search</button>
                    <a href="{{url('/show_patients')}}">
                        <button style="padding:10px;" class="btn btn-primary" type="button">Reset</button>
                    </a>
                </div>
            </form>
                <table style=" width:1000px;">
                    <tr style="background-color:rgb(138, 235, 135);">
                        <th style="color:black;">No</th>
                        
                     <!--   <th style="padding:10px; color:black; margin-left:500px;">Patient's lastName</th> -->
                        <th style="padding:10px; color:black;">Patient's Name</th>
                        <th style="padding:10px; color:black;">Patient's Email</th>
                        <th style="padding:10px; color:black;">Phone Number</th>
                        <th style="padding:10px; color:black; margin-left:500px;">Patient's Blood Type</th>
                        <th style="padding:10px; color:black;">Patient's Height</th>
                        <th style="padding:10px; color:black;">Patient's Weight</th>
                        <th style="padding:10px; color:black;">date of birth</th>
                        <th style="padding:10px; color:black;">Patient's Gender</th>
                        <th style="padding:10px; color:black;">Update</th>
                        <th style="padding:10px; color:black;">Delete</th>
                    </tr>

                    @foreach ($Pdata as $patients)
                        <tr align="center" style="background-color:rgb(23, 73, 29);">
                            <td>{{ ++$i }}</td>
                            <td>{{ $patients->name }}</td>
                            <td>{{ $patients->lname }}</td>
                            <td>{{ $patients->phone_no }}</td>
                            <td>{{ $patients->blood_type }}</td>
                            <td>{{ $patients->height }}</td>
                            <td>{{ $patients->weight }}</td>
                            <td>{{ $patients->date_of_birth}}</td>
                            <td>{{ $patients->gender }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ url('updatepatient', $patients->id) }}">Update</a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="{{ url('deletepatient', $patients->id) }}"
                                    onclick="return confirm('Are you sure you want to cancel this patient')">Delete</a>
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
