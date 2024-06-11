<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">แก้รหัสผ่านของฉัน</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <!-- form start -->
            <form role="form" action="<?= site_url('admin/editing_password'); ?>" method="post" class="form-horizontal">
                <div class="box-body">
                    <div class="form-group">
                        <div class="col-sm-2 control-label">
                            Username
                        </div>
                        <div class="col-sm-8 col-lg-4">
                            <input type="text" name="admin_username" class="form-control" value="<?= $userData['admin_username']; ?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12 control-label">
                            รหัสผ่านใหม่
                        </div>
                        <div class="col-sm-8 col-lg-4">
                            <input type="password" name="admin_password1" class="form-control" required placeholder="ภาษาอังกฤษ/ตัวเลข/ขั้นต่ำ 4 ตัว" minlength="4" value="<?= set_value('admin_password1'); ?>" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น">
                            <span class="fr"><?= form_error('admin_password1'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 control-label">
                            ยืนยันรหัสผ่านใหม่
                        </div>
                        <div class="col-sm-8 col-lg-4">
                            <input type="password" name="admin_password2" class="form-control" required placeholder="ภาษาอังกฤษ/ตัวเลข/ขั้นต่ำ 4 ตัว" minlength="4" value="<?= set_value('admin_password2'); ?>" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น">
                            <span class="fr"><?= form_error('admin_password2'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 mt-4 control-label">
                        </div>
                        <div class="col-sm-10">
                            <input type="hidden" name="admin_id" value="<?= $userData['admin_id']; ?>">
                            <span class="fr"><?= form_error('id'); ?></span>
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-fw fa-save"></i> บันทึกข้อมูล</button>
                            <a class="btn btn-danger" href="<?= site_url('admin'); ?>" role="button"><i class="fa fa-fw fa-close"></i> ยกเลิก</a>
                        </div>
                    </div>

                </div><!-- /.box-body -->
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<!-- End of Main Content -->