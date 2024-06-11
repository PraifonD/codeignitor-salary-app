<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">เพิ่มตำแหน่งงาน</h1>

    <div class="row">

        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">ฟอร์มเพิ่มตำแหน่งงาน</h6>
                </div>
                <div class="card-body">
                    <form role="form" action="<?= site_url('admin/adding_position'); ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group ">
                                <div class="col-12 col-md-6">
                                    <label class="col">ตำแหน่ง</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="position_name" class="form-control" placeholder="กรุณากรอกชื่อตำแหน่ง" value="<?= set_value('position_name'); ?>">
                                        <span class="fr"><?= form_error('position_name'); ?></span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="col">แผนก</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="position_department" class="form-control" placeholder="กรุณากรอกชื่อแผนก" value="<?= set_value('position_department'); ?>">
                                        <span class="fr"><?= form_error('position_department'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-12 col-md-6">
                                    <div class="col-sm-10">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-fw fa-save"></i> บันทึกข้อมูล</button>
                                        <a class="btn btn-danger" href="<?php echo  site_url('admin/position'); ?>" role="button"><i class="fas fa-circle-xmark"></i> ยกเลิก</a>
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