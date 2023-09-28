<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Akun extends CI_Model
{
    public function changePass($username,$pass)
    {
        $this->db->where('username',"$username");
        $this->db->update('tb_users', $pass);
        
    }

    public function del_akun(array $data){
        $query = $this->db->delete('tb_users',$data);
        return $query;
    }

    public function del_profile(array $data){
        $query = $this->db->delete('tb_profile',$data);
        return $query;
    }

    public function get_jenis($username){
        $query = $this->db->select('*')
        ->from('tb_reviewer')
        ->where('username',"$username")
        ->get();
        return $query;
    }

    public function get_jenis_c($username){
        $query = $this->db->select('*')
        ->from('tb_komentator')
        ->where('username',"$username")
        ->get();
        return $query;
    }

    public function get_jenis_kegiatan($id){
        $query = $this->db->select('*')
        ->from('tb_jenis_kegiatan')
        ->where('id',"$id")
        ->get();
        return $query;
    }

    public function insert_akun($akun,$username)
    {
        $query = $this->db->query("SELECT * FROM tb_users WHERE username = '$username'");
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('tb_users',$akun);
        }
        else{
            $this->session->set_flashdata('info','<div class="alert alert-danger" style="margin-top: 3px">
            <div class="header"><b><i class="fa fa-exclamation-circle"></i> ALERT!</b> NIP/NIM anda sudah terdaftar</div></div>' );
            redirect(base_url("Welcome"));
        }   
    }

    public function insert_profile($akun,$username)
    {
        $query = $this->db->query("SELECT * FROM tb_profile WHERE username = '$username'");
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('tb_profile',$akun);
        }
        else{
            
        }   
    }

    public function fakultas()
    {
        $query = $this->db->select('*')
        ->from('tb_fakultas')
        ->get();
        return $query;
        
    }

    public function get_profile($data)
    {
        $query = $this->db->select('*')
        ->from('tb_profile')
        ->where($data)
        ->get();
        return $query;
    }

    public function get_all_user(){
        $query = $this->db->select('tb_users.*, tb_profile.nama')
        ->from('tb_users')
        ->join('tb_profile','tb_users.username=tb_profile.username','left')
        ->get();
        return $query;
    }

    public function get_user($data){
        $query = $this->db->select('tb_users.*, tb_profile.nama')
        ->from('tb_users')
        ->join('tb_profile','tb_users.username=tb_profile.username','left')
        ->where($data)
        ->get();
        return $query;
    }

}