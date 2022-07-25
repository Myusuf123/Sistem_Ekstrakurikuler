<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        }
        $this->load->model('m_dashboard');
        $this->load->model('m_admin');
    }

    public function index()
    {
        //mengambil session berdasarkan user login
        $data['users'] = $this->db->get_where('siswa', ['nis' =>
        $this->session->userdata('ses_id')])->row_array();

        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        $data['prestasi'] = $this->m_admin->getPrestasihome();
        $data['count'] = $this->m_dashboard->get_all_count();
        $data['countt'] = $this->m_dashboard->count_ketua();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/index', $data);
        $this->load->view('templates/footer');
    }






}
