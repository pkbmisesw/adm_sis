<?php
include '../../config.php';
error_reporting(0);

$sqla = "SELECT * FROM setting ORDER BY id DESC";
$stmta = $conn->prepare($sqla);
$stmta->execute();
$rowa = $stmta->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $rowa['nama']; ?></title>
    <link rel="icon" type="image/x-icon" href="images/160522011148_logo_dasawisma_5.png">
    <link rel="shortcut icon" href="images/160522011148_logo_dasawisma_5.png" />

    <script src="../../assets/js/pace.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/pace-theme-default.min.css">
    <!--Animate CSS -->
    <link rel="stylesheet" href="../../assets/css/animate.min.css" type="text/css">
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/css/custom.css" type="text/css">
    <link rel="stylesheet" href="../../assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="../../assets/css/depan.css" type="text/css">
    <link rel="stylesheet" href="../../assets/css/print.css" type="text/css" media="print">
    <!-- Plugin css for this page -->

    <link rel="stylesheet" href="../../assets/css/jquery.toast.min.css">
    <link rel="stylesheet" href="../../assets/css/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="../../assets/css/summernote-bs4.css">
    <!-- End plugin css for this page -->
    <style media="screen">
        .form-group label {
            font-weight: 600;
        }

        .form-check-label {
            font-weight: 100 !important;
        }

        .required {
            color: #D02727
        }

        .linkabout:hover {
            text-decoration: none;
        }
    </style>

    <!-- plugins:js -->
    <script src="../../assets/js/vendor.bundle.base.js"></script>
    <script src="../../assets/js/sweetalert.min.js"></script>
    <script src="../../assets/js/jquery.toast.min.js"></script>
    <script src="../../assets/js/jquery.fancybox.min.js"></script>
    <script src="../../assets/js/select2.min.js"></script>
    <script src="../../assets/js/summernote-bs4.min.js"></script>
    <script src="../../assets/js/clipboard.min.js"></script>
    <script src="../../assets/js/loadingoverlay.min.js"></script>
    <script src="../../assets/js/Chart.min.js"></script>
    <script src="../../assets/js/chartjs-plugin-datalabels.js"></script>
    <script src="../../assets/js/chartjs-plugin-colorschemes.min.js"></script>
    <script src="../../assets/js/custom.js"></script>

    <!-- end plugins js -->
    <script type="text/javascript">
        var BASE_URL = "https://dasawisma.pkk.makassarkota.go.id/";
        $(document).ready(function() {
            var t_message = '';
            var t_type = '';

            if (t_message.length > 0) {
                //showToast(t_type, t_message);
                swal(t_message, {
                    icon: t_type
                })
            }
        });
    </script>

</head>

<body>
    <nav class="navbar col-lg-12 col-12 p-1 fixed-top d-flex flex-row d-print-none" style="background-color: #E54606;">
        <!-- Brand/logo -->
        <a class="navbar-brand brand-logo mr-0 d-print-none" href="#">
            <img class="ml-2 d-print-none" src="../../images/logo.png" alt="logo" style="width:170px;">
        </a>

        <ul class="navbar-nav navbar-nav-right mr-2">
            <li class="nav-item nav-profile">
                
                    
                        <a class="btn btn-outline-primary btn-icon-text" href="#">
                            <i class="mdi mdi-login text-warning"></i>
                            Login
                        </a>

                    
                            </li>
        </ul>

    </nav>
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel-center">
            <div class="content-wrapper mt-2"><div class="row">
    <div class="col-md-12 col-xl-12 mx-auto animated fadeIn delay-3s d-print-block">

        <div class="card m-b-30 d-print-noborder">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <img class="img-sm rounded" src="../../images/160522011148_logo_dasawisma_5.png" alt="profile">
                    <div class="px-2 card-weather">
                        <div class="px-0">Dasawisma <?php echo $rowa['nama']; ?></div>
                        <div class="px-0 text-muted small">Rekap Kota Bitung <i class="label bg-yellow"> 15 Kecamatan </i></div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-2 text-right  d-print-none">
                    <button class="btn btn-sm btn-sm btn-primary btn-icon-text" onclick="window.print()"><i class="mdi mdi-printer btn-icon-prepend"></i></button>
                    <a href="#" class="btn btn-sm btn-sm btn-info btn-icon-text"><i class="mdi mdi-chart-bar btn-icon-prepend"></i> Progres</a>
                </div>
                <div class="mb-2 d-none">
                    <button type="button" id="reload" class="d-none  btn btn-sm btn-info-2 btn-icon-text"><i class="mdi mdi-backup-restore btn-icon-prepend"></i> Muat Ulang</button>
                    <a href="#" class="d-none btn btn-sm btn-sm btn-primary btn-icon-text"><i class="mdi mdi-chart-bar btn-icon-prepend"></i> Chart</a>

                </div>

                <div class="col mb-3 mt-3">
                    <h4 class="font-weight-normal text-center">Hasil Pendataan Real Time</h4>
                    <h4 class="font-weight-normal text-center mb-2">Kelompok Dasawisma <?php echo $rowa['nama']; ?></h4>
                </div>

                <div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th>Kecamatan</th>
            <th>Kelurahan</th>
            <th>RW</th>
            <th>RT</th>
            <th>Dasawisma</th>
            <th>KK</th>
            <th>#</th>
          </tr>
        </thead>
        <tbody>
            
            <?php
                   $count = 1;
				   
                   $sql = $conn->prepare("SELECT m_kecamatan.nama AS nama_kec, data_rekap.j_kel AS jumlah_kelurahan, data_rekap.j_rw AS jumlah_rw, data_rekap.j_rt AS jumlah_rt, data_rekap.j_dasawisma AS jumlah_dasawisma, data_rekap.j_kk AS jumlah_kk FROM `data_rekap` INNER JOIN m_kecamatan ON data_rekap.id_kec = m_kecamatan.id GROUP BY id_kec ORDER BY m_kecamatan.id ASC");
                   $sql->execute();
                   while($data=$sql->fetch()) {
                ?>
                
          <tr>
            <td><?php echo $data['nama_kec'];?></td>
            <td><?php echo $data['jumlah_kelurahan'];?></td>
            <td><?php echo $data['jumlah_rw'];?></td>
            <td><?php echo $data['jumlah_rt'];?></td>
            <td><?php echo $data['jumlah_dasawisma'];?></td>
            <td><?php echo $data['jumlah_kk'];?></td>
            <td>
              <div class="btn btn-primary"><i class="fa-solid fa-book"></i> Rekap Kecamatan</div>
            </td>
          </tr>
          
          <?php
                $count=$count+1;
                } 
                ?>
          
          
        </tbody>
      </table>
                </div>
            </div>
        </div>

        <div class="d-print-block">
            <div class="card data-icon-card-primary mb-2 mt-2">
                <div class="card-body">
                    <h3 class="card-title text-md-center text-xl-left text-white">Kelompok Dasawisma</h3>
                    <div class="row">
                        <div class="col-8 text-white">
                            <h3>13.332<span>
                                    <small> Kelompok</small>
                                </span></h3>

                            <h4 class="text-white font-weight-lighter mb-2">743 <span><small>Laki-Laki</small></span></h4>
                            <h4 class="text-white font-weight-lighter mb-0">12.589 <span><small>Perempuan</small></span></h4>
                            <ul>
                                <hr>
                                <h4 class="mb-2 mt-3 font-weight-lighter text-black">682.122<span><small> Data Warga</small></span></h4>
                                <h4 class="mb-2 font-weight-lighter text-black">201.304<span><small> Data Bangunan</small></span></h4>
                                <h4 class="mb-2 font-weight-lighter text-black">170.990<span><small> Catatan Keluraga</small></span></h4>
                            </ul>
                        </div>
                        <div class="col-4 background-icon">
                            <i class="mdi mdi-library"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
        <h4>Bar Chart</h4>
