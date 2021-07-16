<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIWIKODE - Sistem Informasi Wisata Kota Depok - Login</title>

    <link rel="shortcut icon" href="<?=base_url('public/user')?>/assets/img/favicon.ico" type="image/x-icon">
    
    <!-- Custom fonts for this template-->
    <link href="<?=base_url('public/admin')?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url('public/admin')?>/css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?=base_url('public/user')?>/assets/toastr/toastr.min.css">

</head>

<body class="bg-pastel">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><b>SIWI</b> KODE</h1>
                                    </div>
                                    <form method="POST" class="user">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="email" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="password" placeholder="Password" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url('public/admin')?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url('public/admin')?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url('public/admin')?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url('public/admin')?>/js/sb-admin-2.min.js"></script>

    <script src="<?=base_url('public/user')?>/assets/toastr/toastr.min.js"></script>
    <script>
    <?php if ($this->session->flashdata('msg')) { ?>
    toastr['<?=$this->session->flashdata('msg')['type']?>']('<?=$this->session->flashdata('msg')['text']?>')
    <?php } ?>
    </script>
    
</body>

</html>