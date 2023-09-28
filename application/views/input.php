<section id="line-awesome-icons">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"></h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-bs-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-bs-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <div class="feather-icons overflow-hidden row">
                            <div class="table-responsive" style="padding-left: 10px; padding-right: 10px">
                                <!-- <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                    data-bs-target=".tambah-data"><i class="la la-plus"></i> Tambah</button> -->
                                <table class="table table-bordered" style="text-align: left;" id="dataTable"
                                    width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Jenis Kegiatan</th>
                                            <th>Judul Kegiatan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                    foreach($view as $v) { 
                                        $tgl = date('d-m-Y', strtotime($v->tgl));
                                        $total = rupiah($v->total_anggaran);

                                        if(empty($v->anggaran_disetujui)){
                                            $anggaran_disetujui="-";
                                        }
                                        else{
                                            $anggaran_disetujui=rupiah($v->anggaran_disetujui);
                                        }

                                        if(($v->status)==0){
                                            $anggaran_disetujui="-";
                                            if(empty($v->keputusan)){
                                                $status="Kegiatan diajukan, menunggu di-review";
                                            }
                                            else{
                                                if(($v->keputusan==3)){
                                                    $status = "Kegiatan dipertimbangkan untuk batch selanjutnya";
                                                }
                                                elseif(($v->keputusan==4)){
                                                    $status = "Kegiatan diitolak";
                                                }
                                            }
                                        }
                                        elseif(($v->status)==1){
                                            $anggaran_disetujui="-";
                                            $status="Kegiatan telah di-review menuggu di-approve";
                                        }
                                        elseif(($v->status)==2){
                                            if($v->keputusan==1){
                                                $status="Kegiatan diterima";
                                            }
                                            elseif($v->keputusan==2){
                                                $status="Kegiatan diterima dengan perbaikan (maksimal 1 minggu)";
                                                // $v->status=0;
                                            }
                                            elseif($v->keputusan==3){
                                                $status="Kegiatan dipertimbangkan untuk batch selanjutnya";
                                            }
                                            elseif($v->keputusan==4){
                                                $status="Kegiatan ditolak";
                                            }
                                        }

                                        elseif(($kegiatan->status)==3){
                                            $status="Telah upload monev";
                                        }
                                        ?>
                                        <tr>
                                            <td><?= $tgl ?></td>
                                            <td><?= $v->jenis_kegiatan ?></td>
                                            <td><?= $v->judul ?></td>
                                            <td>

                                                <button type="button" class="btn btn-warning" style="text-align: center"
                                                    data-bs-toggle="tooltip" data-bs-html="true"
                                                    data-bs-placement="bottom"
                                                    title="&lt;b&gt;Status :&lt;/b&gt;&lt;br&gt; <?=$status?>&lt;br&gt;&lt;br&gt;&lt;b&gt;Anggaran diajukan:&lt;/b&gt;&lt;br&gt; <?=$total?>&lt;br&gt;&lt;br&gt;">
                                                    <b><i class="la la-exclamation-circle"
                                                            style="color:white; font-size:20px;"></i></b>
                                                </button>

                                                <form style="display:inline-block;" method="post"
                                                    action="<?= base_url('User/detail');?>">
                                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                                    <button type="Submit" class="btn btn-success"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Detail">
                                                        <b><i class="la la-eye"
                                                                style="color:white; font-size:20px;"></i></b>
                                                    </button>
                                                </form>
                                                <?php if($v->status == 0) { ?>
                                                <form style="display:inline-block;" method="post"
                                                    action="<?= base_url('User/edit_kegiatan');?>">
                                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                                    <button type="Submit" class="btn btn-info" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="Edit">
                                                        <i class="la la-pencil"
                                                            style="color:white; font-size:20px;"></i>
                                                    </button>
                                                </form>

                                                <form style="display:inline-block;" method="post"
                                                    onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?');"
                                                    action="<?= base_url('User/delete_kegiatan');?>">
                                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                                    <button type="Submit" class="btn btn-danger"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Hapus">
                                                        <i class="la la-trash" style="color:white; font-size:20px;"></i>
                                                    </button>
                                                </form>

                                                <?php } elseif($v->status == 2 || $v->status == 3) { ?>
                                                <?php if($v->keputusan == 1) { ?>
                                                <form style="display:inline-block;" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title="Edit">
                                                    <button class="btn btn-secondary" style="color:grey" type="button">
                                                        <i class="la la-pencil" style="color:white; font-size:20px;"></i>
                                                    </button>
                                                </form>
                                                <form style="display:inline-block;" data-bs-toggle="tooltip"
                                                    method="post" data-bs-placement="bottom"
                                                    title="Monitoring & Evaluasi"
                                                    action="<?= base_url('User/monev');?>">
                                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                                    <button class="btn btn-primary" style="color:grey" type="submit">
                                                        <i class="la la-credit-card"
                                                            style="color:white; font-size:20px;"></i>
                                                    </button>
                                                </form>
                                                <?php } elseif($v->keputusan == 2) { ?>
                                                <form style="display:inline-block;" method="post"
                                                    action="<?= base_url('User/edit_kegiatan');?>">
                                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                                    <button type="Submit" class="btn btn-info" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="Edit">
                                                        <i class="la la-pencil"
                                                            style="color:white; font-size:20px;"></i>
                                                    </button>
                                                </form>
                                                <form style="display:inline-block;" data-bs-toggle="tooltip"
                                                    method="post" data-bs-placement="bottom"
                                                    title="Monitoring & Evaluasi"
                                                    action="<?= base_url('User/monev');?>">
                                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                                    <button class="btn btn-primary" style="color:grey" type="submit">
                                                        <i class="la la-credit-card"
                                                            style="color:white; font-size:20px;"></i>
                                                    </button>
                                                </form>
                                                <?php } else { ?>
                                                <form style="display:inline-block;" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title="Edit">
                                                    <button class="btn btn-secondary" style="color:grey" type="button">
                                                        <i class="la la-pencil" style="color:white; font-size:20px;"></i>
                                                    </button>
                                                </form>
                                                <?php } ?>

                                                <form style="display:inline-block;" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title="Hapus">
                                                    <button class="btn btn-secondary" style="color:grey" type="button">
                                                        <i class="la la-trash" style="color:white; font-size:20px;"></i>
                                                    </button>
                                                </form>
                                                <?php } ?>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- <script>
$('#jumlah').keyup(function() {
    $('.accordion').remove();
    var jumlah = $('#jumlah').val();
    for (var jum = 1; jum <= jumlah; jum++) {
        $('<div class="accordion" id="accordion"><div class="card" style="background-color:#f6f5f5;"><div class="form-group row"><div class="col-12"><button class="btn btn-link btn-block text-left" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' +
            jum + '" aria-expanded="true" aria-controls="collapseOne">> Data Professor ' + jum +
            '</button></div></div><div id="collapse' + jum +
            '" class="collapse hide" aria-labelledby="headingOne" data-bs-parent="#accordion"><label>Titel</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><select class="form-control" name="titel[]" id="titel"><option value="">Please Select</option><option value="Prof">Prof</option><option value="Dr">Dr</option><option value="Mr">Mr</option><option value="Mrs">Mrs</option><option value="Ms">Ms</option></select><hr><label id="l_nama_depan">Nama Depan</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><input name="nama_depan[]" id="nama_depan" class="form-control" value=""><br><label id="l_nama_belakang">Nama Belakang</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><input name="nama_belakang[]" id="nama_belakang" class="form-control" value=""><br><label id="l_jabatan">Jabatan</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><input name="jabatan[]" id="jabatan" class="form-control" value=""><br><label id="l_kepakaran">Kepakaran</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><input name="kepakaran[]" id="kepakaran" class="form-control" value=""><br><label id="l_departemen">Departemen</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><input name="departemen[]" id="departemen" class="form-control" value=""><br><label id="l_universitas">Universitas</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><input name="universitas[]" id="universitas" class="form-control" value=""><br><label id="l_negara">Negara</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><input name="negara[]" id="negara" class="form-control" value=""><br><label id="l_email">Email</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><input name="email[]" id="email" type="email" class="form-control" value=""></div></div></div>'
        ).appendTo('#cek');
        // $('<label>cek ok</label>').appendTo('#cek');
    }
});
</script> -->

<!-- <script>
function checkJenis(select) {
    jabatan = document.getElementById('jenis');
    otherJabatan = document.getElementById('otherJabatan');
    if (select.options[select.selectedIndex].value == "1" || select.options[select.selectedIndex].value == "2") {
        document.getElementById('ext-div').style.display = 'none';
        document.getElementById('jumlah').removeAttribute("required");
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
        document.getElementById('jumlah').setAttribute("required", "");
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
</script>

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
</script> -->

<!-- <script type="text/javascript">
    $(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $("#cek").before(html);
        //   $('.selectpicker2').selectpicker();
          
      });
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
    </script> -->

<!-- <script>
$("#btnadd").click(function() {
    var cek = $('#accordion').length + 1;
    $('<div class="control-group input-group editor_menetapkan"><span class="a"> Menetapkan ' + ($(
            '.editor_menetapkan').length + 1) +
        '</span> <br> <textarea rows="7" name="menetapkan[]" id="editor-copy-menetapkan' + ($(
                '.editor_menetapkan')
            .length + 1) +
        '" type="text" placeholder="Write here..." class="form-control"></textarea><br> <div class="input-group-btn"><button class="btn-sm btn-danger remove-menetapkan" type="button" id="removeItem-' +
        ($('.editor_menetapkan').length + 1) +
        '" action="javascript:;"><i class="fa fa-remove"></i></div></br></div>'
    ).appendTo('#cek');
    var cek1 = "editor-copy-menetapkan" + cek;
    console.log(cek1);
    var editor = document.querySelector('[id="' + cek1 + '"]');
    ClassicEditor.create(editor).then(editor => {
            editor.editing.view.change(writer => {
                writer.setStyle('height', '300px', editor.editing.view.document.getRoot());
            });
        })
        .catch(error => {
            console.error(error);
        });
    // reload_editor()
});

jQuery(document).on('click', '.remove-menetapkan', function() {
    jQuery(this).closest('.editor_menetapkan').remove();
    $('.editor_menetapkan').each(function(i) {
        $(this).find('.a').html('Menetapkan ' + (i + 1));
        $(this).find('a').attr('id', 'removeItem-' + (i + 1));
        $(this).find('textarea').attr('id', 'editor-copy-menetapkan' + (i + 1));
    });
})
</script> -->