<div class="container-fluid">
      <?php

      // Fungsi untuk menghasilkan data dummy
      function generateDummyData($count = 8)
      {
        $data = [];
        $locations = ['Lembeh Selatan', 'Madidir', 'Ranowulu', 'Aertembaga', 'Matuari', 'Girian', 'Maesa', 'Lembeh Utara'];

        for ($i = 0; $i < $count; $i++) {
          $data[$locations[$i]] = [
            "Value 1" => rand(10, 100),
            "Value 2" => rand(10, 100),
            "Value 3" => rand(10, 100),
            "Value 4" => rand(10, 100),
          ];
        }
        return $data;
      }

      // Mendapatkan data dummy
      $dummyData = generateDummyData();

      // Mengonversi data dummy ke format yang dapat digunakan oleh Chart.js
      $labels = json_encode(array_keys($dummyData));
      $values = json_encode(array_values($dummyData));

      ?>

      <div style="width: 100%; margin: auto;" class="">
        <canvas id="barChart"></canvas>
      </div>

      <script>
        // Mengambil data dari PHP dan mengonversi ke JavaScript
        var labels = <?php echo $labels; ?>;
        var values = <?php echo $values; ?>;

        // Membuat bar chart menggunakan Chart.js versi 3
        var ctx = document.getElementById('barChart').getContext('2d');
        var datasets = [];

        // Membuat dataset untuk setiap nilai
        var colors = ['rgba(173, 216, 230, 0.6)', 'rgba(0, 0, 128, 0.6)', 'rgba(144, 238, 144, 0.6)', 'rgba(0, 128, 0, 0.6)'];

        for (var i = 0; i < 4; i++) {
          var dataset = {
            label: ['Klp. Dasawisma', 'Data Rumah', 'Data Warga', 'Catatan Keluarga'][i], // Atur label sesuai index
            data: values.map(item => item['Value ' + (i + 1)]),
            backgroundColor: colors[i],
            borderColor: colors[i],
            borderWidth: 1
          };
          datasets.push(dataset);
        }

        // Membuat bar chart dengan multiple datasets
        var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: labels,
            datasets: datasets
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            },
            plugins: {
              legend: {
                display: true,
                position: 'bottom',
                labels: {
                  text: ['Klp. Dasawisma', 'Data Rumah', 'Data Warga', 'Catatan Keluarga']
                }
              }
            }
          }
        });
      </script>
    </div>

        </div>
        </div>
        
       
        
          


    </div>
</div>

<div class="print-new-page d-print-block"></div>

