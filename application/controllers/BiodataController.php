<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BiodataController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('BiodataModel');

        $this->form_validation->set_error_delimiters(
            $this->config->item('error_start_delimiter', 'ion_auth'),
            $this->config->item('error_end_delimiter', 'ion_auth')
        );

    }

    /**
     * Create Function
     */
    public function create()
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        } else {
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('umur', 'Umur', 'required');
            if (empty($_FILES['userfile']['name'])) {
                $this->form_validation->set_rules('userfile', 'Foto', 'required');
            }

            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'nama'      => $this->input->post('nama'),
                    'umur'      => $this->input->post('umur'),
                    'foto'      => $this->input->post('userfile'),
                    'create_at' => date("Y-m-d h:i:sa"),
                    'update_at' => date("Y-m-d h:i:sa"),
                );

                $this->load->view('biodata/create', $data);
            } else {
                $user_upload_path = 'uploads/foto/';
                $config['upload_path'] = './' . $user_upload_path;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload()) {
                    $data = array(
                        'nama'      => $this->input->post('nama'),
                        'umur'      => $this->input->post('umur'),
                        'foto'      => $this->input->post('userfile'),
                        'create_at' => date("Y-m-d h:i:sa"),
                        'update_at' => date("Y-m-d h:i:sa")
                    );

                    $this->load->view('biodata/create', $data);
                } else {
                    $data_upload = $this->upload->data();
                    $file_name   = $data_upload["file_name"];

                    $data = array(
                        'nama'      => $this->input->post('nama'),
                        'umur'      => $this->input->post('umur'),
                        'foto'      => $file_name,
                        'create_at' => date("Y-m-d h:i:sa"),
                        'update_at' => date("Y-m-d h:i:sa"),
                    );

                    $this->BiodataModel->create($data);
                    $this->session->set_flashdata('add_success','Biodata berhasil dibuat');
                    redirect('/biodata');
                }
            }
        }
    }

    /**
     * Read Function
     */
    public function read($id)
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        } else {
            $result = $this->BiodataModel->read($id)->row();

            $data = array(
                'data'      => $result,
            );
            $this->load->view('biodata/read', $data);
        }
    }

    /**
     * Update Function
     */
    public function update()
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        } else {
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('umur', 'Umur', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'id'        => $this->input->post('id'),
                    'nama'      => $this->input->post('nama'),
                    'umur'      => $this->input->post('umur'),
                    'foto'      => $this->input->post('file'),
                    'create_at' => date("Y-m-d h:i:sa"),
                    'update_at' => date("Y-m-d h:i:sa"),
                );

                $this->load->view('biodata/edit', $data);
            } else {
                $user_upload_path = 'uploads/foto/';
                $config['upload_path'] = './' . $user_upload_path;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);

                if ($_FILES['userfile']['name']) {
                    if ($this->upload->do_upload()) {
                        $image = $this->BiodataModel->read($this->input->post('id'))->row();
                        if (empty($image->foto)) {
                            // do not nothing or continue to next prosses
                        } else {
                            unlink('uploads/foto/'. $image->foto);
                        }

                        $data_upload = $this->upload->data();
                        $file_name   = $data_upload["file_name"];

                        $data = array(
                            'id'        => $this->input->post('id'),
                            'nama'      => $this->input->post('nama'),
                            'umur'      => $this->input->post('umur'),
                            'foto'      => $file_name,
                            'create_at' => date("Y-m-d h:i:sa"),
                            'update_at' => date("Y-m-d h:i:sa"),
                        );

                        $this->BiodataModel->update($id = $data['id'],$data);
                        $this->session->set_flashdata('edit_success','Biodata berhasil diupdate');
                        redirect('/biodata');
                    } else {
                        return false;
                    }
                } else {
                    $data = array(
                        'id'        => $this->input->post('id'),
                        'nama'      => $this->input->post('nama'),
                        'umur'      => $this->input->post('umur'),
                        'create_at' => date("Y-m-d h:i:sa"),
                        'update_at' => date("Y-m-d h:i:sa"),
                    );

                    $this->BiodataModel->update($id = $data['id'],$data);
                    $this->session->set_flashdata('edit_success','Biodata berhasil diupdate');
                    redirect('/biodata');
                }
            }
        }
    }

    /**
     * Delete Function
     */
    public function delete($id)
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        } else {
            $image = $this->BiodataModel->read($id)->row();
            if (empty($image->foto)) {
                // do not nothing or continue to next prosses
            } else {
                unlink('uploads/foto/'. $image->foto);
            }
            $this->BiodataModel->delete($id);
            $this->session->set_flashdata('delete_success','Biodata terpilih berhasil di hapus');
            redirect('/biodata');
        }
    }

    /**
     * Index Function
     */
    public function index()
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        } else {
            $data = array(
                'data'      => $this->BiodataModel->index(),
            );
            $this->load->view('biodata/index', $data);
        }
    }

    /**
     * Input Function
     */
    public function input()
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        } else {
            $data = array(
                'nama'      => "",
                'umur'      => "",
                'foto'      => "",
                'create_at' => date("Y-m-d h:i:sa"),
                'update_at' => date("Y-m-d h:i:sa"),
            );

            $this->load->view('biodata/create', $data);
        }
    }

    /**
     * Edit Function
     */
    public function edit($id)
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        } else {
            $query = $this->BiodataModel->read($id)->row();

            $data = array(
                'id'        => $query->id,
                'nama'      => $query->nama,
                'umur'      => $query->umur,
                'foto'      => $query->foto,
                'create_at' => $query->create_at,
                'update_at' => $query->update_at,
            );

            $this->load->view('biodata/edit', $data);
        }
    }
}
