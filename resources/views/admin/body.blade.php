<html>
<style>
      #main-panel
      {
        background-color:#deeaee;
        margin: 0;
      }

      #card
      {
        background-color: #deeaee;
        color:#034f84;
        font-family: Arial;
        padding:20px;
        font-size: 25px;
        margin: 0;
        border:0;
      }
    </style>

<div class="main-panel" id="main-panel">
            <div class="content-wrapper" id="card">
              <div class="row">
              <div class="col-md-8 grid-margin stretch-card">
                  <div class="card"id="card">
                    <div class="card-body">
                <div class="col-12 grid-margin stretch-card">
                        <div >
                          <h4><b>Control your Dashboard</b></h4>
                        </div>

                </div>
              </div>
                     @include ('user.latestnews')
                  
                </div>
              </div>
            </div>
          </div>
                    <div class="card-body">
                      <h4 style="font-size: 25px; color:#034f84;font-family: Arial;"><b>To do list</b></h4>
                      <div class="add-items d-flex">
                        <input type="text" class="form-control todo-list-input" placeholder="enter task..">
                        <button class="add btn btn-primary todo-list-add-btn">Add</button>
                      </div>
                      <div class="list-wrapper">
                        <ul class="d-flex flex-column-reverse text-white todo-list todo-list-custom">
                          <li>
                            <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input class="checkbox" type="checkbox"> Manage Patients</label>
                            </div>
                            <i class="remove mdi mdi-close-box"></i>
                          </li>
                          <li>
                            <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input class="checkbox" type="checkbox"> Manage Doctors</label>
                            </div>
                            <i class="remove mdi mdi-close-box"></i>
                          </li>
                          <li>
                            <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input class="checkbox" type="checkbox"> Manage News</label>
                            </div>
                            <i class="remove mdi mdi-close-box"></i>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
      </html>