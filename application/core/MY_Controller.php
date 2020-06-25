<?php
class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Load model, jika ada.
        $model = strtolower(get_class($this));
        if (file_exists(APPPATH . 'models/' . $model . 'Model.php')) {
            $this->load->model($model . 'Model', $model, true);
        }

        // Data yang berkaitan dengan login.
        $username = $this->nativesession->get('username');
        $isLogin  = $this->nativesession->get('isLogin');
        $level    = $this->nativesession->get('level');
        $nim       = $this->nativesession->get('nim');

        // Load global data untuk view. Untuk mempersingkat
        // pemanggilan variabel-variabel login.
        $this->load->vars([
            'username'  => $username,
            'isLogin'   => $isLogin,
            'level'     => $level,
            'nim'       => $nim,
        ]);
    }
}
