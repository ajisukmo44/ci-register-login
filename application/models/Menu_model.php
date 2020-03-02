<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{


    public function getsubMenu()
    {
        $query = "SELECT a.*, b.menu FROM user_sub_menu a JOIN user_menu b ON a.menu_id = b.menu_id";

        return $this->db->query($query)->result_array();
    }

    public function editMenu($where, $datasubmenu)
    {
        $this->db->where($where);
        $this->db->update('user_sub_menu', $datasubmenu);
    }

    public function hapusMenu($menu_id)
    {
        $this->db->delete('user_menu', ['menu_id' => $menu_id]);
    }
    public function hapusSubMenu($id)
    {
        $this->db->delete('user_sub_menu', ['id' => $id]);
    }
}
