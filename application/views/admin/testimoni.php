<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Testimoni</h1>
</div>

<div class="row">
    <!-- Area Chart -->
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tabel</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <table class="table table-bordered text-center" id="dt">
                    <thead class="bg-sec">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tempat Wisata</th>
                            <th>Rating</th>
                            <th>Komentar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($daftar as $key => $value) { ?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$value->nama_testimoni?></td>
                            <td><?=$value->email_testimoni?></td>
                            <td><?=$value->nama_wisata?></td>
                            <td><?=$value->bintang?></td>
                            <td><?=$value->komentar?></td>
                            <td class="text-center">
                                <a href="<?=base_url("admin/home/hide/testimoni/{$value->id_testimoni}")?>" class="btn btn-danger"><i class="fa <?=$value->is_disabled === 'true' ? 'fa-eye' : 'fa-eye-slash'?>"></i></a>
                            </td>
                        </tr>
                        <?php $no++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>