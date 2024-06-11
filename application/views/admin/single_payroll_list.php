<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-left mb-4">
        <h1 class="h3 mb-0 mr-3 text-gray-800"> รายการเงินเดือนย้อนหลัง
        </h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">

            <!-- ======== Summary ==========  -->

            <!-- ======== End of Summary ==========  -->


            <!-- ======== Employee List ==========  -->
            <div class="card shadow h-100 py-2 col-12">
                <!-- tag button -->
                <!-- <div class="card-header align-center">
                    <select name="" id="" class="col-2">
                        <option value=""></option>
                    </select>
                </div> -->


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

                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($latestPayroll as $row) { ?>
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