<?php
defined('BASEPATH') or exit('No direct script access allowed');

class knn extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //LOAD MODELS
    $this->load->model('m_knn');
  }

  public function index()
  {
    if ($this->session->userdata('username') == NULL) {

      $this->session->set_flashdata('f_role', "Anda belum memulai <b>session</b>!, Silahkan mulai <b>session</b> anda!");
      redirect('Signin');
    } else if ($this->session->userdata('username') != NULL) {

      $value['PageTitle'] = 'K-Nearest Neighbors (KNN) - Index';

      $this->load->view('include/head', $value);
      $this->load->view('include/alert');
      $this->load->view('include/top-header');
      $this->load->view('include/sidebar', $value);
      $this->load->view('knn', $value);
      $this->load->view('include/footer');
    }
  }
}
