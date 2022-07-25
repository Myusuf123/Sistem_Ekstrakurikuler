<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ambil_ekskul extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        }
        $this->load->model('m_admin');
        $this->load->model('m_dashboard');
       
       
    }


    public function index()
    {

        $data['count'] = $this->m_dashboard->get_all_count();
        $data['ekskul'] = $this->m_admin->tampilekskul('ekskul')->result();
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/ambil_ekstra/data_ekstra', $data);
        $this->load->view('templates/footer');
    }

    public function getanggota($kode_ekskul)
    {
        $count = array(
            'ekskul_id' => $kode_ekskul
        );
        $data['total_ekskul'] = $this->m_dashboard->get_anggota($count)->num_rows();
        
        //mengambil nama ektrakurikuler berdasarkan ekskul yang dipilih
        $data['namaekskul'] = $this->db->get_where('ekskul', ['id_ekskul' =>
        $kode_ekskul])->row_array();
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        
        $user = array('id_ekskul' => $kode_ekskul);
        $data['count'] = $this->m_dashboard->get_all_count();
        $data['mengambil'] = $this->m_admin->getAnggotaeks($user);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/ambil_ekstra/data_anggota', $data);
        $this->load->view('templates/footer');

        
    }

   
    function hapus($id_pendaftaran)
    {
        $where = array('id_pendaftaran' => $id_pendaftaran);
        $this->m_admin->hapus_data($where,'pendaftaran');
        $this->session->set_flashdata('primary', 'Data Terhapus.');
        $this->load->library('user_agent');
        redirect($_SERVER['HTTP_REFERER']);
    }
}