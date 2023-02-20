<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hospital_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        
        $this->load->database();
        $this->userTbl = 'hospital';
    }
     
    function get_hospital(){
        $query = $this->db->get($this->userTbl);
        return $query->result();
        
    }
    
   
}