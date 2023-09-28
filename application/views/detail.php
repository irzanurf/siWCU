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
                            action="<?php echo base_url()?>User/insert_monev">
                            <h2 style="text-align: center;">Detail</h2>
                            <hr>
                            <label>Jenis Kegiatan</label><label style="color:red; font-size:12px;"> (*Wajib
                                diisi)</label>
                            <select class="form-control" onchange="checkJenis(this)" id="jenis" name="jenis"
                                disabled="disabled">
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
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapse<?=$e->id?>" aria-expanded="true"
                                                    aria-controls="collapseOne">> Data <?=$jml?></button>
                                            </div>
                                        </div>
                                        <div id="collapse<?=$e->id?>" class="collapse hide" aria-labelledby="headingOne"
                                            data-bs-parent="#accordion" style="margin-left:15px; margin-right:15px">
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
                                            <label id="l_jabatan">Jabatan / Position</label><label
                                                style="color:red;font-size:12px;">(*Wajib diisi)</label>
                                            <input name="jabatan[]" id="jabatan" class="form-control"
                                                value="<?=$e->jabatan?>" disabled="disabled"><br>
                                            <label id="l_kepakaran">Kepakaran</label><label
                                                style="color:red;font-size:12px;">(*Wajib diisi)</label>
                                            <input name="kepakaran[]" id="kepakaran" class="form-control"
                                                value="<?=$e->kepakaran?>" disabled="disabled"><br>
                                            <label id="l_departemen">Departemen / Industry</label><label
                                                style="color:red;font-size:12px;">(*Wajib diisi)</label>
                                            <input name="departemen[]" id="departemen" class="form-control"
                                                value="<?=$e->departemen?>" disabled="disabled"><br>
                                            <label id="l_universitas">Universitas / Company</label><label
                                                style="color:red;font-size:12px;">(*Wajib diisi)</label>
                                            <input name="universitas[]" id="universitas" class="form-control"
                                                value="<?=$e->universitas?>" disabled="disabled"><br>
                                            <label id="l_negara">Negara / Location</label><label
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
                                <label style="font-size: 20px">File Proposal</label><br>
                                <div class="form-group">
                                    <button method="post"
                                        onclick=" window.open('<?= base_url('assets/file');?>/<?=$kegiatan->proposal?>', '_blank'); return false;"
                                        class="btn btn-primary-outline"><img src="<?= base_url('assets/attach.png');?>"
                                            alt="attach" width="50" height="50" /></button>
                                </div>
                            </div>
                            <hr>
                            <?php else : ?>

                            <?php endif; ?>

                            <?php
                                
                                if(($kegiatan->status)==0){
                                    $anggaran_disetujui="-";
                                    if(empty($kegiatan->keputusan)){
                                        $status="Kegiatan diajukan, menunggu di-review";
                                        $a=0;
                                    }
                                    else{
                                        if(($kegiatan->keputusan==3)){
                                            $status = "Kegiatan dipertimbangkan untuk batch selanjutnya";
                                            $a=1;
                                        }
                                        elseif(($kegiatan->keputusan==4)){
                                            $status = "Kegiatan diitolak";
                                            $a=1;
                                        }
                                    }
                                }
                                elseif(($kegiatan->status)==1){
                                    $anggaran_disetujui="-";
                                    $status="Kegiatan telah di-review menuggu di-approve";
                                    $a=0;
                                }
                                elseif(($kegiatan->status)==2){
                                    if($kegiatan->keputusan==1){
                                        $status="Kegiatan diterima";
                                    }
                                    elseif($kegiatan->keputusan==2){
                                        $status="Kegiatan diterima dengan perbaikan (maksimal 1 minggu)";
                                        // $v->status=0;
                                    }
                                    elseif($kegiatan->keputusan==3){
                                        $status="Kegiatan dipertimbangkan untuk batch selanjutnya";
                                    }
                                    elseif($kegiatan->keputusan==4){
                                        $status="Kegiatan ditolak";
                                    }
                                    $a=1;
                                }
                                elseif(($kegiatan->status)==3){
                                    $a=1;
                                    $status="Telah upload monev";
                                }
                                
                             ?>

                             <?php if($a==1){ ?>

                            <h2>Feedback Approver</h2><br>

                            <div class="form-group">
                                <label>Keputusan</label>
                                <input class="form-control" value="<?=$status?>" disabled="disabled"><br>
                                <label><br>Komentar</label>
                                <div>
                                    <textarea class="form-control" name="komentar" rows="3"
                                        readonly><?=$kegiatan->kom_ap?></textarea>
                                </div>
                            </div><br>

                            <?php } ?>

                            <!-- <div class="text-center">
                                <button type="submit" name="status" class="btn btn-info" value="draft">
                                    Simpan Draft
                                </button>
                                <button type="submit" name="status" value="0"
                                    onclick="return confirm('Apakah Anda yakin dengan pilihan Anda?');"
                                    class="btn btn-success">
                                    Simpan & Kirim Draft
                                </button>
                            </div> -->
                        </form>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>

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