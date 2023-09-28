<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<section id="line-awesome-icons">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <!-- <h4 class="card-title">List Data Analis</h4> -->
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <!-- <div class="feather-icons overflow-hidden row"> -->
                        <form method="post" enctype="multipart/form-data"
                            action="<?= base_url("user/insert_kegiatan");?>">
                            <h2 style="text-align: center;">Kegiatan</h2>
                            <br><br>
                            <label>Jenis Kegiatan</label><label style="color:red; font-size:12px;"> (*Wajib
                                diisi)</label>
                            <select class="form-control" onchange="checkJenis(this)" id="jenis" name="jenis">
                                <option value="">Please Select</option>
                                <?php foreach($jenis_kegiatan as $j){ ?>
                                <option value="<?=$j->id?>">
                                    <?=$j->nama?>
                                </option>
                                <?php } ?>
                            </select>
                            <br><br>

                            <label>Judul Kegiatan</label><label style="color:red; font-size:12px;"> (*Wajib
                                diisi)</label>
                            <textarea name="judul" id="judul" rows="3" placeholder="Judul Kegiatan" class="form-control"
                                value="" required=""></textarea><br>


                            <div id="ext-div" style="display: none">
                                <div class="input-group-btn" id="tambah_button">
                                    <button class="btn btn-primary add" type="button"><i class="la la-plus"></i>
                                        Tambah Data</button>
                                </div>

                                <div class="cek">
                                </div>
                                <div class="accordion" id="accordion0">
                                    <div class="card"
                                        style="background-color:#f6f5f5; padding-left:1rem; padding-right:1rem; padding-bottom: 1rem">
                                        <div class="form-group row">
                                            <div class="col-12"><button class="btn btn-link btn-block text-left"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse0"
                                                    aria-expanded="true" aria-controls="collapseOne">> Data 1</button>
                                            </div>
                                        </div>
                                        <div id="collapse0" class="collapse hide" aria-labelledby="headingOne"
                                            data-bs-parent="#accordion">
                                            <label>Titel</label><label style="color:red;font-size:12px;">(*Wajib
                                                diisi)</label><select class="form-control" name="titel[]" id="titel">
                                                <option value="">Please Select</option>
                                                <option value="Prof">Prof</option>
                                                <option value="Dr">Dr</option>
                                                <option value="Mr">Mr</option>
                                                <option value="Mrs">Mrs</option>
                                                <option value="Ms">Ms</option>
                                            </select>
                                            <hr><label id="l_nama_depan">Nama Depan</label><label
                                                style="color:red;font-size:12px;">(*Wajib diisi)</label><input
                                                name="nama_depan[]" id="nama_depan" class="form-control"
                                                value=""><br><label id="l_nama_belakang">Nama Belakang</label><label
                                                style="color:red;font-size:12px;">(*Wajib diisi)</label><input
                                                name="nama_belakang[]" id="nama_belakang" class="form-control"
                                                value=""><br><label id="l_jabatan">Jabatan</label><label
                                                style="color:red;font-size:12px;">(*Wajib diisi)</label><input
                                                name="jabatan[]" id="jabatan" class="form-control" value=""><br><label
                                                id="l_kepakaran">Kepakaran</label><label
                                                style="color:red;font-size:12px;">(*Wajib diisi)</label><input
                                                name="kepakaran[]" id="kepakaran" class="form-control"
                                                value=""><br><label id="l_departemen">Departemen</label><label
                                                style="color:red;font-size:12px;">(*Wajib diisi)</label><input
                                                name="departemen[]" id="departemen" class="form-control"
                                                value=""><br><label id="l_universitas">Universitas</label><label
                                                style="color:red;font-size:12px;">(*Wajib diisi)</label><input
                                                name="universitas[]" id="universitas" class="form-control"
                                                value=""><br><label id="l_negara">Negara</label><label
                                                style="color:red;font-size:12px;">(*Wajib diisi)</label><input
                                                name="negara[]" id="negara" class="form-control" value=""><br><label
                                                id="l_email">Email</label><label
                                                style="color:red;font-size:12px;">(*Wajib diisi)</label><input
                                                name="email[]" id="email" type="email" class="form-control" value="">
                                        </div><br>
                                    </div>
                                </div>

                                <div class="cek-after">
                                </div>
                            </div>
                            <br>
                            <label>Total Anggaran</label><label style="color:red; font-size:12px;"> (*Wajib
                                diisi)</label>
                            <div class="form-group input-group">
                                <input size="4" maxlength="4" value="Rp." disabled="">
                                <input type="text" class="form-control currency" id="total_anggaran"
                                    name="total_anggaran" value="" required="">
                                <input size="3" maxlength="3" value=",00" disabled="">
                            </div><br>

                            <div class="form-group">
                                <label style="font-size: 20px">File Proposal</label><br>
                                <input type="file" accept="application/pdf" name="file">
                                <label style="color:red; font-size:12px;">maks 5mb</label>
                            </div><br>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">
                                    Simpan Draft
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script>
            $(".add").click(function() {
                var cek = $('.accordion').length + 1;
                $('<div class="accordion" id="accordion' + cek +
                    '"><div class="card" style="background-color:#f6f5f5; padding-left:1rem; padding-right:1rem"><div class="card-header" style="padding-right: 0px; padding-left: 0px;" id="headingOne"><div class="form-group row"><div class="col-8"><button class="btn btn-link btn-block text-left" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' +
                    cek +
                    '" aria-expanded="true" aria-controls="collapseOne"><span class="prof">> Data ' +
                    cek +
                    '</span></button></div><div class="col-4"><button class="btn-sm btn-danger remove" style="float: right;" type="button" id="removeItem' +
                    cek +
                    '" action="javascript:;"><b><i class="la la-trash" style="color:white"></i></b></button></div></div></div><div id="collapse' +
                    cek +
                    '" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordion"><div class="card-body"><label>Titel</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><select class="form-control" name="titel[]" id="titel"><option value="">Please Select</option><option value="Prof">Prof</option><option value="Dr">Dr</option><option value="Mr">Mr</option><option value="Mrs">Mrs</option><option value="Ms">Ms</option></select><hr><label id="l_nama_depan">Nama Depan</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><input name="nama_depan[]" id="nama_depan" class="form-control" value=""><br><label id="l_nama_belakang">Nama Belakang</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><input name="nama_belakang[]" id="nama_belakang" class="form-control" value=""><br><label id="l_jabatan">Jabatan</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><input name="jabatan[]" id="jabatan" class="form-control" value=""><br><label id="l_kepakaran">Kepakaran</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><input name="kepakaran[]" id="kepakaran" class="form-control" value=""><br><label id="l_departemen">Departemen</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><input name="departemen[]" id="departemen" class="form-control" value=""><br><label id="l_universitas">Universitas</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><input name="universitas[]" id="universitas" class="form-control" value=""><br><label id="l_negara">Negara</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><input name="negara[]" id="negara" class="form-control" value=""><br><label id="l_email">Email</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><input name="email[]" id="email" type="email" class="form-control" value=""></div></div></div></div>'
                ).appendTo('.cek-after');

                jQuery(document).on('click', '.remove', function() {
                    jQuery(this).closest('.accordion').remove();
                    $('.accordion').each(function(i) {
                        $(this).find('.prof').text('> Data ' + (i + 1));
                        $(this).find('.accordion').attr('id', 'accordion' + (i + 1));
                        $(this).find('remove').attr('id', 'removeItem-' + (i + 1));
                    });
                })
                // $('<label>cek ok</label>').appendTo('#cek');

            });
            </script>

            <script>
            function checkJenis(select) {
                jabatan = document.getElementById('jenis');
                otherJabatan = document.getElementById('otherJabatan');
                if (select.options[select.selectedIndex].value == "1" || select.options[select.selectedIndex].value ==
                    "2" || select.options[select.selectedIndex].value == "9") {
                    document.getElementById('ext-div').style.display = 'none';
                    document.getElementById('titel').removeAttribute("required");
                    document.getElementById('nama_depan').removeAttribute("required");
                    document.getElementById('nama_belakang').removeAttribute("required");
                    document.getElementById('jabatan').removeAttribute("required");
                    document.getElementById('kepakaran').removeAttribute("required");
                    document.getElementById('departemen').removeAttribute("required");
                    document.getElementById('universitas').removeAttribute("required");
                    document.getElementById('negara').removeAttribute("required");
                    document.getElementById('email').removeAttribute("required");

                    document.getElementById('l_jabatan').innerHTML="Jabatan";
                    document.getElementById('l_departemen').innerHTML="Departemen";
                    document.getElementById('l_universitas').innerHTML="Universitas";
                    document.getElementById('l_negara').innerHTML="Negara";
                }

                else if (select.options[select.selectedIndex].value == "8") {
                    document.getElementById('ext-div').style.display = 'block';
                    document.getElementById('titel').setAttribute("required", "");
                    document.getElementById('nama_depan').setAttribute("required", "");
                    document.getElementById('nama_belakang').setAttribute("required", "");
                    document.getElementById('jabatan').setAttribute("required", "");
                    document.getElementById('kepakaran').setAttribute("required", "");
                    document.getElementById('departemen').setAttribute("required", "");
                    document.getElementById('universitas').setAttribute("required", "");
                    document.getElementById('negara').setAttribute("required", "");
                    document.getElementById('email').setAttribute("required", "");

                    document.getElementById('l_jabatan').innerHTML="Position";
                    document.getElementById('l_departemen').innerHTML="Industry";
                    document.getElementById('l_universitas').innerHTML="Company Name";
                    document.getElementById('l_negara').innerHTML="Location";
                    
                    }

                else {
                    document.getElementById('ext-div').style.display = 'block';
                    document.getElementById('titel').setAttribute("required", "");
                    document.getElementById('nama_depan').setAttribute("required", "");
                    document.getElementById('nama_belakang').setAttribute("required", "");
                    document.getElementById('jabatan').setAttribute("required", "");
                    document.getElementById('kepakaran').setAttribute("required", "");
                    document.getElementById('departemen').setAttribute("required", "");
                    document.getElementById('universitas').setAttribute("required", "");
                    document.getElementById('negara').setAttribute("required", "");
                    document.getElementById('email').setAttribute("required", "");

                    document.getElementById('l_jabatan').innerHTML="Jabatan";
                    document.getElementById('l_departemen').innerHTML="Departemen";
                    document.getElementById('l_universitas').innerHTML="Universitas";
                    document.getElementById('l_negara').innerHTML="Negara";
                }
            }
            </script>

            <!-- <script>
    $(function() {
        $(document).ready() {
            jabatan = document.getElementById('jenis');
            otherJabatan = document.getElementById('otherJabatan');
            if (select.options[select.selectedIndex].value == "1" || select.options[select.selectedIndex]
                .value == "2") {
                document.getElementById('ext-div').style.display = 'none';
                document.getElementById('titel').removeAttribute("required");
                document.getElementById('nama_depan').removeAttribute("required");
                document.getElementById('nama_belakang').removeAttribute("required");
                document.getElementById('jabatan').removeAttribute("required");
                document.getElementById('kepakaran').removeAttribute("required");
                document.getElementById('departemen').removeAttribute("required");
                document.getElementById('universitas').removeAttribute("required");
                document.getElementById('negara').removeAttribute("required");
                document.getElementById('email').removeAttribute("required");
            } else {
                document.getElementById('ext-div').style.display = 'block';
                document.getElementById('titel').setAttribute("required", "");
                document.getElementById('nama_depan').setAttribute("required", "");
                document.getElementById('nama_belakang').setAttribute("required", "");
                document.getElementById('jabatan').setAttribute("required", "");
                document.getElementById('kepakaran').setAttribute("required", "");
                document.getElementById('departemen').setAttribute("required", "");
                document.getElementById('universitas').setAttribute("required", "");
                document.getElementById('negara').setAttribute("required", "");
                document.getElementById('email').setAttribute("required", "");
            }
        }
    });
    </script> -->

            <script>
            $(function() {
                $("#total_anggaran").keyup(function(e) {
                    $(this).val(format($(this).val()));
                });
            });
            var format = function(num) {
                var str = num.toString().replace("", ""),
                    parts = false,
                    output = [],
                    i = 1,
                    formatted = null;
                if (str.indexOf(".") > 0) {
                    parts = str.split(".");
                    str = parts[0];
                }
                str = str.split("").reverse();
                for (var j = 0, len = str.length; j < len; j++) {
                    if (str[j] != ",") {
                        output.push(str[j]);
                        if (i % 3 == 0 && j < (len - 1)) {
                            output.push(",");
                        }
                        i++;
                    }
                }
                formatted = output.reverse().join("");
                return ("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
            };
            </script>