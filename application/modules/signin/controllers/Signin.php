<?php
defined('BASEPATH') or exit('No direct script access allowed');

class signin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// MODELS
		$this->load->model('m_signin');
	}

	public function index()
	{
		// GET SETTING
		$get_setting = $this->m_signin->get_setting();
		if ($get_setting == NULL) {
			$value['icon'] = 'icon.png';
			$value['logo'] = 'logo.png';
			$value['logo_sidebar'] = 'logo-default.png';
			$value['logo_sidebar_one'] = 'logo_sidebar-one.png';
			$value['logo_signin'] = 'logo_signin.png';
			$value['title'] = 'Judul - Aplikasi Berbasis Web';
			$value['appname'] = 'App Name';
			$value['develop'] = 'Developer';
			$value['year_dev'] = '2021';
			$value['version'] = '1.0.0';
			$value['version_type'] = 'BETA';
			$value['bg_sign'] = 'Grdient';
			$value['primary_color'] = '#005cac';
		} else {
			$value['icon'] = $get_setting[0]->icon;
			$value['logo'] = $get_setting[0]->logo;
			$value['logo_sidebar'] = $get_setting[0]->logo_sidebar;
			$value['logo_sidebar_one'] = $get_setting[0]->logo_sidebar_one;
			$value['logo_signin'] = $get_setting[0]->logo_signin;
			$value['title'] = $get_setting[0]->title;
			$value['appname'] = $get_setting[0]->appname;
			$value['develop'] = $get_setting[0]->develop;
			$value['year_dev'] = $get_setting[0]->year_dev;
			$value['version'] = $get_setting[0]->version;
			$value['version_type'] = $get_setting[0]->version_type;
			$value['bg_sign'] = $get_setting[0]->bg_sign;
			$value['primary_color'] = $get_setting[0]->primary_color;
		}

		$value['PageTitle'] = 'Sign In';

		$this->load->view('signin', $value);
	}

	public function check_signin()
	{
		if (isset($_POST['submit'])) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$data = array(
				'username' => $username,
				'password' => md5($password),
			);

			$get_validasi_statususer = $this->m_signin->get_status_user_employee($username);
			$validasi_statususer_log = $get_validasi_statususer[0]->status_user;

			if ($validasi_statususer_log == '2') {
				$this->session->set_flashdata('n_signin_nonaktif', "Maaf <b>Status User anda</b> di Non-Aktifkan, Silakan hubungi administrator!");
				redirect('signin');
			} else {

				$get_validasi = $this->m_signin->get_employee($username);
				$validasi_log = $get_validasi[0]->Login;

				if ($validasi_log == NULL) {
					$this->session->set_flashdata('n_signin', "Maaf <b>Data anda</b> tidak terdaftar di kepegawaian, Silakan hubungi administrator!");
					redirect('signin');
				} else {

					$cek = $this->m_signin->check_signin('tbl_users', $data);

					if (@$cek) {

						// GET DATA EMPLOYEE FOR SESSION
						$get_employee = $this->m_signin->get_employee($cek->username);
						// GET SETTING
						$get_setting = $this->m_signin->get_setting();
						if ($get_setting == NULL) {
							$icon = 'icon.png';
							$logo = 'logo.png';
							$logo_sidebar = 'logo_sidebar.png';
							$logo_sidebar_one = 'logo_sidebar-one.png';
							$logo_signin = 'logo_signin.png';
							$title = 'Judul - Aplikasi Berbasis Web';
							$appname = 'App Name';
							$develop = 'Developer';
							$year_dev = '2021';
							$version = '1.0.0';
							$version_type = 'BETA';
							$bg_sign = 'Grdient';
							$primary_color = '#005cac';
						} else {
							$icon = $get_setting[0]->icon;
							$logo = $get_setting[0]->logo;
							$logo_sidebar = $get_setting[0]->logo_sidebar;
							$logo_sidebar_one = $get_setting[0]->logo_sidebar_one;
							$logo_signin = $get_setting[0]->logo_signin;
							$title = $get_setting[0]->title;
							$appname = $get_setting[0]->appname;
							$develop = $get_setting[0]->develop;
							$year_dev = $get_setting[0]->year_dev;
							$version = $get_setting[0]->version;
							$version_type = $get_setting[0]->version_type;
							$bg_sign = $get_setting[0]->bg_sign;
							$primary_color = $get_setting[0]->primary_color;
						}

						$data_session = array(
							'ID' => $cek->ID,
							'username' => $username,
							'password' => $password,
							'Created_Date' => $cek->Created_Date,
							'Role' => $cek->Role,
							'status_user' => $cek->status_user,
							// GET TABEL TBL_EMPLOYEE
							'Login' => $get_employee[0]->Login,
							'Foto' => $get_employee[0]->Foto,
							'NIK' => $get_employee[0]->NIK,
							'NIP' => $get_employee[0]->NIP,
							'NamaLengkap' => $get_employee[0]->NamaLengkap,
							'GelarDepan' => $get_employee[0]->GelarDepan,
							'GelarBelakang' => $get_employee[0]->GelarBelakang,
							'JenisKelamin' => $get_employee[0]->JenisKelamin,
							'TempatLahir' => $get_employee[0]->TempatLahir,
							'TanggalLahir' => $get_employee[0]->TanggalLahir,
							'Usia' => $get_employee[0]->Usia,
							'Agama' => $get_employee[0]->Agama,
							'StatusNikah' => $get_employee[0]->StatusNikah,
							'GolonganDarah' => $get_employee[0]->GolonganDarah,
							'StatusEmployee' => $get_employee[0]->StatusEmployee,
							'GolonganEmployee' => $get_employee[0]->GolonganEmployee,
							'Tgl_Masuk' => $get_employee[0]->Tgl_Masuk,
							'Tgl_Keluar' => $get_employee[0]->Tgl_Keluar,
							'Alamat' => $get_employee[0]->Alamat,
							'Provinsi' => $get_employee[0]->Provinsi,
							'KotaKab' => $get_employee[0]->KotaKab,
							'Kecamatan' => $get_employee[0]->Kecamatan,
							'Kelurahan' => $get_employee[0]->Kelurahan,
							'KodePOS' => $get_employee[0]->KodePOS,
							'Email' => $get_employee[0]->Email,
							'NoTlpRumah' => $get_employee[0]->NoTlpRumah,
							'NoHP' => $get_employee[0]->NoHP,
							'Created_Date' => $get_employee[0]->Created_Date,
							// LIST ALAMAT
							'id_provinsi' => $get_employee[0]->id_provinsi,
							'nm_provinsi' => $get_employee[0]->nm_provinsi,
							'id_kotakab' => $get_employee[0]->id_kotakab,
							'nm_kotakab' => $get_employee[0]->nm_kotakab,
							'id_kecamatan' => $get_employee[0]->id_kecamatan,
							'nm_kecamatan' => $get_employee[0]->nm_kecamatan,
							'id_kelurahan' => $get_employee[0]->id_kelurahan,
							'nm_kelurahan' => $get_employee[0]->nm_kelurahan,
							// SETTING
							'icon' => $icon,
							'logo' => $logo,
							'logo_sidebar' => $logo_sidebar,
							'logo_sidebar_one' => $logo_sidebar_one,
							'logo_signin' => $logo_signin,
							'title' => $title,
							'appname' => $appname,
							'develop' => $develop,
							'year_dev' => $year_dev,
							'version' => $version,
							'version_type' => $version_type,
							'bg_sign' => $bg_sign,
							'primary_color' => $primary_color
						);

						$data_log = array(
							'username' => $username,
							'role' => $cek->Role,
							'datetime' => date('Y-m-d H:i:s'),
							'status' => 'Login'
						);

						$this->session->set_userdata($data_session);
						$this->db->insert('tbl_log', $data_log);
						$this->session->set_flashdata('s_sigin', $this->input->post('username'));
						redirect('Dashboard');
					} else {
						$this->session->set_flashdata('f_sigin', "Maaf <b>Username</b> atau <b>Password</b> Anda salah, Silakan Coba Lagi!");
						redirect('signin');
					}
				}
			}
		}
	}

	public function SignOut($username)
	{
		$get_validasi = $this->m_signin->get_role($username);
		$cek_role = $get_validasi[0]->Role;

		$data_log = array(
			'username' => $username,
			'role' => $cek_role,
			'datetime' => date('Y-m-d H:i:s'),
			'status' => 'SignOut'
		);
		$this->db->insert('tbl_log', $data_log);
		$this->session->sess_destroy();
		$this->session->set_flashdata('n_gsignin', 'Anda Berhasil SignOut!');
		redirect('signin');
	}
}
