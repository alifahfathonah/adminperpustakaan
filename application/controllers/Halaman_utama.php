<?php 

class Halaman_utama extends AdminController {
	public function __construct(){
        parent::__construct();
        $this->load->library('PrintWaktu');
        $this->load->library('Globalvalue');

        
    }

	public function index()
        {
    		// $hari = date('Y-m-d-D',time());
    		// echo $hari;
    		$h = date('D',time());
    		//echo $this->printwaktu->namahari($h);
            $data = $this->globalvalue->batas();
            echo print_r($data);
            $this->load->view('global_graph/index');
        }
}