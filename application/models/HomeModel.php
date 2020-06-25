<?php
class HomeModel extends MY_Model
{
    public $table = '';

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'email',
                'label' => 'email',
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

    public function getDefaultValues()
    {
        return [
            'email' => '',
            'password' => '',
        ];
    }

    public function validatePengunjung(){

        $config = array(
            array(
                'field'  => 'hp',
                'label'  => 'HP',
                'rules'  => 'trim|required|numeric|regex_match[/^0/]',
                'errors' => array(
                    'numeric' => 'Berisi Angka 0- 9',
                    'regex_match' => 'Harus diawali angka 0',
                )
            ),
            array(
                'field' => 'confirmpassword',
                'label' => 'Ulangi Password',
                'rules' => 'trim|required|matches[password]'

            ),
            array(

                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|alpha_numeric|min_length[8]',
                'errors' => array(
                    'alpha_numeric' => 'Hanya Berisi Nomor dan Huruf'
                )
            ),
            
            array(

                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_emails|is_unique[pengunjung.email]'
            ),

            array(
                'field' => 'status',
                'label'     => 'Syarat dan Ketentuan',
                'rules'     => 'trim|required',
                'errors'    => array(
                    'required' => 'Harus DiCentang',
                )
            )
        );

        $this->form_validation->set_error_delimiters(
            ' <div class="invalid-feedback">',
            '</div>'
        );
        $this->form_validation->set_rules($config);
        return $this->form_validation->run();

    }

    public function notif()
    {
        return $this->db->select('*')
                ->from('table_log')
                ->where('read_status',0)
                ->get();

    }

    public function data()
    {
        return $this->db->select('*')
                ->from('table_log')
                ->where('read_status',0)
                ->order_by('log_id','desc')
                ->limit('8')
                ->get();
    }

    function edit($id) {
        $this->db->where('nim', $id);
        $query = $this->db->get('mahasiswa');
        return $query->row();
    }

    function validationRulesEdit(){
        $validation = [
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

        ];

        $this->form_validation->set_rules($validation);
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        return $this->form_validation->run();
    }

    function prosesedit() {
       
        $update_karyawan = array(
            'nik'       => $this->input->post('nik'),
            'nim'       => $this->input->post('nim'),
            'nama'      => $this->input->post('nama'),
            'alamat'    => $this->input->post('alamat'),
            'gender'    => $this->input->post('gender'),
            'tmp_lahir' => $this->input->post('tmp_lahir'),
            'agama'     => $this->input->post('agama'),
            'jurusan'   => $this->input->post('jurusan'),
            'angkatan'  => $this->input->post('angkatan'),
            'hp'        => $this->input->post('hp'),
            
        );
        
        $id = $this->input->post('nim');
        $this->db->where('nim', $id);
        return $this->db->update('mahasiswa', $update_karyawan);
    
        

    }

    //Penomoran SBP
    public function nomorSBP()
    {
        $cari = $this->db->select('no_sbp')->from('bebas_pustaka')->limit(1)->order_by('id_bebaspustaka','DESC')->get()->row_array();
        // if ($cari->no_sbp == NULL) {
        $no = explode("/", $cari['no_sbp']);
            
        $no_1 = FormatNoTrans($no[0]);
        $n = "SBP/".$no_1.'/BLN/'.date('m',time()).'/THN/'.date('y',time());
        $bln = "12";
        $thn = "2018";

        return  $n;
    }
}
