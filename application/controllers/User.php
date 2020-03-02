<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'my profil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    //editprofil 
    public function editProfil()
    {
        $data['title'] = 'edit profil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('name', 'Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {

            $email = $this->input->post('email');
            $name = $this->input->post('name');

            //jika ada gambar 
            $upload = $_FILES['image']['name'];

            if ($upload) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.png') {

                        unlink(FCPATH . 'assets/img/' . $old_image);
                    }


                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {

                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data telah berhasil diupdate!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');

            redirect('user');
        }
    }



    // ubah password
    public function changepassword()
    {
        $data['title'] = 'change password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('passwordlama', 'Password lama', 'required|trim', [
            'required' => 'kolom tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('newpassword', 'New Password', 'required|trim|min_length[6]|matches[newpassword2]',  [
            'required' => 'kolom tidak boleh kosong!', 'matches' => 'password tidak sama!', 'min_length' => 'password minimal 6 karakter!'
        ]);
        $this->form_validation->set_rules('newpassword2', 'Confirm Newpassword', 'required|trim|min_length[3]|matches[newpassword]', [
            'required' => 'kolom tidak boleh kosong!', 'matches' => 'password tidak sama!', 'min_length' => 'password minimal 6 karakter!'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {

            $passwordlama = $this->input->post('passwordlama');
            $newpassword = $this->input->post('newpassword');
            if (!password_verify($passwordlama, $data['user']['password'])) {

                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            password salahh!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

                redirect('user/changepassword');
            } else {
                if ($passwordlama == $newpassword) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            password tidak boleh sama!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

                    redirect('user/changepassword');
                } else {

                    $password_hash = password_hash($newpassword, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    password berhasil diubah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');

                    redirect('user/changepassword');
                }
            }
        }
    }
}
