<?php

// Menampilkan flash message (redirect).
function hapusSession()
{
    $CI =& get_instance();

    $username   = $CI->nativesession->get('username');
    $isLogin    = $CI->nativesession->get('isLogin');
    $level      = $CI->nativesession->get('level');
    $email      = $CI->nativesession->get('email');
    $captcha    = $CI->nativesession->get('captcha');
    $captchaCode    = $CI->nativesession->get('captchaCode');
    $user 			= $CI->nativesession->get('user');

    $CI->nativesession->deleteArray(array('username','isLogin','level','captcha','captchaCode','email','user'));
}



