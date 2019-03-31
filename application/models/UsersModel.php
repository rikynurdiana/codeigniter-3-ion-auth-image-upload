<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersModel extends CI_Model
{
    public function getUsername($email)
    {
        $this->db->select('first_name');
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        return $query->row();
    }

}
