<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIWIKODE - Sistem Informasi Wisata Kota Depok</title>

    <link rel="shortcut icon" href="<?=base_url('public/user')?>/assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?=base_url('public/user')?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url('public/user')?>/assets/css/style.css">
    <link rel="stylesheet" href="<?=base_url('public/user')?>/assets/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url('public/user')?>/assets/toastr/toastr.min.css">
</head>
<body>
    <header class="bg-main mb-4">
        <h1 class="text-center pt-3">Sistem Informasi Wisata Kota Depok</h1>
        <nav class="navbar navbar-expand-lg navbar-light bg-main pb-3">
            <a class="navbar-brand" href="<?=base_url()?>"><strong>SIWI</strong>KODE</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item <?=$menu_active == 'beranda' ? 'active' : ''?>" id="nav_home">
                  <a class="nav-link" href="<?=base_url();?>">Beranda</a>
                </li>
                <li class="nav-item <?=$menu_active == 'rekreasi' ? 'active' : ''?>" id="nav_wisata_rekreasi">
                  <a class="nav-link" href="<?=base_url('beranda/daftar-wisata/rekreasi');?>">Wisata Rekreasi</a>
                </li>
                <li class="nav-item <?=$menu_active == 'kuliner' ? 'active' : ''?>" id="nav_wisata_kuliner">
                  <a class="nav-link" href="<?=base_url('beranda/daftar-wisata/kuliner');?>">Wisata Kuliner</a>
                </li>
                <li class="nav-item <?=$menu_active == 'registrasi' ? 'active' : ''?>" id="nav_registrasi">
                  <a class="nav-link" href="<?=base_url('beranda/registrasi');?>">Daftarkan Wisata Anda!</a>
                </li>
              </ul>
            </div>
        </nav>
    </header>

    <!-- Konten -->
    <div class="container-fluid" id="content">
        <center>
            <img src="<?=base_url('public/user')?>/assets/img/loading.gif" class="d-none" alt="">
        </center>
        <?php $this->load->view($view); ?>
    </div>

    <footer class="bg-main p-3 text-center">
      Develop By Rev @STT-NF 2021
    </footer>

    <script src="<?=base_url('public/user')?>/assets/jquery/jquery-3.2.1.min.js"></script>
    <script src="<?=base_url('public/user')?>/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=base_url('public/user')?>/assets/js/index.js"></script>
    <script src="<?=base_url('public/user')?>/assets/toastr/toastr.min.js"></script>
    <script>
    <?php if ($this->session->flashdata('msg')) { ?>
    toastr['<?=$this->session->flashdata('msg')['type']?>']('<?=$this->session->flashdata('msg')['text']?>')
    <?php } ?>
    </script>
</body>
</html>