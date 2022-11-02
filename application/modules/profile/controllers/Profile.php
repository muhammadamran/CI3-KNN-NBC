<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //LOAD MODELS
    $this->load->model('M_profile');
    $this->load->model('Model_dynamic_dependent', 'Mdependent');
    $this->load->model('home/M_home');
  }

  public function index()
  {
    $user = $this->session->userdata('username');

    if ($user == NULL) {

      $this->session->set_flashdata('f_role', "Anda belum memulai <b>session</b>!, Silahkan mulai <b>session</b> anda!");
      redirect('login');
    } else if ($user != NULL) {

      $Tpegawai = $this->M_home->get_total_pegawai();
      if ($Tpegawai == NULL) {
        $value['total_pegawai'] = '0';
      } else {
        $value['total_pegawai'] = $Tpegawai[0]->total_pegawai;
      }

      $TSPA = $this->M_home->get_total_spa();
      if ($TSPA == NULL) {
        $value['total_SPA'] = '0';
      } else {
        $value['total_SPA'] = $TSPA[0]->total_SPA;
      }

      $TDO = $this->M_home->get_total_do();
      if ($TDO == NULL) {
        $value['total_DO'] = '0';
      } else {
        $value['total_DO'] = $TDO[0]->total_DO;
      }

      $TSJ = $this->M_home->get_total_sj();
      if ($TSJ == NULL) {
        $value['total_SJ'] = '0';
      } else {
        $value['total_SJ'] = $TSJ[0]->total_SJ;
      }

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

    $this->M_profile->update_employee('tbl_employee', $dataUsers, $ID);
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

    $this->M_profile->update_employee('tbl_employee', $dataUsers, $ID);
    $this->session->set_flashdata('success', "Data saved successfully!");
    redirect('profile');
  }

  // UPDATE PASSWORD
  public function gantipassword()
  {
    $ID = $this->input->post('username');
    $cek_oldpass = md5(md5($this->input->post('oldpassword')));
    $validate_oldpass = $this->M_profile->cek_oldpassword($cek_oldpass, $ID);
    $get_cek_pass = $value['cek_pass'] = $validate_oldpass[0]->cek_pass;

    if ($get_cek_pass == 0) {

      $this->session->set_flashdata('filed', "Empty!");
      redirect('profile');
    } else if ($get_cek_pass == 1) {

      $dataUsers = array(
        'password' => md5(md5($this->input->post('newpassword')))
      );

      $this->M_profile->update_password('bulog_user', $dataUsers, $ID);
      $this->session->set_flashdata('success', "Empty!");
      redirect('profile');
    }
  }
}
