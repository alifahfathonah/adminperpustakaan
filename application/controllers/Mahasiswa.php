<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * class controller mahasiswa
 */
class Mahasiswa extends MY_Controller
{
    function __construct(){
        parent::__construct();

        $this->load->library('bebasPustaka');
        //jika belum login redirect ke login
        
        //jika belum login redirect ke login
        /*
        if ($this->session->userdata('logged_in')<>1) { 
            redirect('index.php/admin');
        }
        */
        
        // $this->buku = $this->load->database('buku', TRUE);
        $this->load->model('MahasiswaModel','mahasiswa',true);
        $this->load->library('ciqrcode'); //pemanggilan library QR CODE
        $this->load->helper(array('nomor'));

    }

    public function index(){ 

      
      if (!$_POST) {
          //hapusSession();
        $input = (object) $this->mahasiswa->getDefaultValuesLogin();

        message('success','Silahkan Login');
          
      }else
      {

        message('error','Maaf ada yang salah');
        $input = (object) $this->input->post(null,true);
      }

            $captcha = [
              [
                'field' => 'captcha',
                'label' => 'Captcha',
                'rules' => 'trim|required',
                'errors' => array(
                        'required' => 'Harus diisi.',
                ),
              ]
            ];

       if (isset($_SESSION['captcha'])) {
          if ($_SESSION['captcha'] >=4) {
            $this->form_validation->set_rules($captcha);
          }else{
            $_SESSION['captcha'] = $_SESSION['captcha']+1;

            //$this->load->vars('error','Maaf login gagal');
          }          
           
       }else
       {
        $_SESSION['captcha']=1;
       }


      if (!$this->mahasiswa->validateLogin()) {
        
        $form_action  = 'mahasiswa'; 
        $this->load->view('mahasiswa/login', compact('input','form_action'));
        return;
      }

      if ($this->mahasiswa->login($input)) {
          log_session('Login','Login Ke Dashboard Mahasiswa');
          redirect(base_url().'mahasiswa/home','refresh');
      };

      flashMessage('error',
        'Email dan Password Salah, Akun Terblokir'
      );
      redirect(base_url().'mahasiswa', 'refresh'); 
      //echo "Gagal";
      
    } 

    public function home(){

      $isLogin = $this->load->get_var('isLogin');
      if (!$isLogin) {
            redirect(base_url());
            return;
      }
      $nim = $this->load->get_var('nim');
      $bukti_upload = $this->db->select("*")->from('bukti_upload')->where('nim',$nim)->get();
      $halaman    = 'dashboard';
      $mainView   = 'mahasiswa/index';
      $this->load->view('mahasiswa/template_home',compact('mainView','halaman','bukti_upload'));
      
    }

    public function profile(){

      $isLogin = $this->nativesession->get('email');
      if (!$isLogin) {
            redirect(base_url());
            return;
      }
        $email      = $this->nativesession->get('email'); 
        $email1 = explode('/',$email);
        $profile    = $this->mahasiswa->where('email',$email1[0])->get();
        if (!$profile) {
          flashMessage('error', 
            'Email/Password Salah, Akun Terblokir'
          );

          redirect(base_url().'mahasiswa', 'refresh');
        }else{
          $input = (object) $profile;
          $halaman    = 'profile';
          $mainView   = 'mahasiswa/profile';
          $this->load->view('mahasiswa/template_home',compact('mainView','halaman','email','input'));
        }
    }     
    //function mensubmit database 

