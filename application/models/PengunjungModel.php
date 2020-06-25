<?php
class PengunjungModel extends MY_Model
{
    public $table = 'pengunjung';

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
                'field' => 'hp',
                'label' => 'HP',
                'rules' => 'trim|required|numeric|regex_match[/^0/]',
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

    public function login($input)
    {
        //$input->password = md5($input->password);

        $user = $this->db->where('email', $input->email)
                         ->where('password',$input->password)
                         ->limit(1)
                         ->get($this->table)
                         ->row();

        if ($user) {
            $data = [
                'email' => $user->email,
                'isLogin'  => true,
            ];
            $this->nativesession->set('email' , $user->email);
            $this->nativesession->set('isLogin' , true);
            return true;
        }

        return false;
    }

    public function logout()
    {
        
    }
}
