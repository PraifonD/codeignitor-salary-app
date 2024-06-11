<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Reset Password พนักงาน</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- Brand Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">ฟอร์ม Reset Password พนักงาน</h6>
                </div>
                <div class="card-body">
                    <form role="form" action="<?= site_url('employee/editpassword'); ?>" method="post" class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-2 control-label">
                                    Username
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="employee_username" class="form-control" required placeholder="email" value="<?= $employee->employee_username; ?>" disabled>

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-2 control-label">
                                    ชื่อ
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="employee_name" class="form-control" required placeholder="ชื่อ ขั้นต่ำ 4 ตัว" value="<?= $employee->employee_name; ?>" minlength="4" disabled>
                                    <span class="fr"><?= form_error('employee_name'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2 control-label">
                                    New Password
                                </div>
                                <div class="col-sm-3">
                                    <input type="password" name="employee_password1" class="form-control" placeholder="รหัสผ่านใหม่">
                                    <span class="fr"><?= form_error('employee_password1'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2 control-label">
                                    Confirm Password
                                </div>
                                <div class="col-sm-3">
                                    <input type="password" name="employee_password2" class="form-control" placeholder="ยืนยันรหัสผ่าน">
                                    <span class="fr"><?= form_error('employee_password2'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2 control-label">
                                </div>
                                <div class="col-sm-10">
                                    <input type="hidden" name="employee_id" value="<?= $employee->employee_id; ?>">
                                    <span class="fr"><?= form_error('employee_id'); ?></span>
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-fw fa-save"></i> บันทึกข้อมูล</button>
                                    <a class="btn btn-danger" href="<?= site_url('employee'); ?>" role="button"><i class="fa fa-fw fa-close"></i> ยกเลิก</a>


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