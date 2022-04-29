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
                        <th style="padding:10px; color:black;">Gender</th>
                        <th style="padding:10px; color:black;">Diagnosis</th>
                        <th style="padding:10px; color:black;">Medicine</th>
                        <th style="padding:10px; color:black;">Blood Type</th>
                        <th style="padding:10px; color:black;">Lab_results</th>
                        <th style="padding:10px; color:black;">Radiology_image</th>
                        <th style="padding:10px; color:black;">Allergies</th>
                        <th style="padding:10px; color:black;">Chronic Diseases</th>
                        <th style="padding:10px; color:black;">Update</th>
                        <th style="padding:10px; color:black;">Delete</th>
                    </tr>

                    @foreach ($data as $record)
                        <tr align="center" style="background-color:rgb(23, 73, 29);">
                            <td>{{ $record->gender }}</td>
                            <td>{{ $record->diagnosis }}</td>
                            <td>{{ $record->medicine }}</td>
                            <td>{{ $record->blood_type }}</td>
                            <td><a href="labs/{{$record->lab_results }}" width="100%" height="500px">view</a></td>
                            <td><a href=" Radiology/{{$record->radiology_image }}" width="100%" height="500px">view</a></td>
                            <td>{{ $record->allergies }}</td>
                            <td>{{ $record->chronic_diseases }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ url('update_record', $record->id) }}">Update</a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="{{ url('delete_record', $record->id) }}"
                                    onclick="return confirm('Are you sure you want to delete this ')">Delete</a>
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