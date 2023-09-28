<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Reviewer extends CI_Model
{
    public function insert_komentar($data)
    {
        $query = $this->db->select('*')
        ->from('tb_komentar')
        ->where($data)
        ->get();
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('tb_komentar',$data);
        }
        else{
            
        }  
    }

    public function insert_anggaran($data)
    {
        $query = $this->db->select('*')
        ->from('tb_anggaran')
        ->where($data)
        ->get();
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('tb_anggaran',$data);
        }
        else{
            
        }  
    }

    public function get_round_komentar($data)
    {
        $query = $this->db->select('*')
        ->from('tb_komentar')
        ->where($data)
        ->order_by('id','desc')
        ->limit(1)
        ->get();
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            return 0;
        }
        else{
            return $query->row()->round;
        }  
    }

    public function get_anggaran($data)
    {
        $query = $this->db->select('*')
        ->from('tb_anggaran')
        ->where($data)
        ->get();
        return $query;
    }

    public function insert_review($data)
    {
        $query = $this->db->select('*')
        ->from('tb_review')
        ->where($data)
        ->get();
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('tb_review',$data);
        }
        else{

        }  
    }

    public function insert_approver($data)
    {
        $query = $this->db->select('*')
        ->from('tb_approval')
        ->where($data)
        ->get();
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('tb_approval',$data);
        }
        else{

        }  
    }

    public function del_komentar($id)
    {
        $this->db->where($id);
        $this->db->delete('tb_komentar');
    }

    public function del_anggaran($id)
    {
        $this->db->where($id);
        $this->db->delete('tb_anggaran');
    }

    public function delete_approver($id)
    {
        $this->db->where($id);
        $this->db->delete('tb_approval');
    }

    public function del_review($id)
    {
        $this->db->where($id);
        $this->db->delete('tb_review');
    }

    public function update_status($id, $data)
    {
        $this->db->where('id', "$id");
        $this->db->update('tb_kegiatan', $data);
    }

    public function get_komentar($data)
    {
        $query = $this->db->select('*')
        ->from('tb_komentar')
        ->where($data)
        ->get();
        return $query;
    }

    public function get_review($data)
    {
        $query = $this->db->select('*')
        ->from('tb_review')
        ->where($data)
        ->order_by("komponen", "asc")
        ->get();
        return $query;
    }

}