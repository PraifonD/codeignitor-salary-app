<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-left mb-4">
        <h1 class="h3 mb-0 mr-3 text-gray-800"> ข้อมูลพนักงาน
            <a href="<?= site_url('admin/add_employee'); ?>" class="btn btn-primary btn-icon-split ml-2">
                <span class="icon text-white-50">
                    <i class="fas fa-user-plus"></i>
                </span>
                <span class="text">เพิ่มพนักงาน</span>
            </a>
        </h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">

            <!-- ======== Summary ==========  -->
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
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            Full-time</div>
                                        <div class="h5 d-flex align-items-center justify-content-center font-weight-bold text-gray-800 h-75"><?= '20 คน' ?></div>
                                    </div>
                                    <div class="col-4 px-3 border-right h-100">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            Part-time</div>
                                        <div class="h5 d-flex align-items-center justify-content-center font-weight-bold text-gray-800 h-75"><?= '20 คน' ?></div>
                                    </div>
                                    <div class="col-4 px-3 h-100">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            Trainee</div>
                                        <div class="h5 d-flex align-items-center justify-content-center font-weight-bold text-gray-800 h-75"><?= '20 คน' ?></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ======== End of Summary ==========  -->


            <!-- ======== Employee List ==========  -->
            <div class="card shadow h-100 py-2 col-12">

                <!-- Employee Info -->
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid">
                        <thead>
                            <tr role="row" class="info bg-primary text-white ">
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 2%;" class='text-center'>id</th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 6%;" class='text-center'>รูปภาพ</th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 16%;" class='text-center'>Username</th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 30%;" class='text-center'>ข้อมูลส่วนตัว</th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 12%;" class='text-center'>ลักษณะ<br>การจ้าง</th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;" class='text-center'>ตำแหน่ง</th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;" class='text-center'>อายุงาน</th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;" class='text-center'>แก้<br>รหัสผ่าน</th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;" class='text-center'>แก้ไข<br>ข้อมูล</th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;" class='text-center'>ลบ</th>
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
                                    <td align="center"><?= $row->employee_id; ?></td>
                                    <td><img src="<?= base_url('/assets/employee_profile_img/' . $row->employee_profile_img); ?>" width="100px"></td>
                                    <td><?= $row->employee_username; ?></td>
                                    <td>
                                        <?= $row->employee_name; ?> <br>
                                        <small class="mt-2">
                                            เบอร์โทรศัพท์ : <?= $row->employee_phone; ?> <br>
                                            ที่อยู่ : <?= $row->employee_address; ?> <br>
                                            อายุ : <? printf("%d ปี\n", $yearsage); ?> <br>
                                        </small>
                                    </td>
                                    <td><?= $row->employtype_name; ?></td>
                                    <td>
                                        <?= $row->position_name; ?><br>
                                        <?php if ($row->position_id != 0) : ?>
                                            <small>(<?= $row->position_department; ?>)</small>
                                        <?php endif; ?><br>
                                    </td>
                                    <td><? printf("%d ปี<br>%d เดือน<br>%d วัน\n", $yearsworkperiod, $monthsworkperiod, $daysworkperiod); ?></td>

                                    <td align="center">
                                        <a href="<?php echo site_url('admin/edit_employee_password/' . $row->employee_id); ?>" class="btn btn-info btn-xs">
                                            <i class="fa fa-fw fa-unlock-keyhole"></i>
                                        </a>
                                    </td>
                                    <td align="center">
                                        <a href="<?php echo site_url('admin/edit_employee/' . $row->employee_id); ?>" class="btn btn-warning btn-xs">
                                            <i class="fa fa-fw fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                    <td align="center">
                                        <a class="btn btn-danger btn-xs" href="<?= site_url('admin/delete_employee/' . $row->employee_id); ?>" role="button" onclick="return confirm('ยืนยันการลบข้อมูล??');"><i class="fa fa-fw fa-trash"></i></a>
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