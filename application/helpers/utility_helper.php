<?php
function is_login($redirect = false)
{
    $ci = &get_instance();
    $status = $ci->session->userdata('status') == "telah_login" ? true : false;
    if ($redirect && $status === true) {
        redirect($redirect);
    }
    return $status;
}
