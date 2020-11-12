<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Doğruweb Yazılım
 * Date: 2.08.2018
 * Time: 00:25
 * File Name : TableDetail_model.php
 */

class TableDetail_model extends CI_Model{

    public $data = array();

    function __construct(){
        parent::__construct();
    }

    function FieldList($table){

        $query = $this->db->query("SHOW COLUMNS FROM " . $this->session->userdata('DBNAME') . '.' . $table);
        $row = $query->result_array();

        return $row;
    }

    function TableList(){

        $query = $this->db->query("SHOW tables From " . $this->session->userdata('DBNAME'));
        $row = $query->result_array();

        return $row;
    }
}