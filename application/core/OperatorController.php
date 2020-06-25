<?php
class OperatorController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Data yang berkaitan dengan login.
        $username = $this->nativesession->get('username');
        $isLogin  = $this->nativesession->get('isLogin');
        $level    = $this->nativesession->get('level');

        if (!$isLogin) {
            redirect(base_url());
            return;
        }
    }
}