<div class="col-md-12 col-xl-12 mx-auto animated fadeIn delay-3s d-print-block">

    <div class="row mt-2">

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Jumlah Warga</p>
                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">682.122</h3>
                        <i class="mdi mdi-human-male-female icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    </div>
                    <ul>
                        <h4 class="mb-2 mt-3 text-blue">330.387<span><small> Laki-Laki</small></span></h4>
                        <h4 class="mb-2 text-blue">351.735<span><small> Perempuan</small></span></h4>
                    </ul>
                </div>
                <div class="card-footer">
                    
			<canvas id="totalwarga" class="chartjs-render-monitor mt-1" style="display: block; height: 210px; width: 100%;"></canvas>
                <script>
                    var xValues = ["Laki-Laki","Perempuan"];
                    var yValues = [330387,351735];
                    new Chart("totalwarga", {
						plugins: [ChartDataLabels],
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                data: yValues
                            }]
                        },
                        options: {
							responsive: true,
                            legend: {
                                display: true,
                                fullWidth: true,
                                position: "right",
                                labels: {
                                    boxWidth: 15
                                }
                            },
							plugins: {

								colorschemes: {
									scheme: "tableau.Tableau20"
								},
								datalabels: {
									borderColor: "black",
									borderRadius: 3,
									borderWidth: 0.7,
									color: "black",
									backgroundColor: "white",
									font: {
									  weight: "bold"
									},
									formatter: Math.round,
									display: "auto",
									align: "center",
									anchor: "center",
									rotation: "5"
									},

							}
                        }
                    });
                </script>
		                  </div>
            </div>
        </div>

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Warga Laki-laki</p>
                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">330.387</h3>
                        <i class="mdi mdi-human-male icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    </div>
                    <ul>
                        <h4 class="mb-2 text-blue">185.467<span><small> Belum Menikah</small></span></h4>
                        <h4 class="mb-2 mt-2 text-blue">137.500<span><small> Sudah Menikah</small></span></h4>
                        <h4 class="mb-2 text-blue">192.887<span><small> Pernah Menikah</small></span></h4>
                    </ul>
                </div>
                <div class="card-footer">
                    
			<canvas id="menikahlakilaki" class="chartjs-render-monitor mt-1" style="display: block; height: 210px; width: 100%;"></canvas>
                <script>
                    var xValues = ["Belum Menikah","Sudah Menikah","Pernah Menikah"];
                    var yValues = [185467,137500,192887];
                    new Chart("menikahlakilaki", {
						plugins: [ChartDataLabels],
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                data: yValues
                            }]
                        },
                        options: {
							responsive: true,
                            legend: {
                                display: true,
                                fullWidth: true,
                                position: "right",
                                labels: {
                                    boxWidth: 15
                                }
                            },
							plugins: {

								colorschemes: {
									scheme: "tableau.Tableau20"
								},
								datalabels: {
									borderColor: "black",
									borderRadius: 3,
									borderWidth: 0.7,
									color: "black",
									backgroundColor: "white",
									font: {
									  weight: "bold"
									},
									formatter: Math.round,
									display: "auto",
									align: "center",
									anchor: "center",
									rotation: "5"
									},

							}
                        }
                    });
                </script>
		                  </div>
            </div>
        </div>

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Warga Perempuan</p>
                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">351.735</h3>
                        <i class="mdi mdi-human-female icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    </div>
                    <ul>
                        <h4 class="mb-2 mt-2 text-blue">168.156<span><small> Belum Menikah</small></span></h4>
                        <h4 class="mb-2 text-blue">155.066<span><small> Sudah Menikah</small></span></h4>
                        <h4 class="mb-2 text-blue">196.669<span><small> Pernah Menikah</small></span></h4>
                    </ul>
                </div>
                <div class="card-footer">
                    
			<canvas id="menikahperempuan" class="chartjs-render-monitor mt-1" style="display: block; height: 210px; width: 100%;"></canvas>
                <script>
                    var xValues = ["Belum Menikah","Sudah Menikah","Pernah Menikah"];
                    var yValues = [168156,155066,196669];
                    new Chart("menikahperempuan", {
						plugins: [ChartDataLabels],
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                data: yValues
                            }]
                        },
                        options: {
							responsive: true,
                            legend: {
                                display: true,
                                fullWidth: true,
                                position: "right",
                                labels: {
                                    boxWidth: 15
                                }
                            },
							plugins: {

								colorschemes: {
									scheme: "tableau.Tableau20"
								},
								datalabels: {
									borderColor: "black",
									borderRadius: 3,
									borderWidth: 0.7,
									color: "black",
									backgroundColor: "white",
									font: {
									  weight: "bold"
									},
									formatter: Math.round,
									display: "auto",
									align: "center",
									anchor: "center",
									rotation: "5"
									},

							}
                        }
                    });
                </script>
		                  </div>
            </div>
        </div>

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Warga Bermukim</p>
                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">665.478</h3>
                        <i class="mdi mdi-human-male-female icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    </div>
                    <ul>
                        <h4 class="mb-2 mt-3 text-blue">322.181<span><small> Laki-Laki</small></span></h4>
                        <h4 class="mb-2 text-blue">343.297<span><small> Perempuan</small></span></h4>
                    </ul>
                </div>
                <div class="card-footer">
                    
			<canvas id="totalpendatang" class="chartjs-render-monitor mt-1" style="display: block; height: 210px; width: 100%;"></canvas>
                <script>
                    var xValues = ["Laki-Laki","Perempuan"];
                    var yValues = [322181,343297];
                    new Chart("totalpendatang", {
						plugins: [ChartDataLabels],
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                data: yValues
                            }]
                        },
                        options: {
							responsive: true,
                            legend: {
                                display: true,
                                fullWidth: true,
                                position: "right",
                                labels: {
                                    boxWidth: 15
                                }
                            },
							plugins: {

								colorschemes: {
									scheme: "tableau.Tableau20"
								},
								datalabels: {
									borderColor: "black",
									borderRadius: 3,
									borderWidth: 0.7,
									color: "black",
									backgroundColor: "white",
									font: {
									  weight: "bold"
									},
									formatter: Math.round,
									display: "auto",
									align: "center",
									anchor: "center",
									rotation: "5"
									},

							}
                        }
                    });
                </script>
		                  </div>
            </div>
        </div>

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Pendatang/Perantau</p>
                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">16.644</h3>
                        <i class="mdi mdi-human-male-female icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    </div>
                    <ul>
                        <h4 class="mb-2 mt-3 text-blue">8.206<span><small> Laki-Laki</small></span></h4>
                        <h4 class="mb-2 text-blue">8.438<span><small> Perempuan</small></span></h4>
                    </ul>
                </div>
                <div class="card-footer">
                    
			<canvas id="totalPerantau" class="chartjs-render-monitor mt-1" style="display: block; height: 210px; width: 100%;"></canvas>
                <script>
                    var xValues = ["Laki-Laki","Perempuan"];
                    var yValues = [8206,8438];
                    new Chart("totalPerantau", {
						plugins: [ChartDataLabels],
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                data: yValues
                            }]
                        },
                        options: {
							responsive: true,
                            legend: {
                                display: true,
                                fullWidth: true,
                                position: "right",
                                labels: {
                                    boxWidth: 15
                                }
                            },
							plugins: {

								colorschemes: {
									scheme: "tableau.Tableau20"
								},
								datalabels: {
									borderColor: "black",
									borderRadius: 3,
									borderWidth: 0.7,
									color: "black",
									backgroundColor: "white",
									font: {
									  weight: "bold"
									},
									formatter: Math.round,
									display: "auto",
									align: "center",
									anchor: "center",
									rotation: "5"
									},

							}
                        }
                    });
                </script>
		                  </div>
            </div>
        </div>


        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Sarana Bangunan</p>
                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">1.311</h3>
                        <i class="mdi mdi-home-variant icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    </div>
                    <ul>
                        <h4 class="mb-2 mt-2 text-blue ">413<span><small> Sarana Pendidikan</small></span></h4>
                        <h4 class="mb-2 text-blue ">192<span><small> Sarana Kesahatan</small></span></h4>
                        <h4 class="mb-2 text-blue ">463<span><small> Tempat Ibadah</small></span></h4>
                        <h4 class="mb-2 text-blue ">243<span><small> Kantor Pemerintahan</small></span></h4>
                    </ul>
                </div>
                <div class="card-footer">
                    
			<canvas id="saranabangunan" class="chartjs-render-monitor mt-1" style="display: block; height: 210px; width: 100%;"></canvas>
                <script>
                    var xValues = ["Sarana Pendidikan","Sarana Kesahatan","Tempat Ibadah","Kantor Pemerintah"];
                    var yValues = [413,192,463,243];
                    new Chart("saranabangunan", {
						plugins: [ChartDataLabels],
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                data: yValues
                            }]
                        },
                        options: {
							responsive: true,
                            legend: {
                                display: true,
                                fullWidth: true,
                                position: "right",
                                labels: {
                                    boxWidth: 15
                                }
                            },
							plugins: {

								colorschemes: {
									scheme: "tableau.Tableau20"
								},
								datalabels: {
									borderColor: "black",
									borderRadius: 3,
									borderWidth: 0.7,
									color: "black",
									backgroundColor: "white",
									font: {
									  weight: "bold"
									},
									formatter: Math.round,
									display: "auto",
									align: "center",
									anchor: "center",
									rotation: "5"
									},

							}
                        }
                    });
                </script>
		                  </div>
            </div>
        </div>
    </div>
</div>

<div class="print-new-page d-print-block"></div>

