
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
<footer class="footer">
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
            <!-- Loading Modal-->
    <!-- <div class="modal fade" id="loading" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-center" style="color: black; text-align:center" id="exampleModalLabel">Sedang merekam data Anda, mohon tunggu!!</h5>
                </div>
                <div class="modal-body"><img id="loading_gif" src="<?= base_url('assets/loading.gif');?>" width="100%"/></div>
            </div>
        </div>
    </div> -->

    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <script src="<?= base_url('assets/searchable/docsupport/jquery-3.2.1.min.js');?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/searchable/chosen.jquery.js');?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/searchable/docsupport/prism.js');?>" type="text/javascript" charset="utf-8"></script>
    <script src="<?= base_url('assets/searchable/docsupport/init.js');?>" type="text/javascript" charset="utf-8"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="<?= base_url('assets/layout/assets/node_modules/popper/popper.min.js');?>"></script>
    <script src="<?= base_url('assets/layout/assets/node_modules/bootstrap/dist/js/bootstrap.min.js');?>"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?= base_url('assets/layout/html/dist/js/perfect-scrollbar.jquery.min.js');?>"></script>
    <!--Wave Effects -->
    <script src="<?= base_url('assets/layout/html/dist/js/waves.js');?>"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url('assets/layout/html/dist/js/sidebarmenu.js');?>"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url('assets/layout/html/dist/js/custom.min.js');?>"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="<?= base_url('assets/layout/assets/node_modules/raphael/raphael-min.js');?>"></script>
    <script src="<?= base_url('assets/layout/assets/node_modules/morrisjs/morris.min.js');?>"></script>
    <script src="<?= base_url('assets/layout/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js');?>"></script>
    <!--c3 JavaScript -->
    <script src="<?= base_url('assets/layout/assets/node_modules/d3/d3.min.js');?>"></script>
    <script src="<?= base_url('assets/layout/assets/node_modules/c3-master/c3.min.js');?>"></script>
    <!-- Chart JS -->
    <script src="<?= base_url('assets/layout/html/dist/js/dashboard1.js');?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#dataTable').DataTable( {
        } );
            } );
    </script>
                                                    
    <script type="text/javascript"> 
        $(document).ready(function(){
            $('#submit').click(function (e) {
        // e.preventDefault();
        $('#loading').modal('show');
        });
            });
    </script>
</body>

</html>