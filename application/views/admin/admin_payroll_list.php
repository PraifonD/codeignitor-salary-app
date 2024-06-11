<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-left mb-4">
        <h1 class="h3 mb-0 mr-3 text-gray-800"> บัญชีเงินเดือน
            <a href="<?= site_url('admin/show_emp_payroll'); ?>" class="btn btn-primary btn-icon-split ml-2">
                <span class="icon text-white-50">
                    <i class="fas fa-money-check-dollar"></i>
                </span>
                <span class="text">สร้าง Payroll</span>
            </a>
        </h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">

            <!-- ======== Summary ==========  -->
            <div class="row">

                <!-- Card จำนวนรายการที่สร้างเดือนนี้ -->
                <div class="col-12 col-sm-8 col-md-4 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 ml-3 mr-3">
                            Payroll ที่สร้างแล้ว ในเดือน
                            <?php
                            $ThMonth = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
                            $currentThMonth = $ThMonth[(date('m')) - 1];
                            echo $currentThMonth
                            ?> </div>
                        <div class="card-body">
                            <h4 class="small font-weight-bold">Full-time<span class="float-right"> คน</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- ======== End of Summary ==========  -->


            <!-- ======== Employee List ==========  -->
            <div class="card shadow h-100 py-2 col-12">
                <!-- tag button -->
                <!-- <div class="card-header align-center">
                    <select name="" id="" class="col-2">
                        <option value=""></option>
                    </select>
                </div> -->

                <!-- Employee Info -->
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid">
                        <thead>
                            <tr role="row" class="info bg-primary text-white ">
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 7%;" class='text-center'>ID</th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;" class='text-center'>งวดจ่าย</th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;" class='text-center'>ชื่อ-สกุล</th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;" class='text-center'>ฐานเงินเดือน</th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width:10%;" class='text-center'>ภาษี ณ ที่จ่าย</th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;" class='text-center'>ประกันสังคม</th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;" class='text-center'>เงินเดือนสุทธิ</th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;" class='text-center'>สถานะการจ่าย</th>


                                <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;" class='text-center'>จ่าย </th>

                                <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;" class='text-center'>ลบ</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($allPayroll as $row) { ?>

                                <!-- *** งวดเงินเดือน*** -->
                                <?php
                                $ThMonth = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
                                $payroll_month = $ThMonth[(date('m', strtotime($row->payroll_month))) - 1];
                                ?>


                                <tr role="row">
                                    <td align="center"><?= $row->payroll_id; ?></td>
                                    <td align="center"><?=$payroll_month?> &nbsp; <?=date('Y', strtotime($row->payroll_month))?></td>
                                    <td><?= $row->employee_name; ?></td>
                                    <td align="right"><?= number_format($row->base_salary, 2, '.', ''); ?></td>
                                    <td align="right"><?= number_format($row->payroll_tax, 2, '.', ''); ?></td>
                                    <td align="right"><?= number_format($row->payroll_ss, 2, '.', '') ;?></td>
                                    <td align="right"><?= number_format($row->payroll_total, 2, '.', '') ; ?></td>

                                    <td align="center" style = "color:<?=$row->color;?>;"><?= $row->status_name; ?></td>



                                    <td align="center">

                                    <form action="<?= site_url('admin/approvePayroll/' . $row->payroll_id); ?>" method="post">
                                    <input type="hidden" name="payroll_id" value="<?= $row->payroll_id;?>">
                                    <input type="hidden" name="payroll_status" value="1">
                                    <button class="btn btn-primary" type="submit" onclick="return confirm('จ่ายเงินเดือนให้ <?=$row->employee_name;?> จำนวน: <?= $row->base_salary; ?> บาท');">
                                            <i class="fa fa-fw fa-money-bill"></i></button>

                                    </td>
                                    </form>

                                    <td align="center">
                                        <a class="btn btn-danger btn-xs" href="<?= site_url('admin/delete_payroll/' . $row->payroll_id); ?>" role="button" onclick="return confirm('ยืนยันการลบข้อมูล??');"><i class="fa fa-fw fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>


            </div>
            <!-- ======== Eng Employee List ==========  -->

        </div>
    </div>
</div>
<!-- /.container-fluid -->
<!-- End of Main Content -->