<div class="col-md-12 col-xl-12 mx-auto animated fadeIn delay-3s d-print-block">
    <div class="row mt-2">

        <div class="col-md-4 grid-margin stretch-card print-new-page">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Bangunan/Pemukiman</p>
                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">201.304</h3>
                        <i class="mdi mdi-home-variant icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    </div>
                    <ul>
                        <h4 class="mb-2 mt-3  text-blue">188.197<span><small> Rumah Sehat</small></span></h4>
                        <h4 class="mb-2 text-blue ">13.107<span><small> Kurang Sehat</small></span></h4>
                    </ul>
                </div>
                <div class="card-footer">
                    
			<canvas id="rumahsehat" class="chartjs-render-monitor mt-1" style="display: block; height: 210px; width: 100%;"></canvas>
                <script>
                    var xValues = ["Rumah Sehat","Kurang Sehat"];
                    var yValues = [188197,13107];
                    new Chart("rumahsehat", {
						plugins: [ChartDataLabels],
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                data: yValues
                            }]
                        },
                        options: {
							responsive: true,
                            legend: {
                                display: true,
                                fullWidth: true,
                                position: "right",
                                labels: {
                                    boxWidth: 15
                                }
                            },
							plugins: {

								colorschemes: {
									scheme: "tableau.Tableau20"
								},
								datalabels: {
									borderColor: "black",
									borderRadius: 3,
									borderWidth: 0.7,
									color: "black",
									backgroundColor: "white",
									font: {
									  weight: "bold"
									},
									formatter: Math.round,
									display: "auto",
									align: "center",
									anchor: "center",
									rotation: "5"
									},

							}
                        }
                    });
                </script>
		                  </div>
            </div>
        </div>

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Pasangan Keluarga</p>
                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">320.835</h3>
                        <i class="ion-person-stalker icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    </div>
                    <ul>
                        <h4 class="mb-2 mt-3 text-blue">115.546<span><small> Pasangan Usia Subur</small></span></h4>
                        <h4 class="mb-2 text-blue">144.253<span><small> Wanita Usia Subur</small></span></h4>
                        <h4 class="mb-2 text-blue">61.036<span><small> Lansia</small></span></h4>
                    </ul>
                </div>
                <div class="card-footer">
                    
			<canvas id="ibuhamilz" class="chartjs-render-monitor mt-1" style="display: block; height: 210px; width: 100%;"></canvas>
                <script>
                    var xValues = ["Pasangan Usia Subur","Wanita Usia Subur","Lansia"];
                    var yValues = ["115546","144253","61036"];
                    new Chart("ibuhamilz", {
						plugins: [ChartDataLabels],
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                data: yValues
                            }]
                        },
                        options: {
							responsive: true,
                            legend: {
                                display: true,
                                fullWidth: true,
                                position: "right",
                                labels: {
                                    boxWidth: 15
                                }
                            },
							plugins: {

								colorschemes: {
									scheme: "tableau.Tableau20"
								},
								datalabels: {
									borderColor: "black",
									borderRadius: 3,
									borderWidth: 0.7,
									color: "black",
									backgroundColor: "white",
									font: {
									  weight: "bold"
									},
									formatter: Math.round,
									display: "auto",
									align: "center",
									anchor: "center",
									rotation: "5"
									},

							}
                        }
                    });
                </script>
		                  </div>
            </div>
        </div>


        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Ibu dan Balita</p>
                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">53.403</h3>
                        <i class="ion-person-stalker icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    </div>
                    <ul>
                        <h4 class="mb-2 mt-3 text-blue">3.237<span><small> Ibu Hamil</small></span></h4>
                        <h4 class="mb-2 text-blue">11.131<span><small> Ibu Menyusui</small></span></h4>
                        <h4 class="mb-2 text-blue">39.035<span><small> Balita</small></span></h4>
                    </ul>
                </div>
                <div class="card-footer">
                    
			<canvas id="ibubalita" class="chartjs-render-monitor mt-1" style="display: block; height: 210px; width: 100%;"></canvas>
                <script>
                    var xValues = ["Ibu Hamil","Ibu Menyusui","Balita"];
                    var yValues = ["3237","11131","39035"];
                    new Chart("ibubalita", {
						plugins: [ChartDataLabels],
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                data: yValues
                            }]
                        },
                        options: {
							responsive: true,
                            legend: {
                                display: true,
                                fullWidth: true,
                                position: "right",
                                labels: {
                                    boxWidth: 15
                                }
                            },
							plugins: {

								colorschemes: {
									scheme: "tableau.Tableau20"
								},
								datalabels: {
									borderColor: "black",
									borderRadius: 3,
									borderWidth: 0.7,
									color: "black",
									backgroundColor: "white",
									font: {
									  weight: "bold"
									},
									formatter: Math.round,
									display: "auto",
									align: "center",
									anchor: "center",
									rotation: "5"
									},

							}
                        }
                    });
                </script>
		                  </div>
            </div>
        </div>

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Menjalani Pendidikan</p>
                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">644.101</h3>
                        <i class="mdi mdi-school icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    </div>
                    <ul>
                        <h4 class="mb-2 mt-3 text-blue">61.822<span><small> Belum Sekolah</small></span></h4>
                        <h4 class="mb-2 text-blue">38.021<span><small> Tidak Tamat SD</small></span></h4>
                        <h4 class="mb-2 text-blue">127.302<span><small> SD/MI Sederajat</small></span></h4>
                        <h4 class="mb-2 text-blue">100.366<span><small> SMP/Sederajat</small></span></h4>
                        <h4 class="mb-2 text-blue">255.518<span><small> SMU/SMK/Sederajat</small></span></h4>
                        <h4 class="mb-2 text-blue">37.424<span><small> Diploma</small></span></h4>
                        <h4 class="mb-2 text-blue">55.179<span><small> S1</small></span></h4>
                        <h4 class="mb-2 text-blue">5.571<span><small> S2</small></span></h4>
                        <h4 class="mb-2 text-blue">919<span><small> S3</small></span></h4>
                    </ul>
                </div>
                <div class="card-footer">
                    
			<canvas id="chartsekolah" class="chartjs-render-monitor mt-1" style="display: block; height: 210px; width: 100%;"></canvas>
                <script>
                    var xValues = ["Belum Sekolah","Tidak Tamat SD","SD\/MI Sederajat","SMP\/Sederajat","SMU\/SMK\/Sederajat","Diploma","S1","S2","S3"];
                    var yValues = [61822,38021,127302,100366,255518,37424,55179,5571,919];
                    new Chart("chartsekolah", {
						plugins: [ChartDataLabels],
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                data: yValues
                            }]
                        },
                        options: {
							responsive: true,
                            legend: {
                                display: true,
                                fullWidth: true,
                                position: "right",
                                labels: {
                                    boxWidth: 15
                                }
                            },
							plugins: {

								colorschemes: {
									scheme: "tableau.Tableau20"
								},
								datalabels: {
									borderColor: "black",
									borderRadius: 3,
									borderWidth: 0.7,
									color: "black",
									backgroundColor: "white",
									font: {
									  weight: "bold"
									},
									formatter: Math.round,
									display: "auto",
									align: "center",
									anchor: "center",
									rotation: "5"
									},

							}
                        }
                    });
                </script>
		                  </div>
            </div>
        </div>

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Akseptor KB</p>
                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">44.364</h3>
                        <i class="mdi mdi-pill icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    </div>
                    <ul>
                        <h4 class="mb-2 mt-3 text-blue">10.565<span><small> PIL</small></span></h4>
                        <h4 class="mb-2 text-blue">465<span><small> Kondom</small></span></h4>
                        <h4 class="mb-2 text-blue">21.678<span><small> Suntik</small></span></h4>
                        <h4 class="mb-2 text-blue">3.667<span><small> Implan</small></span></h4>
                        <h4 class="mb-2 text-blue">2.541<span><small> IUD atau Spiral KB</small></span></h4>
                        <h4 class="mb-2 text-blue">979<span><small> KB permanen</small></span></h4>
                        <h4 class="mb-2 text-blue">4.469<span><small> Jenis KB Lainnya</small></span></h4>
                    </ul>
                </div>
                <div class="card-footer">
                    
			<canvas id="chartKB" class="chartjs-render-monitor mt-1" style="display: block; height: 210px; width: 100%;"></canvas>
                <script>
                    var xValues = ["PIL","Kondom","Suntik","Implan","IUD atau Spiral KB","KB permanen","Jenis KB Lainnya"];
                    var yValues = [10565,465,21678,3667,2541,979,4469];
                    new Chart("chartKB", {
						plugins: [ChartDataLabels],
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                data: yValues
                            }]
                        },
                        options: {
							responsive: true,
                            legend: {
                                display: true,
                                fullWidth: true,
                                position: "right",
                                labels: {
                                    boxWidth: 15
                                }
                            },
							plugins: {

								colorschemes: {
									scheme: "tableau.Tableau20"
								},
								datalabels: {
									borderColor: "black",
									borderRadius: 3,
									borderWidth: 0.7,
									color: "black",
									backgroundColor: "white",
									font: {
									  weight: "bold"
									},
									formatter: Math.round,
									display: "auto",
									align: "center",
									anchor: "center",
									rotation: "5"
									},

							}
                        }
                    });
                </script>
		                  </div>
            </div>
        </div>

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Pekerjaan</p>
                    <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">347.794</h3>
                        <i class="mdi mdi-worker icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    </div>
                    <ul>
                        <h4 class="mb-2 mt-3 text-blue">2.415<span><small> Petani</small></span></h4>
                        <h4 class="mb-2 text-blue">11.996<span><small> Pedagang</small></span></h4>
                        <h4 class="mb-2 text-blue">84.350<span><small> Swasta</small></span></h4>
                        <h4 class="mb-2 text-blue">18.054<span><small> Wirausaha</small></span></h4>
                        <h4 class="mb-2 text-blue">21.584<span><small> PNS</small></span></h4>
                        <h4 class="mb-2 text-blue">4.612<span><small> TNI/POLRI</small></span></h4>
                        <h4 class="mb-2 text-blue">204.783<span><small> Lainnya</small></span></h4>
                    </ul>
                </div>
                <div class="card-footer">
                    
			<canvas id="chartKerja" class="chartjs-render-monitor mt-1" style="display: block; height: 210px; width: 100%;"></canvas>
                <script>
                    var xValues = ["Petani","Pedagang","Swasta","Wirausaha","PNS","NI\/POLRI","Lainnya"];
                    var yValues = [2415,11996,84350,18054,21584,4612,204783];
                    new Chart("chartKerja", {
						plugins: [ChartDataLabels],
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                data: yValues
                            }]
                        },
                        options: {
							responsive: true,
                            legend: {
                                display: true,
                                fullWidth: true,
                                position: "right",
                                labels: {
                                    boxWidth: 15
                                }
                            },
							plugins: {

								colorschemes: {
									scheme: "tableau.Tableau20"
								},
								datalabels: {
									borderColor: "black",
									borderRadius: 3,
									borderWidth: 0.7,
									color: "black",
									backgroundColor: "white",
									font: {
									  weight: "bold"
									},
									formatter: Math.round,
									display: "auto",
									align: "center",
									anchor: "center",
									rotation: "5"
									},

							}
                        }
                    });
                </script>
		                  </div>
            </div>
        </div>
    </div>
