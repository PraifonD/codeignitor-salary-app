<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">จัดการพนักงาน</h1>
    <p class="mb-4"> </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">ตารางแสดงข้อมูลพนักงาน &nbsp; &nbsp;
                <a href="<?= site_url('employee/add'); ?>" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-user-plus"></i>
                    </span>
                    <span class="text">เพิ่มพนักงาน</span>
                </a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                        <tr role="row" class="info">
                            <th tabindex="0" rowspan="1" colspan="1" style="width: 3%;" class='text-center'>id</th>
                            <th tabindex="0" rowspan="1" colspan="1" style="width: 3%;" class='text-center'>รูปภาพ</th>
                            <th tabindex="0" rowspan="1" colspan="1" style="width: 30%;" class='text-center'>ชื่อ-สกุล</th>
                            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;" class='text-center'>Username</th>
                            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;" class='text-center'>อายุ</th>
                            <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;" class='text-center'>ตำแหน่ง</th>
                            <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;" class='text-center'>อายุงาน</th>
                            <th tabindex="0" rowspan="1" colspan="1" style="width: 8%;" class='text-center'>แก้รหัสผ่าน</th>
                            <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;" class='text-center'>แก้ไขข้อมูล</th>
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
                                <td><?= $row->employee_name; ?></td>
                                <td><?= $row->employee_username; ?></td>
                                <td><? printf("%d ปี\n", $yearsage); ?></td>
                                <td>
                                    <?= $row->position_name; ?><br>
                                    <?php if ($row->position_id != 0) : ?>
                                        (<?= $row->position_department; ?>)
                                    <?php endif; ?></td>
                                <td><? printf("%d ปี, %d เดือน, %d วัน\n", $yearsworkperiod, $monthsworkperiod, $daysworkperiod); ?></td>

                                <td align="center">
                                    <a href="<?php echo site_url('employee/password/' . $row->employee_id); ?>" class="btn btn-info btn-xs">
                                        <i class="fa fa-fw fa-unlock-keyhole"></i>
                                    </a>
                                </td>
                                <td align="center">
                                    <a href="<?php echo site_url('employee/edit/' . $row->employee_id); ?>" class="btn btn-warning btn-xs">
                                        <i class="fa fa-fw fa-pen-to-square"></i>
                                    </a>
                                </td>
                                <td align="center">
                                    <a class="btn btn-danger btn-xs" href="<?= site_url('employee/delete/' . $row->employee_id); ?>" role="button" onclick="return confirm('ยืนยันการลบข้อมูล??');"><i class="fa fa-fw fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->