<?php
include '../../config.php';

/* Halaman ini tidak dapat diakses jika belum ada yang login(total) */
if(isset($_SESSION['email'])== 0) {
	header('Location: ../../index.php');
}
?>

<?php 
include '../headernew.php';
include '../sidebarnew.php';
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <div class="page-wrapper">
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
      <div class="page-content">
        <div class="row">
          <div class="col-12 col-lg-4">
            <div class="card radius-15 overflow-hidden">
              <div class="card-body">
                <div class="d-flex">
                  <div>
                    <p class="mb-0 font-weight-bold">Sessions</p>
                    <h2 class="mb-0">501</h2>
                  </div>
                  <div class="ms-auto align-self-end">
                    <p class="mb-0 font-14 text-primary"><i class='bx bxs-up-arrow-circle'></i> <span>1.01% 31 days
                        ago</span>
                    </p>
                  </div>
                </div>
                <div id="chart1"></div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-4">
            <div class="card radius-15 overflow-hidden">
              <div class="card-body">
                <div class="d-flex">
                  <div>
                    <p class="mb-0 font-weight-bold">Visitors</p>
                    <h2 class="mb-0">409</h2>
                  </div>
                  <div class="ms-auto align-self-end">
                    <p class="mb-0 font-14 text-success"><i class='bx bxs-up-arrow-circle'></i> <span>0.49% 31 days
                        ago</span>
                    </p>
                  </div>
                </div>
                <div id="chart2"></div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-4">
            <div class="card radius-15 overflow-hidden">
              <div class="card-body">
                <div class="d-flex">
                  <div>
                    <p class="mb-0 font-weight-bold">Page Views</p>
                    <h2 class="mb-0">2,346</h2>
                  </div>
                  <div class="ms-auto align-self-end">
                    <p class="mb-0 font-14 text-danger"><i class='bx bxs-down-arrow-circle'></i> <span>130.68% 31 days
                        ago</span>
                    </p>
                  </div>
                </div>
                <div id="chart3"></div>
              </div>
            </div>
          </div>
        </div>
        <!--end row-->
        <div class="row">
          <div class="col-12 col-lg-8 d-flex">
            <div class="card radius-15 w-100">
              <div class="card-header border-bottom-0">
                <div class="d-flex align-items-center">
                  <div>
                    <h5 class="mb-lg-0">New VS Returning Visitors</h5>
                  </div>
                  <div class="ms-auto mb-2 mb-lg-0">
                    <div class="btn-group-round">
                      <div class="btn-group">
                        <button type="button" class="btn btn-white">This Month</button>
                        <button type="button" class="btn btn-white dropdown-toggle dropdown-toggle-split"
                          data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span
                            class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="javaScript:;">This Week</a>
                          <a class="dropdown-item" href="javaScript:;">This Year</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div id="chart4"></div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-4 d-flex">
            <div class="card radius-15 w-100">
              <div class="card-body">
                <div class="d-lg-flex align-items-center">
                  <div>
                    <h5 class="mb-4">Devices of Visitors</h5>
                  </div>
                </div>
                <div id="chart5"></div>
              </div>
              <ul class="list-group list-group-flush mb-0">
                <li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent">
                  Mobile<span class="badge bg-danger rounded-pill">25%</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                  Desktop<span class="badge bg-primary rounded-pill">65%</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Tablet<span
                    class="badge bg-warning rounded-pill text-dark">10%</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!--end row-->
        <div class="row">
          <div class="col-12 col-lg-12 col-xl-6 d-flex">
            <div class="card radius-15 w-100">
              <div class="card-body">
                <div class="row row-cols-1 row-cols-md-3 g-3">
                  <div class="col">
                    <div class="card radius-15 mb-0 shadow-none border">
                      <div class="card-body text-center">
                        <div class="widgets-icons mx-auto rounded-circle bg-info text-white"><i class='bx bx-time'></i>
                        </div>
                        <h4 class="mb-0 font-weight-bold mt-3">2m 28s</h4>
                        <p class="mb-0">Avg. Time on Site</p>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card radius-15 mb-0 shadow-none border">
                      <div class="card-body text-center">
                        <div class="widgets-icons mx-auto bg-wall text-white rounded-circle"><i
                            class='bx bx-bookmark-alt'></i>
                        </div>
                        <h4 class="mb-0 font-weight-bold mt-3">4.68</h4>
                        <p class="mb-0">Pages/Session</p>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card radius-15 mb-0 shadow-none border">
                      <div class="card-body text-center">
                        <div class="widgets-icons mx-auto bg-rose rounded-circle text-white"><i class='bx bx-bulb'></i>
                        </div>
                        <h4 class="mb-0 font-weight-bold mt-3">78%</h4>
                        <p class="mb-0">New Sessions</p>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card radius-15 mb-0 shadow-none border">
                      <div class="card-body text-center">
                        <div class="widgets-icons mx-auto rounded-circle bg-danger text-white"><i
                            class='bx bx-line-chart'></i>
                        </div>
                        <h4 class="mb-0 font-weight-bold mt-3">23.4%</h4>
                        <p class="mb-0">Bounce Rate</p>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card radius-15 mb-0 shadow-none border">
                      <div class="card-body text-center">
                        <div class="widgets-icons mx-auto bg-primary rounded-circle text-white"><i
                            class='bx bx-group'></i>
                        </div>
                        <h4 class="mb-0 font-weight-bold mt-3">4,286</h4>
                        <p class="mb-0">New Users</p>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card radius-15 mb-0 shadow-none border">
                      <div class="card-body text-center">
                        <div class="widgets-icons mx-auto bg-success text-white rounded-circle"><i
                            class='bx bx-cloud-download'></i>
                        </div>
                        <h4 class="mb-0 font-weight-bold mt-3">78%</h4>
                        <p class="mb-0">Downloads</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-12 col-xl-6 d-flex">
            <div class="card radius-15 w-100">
              <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4">
                  <div>
                    <h5 class="mb-0">Social Media Traffic</h5>
                  </div>
                  <div class="ms-auto">
                    <h3 class="mb-0"><span class="font-14">Total Visits:</span> 874</h3>
                  </div>
                </div>
                <hr />
                <div class="dashboard-social-list">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex align-items-center">
                      <div class="d-flex align-items-center gap-2">
                        <div class="widgets-social bg-youtube rounded-circle text-white"><i class='bx bxl-youtube'></i>
                        </div>
                        <div class="">
                          <h6 class="mb-0">YouTube</h6>
                        </div>
                      </div>
                      <div class="ms-auto">298</div>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                      <div class="d-flex align-items-center gap-2">
                        <div class="widgets-social bg-facebook rounded-circle text-white"><i
                            class='bx bxl-facebook'></i>
                        </div>
                        <div class="">
                          <h6 class="mb-0">Facebook</h6>
                        </div>
                      </div>
                      <div class="ms-auto">324</div>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                      <div class="d-flex align-items-center gap-2">
                        <div class="widgets-social bg-linkedin rounded-circle text-white"><i
                            class='bx bxl-linkedin'></i>
                        </div>
                        <div class="">
                          <h6 class="mb-0">Linkedin</h6>
                        </div>
                      </div>
                      <div class="ms-auto">127</div>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                      <div class="d-flex align-items-center gap-2">
                        <div class="widgets-social bg-twitter rounded-circle text-white"><i class='bx bxl-twitter'></i>
                        </div>
                        <div class="">
                          <h6 class="mb-0">Twitter</h6>
                        </div>
                      </div>
                      <div class="ms-auto">325</div>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                      <div class="d-flex align-items-center gap-2">
                        <div class="widgets-social bg-tumblr rounded-circle text-white"><i class='bx bxl-tumblr'></i>
                        </div>
                        <div class="">
                          <h6 class="mb-0">Tumblr</h6>
                        </div>
                      </div>
                      <div class="ms-auto">287</div>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                      <div class="d-flex align-items-center gap-2">
                        <div class="widgets-social bg-dribbble rounded-circle text-white"><i
                            class='bx bxl-dribbble'></i>
                        </div>
                        <div class="">
                          <h6 class="mb-0">Dribbble</h6>
                        </div>
                      </div>
                      <div class="ms-auto">154</div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--end row-->
        <div class="row">
          <div class="col-12 col-lg-12 col-xl-8">
            <div class="card radius-15">
              <div class="card-body">
                <div class="card-title">
                  <h5 class="mb-0">Geographic</h5>
                </div>
                <hr />
                <div id="geographic-map"></div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-12 col-xl-4">
            <div class="card radius-15">
              <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4">
                  <div>
                    <h5 class="mb-0">Top countries</h5>
                  </div>
                  <div class="ms-auto">
                    <h3 class="mb-0"><span class="font-14">Total Visits:</span> 9587</h3>
                  </div>
                </div>
                <hr />
                <div class="dashboard-top-countries">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex align-items-center">
                      <div class="d-flex align-items-center gap-2">
                        <div class="font-20"><i class="flag-icon flag-icon-in"></i>
                        </div>
                        <div class="">
                          <h6 class="mb-0">India</h6>
                        </div>
                      </div>
                      <div class="ms-auto">647</div>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                      <div class="d-flex align-items-center gap-2">
                        <div class="font-20"><i class="flag-icon flag-icon-us"></i>
                        </div>
                        <div class="media-body ml-2">
                          <h6 class="mb-0">United States</h6>
                        </div>
                      </div>
                      <div class="ms-auto">435</div>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                      <div class="d-flex align-items-center gap-2">
                        <div class="font-20"><i class="flag-icon flag-icon-vn"></i>
                        </div>
                        <div class="">
                          <h6 class="mb-0">Vietnam</h6>
                        </div>
                      </div>
                      <div class="ms-auto">287</div>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                      <div class="d-flex align-items-center gap-2">
                        <div class="font-20"><i class="flag-icon flag-icon-au"></i>
                        </div>
                        <div class="">
                          <h6 class="mb-0">Australia</h6>
                        </div>
                      </div>
                      <div class="ms-auto">432</div>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                      <div class="d-flex align-items-center gap-2">
                        <div class="font-20"><i class="flag-icon flag-icon-dz"></i>
                        </div>
                        <div class="">
                          <h6 class="mb-0">Angola</h6>
                        </div>
                      </div>
                      <div class="ms-auto">345</div>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                      <div class="d-flex align-items-center gap-2">
                        <div class="font-20"><i class="flag-icon flag-icon-ax"></i>
                        </div>
                        <div class="">
                          <h6 class="mb-0">Aland Islands</h6>
                        </div>
                      </div>
                      <div class="ms-auto">134</div>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                      <div class="d-flex align-items-center gap-2">
                        <div class="font-20"><i class="flag-icon flag-icon-ar"></i>
                        </div>
                        <div class="">
                          <h6 class="mb-0">Argentina</h6>
                        </div>
                      </div>
                      <div class="ms-auto">147</div>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                      <div class="d-flex align-items-center gap-2">
                        <div class="font-20"><i class="flag-icon flag-icon-be"></i>
                        </div>
                        <div class="">
                          <h6 class="mb-0">Belgium</h6>
                        </div>
                      </div>
                      <div class="ms-auto">210</div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--end row-->

        <div class="row row-cols-1 row-cols-lg-3">
          <div class="col d-flex">
            <div class="card radius-15 w-100">
              <div class="card-body">
                <div class="card-title">
                  <h5 class="mb-0">Browser Statistics </h5>
                </div>
                <hr />
                <div class="d-flex align-items-center gap-3">
                  <div>
                    <img src="assets/images/icons/chrome.png" width="35" height="35" alt="" />
                  </div>
                  <div class="">
                    <h6 class="mb-0">587</h6>
                    <p class="mb-0">Chrome</p>
                  </div>
                  <p class="mb-0 ms-auto">24.3%</p>
                </div>
                <hr />
                <div class="d-flex align-items-center gap-3">
                  <div>
                    <img src="assets/images/icons/firefox.png" width="35" height="35" alt="" />
                  </div>
                  <div class="">
                    <h6 class="mb-0">358</h6>
                    <p class="mb-0">Firefox</p>
                  </div>
                  <p class="mb-0 ms-auto">12.3%</p>
                </div>
                <hr />
                <div class="d-flex align-items-center gap-3">
                  <div>
                    <img src="assets/images/icons/edge.png" width="35" height="35" alt="" />
                  </div>
                  <div class="">
                    <h6 class="mb-0">867</h6>
                    <p class="mb-0">Edge</p>
                  </div>
                  <p class="mb-0 ms-auto">24.3%</p>
                </div>
                <hr />
                <div class="d-flex align-items-center gap-3">
                  <div>
                    <img src="assets/images/icons/opera.png" width="35" height="35" alt="" />
                  </div>
                  <div class="">
                    <h6 class="mb-0">752</h6>
                    <p class="mb-0">Opera</p>
                  </div>
                  <p class="mb-0 ms-auto">27.3%</p>
                </div>
                <hr />
                <div class="d-flex align-items-center gap-3">
                  <div>
                    <img src="assets/images/icons/safari.png" width="35" height="35" alt="" />
                  </div>
                  <div class="">
                    <h6 class="mb-0">586</h6>
                    <p class="mb-0">Safari</p>
                  </div>
                  <p class="mb-0 ms-auto">14.5%</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card radius-15 w-100">
              <div class="card-body">
                <div class="card-title">
                  <h5 class="mb-0">Traffic Sources </h5>
                </div>
                <hr />
                <div class="table-responsive">
                  <table class="table table-striped mb-0">
                    <thead>
                      <tr>
                        <th>Source</th>
                        <th>Visitors</th>
                        <th>Bounce Rate</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>(direct)</td>
                        <td>56</td>
                        <td>10%</td>
                      </tr>
                      <tr>
                        <td>google</td>
                        <td>29</td>
                        <td>12%</td>
                      </tr>
                      <tr>
                        <td>linkedin.com</td>
                        <td>68</td>
                        <td>33%</td>
                      </tr>
                      <tr>
                        <td>bing</td>
                        <td>14</td>
                        <td>24%</td>
                      </tr>
                      <tr>
                        <td>facebook.com</td>
                        <td>87</td>
                        <td>22%</td>
                      </tr>
                      <tr>
                        <td>twitter.com</td>
                        <td>88</td>
                        <td>43%</td>
                      </tr>
                      <tr>
                        <td>other</td>
                        <td>98</td>
                        <td>27%</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card radius-15 w-100">
              <div class="card-body">
                <div class="card-title">
                  <h5 class="mb-0">Visitors By Gender </h5>
                </div>
                <hr />
                <div id="chart6"></div>
              </div>
            </div>
          </div>
        </div>
        <!--end row-->


        <div class="card radius-15">
          <div class="card-body">
            <div class="card-title">
              <h5 class="mb-0">Top pages by views </h5>
            </div>
            <hr />
            <div class="table-responsive">
              <table class="table mb-0">
                <thead class="thead-dark">
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Views</th>
                    <th>Avg. Time</th>
                    <th>Bounce Rate</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td><a href="https://themeforest.net/item/synadmin-bootstrap4-admin-template/29014766"
                        target="_blank">https://themeforest.net/item/synadmin-bootstrap4-admin-template/29014766</a>
                    </td>
                    <td>660</td>
                    <td>55s</td>
                    <td>3.6%</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td><a href="https://codervent.com/wipe-admin-dark/dashboard/v3"
                        target="_blank">https://codervent.com/wipe-admin-dark/dashboard/v3</a>
                    </td>
                    <td>352</td>
                    <td>16s</td>
                    <td>8.4%</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td><a href="https://themeforest.net/item/dashtreme-multipurpose-bootstrap4-admin-template/23059455"
                        target="_blank">https://themeforest.net/item/dashtreme-multipurpose-bootstrap4-admin-template/23059455</a>
                    </td>
                    <td>101</td>
                    <td>10s</td>
                    <td>6.7%</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td><a href="https://themeforest.net/item/rukada-responsive-bootstrap-4-admin-template/22820477"
                        target="_blank">https://themeforest.net/item/rukada-responsive-bootstrap-4-admin-template/22820477</a>
                    </td>
                    <td>95</td>
                    <td>57s</td>
                    <td>5.2%</td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td><a href="https://codervent.com/rocker-angular/dashboard/v1"
                        target="_blank">https://codervent.com/rocker-angular/dashboard/v1</a>
                    </td>
                    <td>102</td>
                    <td>45s</td>
                    <td>7.2%</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--end page-content-wrapper-->
  </div>
  <!-- /.content -->