</div>

<div class="print-new-page d-print-block"></div>

<div class="col-md-12 col-xl-12 mx-auto animated fadeIn delay-3s d-print-block">
    <div class="row mt-2">

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Agama</p>
                    
			<canvas id="chartAgama" class="chartjs-render-monitor mt-1" style="display: block; height: 210px; width: 100%;"></canvas>
                <script>
                    var xValues = ["Islam","Kristen","Katholik","Hindu","Budha","Konghuchu","Aliran Kepercayaan"];
                    var yValues = [613749,44349,15817,747,7303,34,123];
                    new Chart("chartAgama", {
						plugins: [ChartDataLabels],
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                data: yValues
                            }]
                        },
                        options: {
							responsive: true,
                            legend: {
                                display: true,
                                fullWidth: true,
                                position: "right",
                                labels: {
                                    boxWidth: 15
                                }
                            },
							plugins: {

								colorschemes: {
									scheme: "tableau.Tableau20"
								},
								datalabels: {
									borderColor: "black",
									borderRadius: 3,
									borderWidth: 0.7,
									color: "black",
									backgroundColor: "white",
									font: {
									  weight: "bold"
									},
									formatter: Math.round,
									display: "auto",
									align: "center",
									anchor: "center",
									rotation: "5"
									},

							}
                        }
                    });
                </script>
		                  </div>
            </div>
        </div>

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Mengikuti Program Bina Keluarga Balita</p>
                    
			<canvas id="chartPKBalita" class="chartjs-render-monitor mt-1" style="display: block; height: 210px; width: 100%;"></canvas>
                <script>
                    var xValues = ["Ya","Tidak"];
                    var yValues = [23286,658836];
                    new Chart("chartPKBalita", {
						plugins: [ChartDataLabels],
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                data: yValues
                            }]
                        },
                        options: {
							responsive: true,
                            legend: {
                                display: true,
                                fullWidth: true,
                                position: "right",
                                labels: {
                                    boxWidth: 15
                                }
                            },
							plugins: {

								colorschemes: {
									scheme: "tableau.Tableau20"
								},
								datalabels: {
									borderColor: "black",
									borderRadius: 3,
									borderWidth: 0.7,
									color: "black",
									backgroundColor: "white",
									font: {
									  weight: "bold"
									},
									formatter: Math.round,
									display: "auto",
									align: "center",
									anchor: "center",
									rotation: "5"
									},

							}
                        }
                    });
                </script>
		                  </div>
            </div>
        </div>

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Memiliki Tabungan</p>
                    
			<canvas id="chartTabungan" class="chartjs-render-monitor mt-1" style="display: block; height: 210px; width: 100%;"></canvas>
                <script>
                    var xValues = ["Ya","Tidak"];
                    var yValues = [254741,427381];
                    new Chart("chartTabungan", {
						plugins: [ChartDataLabels],
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                data: yValues
                            }]
                        },
                        options: {
							responsive: true,
                            legend: {
                                display: true,
                                fullWidth: true,
                                position: "right",
                                labels: {
                                    boxWidth: 15
                                }
                            },
							plugins: {

								colorschemes: {
									scheme: "tableau.Tableau20"
								},
								datalabels: {
									borderColor: "black",
									borderRadius: 3,
									borderWidth: 0.7,
									color: "black",
									backgroundColor: "white",
									font: {
									  weight: "bold"
									},
									formatter: Math.round,
									display: "auto",
									align: "center",
									anchor: "center",
									rotation: "5"
									},

							}
                        }
                    });
                </script>
		                  </div>
            </div>
        </div>

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Kelompok Belajar</p>
                    
			<canvas id="chartKLPBelajar" class="chartjs-render-monitor mt-1" style="display: block; height: 210px; width: 100%;"></canvas>
                <script>
                    var xValues = ["Paket A","Paket B","Paket C","Baca. Tulis. dan Hitung"];
                    var yValues = [2642,314,640,198];
                    new Chart("chartKLPBelajar", {
						plugins: [ChartDataLabels],
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                data: yValues
                            }]
                        },
                        options: {
							responsive: true,
                            legend: {
                                display: true,
                                fullWidth: true,
                                position: "right",
                                labels: {
                                    boxWidth: 15
                                }
                            },
							plugins: {

								colorschemes: {
									scheme: "tableau.Tableau20"
								},
								datalabels: {
									borderColor: "black",
									borderRadius: 3,
									borderWidth: 0.7,
									color: "black",
									backgroundColor: "white",
									font: {
									  weight: "bold"
									},
									formatter: Math.round,
									display: "auto",
									align: "center",
									anchor: "center",
									rotation: "5"
									},

							}
                        }
                    });
                </script>
		                  </div>
            </div>
        </div>

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Kegiatan Koperasi</p>
                    
			<canvas id="chartKoperasi" class="chartjs-render-monitor mt-1" style="display: block; height: 210px; width: 100%;"></canvas>
                <script>
                    var xValues = ["Koperasi Konsumsi","Koperasi Produksi","Koperasi Simpan Pinjam","Koperasi Serba Usaha"];
                    var yValues = [3030,135,3097,956];
                    new Chart("chartKoperasi", {
						plugins: [ChartDataLabels],
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                data: yValues
                            }]
                        },
                        options: {
							responsive: true,
                            legend: {
                                display: true,
                                fullWidth: true,
                                position: "right",
                                labels: {
                                    boxWidth: 15
                                }
                            },
							plugins: {

								colorschemes: {
									scheme: "tableau.Tableau20"
								},
								datalabels: {
									borderColor: "black",
									borderRadius: 3,
									borderWidth: 0.7,
									color: "black",
									backgroundColor: "white",
									font: {
									  weight: "bold"
									},
									formatter: Math.round,
									display: "auto",
									align: "center",
									anchor: "center",
									rotation: "5"
									},

							}
                        }
                    });
                </script>
		                  </div>
            </div>
        </div>

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Berkebutuhan Khusus</p>
                    
			<canvas id="chartKebKhusus" class="chartjs-render-monitor mt-1" style="display: block; height: 210px; width: 100%;"></canvas>
                <script>
                    var xValues = ["Fisik","Mental","Fisik dan Mental"];
                    var yValues = [2715,932,3059];
                    new Chart("chartKebKhusus", {
						plugins: [ChartDataLabels],
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                data: yValues
                            }]
                        },
                        options: {
							responsive: true,
                            legend: {
                                display: true,
                                fullWidth: true,
                                position: "right",
                                labels: {
                                    boxWidth: 15
                                }
                            },
							plugins: {

								colorschemes: {
									scheme: "tableau.Tableau20"
								},
								datalabels: {
									borderColor: "black",
									borderRadius: 3,
									borderWidth: 0.7,
									color: "black",
									backgroundColor: "white",
									font: {
									  weight: "bold"
									},
									formatter: Math.round,
									display: "auto",
									align: "center",
									anchor: "center",
									rotation: "5"
									},

							}
                        }
                    });
                </script>
		                  </div>
            </div>
        </div>


    </div>
