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
                                <table class="table table-bordered" style="text-align: left;" id="dataTable"
                                    width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Pengusul</th>
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
                                            <td><?= $v->nama_pengusul ?></td>
                                            <td><?= $v->jenis_kegiatan ?></td>
                                            <td><?= $v->judul ?></td>
                                            <td>

                                                <button type="button" class="btn btn-warning" style="text-align: center"
                                                    data-bs-toggle="tooltip" data-bs-html="true"
                                                    data-bs-placement="bottom"
                                                    title="&lt;b&gt;Status :&lt;/b&gt;&lt;br&gt; <?=$status?>&lt;br&gt;&lt;br&gt;&lt;b&gt;Anggaran diajukan:&lt;/b&gt;&lt;br&gt; <?=$total?>&lt;br&gt;&lt;br&gt;&lt;b&gt;Anggaran disetujui:&lt;/b&gt;&lt;br&gt; <?=$anggaran_disetujui?>&lt;/b&gt;">
                                                    <b><i class="la la-exclamation-circle"
                                                            style="color:white; font-size:20px;"></i></b>
                                                </button>

                                                <form style="display:inline-block;" method="post"
                                                    action="<?= base_url('komentator/detail');?>">
                                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                                    <button type="Submit" class="btn btn-success"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Detail">
                                                        <b><i class="la la-eye"
                                                                style="color:white; font-size:20px;"></i></b>
                                                    </button>
                                                </form>

                                                <?php if($v->status != 2) { ?>
                                                <form style="display:inline-block;" data-bs-toggle="tooltip"
                                                    method="post" data-bs-placement="bottom"
                                                    title="Komentar"
                                                    action="<?= base_url('komentator/edit_komentar');?>">
                                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                                    <button class="btn btn-primary" style="color:grey" type="submit">
                                                        <i class="la la-archive"
                                                            style="color:white; font-size:20px;"></i>
                                                    </button>
                                                </form>
                                                <!-- <form style="display:inline-block;" data-toggle="tooltip"
                                                    data-placement="bottom" title="Edit">
                                                    <button class="btn btn-primary" type="button" data-toggle="modal"
                                                        data-target=".edit<?=$v->id?>">
                                                        <i class="la la-edit" style="color:white"></i>
                                                    </button>
                                                </form> -->

                                                <!-- <form style="display:inline-block;" data-toggle="tooltip"
                                                    data-placement="bottom" title="Monitoring & Evaluasi">
                                                    <button class="btn btn-secondary" style="color:grey" type="button">
                                                        <i class="la la-credit-card" style="color:white"></i>
                                                    </button>
                                                </form> -->

                                                <!-- <?php } elseif($v->status == 1) { ?>
                                                <form style="display:inline-block;" data-bs-toggle="tooltip"
                                                    method="post" data-bs-placement="bottom"
                                                    title="Edit Komentar"
                                                    action="<?= base_url('komentator/edit_komentar');?>">
                                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                                    <button class="btn btn-primary" style="color:grey" type="submit">
                                                        <i class="la la-archive"
                                                            style="color:white; font-size:20px;"></i>
                                                    </button>
                                                </form> -->
                                                <?php } elseif($v->status == 3) { ?>
                                                    <form style="display:inline-block;" method="post"
                                                    action="<?= base_url('komentator/monev');?>">
                                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                                    <button type="Submit" class="btn btn-primary" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="Monitoring & Evaluasi">
                                                        <i class="la la-credit-card"
                                                            style="color:white; font-size:20px;"></i>
                                                    </button>
                                                </form>
                                                <?php } else { ?>
                                                <form style="display:inline-block;" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title="Edit Komentar">
                                                    <button class="btn btn-secondary" style="color:grey" type="button">
                                                        <i class="la la-archive" style="color:white; font-size:20px;"></i>
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


