<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }


  public function index()
  {
    $data['title'] = 'menu management';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['menu'] = $this->db->get('user_menu')->result_array();


    $this->form_validation->set_rules('menu', 'Menu', 'required');

    if ($this->form_validation->run() == false) {

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/index', $data);
      $this->load->view('templates/footer');
    } else {

      $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);

      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
           Tambah data berhasil!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

      redirect('menu');
    }
  }

  public function submenu()
  {

    $data['title'] = 'submenu management';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->model('Menu_model', 'menu');

    $data['submenu'] = $this->menu->getSubMenu();

    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'URL', 'required');
    $this->form_validation->set_rules('icon', 'icon', 'required');

    if ($this->form_validation->run() ==  false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/submenu', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'title' => $this->input->post('title'),
        'menu_id' => $this->input->post('menu_id'),
        'url' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'status' => $this->input->post('status')
      ];
      $this->db->insert('user_sub_menu', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah data berhasil!</div>');
      redirect('menu/submenu');
    }
  }


  public function editmenu()
  {

    $id = $this->uri->segment(3);
    $data['title'] = 'edit menu';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['menu'] = $this->db->get_where('user_menu', ['menu_id' => $id])->row_array();

    $this->form_validation->set_rules('menu', 'Menu', 'required|trim');
    $id = $this->input->post('menu_id');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/editmenu', $data);
      $this->load->view('templates/footer');
    } else {

      $id = $this->input->post('menu_id');
      $menu = $this->input->post('menu');
      $this->db->set('menu', $menu);
      $this->db->where('menu_id', $id);
      $this->db->update('user_menu');

      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Data telah berhasil diupdate!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </div>');

      redirect('menu');
    }
  }



  public function editsubmenu()
  {

    $id = $this->uri->segment(3);
    $data['title'] = 'edit menu';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['submenu'] = $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();

    $this->form_validation->set_rules('title', 'Title', 'required|trim');
    $this->form_validation->set_rules('url', 'Url', 'required|trim');
    $this->form_validation->set_rules('icon', 'Icon', 'required|trim');
    $this->form_validation->set_rules('status', 'Status', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/editsubmenu', $data);
      $this->load->view('templates/footer');
    } else {

      $id = $this->input->post('id');
      $menu_id = $this->input->post('menu_id');
      $title = $this->input->post('title');
      $url = $this->input->post('url');
      $icon = $this->input->post('icon');
      $status = $this->input->post('status');

      $datasubmenu = array(
        'id' => $id,
        'menu_id' => $menu_id,
        'title' => $title,
        'url' => $url,
        'icon' => $icon,
        'status' => $status
      );

      $where = array(
        'id' => $id
      );


      $this->load->model('Menu_model', 'menu');
      $this->menu->editMenu($where, $datasubmenu);

      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Data telah berhasil diupdate!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </div>');

      redirect('menu/submenu');
    }
  }







  public function hapus($menu_id)
  {

    $this->load->model('Menu_model', 'menu');
    $this->menu->hapusMenu($menu_id);
    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data berhasil di hapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    redirect('menu');
  }








  public function submenuhapus($id)
  {

    $this->load->model('Menu_model', 'menu');
    $this->menu->hapusSubMenu($id);
    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data berhasil di hapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    redirect('menu/submenu');
  }
}
