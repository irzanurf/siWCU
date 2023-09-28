<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kegiatan extends CI_Model
{
    public function get_kegiatan($data)
    {
        $query = $this->db->select('tb_kegiatan.*, tb_jenis_kegiatan.nama as jenis_kegiatan, tb_jenis_kegiatan.ext, tb_anggaran.anggaran as anggaran_disetujui, tb_approval.keputusan, tb_approval.komentar as kom_ap, tb_approval.tgl as tgl_ap, tb_approval.keputusan, tb_monev.file1')
        ->from('tb_kegiatan')
        ->join('tb_jenis_kegiatan','tb_kegiatan.jenis=tb_jenis_kegiatan.id','inner')
        ->join('tb_anggaran','tb_kegiatan.id=tb_anggaran.id_kegiatan', 'left')
        ->join('tb_approval','tb_kegiatan.id=tb_approval.id_kegiatan', 'left')
        ->join('tb_monev','tb_kegiatan.id=tb_monev.id_kegiatan', 'left')
        ->where($data)
        ->get();
        return $query;
    }

    public function get_all_kegiatan()
    {
        $query = $this->db->select('tb_kegiatan.*, tb_jenis_kegiatan.nama as jenis_kegiatan, tb_jenis_kegiatan.ext, tb_profile.nama as nama_pengusul, tb_anggaran.anggaran as anggaran_disetujui, tb_approval.keputusan')
        ->from('tb_kegiatan')
        ->join('tb_jenis_kegiatan','tb_kegiatan.jenis=tb_jenis_kegiatan.id','inner')
        ->join('tb_profile','tb_kegiatan.username=tb_profile.username','inner')
        ->join('tb_anggaran','tb_kegiatan.id=tb_anggaran.id_kegiatan', 'left')
        ->join('tb_approval','tb_kegiatan.id=tb_approval.id_kegiatan', 'left')
        ->get();
        return $query;
    }

    public function get_where_kegiatan($data)
    {
        $query = $this->db->select('tb_kegiatan.*, tb_jenis_kegiatan.nama as jenis_kegiatan, tb_jenis_kegiatan.ext, tb_profile.nama as nama_pengusul, tb_anggaran.anggaran as anggaran_disetujui, tb_approval.keputusan')
        ->from('tb_kegiatan')
        ->join('tb_jenis_kegiatan','tb_kegiatan.jenis=tb_jenis_kegiatan.id','inner')
        ->join('tb_profile','tb_kegiatan.username=tb_profile.username','inner')
        ->join('tb_anggaran','tb_kegiatan.id=tb_anggaran.id_kegiatan', 'left')
        ->join('tb_approval','tb_kegiatan.id=tb_approval.id_kegiatan', 'left')
        ->where($data)
        ->get();
        return $query;
    }

    public function get_all_kegiatan_reviewer($username)
    {
        $query = $this->db->select('tb_kegiatan.*, tb_jenis_kegiatan.nama as jenis_kegiatan, tb_jenis_kegiatan.ext, tb_profile.nama as nama_pengusul')
        ->from('tb_kegiatan')
        ->join('tb_jenis_kegiatan','tb_kegiatan.jenis=tb_jenis_kegiatan.id','inner')
        ->join('tb_profile','tb_kegiatan.username=tb_profile.username','inner')
        ->where('tb_kegiatan.jenis',"$username")
        ->get();
        return $query;
    }

    public function get_exp_kegiatan()
    {
        $query = $this->db->select('tb_kegiatan.*, tb_kegiatan.id as id_keg, tb_jenis_kegiatan.nama as jenis_kegiatan, tb_jenis_kegiatan.ext, tb_fakultas.fakultas as fak, tb_profile.username as user, tb_profile.nama as nama_pengusul, tb_profile.email, tb_profile.no_hp, tb_profile.departemen, tb_profile.unit, tb_approval.keputusan, tb_approval.komentar as komen_ap, tb_approval.tgl as tgl_ap')
        ->from('tb_kegiatan')
        ->join('tb_jenis_kegiatan','tb_kegiatan.jenis=tb_jenis_kegiatan.id','inner')
        ->join('tb_profile','tb_kegiatan.username=tb_profile.username','inner')
        ->join('tb_fakultas','tb_profile.fakultas=tb_fakultas.id','inner')
        ->join('tb_approval','tb_kegiatan.id=tb_approval.id_kegiatan', 'left')
        ->get();
        return $query;
    }

    public function get_where_ext($data){
        $query = $this->db->select('tb_ext.*')
        ->from('tb_ext')
        ->where($data)
        ->get();
        return $query;
    }

    public function get_where_monev($data){
        $query = $this->db->select('tb_monev.*')
        ->from('tb_monev')
        ->where($data)
        ->get();
        return $query;
    }

    public function get_where_ext_ok($data){
        $query = $this->db->select('tb_ext.*')
        ->from('tb_ext')
        ->where("id_kegiatan","$data")
        ->get();
        return $query;
    }

    public function get_jenis_kegiatan()
    {
        $query = $this->db->select('tb_jenis_kegiatan.*')
        ->from('tb_jenis_kegiatan')
        ->get();
        return $query;
    }

    public function insert_kegiatan($data)
    {
        $this->db->insert('tb_kegiatan',$data);
        return $this->db->insert_id();
    }

    public function update_kegiatan($data, $cond)
    {
        $this->db->where($cond);
        $this->db->update('tb_kegiatan', $data);
    }

    public function insert_ext_kegiatan($data)
    {
        $query = $this->db->select('*')
        ->from('tb_ext')
        ->where($data)
        ->get();
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('tb_ext',$data);
        }
        else{

        }   
    }

    public function check_empty_monev($data)
    {
        $query = $this->db->select('*')
        ->from('tb_monev')
        ->where($data)
        ->get();
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            return 0;
        }
        else{
            return 1;
        }   
    }

    public function del_kegiatan($id)
    {
        $this->db->where($id);
        $this->db->delete('tb_kegiatan');
    }

    public function del_ext_kegiatan($id)
    {
        $this->db->where($id);
        $this->db->delete('tb_ext');
    }

    public function insert_monev($data)
    {
        $query = $this->db->select('*')
        ->from('tb_monev')
        ->where($data)
        ->get();
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('tb_monev',$data);
            return $this->db->insert_id();
        }
        else{
            return $query->row()->id;
        } 
    }

    public function update_monev($data, $cond)
    {
        $this->db->where($cond);
        $this->db->update('tb_monev', $data);
    }

    public function update_status($id, $data)
    {
        $this->db->where('id', "$id");
        $this->db->update('tb_kegiatan', $data);
    }

}