</div>



<div class="print-new-page d-print-block"></div>

<div class="col-md-12 col-xl-12 mx-auto animated fadeIn delay-3s d-print-block">
    <div class="row mt-2">

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Makanan Pokok</p>
                    
			<canvas id="chartMakananPokok" class="chartjs-render-monitor mt-1" style="display: block; height: 210px; width: 100%;"></canvas>
                <script>
                    var xValues = ["Beras","Non Bras"];
                    var yValues = [161904,39400];
                    new Chart("chartMakananPokok", {
						plugins: [ChartDataLabels],
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                data: yValues
                            }]
                        },
                        options: {
							responsive: true,
                            legend: {
                                display: true,
                                fullWidth: true,
                                position: "right",
                                labels: {
                                    boxWidth: 15
                                }
                            },
							plugins: {

								colorschemes: {
									scheme: "tableau.Tableau20"
								},
								datalabels: {
									borderColor: "black",
									borderRadius: 3,
									borderWidth: 0.7,
									color: "black",
									backgroundColor: "white",
									font: {
									  weight: "bold"
									},
									formatter: Math.round,
									display: "auto",
									align: "center",
									anchor: "center",
									rotation: "5"
									},

							}
                        }
                    });
                </script>
		                  </div>
            </div>
        </div>

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Memiliki Jamban</p>
                    
			<canvas id="chartMemilikiJamban" class="chartjs-render-monitor mt-1" style="display: block; height: 210px; width: 100%;"></canvas>
                <script>
                    var xValues = ["Ya","Tidak"];
                    var yValues = [166279,21];
                    new Chart("chartMemilikiJamban", {
						plugins: [ChartDataLabels],
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                data: yValues
                            }]
                        },
                        options: {
							responsive: true,
                            legend: {
                                display: true,
                                fullWidth: true,
                                position: "right",
                                labels: {
                                    boxWidth: 15
                                }
                            },
							plugins: {

								colorschemes: {
									scheme: "tableau.Tableau20"
								},
								datalabels: {
									borderColor: "black",
									borderRadius: 3,
									borderWidth: 0.7,
									color: "black",
									backgroundColor: "white",
									font: {
									  weight: "bold"
									},
									formatter: Math.round,
									display: "auto",
									align: "center",
									anchor: "center",
									rotation: "5"
									},

							}
                        }
                    });
                </script>
		                  </div>
            </div>
        </div>

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Sumber Air</p>
                    
			<canvas id="chartSumberAir" class="chartjs-render-monitor mt-1" style="display: block; height: 210px; width: 100%;"></canvas>
                <script>
                    var xValues = ["PDAM","SUMUR","SUNGAI","LAINNYA"];
                    var yValues = [118469,43409,128,8984];
                    new Chart("chartSumberAir", {
						plugins: [ChartDataLabels],
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                data: yValues
                            }]
                        },
                        options: {
							responsive: true,
                            legend: {
                                display: true,
                                fullWidth: true,
                                position: "right",
                                labels: {
                                    boxWidth: 15
                                }
                            },
							plugins: {

								colorschemes: {
									scheme: "tableau.Tableau20"
								},
								datalabels: {
									borderColor: "black",
									borderRadius: 3,
									borderWidth: 0.7,
									color: "black",
									backgroundColor: "white",
									font: {
									  weight: "bold"
									},
									formatter: Math.round,
									display: "auto",
									align: "center",
									anchor: "center",
									rotation: "5"
									},

							}
                        }
                    });
                </script>
		                  </div>
            </div>
        </div>

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Tempat Sampah</p>
                    
			<canvas id="chartTempatSampah" class="chartjs-render-monitor mt-1" style="display: block; height: 210px; width: 100%;"></canvas>
                <script>
                    var xValues = ["ADA","TIDAK ADA"];
                    var yValues = [158429,12561];
                    new Chart("chartTempatSampah", {
						plugins: [ChartDataLabels],
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                data: yValues
                            }]
                        },
                        options: {
							responsive: true,
                            legend: {
                                display: true,
                                fullWidth: true,
                                position: "right",
                                labels: {
                                    boxWidth: 15
                                }
                            },
							plugins: {

								colorschemes: {
									scheme: "tableau.Tableau20"
								},
								datalabels: {
									borderColor: "black",
									borderRadius: 3,
									borderWidth: 0.7,
									color: "black",
									backgroundColor: "white",
									font: {
									  weight: "bold"
									},
									formatter: Math.round,
									display: "auto",
									align: "center",
									anchor: "center",
									rotation: "5"
									},

							}
                        }
                    });
                </script>
		                  </div>
            </div>
        </div>

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Pembuangan Limbah</p>
                    
			<canvas id="chartPembuanganLimbah" class="chartjs-render-monitor mt-1" style="display: block; height: 210px; width: 100%;"></canvas>
                <script>
                    var xValues = ["ADA","TIDAK ADA"];
                    var yValues = [153026,17964];
                    new Chart("chartPembuanganLimbah", {
						plugins: [ChartDataLabels],
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                data: yValues
                            }]
                        },
                        options: {
							responsive: true,
                            legend: {
                                display: true,
                                fullWidth: true,
                                position: "right",
                                labels: {
                                    boxWidth: 15
                                }
                            },
							plugins: {

								colorschemes: {
									scheme: "tableau.Tableau20"
								},
								datalabels: {
									borderColor: "black",
									borderRadius: 3,
									borderWidth: 0.7,
									color: "black",
									backgroundColor: "white",
									font: {
									  weight: "bold"
									},
									formatter: Math.round,
									display: "auto",
									align: "center",
									anchor: "center",
									rotation: "5"
									},

							}
                        }
                    });
                </script>
		                  </div>
            </div>
        </div>

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Stiker P4K</p>
                    
			<canvas id="chartStikerP4K" class="chartjs-render-monitor mt-1" style="display: block; height: 210px; width: 100%;"></canvas>
                <script>
                    var xValues = ["ADA","TIDAK ADA"];
                    var yValues = [17604,153386];
                    new Chart("chartStikerP4K", {
						plugins: [ChartDataLabels],
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                data: yValues
                            }]
                        },
                        options: {
							responsive: true,
                            legend: {
                                display: true,
                                fullWidth: true,
                                position: "right",
                                labels: {
                                    boxWidth: 15
                                }
                            },
							plugins: {

								colorschemes: {
									scheme: "tableau.Tableau20"
								},
								datalabels: {
									borderColor: "black",
									borderRadius: 3,
									borderWidth: 0.7,
									color: "black",
									backgroundColor: "white",
									font: {
									  weight: "bold"
									},
									formatter: Math.round,
									display: "auto",
									align: "center",
									anchor: "center",
									rotation: "5"
									},

							}
                        }
                    });
                </script>
		                  </div>
            </div>
        </div>

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Memperoleh UP2K</p>
                    
			<canvas id="chartPerolehUP2K" class="chartjs-render-monitor mt-1" style="display: block; height: 210px; width: 100%;"></canvas>
                <script>
                    var xValues = ["YA","TIDAK"];
                    var yValues = [19620,151370];
                    new Chart("chartPerolehUP2K", {
						plugins: [ChartDataLabels],
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                data: yValues
                            }]
                        },
                        options: {
							responsive: true,
                            legend: {
                                display: true,
                                fullWidth: true,
                                position: "right",
                                labels: {
                                    boxWidth: 15
                                }
                            },
							plugins: {

								colorschemes: {
									scheme: "tableau.Tableau20"
								},
								datalabels: {
									borderColor: "black",
									borderRadius: 3,
									borderWidth: 0.7,
									color: "black",
									backgroundColor: "white",
									font: {
									  weight: "bold"
									},
									formatter: Math.round,
									display: "auto",
									align: "center",
									anchor: "center",
									rotation: "5"
									},

							}
                        }
                    });
                </script>
		                  </div>
            </div>
        </div>

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Mengikuti Program Kesehatan Lingkungan</p>
                    
			<canvas id="chartMPKL" class="chartjs-render-monitor mt-1" style="display: block; height: 210px; width: 100%;"></canvas>
                <script>
                    var xValues = ["YA","TIDAK"];
                    var yValues = [67614,103376];
                    new Chart("chartMPKL", {
						plugins: [ChartDataLabels],
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                data: yValues
                            }]
                        },
                        options: {
							responsive: true,
                            legend: {
                                display: true,
                                fullWidth: true,
                                position: "right",
                                labels: {
                                    boxWidth: 15
                                }
                            },
							plugins: {

								colorschemes: {
									scheme: "tableau.Tableau20"
								},
								datalabels: {
									borderColor: "black",
									borderRadius: 3,
									borderWidth: 0.7,
									color: "black",
									backgroundColor: "white",
									font: {
									  weight: "bold"
									},
									formatter: Math.round,
									display: "auto",
									align: "center",
									anchor: "center",
									rotation: "5"
									},

							}
                        }
                    });
                </script>
		                  </div>
            </div>
        </div>

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Aktif Posyandu</p>
                    
			<canvas id="chartAktifPosyandu" class="chartjs-render-monitor mt-1" style="display: block; height: 210px; width: 100%;"></canvas>
                <script>
                    var xValues = ["YA","TIDAK"];
                    var yValues = [38227,643895];
                    new Chart("chartAktifPosyandu", {
						plugins: [ChartDataLabels],
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                data: yValues
                            }]
                        },
                        options: {
							responsive: true,
                            legend: {
                                display: true,
                                fullWidth: true,
                                position: "right",
                                labels: {
                                    boxWidth: 15
                                }
                            },
							plugins: {

								colorschemes: {
									scheme: "tableau.Tableau20"
								},
								datalabels: {
									borderColor: "black",
									borderRadius: 3,
									borderWidth: 0.7,
									color: "black",
									backgroundColor: "white",
									font: {
									  weight: "bold"
									},
									formatter: Math.round,
									display: "auto",
									align: "center",
									anchor: "center",
									rotation: "5"
									},

							}
                        }
                    });
                </script>
		                  </div>
            </div>
        </div>

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Mengikuti Paud</p>
                    
			<canvas id="chartMengikutiPaud" class="chartjs-render-monitor mt-1" style="display: block; height: 210px; width: 100%;"></canvas>
                <script>
                    var xValues = ["YA","TIDAK"];
                    var yValues = [17490,664632];
                    new Chart("chartMengikutiPaud", {
						plugins: [ChartDataLabels],
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                data: yValues
                            }]
                        },
                        options: {
							responsive: true,
                            legend: {
                                display: true,
                                fullWidth: true,
                                position: "right",
                                labels: {
                                    boxWidth: 15
                                }
                            },
							plugins: {

								colorschemes: {
									scheme: "tableau.Tableau20"
								},
								datalabels: {
									borderColor: "black",
									borderRadius: 3,
									borderWidth: 0.7,
									color: "black",
									backgroundColor: "white",
									font: {
									  weight: "bold"
									},
									formatter: Math.round,
									display: "auto",
									align: "center",
									anchor: "center",
									rotation: "5"
									},

							}
                        }
                    });
                </script>
		                  </div>
            </div>
        </div>

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">3 Buta</p>
                    
			<canvas id="chart3Buta" class="chartjs-render-monitor mt-1" style="display: block; height: 210px; width: 100%;"></canvas>
                <script>
                    var xValues = ["3 Buta"];
                    var yValues = ["3692"];
                    new Chart("chart3Buta", {
						plugins: [ChartDataLabels],
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                data: yValues
                            }]
                        },
                        options: {
							responsive: true,
                            legend: {
                                display: true,
                                fullWidth: true,
                                position: "right",
                                labels: {
                                    boxWidth: 15
                                }
                            },
							plugins: {

								colorschemes: {
									scheme: "tableau.Tableau20"
								},
								datalabels: {
									borderColor: "black",
									borderRadius: 3,
									borderWidth: 0.7,
									color: "black",
									backgroundColor: "white",
									font: {
									  weight: "bold"
									},
									formatter: Math.round,
									display: "auto",
									align: "center",
									anchor: "center",
									rotation: "5"
									},

							}
                        }
                    });
                </script>
		                  </div>
            </div>
        </div>

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Pendataan</p>
                    
			<canvas id="chartPendataan" class="chartjs-render-monitor mt-1" style="display: block; height: 210px; width: 100%;"></canvas>
                <script>
                    var xValues = ["Data Warga","Data Bangunan","Catatan Keluarga"];
                    var yValues = [682122,201304,170990];
                    new Chart("chartPendataan", {
						plugins: [ChartDataLabels],
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                data: yValues
                            }]
                        },
                        options: {
							responsive: true,
                            legend: {
                                display: true,
                                fullWidth: true,
                                position: "right",
                                labels: {
                                    boxWidth: 15
                                }
                            },
							plugins: {

								colorschemes: {
									scheme: "tableau.Tableau20"
								},
								datalabels: {
									borderColor: "black",
									borderRadius: 3,
									borderWidth: 0.7,
									color: "black",
									backgroundColor: "white",
									font: {
									  weight: "bold"
									},
									formatter: Math.round,
									display: "auto",
									align: "center",
									anchor: "center",
									rotation: "5"
									},

							}
                        }
                    });
                </script>
		                  </div>
            </div>
        </div>

    </div>
