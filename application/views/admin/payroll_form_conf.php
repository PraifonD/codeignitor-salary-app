<!-- ------- CALCULATION ------- -->
<?php
$step1 = 150000;
$step2 = 300000;
$step3 = 500000;
$step4 = 750000;
$step5 = 1000000;
$step6 = 2000000;
$step7 = 5000000;


$trate2 = 0.05;
$trate3 = 0.10;
$trate4 = 0.15;
$trate5 = 0.20;
$trate6 = 0.25;
$trate7 = 0.30;
$trate8 = 0.35;


$stax2 = ($baseSalary * 12) - $step1;
$stax3 = ($baseSalary * 12) - $step2;
$stax4 = ($baseSalary * 12) - $step3;
$stax5 = ($baseSalary * 12) - $step4;
$stax6 = ($baseSalary * 12) - $step5;
$stax7 = ($baseSalary * 12) - $step6;
$stax8 = ($baseSalary * 12) - $step7;




if ($baseSalary * 12 <= $step1) {
    $tax = 0;
} elseif ($baseSalary * 12 <= $step2) {
    $tax = $stax2 * $trate2;
} elseif ($baseSalary * 12 <= $step3) {
    $tax = ($stax3 * $trate3) + (($step2 - $step1) * $trate2);
} elseif ($baseSalary * 12 <= $step4) {
    $tax = ($stax4 * $trate4) + (($step3 - $step2) * $trate3) + (($step2 - $step1) * $trate2);
} elseif ($baseSalary * 12 <= $step5) {
    $tax = ($stax5 * $trate5) + (($step4 - $step3) * $trate4) + (($step3 - $step2) * $trate3) + (($step2 - $step1) * $trate2);
} elseif ($baseSalary * 12 <= $step6) {
    $tax = ($stax6 * $trate6) + (($step5 - $step4) * $trate5) + (($step4 - $step3) * $trate4) + (($step3 - $step2) * $trate3) + (($step2 - $step1) * $trate2);
} elseif ($baseSalary * 12 <= $step7) {
    $tax = ($stax7 * $trate7) + (($step6 - $step5) * $trate6) + (($step5 - $step4) * $trate5) + (($step4 - $step3) * $trate4) + (($step3 - $step2) * $trate3) + (($step2 - $step1) * $trate2);
} else {
    $tax = ($stax8 * $trate8) + (($step7 - $step6) * $trate7) + (($step6 - $step5) * $trate6) + (($step5 - $step4) * $trate5) + (($step4 - $step3) * $trate4) + (($step3 - $step2) * $trate3) + (($step2 - $step1) * $trate2);
}
$mtax = $tax / 12;
?>

<!-- // Social Security -->
<?php
if ($baseSalary >= 15000) {
    $ss = 750;
} else {
    $ss = $baseSalary * 5 / 100;
}
?>
<!-- // Total Salary -->
<?php
$totalSalary  = $baseSalary - $ss - $mtax;
?>

<!-- ------- END CALCULATION ------- -->



<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">เพิ่มข้อมูลพนักงาน</h1>

    <div class="row">

        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">ฟอร์มเพิ่มข้อมูลพนักงาน</h6>
                </div>
                <div class="card-body">
                    <form role="form" action="<?= site_url('admin/adding_payroll'); ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="box-body">

                            <h6 class="text-primary">ข้อมูล Account</h6>

                            <div class="form-group row">
                                <div class="col-12 col-md-6 mb-3 mb-md-1">
                                    <label class="col">รายชื่อพนักงาน</label>
                                    <div class="col-sm-12">
                                        <select name="employee_id" class="form-control" disabled>
                                            <option value=" " hidden>เลือกพนักงาน</option>
                                            <?php foreach ($allEmployee as $row) { ?>
                                                <option value="<?= $row->employee_id ?>" <?= set_select('employee_id', $row->employee_id) ?>>
                                                    <?= $row->employee_name ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3 mb-md-1">
                                    <label class="col">เดือนที่จ่ายเงินเดือน</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="payroll_month" class="form-control" disabled placeholder="payroll_month" value="<?= $payrollMonth; ?>">
                                    </div>
                                </div>


                            </div>



                            <div class="form-group row">
                                <div class="col-12 col-md-6 mb-3 mb-md-1">
                                    <label class="col">ฐานเงินเดือน</label>
                                    <div class="col-sm-12">
                                        <input type="number" name="base_salary" class="form-control" placeholder="กรุณากรอก ฐานเงิินเดือน" value="<?= $baseSalary; ?>" disabled>
                                        <span class="fr"></span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3 mb-md-1">
                                    <label class="col">ภาษีหัก ณ ที่จ่าย</label>
                                    <div class="col-sm-12">
                                        <input type="number" name="payroll_tax" class="form-control" value="<?= $mtax; ?>" disabled>
                                        <span class="fr"></span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3 mb-md-1">
                                    <label class="col">ค่าประกันสังคม</label>
                                    <div class="col-sm-12">
                                        <input type="number" name="payroll_ss" class="form-control" value="<?= $ss; ?>" disabled>
                                        <span class="fr"></span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3 mb-md-1">
                                    <label class="col">เงินเดือนสุทธิิ</label>
                                    <div class="col-sm-12">
                                        <input type="number" name="payroll_total" class="form-control" value="<?= $totalSalary; ?>" disabled>
                                        <span class="fr"></span>
                                    </div>
                                </div>

                            </div>

                            <button class="btn btn-primary" type="submit">
                                <input type="hidden" name="payroll_status" class="form-control " value="2">
                                
                                <input type="hidden" name="employee_id" class="form-control " value="<?= $employeeID ?>">
                                <input type="hidden" name="payroll_month" class="form-control " value="<?= $payrollMonth; ?>">
                                <input type="hidden" name="base_salary" class="form-control " value="<?= $baseSalary; ?>">
                                <input type="hidden" name="payroll_tax" class="form-control " value="<?= $mtax; ?>">
                                <input type="hidden" name="payroll_ss" class="form-control " value="<?= $ss; ?>">
                                <input type="hidden" name="payroll_total" class="form-control " value="<?= $totalSalary; ?>">

                                <i class="fas fa-fw fa-save"></i> บันทึกข้อมูล</button>
                            <a class="btn btn-danger" href="<?php echo  site_url('admin/employee'); ?>" role="button"><i class="fas fa-circle-xmark"></i> ยกเลิก</a>
                        </div>
                </div>



            </div><!-- /.box-body -->
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->