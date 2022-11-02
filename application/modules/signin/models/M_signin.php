<?php
class m_signin extends CI_Model
{

    // GET SETTING APPS
    public function get_setting()
    {
        return $this->db->query("SELECT * FROM tbl_setting ORDER BY ID ASC")->result();
    }

    // CEK LOGIN USER TRUE OR FALSE
    public function check_signin($table, $data)
    {
        $query = $this->db->get_where($table, $data);

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    // CHECK STATUS USERS
    public function get_status_user_employee($username)
    {
        return $this->db->query("SELECT status_user FROM tbl_users
            WHERE username='$username'")->result();
    }

    // GET DATA FROM TABLE EMPLOYEE
    public function get_employee($username)
    {
        return $this->db->query("SELECT *,
            c.id AS id_provinsi,c.name AS nm_provinsi,
            d.id AS id_kotakab,d.name AS nm_kotakab,
            e.id AS id_kecamatan,e.name AS nm_kecamatan,
            f.id AS id_kelurahan,f.name AS nm_kelurahan  
            FROM tbl_employee AS a
            LEFT OUTER JOIN provinces AS c ON a.Provinsi=c.id 
            LEFT OUTER JOIN regencies AS d ON a.KotaKab=d.id
            LEFT OUTER JOIN districts AS e ON a.Kecamatan=e.id
            LEFT OUTER JOIN villages AS f ON a.Kelurahan=f.id
            WHERE a.Login='$username'")->result();
    }

    // GET ROLE FROM TBL_EMPLOYEE
    public function get_role($username)
    {
        return $this->db->query("SELECT Role FROM tbl_users
            WHERE username='$username'")->result();
    }
}
