<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        $this->load->model('m_cetakdata');
        $this->load->model('m_dashboard');
        

    }

    public function tampil_ekskul()
    {
        $data['jurusan'] = $this->m_cetakdata->get('jurusan');
        $data['count'] = $this->m_dashboard->get_all_count();
        $data['ekskul'] = $this->m_cetakdata->tampil_data('ekskul')->result();
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('cetak_laporan/cetak_data_ekstra', $data);
        $this->load->view('templates/footer');
    }

    public function tampil_ekskul_pembina()
    {
        $user = $this->session->userdata('ses_id');
        $data['jurusan'] = $this->m_cetakdata->get('jurusan');
        $data['count'] = $this->m_dashboard->get_all_count();
        $data['ekskul'] = $this->m_cetakdata->GetEksPembina($user)->result();
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('cetak_laporan/cetak_data_ekstra', $data);
        $this->load->view('templates/footer');
    }

    

    public function cari()
    {
  
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        $kelas = $this->input->get('kelas');
        $nama_jurusan = $this->input->get('nama_jurusan');
        $data['namakelas'] = $this->db->get_where('siswa', ['kelas' =>
        $kelas])->row_array();
        $data['jurusan'] = $this->db->get_where('jurusan', ['id_jurusan' =>
        $nama_jurusan])->row_array();
        $data['anggota'] = $this->m_cetakdata->cari_anggota($kelas, $nama_jurusan);
        $this->load->library('Pdf');
        
     $this->pdf->generate('Laporan_Kelas', $data, 'Data_Laporan_Anggota_Ekstrakurikuler', 'A4', 'potrait');
    }


    public function cetak_anggota($id_ekskul)
    {
        $data['namaekskul'] = $this->db->get_where('ekskul', ['id_ekskul' =>
        $id_ekskul])->row_array();
        $user = array('id_ekskul' => $id_ekskul);
        $this->load->library('Pdf');
        $data['anggota'] = $this->m_cetakdata->getAnggotaeks($user);
        $data['users'] = $this->m_cetakdata->getPembina_($user)->row_array();
        $this->pdf->generate('Laporan_Anggota', $data, 'Data_Laporan_Anggota_Ekstrakurikuler', 'A4', 'potrait');
    }


}
