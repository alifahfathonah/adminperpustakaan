<?php
// Menseting flash message (redirect).
function flashMessage($type, $message)
{
    $CI =& get_instance();
    $CI->nativesession->set($type, $message);
}

// Menampilkan flash message (redirect).
function showFlashMessage()
{
    $CI =& get_instance();

    $success = $CI->nativesession->get('success');
    $warning = $CI->nativesession->get('warning');
    $error   = $CI->nativesession->get('error');

    if ($success) {
        $alertStatus = 'alert-success';
        $message = $success;
    }
    if ($warning) {
        $alertStatus = 'alert-warning';
        $message = $warning;
    }

    if ($error) {
        $alertStatus = 'alert-danger';
        $message = $error;
    }

    $str = '';
    if ($success || $warning || $error) {
        $str  = '<div class="alert ' . $alertStatus.'">';
        $str .= '<button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>';
        $str .= '<span>'.$message.'</span>';
        $str .= '</div>';

    }

    return $str;
}

// Menseting message.
function message($type, $message)
{
    $CI =& get_instance();
    $data = $CI->load->vars($type, $message);
}

// Menampilkan message.
function showMessage()
{
    $CI =& get_instance();

    $success = $CI->load->get_var('success');
    $warning = $CI->load->get_var('warning');
    $error   = $CI->load->get_var('error');

    if ($success) {
        $alertStatus = 'alert-success';
        $message = $success;
    }

    if ($warning) {
        $alertStatus = 'alert-warning';
        $message = $warning;
    }

    if ($error) {
        $alertStatus = 'alert-danger';
        $message = $error;
    }

    $str = '';
    if ($success || $warning || $error) {
        $str  = '<div class="alert ' . $alertStatus . '">';
        $str .= '<button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>';
        $str .= $message;
        $str .= '</div>';
    }

    return $str;
}
