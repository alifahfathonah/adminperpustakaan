<?php
/**
 * pengunjung controller
 * application/controllers/pengunjung.php
 */

class Pengunjung extends MY_Controller{

	function __construct(){
        parent::__construct();

        //jika belum pengunjung redirect ke pengunjung
        
        //jika belum pengunjung redirect ke pengunjung
        /*
        if ($this->session->userdata('logged_in')<>1) { 
            redirect('index.php/admin');
        }
        */
        $this->load->library('form_validation');
        $this->load->model('PengunjungModel','pengunjung',true);
    }

	public function index(){
		$input = (object) $this->input->post(null,true);
		if (! $_POST) {
			
            $input = (object) $this->pengunjung->getDefaultValues();
        }

		if (!$this->pengunjung->validate()) {
			$mainView 	= 'pengunjung/index';
			$this->load->view('pengunjung/index', compact('input'));
			return;
		}

		if ($this->pengunjung->login($input)) {
			# code...
			echo "Sukses";
			echo "<br>";
			echo print_r($_SESSION);
			return;
			
		}

		flashMessage('error',
			'Username/Password Salah.'
		);

		redirect('pengunjung', 'refresh');
		
	}

    public function create(){
        //load our Nativesession library  
        if (!$_POST) {
        	$default = array(
        		'hp'				=> '',
        		'email'			=> '',
        		'password' 	=> '',
        		'confirmpassword'	=> ''
        	);
          $input = (object) $default;
        }else{
          $input = (object) $this->input->post(null,true);

        }

        if (!$this->pengunjung->validatePengunjung()) {
          # code...
          
          $this->nativesession->set('warning','Mohon diisi Data dengan Lengkap, dan Valid');
          $form_action    = 'pengunjung/create';
          $mainView     = 'pengunjung/register';
          $this->load->view('pengunjung/template',compact('mainView','input','form_action'));
          return;
        }

        $data = array(

          'hp'      => $input->hp,
          'email'   => $input->email,
          'password'    => $input->password,
        );
        if ($this->pengunjung->insert($data)) {
          $this->nativesession->set('success','Data Berhasil Masuk');
        }else{
          $this->nativesession->set('error','Data Gagal Masuk');
        }

        redirect(base_url().'pengunjung','refresh');
        
    }



	public function success(){	

		
		$pengunjung = $this->nativesession->get('logged_in');
		if ($pengunjung) {
			$this->load->view('pengunjung/success');
		}else{
			//$this->session->set_flashdata('success', 'pengunjung Dulu');
			redirect('/');
			
		}
	}

	public function logout(){

		$this->nativesession->delete('username');
		$this->nativesession->delete('ispengunjung');
		redirect('/');
	}
}