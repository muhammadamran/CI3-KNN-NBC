<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //LOAD MODELS
    $this->load->model('M_dashboard');
  }

  public function index()
  {
    if ($this->session->userdata('username') == NULL) {

      $this->session->set_flashdata('f_role', "Anda belum memulai <b>session</b>!, Silahkan mulai <b>session</b> anda!");
      redirect('Signin');
    } else if ($this->session->userdata('username') != NULL) {

      $value['PageTitle'] = 'Dashboard';

      $this->load->view('include/head', $value);
      $this->load->view('include/alert');
      $this->load->view('include/top-header');
      $this->load->view('include/sidebar', $value);
      $this->load->view('dashboard', $value);
      $this->load->view('include/footer');
    }
  }
}
