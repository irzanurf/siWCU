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
                        <form>
                            <h2 style="text-align: center;">Edit Review Kegiatan</h2>
                            <hr>
                            <label>Jenis Kegiatan</label><label style="color:red; font-size:12px;"> (*Wajib
                                diisi)</label>
                            <select class="form-control" onchange="checkJenis(this)" id="jenis" name="jenis"
                                disabled="">
                                <option value="">Please Select</option>
                                <?php foreach($jenis_kegiatan as $j){ ?>
                                <option value="<?=$j->id?>"
                                    <?php if("$j->id"=="$kegiatan->jenis") echo 'selected="selected"'; ?>><?=$j->nama?>
                                </option>
                                <?php } ?>
                            </select>
                            <hr>

                            <label>Judul Kegiatan</label><label style="color:red; font-size:12px;"> (*Wajib
                                diisi)</label>
                            <textarea name="judul" id="judul" rows="3" class="form-control" value="" required=""
                                disabled="disabled"><?=$kegiatan->judul?></textarea><br>

                            <?php if(!empty($ext)){ 
                                $jml = 1;
                                foreach($ext as $e){?>
                            <div id="ext-div">

                                <div class="accordion" id="accordion">
                                    <div class="card" style="background-color:#f6f5f5;">
                                        <div class="form-group row">
                                            <div class="col-12"><button class="btn btn-link btn-block text-left"
                                                    type="button" data-toggle="collapse"
                                                    data-target="#collapse<?=$e->id?>" aria-expanded="true"
                                                    aria-controls="collapseOne">> Data Professor <?=$jml?></button>
                                            </div>
                                        </div>
                                        <div id="collapse<?=$e->id?>" class="collapse hide" aria-labelledby="headingOne"
                                            data-parent="#accordion" style="margin-left:15px; margin-right:15px">
                                            <label>Titel</label><label style="color:red;font-size:12px;">(*Wajib
                                                diisi)</label><select class="form-control" name="titel[]" id="titel"
                                                disabled="disabled">
                                                <option value="">Please Select</option>
                                                <option value="Prof"
                                                    <?php if($e->titel=="Prof") echo 'selected="selected"'; ?>>Prof
                                                </option>
                                                <option value="Dr"
                                                    <?php if($e->titel=="Dr") echo 'selected="selected"'; ?>>Dr
                                                </option>
                                                <option value="Mr"
                                                    <?php if($e->titel=="Mr") echo 'selected="selected"'; ?>>Mr
                                                </option>
                                                <option value="Mrs"
                                                    <?php if($e->titel=="Mrs") echo 'selected="selected"'; ?>>Mrs
                                                </option>
                                                <option value="Ms"
                                                    <?php if($e->titel=="Ms") echo 'selected="selected"'; ?>>Ms
                                                </option>
                                            </select>
                                            <hr>
                                            <label id="l_nama_depan">Nama Depan</label><label
                                                style="color:red;font-size:12px;">(*Wajib diisi)</label>
                                            <input name="nama_depan[]" id="nama_depan" class="form-control"
                                                value="<?=$e->nama_depan?>" disabled="disabled"><br>
                                            <label id="l_nama_belakang">Nama Belakang</label><label
                                                style="color:red;font-size:12px;">(*Wajib
                                                diisi)</label>
                                            <input name="nama_belakang[]" id="nama_belakang" class="form-control"
                                                value="<?=$e->nama_belakang?>" disabled="disabled"><br>
                                            <label id="l_jabatan">Jabatan</label><label
                                                style="color:red;font-size:12px;">(*Wajib diisi)</label>
                                            <input name="jabatan[]" id="jabatan" class="form-control"
                                                value="<?=$e->jabatan?>" disabled="disabled"><br>
                                            <label id="l_kepakaran">Kepakaran</label><label
                                                style="color:red;font-size:12px;">(*Wajib diisi)</label>
                                            <input name="kepakaran[]" id="kepakaran" class="form-control"
                                                value="<?=$e->kepakaran?>" disabled="disabled"><br>
                                            <label id="l_departemen">Departemen</label><label
                                                style="color:red;font-size:12px;">(*Wajib diisi)</label>
                                            <input name="departemen[]" id="departemen" class="form-control"
                                                value="<?=$e->departemen?>" disabled="disabled"><br>
                                            <label id="l_universitas">Universitas</label><label
                                                style="color:red;font-size:12px;">(*Wajib diisi)</label>
                                            <input name="universitas[]" id="universitas" class="form-control"
                                                value="<?=$e->universitas?>" disabled="disabled"><br>
                                            <label id="l_negara">Negara</label><label
                                                style="color:red;font-size:12px;">(*Wajib diisi)</label>
                                            <input name="negara[]" id="negara" class="form-control"
                                                value="<?=$e->negara?>" disabled="disabled"><br>
                                            <label id="l_email">Email</label><label
                                                style="color:red;font-size:12px;">(*Wajib diisi)</label>
                                            <input name="email[]" id="email" type="email" class="form-control"
                                                value="<?=$e->email?>" disabled="disabled">
                                        </div>
                                    </div>
                                </div>

                                <div id="cek">

                                </div>

                            </div>
                            <?php $jml++; }} ?>

                            <label>Total Anggaran</label><label style="color:red; font-size:12px;"> (*Wajib
                                diisi)</label>
                            <div class="form-group input-group">
                                <input size="4" maxlength="4" value="Rp." disabled="">
                                <input type="text" class="form-control currency" id="total_anggaran"
                                    name="total_anggaran" value="<?=$kegiatan->total_anggaran?>" disabled="disabled"
                                    required="">
                                <input size="3" maxlength="3" value=",00" disabled="">
                            </div><br>

                            <!-- <div class="form-group">
                                <label style="font-size: 20px">File Proposal</label><br>
                                <input type="file" name="file"> <br>
                                <label style="color:red; font-size:12px;">maks 10mb</label>
                            </div><br> -->

                            <?php if (!empty($kegiatan->proposal)) : ?>
                            <div class="form-group">
                                <h2>Proposal</h2><br>
                                <!-- <div class="form-group"> -->
                                <!-- <button method="post"
                                        onclick=" window.open('<?= base_url('assets/file');?>/<?=$kegiatan->proposal?>', '_blank'); return false;"
                                        class="btn btn-primary-outline"><img src="<?= base_url('assets/attach.png');?>"
                                            alt="attach" width="50" height="50" /></button> -->
                                <iframe src="<?= base_url('assets/file');?>/<?=$kegiatan->proposal?>" width="100%"
                                    style="height:80vh; border:none"></iframe>


                                <!-- </div> -->
                            </div>
                        </form>
                        <hr>
                        <?php else : ?>

                        <?php endif; ?>
                        <form role="form" method="post" action="<?= base_url('Reviewer/updateReview');?>"
                            enctype="multipart/form-data">

                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id" value=<?= $kegiatan->id?>>
                            </div>

                            <h2>Form Review</h2>

                            <p><br>Keterangan: <br> Nilai Skor maks adalah 100</p>
                            <div class="table-responsive">
                                <table class="table table-bordered" cellspacing="0" style="width:100%;">
                                    <colgroup>
                                        <col span="1" style="width: 15%;">
                                        <col span="1" style="width: 45%;">
                                        <col span="1" style="width: 15%;">
                                        <col span="1" style="width: 20%;">
                                        <col span="1" style="width: 15%;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Komponen Penilaian</th>
                                            <th>Bobot (%)</th>
                                            <th>Skor (1-100)</th>
                                            <th>NIlai</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>

                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <tr>
                                            <td style="text-align:center">1</td>
                                            <td>Kesesuaian format proposal</td>
                                            <td><input type="text" id="bobot1" name="bobot1" value="20" disabled>
                                            </td>
                                            <!-- <td><input type="text" id="skor1" name="skor1" value=""></td> -->
                                            <td><input placeholder="Skor" type="number" step="any" min="0" max="100"
                                                    id="skor1" name="skor1" onchange="Multiply()" value="<?=$review[0]->skor?>" required=""> <a
                                                    href="javascript: void(0)" onChange="calc()"></a></td>
                                            <td><input type="text" id="nilai1" name="nilai1" value="<?=$review[0]->nilai?>" readonly></td>
                                        </tr>

                                        <tr>
                                            <td style="text-align:center">2</td>
                                            <td>Waktu pelaksanaan kegiatan (Q1, Q2, Q3)</td>
                                            <td><input type="text" id="bobot2" name="bobot2" value="10" disabled>
                                            </td>
                                            <!-- <td><input type="text" id="skor1" name="skor1" value=""></td> -->
                                            <td><input placeholder="Skor" type="number" step="any" min="0" max="100"
                                                    id="skor2" name="skor2" onchange="Multiply()" value="<?=$review[1]->skor?>" required=""> <a
                                                    href="javascript: void(0)" onChange="calc()"></a></td>
                                            <td><input type="text" id="nilai2" name="nilai2" value="<?=$review[1]->nilai?>" readonly></td>
                                        </tr>

                                        <tr>
                                            <td style="text-align:center">3</td>
                                            <td>Pemenuhan syarat utama program -> keterangan</td>
                                            <td><input type="text" id="bobot3" name="bobot3" value="40" disabled>
                                            </td>
                                            <!-- <td><input type="text" id="skor1" name="skor1" value=""></td> -->
                                            <td><input placeholder="Skor" type="number" step="any" min="0" max="100"
                                                    id="skor3" name="skor3" onchange="Multiply()" value="<?=$review[2]->skor?>" required=""> <a
                                                    href="javascript: void(0)" onChange="calc()"></a></td>
                                            <td><input type="text" id="nilai3" name="nilai3" value="<?=$review[2]->nilai?>" readonly></td>
                                        </tr>

                                        <tr>
                                            <td style="text-align:center">4</td>
                                            <td>Kesesuaian/proporsi RAB</td>
                                            <td><input type="text" id="bobot4" name="bobot4" value="30" disabled>
                                            </td>
                                            <!-- <td><input type="text" id="skor1" name="skor1" value=""></td> -->
                                            <td><input placeholder="Skor" type="number" step="any" min="0" max="100"
                                                    id="skor4" name="skor4" onchange="Multiply()" value="<?=$review[3]->skor?>" required=""> <a
                                                    href="javascript: void(0)" onChange="calc()"></a></td>
                                            <td><input type="text" id="nilai4" name="nilai4" value="<?=$review[3]->nilai?>" readonly></td>
                                        </tr>

                                        <tr>
                                            <td colspan='4' style="text-align:center">Total</td>
                                            <td><input type="text" name="totalnilai" id="totalnilai" value="<?=$komentar->nilai_total?>" readonly></td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>

                            <label>Total Anggaran Disetujui Reviewer</label><label style="color:red; font-size:12px;"> (*Wajib
                                diisi)</label>
                            <div class="form-group input-group">
                                <input size="4" maxlength="4" value="Rp." disabled="">
                                <input type="text" class="form-control currency" id="anggaran_disetujui"
                                    name="anggaran_disetujui" value="<?php if(!empty($anggaran->anggaran)){echo"$anggaran->anggaran";}?>"
                                    required="">
                                <input size="3" maxlength="3" value=",00" disabled="">
                            </div><br>

                            <div class="form-group">
                                <label><br>Komentar Penilai</label><label style="color:red; font-size:12px;">
                                    (*Wajib diisi)</label>
                                <div>
                                    <textarea class="form-control" name="komentar" rows="3" required=""><?=$komentar->komentar?></textarea>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit"
                                    onclick="return confirm('Apakah Anda yakin dengan pilihan Anda?');"
                                    class="btn btn-success">
                                    Submit
                                </button>
                            </div>
                        </form>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>

