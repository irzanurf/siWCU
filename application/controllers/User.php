<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
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

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        //load model admin
        $this->load->model('M_Login');
        $this->load->model('M_Kegiatan');
        $this->load->model('M_Akun');
        $current_user=$this->M_Login->is_role();
        //cek session dan level user
        if($this->M_Login->is_role() != "1"){
            redirect("welcome/");
        }
    }

    public function index()
    {
        $username = $this->session->userdata('username');
        // $data['view'] = $this->M_Pengumuman->get_pengumuman()->result();
        redirect(base_url("user/input"));
    }

    public function header()
    {
        $username = $this->session->userdata('username');
        $user = [
            "tb_kegiatan.username"=>"$username",
            // "tb_approval.keputusan !="=>NULL,
            "tb_kegiatan.status"=>"2",
            ];
        $data['navbar_notif'] = $this->M_Kegiatan->get_kegiatan($user)->result();
        $head['title'] = $this->title;
        $head['navbar'] = "user";
        $head['profile'] = $this->M_Akun->get_profile(array('username'=>"$username"))->row();
        $this->load->view('layout/header_main', $head);
        $this->load->view('function');
    }

    public function input()
    {
        $username = $this->session->userdata('username');
        $user = [
            "tb_kegiatan.username"=>"$username",
            "tb_approval.keputusan"=>NULL,
            "tb_kegiatan.status !="=>"2",
            ];
        $data['view'] = $this->M_Kegiatan->get_kegiatan($user)->result();
        $data['jenis_kegiatan'] = $this->M_Kegiatan->get_jenis_kegiatan()->result();
        $this->title = "Daftar Pengajuan Kegiatan Sedang Proses";
        $this->header();
        $this->load->view('input', $data);
        $this->load->view("layout/footer_main");
    }

    public function need()
    {
        $username = $this->session->userdata('username');
        $user = [
            "tb_kegiatan.username"=>"$username",
            // "tb_approval.keputusan !="=>NULL,
            "tb_kegiatan.status"=>"2",
            ];
        $data['view'] = $this->M_Kegiatan->get_kegiatan($user)->result();
        $data['jenis_kegiatan'] = $this->M_Kegiatan->get_jenis_kegiatan()->result();
        $this->title = "Daftar Pengajuan Kegiatan Harus Segera Diproses";
        $this->header();
        $this->load->view('input', $data);
        $this->load->view("layout/footer_main");
    }

    public function done()
    {
        $username = $this->session->userdata('username');
        $user = [
            "tb_kegiatan.username"=>"$username",
            "tb_approval.keputusan !="=>NULL,
            ];
        $data['view'] = $this->M_Kegiatan->get_kegiatan($user)->result();
        $data['jenis_kegiatan'] = $this->M_Kegiatan->get_jenis_kegiatan()->result();
        $this->title = "Daftar Pengajuan Kegiatan Telah Selesai Proses";
        $this->header();
        $this->load->view('input', $data);
        $this->load->view("layout/footer_main");
    }

    public function all()
    {
        $username = $this->session->userdata('username');
        $user = [
            "tb_kegiatan.username"=>"$username",
            ];
        $data['view'] = $this->M_Kegiatan->get_kegiatan($user)->result();
        $data['jenis_kegiatan'] = $this->M_Kegiatan->get_jenis_kegiatan()->result();
        $this->title = "Semua Daftar Pengajuan Kegiatan";
        $this->header();
        $this->load->view('input', $data);
        $this->load->view("layout/footer_main");
    }

    public function tambah_kegiatan(){
        $data['jenis_kegiatan'] = $this->M_Kegiatan->get_jenis_kegiatan()->result();
        $this->title = "Pengajuan Kegiatan";
        $this->header();
        $this->load->view('tambah_kegiatan', $data);
        $this->load->view("layout/footer_main");
    }

    public function insert_kegiatan()
    {
        $username = $this->session->userdata('username');
        $judul = $this->input->post('judul');
        $total_anggaran = $this->input->post('total_anggaran');
        $total_anggaran = str_replace('.', '', $total_anggaran);
        $total_anggaran = str_replace(',', '', $total_anggaran);
        $jenis_kegiatan = $this->input->post('jenis');
        $tgl = date('Y-m-d', strtotime(date('Y-m-d')));

        $data_kegiatan = [
            "jenis" => "$jenis_kegiatan",
            "total_anggaran" => "$total_anggaran",
            "judul" => "$judul",
            "username" => "$username",
            "tgl" => "$tgl",
            "status" => "0",
        ];
        $id = $this->M_Kegiatan->insert_kegiatan($data_kegiatan);

        $cek = [
            "id_kegiatan" => "$id",
        ];

        if ($jenis_kegiatan=="1" || $jenis_kegiatan=="2" || $jenis_kegiatan=="9"){
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

            for($i=0; $i<count($titel); $i++)
            {
                // echo "OKKKK";
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
                $config['allowed_types'] = 'pdf';

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
            $this->session->set_flashdata('info','<div class="alert alert-success" style="margin-top: 3px">
     <div class="header"><b><i class="fa fa-exclamation-circle"></i> SUCCESS</b> Data berhasil direkam</div></div>' );
            redirect(base_url("User/Input"));
    }

    public function delete_kegiatan(){
        $id = $this->input->post('id');
        $this->M_Kegiatan->del_kegiatan(array("id"=>$id));
        $this->M_Kegiatan->del_ext_kegiatan(array("id_kegiatan"=>$id));
        $this->session->set_flashdata('info','<div class="alert alert-success" style="margin-top: 3px">
     <div class="header"><b><i class="fa fa-exclamation-circle"></i> SUCCESS</b> Data berhasil diahapus</div></div>' );
        redirect(base_url('User/input'));
    }

    // public function list_monev()
    // {
    //     $username = $this->session->userdata('username');
    //     $data_kegiatan = [
    //         "username"=>"$username",
    //         "status"=>"2",
    //     ];
    //     $data['ext'] = $this->M_Kegiatan->get_where_ext($data_kegiatan)->result();
    //     $this->header();
    //     $this->load->view('monev');
    //     $this->koad->view('footer');
    // }
    
    public function monev()
    {
        $username = $this->session->userdata('username');
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
        $this->load->view('monev',$data);
        $this->load->view('layout/footer_main');
    }

    public function insert_monev(){
        $username = $this->session->userdata('username');
        $id_kegiatan = $this->input->post('id');
        $jenis = $this->input->post('jenis');
        $id_ok = ["id_kegiatan"=>"$id_kegiatan"];
        $id = $this->M_Kegiatan->insert_monev($id_ok);
        $cond = ["id"=>"$id"];
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
                "file1"=>$file,];
                // $this->M_Pengaduan->update_pengaduan($datafile,$id);
                $this->M_Kegiatan->update_monev($datafile, $cond);
            }
        $file2 = $_FILES['file2'];
            if(empty($file2['name'])){}
                else{
                $config2['upload_path'] = './assets/file';
                $config2['encrypt_name'] = TRUE;
                $config2['allowed_types'] = '*';
    
                $this->load->library('upload',$config2);
                if(!$this->upload->do_upload('file2')){
                    echo "Upload Gagal"; die();
                } else {
                    $file2=$this->upload->data('file_name');
                }
                $datafile = [
                "file2"=>$file2,];
                // $this->M_Pengaduan->update_pengaduan($datafile,$id);
                $this->M_Kegiatan->update_monev($datafile, $cond);
            }

        if($jenis == 1 || $jenis == 8){
            $file3 = $_FILES['file3'];
            if(empty($file3['name'])){}
                else{
                $config3['upload_path'] = './assets/file';
                $config3['encrypt_name'] = TRUE;
                $config3['allowed_types'] = '*';
    
                $this->load->library('upload',$config3);
                if(!$this->upload->do_upload('file3')){
                    echo "Upload Gagal"; die();
                } else {
                    $file3=$this->upload->data('file_name');
                }
                $datafile = [
                "file3"=>$file3,];
                // $this->M_Pengaduan->update_pengaduan($datafile,$id);
                $this->M_Kegiatan->update_monev($datafile, $cond);
            }
        }

        elseif($jenis == 2 || $jenis == 9){
            $file3 = $_FILES['file3'];
            if(empty($file3['name'])){}
                else{
                $config3['upload_path'] = './assets/file';
                $config3['encrypt_name'] = TRUE;
                $config3['allowed_types'] = '*';
    
                $this->load->library('upload',$config3);
                if(!$this->upload->do_upload('file3')){
                    echo "Upload Gagal"; die();
                } else {
                    $file3=$this->upload->data('file_name');
                }
                $datafile = [
                "file3"=>$file3,];
                // $this->M_Pengaduan->update_pengaduan($datafile,$id);
                $this->M_Kegiatan->update_monev($datafile, $cond);
            }

            $file4 = $_FILES['file4'];
            if(empty($file4['name'])){}
                else{
                $config4['upload_path'] = './assets/file';
                $config4['encrypt_name'] = TRUE;
                $config4['allowed_types'] = '*';
    
                $this->load->library('upload',$config4);
                if(!$this->upload->do_upload('file4')){
                    echo "Upload Gagal"; die();
                } else {
                    $file4=$this->upload->data('file_name');
                }
                $datafile = [
                "file4"=>$file4,];
                // $this->M_Pengaduan->update_pengaduan($datafile,$id);
                $this->M_Kegiatan->update_monev($datafile, $cond);
            }
        }

        elseif($jenis == 3){
            $file3 = $_FILES['file3'];
            if(empty($file3['name'])){}
                else{
                $config3['upload_path'] = './assets/file';
                $config3['encrypt_name'] = TRUE;
                $config3['allowed_types'] = '*';
    
                $this->load->library('upload',$config3);
                if(!$this->upload->do_upload('file3')){
                    echo "Upload Gagal"; die();
                } else {
                    $file3=$this->upload->data('file_name');
                }
                $datafile = [
                "file3"=>$file3,];
                // $this->M_Pengaduan->update_pengaduan($datafile,$id);
                $this->M_Kegiatan->update_monev($datafile, $cond);
            }
        }

        elseif($jenis == 4){
            $file3 = $_FILES['file3'];
            if(empty($file3['name'])){}
                else{
                $config3['upload_path'] = './assets/file';
                $config3['encrypt_name'] = TRUE;
                $config3['allowed_types'] = '*';
    
                $this->load->library('upload',$config3);
                if(!$this->upload->do_upload('file3')){
                    echo "Upload Gagal"; die();
                } else {
                    $file3=$this->upload->data('file_name');
                }
                $datafile = [
                "file3"=>$file3,];
                // $this->M_Pengaduan->update_pengaduan($datafile,$id);
                $this->M_Kegiatan->update_monev($datafile, $cond);
            }
        }

        elseif($jenis == 5){
            $file3 = $_FILES['file3'];
            if(empty($file3['name'])){}
                else{
                $config3['upload_path'] = './assets/file';
                $config3['encrypt_name'] = TRUE;
                $config3['allowed_types'] = '*';
    
                $this->load->library('upload',$config3);
                if(!$this->upload->do_upload('file3')){
                    echo "Upload Gagal"; die();
                } else {
                    $file3=$this->upload->data('file_name');
                }
                $datafile = [
                "file3"=>$file3,];
                // $this->M_Pengaduan->update_pengaduan($datafile,$id);
                $this->M_Kegiatan->update_monev($datafile, $cond);
            }

            $file4 = $_FILES['file4'];
            if(empty($file4['name'])){}
                else{
                $config4['upload_path'] = './assets/file';
                $config4['encrypt_name'] = TRUE;
                $config4['allowed_types'] = '*';
    
                $this->load->library('upload',$config4);
                if(!$this->upload->do_upload('file4')){
                    echo "Upload Gagal"; die();
                } else {
                    $file4=$this->upload->data('file_name');
                }
                $datafile = [
                "file4"=>$file4,];
                // $this->M_Pengaduan->update_pengaduan($datafile,$id);
                $this->M_Kegiatan->update_monev($datafile, $cond);
            }

            $stat = $this->post->input('status');
            $data_stat = ["stat"=>"$stat"];
            $this->M_SK->update_monev($data_stat, $cond);
        }

        elseif($jenis == 6){
            $file3 = $_FILES['file3'];
            if(empty($file3['name'])){}
                else{
                $config3['upload_path'] = './assets/file';
                $config3['encrypt_name'] = TRUE;
                $config3['allowed_types'] = '*';
    
                $this->load->library('upload',$config3);
                if(!$this->upload->do_upload('file3')){
                    echo "Upload Gagal"; die();
                } else {
                    $file3=$this->upload->data('file_name');
                }
                $datafile = [
                "file3"=>$file3,];
                // $this->M_Pengaduan->update_pengaduan($datafile,$id);
                $this->M_Kegiatan->update_monev($datafile, $cond);
            }

            $file4 = $_FILES['file4'];
            if(empty($file4['name'])){}
                else{
                $config4['upload_path'] = './assets/file';
                $config4['encrypt_name'] = TRUE;
                $config4['allowed_types'] = '*';
    
                $this->load->library('upload',$config4);
                if(!$this->upload->do_upload('file4')){
                    echo "Upload Gagal"; die();
                } else {
                    $file4=$this->upload->data('file_name');
                }
                $datafile = [
                "file4"=>$file4,];
                // $this->M_Pengaduan->update_pengaduan($datafile,$id);
                $this->M_Kegiatan->update_monev($datafile, $cond);
            }

            $file5 = $_FILES['file5'];
            if(empty($file5['name'])){}
                else{
                $config5['upload_path'] = './assets/file';
                $config5['encrypt_name'] = TRUE;
                $config5['allowed_types'] = '*';
    
                $this->load->library('upload',$config5);
                if(!$this->upload->do_upload('file5')){
                    echo "Upload Gagal"; die();
                } else {
                    $file5=$this->upload->data('file_name');
                }
                $datafile = [
                "file5"=>$file5,];
                // $this->M_Pengaduan->update_pengaduan($datafile,$id);
                $this->M_Kegiatan->update_monev($datafile, $cond);
            }

            $stat = $this->post->input('status');
            $data_stat = ["stat"=>"$stat"];
            $this->M_SK->update_monev($data_stat, $cond);
        }

        else {
            // DO NOTHING
        }

        $status = [
            "status"=>"3",
        ];
        $this->M_Kegiatan->update_status($id_kegiatan, $status);
        $this->session->set_flashdata('info','<div class="alert alert-success" style="margin-top: 3px">
     <div class="header"><b><i class="fa fa-exclamation-circle"></i> SUCCESS</b> Data berhasil direkam</div></div>' );
            redirect(base_url("User/Input"));

    }

    public function edit_kegiatan()
    {
        $username = $this->session->userdata('username');
        $this->title = "Edit Pengajuan Kegiatan";
        $id = $this->input->post('id');
        if (empty($id)){
            redirect(base_url("User/input"));
        }
        $data_kegiatan = [
            "tb_kegiatan.id"=>"$id",
        ];
        $data_ext = [
            "id_kegiatan"=>"$id",
        ];
        $data['link'] = "User";
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
            "username" => "$username",
            "tgl" => "$tgl",
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
    
                $this->M_Kegiatan->insert_ext_kegiatan($data_ext);
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
                $config['allowed_types'] = 'pdf';

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
            $this->session->set_flashdata('info','<div class="alert alert-success" style="margin-top: 3px">
     <div class="header"><b><i class="fa fa-exclamation-circle"></i> SUCCESS</b> Data berhasil direkam</div></div>' );
            redirect(base_url("User/input"));
    }

    public function detail()
    {
        $username = $this->session->userdata('username');
        $id = $this->input->post('id');
        if (empty($id)){
            redirect(base_url("User/input"));
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
        $this->title = "Detail Pengajuan Kegiatan";

        // print_r($data['ext']);
        $this->header();
        $this->load->view('detail',$data);
        $this->load->view('layout/footer_main');
    }
    
}