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

class Reviewer extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        //load model admin
        $this->load->model('M_Akun');
        $this->load->model('M_Login');
        $this->load->model('M_Reviewer');
        $this->load->model('M_Kegiatan');
        $this->load->model('M_Notif');
        $current_user=$this->M_Login->is_role();
        //cek session dan level user
        if($this->M_Login->is_role() != "3"){
            redirect("welcome/");
        }
    }

    public function header()
    {
        $username = $this->session->userdata('username');
        $jenis_rev = $this->M_Akun->get_jenis($username)->row()->id_jenis_kegiatan;
        $user = [
            // "tb_kegiatan.username"=>"$username",
            "tb_kegiatan.jenis"=>"$jenis_rev",
            "tb_kegiatan.status"=>"0",
            ];
        $nama = $this->M_Akun->get_jenis_kegiatan($jenis_rev)->row()->nama;
        $head['navbar_notif'] = $this->M_Kegiatan->get_where_kegiatan($user)->result();
        // print_r($data['navbar_notif']);
        $head['title'] = $this->title;
        $head['navbar'] = "rev";
        $head['profile'] = (object) ["username"=>"$username", "nama"=>"$nama"];
        $this->load->view('layout/header_main', $head);
        $this->load->view('function');
    }
    
    public function index()
    {
        redirect(base_url('reviewer/all'));
        
    }

    public function need()
    {
        $username = $this->session->userdata('username');
        $jenis = $this->M_Akun->get_jenis($username)->row()->id_jenis_kegiatan;
        $user = [
            // "tb_kegiatan.username"=>"$username",
            "tb_kegiatan.jenis"=>"$jenis",
            "tb_kegiatan.status"=>"0",
            ];
        $data['view'] = $this->M_Kegiatan->get_where_kegiatan($user)->result();
        $data['jenis_kegiatan'] = $this->M_Kegiatan->get_jenis_kegiatan()->result();
        $this->title = "Daftar Pengajuan Kegiatan Perlu Segera Diproses";
        $this->header();
        $this->load->view('reviewer/daftar', $data);
        $this->load->view("layout/footer_main");
    }

    public function done()
    {
        $username = $this->session->userdata('username');
        $jenis = $this->M_Akun->get_jenis($username)->row()->id_jenis_kegiatan;
        $user = [
            // "tb_kegiatan.username"=>"$username",
            "tb_kegiatan.jenis"=>"$jenis",
            "tb_kegiatan.status >"=>"0",
            ];
        $data['view'] = $this->M_Kegiatan->get_where_kegiatan($user)->result();
        $data['jenis_kegiatan'] = $this->M_Kegiatan->get_jenis_kegiatan()->result();
        $this->title = "Daftar Pengajuan Kegiatan Telah Selesai Diproses";
        $this->header();
        $this->load->view('reviewer/daftar', $data);
        $this->load->view("layout/footer_main");
    }

    public function all()
    {
        $username = $this->session->userdata('username');
        $jenis = $this->M_Akun->get_jenis($username)->row()->id_jenis_kegiatan;
        $user = [
            "tb_kegiatan.jenis"=>"$jenis",
            ];
        $data['view'] = $this->M_Kegiatan->get_where_kegiatan($user)->result();
        $data['jenis_kegiatan'] = $this->M_Kegiatan->get_jenis_kegiatan()->result();
        $this->title = "Semua Daftar Pengajuan Kegiatan";
        $this->header();
        $this->load->view('reviewer/daftar', $data);
        $this->load->view("layout/footer_main");
    }

    // public function daftar()
    // {
    //     $username = $this->session->userdata('username');
    //     $jenis = $this->M_Akun->get_jenis($username)->row()->id_jenis_kegiatan;
    //     print_r($jenis);
    //     $data['view'] = $this->M_Kegiatan->get_all_kegiatan_reviewer($jenis)->result();
    //     // print_r($data['view']);
    //     $this->header();
    //     $this->load->view('reviewer/daftar', $data);
    //     $this->load->view("layout/footer");
    // }

    public function detail()
    {
        $username = $this->session->userdata('username');
        $id = $this->input->post('id');
        if (empty($id)){
            redirect(base_url("Reviewer/all"));
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

    public function review()
    {
        $id = $this->input->post('id');
        $this->title = "Review Pengajuan Kegiatan";
        if (empty($id)){
            redirect(base_url("Reviewer/all"));
        }
        $data_kegiatan = [
            "tb_kegiatan.id"=>"$id",
        ];
        $data_ext = [
            "id_kegiatan"=>"$id",
        ];
        $data['jenis_kegiatan'] = $this->M_Kegiatan->get_jenis_kegiatan()->result();
        $data['kegiatan'] = $this->M_Kegiatan->get_kegiatan($data_kegiatan)->row();
        $data['ext'] = $this->M_Kegiatan->get_where_ext($data_ext)->result();

        // print_r($data['ext']);
        $this->header();
        $this->load->view('reviewer/review',$data);
        $this->load->view('layout/footer_main');
    }

    public function edit_review()
    {
        $id = $this->input->post('id');
        if (empty($id)){
            redirect(base_url("Reviewer/all"));
        }
        $this->title = "Edit Review Pengajuan Kegiatan";
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
        $data['review'] = $this->M_Reviewer->get_review($data_rev)->result();
        $this->header();
        $this->load->view('reviewer/edit_review',$data);
        $this->load->view('layout/footer_main');
    }

    public function edit_kegiatan()
    {
        $username = $this->session->userdata('username');
        $this->title = "Edit Pengajuan Kegiatan";
        $id = $this->input->post('id');
        if (empty($id)){
            redirect(base_url("reviewer/all"));
        }
        $data_kegiatan = [
            "tb_kegiatan.id"=>"$id",
        ];
        $data_ext = [
            "id_kegiatan"=>"$id",
        ];
        $data['link'] = "Reviewer";
        $data['jenis_kegiatan'] = $this->M_Kegiatan->get_jenis_kegiatan()->result();
        $data['kegiatan'] = $this->M_Kegiatan->get_kegiatan($data_kegiatan)->row();
        $data['ext'] = $this->M_Kegiatan->get_where_ext($data_ext)->result();
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
            redirect(base_url("Reviewer/all"));
    }

    public function insertReview()
    {
        $username = $this->session->userdata('username');
        $date = date('Y-m-d');
        $id = $this->input->post('id',true);
        $anggaran_disetujui = $this->input->post('anggaran_disetujui',true);
        $anggaran_disetujui = str_replace('.', '', $anggaran_disetujui);
        $anggaran_disetujui = str_replace(',', '', $anggaran_disetujui);
        $skor1=$this->input->post('skor1',true);
        $skor2=$this->input->post('skor2',true);
        $skor3=$this->input->post('skor3',true);
        $skor4=$this->input->post('skor4',true);
        $nilai1=$this->input->post('nilai1',true);
        $nilai2=$this->input->post('nilai2',true);
        $nilai3=$this->input->post('nilai3',true);
        $nilai4=$this->input->post('nilai4',true);
        $totalnilai=$this->input->post('totalnilai',true);
        $komentar=$this->input->post('komentar',true);

        $cek = ["id_kegiatan"=>$id];

        $round = $this->M_Reviewer->get_round_komentar($cek);
        $new_round = (int)$round+1;
        $data_komentar = [
            "id_kegiatan"=>$id,
            "nilai_total"=>$totalnilai,
            "komentar"=>$komentar,
            "tgl"=>$date,
            "round"=>$new_round,
        ];
        $this->M_Reviewer->insert_komentar($data_komentar);

        $data_anggaran = [
            "id_kegiatan"=>$id,
            "anggaran"=>"$anggaran_disetujui",
            "round"=>$new_round,
        ];

        $this->M_Reviewer->insert_anggaran($data_anggaran);

        for ($i=1; $i<5; $i++){
        $review = [
            "id_kegiatan"=>$id,
            "komponen"=>$i,
            "skor"=>${"skor".$i},
            "nilai"=>${"nilai".$i},
            "tgl"=>"$date",
            "round"=>$new_round,
        ];
        $this->M_Reviewer->insert_review($review);

        $status = [
            "status"=>"1",
        ];

        };
        $this->M_Reviewer->update_status($id, $status);
        $this->session->set_flashdata('info', '<div class="alert alert-success" style="margin-top: 3px">
            <div class="header"><b><i class="fa fa-exclamation-circle"></i> SUCCESS</b> Data berhasil direkam</div></div>');
            redirect(base_url("Reviewer/all"));
    }

    public function updateReview()
    {
        $username = $this->session->userdata('username');
        $date = date('Y-m-d');
        $id = $this->input->post('id',true);
        $anggaran_disetujui = $this->input->post('anggaran_disetujui',true);
        $anggaran_disetujui = str_replace('.', '', $anggaran_disetujui);
        $anggaran_disetujui = str_replace(',', '', $anggaran_disetujui);
        $skor1=$this->input->post('skor1',true);
        $skor2=$this->input->post('skor2',true);
        $skor3=$this->input->post('skor3',true);
        $skor4=$this->input->post('skor4',true);
        $nilai1=$this->input->post('nilai1',true);
        $nilai2=$this->input->post('nilai2',true);
        $nilai3=$this->input->post('nilai3',true);
        $nilai4=$this->input->post('nilai4',true);
        $totalnilai=$this->input->post('totalnilai',true);
        $komentar=$this->input->post('komentar',true);
        
        $cek = ["id_kegiatan"=>$id];

        $round = $this->M_Reviewer->get_round_komentar($cek);
        $new_round = (int)$round+1;

        $id_cek = ["id_kegiatan"=>"$id", "round"=>"$round"];

        $this->M_Reviewer->del_komentar($id_cek);
        $this->M_Reviewer->del_review($id_cek);
        $this->M_Reviewer->del_anggaran($id_cek);

        $data_komentar = [
            "id_kegiatan"=>$id,
            "nilai_total"=>$totalnilai,
            "komentar"=>$komentar,
            "tgl"=>$date,
            "round"=>$new_round,
        ];
        $this->M_Reviewer->insert_komentar($data_komentar);

        $data_anggaran = [
            "id_kegiatan"=>$id,
            "anggaran"=>"$anggaran_disetujui",
            "round"=>$new_round,
        ];

        $this->M_Reviewer->insert_anggaran($data_anggaran);

        for ($i=1; $i<5; $i++){
        $review = [
            "id_kegiatan"=>$id,
            "komponen"=>$i,
            "skor"=>${"skor".$i},
            "nilai"=>${"nilai".$i},
            "tgl"=>"$date",
            "round"=>$new_round,
        ];
        $this->M_Reviewer->insert_review($review);

        $status = [
            "status"=>"1",
        ];

        };
        $this->M_Reviewer->update_status($id, $status);
        $this->session->set_flashdata('info', '<div class="alert alert-success" style="margin-top: 3px">
            <div class="header"><b><i class="fa fa-exclamation-circle"></i> SUCCESS</b> Data berhasil direkam</div></div>');
            redirect(base_url("Reviewer/all"));
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