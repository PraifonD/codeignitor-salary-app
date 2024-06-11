            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Payroll Management System</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Readys to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="login.html">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="<?php echo base_url(); ?>/assets/vendor/jquery/jquery.min.js"></script>
            <script src="<?php echo base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="<?php echo base_url(); ?>/assets/vendor/bootstrap_bu/js/bootstrap.bundle.min.js"></script>
            
            <!-- Core plugin JavaScript-->
            <script src="<?php echo base_url(); ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>


            <!-- Custom scripts for all pages-->
            <script src="<?php echo base_url(); ?>/assets/js/sb-admin-2.min.js"></script>

            <!-- Page level plugins -->
            <script src="<?php echo base_url(); ?>/assets/vendor/datatables/jquery.dataTables.min.js"></script>
            <script src="<?php echo base_url(); ?>/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>


            <!-- Datatable script scripts -->
            <script src="<?php echo base_url(); ?>/assets/js/demo/datatables-demo.js"></script>

            <!-- chart scripts -->
            <script src="<?php echo base_url(); ?>/assets/js/demo/chart-area-demo.js"></script>
            <script src="<?php echo base_url(); ?>/assets/js/demo/chart-pie-demo.js"></script>
            <script src="<?php echo base_url(); ?>/assets/js/demo/chart-bar-demo.js"></script>

            <script type="text/javascript">
                <?php if ($this->session->flashdata('login_error')) : ?>
                    swal("เกิดข้อผิดพลาด", "Username หรือ Password ไม่ถูกต้อง!", "error");
                <?php endif; ?>

                <?php if ($this->session->flashdata('login_notactive')) : ?>
                    swal("เกิดข้อผิดพลาด", "ไม่มี Username นี้ในระบบ!", "error");
                <?php endif; ?>

                <?php if ($this->session->flashdata('login_required')) : ?>
                    swal("เกิดข้อผิดพลาด", "กรุณาล็อคอิน!", "error");
                <?php endif; ?>

                <?php if ($this->session->flashdata('save_success')) : ?>
                    swal("", "บันทึกข้อมูลเรียบร้อยแล้ว", "success");
                <?php endif; ?>

                <?php if ($this->session->flashdata('check_duplicate')) : ?>
                    swal("Username ซ้ำ!!!", "กรุณากรอก Username ใหม่", "error");
                <?php endif; ?>

                <?php if ($this->session->flashdata('wrong_alert')) : ?>
                    swal("", "เกิดข้อผิดพลาด!!!", "warning");
                <?php endif; ?>


   <?php if ($this->session->flashdata('del_success')): ?>
  swal("", "ลบข้อมูลเรียบร้อยแล้ว", "success");
   <?php endif; ?>

   <?php if ($this->session->flashdata('payroll_approve_success')): ?>
  swal("", "จ่ายเงินสำเร็จแล้ว", "success");
   <?php endif; ?>
</script>



            </body>

            </html>


            <script>
$(document).ready(function() {
$('#example1').DataTable( {
"aaSorting" :[[0,'desc']],
//"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]] 
});
} );

</script>
<script>
$(function () {
$('#example1').DataTable()
$('#example2').DataTable({
'paging'      : true,
'lengthChange': false,
'searching'   : false,
'ordering'    : true,
'info'        : true,
'autoWidth'   : false
})
})
</script>