</div>




<!-- /.content-wrapper -->
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 2.4.18
  </div>
  <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
  reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark" style="display: none;">
  <!-- Create the tabs -->
  <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <!-- Home tab content -->
    <div class="tab-pane" id="control-sidebar-home-tab">
      <h3 class="control-sidebar-heading">Recent Activity</h3>
      <ul class="control-sidebar-menu">
        <li>
          <a href="javascript:void(0)">
            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

              <p>Will be 23 on April 24th</p>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <i class="menu-icon fa fa-user bg-yellow"></i>

            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

              <p>New phone +1(800)555-1234</p>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

              <p>nora@example.com</p>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <i class="menu-icon fa fa-file-code-o bg-green"></i>

            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

              <p>Execution time 5 seconds</p>
            </div>
          </a>
        </li>
      </ul>
      <!-- /.control-sidebar-menu -->

      <h3 class="control-sidebar-heading">Tasks Progress</h3>
      <ul class="control-sidebar-menu">
        <li>
          <a href="javascript:void(0)">
            <h4 class="control-sidebar-subheading">
              Custom Template Design
              <span class="label label-danger pull-right">70%</span>
            </h4>

            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <h4 class="control-sidebar-subheading">
              Update Resume
              <span class="label label-success pull-right">95%</span>
            </h4>

            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-success" style="width: 95%"></div>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <h4 class="control-sidebar-subheading">
              Laravel Integration
              <span class="label label-warning pull-right">50%</span>
            </h4>

            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <h4 class="control-sidebar-subheading">
              Back End Framework
              <span class="label label-primary pull-right">68%</span>
            </h4>

            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
            </div>
          </a>
        </li>
      </ul>
      <!-- /.control-sidebar-menu -->

    </div>
    <!-- /.tab-pane -->
    <!-- Stats tab content -->
    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
    <!-- /.tab-pane -->
    <!-- Settings tab content -->
    <div class="tab-pane" id="control-sidebar-settings-tab">
      <form method="post">
        <h3 class="control-sidebar-heading">General Settings</h3>

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Report panel usage
            <input type="checkbox" class="pull-right" checked>
          </label>

          <p>
            Some information about this general settings option
          </p>
        </div>
        <!-- /.form-group -->

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Allow mail redirect
            <input type="checkbox" class="pull-right" checked>
          </label>

          <p>
            Other sets of options are available
          </p>
        </div>
        <!-- /.form-group -->

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Expose author name in posts
            <input type="checkbox" class="pull-right" checked>
          </label>

          <p>
            Allow the user to show his name in blog posts
          </p>
        </div>
        <!-- /.form-group -->

        <h3 class="control-sidebar-heading">Chat Settings</h3>

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Show me as online
            <input type="checkbox" class="pull-right" checked>
          </label>
        </div>
        <!-- /.form-group -->

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Turn off notifications
            <input type="checkbox" class="pull-right">
          </label>
        </div>
        <!-- /.form-group -->

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Delete chat history
            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
          </label>
        </div>
        <!-- /.form-group -->
      </form>
    </div>
    <!-- /.tab-pane -->
  </div>
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->




<script src="../../assets/js/bootstrap.bundle.min.js"></script>

<!-- jQuery 3 -->
<script src="../../public/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../public/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../../public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../../public/bower_components/raphael/raphael.min.js"></script>
<script src="../../public/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../../public/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../../public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../public/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../public/bower_components/moment/min/moment.min.js"></script>
<script src="../../public/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../../public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../../public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../public/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../public/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../public/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../public/dist/js/demo.js"></script>
</body>

<script src="../../public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
$(document).ready(function() {
  $('#example').DataTable();
});
</script>

</html>