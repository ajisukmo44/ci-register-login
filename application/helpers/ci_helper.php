<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $access_id = $ci->session->userdata('access');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['menu_id'];

        $userAccess = $ci->db->get_where('user_access_menu', ['access_id' => $access_id, 'menu_id' => $menu_id]);


        if ($userAccess->num_rows() < 1) {

            redirect('auth/blocked');
        }
    }
}


function check_access($access_id, $menu_id)
{

    $ci = get_instance();
    $ci->db->where('menu_id', $menu_id);
    $ci->db->where('access_id', $access_id);
    $result = $ci->db->get('user_access_menu');
    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
