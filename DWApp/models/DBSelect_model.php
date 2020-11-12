<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Doğruweb Yazilim
 * Date: 1.08.2018
 * Time: 18:30
 * File Name : DBSelect_model.php
 */
class DBSelect_model extends CI_Model{

    public $data = array();

    function __construct(){
        parent::__construct();
    }

    function DBList(){

        $query = $this->db->query("SHOW DATABASES");
        $row = $query->result_array();

        return $row;
    }
}
?>