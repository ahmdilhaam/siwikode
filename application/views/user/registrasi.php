<section id="row">
    <a href="<?=base_url('beranda/registrasi');?>/<?=$jenis == 'kuliner' ? '' : 'kuliner'?>">Registrasi Wisata <?=$jenis == 'kuliner' ? 'Rekreasi' : 'Kuliner'?></a>
    <nav class="float-right" aria-label="breadcrumb">
        <ol class="breadcrumb p-0">
            <li class="breadcrumb-item"><a href="<?=base_url();?>">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url('beranda/registrasi');?>">Registrasi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Wisata <?=ucfirst($jenis)?></li>
        </ol>
    </nav>
</section>

<!-- Konten dari sini -->
<section>
    <form method="POST" id="form" enctype="multipart/form-data">
        <fieldset class="custom w-100">
            <legend class="custom">Form Registrasi Wisata <?=ucfirst($jenis)?></legend>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="form-group row">
                        <label for="nama" class="col-md-3 col-form-label">Nama Tempat Wisata</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="nama" name="nama">
                            <span class="text-danger text-validation" id="text_nama"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis" class="col-md-3 col-form-label">Jenis Wisata</label>
                        <div class="col-md-9">
                            <select id="jenis" name="jenis" class="form-control">
                            <?php
                            foreach ($jenis_wisata as $key => $value) {
                                echo '<option value="'.$value->id.'">'.$value->nama.'</option>';
                            }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tentang" class="col-md-3 col-form-label">Tentang Wisata</label>
                        <div class="col-md-9">
                            <textarea id="tentang" name="tentang" class="form-control"></textarea>
                            <span class="text-danger text-validation" id="text_tentang"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deskripsi" class="col-md-3 col-form-label">Deskripsi <?=$jenis == 'kuliner' ? 'Menu' : 'Fasilitas'?></label>
                        <div class="col-md-9">
                            <textarea id="deskripsi" name="deskripsi" class="form-control"></textarea>
                            <span class="text-danger text-validation" id="text_deskripsi"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kontak" class="col-md-3 col-form-label">Kontak Person</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="kontak" name="kontak">
                            <span class="text-danger text-validation" id="text_kontak"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-3 col-form-label">Email</label>
                        <div class="col-md-9">
                            <input type="email" class="form-control" id="email" name="email">
                            <span class="text-danger text-validation" id="text_email"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="web" class="col-md-3 col-form-label">Alamat Web</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="web" name="web" value="http://">
                            <span class="text-danger text-validation" id="text_web"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-md-3 col-form-label">Alamat Lengkap</label>
                        <div class="col-md-9">
                            <textarea id="alamat" name="alamat" class="form-control"></textarea>
                            <span class="text-danger text-validation" id="text_alamat"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ll" class="col-md-3 col-form-label">Latitude,Longitude</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="ll" name="ll">
                            <span class="text-danger text-validation" id="text_ll"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ll" class="col-md-3 col-form-label">5 Gambar Wisata</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control" name="files[]" multiple="">
                            <span class="text-danger text-validation" id="text_gambar"></span>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="save()">Daftar</button>
                </div>
            </div>
        </fieldset>
    </form>
</section>


<script>
    function save() {
        let validate = validasi('usual', 'Berhasil menambahkan wisata anda, tunggu proses berikutnya!')
        if (validate) {
            $('#form').submit()
        }
    }
</script>