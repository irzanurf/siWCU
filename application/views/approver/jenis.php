<section id="line-awesome-icons">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"></h4>
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
                        <div class="feather-icons overflow-hidden row">
                            <div class="table-responsive" style="padding-left: 10px; padding-right: 10px">
                                <!-- <form style="display:inline-block;" method="post"
                                    action="<?= base_url('approver/export');?>">
                                    <button type="Submit" class="btn btn-success" data-toggle="tooltip"
                                        data-placement="bottom" title="Export">
                                        <i class="la la-download" style="color:white"></i> Export Semua Data
                                    </button>
                                </form> -->
                                <table class="table table-bordered" style="text-align: left;" id="dataTable"
                                    width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Jenis Kegiatan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                    foreach($jenis_kegiatan as $v) { 

                                        
                                        ?>
                                        <tr>
                                            <td><?= $v->nama ?></td>
                                            <td>
                                                <form style="display:inline-block;" method="get"
                                                    action="<?= base_url('approver/need');?>">
                                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                                    <button type="Submit" class="btn btn-success"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Detail">
                                                        <b>Pilih</b>
                                                    </button>
                                                </form>

                                            </td>
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

<!-- modal tambah data -->
<div class="modal fade tambah-data" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="myLargeModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form role="form" method="post" action="<?= base_url('User/insert_kegiatan');?>"
                enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="tb" value="tb_ap" />
                    <label>Jenis Kegiatan</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                    <select class="form-control" onchange="checkJenis(this)" id="jenis" name="jenis">
                        <option value="">Please Select</option>
                        <?php foreach($jenis_kegiatan as $j){ ?>
                        <option value="<?= $j->id ?>"><?= $j->nama ?></option>
                        <?php } ?>
                    </select>
                    <hr>

                    <label>Judul Kegiatan</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                    <textarea name="judul" id="judul" rows="3" class="form-control" value="" required=""></textarea><br>

                    <div id="ext-div" style="display: none">
                        <!-- <button class="btn btn-success add-more" id="btnadd" type="button"><i class="la la-plus"></i>
                            Tambah data professor</button><br> -->
                        <label>Jumlah Data Prof</label><label style="color:red; font-size:12px;"> (*Wajib
                            diisi)</label>
                        <input name="jumlah" id="jumlah" class="form-control" value=""><br>
                        <h2 style="text-align: center">Data Professor</h2>
                        <!-- <div class="accordion" id="accordion" style="background: #00000;">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <div class="form-group row">
                                        <div class="col-10">
                                            <button class="btn btn-link btn-block text-left" type="button"
                                                data-toggle="collapse" data-target="#collapse"ini"" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                > Data Professor "ini"
                                            </button>
                                        </div>
                                        <div class="col-2">
                                            <button class="btn btn-danger remove" type="button"><i
                                                    class="la la-trash"></i></button>
                                        </div>
                                    </div>
                                </div>

                                <div id="collapse"ini"" class="collapse hide" aria-labelledby="headingOne"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <label>Titel</label><label style="color:red; font-size:12px;"> (*Wajib
                                            diisi)</label>
                                        <select class="form-control" name="titel[]" id="titel">
                                            <option value="">Please Select</option>
                                            <option value="Prof">Prof</option>
                                            <option value="Dr">Dr</option>
                                            <option value="Mr">Mr</option>
                                            <option value="Mrs">Mrs</option>
                                            <option value="Ms">Ms</option>
                                        </select>
                                        <hr>

                                        <label id="l_nama_depan">Nama Depan</label><label
                                            style="color:red; font-size:12px;">
                                            (*Wajib
                                            diisi)</label>
                                        <input name="nama_depan[]" id="nama_depan" class="form-control" value=""><br>
                                        <label id="l_nama_belakang">Nama Belakang</label><label
                                            style="color:red; font-size:12px;">
                                            (*Wajib diisi)</label>
                                        <input name="nama_belakang[]" id="nama_belakang" class="form-control"
                                            value=""><br>
                                        <label id="l_jabatan">Jabatan</label><label style="color:red; font-size:12px;">
                                            (*Wajib
                                            diisi)</label>
                                        <input name="jabatan[]" id="jabatan" class="form-control" value=""><br>
                                        <label id="l_kepakaran">Kepakaran</label><label
                                            style="color:red; font-size:12px;"> (*Wajib
                                            diisi)</label>
                                        <input name="kepakaran[]" id="kepakaran" class="form-control" value=""><br>
                                        <label id="l_departemen">Departemen</label><label
                                            style="color:red; font-size:12px;">
                                            (*Wajib
                                            diisi)</label>
                                        <input name="departemen[]" id="departemen" class="form-control" value=""><br>
                                        <label id="l_universitas">Universitas</label><label
                                            style="color:red; font-size:12px;">
                                            (*Wajib
                                            diisi)</label>
                                        <input name="universitas[]" id="universitas" class="form-control" value=""><br>
                                        <label id="l_negara">Negara</label><label style="color:red; font-size:12px;">
                                            (*Wajib
                                            diisi)</label>
                                        <input name="negara[]" id="negara" class="form-control" value=""><br>
                                        <label id="l_email">Email</label><label style="color:red; font-size:12px;">
                                            (*Wajib
                                            diisi)</label>
                                        <input name="email[]" id="email" type="email" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                        </div> -->



                    </div>

                    <div id="cek">

                    </div>



                    <label>Total Anggaran</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                    <div class="form-group input-group">
                        <input size="4" maxlength="4" value="Rp." disabled="">
                        <input type="text" class="form-control currency" id="total_anggaran" name="total_anggaran"
                            required="">
                        <input size="3" maxlength="3" value=",00" disabled="">
                    </div><br>

                    <div class="form-group">
                        <label style="font-size: 20px">File Proposal</label><br>
                        <input type="file" name="file"> <br>
                        <label style="color:red; font-size:12px;">maks 10mb</label>
                    </div><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$('#jumlah').keyup(function() {
    var jumlah = $('#jumlah').val();
    for (var jum = 1; jum <= jumlah; jum++) {
        $('<div class="accordion" id="accordion" style="background:#00000;"><div class="card"><div class="card-header" id="headingOne"><div class="form-group row"><div class="col-12"><button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse' +
            jum + '" aria-expanded="true" aria-controls="collapseOne">> Data Professor ' + jum +
            '</button></div></div></div><div id="collapse' + jum +
            '" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordion"><div class="card-body"><label>Titel</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><select class="form-control" name="titel[]" id="titel"><option value="">Please Select</option><option value="Prof">Prof</option><option value="Dr">Dr</option><option value="Mr">Mr</option><option value="Mrs">Mrs</option><option value="Ms">Ms</option></select><hr><label id="l_nama_depan">Nama Depan</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><input name="nama_depan[]" id="nama_depan" class="form-control" value=""><br><label id="l_nama_belakang">Nama Belakang</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><input name="nama_belakang[]" id="nama_belakang" class="form-control" value=""><br><label id="l_jabatan">Jabatan</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><input name="jabatan[]" id="jabatan" class="form-control" value=""><br><label id="l_kepakaran">Kepakaran</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><input name="kepakaran[]" id="kepakaran" class="form-control" value=""><br><label id="l_departemen">Departemen</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><input name="departemen[]" id="departemen" class="form-control" value=""><br><label id="l_universitas">Universitas</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><input name="universitas[]" id="universitas" class="form-control" value=""><br><label id="l_negara">Negara</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><input name="negara[]" id="negara" class="form-control" value=""><br><label id="l_email">Email</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><input name="email[]" id="email" type="email" class="form-control" value=""></div></div></div></div>'
        ).appendTo('#cek');
        // $('<label>cek ok</label>').appendTo('#cek');
    }
});
</script>

<script>
function checkJenis(select) {
    jabatan = document.getElementById('jenis');
    otherJabatan = document.getElementById('otherJabatan');
    if (select.options[select.selectedIndex].value == "1" || select.options[select.selectedIndex].value == "2") {
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
</script>

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