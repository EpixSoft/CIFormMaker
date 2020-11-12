<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->lang->load('genel', 'english');
        $this->vf->DBCHECK();
        $this->load->model("Home_model","Home");
    }

	public function index()
	{
	    $data["Liste"] = $this->Home->TableList();

        $this->load->view('Header');
		$this->load->view('Home',$data);
        $this->load->view('Footer');
	}
}