    public function create(){
            //load our Nativesession library  
            if (!$_POST) {
              $input = (object) $this->mahasiswa->getDefaultValues();
            }else{
              $input = (object) $this->input->post(null,true);

            };
            $status = [
              [
                'field' => 'status',
                'label' => 'Syarat dan Ketentuan',
                'rules' => 'trim|required',
                'errors' => array(
                        'required' => 'Harus dicentang.',
                ),
              ]
            ];


            $this->form_validation->set_rules($status);
            
            if (!$this->mahasiswa->validate()) {
              # code...
              
              $this->nativesession->set('warning','Mohon diisi Data dengan Lengkap, dan Valid');
              $form_action    = 'mahasiswa/create';
              $mainView     = 'mahasiswa/register';
              $this->load->view('mahasiswa/template',compact('mainView','input','form_action'));
              return;
            }

            $data = array(
              'nim'     => $input->nim,
              'nik'     => $input->nik,
              'nama'    => $input->nama,
              'alamat'  => $input->alamat,
              'gender'  => $input->gender,
              'kode_post'   => $input->kode_post,
              'tmp_lahir'   => $input->tmp_lahir,
              'tgl_lahir'   => $input->tgl_lahir,
              'agama'       => $input->agama,
              'jurusan'     => $input->jurusan,
              'angkatan'    => $input->angkatan,
              'hp'      => $input->hp,
              'email'   => $input->email,
              'password'    => $input->password,
            );
            if ($this->mahasiswa->insert($data)) {
              $this->nativesession->set('success','Data Berhasil Masuk');
              log_session('tambah', 'Daftar Data Mahasiswa');

            }else{
              $this->nativesession->set('error','Data Gagal Masuk');
            }

            redirect(base_url().'register','refresh');
            
    }

    //function update mahasiswa
    public function update(){

      $isLogin = $this->load->get_var('isLogin');
      if (!$isLogin) {
            redirect(base_url());
            return;
      }

        $email      = $this->nativesession->get('email'); 
        $profile    = $this->mahasiswa->where('email',$email)->get();
        if (!$profile) {
          flashMessage('error',
            'Data Mahasantri tidak ada'
          );

          redirect(base_url().'mahasiswa/profile', 'refresh');
        }
            if (!$_POST) {
              $input = (object) $profile;
            }else{
              $input = (object) $this->input->post(null,true);

            }

            $input->image = $profile->image;
            if (!empty($_FILES)  && $_FILES['image']['size'] > 0 ) {
              $namaGambar   = date('YmdHis');
              $upload       = $this->mahasiswa->uploadImage('image',$namaGambar);
              if ($upload) {
                # code...
                $input->image  = "$namaGambar.jpg";
                $data['image'] = $input->image;
                //Data for column "image"
                 $this->mahasiswa->coverResize("image","./assets/mahasiswa/$namaGambar.jpg",100,150);

              }
            }

            if (!$this->mahasiswa->validate()  || $this->form_validation->error_array()) {

              //$input = (object) $profile;
              $this->nativesession->set('warning','Mohon diisi Data dengan Lengkap, dan Valid');
              $halaman    = 'profile';
              $mainView   = 'mahasiswa/profile';
              $this->load->view('mahasiswa/template_home',compact('mainView','halaman','email','input'));
              return;
            }
            $data = array(
              'nama'    => $input->nama,
              'alamat'  => $input->alamat,
              'gender'  => $input->gender,
              'kode_post'   => $input->kode_post,
              'tmp_lahir'   => $input->tmp_lahir,
              'tgl_lahir'   => $input->tgl_lahir,
              'agama'       => $input->agama,
              'jurusan'     => $input->jurusan,
              'angkatan'    => $input->angkatan,
              'hp'      => $input->hp,
              'email'   => $input->email,
              'password'    => $input->password,
            );

            if ($this->mahasiswa->where('nik',$input->nik)->update($data)) {
                $this->nativesession->set('success','Data Berhasil diUpdate');
                log_session('edit', 'Update Data Mahasiswa');
            }else
            {
              $this->nativesession->set('error','Data Gagal DiUpdate');
              log_session('gagal', 'Gagal update Mahasiswa');
            }           

            redirect(base_url().'mahasiswa/profile','refresh');

    }

