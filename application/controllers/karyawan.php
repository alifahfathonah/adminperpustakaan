<?php

function __construct() {
    parent::__construct();
}

//author: www.syamadav.com
class Karyawan extends CI_Controller {

    public function index() {
        $this->load->model('m_karyawan');
        $karyawan = $this->m_karyawan->index();
        $this->load->vars('k', $karyawan);
        $this->load->view('v_karyawan');
    }

    public function add() {
        $this->load->view('v_add_karyawan');
    }

    public function prosesadd() {
        $this->load->model('m_karyawan');
        $this->m_karyawan->insert();
        redirect('karyawan');
    }

    public function edit($id) {
        $this->load->model('m_karyawan');
        $karyawan = $this->m_karyawan->edit($id);
        $this->load->vars('k', $karyawan);
        $this->load->view('v_edit_karyawan');
    }

    public function prosesedit() {
        $this->load->model('m_karyawan');
        //echo print_r($_POST['alamat']);
        $this->m_karyawan->prosesedit();
        redirect('karyawan');
    }

}

?>
