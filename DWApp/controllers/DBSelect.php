<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DBSelect extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->lang->load('genel', 'english');
        $this->load->model("DBSelect_model","DBSelect");
    }

	public function index(){

        $data["Liste"] = $this->DBSelect->DBList();

        $this->load->view('Header');
		$this->load->view('DBSelect',$data);
        $this->load->view('Footer');
	}

	function Select(){
        $this->session->set_userdata('DBNAME', $this->input->post("dbname"));
        echo( $this->session->userdata('DBNAME') );
    }
}