    public function upload(){
      $isLogin = $this->load->get_var('isLogin');
      if (!$isLogin) {
            redirect(base_url());
            return;
      }
      
      //Ambil table kategori;
      $kategori = $this->buku->query("select * from kategori")->result();
      
      if (!$_POST) {
        $input = (object) $this->mahasiswa->getDefaultValuesUpload();
      }else{
        $input = (object) $this->input->post(null,true);

      }

      $input->uniq = substr(md5('http://bookless.id'.microtime().rand(1,100000)),0,6);

      if (!empty($_FILES)  && $_FILES['s_file']['size'] > 0 && $_FILES['n_file']['size'] > 1 ) {
        
        $upload       = $this->mahasiswa->uploadImageSampul('s_file',$input);
        $uploadBuku       = $this->mahasiswa->uploadImageBuku('n_file',$input);
        if ($upload && $uploadBuku ) {
          $input->s_file  = $upload['file_name'];
          $input->n_file = $uploadBuku['raw_name'];
          //Data for column "image"
           //$this->mahasiswa->coverResize("image","./assets/mahasiswa/$namaGambar.jpg",100,150);

        }
      }else{
        $this->form_validation->set_rules('s_file', 'Sampul Buku', 'trim|required');
        $this->form_validation->set_rules('n_file', 'File Buku', 'trim|required'); 
        
      }

      if (!$this->mahasiswa->validateUpload() || $this->form_validation->error_array() ) {
        $form_action  = 'mahasiswa/upload';
        $halaman  = 'upload';
        $mainView = 'mahasiswa/upload';
        $this->load->view('mahasiswa/template_home',compact('kategori','mainView','halaman','input','form_action'));
        return;
      }

      if ($this->mahasiswa->uploadBuku($input)) {
       
        flashMessage('success',
          'Data Berhasil diUpload'
        );
        log_session('tambah', 'Upload Data Buku');
      }else{
        flashMessage('error','Gagal Insert Data');
        log_session('gagal', 'Gagal Upload Buku');
      }

      redirect('mahasiswa/upload','refresh');

    }

    //Judul Buku Unik/Harus berbeda
    function judul_unik(){
      $judul = $this->input->post('judul');

      $buku = $this->buku->where('judul',$judul)->get('database_buku')->result();
      if (count($buku)) {
        $this->form_validation->set_message('judul_unik','%s sudah ada, Cari Lain');
        return false;
      }

      return true;

    }


    public function history($page = null){
      $isLogin = $this->load->get_var('isLogin');
      if (!$isLogin) {
            redirect(base_url());
            return;
      }

      $perHalaman = 5 ;
      if ($page== null) {
        $offset = 0;
      }else{
        $offset = ($page * $perHalaman)-$perHalaman;
      }

      $email = $this->nativesession->get('email');
      $email1 = explode('/',$email);

      $viewBuku   = $this->db->where('iduser',$email1[0])->like('url','buku/viewer/web/viewer?id=','both')->order_by('time_live', 'DESC')->limit($perHalaman,$offset)->get('trackpage');
      // $viewBuku = $this->db->query("SELECT * FROM `trackpage` WHERE iduser = ".$email1[0]." and url LIKE '%buku/viewer/web/viewer?id=%' limit 3,5 ");
      //$buku = $this->db->select('url');
      foreach ($viewBuku->result() as $key ) {
        $gambar = $key->url;
        $time_open[] = $key->time_open;
        $this->buku = $this->load->database('buku', TRUE);
        
        if (strpos($gambar,'viewer?id=')) {
            $g = substr($gambar,-6);
            $image[] = $this->buku->where('id_f',$g)->get('database_buku')->row_array();
            //query("SELECT * FROM `database_buku` where id_f='$g' limit 10  ")->row_array();

            
            //$image = $image['judul'];

        }
      }

      $viewBuku2 = $this->db->where('iduser',$email1[0])->like('url','buku/viewer/web/viewer?id=','both')->order_by('time_live', 'DESC')->get('trackpage')->result();
      $jumlah = count($viewBuku2);
     

      //pagination
      $this->load->library('pagination');
      $config = array(
          'base_url'    => base_url('mahasiswa/history'),
          'total_rows'  => $jumlah,
          'per_page'    => $perHalaman,
          'use_page_numbers' => true,
          

      );
        $config["num_links"] = floor($config["total_rows"] / $config["per_page"]);
       // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
      
      $this->pagination->initialize($config);
      
      $pagination = $this->pagination->create_links();
      $halaman    = 'history';
      $mainView   = 'mahasiswa/history';
      $this->load->view('mahasiswa/template_home',compact('mainView','halaman','image','pagination','jumlah','time_open'));
    }

