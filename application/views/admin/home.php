<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dasbor</h1>
</div>

<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Wisata Rekreasi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$count_rekreasi?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-suitcase fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Wisata Kuliner</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$count_kuliner?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-utensils fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Rating Wisata Rekreasi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fa fa-star" style="color: #e3e302;"></i><?=$testimoni['rekreasi']['rating']?> (<?=$testimoni['rekreasi']['jml']?>)</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-suitcase fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Rating Wisata Kuliner</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fa fa-star" style="color: #e3e302;"></i><?=$testimoni['rekreasi']['rating']?> (<?=$testimoni['kuliner']['jml']?>)</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-utensils fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>