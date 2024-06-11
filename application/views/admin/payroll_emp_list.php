<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-left mb-4">
        <h1 class="h3 mb-0 mr-3 text-gray-800"> เลือกพนักงาน

        </h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">

           

            <!-- ======== Employee List ==========  -->
            <div class="card shadow h-100 py-2 col-12">

                <!-- Employee Info -->
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid">
                        <thead>
                            <tr role="row" class="info bg-primary text-white ">

                                <th tabindex="0" rowspan="1" colspan="1" style="width: 6%;" class='text-center'>รูปภาพ</th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 30%;" class='text-center'>ชื่อ-สกุล</th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;" class='text-center'>ลักษณะการจ้าง</th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;" class='text-center'>ตำแหน่ง</th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 7%;" class='text-center'>อายุงาน</th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;" class='text-center'>เพิ่มเงินเดือน</th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;" class='text-center'>ดูข้อมูลเงินเดือน</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($allEmployee as $row) { ?>
                                <!-- Age Calculation-->
                                <?php $currentDate = date('Y-m-d');
                                $diffage = abs(strtotime($currentDate) - strtotime($row->employee_birthdate));
                                $yearsage = floor($diffage / (365 * 60 * 60 * 24));
                                ?>

                                <!-- Work Period Calculation-->
                                <?php $currentDate = date('Y-m-d');
                                $diffworkperiod = abs(strtotime($currentDate) - strtotime($row->dateCreate));
                                $yearsworkperiod = floor($diffworkperiod / (365 * 60 * 60 * 24));
                                $monthsworkperiod = floor(($diffworkperiod - $yearsworkperiod * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                                $daysworkperiod = floor(($diffworkperiod - $yearsworkperiod * 365 * 60 * 60 * 24 - $monthsworkperiod * 30 * 60 * 60 * 24) / (60 * 60 * 24));
                                ?>


                                <tr role="row">
                                    <td><img src="<?= base_url('/assets/employee_profile_img/' . $row->employee_profile_img); ?>" width="100px"></td>
                                    <td><?= $row->employee_name; ?></td>
                                    <td><?= $row->employtype_name; ?></td>
                                    <td>
                                        <?= $row->position_name; ?><br>
                                        <?php if ($row->position_id != 0) : ?>
                                            <small>(<?= $row->position_department; ?>)</small>
                                        <?php endif; ?><br>
                                    </td>
                                    <td><? printf("%d ปี<br>%d เดือน<br>%d วัน\n", $yearsworkperiod, $monthsworkperiod, $daysworkperiod); ?></td>

                                    <td align="center">
                                        <a href="<?php echo site_url('admin/add_payroll/' . $row->employee_id); ?>" class="btn btn-success btn-xs">
                                            <i class="fa fa-fw fa-comment-dollar"></i>
                                        </a>
                                    </td>
                                    <td align="center">
                                        <a href="<?php echo site_url('admin/employee_payroll_list/' . $row->employee_id); ?>" class="btn btn-info btn-xs">
                                            <i class="fa fa-fw fa-chart-simple"></i>
                                        </a>
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