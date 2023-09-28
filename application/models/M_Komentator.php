<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Komentator extends CI_Model
{
    public function insert_komentar($data)
    {
        $query = $this->db->select('*')
        ->from('tb_comments')
        ->where($data)
        ->get();
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('tb_comments',$data);
        }
        else{
            
        }  
    }

    public function get_komentar($data)
    {
        $query = $this->db->select('*')
        ->from('tb_comments')
        ->where($data)
        ->get();
        return $query;
    }

    public function del_komentar($id)
    {
        $this->db->where($id);
        $this->db->delete('tb_comments');
    }

}