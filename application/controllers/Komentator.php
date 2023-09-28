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

class Komentator extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        //load model admin
        $this->load->model('M_Akun');
        $this->load->model('M_Login');
        $this->load->model('M_Komentator');
        $this->load->model('M_Kegiatan');
        $this->load->model('M_Notif');
        $current_user=$this->M_Login->is_role();
        //cek session dan level user
        if($this->M_Login->is_role() != "5"){
            redirect("welcome/");
        }
    }

    public function header()
    {
        $username = $this->session->userdata('username');
        $jenis_rev = $this->M_Akun->get_jenis_c($username)->row()->id_jenis_kegiatan;
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
        redirect(base_url('komentator/all'));
        
    }

    public function need()
    {
        $username = $this->session->userdata('username');
        $jenis = $this->M_Akun->get_jenis_c($username)->row()->id_jenis_kegiatan;
        $user = [
            // "tb_kegiatan.username"=>"$username",
            "tb_kegiatan.jenis"=>"$jenis",
            "tb_kegiatan.status"=>"0",
            ];
        $data['view'] = $this->M_Kegiatan->get_where_kegiatan($user)->result();
        $data['jenis_kegiatan'] = $this->M_Kegiatan->get_jenis_kegiatan()->result();
        $this->title = "Daftar Pengajuan Kegiatan Perlu Segera Diproses";
        $this->header();
        $this->load->view('komentator/daftar', $data);
        $this->load->view("layout/footer_main");
    }

    public function done()
    {
        $username = $this->session->userdata('username');
        $jenis = $this->M_Akun->get_jenis_c($username)->row()->id_jenis_kegiatan;
        $user = [
            // "tb_kegiatan.username"=>"$username",
            "tb_kegiatan.jenis"=>"$jenis",
            "tb_kegiatan.status >"=>"0",
            ];
        $data['view'] = $this->M_Kegiatan->get_where_kegiatan($user)->result();
        $data['jenis_kegiatan'] = $this->M_Kegiatan->get_jenis_kegiatan()->result();
        $this->title = "Daftar Pengajuan Kegiatan Telah Selesai Diproses";
        $this->header();
        $this->load->view('komentator/daftar', $data);
        $this->load->view("layout/footer_main");
    }

    public function all()
    {
        $username = $this->session->userdata('username');
        $jenis = $this->M_Akun->get_jenis_c($username)->row()->id_jenis_kegiatan;
        $user = [
            "tb_kegiatan.jenis"=>"$jenis",
            ];
        $data['view'] = $this->M_Kegiatan->get_where_kegiatan($user)->result();
        $data['jenis_kegiatan'] = $this->M_Kegiatan->get_jenis_kegiatan()->result();
        $this->title = "Semua Daftar Pengajuan Kegiatan";
        $this->header();
        $this->load->view('komentator/daftar', $data);
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
            redirect(base_url("komentator/all"));
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

    public function komentar()
    {
        $id = $this->input->post('id');
        $this->title = "Komentar Kegiatan";
        if (empty($id)){
            redirect(base_url("komentator/all"));
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
        $this->load->view('komentator/komentar',$data);
        $this->load->view('layout/footer_main');
    }

    public function edit_komentar()
    {
        $id = $this->input->post('id');
        if (empty($id)){
            redirect(base_url("komentator/all"));
        }
        $this->title = "Edit Review Pengajuan Kegiatan";
        $cek = ["id_kegiatan"=>$id];
        $data_kegiatan = [
            "tb_kegiatan.id"=>"$id",
        ];
        $data_ext = [
            "id_kegiatan"=>"$id",
        ];
        $data_rev = [
            "id_kegiatan"=>"$id",
        ];
        $data['jenis_kegiatan'] = $this->M_Kegiatan->get_jenis_kegiatan()->result();
        $data['kegiatan'] = $this->M_Kegiatan->get_kegiatan($data_kegiatan)->row();
        $data['ext'] = $this->M_Kegiatan->get_where_ext($data_ext)->result();
        $data['komentar'] = $this->M_Komentator->get_komentar($data_rev)->row();
        $this->header();
        $this->load->view('komentator/edit_komentar',$data);
        $this->load->view('layout/footer_main');
    }

    public function insertKomentar()
    {
        $username = $this->session->userdata('username');
        $date = date('Y-m-d');
        $id = $this->input->post('id',true);
        $komentar=$this->input->post('komentar',true);
        $cek = ["id_kegiatan"=>$id];
        $data_komentar = [
            "id_kegiatan"=>$id,
            "komentar"=>$komentar,
            "tgl"=>$date,
        ];
        $this->M_Komentator->insert_komentar($data_komentar);
        $this->session->set_flashdata('info', '<div class="alert alert-success" style="margin-top: 3px">
            <div class="header"><b><i class="fa fa-exclamation-circle"></i> SUCCESS</b> Data berhasil direkam</div></div>');
            redirect(base_url("komentator/all"));
    }

    public function updateKomentar()
    {
        $username = $this->session->userdata('username');
        $date = date('Y-m-d');
        $id = $this->input->post('id',true);
        $komentar=$this->input->post('komentar',true);
        
        $cek = ["id_kegiatan"=>$id];

        $this->M_Komentator->del_komentar($cek);

        $data_komentar = [
            "id_kegiatan"=>$id,
            "komentar"=>$komentar,
            "tgl"=>$date,
        ];
        $this->M_Komentator->insert_komentar($data_komentar);
        $this->session->set_flashdata('info', '<div class="alert alert-success" style="margin-top: 3px">
            <div class="header"><b><i class="fa fa-exclamation-circle"></i> SUCCESS</b> Data berhasil direkam</div></div>');
            redirect(base_url("komentator/all"));
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