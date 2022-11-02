<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NBC
extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //LOAD MODELS
    $this->load->model('M_nbc');
  }

  public function index()
  {
    if ($this->session->userdata('username') == NULL) {

      $this->session->set_flashdata('f_role', "Anda belum memulai <b>session</b>!, Silahkan mulai <b>session</b> anda!");
      redirect('login');
    } else if ($this->session->userdata('username') != NULL) {

      $value['PageTitle'] = 'Naive Bayes Classifier (NBC) - Index';

      $this->load->view('include/head', $value);
      $this->load->view('include/alert');
      $this->load->view('include/top-header');
      $this->load->view('include/sidebar', $value);
      $this->load->view('nbc', $value);
      $this->load->view('include/footer');
    }
  }
}
