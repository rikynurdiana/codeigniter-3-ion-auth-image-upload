<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BiodataModel extends CI_Model
{
    public function index()
    {
        $this->db->select('*');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('t_biodata');
        return $query->result();
    }

    public function create($data)
    {
        try {
            $this->db->insert('t_biodata', $data);
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function read($id)
    {
        try {
            $query = $this->db->where('id',$id)->limit(1)->get('t_biodata');
            return $query;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function update($id, $data)
    {
        try {
            $this->db->where('id',$id)->limit(1)->update('t_biodata', $data);
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $this->db->where('id',$id)->delete('t_biodata');
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }

}
