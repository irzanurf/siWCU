<!-- Begin Page Content -->
                <div class="container-fluid" style="height: 60%; background-image: url('<?= base_url('assets/bg.jpg');?>'); height: 100%; background-position: center; background-repeat: no-repeat;background-size: cover;">
                <div class="row" style="display: flex; justify-content: flex-end">
                <ul class="nav navbar-nav float-right">
                <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">             <span class="avatar"><img src="<?= base_url('assets/condition.png');?>" alt="avatar"><i></i></span></a>
                    <div class="dropdown-menu dropdown-menu-right" style="transform: translate3d(18rem, 44px, 0px); min-width:20rem; margin-right:10px">
                    <div class="arrow_box_right">
                        <a href="#">
                        <form method="POST" action="<?php echo base_url() ?>index.php/Welcome" style="margin-top: 1.5rem;">
                                 <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
                                    <div class="row" style="margin-left:1rem; margin-right:1rem">
                                         <label for="">Username</label>
                                             <div class="input-group mb-3">
                                              <div class="input-group-prepend">
                                              </div>
                                              <input name="username" type="text" class="form-control form-control-sm" placeholder="Enter Username" aria-label="Username" aria-describedby="basic-addon1" required>
                                              
                                         </div>
                                    </div>
                                     <div class="row" style="margin-left:1rem; margin-right:1rem">
                                         <label for="">Password</label>
                                             <div class="input-group mb-3">
                                              <div class="input-group-prepend">
                                              </div>
                                              <input name="password" type="password" class="form-control form-control-sm" placeholder="Enter Password" aria-label="Username" aria-describedby="basic-addon1" required>
                                         </div>
                                    </div>
                                    
                                    <div class="row" style="margin-left:1rem; margin-right:1rem">
                                    <button type="submit" class="btn btn-success" style="width: 100%; margin-top:1rem">Login</button>
                                    </div>
                            </form></a>
                    </div>
                    </div>
                </li>
                </ul>
                </div>
                <div style="height: auto;
                            display: flex;
                            justify-content: center;
                            align-items: center;">
                    <form style="width: 600px; padding-top:4rem; padding-bottom:10rem" method="GET" action="<?= base_url('Sk/data_covid');?>">
                        <div style="padding-bottom: 10px; text-align:center">
                            <img class="profile-img-card" src="<?php echo base_url('assets/main/images/ico/puskesmas.png'); ?>" width="210" height="250" alt="logo">
                            <h1 style="color: white; font-weight:bold">Puskesmas Halmahera</h1>
                        </div>
                        <div class="alert alert-success" style="margin-top: 3px">
                            <div class="header"><b> Berhasil</b> Silahkan masukkan nomor HP</div>
                        </div>
                        <div class="input-group">
                            <input type="hidden" name="nik" id="nik" class="border border-primary rounded-100 form-control" value="<?=$nik?>" aria-label="Search" aria-describedby="basic-addon2">
                            <input type="number" name="no_hp" id="no_hp" class="border border-primary rounded-100 form-control" placeholder="Masukkan No. HP" aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <!-- <button type="hidden" class="btn btn-primary" type="submit">
                                    Lihat Hasil
                                </button> -->
                            </div>
                        </div>
                    </form>
                </div>

                


                </div>
</div>