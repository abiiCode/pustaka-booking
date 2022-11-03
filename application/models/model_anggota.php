<?php
defined('BASEPATH') or exit('No direct script access allowed');

class model_anggota extends CI_Model
{
    private $table = 'table';
    private $pk    = 'pk';

    public function tampil_biodata()
    {
        return $this->db->get('anggota')->result_array();
    }

    public function tambahAnggota($data = null)
    {
        return $this->db->insert('anggota', $data);
    }
}
