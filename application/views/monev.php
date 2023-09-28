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
                            <h2 style="text-align: center;">Monitoring dan Evaluasi</h2>
                            <hr>
                            <input name="id" type="hidden" value="<?= $kegiatan->id ?>" />
                            <input name="jenis" type="hidden" value="<?= $kegiatan->jenis ?>" />
                            <div class="form-group">
                                <label style="font-size: 20px">Laporan Kegiatan</label><br>
                                <?php if (!empty($monev->file1)) { ?>
                                <div class="form-group">
                                    <button method="post"
                                        onclick=" window.open('<?= base_url('assets/file');?>/<?=$monev->file1?>', '_blank'); return false;"
                                        class="btn btn-primary-outline"><img src="<?= base_url('assets/attach.png');?>"
                                            alt="attach" width="50" height="50" /></button>
                                </div><br>
                                <?php } ?>
                                <input type="file" name="file"> <br>
                                <label style="color:red; font-size:12px;">maks 5mb</label>
                            </div><br>
                            <div class="form-group">
                                <label style="font-size: 20px">Dokumentasi Kegiatan</label><br>
                                <?php if (!empty($monev->file2)) { ?>
                                <div class="form-group">
                                    <button method="post"
                                        onclick=" window.open('<?= base_url('assets/file');?>/<?=$monev->file2?>', '_blank'); return false;"
                                        class="btn btn-primary-outline"><img src="<?= base_url('assets/attach.png');?>"
                                            alt="attach" width="50" height="50" /></button>
                                </div><br>
                                <?php } ?>
                                <input type="file" name="file2"> <br>
                                <label style="color:red; font-size:12px;">maks 5mb</label>
                            </div><br>
                            <!-- Lampiran -->
                            <?php if($kegiatan->jenis == 1) {?>
                            <div class="form-group">
                                <label style="font-size: 20px">Foto Sertifikat, Medali</label><br>
                                <?php if (!empty($monev->file3)) { ?>
                                <div class="form-group">
                                    <button method="post"
                                        onclick=" window.open('<?= base_url('assets/file');?>/<?=$monev->file3?>', '_blank'); return false;"
                                        class="btn btn-primary-outline"><img src="<?= base_url('assets/attach.png');?>"
                                            alt="attach" width="50" height="50" /></button>
                                </div><br>
                                <?php } ?>
                                <input type="file" name="file3"> <br>
                                <label style="color:red; font-size:12px;">maks 5mb</label>
                            </div><br>
                            <?php } elseif($kegiatan->jenis == 2) {?>
                            <div class="form-group">
                                <label style="font-size: 20px">PKS, Lol, Mou, Paper</label><br>
                                <?php if (!empty($monev->file3)) { ?>
                                <div class="form-group">
                                    <button method="post"
                                        onclick=" window.open('<?= base_url('assets/file');?>/<?=$monev->file3?>', '_blank'); return false;"
                                        class="btn btn-primary-outline"><img src="<?= base_url('assets/attach.png');?>"
                                            alt="attach" width="50" height="50" /></button>
                                </div><br>
                                <?php } ?>
                                <input type="file" name="file3"> <br>
                                <label style="color:red; font-size:12px;">maks 5mb</label>
                            </div><br>
                            <div class="form-group">
                                <label style="font-size: 20px">Artikel yang telah submitted/accepted/published
                                    (disertakan bukti)</label><br>
                                <?php if (!empty($monev->file4)) { ?>
                                <div class="form-group">
                                    <button method="post"
                                        onclick=" window.open('<?= base_url('assets/file');?>/<?=$monev->file4?>', '_blank'); return false;"
                                        class="btn btn-primary-outline"><img src="<?= base_url('assets/attach.png');?>"
                                            alt="attach" width="50" height="50" /></button>
                                </div><br>
                                <?php } ?>
                                <input type="file" name="file4"> <br>
                                <label style="color:red; font-size:12px;">maks 5mb</label>
                            </div><br>
                            <?php } elseif($kegiatan->jenis == 3) {?>
                            <div class="form-group">
                                <label style="font-size: 20px">PKS, Lol, Mou, Paper</label><br>
                                <?php if (!empty($monev->file3)) { ?>
                                <div class="form-group">
                                    <button method="post"
                                        onclick=" window.open('<?= base_url('assets/file');?>/<?=$monev->file3?>', '_blank'); return false;"
                                        class="btn btn-primary-outline"><img src="<?= base_url('assets/attach.png');?>"
                                            alt="attach" width="50" height="50" /></button>
                                </div><br>
                                <?php } ?>
                                <input type="file" name="file3"> <br>
                                <label style="color:red; font-size:12px;">maks 5mb</label>
                            </div><br>
                            <?php } elseif($kegiatan->jenis == 4) {?>
                            <div class="form-group">
                                <label style="font-size: 20px">PKS, Lol, Mou, Paper</label><br>
                                <?php if (!empty($monev->file3)) { ?>
                                <div class="form-group">
                                    <button method="post"
                                        onclick=" window.open('<?= base_url('assets/file');?>/<?=$monev->file3?>', '_blank'); return false;"
                                        class="btn btn-primary-outline"><img src="<?= base_url('assets/attach.png');?>"
                                            alt="attach" width="50" height="50" /></button>
                                </div><br>
                                <?php } ?>
                                <input type="file" name="file3"> <br>
                                <label style="color:red; font-size:12px;">maks 5mb</label>
                            </div><br>
                            <?php } elseif($kegiatan->jenis == 5) {?>
                            <div class="form-group">
                                <label style="font-size: 20px">PKS, Lol, Mou, Paper</label><br>
                                <?php if (!empty($monev->file3)) { ?>
                                <div class="form-group">
                                    <button method="post"
                                        onclick=" window.open('<?= base_url('assets/file');?>/<?=$monev->file3?>', '_blank'); return false;"
                                        class="btn btn-primary-outline"><img src="<?= base_url('assets/attach.png');?>"
                                            alt="attach" width="50" height="50" /></button>
                                </div><br>
                                <?php } ?>
                                <input type="file" name="file3"> <br>
                                <label style="color:red; font-size:12px;">maks 5mb</label>
                            </div><br>
                            <h4>Artikel yang dipublikasikan pada jurnal internasional bereputasi terindeks
                                Scopus dengan menambahkan afiliasi Undip</h4>
                            <label>status</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                            <select class="form-control" name="status" required="">
                                <option value="">Please Select</option>
                                <option value="Draft" 
                                   <?php if($monev->stat=="Draft") echo 'selected="selected"'; ?>>
                                    Draft
                                </option>
                                <option value="In Review"
                                    <?php if($monev->stat=="In Review") echo 'selected="selected"'; ?>>
                                    In Review
                                </option>
                                <option value="Submitted"
                                    <?php if($monev->stat=="Submitted") echo 'selected="selected"'; ?>>
                                    Submitted
                                </option>
                                <option value="Accepted"
                                    <?php if($monev->stat=="Accepted") echo 'selected="selected"'; ?>>
                                    Accepted
                                </option>
                                <option value="Published"
                                    <?php if($monev->stat=="Published") echo 'selected="selected"'; ?>>
                                    Published
                                </option>
                            </select>
                            <hr>
                            <div class="form-group">
                                <label style="font-size: 20px">Artikel</label><br>
                                <input type="file" name="file4"> <br>
                                <label style="color:red; font-size:12px;">maks 5mb</label>
                            </div><br>
                            <?php } elseif($kegiatan->jenis == 6) {?>
                            <div class="form-group">
                                <label style="font-size: 20px">Materi Kegiatan pelatihan (penulisan buku dan
                                    klinik manuskrip)</label><br>
                                <?php if (!empty($monev->file3)) { ?>
                                <div class="form-group">
                                    <button method="post"
                                        onclick=" window.open('<?= base_url('assets/file');?>/<?=$monev->file3?>', '_blank'); return false;"
                                        class="btn btn-primary-outline"><img src="<?= base_url('assets/attach.png');?>"
                                            alt="attach" width="50" height="50" /></button>
                                </div><br>
                                <?php } ?>
                                <input type="file" name="file3"> <br>
                                <label style="color:red; font-size:12px;">maks 5mb</label>
                            </div><br>
                            <div class="form-group">
                                <label style="font-size: 20px">Materi kuliah dosen tamu</label><br>
                                <?php if (!empty($monev->file4)) { ?>
                                <div class="form-group">
                                    <button method="post"
                                        onclick=" window.open('<?= base_url('assets/file');?>/<?=$monev->file4?>', '_blank'); return false;"
                                        class="btn btn-primary-outline"><img src="<?= base_url('assets/attach.png');?>"
                                            alt="attach" width="50" height="50" /></button>
                                </div><br>
                                <?php } ?>
                                <input type="file" name="file4"> <br>
                                <label style="color:red; font-size:12px;">maks 5mb</label>
                            </div><br>
                            <h4>Artikel yang dipublikasikan pada jurnal internasional bereputasi terindeks
                                Scopus dengan menambahkan afiliasi Undip</h4>
                            <label>status</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                            <select class="form-control" name="status" required="">
                                <option value="">Please Select</option>
                                <option value="Draft" 
                                   <?php if($monev->stat=="Draft") echo 'selected="selected"'; ?>>
                                    Draft
                                </option>
                                <option value="In Review"
                                    <?php if($monev->stat=="In Review") echo 'selected="selected"'; ?>>
                                    In Review
                                </option>
                                <option value="Submitted"
                                    <?php if($monev->stat=="Submitted") echo 'selected="selected"'; ?>>
                                    Submitted
                                </option>
                                <option value="Accepted"
                                    <?php if($monev->stat=="Accepted") echo 'selected="selected"'; ?>>
                                    Accepted
                                </option>
                                <option value="Published"
                                    <?php if($monev->stat=="Published") echo 'selected="selected"'; ?>>
                                    Published
                                </option>
                            </select>
                            <hr>
                            <div class="form-group">
                                <label style="font-size: 20px">Artikel</label><br>
                                <input type="file" name="file5 "> <br>
                                <label style="color:red; font-size:12px;">maks 5mb</label>
                            </div><br>
                            <?php } else {}?>

                            <div class="text-center">
                                <button type="submit" name="status" value="3"
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