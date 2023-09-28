<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Notif extends CI_Model
{
    public function get_count_all(){
        $query = $this->db->select('*')
        ->from('tb_kegiatan')
        ->count_all_results();
        return $query;
    }

    public function get_count($data){
        $query = $this->db->select('*')
        ->from('tb_kegiatan')
        ->where($data)
        ->count_all_results();
        return $query;
    }
}