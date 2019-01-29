<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_user extends CI_Controller {

    public function index()
    {
        $this->load->view('user');    
    }

 }
