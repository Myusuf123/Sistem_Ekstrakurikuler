<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_siswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        }
 
        $this->load->model('m_siswa');
        $this->load->model('m_dashboard');
    }


    public function index()
    {

        $data['count'] = $this->m_dashboard->get_all_count();
        $data['jadwal'] = $this->m_siswa->getJadwal();
        $data['users'] = $this->db->get_where('siswa', ['nis' =>
        $this->session->userdata('ses_id')])->row_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('siswa/jadwal/jadwalkegiatan', $data);
        $this->load->view('templates/footer');
    }

    public function prestasi()
    {
        $user = $this->session->userdata('ses_kode');
        $data['count'] = $this->m_dashboard->get_all_count();
        $data['prestasi'] = $this->m_siswa->getPrestasi();
        $data['users'] = $this->db->get_where('siswa', ['nis' =>
        $this->session->userdata('ses_id')])->row_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/prestasi/prestasi', $data);
        $this->load->view('templates/footer');
    }


    
}