<?php
defined('BASEPATH') or exit('No direct script access allowed');

class profile extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //LOAD MODELS
    $this->load->model('m_profile');
    $this->load->model('Model_dynamic_dependent', 'Mdependent');
  }

  public function index()
  {
    $user = $this->session->userdata('username');

    if ($user == NULL) {

      $this->session->set_flashdata('f_role', "Anda belum memulai <b>session</b>!, Silahkan mulai <b>session</b> anda!");
      redirect('signin');
    } else if ($user != NULL) {

      $value['provinsi'] = $this->Mdependent->get_provinsi();

      $this->load->view('include/head');
      $this->load->view('include/alert');
      $this->load->view('include/top-header');
      $this->load->view('include/sidebar');
      $this->load->view('profile', $value);
      $this->load->view('include/footer');
    }
  }

  // UPDATE PROFILE
  public function updating()
  {
    $ID = $this->input->post('username');

    $dataUsers = array(
      'NIK' => $this->input->post('NIK'),
      'NIP' => $this->input->post('NIP'),
      'GelarDepan' => $this->input->post('GelarDepan'),
      'NamaLengkap' => $this->input->post('NamaLengkap'),
      'GelarBelakang' => $this->input->post('GelarBelakang'),
      'JenisKelamin' => $this->input->post('JenisKelamin'),
      'TempatLahir' => $this->input->post('TempatLahir'),
      'TanggalLahir' => $this->input->post('TanggalLahir'),
      'Usia' => $this->input->post('Usia'),
      'Agama' => $this->input->post('Agama'),
      'StatusNikah' => $this->input->post('StatusNikah'),
      'GolonganDarah' => $this->input->post('GolonganDarah'),
      // 'DepartemenID' => $this->input->post('DepartemenID'),
      'StatusPegawai' => $this->input->post('StatusPegawai'),
      'Tgl_Masuk' => $this->input->post('Tgl_Masuk'),
      'Alamat' => $this->input->post('Alamat'),
      'Provinsi' => $this->input->post('Provinsi'),
      'KotaKab' => $this->input->post('KotaKab'),
      'Kecamatan' => $this->input->post('Kecamatan'),
      'Kelurahan' => $this->input->post('Kelurahan'),
      'KodePOS' => $this->input->post('KodePOS'),
      'Email' => $this->input->post('Email'),
      'NoTlpRumah' => $this->input->post('NoTlpRumah'),
      'NoHP' => $this->input->post('NoHP')
    );

    $this->m_profile->update_employee('tbl_employee', $dataUsers, $ID);
    $this->session->set_flashdata('success', "Data saved successfully!");
    redirect('profile');
  }

  // FUNCTION UPLOAD
  public function upload()
  {
    foreach ($_FILES as $name => $fileInfo) {
      $filename = $_FILES[$name]['name'];
      $tmpname = $_FILES[$name]['tmp_name'];
      $exp = explode('.', $filename);
      $ext = end($exp);
      $newname = 'slider_' . time() . "." . $ext;
      $config['upload_path'] = './assets/images/user/';
      $config['upload_url'] =  base_url() . 'assets/images/user/';
      $config['allowed_types'] = "jpg|jpeg|png";
      $config['max_size'] = '2000000';
      $config['file_name'] = $newname;
      $this->load->library('upload', $config);
      move_uploaded_file($tmpname, "assets/images/user/" . $newname);
      return $newname;
    }
  }

  // UPDATE FOTO
  public function changefoto()
  {
    $pic = '';

    foreach ($_FILES as $name => $fileInfo) {
      if (!empty($_FILES[$name]['name'])) {
        $newname = $this->upload();
        $data[$name] = $newname;
        $pic = $newname;
      }
    }

    $upload = $input_data['Foto'] = $pic;

    $ID = $this->input->post('username');

    $dataUsers = array(
      'Foto' => $upload
    );

    $this->m_profile->update_employee('tbl_employee', $dataUsers, $ID);
    $this->session->set_flashdata('success', "Data saved successfully!");
    redirect('profile');
  }

  // UPDATE PASSWORD
  public function gantipassword()
  {
    $ID = $this->input->post('username');
    $cek_oldpass = md5(md5($this->input->post('oldpassword')));
    $validate_oldpass = $this->m_profile->cek_oldpassword($cek_oldpass, $ID);
    $get_cek_pass = $value['cek_pass'] = $validate_oldpass[0]->cek_pass;

    if ($get_cek_pass == 0) {

      $this->session->set_flashdata('filed', "Empty!");
      redirect('profile');
    } else if ($get_cek_pass == 1) {

      $dataUsers = array(
        'password' => md5(md5($this->input->post('newpassword')))
      );

      $this->m_profile->update_password('bulog_user', $dataUsers, $ID);
      $this->session->set_flashdata('success', "Empty!");
      redirect('profile');
    }
  }
}
