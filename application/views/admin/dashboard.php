<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12 col-md-6 mb-4 mx-0 px-0">
            <!-- Current Date card -->
            <div class="col-12 mb-4 h-100">
                <div class="card border-left-info shadow h-100 py-1">
                    <div class="text-xs font-weight-bold text-info text-uppercase my-2 ml-3 mr-3">
                        จำนวนพนักงานปัจจุบัน</div>
                    <div class="card-body">
                        <div class="row no-gutters align-items-center  h-100">
                            <div class="col-4 px-3 border-right h-100">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Full-time</div>
                                <div class="h5 d-flex align-items-center justify-content-center font-weight-bold text-gray-800 h-75"><?= $queryFull->totalFull; ?> คน</div>
                            </div>
                            <div class="col-4 px-3 border-right h-100">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Part-time</div>
                                <div class="h5 d-flex align-items-center justify-content-center font-weight-bold text-gray-800 h-75"><?= $queryPart->totalPart; ?> คน</div>
                            </div>
                            <div class="col-4 px-3 h-100">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Trainee</div>
                                <div class="h5 d-flex align-items-center justify-content-center font-weight-bold text-gray-800 h-75"><?= $queryTrainee->totalTrainee; ?> คน</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12  col-md-6 mb-4 px-0">
            <!-- Current Date card -->
            <div class="col-xl-6 col-md-12 mb-2">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    วันที่</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ThDate['currentThFullDate'] ?> </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-12 mb-0">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> จำนวน Payroll ของเดือน <?= $ThDate['currentThMonth'] ?>
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                    </div>
                                    <?php ?>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Current Date card -->
        <div class="col-12 mb-4">
            <div class="card shadow h-100 ">
                <div class="card-header text-primary">
                    เงินเดือนในแต่ละเดือน
                </div>
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <?php
                        // //เรียกใช้งานไฟล์เชื่อมต่อฐานข้อมูล
                        // require_once 'connect.php';
                        // //คิวรี่ข้อมูลหาผมรวมยอดขายโดยใช้ SQL SUM
                        // $stmt = $conn->prepare("
                        //     SELECT product_type, SUM(amount) as total
                        //     FROM tbl_sales
                        //     GROUP BY product_type");
                        // $stmt->execute();
                        // $result = $stmt->fetchAll();
                        // //นำข้อมูลที่ได้จากคิวรี่มากำหนดรูปแบบข้อมุลให้ถูกโครงสร้างของกราฟที่ใช้ *อ่าน docs เพิ่มเติม
                        // $report_data = array();
                        // foreach ($result as $rs) {
                        //     /*
                        // โครงสร้างข้อมูลของกราฟ
                        // {
                        // name: "Chrome",
                        // y: 62.74,
                        // drilldown: "Chrome"
                        // },
                        // */
                        //     //ทำข้อมูลให้ถูกโครงสร้างก่อนนำไปแสดงในกราฟ docs : https://www.highcharts.com/demo/column-drilldown
                        //     $report_data[] = '
                        // {
                        // name:' . '"' . $rs['product_type'] . '"' . ',' //label
                        //         . 'y:' . $rs['total'] . //ตัวเลขยอดขาย
                        //         ','
                        //         . 'drilldown:' . '"' . $rs['product_type'] . '"' . ',' //label ด้านล่าง
                        //         . '}';
                        // }
                        // //ตัด , ตัวสุดท้ายออก
                        // $report_data = implode(",", $report_data);
                        ?>
                        <?= $report_data; ?>
                        <hr>
                        <figure class="highcharts-figure">
                            <div id="container"></div>
                            <p class="highcharts-description">.</p>
                        </figure>
                        <script>
                            // Create the chart
                            Highcharts.chart('container', {
                                chart: {
                                    type: 'column'
                                },
                                title: {
                                    text: 'รายงานยอดขาย........................'
                                },
                                subtitle: {
                                    text: 'จาก...............................'
                                },
                                accessibility: {
                                    announceNewData: {
                                        enabled: true
                                    }
                                },
                                xAxis: {
                                    type: 'category'
                                },
                                yAxis: {
                                    title: {
                                        text: 'แสดงยอดขาย............'
                                    }
                                },
                                legend: {
                                    enabled: false
                                },
                                plotOptions: {
                                    series: {
                                        borderWidth: 0,
                                        dataLabels: {
                                            enabled: true,
                                            format: '{point.y:.2f} บาท'
                                        }
                                    }
                                },
                                tooltip: {
                                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f} บาท</b> of total<br/>'
                                },
                                series: [{
                                    name: "ยอดขาย",
                                    colorByPoint: true,
                                    //เอาข้อมูลมา echo ตรงนี้
                                    data: [<?= $report_data; ?>]
                                }]
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">จำนวนพนักงานแยกตามแผนก</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="employeeChart" width="301" height="245" style="display: block; width: 301px; height: 245px;" class="chartjs-render-monitor"></canvas>
                        <script>
                            var ctx = document.getElementById("employeeChart");
                            var employeeChart = new Chart(ctx, {
                                type: 'doughnut',
                                data: {
                                    labels: ["Unpay", "Paid"],
                                    datasets: [{
                                        data: [<?=$queryUnpay->totalUnpay?>,<?=$queryPaid->totalPaid?>],
                                        backgroundColor: ['#dc3545', '#4e73df'], 
                                        hoverBackgroundColor: ['#b02a37', '#2e59d9'],
                                        hoverBorderColor: "rgba(234, 236, 244, 1)",
                                    }],
                                },
                                options: {
                                    maintainAspectRatio: false,
                                    tooltips: {
                                        backgroundColor: "rgb(255,255,255)",
                                        bodyFontColor: "#858796",
                                        borderColor: '#dddfeb',
                                        borderWidth: 1,
                                        xPadding: 15,
                                        yPadding: 15,
                                        displayColors: false,
                                        caretPadding: 10,
                                    },
                                    legend: {
                                        display: false
                                    },
                                    cutoutPercentage: 80,
                                },
                            });
                        </script>

                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-danger"></i> Unpay
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Paid
                        </span>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->