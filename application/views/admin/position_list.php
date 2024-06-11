<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-left mb-4">
        <h1 class="h3 mb-0 mr-3 text-gray-800"> ข้อมูลตำแหน่งงาน
            <a href="<?= site_url('admin/add_position'); ?>" class="btn btn-primary btn-icon-split ml-2">
                <span class="icon text-white-50">
                    <i class="fas fa-user-plus"></i>
                </span>
                <span class="text">เพิ่มตำแหน่งงาน</span>
            </a>
        </h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">

        <!-- ======== Position List ==========  -->
            <div class="card shadow h-100 py-2 col-12">

                <!-- Employee Info -->
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid">
                        <thead>
                            <tr role="row" class="info bg-primary text-white ">
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;" class='text-center'>id</th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 45%;" class='text-center'>ตำแหน่ง</th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 45%;" class='text-center'>แผนก</th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;" class='text-center'>ลบ</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($allPosition as $row) { 
                                if ( $row->position_id != 0) {?>
                                    <tr role="row">
                                        <td align="center"><?= $row->position_id; ?></td>
                                        <td><?= $row->position_name; ?></td>
                                        <td><?= $row->position_department; ?></td>
                                        <!-- <td align="center">
                                            <a href="<?php echo site_url('admin/edit_employee/' . $row->employee_id); ?>" class="btn btn-warning btn-xs">
                                                <i class="fa fa-fw fa-pen-to-square"></i>
                                            </a>
                                        </td> -->
                                        <td align="center">
                                            <a class="btn btn-danger btn-xs" href="<?= site_url('admin/delete_position/' . $row->position_id); ?>" role="button" onclick="return confirm('ยืนยันการลบข้อมูล??');"><i class="fa fa-fw fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php } }?>
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