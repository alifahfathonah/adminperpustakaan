<?php
class MahasiswaModel extends MY_Model
{
    protected $perPage = 10;
    public $table      = 'mahasiswa';
        function __construct(){
            parent::__construct();
            //load our second db and put in $db2
            $this->buku = $this->load->database('buku', TRUE);

        }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'email',
                'label' => 'Alamat Email',
                'rules' => 'trim|required|valid_email'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'nim',
                'label' => 'Nomor Induk Mahasiswa',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'nik',
                'label' => 'Nomor Induk KTP',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'nama',
                'label' => 'Nama Anda',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'alamat',
                'label' => 'Alamat Lengkap',
                'rules' => 'trim|required|alpha_numeric_spaces'
            ],
            [
                'field' => 'gender',
                'label' => 'Jenis Kelamin',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'kode_post',
                'label' => 'Kode Post',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'tmp_lahir',
                'label' => 'Tempat Lahir',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'tgl_lahir',
                'label' => 'Tanggal Lahir',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'agama',
                'label' => 'Agama',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'jurusan',
                'label' => 'Jurusan',
                'rules' => 'trim|required|in_list[Teknik Informatika,Teknik Mekatronik,Teknik Telekomunikasi,Teknik Alat Berat]'
            ],
            [
                'field' => 'angkatan',
                'label' => 'angkatan',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'hp',
                'label' => 'Nomor HP/Telpn',
                'rules' => 'trim|required'
            ],
            [

                'field'     => 'confirmpassword',
                'label'     => 'Ulangi Password',
                'rules'     => 'trim|required|matches[password]',
            ]

        ];

        return $validationRules;
    }

    public function getDefaultValues()
    {
        return [
            'nik'               => '',
            'nim'               => '',
            'nama'               => '',
            'alamat'               => '',
            'gender'               => '',
            'kode_post'               => '',
            'tmp_lahir'               => '',
            'agama'               => '',
            'jurusan'               => '',
            'angkatan'               => '',
            'hp'               => '',
            'email'               => '',
            'password'          => '',
            'tgl_lahir'         => '',
            'status'        => '',
            'confirmpassword'       => '',
        ];
    }

    public function getDefaultValuesLogin(){
        return [
            'email'     => '',
            'password'  => ''
        ];
    }

    public function getValidationRulesLogin(){

        $validationRules=[
            [
                'field' => 'email',
                'label' => 'Alamat Email',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required'
            ],


        ];

        return $validationRules; 
    }

    public function getDefaultValuesUpload(){
        return [
            'judul'     => '',
            'pengarang'  => '',
            'penerjemah' => '',
            'kategori'  => '',
            'cetakan'   => '',
            'tahun' => '',
            'penerbit'  => '',
            'kota'   => '',
            'sub_kategori' =>'',
            'sinopsis' =>''
        ];
    }

    public function getValidationRulesUpload(){

        $validationRules=[
            [
                'field' => 'judul',
                'label' => 'Judul',
                'rules' => 'trim|required|callback_judul_unik'
            ],
            [
                'field' => 'sub_kategori',
                'label' => 'Sub Kategori',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'pengarang',
                'label' => 'Pengarang',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'penerjemah',
                'label' => 'Penerjemah',
                'rules' => 'trim|required'
            ],
            [

                'field' => 'kategori',
                'label'     => 'Kategori',
                'rules'     => 'trim|required'
            ],
            [
                'field' => 'cetakan',
                'label'     => 'Cetakan',
                'rules'     => 'trim|required',
            ],
            [
                'field' => 'tahun',
                'label'     => 'Tahun',
                'rules'     => 'trim|required',
            ],
            [
                'field' => 'penerbit',
                'label'     => 'Penerbit',
                'rules'     => 'trim|required',
            ],
            [
                'field' => 'kota',
                'label'     => 'Kota',
                'rules'     => 'trim|required',
            ],
            [
                'field' => 'sinopsis',
                'label'     => 'Sinopsis',
                'rules'     => 'trim|required',
            ],



        ];

        return $validationRules;

    }



    public function login($input)
    {
        if (isset($_SESSION['captchaCode']) && $_SESSION['captchaCode'] >=4) {
            if ($_SESSION['captchaCode'] <> $this->input->post('captcha') ) {
               return false;
            }
         }

        $mahasiswa = $this->db->where('email', $input->email)
                        ->where('password', $input->password)
                        ->where('status', 'setuju')
                        ->limit(1)
                        ->get($this->table)
                        ->row();

        if ($mahasiswa) {
            $this->nativesession->delete('captcha');
            $this->nativesession->delete('captchaCode');
            $this->nativesession->set('username' , $mahasiswa->nama);
            $this->nativesession->set('isLogin' , true);
            $this->nativesession->set('level','mahasiswa');
            $this->nativesession->set('email',$mahasiswa->email.'/'.$mahasiswa->nim);
            $this->nativesession->set('nim',$mahasiswa->nim);
            //$this->nativesession->set('user',$mahasiswa->email);
            $_SESSION['user'] = aencrypt($mahasiswa->email);
            return true;
        }

        return false;
    }


    public function uploadImage($fieldname,$filenama){
        $config     = [
            'upload_path'        => './assets/mahasiswa/',
            'allowed_types'     => 'gif|jpg|png',
            'max_size'          => 5024, //25MB
            'max_width'         => 1000,
            'max_height'        => 1000,
            'overwrite'         => true,
            'file_ext_tolower'  => true, 
            'file_name'         => $filenama,
        ];


        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload($fieldname)) {
            // Upload OK, return uploaded file info.
            return $this->upload->data();
        } else {
            // Add error to $_error_array
            $this->form_validation->add_to_error_array($fieldname, $this->upload->display_errors('', ''));
            return false;
        }
    }

    public function coverResize($fieldname, $source_path, $width, $height)
    {
        $config = [
            'image_library'  => 'gd2',
            'source_image'   => $source_path,
            'maintain_ratio' => true,
            'width'          => $width,
            'height'         => $height,
            'new_image'        => './assets/mahasiswa/asli/',

        ];

        $this->load->library('image_lib', $config);

        if ($this->image_lib->resize()) {
            return true;
        } else {
            $this->form_validation->add_to_error_array($fieldname, $this->image_lib->display_errors('', ''));
            return false;
        }
    }

    public function viewBuku()
    {
        //mencari buku yang dibaca oleh mahasiswa
        $cari = $this->db->where('iduser','123@mail.com')->order_by('time_live', 'DESC')->paginate($perPage)->get('trackpage');
        //$query = $this->buku->get('database_buku');
        return $cari->result();
    }

    public function uploadImageSampul($fieldname,$input){
        $config     = [
            'upload_path'        => '../buku/buku_data/'.$input->kategori.'/'.$input->uniq,
            'allowed_types'     => 'gif|jpg|png|pdf',
            'max_size'          => 5024, //25MB
            'max_width'         => 1000,
            'max_height'        => 1000,
            'overwrite'         => true,
            'file_ext_tolower'  => true,
        ];


        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload($fieldname)) {
            // Upload OK, return uploaded file info.
            return $this->upload->data();
        } else {
            // Add error to $_error_array
            $this->form_validation->add_to_error_array($fieldname, $this->upload->display_errors('<code>', '</code>'));
            return false;
        }
    }

    public function uploadImageBuku($fileBuku,$input){
        $config     = [
            'upload_path'        => '../buku/buku_data/'.$input->kategori.'/'.$input->uniq,
            'allowed_types'     => 'pdf',
            'max_size'          => 5024, //25MB
            'max_width'         => 1000,
            'max_height'        => 1000,
            'overwrite'         => true,
            'file_ext_tolower'  => true,
        ];


        $this->load->library('upload', $config);
        if ($this->upload->do_upload($fileBuku)) {
            // Upload OK, return uploaded file info.
            return $this->upload->data();
        } else {
            // Add error to $_error_array
            $this->form_validation->add_to_error_array($fileBuku, $this->upload->display_errors('<code>', '</code>'));
            return false;
        }
    }
    
    function qrCode($input){

        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = "../buku/buku_data/".$input->kategori."/".$input->uniq."/"; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 
        $image_name=$input->uniq.'.png'; //buat name dari qr code sesuai dengan nim
        $nim = 'b.id/v?i='.$input->uniq;
        $params['data'] = $nim; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params);
        // PEMBERIAN lOGO

        $logopath = 'assets/logo.png';
        $filepath = "/var/www/html/buku/buku_data/".$input->kategori."/".$input->uniq."/".$image_name;
        $QR = imagecreatefrompng($filepath);

        // START TO DRAW THE IMAGE ON THE QR CODE
        $logo = imagecreatefromstring(file_get_contents($logopath));
        $QR_width = imagesx($QR);
        $QR_height = imagesy($QR);

        $logo_width = imagesx($logo);
        $logo_height = imagesy($logo);

        // Scale logo to fit in the QR Code
        $logo_qr_width = $QR_width/3;
        $scale = $logo_width/$logo_qr_width;
        $logo_qr_height = $logo_height/$scale;

        imagecopyresampled($QR, $logo, $QR_width/3, $QR_height/3, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);

        // Save QR code again, but with logo on it
        return imagepng($QR,$filepath);

        // End DRAWING LOGO IN QR CODE

 
    }

    function gen_qr($data){
         // outputs image directly into browser, as PNG stream 
        QRcode::png(urlencode($data), false, QR_ECLEVEL_M, 19, 1);
    }

    function uploadBuku($input){
        
        $no = $this->buku->query("select no from database_buku order by no DESC LIMIT 1")->row_array();
        $nn = $no['no']+1;
        $kategori = $this->buku->where('no',$input->kategori)->get('kategori')->row();
        $s_kat = $kategori->kategori;
        $img = "../buku/buku_data/".$input->kategori."/".$input->uniq."/".$input->uniq.".png";
        $url = 'http://localhost/buku/create?data=b.id/v?i='.$input->uniq;
        $data = 'Some file data';
        // Memanggil Qrcode;
        $Qr = $this->qrCode($input);
        if ( ! $Qr)
        {
                return false;
        }
        else
        {

            $data = array(
                'no'                => $nn,            
                'id_f'              => $input->uniq,
                'judul'             => $input->judul,
                'kategori'          => $s_kat,
                'pengarang'         => $input->pengarang,
                'penerjemah'        => $input->penerjemah,
                'cetakan'           => $input->cetakan,
                'tahun'             => $input->tahun,
                'penerbit'          => $input->penerbit,
                'sinopsis'          => $input->sinopsis,
                'kota'              => $input->kota,
                'tgl_upload'        => date('Y-m-d H:i:s',time()),
                're_cari'           => 0,
                're_buka'           => 0,
                'dir'               => $input->kategori,
                'sub_kategori'      => $input->sub_kategori,
                'n_file'            => $input->n_file,
                's_file'            => $input->s_file,
                'b_file'            => $input->uniq.".png",

            );

            $cari_no = $this->db->select('no_upload')->from('bukti_upload')->limit(1)->order_by('id_buktiupload','DESC')->get()->row();
            $no = explode("/", $cari_no->no_upload) ;
            $no_1 = FormatNoTrans($no[1]);
            //$no1 = $no[1]+1;
            $bukti_upload = array(
                'no_upload'    => "SUB/".$no_1.'/BLN/'.date('m',time()).'/THN/'.date('y',time()),
                'nim'   => $this->nativesession->get('nim'),
                'judul' => $input->judul,
                'kategori' => $s_kat,
                'pengarang' => $input->pengarang,
                'penerbit' => $input->penerbit,
                'cetakan' => $input->cetakan,
                'tahun' => $input->tahun,
                'status' => 'tunda',
                'qrCode'    => $input->uniq,
            );
            $this->db->insert('bukti_upload',$bukti_upload);
            $this->buku->insert('database_buku',$data);
            return true;


        }
    }


    function liveSearchsub_kategori($keyword){
      $sql = "select * from sub_kategori
              inner join kategori
              on (sub_kategori.id_kat=kategori.no)
              where kategori.no = '$keyword'
            group by sub_kategori.id_sub 
            ";
      return $this->buku->query($sql)->result();
    }

}





