    public function search($page = null){
      $tanggal = $this->input->get('keyboard',true);

      $perHalaman = 5 ;
      if ($page== null) {
        $offset = 0;
      }else{
        $offset = ($page * $perHalaman)-$perHalaman;
      }
      $email = $this->nativesession->get('email');
      $email1 = explode('/',$email);
      $viewBuku   = $this->db->where('iduser',$email1[0])->like('time_open',$tanggal)->like('url','buku/viewer/web/viewer?id=','both')->order_by('time_live', 'DESC')->limit($perHalaman,$offset)->get('trackpage');
      //$buku = $this->db->select('url');
      foreach ($viewBuku->result() as $key ) {
        $gambar = $key->url;
        $time_open[] = $key->time_open;
        $this->buku = $this->load->database('buku', TRUE);
        
        if (strpos($gambar,'viewer?id=')) {
            $g = substr($gambar,-6);
            $image[] = $this->buku->where('id_f',$g)->get('database_buku')->row_array();
            //query("SELECT * FROM `database_buku` where id_f='$g' limit 10  ")->row_array();

            
            //$image = $image['judul'];

        }
      }

      $viewBuku2 = $this->db->where('iduser',$email1[0])->like('time_open',$tanggal)->like('url','buku/viewer/web/viewer?id=','both')->order_by('time_live', 'DESC')->get('trackpage')->result();
      $jumlah = count($viewBuku2);
     

      //pagination
      $this->load->library('pagination');
      $config = array(
          'base_url'    => base_url('mahasiswa/search/'),
          'total_rows'  => $jumlah,
          'per_page'    => $perHalaman,
          'uri_segment' => 3,
          'use_page_numbers' => true,
          

      );

        if (count($_GET) > 0) {
            $config['suffix']    = '?' . http_build_query($_GET, '', "&");
            $config['first_url'] = $config['base_url'] . '?' . http_build_query($_GET);
        } else {
            $config['suffix']    = http_build_query($_GET, '', "&");
            $config['first_url'] = $config['base_url'];
        }
        
        $config["num_links"] = floor($config["total_rows"] / $config["per_page"]);
       // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
      
      $this->pagination->initialize($config);
      
      $pagination = $this->pagination->create_links();
      $halaman    = 'history';
      $mainView   = 'mahasiswa/history';
      $this->load->view('mahasiswa/template_home',compact('mainView','halaman','image','pagination','jumlah','time_open'));
    }

    function sub_kategori(){
      $keyword = $this->input->post('id_kat');
      $sub_kategori = $this->mahasiswa->liveSearchsub_kategori($keyword);
      // $sub_kategori = [
      //   [
      //     "nama" => " Joko",
      //     "alamat" => 'solo',
      //   ],
      //   [
      //     "nama" => " Ssus",
      //     "alamat" => 'solo',
      //   ],

      // ];
      if (count($sub_kategori)) {
        echo "<option value=''>Pilih Sub Kategori</option>";
        foreach ($sub_kategori as $key) {
          $str = '<option  value='.$key->id_sub.' '.set_select('sub_kategori', $key->id_sub).'  >';
          $str .= $key->sub_kategori;
          $str .= '</option>';
          echo $str;
        }

      }else{
          $str ='<option value="0">Tidak ada Sub Kategori</option>';
          echo $str;
        
        
      }
    }


    // Konfirmasi Upload Buku
    function konfirmUpload(){
      $no = $this->uri->uri_to_assoc(3);
      $no_bukti = "SUB/".$no['SUB'].'/BLN/'.$no['BLN'].'/THN/'.$no['THN'];
      $nim = $this->load->get_var('nim');
      $data= array(
          'no'      => $no,
          'buku'    => $this->db->select("*")->from('bukti_upload')->join('mahasiswa','mahasiswa.nim=bukti_upload.nim','right')->where('bukti_upload.nim',$nim)->where('bukti_upload.no_upload',$no_bukti)->get()->result_array(),
          
      );
      log_session('tambah', 'Buat Surat Upload Buku');

      $this->load->view('mahasiswa/konfirmUpload',$data);
    }

}
     