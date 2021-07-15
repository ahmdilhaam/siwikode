<section>
    <h3>
        Wisata Rekreasi & Kuliner Unggulan Kota Depok
        <hr>
    </h3>
    <div class="row">
        <?php foreach ($beranda as $key => $value) { ?>
        <div class="col-md-4">
            <div class="card bg-sec mb-3">
                <div class="card-header"><?=$value->nama?></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 d-flex justify-content-center">
                            <img src="<?=base_url('public/user/photo/'.$value->id.'/'.$value->cover)?>" class="w-100">
                        </div>
                        <div class="col-md-8">
                            <?=$value->note?>
                            <br>
                            <a href="<?=base_url('beranda/informasi-wisata/'.$value->slug)?>">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
</section>