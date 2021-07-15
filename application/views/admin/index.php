<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIWIKODE - Sistem Informasi Wisata Kota Depok - Admin</title>

    <link rel="shortcut icon" href="<?=base_url('public/user')?>/assets/img/favicon.ico" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="<?=base_url('public/admin')?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url('public/admin')?>/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?=base_url('public/admin')?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?=base_url('public/user')?>/assets/toastr/toastr.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view('admin/sidebar') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view('admin/navbar') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <?php $this->load->view('admin/'.$page) ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Rev <?=date('Y')?></span>
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

    <!-- Forgot Passow Modal-->
    <div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="forgotPasswordLabel">Ubah Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?=base_url('admin/auth/change_password')?>" method="POST" id="forgotPasswordForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <span class="text-danger text-validation" id="text_password"></span>
                    </div>
                    <div class="form-group">
                        <label for="konfirmasi_password">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password">
                        <span class="text-danger text-validation" id="text_konfirmasi_password"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnForgotPassword" onclick="change_password()"><i class="fa fa-key"></i> Ubah</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Yakin ingin logout?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?=base_url('admin/auth/logout')?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url('public/admin')?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url('public/admin')?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url('public/admin')?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?=base_url('public/admin')?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url('public/admin')?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url('public/admin')?>/js/sb-admin-2.min.js"></script>
    <script src="<?=base_url('public/user')?>/assets/toastr/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dt').DataTable();
        });

        function change_password() {
            let password            = $('#password').val()
            let konfirmasi_password = $('#konfirmasi_password').val()

            $('.text-validation').html('')

            let isValid = true
            if (password == '') {
                isValid = false
                $('#text_password').html('Wajib diisi')
            } else if (konfirmasi_password == '') {
                isValid = false
                $('#text_konfirmasi_password').html('Wajib diisi')
            } else if (password !== konfirmasi_password) {
                isValid = false
                $('#text_konfirmasi_password').html('Password dan konfirmasi password tidak sama')
            }
            
            if (isValid) {
                $('#forgotPasswordModal').modal('hide')
                $('#forgotPasswordForm').submit()
            }
        }
    </script>

    <script>
        <?php if ($this->session->flashdata('msg')) { ?>
        toastr['<?=$this->session->flashdata('msg')['type']?>']('<?=$this->session->flashdata('msg')['text']?>')
        <?php } ?>
    </script>

</body>

</html>