<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class daftarusermodel extends CI_Model {

	public function daftar($datauser){ 
    $result = $this->db->insert('userlist', $datauser);
    return $result;
    }
    
    public function login($datauser){
        $result = $this->db->get_where('userlist', $datauser);
        return $result;
    }
}