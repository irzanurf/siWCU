<!-- line covid section start -->
<section>
    <hr>
    <div class="row">
        <div class="col-md-4 col-sm-4">
            <div class="card">
                <div class="card-header" style="background-color: #0067ce">
                    <h5 class="card-title" style="color: white;"><?= $satu0 ?></h5>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"
                            style="color: white;"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus" style="color: white;"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw" style="color: white;"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize" style="color: white;"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <div class="form-row center">
                            <div class="col-xl-5 col-lg-5 col-md-12 col-12">
                                <img src="<?= base_url('assets/checklist.gif');?>" alt="condition" width="100"
                                    height="100" />
                                <hr>
                            </div>
                            <div class="col-xl-7 col-lg-7 col-md-12 col-12" style="padding-top: 1rem">
                                <h3><b><?=$satu1?></b></h3>
                                <label><?=$satu2?></label>
                            </div>
                            <a class="btn btn-info w-100" href="<?= base_url("$satu3") ?>">Pilih</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-4">
            <div class="card">
                <div class="card-header" style="background-color: #329726">
                    <h5 class="card-title" style="color: white;"><?= $dua0 ?></h5>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"
                            style="color: white;"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus" style="color: white;"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw" style="color: white;"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize" style="color: white;"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <div class="form-row center">
                            <div class="col-xl-5 col-lg-5 col-md-12 col-12">
                                <img src="<?= base_url('assets/notification.gif');?>" alt="condition" width="100"
                                    height="100" />
                                <hr>
                            </div>
                            <div class="col-xl-7 col-lg-7 col-md-12 col-12" style="padding-top: 1rem">
                                <h3><b><?=$dua1?></b></h3>
                                <label><?=$dua2?></label>
                            </div>
                            <a class="btn btn-success w-100" href="<?= base_url("$dua3") ?>">Pilih</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-4">
            <div class="card">
                <div class="card-header" style="background-color: #a80000">
                    <h4 class="card-title" style="color: white;"><?= $tiga0 ?></h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"
                            style="color: white;"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus" style="color: white;"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw" style="color: white;"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize" style="color: white;"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <div class="form-row center">
                            <div class="col-xl-5 col-lg-5 col-md-12 col-12">
                                <img src="<?= base_url('assets/verified.gif');?>" alt="condition" width="100"
                                    height="100" />
                                <hr>
                            </div>
                            <div class="col-xl-7 col-lg-7 col-md-12 col-12" style="padding-top: 1rem">
                                <h3><b><?=$tiga1?></b></h3>
                                <label><?=$tiga2?></label>
                            </div>
                            <a class="btn btn-danger w-100" href="<?= base_url("$tiga3") ?>">Pilih</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- // Pie covid section end -->