<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dynamic_dependent extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_dynamic_dependent', 'Mdependent');
    }

    function index()
    {
        $data['title'] = "Dynamic Dependent";
        $data['provinsi'] = $this->Mdependent->get_provinsi();
        $this->load->view('dynamic_dependent', $data);
    }

    //request data kabupaten berdasarkan id provinsi yang dipilih
    function get_kabupaten()
    {
        if ($this->input->post('provinsi_id')) {
            echo $this->Mdependent->get_kabupaten($this->input->post('provinsi_id'));
        }
    }

    //request data kecamatan berdasarkan id kabupaten yang dipilih
    function get_kecamatan()
    {
        if ($this->input->post('kabupaten_id')) {
            echo $this->Mdependent->get_kecamatan($this->input->post('kabupaten_id'));
        }
    }

    //request data kelurahan berdasarkan id kecamatan yang dipilih
    function get_kelurahan()
    {
        if ($this->input->post('kecamatan_id')) {
            echo $this->Mdependent->get_kelurahan($this->input->post('kecamatan_id'));
        }
    }
}
