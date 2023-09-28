<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}   

class Approver extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        //load model admin
        $this->load->model('M_Reviewer');
        $this->load->model('M_Komentator');
        $this->load->model('M_Login');
        $this->load->model('M_Kegiatan');
        $this->load->model('M_Notif');
        $current_user=$this->M_Login->is_role();
        //cek session dan level user
        if($this->M_Login->is_role() != "4"){
            redirect("welcome/");
        }
    }

    public function header()
    {
        $username = $this->session->userdata('username');
        $user = [
            // "tb_kegiatan.username"=>"$username",
            // "tb_kegiatan.jenis"=>"$jenis_rev",
            "tb_kegiatan.status"=>"1",
            ];
        $head['navbar_notif'] = $this->M_Kegiatan->get_where_kegiatan($user)->result();
        // print_r($data['navbar_notif']);
        $head['title'] = $this->title;
        $head['navbar'] = "app";
        $head['profile'] = (object) ["username"=>"approver", "nama"=>"Approver WCU"];
        $this->load->view('layout/header_main', $head);
        $this->load->view('function');
    }
    
    public function index()
    {
        // $data['jenis_kegiatan'] = $this->M_Kegiatan->get_jenis_kegiatan()->result();
        // $this->title = "Daftar Jenis Kegiatan";
        // $this->header();
        // $this->load->view('approver/daftar_kegiatan', $data);
        // $this->load->view("layout/footer_main");
        redirect(base_url('approver/all'));
    }

    public function need()
    {
        $id = $this->input->get('id');
        $username = $this->session->userdata('username');
        $user = [
            // "tb_kegiatan.username"=>"$username",
            "tb_kegiatan.jenis"=>"$id",
            "tb_kegiatan.status"=>"1",
            ];
        $data['view'] = $this->M_Kegiatan->get_where_kegiatan($user)->result();
        $data['jenis_kegiatan'] = $this->M_Kegiatan->get_jenis_kegiatan()->result();
        $this->title = "Daftar Pengajuan Kegiatan Perlu Segera Diproses";
        $this->header();
        if(empty($id)){
            $this->load->view('approver/jenis', $data);
        }
        else {
            $this->load->view('approver/daftar', $data);
        }
        $this->load->view("layout/footer_main");
    }

    public function need2()
    {
        $username = $this->session->userdata('username');
        $user = [
            // "tb_kegiatan.username"=>"$username",
            // "tb_kegiatan.jenis"=>"$jenis",
            "tb_kegiatan.status"=>"1",
            ];
        $data['view'] = $this->M_Kegiatan->get_where_kegiatan($user)->result();
        $data['jenis_kegiatan'] = $this->M_Kegiatan->get_jenis_kegiatan()->result();
        $this->title = "Daftar Pengajuan Kegiatan Perlu Segera Diproses";
        $this->header();
        $this->load->view('approver/daftar', $data);
        $this->load->view("layout/footer_main");
    }

    public function done()
    {
        $username = $this->session->userdata('username');
        $user = [
            // "tb_kegiatan.username"=>"$username",
            // "tb_kegiatan.jenis"=>"$jenis",
            "tb_kegiatan.status >"=>"1",
            ];
        $data['view'] = $this->M_Kegiatan->get_where_kegiatan($user)->result();
        $data['jenis_kegiatan'] = $this->M_Kegiatan->get_jenis_kegiatan()->result();
        $this->title = "Daftar Pengajuan Kegiatan Telah Selesai Diproses";
        $this->header();
        $this->load->view('approver/daftar', $data);
        $this->load->view("layout/footer_main");
    }

    public function all()
    {
        $username = $this->session->userdata('username');
        $data['view'] = $this->M_Kegiatan->get_all_kegiatan()->result();
        $data['jenis_kegiatan'] = $this->M_Kegiatan->get_jenis_kegiatan()->result();
        $this->title = "Semua Daftar Pengajuan Kegiatan";
        $this->header();
        $this->load->view('approver/daftar', $data);
        $this->load->view("layout/footer_main");
    }

    public function detail()
    {
        $username = $this->session->userdata('username');
        $id = $this->input->post('id');
        if (empty($id)){
            redirect(base_url("approver/all"));
        }
        $data_kegiatan = [
            "tb_kegiatan.id"=>"$id",
        ];
        $data_ext = [
            "id_kegiatan"=>"$id",
        ];
        $this->title = "Detail Pengajuan Kegiatan";
        $data['jenis_kegiatan'] = $this->M_Kegiatan->get_jenis_kegiatan()->result();
        $data['kegiatan'] = $this->M_Kegiatan->get_kegiatan($data_kegiatan)->row();
        $data['ext'] = $this->M_Kegiatan->get_where_ext($data_ext)->result();

        // print_r($data['ext']);
        $this->header();
        $this->load->view('detail',$data);
        $this->load->view('layout/footer_main');
    }

    public function edit_kegiatan()
    {
        $username = $this->session->userdata('username');
        $this->title = "Edit Pengajuan Kegiatan";
        $id = $this->input->post('id');
        if (empty($id)){
            redirect(base_url("approver/all"));
        }
        $data_kegiatan = [
            "tb_kegiatan.id"=>"$id",
        ];
        $data_ext = [
            "id_kegiatan"=>"$id",
        ];
        $data['link'] = "Approver";
        $data['jenis_kegiatan'] = $this->M_Kegiatan->get_jenis_kegiatan()->result();
        $data['kegiatan'] = $this->M_Kegiatan->get_kegiatan($data_kegiatan)->row();
        $this->header();
        if($data['kegiatan']->jenis==0 || $data['kegiatan']->jenis==1){
            $this->load->view('simple_edit_kegiatan',$data);
        }
        else {
            $data['ext'] = $this->M_Kegiatan->get_where_ext($data_ext)->result();
            $this->load->view('edit_kegiatan',$data);
        }
        $this->load->view('layout/footer_main');
    }

    public function update_kegiatan()
    {
        $username = $this->session->userdata('username');
        $id = $this->input->post('id');
        $judul = $this->input->post('judul');
        $total_anggaran = $this->input->post('total_anggaran');
        $total_anggaran = str_replace('.', '', $total_anggaran);
        $total_anggaran = str_replace(',', '', $total_anggaran);
        $jenis_kegiatan = $this->input->post('jenis');
        $tgl = date('Y-m-d', strtotime(date('Y-m-d')));

        $data_kegiatan = [
            // "jenis" => "$jenis_kegiatan",
            "total_anggaran" => "$total_anggaran",
            "judul" => "$judul",
            // "username" => "$username",
            // "tgl" => "$tgl",
            // "status" => "0",
        ];
        $cond = ["id"=>"$id"];
        $condext = ["id_kegiatan"=>"$id"];
        $this->M_Kegiatan->update_kegiatan($data_kegiatan, $cond);

        if ($jenis_kegiatan=="1" || $jenis_kegiatan=="2"){
            // DO NOTHING
        }
        else {
            $titel = $this->input->post('titel[]');
            $nama_depan = $this->input->post('nama_depan[]');
            $nama_belakang = $this->input->post('nama_belakang[]');
            $jabatan = $this->input->post('jabatan[]');
            $kepakaran = $this->input->post('kepakaran[]');
            $departemen = $this->input->post('departemen[]');
            $universitas = $this->input->post('universitas[]');
            $negara = $this->input->post('negara[]');
            $email = $this->input->post('email[]');

            $this->M_Kegiatan->del_ext_kegiatan($condext);

            for($i=0; $i<count($titel); $i++)
            {
                $data_ext = [
                    "id_kegiatan" => "$id",
                    "titel" => "$titel[$i]",
                    "nama_depan" => "$nama_depan[$i]",
                    "nama_belakang" => "$nama_belakang[$i]",
                    "jabatan" => "$jabatan[$i]",
                    "kepakaran" => "$kepakaran[$i]",
                    "departemen" => "$departemen[$i]",
                    "universitas" => "$universitas[$i]",
                    "negara" => "$negara[$i]",
                    "email" => "$email[$i]",
                 ];
    
                $this->M_Kegiatan->insert_ext_kegiatan($data_ext, $cek);
            }
            
        }

        $cond = [
            "id" => "$id",
        ];

         $file = $_FILES['file'];
            if(empty($file['name'])){}
                else{
                $config['upload_path'] = './assets/file';
                $config['encrypt_name'] = TRUE;
                $config['allowed_types'] = '*';

                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('file')){
                    echo "Upload Gagal"; die();
                } else {
                    $file=$this->upload->data('file_name');
                }
                $datafile = [
                "proposal"=>$file,];
                // $this->M_Pengaduan->update_pengaduan($datafile,$id);
                $this->M_Kegiatan->update_kegiatan($datafile, $cond);
            }
            $this->session->set_flashdata('info', '<div class="alert alert-success" style="margin-top: 3px">
            <div class="header"><b><i class="fa fa-exclamation-circle"></i> SUCCESS</b> Data berhasil direkam</div></div>');
            redirect(base_url("approver/all"));
    }

    public function approve()
    {
        $id = $this->input->post('id');
        $this->title = "Approve Pengajuan Kegiatan";
        if (empty($id)){
            redirect(base_url("Approver/all"));
        }
        $cek = ["id_kegiatan"=>$id];
        $round = $this->M_Reviewer->get_round_komentar($cek);
        $data_kegiatan = [
            "tb_kegiatan.id"=>"$id",
        ];
        $data_ext = [
            "id_kegiatan"=>"$id",
        ];
        $data_rev = [
            "id_kegiatan"=>"$id",
            "round"=>"$round",
        ];
        
        $data['anggaran'] = $this->M_Reviewer->get_anggaran($cek)->row();
        $data['jenis_kegiatan'] = $this->M_Kegiatan->get_jenis_kegiatan()->result();
        $data['kegiatan'] = $this->M_Kegiatan->get_kegiatan($data_kegiatan)->row();
        $data['ext'] = $this->M_Kegiatan->get_where_ext($data_ext)->result();
        $data['komentar'] = $this->M_Reviewer->get_komentar($data_rev)->row();
        $data['comments'] = $this->M_Komentator->get_komentar($data_ext)->row();
        $data['review'] = $this->M_Reviewer->get_review($data_rev)->result();
        $this->header();
        $this->load->view('approver/approve',$data);
        $this->load->view('layout/footer_main');
    }

    public function rekomendasi()
    {
        $username = $this->session->userdata('username');
        $date = date('Y-m-d');
        $id_kegiatan = $this->input->post('id',true);
        $id_komentar =$this->input->post('id_komentar',true);
        $komentar = $this->input->post('komentar',true);
        $keputusan = $this->input->post('keputusan',true);
        $cek = ["id_kegiatan"=>$id_kegiatan];

        $round = $this->M_Reviewer->get_round_komentar($cek);

        $approve = [
            "id_kegiatan"=>$id_kegiatan,
            "id_komentar"=>$id_komentar,
            "keputusan"=>$keputusan,
            "komentar"=>$komentar,
            "tgl"=>$date,
            "round"=>$round,
        ];
        // print_r($approve);
        if($keputusan==4 || $keputusan==3){
            $status = 0;
        }
        else {
            $status = 2;
        }
        $status = [
            "status"=>"$status",
        ];
        $this->M_Reviewer->insert_approver($approve);
        $this->M_Reviewer->update_status($id_kegiatan, $status);
        $this->session->set_flashdata('info', '<div class="alert alert-success" style="margin-top: 3px">
            <div class="header"><b><i class="fa fa-exclamation-circle"></i> SUCCESS</b> Data berhasil direkam</div></div>');
            redirect(base_url("approver/all"));
    }

    public function cancel()
    {
        $username = $this->session->userdata('username');
        $date = date('Y-m-d');
        $id_kegiatan = $this->input->post('id',true);
        $cek = ["id_kegiatan"=>$id_kegiatan];

        $status = [
            "status"=>"1",
        ];
        $this->M_Reviewer->delete_approver($cek);
        $this->M_Reviewer->update_status($id_kegiatan, $status);
        $this->session->set_flashdata('info', '<div class="alert alert-success" style="margin-top: 3px">
            <div class="header"><b><i class="fa fa-exclamation-circle"></i> SUCCESS</b> Data berhasil direkam</div></div>');
            redirect(base_url("approver/all"));
    }

    public function export()
    {
        $fileName = 'Kegiatan';  
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $rows = 3;
        $column = "L";
        $sheet->setCellValue('A'.$rows, "REKAP");
        $sheet->setCellValue('B'.$rows, "KEGIATAN");
        $rows++;
        $sheet->setCellValue('A5', 'No');
        $sheet->setCellValue('B5', 'NIP/NIM');
        $sheet->setCellValue('C5', 'Nama Lengkap');
        $sheet->setCellValue('D5', 'email');
        $sheet->setCellValue('E5', 'No. HP');
        $sheet->setCellValue('F5', 'Fakultas');
        $sheet->setCellValue('G5', 'Departemen');
        $sheet->setCellValue('H5', 'Unit');
        $sheet->setCellValue('I5', 'Jenis Kegiatan');
        $sheet->setCellValue('J5', 'Judul Kegiatan');
        $sheet->setCellValue('K5', 'Status');
        $sheet->setCellValue('L5', 'Komentar Approver');
        $sheet->setCellValue('M5', 'Tgl Approver');
        $sheet->setCellValue('N5', 'Total Anggaran');
        $sheet->setCellValue('O5', 'Titel Professor 1');
        $sheet->setCellValue('P5', 'Nama Depan Professor 1');
        $sheet->setCellValue('Q5', 'Nama Belakang Professor 1');
        $sheet->setCellValue('R5', 'Jabatan Professor 1');
        $sheet->setCellValue('S5', 'Kepakaran Professor 1');
        $sheet->setCellValue('T5', 'Departemen Professor 1');
        $sheet->setCellValue('U5', 'Universitas Professor 1');
        $sheet->setCellValue('V5', 'Negara Professor 1');
        $sheet->setCellValue('W5', 'Email Professor 1');
        $sheet->setCellValue('X5', 'Titel Professor 2');
        $sheet->setCellValue('Y5', 'Nama Depan Professor 2');
        $sheet->setCellValue('Z5', 'Nama Belakang Professor 2');
        $sheet->setCellValue('AA5', 'Jabatan Professor 2');
        $sheet->setCellValue('AB5', 'Kepakaran Professor 2');
        $sheet->setCellValue('AC5', 'Departemen Professor 2');
        $sheet->setCellValue('AD5', 'Universitas Professor 2');
        $sheet->setCellValue('AR5', 'Negara Professor 2');
        $sheet->setCellValue('AF5', 'Email Professor 2');
        $sheet->setCellValue('AG5', 'Titel Professor 3');
        $sheet->setCellValue('AH5', 'Nama Depan Professor 3');
        $sheet->setCellValue('AI5', 'Nama Belakang Professor 3');
        $sheet->setCellValue('AJ5', 'Jabatan Professor 3');
        $sheet->setCellValue('AK5', 'Kepakaran Professor 3');
        $sheet->setCellValue('AL5', 'Departemen Professor 3');
        $sheet->setCellValue('AM5', 'Universitas Professor 3');
        $sheet->setCellValue('AN5', 'Negara Professor 3');
        $sheet->setCellValue('AO5', 'Email Professor 3');
        $sheet->setCellValue('AP5', 'Titel Professor 4');
        $sheet->setCellValue('AQ5', 'Nama Depan Professor 4');
        $sheet->setCellValue('AR5', 'Nama Belakang Professor 4');
        $sheet->setCellValue('AS5', 'Jabatan Professor 4');
        $sheet->setCellValue('AT5', 'Kepakaran Professor 4');
        $sheet->setCellValue('AU5', 'Departemen Professor 4');
        $sheet->setCellValue('AV5', 'Universitas Professor 4');
        $sheet->setCellValue('AW5', 'Negara Professor 4');
        $sheet->setCellValue('AX5', 'Email Professor 4');
        $sheet->setCellValue('AY5', 'Titel Professor 5');
        $sheet->setCellValue('AZ5', 'Nama Depan Professor 5');
        $sheet->setCellValue('BA5', 'Nama Belakang Professor 5');
        $sheet->setCellValue('BB5', 'Jabatan Professor 5');
        $sheet->setCellValue('BC5', 'Kepakaran Professor 5');
        $sheet->setCellValue('BD5', 'Departemen Professor 5');
        $sheet->setCellValue('BE5', 'Universitas Professor 5');
        $sheet->setCellValue('BF5', 'Negara Professor 5');
        $sheet->setCellValue('BG5', 'Email Professor 5');
        $sheet->setCellValue('BH5', 'Titel Professor 6');
        $sheet->setCellValue('BI5', 'Nama Depan Professor 6');
        $sheet->setCellValue('BJ5', 'Nama Belakang Professor 6');
        $sheet->setCellValue('BK5', 'Jabatan Professor 6');
        $sheet->setCellValue('BL5', 'Kepakaran Professor 6');
        $sheet->setCellValue('BM5', 'Departemen Professor 6');
        $sheet->setCellValue('BN5', 'Universitas Professor 6');
        $sheet->setCellValue('BO5', 'Negara Professor 6');
        $sheet->setCellValue('BP5', 'Email Professor 6');
        $sheet->setCellValue('BQ5', 'Titel Professor 7');
        $sheet->setCellValue('BR5', 'Nama Depan Professor 7');
        $sheet->setCellValue('BS5', 'Nama Belakang Professor 7');
        $sheet->setCellValue('BT5', 'Jabatan Professor 7');
        $sheet->setCellValue('BU5', 'Kepakaran Professor 7');
        $sheet->setCellValue('BV5', 'Departemen Professor 7');
        $sheet->setCellValue('BW5', 'Universitas Professor 7');
        $sheet->setCellValue('BX5', 'Negara Professor 7');
        $sheet->setCellValue('BY5', 'Email Professor 7');
        $sheet->setCellValue('BZ5', 'Titel Professor 8');
        $sheet->setCellValue('CA5', 'Nama Depan Professor 8');
        $sheet->setCellValue('CB5', 'Nama Belakang Professor 8');
        $sheet->setCellValue('CC5', 'Jabatan Professor 8');
        $sheet->setCellValue('CD5', 'Kepakaran Professor 8');
        $sheet->setCellValue('CR5', 'Departemen Professor 8');
        $sheet->setCellValue('CF5', 'Universitas Professor 8');
        $sheet->setCellValue('CG5', 'Negara Professor 8');
        $sheet->setCellValue('CH5', 'Email Professor 8');
        $sheet->setCellValue('CI5', 'Titel Professor 9');
        $sheet->setCellValue('CJ5', 'Nama Depan Professor 9');
        $sheet->setCellValue('CK5', 'Nama Belakang Professor 9');
        $sheet->setCellValue('CL5', 'Jabatan Professor 9');
        $sheet->setCellValue('CM5', 'Kepakaran Professor 9');
        $sheet->setCellValue('CN5', 'Departemen Professor 9');
        $sheet->setCellValue('CO5', 'Universitas Professor 9');
        $sheet->setCellValue('CP5', 'Negara Professor 9');
        $sheet->setCellValue('CQ5', 'Email Professor 9');
        $sheet->setCellValue('CR5', 'Titel Professor 10');
        $sheet->setCellValue('CS5', 'Nama Depan Professor 10');
        $sheet->setCellValue('CT5', 'Nama Belakang Professor 10');
        $sheet->setCellValue('CU5', 'Jabatan Professor 10');
        $sheet->setCellValue('CV5', 'Kepakaran Professor 10');
        $sheet->setCellValue('CW5', 'Departemen Professor 10');
        $sheet->setCellValue('CX5', 'Universitas Professor 10');
        $sheet->setCellValue('CY5', 'Negara Professor 10');
        $sheet->setCellValue('CZ5', 'Email Professor 10');
        $v = $this->M_Kegiatan->get_exp_kegiatan()->result();

        
        $no = 1;
        $rows = 6;

        for ($i=0; $i<count($v); $i++){
            if(($v[$i]->status)==0){
                $anggaran_disetujui="-";
                if(empty($v[$i]->keputusan)){
                    $status="Kegiatan diajukan, menunggu di-review";
                }
                else{
                    if(($v[$i]->keputusan==3)){
                        $status = "Kegiatan dipertimbangkan untuk batch selanjutnya";
                    }
                    elseif(($v[$i]->keputusan==4)){
                        $status = "Kegiatan diitolak";
                    }
                }
            }
            elseif(($v[$i]->status)==1){
                $anggaran_disetujui="-";
                $status="Kegiatan telah di-review menuggu di-approve";
            }
            elseif(($v[$i]->status)==2){
                if($v[$i]->keputusan==1){
                    $status="Kegiatan diterima";
                }
                elseif($v[$i]->keputusan==2){
                    $status="Kegiatan diterima dengan perbaikan (maksimal 1 minggu)";
                    // $v->status=0;
                }
                elseif($v[$i]->keputusan==3){
                    $status="Kegiatan dipertimbangkan untuk batch selanjutnya";
                }
                elseif($v[$i]->keputusan==4){
                    $status="Kegiatan ditolak";
                }
            }
            $sheet->setCellValue('A'.$rows, $no++);
            $sheet->setCellValue('B'.$rows, "'".$v[$i]->user);
            $sheet->setCellValue('C'.$rows, $v[$i]->nama_pengusul);
            $sheet->setCellValue('D'.$rows, $v[$i]->email);
            $sheet->setCellValue('E'.$rows, "'".$v[$i]->no_hp);
            $sheet->setCellValue('F'.$rows, $v[$i]->fak);
            $sheet->setCellValue('G'.$rows, $v[$i]->departemen);
            $sheet->setCellValue('H'.$rows, $v[$i]->unit);
            $sheet->setCellValue('I'.$rows, $v[$i]->jenis_kegiatan);
            $sheet->setCellValue('J'.$rows, $v[$i]->judul);
            $sheet->setCellValue('K'.$rows, $status);
            $sheet->setCellValue('L'.$rows, $v[$i]->komen_ap);
            $sheet->setCellValue('M'.$rows, $v[$i]->tgl_ap);
            $sheet->setCellValue('N'.$rows, "'".$v[$i]->total_anggaran);

            $set = "O";
            // $id_kegiatan = ["tb_ext.id_kegiatan" => $v[$i]->id_keg];

            $e = $this->M_Kegiatan->get_where_ext_ok($v[$i]->id)->result(); 
            if(!empty($e)){
            // print_r($e); 
                for($j=0; $j<count($e); $j++){
                $sheet->setCellValue($set.$rows, $e[$j]->titel);
                $set++;
                $sheet->setCellValue($set.$rows, $e[$j]->nama_depan);
                $set++;
                $sheet->setCellValue($set.$rows, $e[$j]->nama_belakang);
                $set++;
                $sheet->setCellValue($set.$rows, $e[$j]->jabatan);
                $set++;
                $sheet->setCellValue($set.$rows, $e[$j]->kepakaran);
                $set++;
                $sheet->setCellValue($set.$rows, $e[$j]->departemen);
                $set++;
                $sheet->setCellValue($set.$rows, $e[$j]->universitas);
                $set++;
                $sheet->setCellValue($set.$rows, $e[$j]->negara);
                $set++;
                $sheet->setCellValue($set.$rows, $e[$j]->email);
                $set++;
                }
            }
            

            $rows++;
            
        }

        $writer = new Xlsx($spreadsheet);
        // $filename = 'laporan-siswa';
        
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $fileName .'.xlsx"'); 
        header('Cache-Control: max-age=0');

        $writer->save('php://output');

    }

    public function delete_kegiatan(){
        $id = $this->input->post('id');
        $this->M_Kegiatan->del_kegiatan(array("id"=>$id));
        $this->M_Kegiatan->del_ext_kegiatan(array("id_kegiatan"=>$id));
        $this->session->set_flashdata('info', '<div class="alert alert-success" style="margin-top: 3px">
            <div class="header"><b><i class="fa fa-exclamation-circle"></i> SUCCESS</b> Data berhasil dihapus</div></div>');
            redirect(base_url("approver/all"));
    }

    public function monev()
    {
        // $username = $this->session->userdata('username');
        $id = $this->input->post('id');
        if(empty($id)){
            redirect(base_url('User/input'));
        };
        $data_kegiatan = [
            "tb_kegiatan.id"=>"$id",
        ];
        $data_ext = [
            "id_kegiatan"=>"$id",

        ];
        $check = $this->M_Kegiatan->check_empty_monev($data_ext);
        if($check==1){
            $data['monev'] = $this->M_Kegiatan->get_where_monev($data_ext)->row();
        }
        $data['kegiatan'] = $this->M_Kegiatan->get_kegiatan($data_kegiatan)->row();
        $data['ext'] = $this->M_Kegiatan->get_where_ext($data_ext)->result();
        $this->title = "Monitoring & Evaluasi";
        $this->header();
        $this->load->view('edit_monev',$data);
        $this->load->view('layout/footer_main');
    }

}