</div>



<h4 class="mb-2 mt-3 font-weight-lighter text-black">682.122<span><small> Data Warga</small></span></h4>
<h4 class="mb-2 font-weight-lighter text-black">201.304<span><small> Data Bangunan</small></span></h4>
<h4 class="mb-2 font-weight-lighter text-black">170.990<span><small> Catatan Keluraga</small></span></h4>


<script type="text/javascript">
    $(document).ready(function() {
        var table;
        //datatables
        table = $('#table').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            "ordering": false,
            "iDisplayLength": 25,
            "responsive": {
                "details": {
                    "type": 'column',
                    "target": 'tr'
                }
            },
            "searching": false,
            "info": false,
            "bLengthChange": false,
            "oLanguage": {
                "sProcessing": '<i class="fa fa-spinner fa-spin fa-fw"></i> Loading...'
            },

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "https://dasawisma.pkk.makassarkota.go.id/rekap/jsonkota",
                "type": "POST",
            },
            //Set column definition initialisation properties.
            "columnDefs": [{
                    "className": 'control text-center',
                    "targets": 0,
                    "orderable": false
                },

                {
                    "targets": 1,
                    "orderable": false
                },
                {
                    "orderable": false,
                    "targets": 2
                },
                {
                    "className": "d-print-none",
                    "orderable": false,
                    "targets": 9
                },
            ],
        });

        $("#reload").click(function() {
            table.ajax.reload();
        });


    });
