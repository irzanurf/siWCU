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
                          <!-- Begin Page Content -->
                <div class="container-fluid" style="height: 60%; background-image: url('<?= base_url('assets/bg.jpg');?>'); height: 100%; background-position: center; background-repeat: no-repeat;background-size: cover;">
                
                <div style="height: 100%;
                            display: flex;
                            justify-content: center;
                            align-items: center;">
                    <form style="width: 600px; padding-bottom:10rem; padding-top:4rem;" method="GET" action="<?= base_url('Admin/data_covid');?>">
                        <div style="padding-bottom: 10px; text-align:center">
                            <img class="profile-img-card" src="<?php echo base_url('assets/main/images/ico/puskesmas.png'); ?>" width="210" height="250" alt="logo">
                            <h1 style="color: white; font-weight:bold">Puskesmas Halmahera</h1>
                        </div>
                        <div class="input-group">
                            <input type="text" name="nik" class="border border-primary rounded-100 form-control" placeholder="Masukkan NIK" aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    Lihat Hasil
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                


                </div>
</div>
                <!-- /.container-fluid -->
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>