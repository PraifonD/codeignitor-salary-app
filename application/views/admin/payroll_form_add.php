<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">เพิ่มข้อมูลเงินเดือน</h1>

    <div class="row">

        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">ฟอร์มเพิ่มข้อมูลเงินเดือน</h6>
                </div>
                <div class="card-body">
                    <form role="form" action="<?= site_url('admin/conf_payroll/' . $employee->employee_id); ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="box-body">
                            <div>
                                <h6 class="text-primary">ข้อมูล Payroll</h6>

                                <div class="form-group row">
                                    <div class="col-12 col-md-6 mb-3 mb-md-1">
                                        <label class="col">ชื่อ-นามสกุล</label>
                                        <div class="col-sm-12">
                                            <select name="employee_name" class="form-control" Disabled>
                                                <option value="<?= $employee->employee_id; ?>" hidden>
                                                    <?= $employee->employee_name; ?>
                                                </option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3 mb-md-1">
                                        <label class="col">เดือนที่จ่ายเงินเดือน</label>
                                        <div class="col-sm-4">
                                            <input type="month" name="payroll_month" class="form-control" placeholder="payroll_month" value="" required>
                                        </div>
                                    </div>


                                </div>

                                <div class="form-group">
                                    <div class="col-12 control-label">
                                        Base Salary
                                    </div>
                                    <div class="col-4">
                                        <input type="number" name="base_salary" class="form-control" placeholder="base_salary" value="<?php
                                        if(!$getPayroll) {
                                            echo " ";
                                       } else {
                                            echo $getPayroll->base_salary;
                                       }
                                        ?>">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-sm-2 control-label">
                                    </div>
                                    <div class="col-sm-10">

                                        <button class="btn btn-primary" type="submit">
                                        <input type="hidden" name="employee_id" class="form-control " value="<?= $employeeID ?>">

                                            <i class="fas fa-fw fa-save"></i> บันทึกข้อมูล</button>
                                        <a class="btn btn-danger" href="<?php echo  site_url('admin/show_emp_payroll'); ?>" role="button"><i class="fas fa-circle-xmark"></i> ยกเลิก</a>
                                    </div>
                                </div>



                            </div><!-- /.box-body -->
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->