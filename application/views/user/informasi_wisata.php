<div class="row">
    <div class="col-md-12">
        <nav class="float-right" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?=base_url()?>">Beranda</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="<?=base_url('beranda/daftar-wisata/'.$menu_active);?>">Wisata <?=ucfirst($menu_active)?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$detail->nama?></li>
            </ol>
        </nav>
    </div>
    <div class="col-md-12">
        
    </div>
</div>
<!-- Konten dari sini -->
<section>
    <h3>Informasi Wisata <?=ucfirst($menu_active)?> <?=$detail->nama?> (<i class="fa fa-star" style="color: #e3e302;"></i><?=$rating?>)</h3>
    <button class="btn btn-primary" id="show-testimoni" data-name="<?=$detail->nama?>"><i class="fa fa-plus"></i> Tulis Testimoni</button><br><br>
    <div class="row">
        <div class="col-md-12">
            <div class="card bg-sec mb-3">
                <div class="card-header">Galeri Foto</div>
                <div class="card-body">
                    <div class="row">
                        <?php foreach ($galeri_foto as $key => $value) { ?>
                        <div class="col-md-2 d-flex justify-content-center">
                            <img src="<?=base_url('public/user/photo/'.$value->wisata_id.'/'.$value->file)?>" class="w-100">
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-sec mb-3">
                <div class="card-header">Deskripsi <?=$menu_active == 'kuliner' ? 'Menu' : 'Fasilitas'?></div>
                <div class="card-body">
                    <?=nl2br($detail->deskripsi)?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-sec mb-3">
                <div class="card-header">Alamat & Peta Lokasi</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><?=$detail->alamat?> <br />Telepon: <?=$detail->kontak?><br />Email: <?=$detail->email?></p>
                        </div>
                        <div class="col-md-6">
                            <iframe src="https://www.google.com/maps?q=<?=$detail->latlong?>&z=14&t=&ie=UTF8&output=embed" width="100%" height="250"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card bg-sec mb-4">
        <div class="card-header">Testimoni & Komentar</div>
        <div class="card-body">
            <div class="row">
                <?php foreach ($testimoni as $key => $value) { ?>
                <div class="col-md-4">
                    <div class="card bg-muted mb-3">
                        <div class="card-header"><?=$value->testimoni_nama?> (<?=$value->profesi_nama?>)</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="<?=base_url('public/user')?>/assets/img/citizen.png" class="w-100">
                                </div>
                                <div class="col-md-8">
                                    <?=$value->komentar?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="formData" tabindex="-1" role="dialog" aria-labelledby="formDataLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formDataLabel">Testimoni</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="form">
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama">Nama Kamu</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                    <span class="text-danger text-validation" id="text_nama"></span>
                </div>
                <div class="form-group">
                    <label for="profesi">Profesi</label>
                    <select name="profesi" id="profesi" class="form-control">
                        <?php
                        foreach ($profesi as $key => $value) {
                            echo '<option value="'.$value->id.'">'.$value->nama.'</option>';
                        }
                        ?>
                    </select>
                    <span class="text-danger text-validation" id="text_profesi"></span>
                </div>
                <div class="form-group">
                    <label for="nama">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                    <span class="text-danger text-validation" id="text_email"></span>
                </div>
                <div class="form-group">
                    <label for="rating" class="d-block">Rating</label>
                    <div class="stars">
                        <input class="star star-5" id="star-5" type="radio" name="rating" value="5" />
                        <label class="star star-5" for="star-5"></label>
                        <input class="star star-4" id="star-4" type="radio" name="rating" value="4" />
                        <label class="star star-4" for="star-4"></label>
                        <input class="star star-3" id="star-3" type="radio" name="rating" value="3" />
                        <label class="star star-3" for="star-3"></label>
                        <input class="star star-2" id="star-2" type="radio" name="rating" value="2" />
                        <label class="star star-2" for="star-2"></label>
                        <input class="star star-1" id="star-1" type="radio" name="rating" value="1" />
                        <label class="star star-1" for="star-1"></label>
                    </div>
                    <span class="text-danger text-validation" id="text_rating"></span>
                </div>
                <div class="form-group">
                    <label for="komentar">Komentar</label>
                    <textarea id="komentar" name="komentar" class="form-control"></textarea>
                    <span class="text-danger text-validation" id="text_komentar"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnForm" onclick="save()"><i class="fa fa-check"></i> Kirim</button>
            </div>
            </form>
        </div>
    </div>
</div>


<script>
    function save() {
        let validate = validasi('modal', 'Berhasil menambahkan testimoni, terimakasih!')
        if (validate) {
            $('#form').submit()
        }
    }
</script>