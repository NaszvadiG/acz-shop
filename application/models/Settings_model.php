<?php


class Settings_model extends CI_Model
{
    public function get()
    {
        $query = $this->db->get('settings');

        return $query->row_array();
    }

}