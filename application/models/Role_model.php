<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role_model extends CI_Model
{

    public function hapusRole($access_id)
    {
        $this->db->delete('access', ['access_id' => $access_id]);
    }
}
