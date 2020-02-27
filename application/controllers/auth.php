<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }

  //login
  public function index()
  {
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');


    if ($this->session->userdata('email')) {
      redirect('user');
    }

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Form Login';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/login');
      $this->load->view('templates/auth_footer');
    } else {
      $this->_login();
    }
  }

  private function _login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    if ($user) {

      if ($user['status'] == 1) {
        if (password_verify($password, $user['password'])) {

          $data = [
            'email' => $user['email'],
            'access' => $user['access_id']

          ];

          $this->session->set_userdata($data);
          if ($user['access_id'] == 1) {

            redirect('Admin');
          } else {

            redirect('User');
          } {
          }
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Wrong Passwod!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');

          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                the email is not activated!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');

        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            the email is not register !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

      redirect('auth');
    }
  }




  //register
  public function register()
  {
    if ($this->session->userdata('email')) {
      redirect('user');
    }

    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
      'is_unique' => 'this email has already!'

    ]);
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
      'matches' => 'password dont match!', 'min_length' => 'password too short!'
    ]);

    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Register Account';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/register');
      $this->load->view('templates/auth_footer');
    } else {
      $data = [
        'name'  => htmlspecialchars($this->input->post('name', true)),
        'email' => htmlspecialchars($this->input->post('email', true)),
        'image' => 'default.png',
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'access_id' => 2,
        'status' => 1,
        'date_created' => time()
      ];

      $this->db->insert('user', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Congratulation your account has been created. Please Login
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

      redirect('auth');
    }
  }


  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('access_id');
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        anda telah keluar!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');

    redirect('auth');
  }


  public function blocked()
  {

    $data['title'] = 'blocked';
    $this->load->view('templates/auth_header', $data);
    $this->load->view('auth/blocked');
    $this->load->view('templates/auth_footer');
  }
}
