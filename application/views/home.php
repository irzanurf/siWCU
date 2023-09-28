<div class="row">
    <div class="col-lg-12">
        <div class="card oh">
            <div class="card-body">
                <div class="align-items-center">
                    <h2 class="card-title text-center" style="text-align: center; color:black"><i
                            class="fa fa-bullhorn"></i> PENGUMUMAN <i class="fa fa-bullhorn"></i></h2>
                    <div class="ml-auto">
                    </div>
                </div>
            </div>
            <div class="card-body bg-light">
                <div class="row text-center m-b-20">
                    <!-- <?php foreach($berita as $b){ 
                                    $tgl = date('d-m-Y', strtotime($b->tgl));?> -->
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td align="left">
                                    <!-- <?php ?>
                                                <h3><center><?=$b->judul?></center></h3>
                                                <i class="fa fa-bullhorn"></i> <?=$tgl?> &nbsp;&nbsp;
                                                <?php if(($b->jenis)=="1") : ?>
                                                <i class="fa fa-tags"></i> Penelitian
                                                <?php elseif(($b->jenis)=="2") : ?>
                                                <i class="fa fa-tags"></i> Pengabdian
                                                <?php else : ?>
                                                <i class="fa fa-tags"></i> PKM
                                                <?php endif; ?><hr>
                                                <?=$b->berita?> -->
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- <?php } ?> -->
                </div>
            </div>
        </div>
    </div>

</div>

<?php if(!empty($this->session->flashdata('info')) || ($this->session->flashdata('info')!='')){ ?>
<!-- Tambah Modal -->
<div class="modal fade" id="alert" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg show">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color: red; font-weight:bold;">
                    </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            <?php if($this->session->flashdata('info')){echo $this->session->flashdata('info');}?>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#alert').modal('show');
});
</script>

<?php } ?>
<?php
$this->session->set_flashdata('info','' );
?>