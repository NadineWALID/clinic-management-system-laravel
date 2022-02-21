@extends('frontend.master2')
@section('itemsInNavBar')
            <li class="nav-item active">
              <a class="nav-link" href="{{url('home')}}" >Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('view_patients')}}" >Today's Appointments</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('addprescription')}}" >Add Prescription</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">My Patients</a>
            </li>
            <li class="nav-item active">
            <x-app-layout></x-app-layout>
            </li>
            
            
@stop
@section('content')

  
<div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
       
        <div class="page-wrapper">
           
               

                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Search Patients:</h3>
                                
                            </div>
                            
                            <input type="text" name="search" id="search" class="form-control" placeholder="Search Patients" />
                           </br>
                            <div class="table-responsive">
                                <table class="table no-wrap" id="patients_table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Id</th>
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Phone Number</th>
                                            <th class="border-top-0">View Patient's History</th>
                                            <th class="border-top-0">Add a Prescription</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody id="search_list">
                                      @foreach($data as $user)
                                         <tr>
                                       
                                            <td>
                                            <input type="text" name="hoppa"  id="hoppa" class="hoppa" style=" visibility: hidden;position: absolute;" value="{{$user->id}}">
                                              {{$user->id}}</td>
                                            <td class="txt-oflo" >{{$user->name}} {{$user->lname}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone_no}}</td>
                                            
                                            <td>
                                             <a class="btn btn-success button" >View History</a>
                                            </td>
                                            <td><a href="{{url('write_prescription_my_patients',$user->id)}}" class="btn btn-success">Write Prescription</a></td>
                                                                         
                                        </tr>
                                     @endforeach
                                    
                                    
                                       
                                    </tbody>
                                   
                                </table>
                                {{$data-> links() }}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                 <!-- PRODUCTS YEARLY SALES -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- Recent Comments -->
                <!-- ============================================================== -->
                <div name="record"  id="record" class="record">


                </div>
               
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
           
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="doctor/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <script src="doctor/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="doctor/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="doctor/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="doctor/js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="doctor/plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="doctor/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="doctor/js/pages/dashboards/dashboard1.js"></script>
  @stop 
  @section('scriptcontent')
  
  <script>
      $(document).ready(function(){
           $('#search').on('keyup',function(){
             var query=$(this).val();
             $.ajax({
               url:"search",
               type: "GET",
               data: {'search':query},
               success:function(data){
                $('#search_list').html(data);
               }
             });
           });
      });
  </script>

<script type="text/javascript">
       $('.button').click(function(){
        var currentRow = $(this).closest("tr");
        var query = currentRow.find(".hoppa").val();
        //var query=$('.hoppa').val();
        $.ajax({
        url:"search2",
        type: "GET",
        data: {'search2':query},
               success:function(data){
                $('#record').html(data);
                console.log('done');
               }
        
        
         });

       });


       

</script>
  @stop












