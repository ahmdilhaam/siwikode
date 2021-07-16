<div class="row">
    <div class="col-md-12">
        <nav class="float-right" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?=base_url();?>">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Wisata <?=ucfirst($menu_active)?></li>
            </ol>
        </nav>
    </div>
</div>

<section>
    <h3>Daftar Wisata <?=ucfirst($menu_active)?> Kota Depok</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <?php foreach ($daftar_wisata as $key => $value) { ?>
                <?php $rating   = round($value->bintang, 1) ?>
                <div class="<?=$key > 0 ? 'col-md-6' : 'col-md-12'?>">
                    <div class="card bg-sec mb-3">
                        <div class="card-header"><?=ucwords($value->nama)?> (<i class="fa fa-star" style="color: #e3e302;"></i><?=$rating?>)</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 d-flex justify-content-center">
                                    <img src="<?=base_url('public/user/photo/'.$value->id.'/'.$value->cover)?>" class="w-75">
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
            <div>
        </div>
    </div>
</section>