<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('M_Login');
        $this->load->model('M_Akun');
    }

    public function index()
	{
        $this->session->set_flashdata('message','');
        
        $head['fakultas'] = $this->M_Akun->fakultas()->result();
        
		if($this->M_Login->is_logged_in())
            {
                //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
                //redirect berdasarkan level user
                if($this->session->userdata("role") == "1"){
                    redirect('User');
                }elseif($this->session->userdata("role") == "2"){
                    redirect('Admin');
                }elseif($this->session->userdata("role") == "3"){
                    redirect('Reviewer');
                }elseif($this->session->userdata("role") == "4"){
                    redirect('Approver');
                }elseif($this->session->userdata("role") == "5"){
                    redirect('Komentator');
                }

            }else{

                //jika session belum terdaftar

                //set form validation
                $this->form_validation->set_rules('username', 'username', 'required');
                $this->form_validation->set_rules('password', 'password', 'required');

                //set message form validation
                $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

                //cek validasi
                if ($this->form_validation->run() == TRUE) {

                //get data dari FORM
                $username = $this->input->post("username", TRUE);
                $password = MD5($this->input->post('password', TRUE));

                //checking data via model
                $checking = $this->M_Login->check_login('tb_users', array('username' => $username), array('password' => $password));

                //jika ditemukan, maka create session
                if ($checking != FALSE) {
                    foreach ($checking as $apps) {

                        $session_data = array(
                            'id'   => $apps->id,
                            'username' => $apps->username,
                            'pass' => $apps->password,
                            'role'      => $apps->role
                        );
                        //set session userdata
                        $this->session->set_userdata($session_data);

                        //redirect berdasarkan level user
                        if($this->session->userdata("role") == "1"){
							redirect('User');
						}elseif($this->session->userdata("role") == "2"){
							redirect("Admin");
						}elseif($this->session->userdata("role") == "3"){
							redirect("Reviewer");
						}elseif($this->session->userdata("role") == "4"){
                            redirect('Approver');
                        }elseif($this->session->userdata("role") == "5"){
                            redirect('Komentator');
                        }

                    }
                }else{

                    $this->session->set_flashdata('info','<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>' );

                    // $head['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                    // <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
                    redirect(base_url('welcome'));
                
                }

            }else{

                
            }

        }
        $this->load->view('layout/header_home', $head);
        $this->load->view('home');
        $this->load->view('layout/footer_home');
    }

    public function changePass()
    {
     $this->form_validation->set_rules('new','New','required|alpha_numeric');
     $this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');
     $user = $this->session->userdata('username');
     $pass = md5($this->input->post('new'));
     $new = [
        "password" => $pass
     ];
       if($this->form_validation->run() == FALSE)
     {
      $this->load->view('change_pass');
     }else{
      $cek_old = $this->M_Login->cek_old();
      if ($cek_old == False){
       $this->session->set_flashdata('error','Kata sandi lama salah!' );
       $this->load->view('change_pass');
      }else{
       $this->M_Login->save($user,$new);
       $this->session->sess_destroy();
       $this->session->set_flashdata('message','<div class="alert alert-success" style="margin-top: 3px">
       <div class="header"><b><i class="fa fa-exclamation-circle"></i> SUCCESS</b> Your password success to change, please relogin!</div></div>' );
       $this->load->view('login');
      }//end if valid_user
     }
    }

    public function register()
    {
     $user = $this->input->post('username');
     $password = $this->input->post('newPassword');
     $password = md5("$password");
    
     $nama = $this->input->post('nama');
     $no_hp = $this->input->post('no_hp');
     $email = $this->input->post('email');
     $fakultas = $this->input->post('fakultas');
     $departemen = $this->input->post('departemen');
     $prodi = $this->input->post('prodi');

     $new_profile = [
        "username" => "$user",
        "nama" => "$nama",
        "email" => "$email",
        "no_hp" => "$no_hp",
        "fakultas" => "$fakultas",
        "departemen" => "$departemen",
        "unit" => "$prodi",
     ];
     $this->M_Akun->insert_profile($new_profile, $user);


     $new = [
        "username" => "$user",
        "password" => "$password",
        "role" => "1",
     ];
     $this->M_Akun->insert_akun($new, $user);
     $this->session->set_flashdata('info','<div class="alert alert-success" style="margin-top: 3px">
     <div class="header"><b><i class="fa fa-exclamation-circle"></i> SUCCESS</b> Registrasi berhasil, silahkan login</div></div>' );
     redirect(base_url("Welcome"));
    
    }

    public function profile()
    {
        $username = $this->session->userdata('username');
        $data['nama']= $this->M_Dosen->getwhere_dosen(array('username'=>$username))->result();
        $this->load->view('layout/header_penguji', $username);
        $this->load->view('profile', $data);
        $this->load->view("layout/footer");
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Welcome');
    }

    public function cek()
    {
        $cek = "AZ";
        $cek++;
        echo("$cek");
    }
}