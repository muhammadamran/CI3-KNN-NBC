<?php
class M_profile extends CI_Model {

	public function update_pegawai($table,$dataUsers,$ID)
	{

		$this->db->where('Login', $ID);
		$this->db->update($table,$dataUsers); 
	}

	public function update_password($table,$dataUsers,$ID)
	{

		$this->db->where('username', $ID);
		$this->db->update($table,$dataUsers); 
	}

	public function cek_oldpassword($cek_oldpass,$ID)
    {
        return $this->db->query("SELECT count(*) AS cek_pass FROM bulog_user
            WHERE username='$ID' AND password='$cek_oldpass' ")->result();
    }

}
?>
