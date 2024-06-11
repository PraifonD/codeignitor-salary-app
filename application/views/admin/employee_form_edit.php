<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">แก้ไขข้อมูลพนักงาน</h1>

    <div class="row">

        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">ฟอร์มแก้ไขข้อมูลพนักงาน</h6>
                </div>
                <div class="card-body">
                    <form role="form" action="<?= site_url('admin/editing_employee'); ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
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

                                    <div class="col-12 col-md-6 mb-3 mb-md-1 d-flex">
                                        <div class="col-sm-12 d-flex align-items-end">
                                            <a class="btn btn-primary" href="<?php echo  site_url('admin/edit_employee_password/' . $employee->employee_id); ?>" role="button"><i class="fas fa-"></i>แก้รหัสผ่าน</a>
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
                                            <input type="text" name="employee_name" class="form-control" placeholder="กรุณากรอก ชื่อ-นามสกุล" value="<?= $employee->employee_name; ?>">
                                            <span class="fr"><?= form_error('employee_name'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3 mb-md-1">
                                        <label class="col">เลขบัตรประชาชน</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="employee_citizen_id" class="form-control" placeholder="กรุณากรอก เลขบัตรประชาชน" value="<?= $employee->employee_citizen_id; ?>">
                                            <span class="fr"><?= form_error('employee_citizen_id'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-md-6 mb-3 mb-md-1">
                                        <label class="col">วันเกิด</label>
                                        <div class="col-sm-12">
                                            <input type="date" name="employee_birthdate" class="form-control" value="<?= $employee->employee_birthdate; ?>">
                                            <span class="fr"><?= form_error('employee_birthdate'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3 mb-md-1">
                                        <label class="col">เพศ</label>
                                        <div class="col-sm-12">
                                            <select name="employee_gender" class="form-control">
                                                <option value="<?= $employee->employee_gender; ?>" hidden><?= $employee->employee_gender; ?></option>
                                                <option value="หญิง" <?= set_select('employee_gender', 'หญิง') ?>>หญิง</option>
                                                <option value="ชาย" <?= set_select('employee_gender', 'ชาย') ?>>ชาย</option>
                                            </select>
                                            <span class=" fr"><?= form_error('employee_gender'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-md-6 mb-3 mb-md-1">
                                        <label class="col">สถานภาพสมรส</label>
                                        <div class="col-sm-12">
                                            <select name="employee_marital" class="form-control">
                                                <option value="<?= $employee->employee_marital; ?>" hidden><?= $employee->employee_marital; ?></option>
                                                <option value="โสด" <?= set_select('employee_marital', 'โสด') ?>>โสด</option>
                                                <option value="สมรส" <?= set_select('employee_marital', 'สมรส') ?>>สมรส</option>
                                            </select>
                                            <span class="fr"><?= form_error('employee_marital'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3 mb-md-1">
                                        <div class="control-label">
                                            <label class="col">รูปถ่ายพนักงาน (*ขนาดไม่เกิน 800KB)</label>
                                        </div>
                                        <div class="col-12">
                                            <div class="control-label">
                                                <small>ภาพปัจจุบัน</small>
                                            </div>
                                            <img src="<?= base_url('assets/employee_profile_img/' . $employee->employee_profile_img); ?>" width="200px" class="mb-2">
                                            <input type="hidden" name="current_employee_profile_img" value="<?= $employee->employee_profile_img; ?>">
                                            <input type="file" name="employee_profile_img" class="form-control" accept="image/*">
                                            <span class="fr"><?= $error; ?></span>
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
                                        <textarea rows="4 " type="text" name="employee_address" class="form-control" placeholder="กรุณากรอกที่อยู่"><?php echo set_value('employee_address'); ?></textarea>
                                        <span class="fr"><?php echo form_error('employee_address'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-md-6 mb-3 mb-md-1">
                                        <label class="col">เบอร์โทรศัพท์</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="employee_phone" class="form-control" placeholder="กรุณากรอกเบอร์โทร" value="<?= $employee->employee_phone; ?>">
                                            <span class="fr"><?= form_error('employee_phone'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3 mb-md-1">
                                        <label class="col">อีเมลล์</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="employee_email" class="form-control" placeholder="กรุณากรอก อีเมลล์" value="<?= $employee->employee_email; ?>">
                                            <span class="fr"><?= form_error('employee_email'); ?></span>
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
                                            <select name="employee_employtype" class="form-control">
                                                <option value="<?= $employee->employee_employtype; ?>" hidden>
                                                    <?= $employee->employtype_name; ?>
                                                </option>
                                                <?php foreach ($employtype as $row) { ?>
                                                    <option value="<?= $row->employtype_id ?>" <?= set_select('employee_employtype', $row->employtype_id) ?>>
                                                        <?= $row->employtype_name ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                            <span class="fr"><?= form_error('employee_employtype'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3 mb-md-1">
                                        <label class="col">ตำแหน่ง</label>
                                        <div class="col-sm-12">
                                            <select name="employee_position_id" class="form-control">
                                                <option value="<?= $employee->position_id; ?>" hidden>
                                                    <?= $employee->position_name; ?>
                                                </option>
                                                <?php foreach ($position as $row) {
                                                    if ($row->position_id == 0) { ?>
                                                        <option value="<?= $row->position_id ?>" hidden></option>
                                                    <?php } else { ?>
                                                        <option value="<?= $row->position_id ?>" <?= set_select('employee_position_id', $row->position_id) ?>>
                                                            <?= $row->position_name ?> ( <?= $row->position_department ?> )
                                                        </option>
                                                <?php }
                                                } ?>
                                            </select>
                                            <span class="fr"><?= form_error('employee_position_id'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-md-6 mb-3 mb-md-1">
                                        <label class="col">เงินเดือน</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="salary_basesalary" class="form-control" placeholder="กรุณากรอกเงินเดือน (บาท)" value="2">
                                            <span class="fr"><?= form_error('salary_basesalary'); ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-2 control-label">
                                        <input type="hidden" name="employee_id" value="<?= $employee->employee_id; ?>">
                                        <span class="fr"><?= form_error('id'); ?></span>
                                    </div>
                                    <div class="col-sm-10">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-fw fa-save"></i> บันทึกข้อมูล</button>
                                        <a class="btn btn-danger" href="<?php echo  site_url('admin/employee'); ?>" role="button"><i class="fas fa-circle-xmark"></i> ยกเลิก</a>
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