<script>
$('#jumlah').keyup(function() {
    var jumlah = $('#jumlah').val();
    for (var jum = 1; jum <= jumlah; jum++) {
        $('<div class="accordion" id="accordion"><div class="card" style="background-color:#f6f5f5;"><div class="card-header" id="headingOne"><div class="form-group row"><div class="col-12"><button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse' +
            jum + '" aria-expanded="true" aria-controls="collapseOne">> Data Professor ' + jum +
            '</button></div></div></div><div id="collapse' + jum +
            '" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordion"><div class="card-body"><label>Titel</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><select class="form-control" name="titel[]" id="titel"><option value="">Please Select</option><option value="Prof">Prof</option><option value="Dr">Dr</option><option value="Mr">Mr</option><option value="Mrs">Mrs</option><option value="Ms">Ms</option></select><hr><label id="l_nama_depan">Nama Depan</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><input name="nama_depan[]" id="nama_depan" class="form-control" value=""><br><label id="l_nama_belakang">Nama Belakang</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><input name="nama_belakang[]" id="nama_belakang" class="form-control" value=""><br><label id="l_jabatan">Jabatan</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><input name="jabatan[]" id="jabatan" class="form-control" value=""><br><label id="l_kepakaran">Kepakaran</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><input name="kepakaran[]" id="kepakaran" class="form-control" value=""><br><label id="l_departemen">Departemen</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><input name="departemen[]" id="departemen" class="form-control" value=""><br><label id="l_universitas">Universitas</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><input name="universitas[]" id="universitas" class="form-control" value=""><br><label id="l_negara">Negara</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><input name="negara[]" id="negara" class="form-control" value=""><br><label id="l_email">Email</label><label style="color:red;font-size:12px;">(*Wajib diisi)</label><input name="email[]" id="email" type="email" class="form-control" value=""></div></div></div></div>'
        ).appendTo('#cek');
        // $('<label>cek ok</label>').appendTo('#cek');
    }
});
</script>

<script type="text/javascript">
function Multiply() {
    var i;
    var totalnilai;
    for (i = 1; i < 7; i++) {
        var txtbox_Value = $("#bobot" + i).val();
        var selectBox_Value = $("#skor" + i).val();
        var MultipliedValue = (txtbox_Value * selectBox_Value / 100);
        $("#nilai" + i).val(MultipliedValue);
    }


}
</script>

<script type="text/javascript">
function Multiply() {
    var i;

    for (i = 1; i < 7; i++) {
        var txtbox_Value = $("#bobot" + i).val();
        var selectBox_Value = $("#skor" + i).val();
        var MultipliedValue = (txtbox_Value * selectBox_Value / 100);
        $("#nilai" + i).val(MultipliedValue);
    }

    var nilai1 = parseFloat($("#nilai1").val());
    var nilai2 = parseFloat($("#nilai2").val());
    var nilai3 = parseFloat($("#nilai3").val());
    var nilai4 = parseFloat($("#nilai4").val());
    var totalnilai = (nilai1 + nilai2 + nilai3 + nilai4);
    console.log(totalnilai);
    $("#totalnilai").val(totalnilai);

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

<script>
$(function() {
    $("#anggaran_disetujui").keyup(function(e) {
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