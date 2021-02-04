function get_query(name) {
    var results = new RegExp('[\?&]' + name + '=([^&#]*)')
                    .exec(window.location.search)

    return (results !== null) ? results[1] || 0 : false
}

function UrlExists(url) {
    var http = new XMLHttpRequest()
    http.open('HEAD', url, false)
    http.send()
    return http.status != 404
}

function validasi(type='usual', msg='Berhasil') {
    let nama = $('#nama').val()
    let deskripsi = $('#deskripsi').val()
    let kontak = $('#kontak').val()
    let no_hp = $('#no_hp').val()
    let email = $('#email').val()
    let web = $('#web').val()
    let alamat = $('#alamat').val()
    let ll = $('#ll').val()

    $('.text-validation').html('')

    let isValid = true
    if (nama == '') {
        isValid = false
        $('#text_nama').html('Wajib diisi')
    }

    if (deskripsi == '') {
        isValid = false
        $('#text_deskripsi').html('Wajib diisi')
    }

    if (kontak == '') {
        isValid = false
        $('#text_kontak').html('Wajib diisi')
    }

    if (no_hp == '') {
        isValid = false
        $('#text_no_hp').html('Wajib diisi')
    }

    const re_email = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    if (email == '') {
        isValid = false
        $('#text_email').html('Wajib diisi')
    } else if (!(re_email.test(email))) {
        isValid = false
        $('#text_email').html('Format email salah (contoh unnamed@jo.hn)')
    }

    if (web == '' || web == 'http://' || web == 'https://') {
        isValid = false
        $('#text_web').html('Wajib diisi')
    }

    if (alamat == '') {
        isValid = false
        $('#text_alamat').html('Wajib diisi')
    }

    if (ll == '') {
        isValid = false
        $('#text_ll').html('Wajib diisi')
    }

    
    if (isValid) {
        toastr.success(msg)
        $('#form')[0].reset()
        if (type == 'modal') {
            $('#formData').modal('hide')
        }
    }
}

$(document).ready(function() {
    let query   = get_query('q')
        query   = !query ? 'admin_landing_page' : query

    if (query != 'landing_page') {
        $('.nav-item').removeClass('active')
        if (query.indexOf('registrasi') >= 0) {
            $('#nav_registrasi').addClass('active')
        } else if (query.indexOf('wisata_rekreasi') >= 0) {
            $('#nav_wisata_rekreasi').addClass('active')
        } else if (query.indexOf('wisata_kuliner') >= 0) {
            $('#nav_wisata_kuliner').addClass('active')
        } else if (query.indexOf('testimoni') >= 0) {
            $('#nav_testimoni').addClass('active')
        } else {
            $(`#nav_home`).addClass('active')
        }
    }

    setTimeout(function() {
        let url = `./component/${query}.html`
        if (UrlExists(url)) {
            $('#content').load(url)
        } else {
            $('#content').html('<center><h4 class="mb-3">Request Not Found</h4></center>')
        }
    }, 500)
})