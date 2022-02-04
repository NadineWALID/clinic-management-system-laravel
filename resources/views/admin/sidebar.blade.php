   <!-- partial:partials/_sidebar.html -->
   <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
            <p style="color:green; font-size:30px; font-family:verdana;">Main Dashboard</p>
          </div>
          <ul class="nav">
            <li class="nav-item menu-items">
              <a class="nav-link" href="{{url('add_doctor_view')}}">
                <span class="menu-icon">
                  <i class="mdi mdi-file-document-box"></i>
                </span>
                <span class="menu-title">Add Doctors</span>
              </a>
            </li>
            <li class="nav-item menu-items">
              <a class="nav-link" href="{{url('showappointments')}}">
                <span class="menu-icon">
                  <i class="mdi mdi-file-document-box"></i>
                </span>
                <span class="menu-title">Appointments</span>
              </a>
            </li>
            <li class="nav-item menu-items">
              <a class="nav-link" href="{{url('showdoctors')}}">
                <span class="menu-icon">
                  <i class="mdi mdi-file-document-box"></i>
                </span>
                <span class="menu-title">All Doctors</span>
              </a>
            </li>
            <li class="nav-item menu-items">
              <a class="nav-link" href="{{url('add_patient_view')}}">
                <span class="menu-icon">
                  <i class="mdi mdi-file-document-box"></i>
                </span>
                <span class="menu-title">Add Patient</span>
              </a>
            </li>
            <li class="nav-item menu-items">
              <a class="nav-link" href="{{url('show_patients')}}">
                <span class="menu-icon">
                  <i class="mdi mdi-file-document-box"></i>
                </span>
                <span class="menu-title">All Patients</span>
              </a>
            </li>
            
          </ul>
        </nav>