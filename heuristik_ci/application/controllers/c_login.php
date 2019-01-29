<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class c_login extends CI_Controller {

    public function index($error = NULL) {
        $data = array(
            'title' => 'Login Page',
            'action' => site_url('c_login/beranda_auth'),
            'error' => $error
        );
        $this->load->view('beranda_auth', $data);
    }

    public function login() {
        $this->load->model('m_login');
        $login = $this->m_login->login($this->input->post('username'), md5($this->input->post('password')));

        if ($login == 1) {
//          ambil detail data
            $row = $this->m_login->data_login($this->input->post('username'), md5($this->input->post('password')));

//          daftarkan session
            $data = array(
                'logged' => TRUE,
                'username' => $row->username
            );
            $this->session->set_userdata($data);

//            redirect ke halaman sukses
            redirect(site_url('user'));
        } else {
//            tampilkan pesan error
            $error = 'username / password salah';
            $this->index($error);
        }
    }

    function logout() {
//        destroy session
        $this->session->sess_destroy();
        
//        redirect ke halaman login
        redirect(site_url('c_login'));
    }

}

/* End of file c_login.php */
/* Location: ./application/controllers/c_login.php */