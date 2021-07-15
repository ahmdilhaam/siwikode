<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">User</h1>
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
                <a href="javascript:;" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addUser"><i class="fa fa-plus"></i> Tambah</a>
                <table class="table table-bordered text-center" id="dt">
                    <thead class="bg-sec">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($daftar as $key => $value) { ?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$value->nama?></td>
                            <td><?=$value->email?></td>
                            <td><?=ucfirst($value->role)?></td>
                            <td class="text-center">
                                <a href="<?=base_url("admin/home/hide/users/{$value->id}")?>" class="btn btn-danger <?=$value->role === 'superadmin' ? 'disabled' : ''?>"><i class="fa <?=$value->is_disabled === 'true' ? 'fa-eye' : 'fa-eye-slash'?>"></i></a>
                            </td>
                        </tr>
                        <?php $no++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="addUserLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserLabel">User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="form">
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                    <span class="text-danger text-validation" id="text_nama"></span>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email">
                    <span class="text-danger text-validation" id="text_email"></span>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" name="role" id="role">
                        <option value="superadmin">Superadmin</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
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
                <button type="button" class="btn btn-primary" id="btnForm" onclick="validasi()"><i class="fa fa-check"></i> Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    function validasi() {
        let nama                = $('#nama').val()
        let email               = $('#email').val()
        let password            = $('#password').val()
        let konfirmasi_password = $('#konfirmasi_password').val()

        $('.text-validation').html('')

        let isValid = true
        if (nama == '') {
            isValid = false
            $('#text_nama').html('Wajib diisi')
        }

        const re_email = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        if (email == '') {
            isValid = false
            $('#text_email').html('Wajib diisi')
        } else if (!(re_email.test(email))) {
            isValid = false
            $('#text_email').html('Format email salah (contoh unnamed@jo.hn)')
        }

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
            $('#addUser').modal('hide')
            $('#form').submit()
        }
    }
</script>