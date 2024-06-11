<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">ข้อมูลของฉัน</h1>

    <div class="row">

        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <!-- <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">ฟอร์มแก้ไขข้อมูลพนักงาน</h6>
                </div> -->
                <div class="card-body">
                    <form role="form" action="<?= site_url('employee/edit_profile'); ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="box-body">
                            <div>
                                <h6 class="text-primary">ข้อมูล Account</h6>
                                <div class="form-group row">
                                    <div class="col-12 col-md-6 mb-3 mb-md-1">
                                        <div class="col-12 control-label">
                                            Username
                                        </div>
                                        <div class="col-12">
                                            <input type="text" name="employee_username" class="form-control" placeholder="Username" value="<?= $employee->employee_username; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3 mb-md-1">
                                        <div class="col-12 control-label">
                                            รหัสพนักงาน
                                        </div>
                                        <div class="col-12">
                                            <input type="text" name="employee_id" class="form-control" placeholder="Username" value="<?= $employee->employee_id; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-5 mb-5">
                            <div>
                                <h6 class="text-primary">ข้อมูลทั่วไป</h6>
                                <div class="form-group row">
                                    <div class="col-12 col-md-6 mb-3 mb-md-1">
                                        <label class="col">ชื่อ-นามสกุล</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="employee_name" class="form-control" placeholder="กรุณากรอก ชื่อ-นามสกุล" value="<?= $employee->employee_name; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3 mb-md-1">
                                        <label class="col">เลขบัตรประชาชน</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="employee_citizen_id" class="form-control" placeholder="กรุณากรอก เลขบัตรประชาชน" value="<?= $employee->employee_citizen_id; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-md-6 mb-3 mb-md-1">
                                        <label class="col">วันเกิด</label>
                                        <div class="col-sm-12">
                                            <input type="date" name="employee_birthdate" class="form-control" value="<?= $employee->employee_birthdate; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3 mb-md-1">
                                        <label class="col">เพศ</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="employee_gender" class="form-control" value="<?= $employee->employee_gender; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-md-6 mb-3 mb-md-1">
                                        <label class="col">สถานภาพสมรส</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="employee_marital" class="form-control" value="<?= $employee->employee_marital; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3 mb-md-1">
                                        <div class="control-label">
                                            <label class="col">รูปถ่ายพนักงาน</label>
                                        </div>
                                        <div class="col-12">
                                            <img src="<?= base_url('assets/employee_profile_img/' . $employee->employee_profile_img); ?>" width="200px" class="mb-2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-5 mb-5">
                            <div>
                                <h6 class="text-primary">ข้อมูลการติดต่อ</h6>
                                <div class="form-group">
                                    <div class="col-sm-2 control-label">
                                        ที่อยู่
                                    </div>
                                    <div class="col-sm-12">
                                        <textarea rows="4 " type="text" name="employee_address" class="form-control" disabled><?= $employee->employee_address; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-md-6 mb-3 mb-md-1">
                                        <label class="col">เบอร์โทรศัพท์</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="employee_phone" class="form-control" value="<?= $employee->employee_phone; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3 mb-md-1">
                                        <label class="col">อีเมลล์</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="employee_email" class="form-control" value="<?= $employee->employee_email; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-5 mb-5">
                            <div>
                                <h6 class="text-primary">ข้อมูลการจ้างงาน</h6>
                                <div class="form-group row">
                                    <div class="col-12 col-md-6 mb-3 mb-md-1">
                                        <label class="col">ลักษณะการจ้างงาน</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="employee_employetype" class="form-control" value="<?= $employee->employtype_name; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3 mb-md-1">
                                        <label class="col">ตำแหน่ง</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="employee_position" class="form-control" value="<?= $employee->position_name; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-md-6 mb-3 mb-md-1">
                                        <label class="col">เงินเดือน</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="employee_marital" class="form-control" value="<?= $employee->employee_marital; ?>" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-2 control-label">
                                        <input type="hidden" name="employee_id" value="<?= $employee->employee_id; ?>">
                                    </div>
                                    <div class="col-sm-10">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-fw fa-save"></i> แก้ไขข้อมูล</button>
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