</script></div>
<!-- content-wrapper ends -->
<footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">

                    DASAWISMA - V.1.3.5        <br>Copyright © 2024. <a href="#" class="text-navy" target="_blank">TP-PKK Kota Bitung</a>.
        </span>
        <!-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><a href="https://ratomi.sulsel.net" class="linkabout text-navy" target="_blank">by. Ratomi</a></span> -->
    </div>
</footer>

<!-- partial  -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- modal -->
<div class="modal modal-top animated fadeInUp delay-30s" id="modalGue" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary  text-white">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalContent"></div>
        </div>
    </div>
</div>
<!-- end modal -->

<!-- js -->


<script src="../../assets/js/off-canvas.js"></script>
<script src="../../assets/js/hoverable-collapse.js"></script>
<script src="../../assets/js/template.js"></script>
<script src="../../assets/js/settings.js"></script>
<script src="../../assets/js/todolist.js"></script>
<script src="../../assets/js/clipboard.js"></script>
<script src="../../assets/js/tooltips.js"></script>
<script src="../../assets/js/popover.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#modalGue').on('hide.bs.modal', function() {
            setTimeout(function() {
                $('.modal-dialog').removeClass('modal-lg modal-sm modal-md');
                $('#modalTitle, #modalContent , #modalFooter').html('');
            }, 500);
        });


        if ($(".select2").length) {
            $('.select2').select2();
        }

    });
</script>

</body>

</html>